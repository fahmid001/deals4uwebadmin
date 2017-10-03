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

class RejectMessageController extends Controller {

    public function __construct() {
        
    }

    public function index() {
        $data['active_menu'] = 'reject-message';
        $data['messageList'] = DB::table('reject_message_tbl')->orderBy('id', 'desc')->get();
        return view('controlpanel.rejectmessage.message-list', $data);
    }

    public function create() {
        $data['active_menu'] = 'reject-message';
        return view('controlpanel.rejectmessage.message', $data);
    }

    public function store(Request $request) {
        $SaveData = DB::table('reject_message_tbl')->insert([
            'title' => $request->input('message_title'),
            'details' => $request->input('details'),
            'date' => date('Y-m-d')
        ]);
        if ($SaveData):
            Session::flash('success_message', ' Reject message save successfully !!!');
        else :
            Session::flash('error_message', ' Reject message save Failed !!!');
        endif;
        return Redirect::to('reject-message');
    }

    public function destroy($id) {
        $delete = DB::table('reject_message_tbl')->where('id', '=', $id)->delete();
        if ($delete) :
            Session::flash('success_message', ' Delete Successfully !!!');
        else:
            Session::flash('error_message', ' Delete Failed !!!');
        endif;
        return Redirect::to('reject-message');
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
