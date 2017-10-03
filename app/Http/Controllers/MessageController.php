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

class MessageController extends Controller {

    public function __construct() {
        
    }

    public function index() {
        $data['active_menu'] = 'admin-message';
        $data['messageList'] = DB::table('message')->orderBy('id', 'desc')->get();
        return view('controlpanel.message.message-list', $data);
    }

    public function sendMessage() {
        $data['active_menu'] = 'admin-message';
        return view('controlpanel.message.message', $data);
    }

    public function store(Request $request) {
        $profile_pic = $request->file('fthumb_1');
        $dt = date_create();
        $dtime = date_format($dt, 'YmdHis');
        if ($request->hasFile('fthumb_1')) :
            $imagedetails = getimagesize($_FILES['fthumb_1']['tmp_name']);
            $width = $imagedetails[0];
            $height = $imagedetails[1];

            $errors = array();
            $file_name = $_FILES['fthumb_1']['name'];
            $file_size = $_FILES['fthumb_1']['size'];

            $ext = pathinfo($request->file('fthumb_1')->getClientOriginalExtension(), PATHINFO_FILENAME);
            $expensions = array("jpeg", "jpg", "png", "JPEG", "JPG", "PNG");
            $extenCheck = in_array($ext, $expensions);
            $sizeCheck = (($file_size < 102400) && ($width < 950) && ($height < 350));
            if ($sizeCheck == false) :
                Session::flash('error_message', ' File size must be excately 100 Kb. please check width, height and size.!!!');
                return Redirect::to('admin-message');
            else :
                $dt = date_create();
                $time = date_format($dt, 'YmdHis');
                $photo_name = $time . '.png';
                $profile_pic->move(base_path() . '/public/images/adminmessage/', $photo_name);

                $SaveData = DB::table('message')->insertGetId([
                    'images' => $photo_name,
                    'description' => $request->input('details'),
                    'date' => date('Y-m-d')
                ]);
                if ($SaveData):

                    $getBrandId = DB::table('message')->where('id', '=', $SaveData)->first();
                    $messageId = $getBrandId->id;
                    $description = $getBrandId->description;
                    $image = $getBrandId->images;
                    //$image = "http://54.191.10.107/deals4uwebadmin/public/images/adminmessage/" . $getBrandId->images;


                    $tokenlist = DB::table('device_info_tbl')
                            ->distinct()
                            ->get();
                    if ($tokenlist):
                        $rowarray = [];
                        foreach ($tokenlist as $value):
                            $rowarray[] = [
                                "device_id" => $value->device_id,
                                "user_id" => $value->user_id,
                                "device_token" => $value->device_token,
                                'ref_message_id' => $messageId,
                                'message' => $description,
                                'image' => $image,
                                'date' => date('Y-m-d'),
                                'status' => 0,
                                'push_noti_send' => 0
                            ];
                        endforeach;
                        \DB::table('message_log_tbl')->insert($rowarray);
                        $notificationlist = DB::table('message_log_tbl')
                                ->where('push_noti_send', '=', 0)
                                ->get();

                        foreach ($notificationlist as $nlist):
                            $image = "http://54.191.10.107/deals4uwebadmin/public/images/adminmessage/" . $nlist->image;
                            $dataarray = [];
                            $devicetoken = [];
                            $dataarray = [
                                "id" => $nlist->ref_message_id,
                                'title' => $nlist->message,
                                'image' => $image,
                                'tag' => 'admin'
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
                            $updateData = DB::table('message_log_tbl')
                                    ->where('id', $nlist->id)
                                    ->update([
                                'status' => $status,
                                'push_noti_send' => 1
                            ]);
                        endforeach;
                    endif;
                    //var_dump($decodedval);                    exit();
                    Session::flash('success_message', ' Successfully Updated !!!');
                    return Redirect::to('admin-message');
                endif;
            endif;
        else :
            Session::flash('error_message', ' One or more mandatory fields are empty !!!');
            return Redirect::to('admin-message');
        endif;
    }

    static $API_ACCESS_KEY = 'AAAAYRYEwHQ:APA91bGDxjNRCo8Z0GUyg4ymsWGerPAWUtztgWZ1KYp-nP2k46GMOf3jJz16FVIOsekQJLMD1N0s46fXS2CGhHEvbV1ow1UdmNRdKtqCdPaz9fTBbDHPPQ3wq-0PjRE7Ki_YUAU-Q4pz';

    public function android($tokenlist, $dataarray) {
        $url = 'https://fcm.googleapis.com/fcm/send';

        $headers = array(
            'Authorization: key=' . self::$API_ACCESS_KEY,
            'Content-Type: application/json'
        );
        $fields = array(
            'registration_ids' => $tokenlist,
            'data' => $dataarray
        );
        return MessageController::useCurl($url, $headers, json_encode($fields));
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

}
