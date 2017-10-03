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
use Illuminate\Support\Facades\Mail;
use Swift_Transport;
use Swift_Message;
use Swift_Mailer;

class UploadController extends Controller {

    public function __construct() {
        
    }

    public function index() {
        $data['active_menu'] = 'upload';
        $data['categoryList'] = DB::table('category')->get();
        return view('controlpanel.upload.upload-brand', $data);
    }

    public function store(Request $request) {
        $brandId = Session::get('brand_id');
        $profile_pic = $request->file('fthumb_1');
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
                return Redirect::to('upload-brand')->withInput();
            else :
                $category = $request->input('category');
                $my_category = '';
                if (count($category) > 0):
                    foreach ($category as $cat):
                        $my_category = $my_category . $cat . ',';
                    endforeach;
                endif;
                $my_category = rtrim($my_category, ',');
                if ($request->input('start_date') == ''):
                    $start_date = date('Y-m-d');
                    $date_status = 0;
                else:
                    $sdate = $request->input('start_date');
                    $a = explode('-', $sdate);
                    $start_date = $a[2] . '-' . $a[1] . '-' . $a[0];
                    $date_status = 1;
                endif;

                $edate = $request->input('end_date');
                $b = explode('-', $edate);
                $end_date = $b[2] . '-' . $b[1] . '-' . $b[0];
                if ($request->input('phonenumber') == ''):
                    $phoneNumber = '';
                else:
                    $phoneNumber = '+88' . $request->input('phonenumber');
                endif;
                $dt = date_create();
                $time = date_format($dt, 'YmdHis');
                $photo_name = $time . '.png';
                $profile_pic->move(base_path() . '/public/images/productimages/', $photo_name);
                $data = [
                    'banner_image' => $photo_name,
                    'title' => $request->input('title'),
                    'keyword' => $request->input('keyword'),
                    'mobile' => $phoneNumber,
                    'start_date' => $start_date,
                    'end_date' => $end_date,
                    'input_date_status' => $date_status,
                    'category' => $my_category,
                    'ref_brand_id' => $brandId,
                    'details' => $_POST['editor1'],
                    'url' => $request->input('url'),
                    'date' => date('Y-m-d H:i:s')
                ];
                $SaveDatadealinfo = DB::table('brand_dealinfo_tbl')->insertGetId($data);
                $dealinfo_id = $SaveDatadealinfo;
                $myInputs = $_POST["myInputs"];
                foreach ($myInputs as $eachInput) {
                    if (!empty($eachInput)) {
                        $addressData[] = [
                            'ref_dealinfo_id' => $dealinfo_id,
                            'address' => $eachInput,
                            'date' => date('Y-m-d')
                        ];
                    }
                }
                $SaveData = DB::table('brand_address_tbl')->insert($addressData);
                if (count($category) > 0):
                    foreach ($category as $cat):
                        $SaveData = DB::table('address_details')->insert([
                            'ref_deals_id' => $dealinfo_id,
                            'category_id' => $cat
                        ]);
                    endforeach;
                endif;

                $backup = \Mail::getSwiftMailer();
                $transport = \Swift_SmtpTransport::newInstance('smtp.gmail.com', 587, 'tls');
                $transport->setUsername('fahmid.masud@icebd.com');
                $transport->setPassword('fahmid123');
                $brandName = DB::table('brand_list')->where('id', '=', $brandId)->first();
                $data = array(
                    'deals_id' => $dealinfo_id,
                );
                $gmail = new Swift_Mailer($transport);
                \Mail::setSwiftMailer($gmail);
                Mail::send('emails.emails', $data, function($message) use ($brandName) {
                    $message->to('fahmid.masud@icebd.com', 'Fabien')->from('fahmid.masud@icebd.com')->subject('New deal upload from ' . $brandName->brand_title);
                });
                if ($SaveData):
                    Session::flash('success_message', ' Successfully Uploaded !!!');
                    return Redirect::to('upload-brand');
                endif;
            endif;
        else :
            Session::flash('error_message', ' One or more mandatory fields are empty !!!');
            return Redirect::to('upload-brand');
        endif;
    }

}
