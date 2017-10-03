<?php

namespace App\Api\V1\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use DB;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use FCM;
use App\Http\Controllers\JsonResponse;
use App\Http\Controllers\PushNotifications;

class DealsController extends Controller {

    public function index(Request $request) {

        $inputData = $request->input('key');
        $date = date('Y-m-d');
        $branddealList = DB::table('brand_dealinfo_tbl')
                ->where('start_date', '<=', $date)
                ->where('end_date', '>=', $date)
                ->where('flag', '=', 1)
                ->orderBy('id', 'desc')
                ->get();

        $datarow = [];

        foreach ($branddealList as $value):
            $datarow[] = [
                'banner' => "/images/productimages/" . $value->banner_image,
                'keyword' => $value->keyword,
                'id' => $value->id
            ];
        endforeach;

        return response()->json([
                    'status' => 'success',
                    'error' => [],
                    'message' => 'Data provided',
                    'code' => 200,
                    'data' => $datarow
                        ], 200);
    }

    public function details(Request $request) {

        $id = $request->input('id');
        $key = $request->input('key');

        $dealsAddr = DB::table('brand_address_tbl')->where('ref_dealinfo_id', '=', $id)->whereNotNull('lat')->get();

        $datarow2 = [];

        foreach ($dealsAddr as $value):
            $datarow2[] = [
                'lat' => $value->lat,
                'lng' => $value->lng,
                'address' => $value->address,
                'ref_dealinfo_id' => $value->ref_dealinfo_id,
                'cat_id' => $value->cat_id
            ];
        endforeach;
        $branddealDetails = DB::table('brand_dealinfo_tbl')->where('id', '=', $id)->get();
        $datarow = [];
        foreach ($branddealDetails as $details):
            if ($details->input_date_status == 1):
                $startdate = $details->start_date;
            else:
                $startdate = '';
            endif;
            $datarow = [
                'banner' => "/images/productimages/" . $details->banner_image,
                'title' => $details->title,
                'keyword' => $details->keyword,
                'mobile' => $details->mobile,
                'start_date' => $startdate,
                'end_date' => $details->end_date,
                'category' => $details->category,
                'details' => $details->details,
                'url' => $details->url,
                'address' => $datarow2
            ];
        endforeach;
        $hitcount = $branddealDetails[0]->hitcount;
        $hitcount = $hitcount + 1;
        $updateData = DB::table('brand_dealinfo_tbl')
                ->where('id', '=', $id)
                ->update([
            'hitcount' => $hitcount
        ]);
        return response()->json([
                    'status' => 'success',
                    'error' => [],
                    'message' => 'Data provided',
                    'code' => 200,
                    'data' => $datarow
                        ], 200);
    }

    public function noOfHitcount(Request $request) {
        $id = $request->input('id');
        $key = $request->input('key');

        $branddealDetails = DB::table('brand_dealinfo_tbl')->where('id', '=', $id)->get();
        $hitcount = $branddealDetails[0]->hitcount;
        return response()->json([
                    'status' => 'success',
                    'error' => [],
                    'message' => 'Data provided',
                    'code' => 200,
                    'data' => $hitcount
                        ], 200);
    }

    public function category(Request $request) {

        $inputData = $request->input('key');
        $date = date('Y-m-d');
        #$categoryList = DB::table('category')->get();
        $categoryList = DB::table('category')
                ->select(
                        'category.category_title', 'category.id'
                )
                ->join('address_details', 'address_details.category_id', '=', 'category.id')
                ->join('brand_dealinfo_tbl', 'address_details.ref_deals_id', '=', 'brand_dealinfo_tbl.id')
                ->where('brand_dealinfo_tbl.start_date', '<=', $date)
                ->where('brand_dealinfo_tbl.end_date', '>=', $date)
                ->where('brand_dealinfo_tbl.flag', '=', 1)
                ->distinct()
                ->get();

        $datarow = [];

        foreach ($categoryList as $value):
            $datarow[] = [
                'category' => $value->category_title,
                'id' => $value->id
            ];
        endforeach;

        return response()->json([
                    'status' => 'success',
                    'error' => [],
                    'message' => 'Data provided',
                    'code' => 200,
                    'data' => $datarow
                        ], 200);
    }

    public function categorywiselist(Request $request) {

        $inputData = $request->input('key');
        $categoryid = $request->input('categoryid');
        $date = date('Y-m-d');
        //$branddealList = DB::table('brand_dealinfo_tbl')->where('flag', '=', 1)->where('category', '=', $categoryid)->orderBy('id', 'desc')->get();
        $branddealList = DB::table('brand_dealinfo_tbl')
                ->select(
                        'brand_dealinfo_tbl.banner_image', 'brand_dealinfo_tbl.id', 'brand_dealinfo_tbl.keyword'
                )
                ->join('address_details', 'address_details.ref_deals_id', '=', 'brand_dealinfo_tbl.id')
                ->where('brand_dealinfo_tbl.start_date', '<=', $date)
                ->where('brand_dealinfo_tbl.end_date', '>=', $date)
                ->where('brand_dealinfo_tbl.flag', '=', 1)
                ->where('address_details.category_id', $categoryid)
                ->distinct()
                ->get();

        $datarow = [];

        foreach ($branddealList as $value):
            $datarow[] = [
                'banner' => "/images/productimages/" . $value->banner_image,
                'id' => $value->id,
                'keyword' => $value->keyword,
            ];
        endforeach;

        return response()->json([
                    'status' => 'success',
                    'error' => [],
                    'message' => 'Data provided',
                    'code' => 200,
                    'data' => $datarow
                        ], 200);
    }

    public function favourite(Request $request) {

        $inputData = $request->input('key');
        $deviceEmail = $request->input('email');
        $followinglist = DB::table('favorite_tbl')
                ->select(
                        'favorite_tbl.fav_id', 'favorite_tbl.id', 'brand_list.brand_title'
                )
                ->join('brand_list', 'favorite_tbl.fav_id', '=', 'brand_list.id')
                ->where('favorite_tbl.email', '=', $deviceEmail)
                ->get();
        $dataarr = [];
        foreach ($followinglist as $id):
            $dataarr[] = $id->fav_id;
        endforeach;

        $followlist = DB::table('brand_list')->whereNotIn('id', $dataarr)->get();

        #$favoriteList = DB::table('brand_list')->get();

        $datarow1 = [];
        $datarow2 = [];

        foreach ($followinglist as $value):
            $datarow1[] = [
                'favorite' => $value->brand_title,
                'favorite_id' => $value->fav_id,
                'id' => $value->id
            ];
        endforeach;

        foreach ($followlist as $value):
            $datarow2[] = [
                'favorite' => $value->brand_title,
                'favorite_id' => $value->id
            ];
        endforeach;

        return response()->json([
                    'status' => 'success',
                    'error' => [],
                    'message' => 'Data provided',
                    'code' => 200,
                    'data1' => $datarow1,
                    'data2' => $datarow2
                        ], 200);
    }

    public function addfavorite(Request $request) {

        $inputData = $request->input('key');
        $SaveData = DB::table('favorite_tbl')->insert([
            'fav_id' => $request->input('fav_id'),
            'device_id' => $request->input('device_id'),
            'email' => $request->input('email'),
            'created_at' => date('y-m-d')
        ]);
        return response()->json([
                    'status' => 'success',
                    'error' => [],
                    'message' => 'Data provided',
                    'code' => 200
                        ], 200);
    }

    public function deletefavorite(Request $request) {

        $inputData = $request->input('key');
        $fav_id = $request->input('fav_id');
        $email = $request->input('email');

        $DeleteData = DB::table('favorite_tbl')->where('fav_id', '=', $fav_id)->where('email', '=', $email)->delete();
        return response()->json([
                    'status' => 'success',
                    'error' => [],
                    'message' => 'Data provided',
                    'code' => 200
                        ], 200);
    }

    public function registration(Request $request) {

        $inputData = $request->input('key');
        $email = $request->input('email');
        $deviceId = $request->input('device_id');

        $checkValidity = DB::table('mobile_user_tbl')->where('email', '=', $email)->get();
        #if get the same email then update the user information, other wise save a new record.
        if (count($checkValidity) > 0):
            $userId = $checkValidity[0]->id;
            $SaveData = DB::table('mobile_user_tbl')
                    ->where('email', $email)
                    ->update([
                'full_name' => $request->input('full_name')
            ]);
            $gredingMsg = DB::table('message_grd_tbl')->first();
            if ($gredingMsg):
                $dataarray = [
                    'id' => $gredingMsg->id,
                    'title' => $gredingMsg->title,
                    'image' => "http://54.191.10.107/deals4uwebadmin/public/images/adminmessage/" . $gredingMsg->image,
                    'tag' => 'welcome_message'
                ];
                $getToken = DB::table('device_info_tbl')->where('device_id', '=', $deviceId)->first();
                if ($getToken):
                    $devicetoken[] = $getToken->device_token;
                    $this->android($devicetoken, $dataarray);
                    $datainsert = [
                        'user_id' => $userId,
                        'ref_message_grd_id' => $gredingMsg->id,
                        'title' => $gredingMsg->title,
                        'image' => $gredingMsg->image,
                        'device_id' => $request->input('device_id'),
                        'date' => date('Y-m-d H:i:s')
                    ];
                    $SaveLog = DB::table('message_grd_log_tbl')->insert($datainsert);
                    $message = 'registrstion successfully.';
                    $status = 'success';
                else:
                    $message = 'registrstion failed.';
                    $status = 'failed';
                endif;
            else:
                $message = 'registrstion failed.';
                $status = 'failed';
            endif;
        else:
            $SaveData = DB::table('mobile_user_tbl')->insertGetId([
                'ref_role_id' => 3,
                'full_name' => $request->input('full_name'),
                'email' => $request->input('email'),
                'mobile' => $request->input('mobile')
            ]);
            $userId = $SaveData;
            if ($SaveData):
                $gredingMsg = DB::table('message_grd_tbl')->first();
                if ($gredingMsg):
                    $dataarray = [
                        'id' => $gredingMsg->id,
                        'title' => $gredingMsg->title,
                        'image' => "http://54.191.10.107/deals4uwebadmin/public/images/adminmessage/" . $gredingMsg->image,
                        'tag' => 'welcome_message'
                    ];
                    $getToken = DB::table('device_info_tbl')->where('device_id', '=', $deviceId)->first();
                    if ($getToken):
                        $devicetoken[] = $getToken->device_token;
                        $this->android($devicetoken, $dataarray);
                        $datainsert = [
                            'user_id' => $userId,
                            'ref_message_grd_id' => $gredingMsg->id,
                            'title' => $gredingMsg->title,
                            'image' => $gredingMsg->image,
                            'device_id' => $request->input('device_id'),
                            'date' => date('Y-m-d H:i:s')
                        ];
                        $SaveLog = DB::table('message_grd_log_tbl')->insert($datainsert);
                        $message = 'registrstion successfully.';
                        $status = 'success';
                    else:
                        $message = 'registrstion failed.';
                        $status = 'failed';
                    endif;
                else:
                    $message = 'registrstion failed.';
                    $status = 'failed';
                endif;
            else:
                $message = 'registrstion failed.';
                $status = 'failed';
            endif;
        endif;

        return response()->json([
                    'status' => $status,
                    'error' => [],
                    'message' => $message,
                    'code' => 200,
                    'user_id' => $userId
                        ], 200);
    }

    public function adddeviceInfo(Request $request) {

        $inputData = $request->input('key');
        $deviceId = $request->input('device_id');
        $deviceQry = DB::table('device_info_tbl')->where('device_id', '=', $deviceId)->get();
        if (count($deviceQry) > 0):
            $updateData = DB::table('device_info_tbl')
                    ->where('device_id', $deviceId)
                    ->update([
                'device_token' => $request->input('device_token'),
                'user_id' => $request->input('user_id'),
                'platform' => $request->input('platform')
            ]);
        /*
          elseif ((count($deviceQry) > 0) AND ( $request->input('user_id') != NULL)):
          $updateData = DB::table('device_info_tbl')
          ->where('device_id', $deviceId)
          ->update([
          'user_id' => $request->input('user_id'),
          'platform' => $request->input('platform')
          ]);
         * 
         */
        else:
            $SaveData = DB::table('device_info_tbl')->insert([
                'device_token' => $request->input('device_token'),
                'user_id' => '',
                'device_id' => $request->input('device_id'),
                'platform' => $request->input('platform')
            ]);
        endif;

        return response()->json([
                    'status' => 'success',
                    'error' => [],
                    'message' => 'Data provided',
                    'code' => 200
                        ], 200);
    }

    public function latlngList(Request $request) {

        $inputData = $request->input('key');
        $latlngList = DB::table('brand_address_tbl')->whereNotNull('lat')->get();

        $datarow = [];

        foreach ($latlngList as $value):
            $datarow[] = [
                'lat' => $value->lat,
                'lng' => $value->lng,
                'address' => $value->address,
                'ref_dealinfo_id' => $value->ref_dealinfo_id,
                'cat_id' => $value->cat_id
            ];
        endforeach;

        return response()->json([
                    'status' => 'success',
                    'error' => [],
                    'message' => 'Data provided',
                    'code' => 200,
                    'data' => $datarow
                        ], 200);
    }

    public function categoryWiseLatLng(Request $request) {

        $inputData = $request->input('key');
        $catid = $request->input('category_id');
        $date = date('Y-m-d');
        $catidD = explode(',', $catid);
        foreach ($catidD as $id):
            $dataarr[] = (int) $id;
        endforeach;

        $latlngList = DB::table('brand_address_tbl')
                ->select(
                        'brand_address_tbl.lat', 'brand_address_tbl.lng', 'brand_address_tbl.address', 'brand_dealinfo_tbl.title'
                )
                ->join('address_details', 'brand_address_tbl.ref_dealinfo_id', '=', 'address_details.ref_deals_id')
                ->join('brand_dealinfo_tbl', 'address_details.ref_deals_id', '=', 'brand_dealinfo_tbl.id')
                ->where('brand_dealinfo_tbl.start_date', '<=', $date)
                ->where('brand_dealinfo_tbl.end_date', '>=', $date)
                ->where('brand_dealinfo_tbl.flag', '=', 1)
                ->whereIn('address_details.category_id', $dataarr)
                ->whereNotNull('brand_address_tbl.lat')
                //->distinct()
                ->get();
        $categoryList = DB::table('category')->whereIn('id', $dataarr)->get();

        $datarow2 = [];

        foreach ($categoryList as $value):
            $datarow2[] = [
                'categoryname' => $value->category_title
            ];
        endforeach;

        $datarow = [];

        foreach ($latlngList as $value):
            $datarow[] = [
                'lat' => $value->lat,
                'lng' => $value->lng,
                'address' => $value->address,
                'title' => $value->title,
                'category' => $datarow2
            ];
        endforeach;

        return response()->json([
                    'status' => 'success',
                    'error' => [],
                    'message' => 'Data provided',
                    'code' => 200,
                    'data' => $datarow
                        ], 200);
    }

    //show three types of message
    public function message(Request $request) {

        $inputData = $request->input('key');
        $user_id = $request->input('user_id');
        $device_id = $request->input('device_id');

        $datarow = [];

        $welcomemessage = DB::table('message_grd_log_tbl')->where('user_id', '=', $user_id)->where('device_id', '=', $device_id)->where('isDeleted', '=', 0)->orderBy('date', 'desc')->get();

        foreach ($welcomemessage as $value):
            $datarow[] = [
                'banner' => "/images/adminmessage/" . $value->image,
                'id' => $value->ref_message_grd_id,
                'tag' => 'welcome_message'
            ];
        endforeach;

        $message = DB::table('message_log_tbl')->where('user_id', '=', $user_id)->where('device_id', '=', $device_id)->where('isDeleted', '=', 0)->orderBy('date', 'desc')->get();

        foreach ($message as $value):
            $datarow[] = [
                'banner' => "/images/adminmessage/" . $value->image,
                'id' => $value->ref_message_id,
                'tag' => 'admin'
            ];
        endforeach;

        $notificationmessage = DB::table('notification_log_tbl')->where('user_id', '=', $user_id)->where('device_id', '=', $device_id)->where('isDeleted', '=', 0)->orderBy('date', 'desc')->get();

        foreach ($notificationmessage as $value):
            $datarow[] = [
                'banner' => "/images/productimages/" . $value->image,
                'id' => $value->ref_deals_id,
                'tag' => 'brand_user'
            ];
        endforeach;

        return response()->json([
                    'status' => 'success',
                    'error' => [],
                    'message' => 'Data provided',
                    'code' => 200,
                    'data' => $datarow
                        ], 200);
    }

    public function deleteAdminMsg(Request $request) {

        $inputData = $request->input('key');
        $user_id = $request->input('user_id');
        $messageId = $request->input('message_id');
        $tag = $request->input('tag');
        if ($tag == 'admin'):
            $DeleteData = DB::table('message_log_tbl')
                    ->where('user_id', '=', $user_id)
                    ->where('ref_message_id', '=', $messageId)
                    ->update([
                'isDeleted' => 1
            ]);
        else:
            $DeleteData = DB::table('message_grd_log_tbl')
                    ->where('ref_message_grd_id', '=', $messageId)
                    ->update([
                'isDeleted' => 1
            ]);
        endif;
        if ($DeleteData):
            $status = 'success';
            $message = 'Delete message';
        else:
            $status = 'failed';
            $message = 'Delete message failed';
        endif;
        return response()->json([
                    'status' => $status,
                    'error' => [],
                    'message' => $message,
                    'code' => 200
                        ], 200);
    }

    public function messagedetails(Request $request) {

        $id = $request->input('id');
        $key = $request->input('key');

        $tag = $request->input('tag');
        if ($tag == 'admin'):
            $messageDetails = DB::table('message')->where('id', '=', $id)->get();
            $datarow = [];
            foreach ($messageDetails as $details):
                $datarow = [
                    'banner' => "/images/adminmessage/" . $details->images,
                    'details' => $details->description
                ];
            endforeach;
        else:
            $messageDetails = DB::table('message_grd_tbl')->where('id', '=', $id)->get();
            $datarow = [];
            foreach ($messageDetails as $details):
                $datarow = [
                    'banner' => "/images/adminmessage/" . $details->image,
                    'details' => $details->title
                ];
            endforeach;
        endif;
        return response()->json([
                    'status' => 'success',
                    'error' => [],
                    'message' => 'Data provided',
                    'code' => 200,
                    'data' => $datarow
                        ], 200);
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
        return DealsController::useCurl($url, $headers, json_encode($fields));
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
