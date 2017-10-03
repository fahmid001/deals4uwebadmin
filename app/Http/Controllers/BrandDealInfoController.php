<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Session;
use Redirect;
use Crypt;
use Hash;
use DB;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;
use App\Http\Controllers\JsonResponse;
use App\Http\Controllers\PushNotifications;
use Illuminate\Support\Facades\Mail;
use Swift_Transport;
use Swift_Message;
use Swift_Mailer;

class BrandDealInfoController extends Controller {

    public function __construct() {
        
    }

    public function index() {
        
    }

    public function pendingList() {
        $data['active_menu'] = 'pending-list';
        $date = date('Y-m-d');
        $data['branddealList'] = DB::table('brand_dealinfo_tbl')
                ->where('flag', '=', 0)
                ->orderBy('id', 'desc')
                ->get();
        $data['active_menu'] = 'pending-list';
        return view('controlpanel.branddealinfo.pending', $data);
    }

    public function updatepending($id, $type) {
        $dealsAddr = DB::table('brand_address_tbl')->where('ref_dealinfo_id', '=', $id)->count();
        $dealsAddrWithLatLng = DB::table('brand_address_tbl')->where('ref_dealinfo_id', '=', $id)->whereNotNull('lat')->whereNotNull('lng')->count();
        //Check Lan and Lng value
        if ($dealsAddr == $dealsAddrWithLatLng):
            $updateData = DB::table('brand_dealinfo_tbl')
                    ->where('id', $id)
                    ->update([
                'flag' => 1
            ]);
            if ($updateData) :
                //for sending email
                $backup = \Mail::getSwiftMailer();
                $transport = \Swift_SmtpTransport::newInstance('smtp.gmail.com', 587, 'tls');
                $transport->setUsername('fahmid.masud@icebd.com');
                $transport->setPassword('fahmid123');
                $dealsTitle = DB::table('brand_dealinfo_tbl')->where('id', '=', $id)->first();
                if ($dealsTitle):
                    $dealsTitle = $dealsTitle->title;
                endif;
                $data = array(
                    'title' => $dealsTitle,
                );
                $gmail = new Swift_Mailer($transport);
                \Mail::setSwiftMailer($gmail);
                Mail::send('emails.approveemail', $data, function($message) {
                    $message->to('fahmid.masud@icebd.com', 'Fabien')->from('fahmid.masud@icebd.com')->subject('Approved Deal from admin!');
                });
                // end send email
                //push notification
                $getBrandId = DB::table('brand_dealinfo_tbl')->where('id', '=', $id)->first();
                $brandId = $getBrandId->ref_brand_id;
                $dealsid = $getBrandId->id;
                $title = $getBrandId->title;
                /* $dataarray = [
                  "id" => $dealsid,
                  'title' => $title,
                  'image' => $image,
                  'tag' => 'brand_user'
                  ];
                 * 
                 */
                $datainsert = [
                    "ref_deals_id" => $dealsid,
                    'title' => $title,
                    'image' => $getBrandId->banner_image,
                    'date' => date('Y-m-d H:i:s')
                ];

                $SaveNotificationMsg = DB::table('notification_message_tbl')->insertGetId($datainsert);
                $notificationMessageQry = DB::table('notification_message_tbl')->where('id', '=', $SaveNotificationMsg)->first();
                $notificationLogId = $notificationMessageQry->id;
                $dealsId = $notificationMessageQry->ref_deals_id;
                $title = $notificationMessageQry->title;
                $image = $notificationMessageQry->image;
                $tokenlist = DB::table('favorite_tbl')
                        ->select(
                                'device_info_tbl.device_token', 'device_info_tbl.device_id', 'device_info_tbl.user_id'
                        )
                        ->join('device_info_tbl', 'favorite_tbl.device_id', '=', 'device_info_tbl.device_id')
                        ->where('favorite_tbl.fav_id', '=', $brandId)
                        ->distinct()
                        ->get();
                #$devicetoken = array();
                if ($tokenlist):

                    $rowarray = [];
                    foreach ($tokenlist as $value):
                        #$devicetoken[] = $value->device_token;
                        $rowarray[] = [
                            "device_id" => $value->device_id,
                            "user_id" => $value->user_id,
                            "device_token" => $value->device_token,
                            'ref_deals_id' => $dealsId,
                            'ref_notification_message_id' => $notificationLogId,
                            'message' => $title,
                            'image' => $image,
                            'date' => date('Y-m-d'),
                            'status' => 0,
                            'push_noti_send' => 0
                        ];
                    endforeach;

                    \DB::table('notification_log_tbl')->insert($rowarray);
                    $notificationlist = DB::table('notification_log_tbl')
                            ->where('push_noti_send', '=', 0)
                            ->get();

                    foreach ($notificationlist as $nlist):
                        $image = "http://54.191.10.107/deals4uwebadmin/public/images/productimages/" . $nlist->image;
                        $dataarray = [];
                        $devicetoken = [];
                        $dataarray = [
                            "id" => $nlist->ref_deals_id,
                            'title' => $nlist->message,
                            'image' => $image,
                            'tag' => 'brand_user'
                        ];

                        $devicetoken[] = $nlist->device_token;
                        //print_r($devicetoken);
                        $notificationResult = $this->android($devicetoken, $dataarray);
                        $decodedval = json_decode($notificationResult, TRUE);
                        $success = $decodedval['success'];
                        $failure = $decodedval['failure'];
                        if ($success == 1):
                            $status = 1;
                        else:
                            $status = 0;
                        endif;
                        $updateData = DB::table('notification_log_tbl')
                                ->where('id', $nlist->id)
                                ->update([
                            'status' => $status,
                            'push_noti_send' => 1
                        ]);
                    endforeach;
                endif;
                Session::flash('success_message', ' Approved Successfully !!!');
            else:
                Session::flash('error_message', ' Approved Failed !!!');
            endif;
            if ($type == 'publish'):
                return Redirect::to('with-hold-list');
            else:
                return Redirect::to('pending-list');
            endif;
        else:
            Session::flash('error_message', ' Approved Failed Check Lat/Lng !!!');
            if ($type == 'publish'):
                return Redirect::to('with-hold-list');
            else:
                return Redirect::to('pending-list');
            endif;
        endif;
    }

    static $API_ACCESS_KEY = 'AAAAYRYEwHQ:APA91bGDxjNRCo8Z0GUyg4ymsWGerPAWUtztgWZ1KYp-nP2k46GMOf3jJz16FVIOsekQJLMD1N0s46fXS2CGhHEvbV1ow1UdmNRdKtqCdPaz9fTBbDHPPQ3wq-0PjRE7Ki_YUAU-Q4pz';

    public function android($tokenlist, $dataarray) {
        $url = 'https://fcm.googleapis.com/fcm/send';
        //echo '<br><br><br><br><br><br><br>token list : ';
        //echo '<pre>';
        //print_r($tokenlist);
        //echo '</pre>';
        //echo '<br><br><br><br><br><br><br>';
        $headers = array(
            'Authorization: key=' . self::$API_ACCESS_KEY,
            'Content-Type: application/json'
        );
        $fields = array(
            'registration_ids' => $tokenlist,
            'data' => $dataarray
        );
        return BrandDealInfoController::useCurl($url, $headers, json_encode($fields));
    }

    // Curl
    //private function useCurl(&$model, $url, $headers, $fields = null) {
    private function useCurl($url, $headers, $fields) {
        // Open connection
        $ch = curl_init();
        if ($url) {
            // Set the url, number of POST vars, POST data
            //curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, 0 ); // edited by momen
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            // Disabling SSL Certificate support temporarly
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            if ($fields) {
                curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
            }

            // Execute post
            $result = curl_exec($ch);
            if ($result === FALSE) {
                die('Curl failed: ' . curl_error($ch));
            }

            // Close connection
            curl_close($ch);
            return $result;
        }
    }

    public function approveList() {
        $data['branddealList'] = DB::table('brand_dealinfo_tbl')->where('flag', '=', 1)->orderBy('id', 'desc')->get();
        $data['active_menu'] = 'approve-list';
        return view('controlpanel.branddealinfo.approve', $data);
    }

    public function rejectList() {
        $data['branddealList'] = DB::table('brand_dealinfo_tbl')->where('flag', '=', 2)->orderBy('id', 'desc')->get();
        $data['active_menu'] = 'reject-list';
        return view('controlpanel.branddealinfo.reject', $data);
    }

    public function updatereject(Request $request) {
        $id = $request->input('idddddd');
        $messageid = $request->input('messageid');
        $type = $request->input('approved');
        $updateData = DB::table('brand_dealinfo_tbl')
                ->where('id', $id)
                ->update([
            'flag' => 2,
            'ref_reject_msg_id' => $messageid
        ]);
        if ($updateData) :

            $backup = \Mail::getSwiftMailer();
            $transport = \Swift_SmtpTransport::newInstance('smtp.gmail.com', 587, 'tls');
            $transport->setUsername('fahmid.masud@icebd.com');
            $transport->setPassword('fahmid123');
            $dealsTitle = DB::table('brand_dealinfo_tbl')->where('id', '=', $id)->first();
            if ($dealsTitle):
                $dealsTitle = $dealsTitle->title;
            endif;
            $data = array(
                'title' => $dealsTitle,
                'reject_msg_id' => $messageid
            );
            $gmail = new Swift_Mailer($transport);
            \Mail::setSwiftMailer($gmail);
            Mail::send('emails.rejectemail', $data, function($message) {
                $message->to('fahmid.masud@icebd.com', 'Fabien')->from('fahmid.masud@icebd.com')->subject('Reject Deal from admin!');
            });

            Session::flash('success_message', ' Reject Successfully !!!');
        else:
            Session::flash('error_message', ' Reject Failed !!!');
        endif;
        if ($type == 'approved'):
            return Redirect::to('approve-list');
        else:
            return Redirect::to('pending-list');
        endif;
    }

    public function updateunPublish($id) {
        $updateData = DB::table('brand_dealinfo_tbl')
                ->where('id', $id)
                ->update([
            'flag' => 3
        ]);
        if ($updateData) :
            Session::flash('success_message', ' Withhold Successfully !!!');
        else:
            Session::flash('error_message', ' Withhold Failed !!!');
        endif;
        return Redirect::to('approve-list');
    }

    public function unPublishList() {
        $data['branddealList'] = DB::table('brand_dealinfo_tbl')->where('flag', '=', 3)->orderBy('id', 'desc')->get();
        $data['active_menu'] = 'unpublish-list';
        return view('controlpanel.branddealinfo.unpublish', $data);
    }

    public function unPublishDetails($id) {
        $data['active_menu'] = 'unpublish-list';
        $data['promoDetails'] = DB::table('brand_dealinfo_tbl')->where('id', '=', $id)->first();
        return view('controlpanel.promo.with-hold-details', $data);
    }

}
