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

class ProfileController extends Controller {

    public function __construct() {
        
    }

    public function index() {
        $data['active_menu'] = 'profile';
        $loginId = Session::get('login_id');
        $data['profileInfo'] = DB::table('brand_user_tbl')->where('id', '=', $loginId)->get();
        return view('controlpanel.profile.profile', $data);
    }

    public function adminprofile() {
        $data['active_menu'] = 'admin-profile';
        $data['adminProfile'] = DB::table('admin_user_tbl')->get();
        return view('controlpanel.profile.admin-profile', $data);
    }

    public function edit($id = '') {
        $data['active_menu'] = 'profile';
        $data['profileInfo'] = DB::table('brand_user_tbl')->where('id', '=', $id)->first();
        return view('controlpanel.profile.profile-edit', $data);
    }

    public function brandedit($id = '') {
        $data['active_menu'] = 'profile';
        $data['profileInfo'] = DB::table('brand_user_tbl')->where('id', '=', $id)->first();
        return view('controlpanel.profile.brand-profile-edit', $data);
    }

    public function updateprofile(Request $request) {
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
                return Redirect::to('profile');
            else :
                $dt = date_create();
                $time = date_format($dt, 'YmdHis');
                $photo_name = $time . '.png';
                $profile_pic->move(base_path() . '/public/images/productimages/', $photo_name);

                $updateBrandInfo = DB::table('brand_user_tbl')
                        ->where('id', $request->input('loginid'))
                        ->update([
                    'brand_logo' => $photo_name,
                    'address' => $request->input('address'),
                    'contact_person_1' => $request->input('contact_person_1'),
                    'email_1' => $request->input('email_1'),
                    'mobile_1' => $request->input('mobile_1'),
                    'contact_person_2' => $request->input('contact_person_2'),
                    'email_2' => $request->input('email_2'),
                    'mobile_2' => $request->input('mobile_2'),
                    'website' => $request->input('website'),
                    'status' => 1
                ]);

                if ($updateBrandInfo):
                    Session::flash('success_message', ' Successfully Updated !!!');
                    return Redirect::to('profile');
                else:
                    Session::flash('success_message', ' Successfully Updated !!!');
                    return Redirect::to('profile');
                endif;
            endif;
        else :
            Session::flash('error_message', ' One or more mandatory fields are empty !!!');
            return Redirect::to('profile');
        endif;
    }

    public function update(Request $request) {
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
                return Redirect::to('profile');
            else :
                $dt = date_create();
                $time = date_format($dt, 'YmdHis');
                $photo_name = $time . '.png';
                $profile_pic->move(base_path() . '/public/images/productimages/', $photo_name);

                $updateBrandInfo = DB::table('brand_user_tbl')
                        ->where('id', $request->input('loginid'))
                        ->update([
                    'brand_logo' => $photo_name,
                    'email' => $request->input('email'),
                    'mobile' => $request->input('mobile'),
                    'address' => $request->input('address'),
                    'contact_person_1' => $request->input('contact_person_1'),
                    'email_1' => $request->input('email_1'),
                    'mobile_1' => $request->input('mobile_1'),
                    'contact_person_2' => $request->input('contact_person_2'),
                    'email_2' => $request->input('email_2'),
                    'mobile_2' => $request->input('mobile_2'),
                    'website' => $request->input('website'),
                    'status' => 1
                ]);

                if ($updateBrandInfo):
                    Session::flash('success_message', ' Successfully Updated !!!');
                    return Redirect::to('profile');
                else:
                    Session::flash('success_message', ' Successfully Updated !!!');
                    return Redirect::to('profile');
                endif;
            endif;
        else :
            $updateBrandInfo = DB::table('brand_user_tbl')
                    ->where('id', $request->input('loginid'))
                    ->update([
                'brand_logo' => $request->input('fthumb_1'),
                'email' => $request->input('email'),
                'mobile' => $request->input('mobile'),
                'address' => $request->input('address'),
                'contact_person_1' => $request->input('contact_person_1'),
                'email_1' => $request->input('email_1'),
                'mobile_1' => $request->input('mobile_1'),
                'contact_person_2' => $request->input('contact_person_2'),
                'email_2' => $request->input('email_2'),
                'mobile_2' => $request->input('mobile_2'),
                'website' => $request->input('website'),
                'status' => 1
            ]);

            if ($updateBrandInfo):
                Session::flash('success_message', ' Successfully Updated !!!');
                return Redirect::to('profile');
            else:
                Session::flash('success_message', ' Successfully Updated !!!');
                return Redirect::to('profile');
            endif;
        endif;
    }

    public function changepassword() {
        $data['active_menu'] = 'changepassword';
        return view('controlpanel.profile.changepassword', $data);
    }

    public function passwordstore(Request $request) {
        $login_id = $request->input('login_id');
        $old_password = $request->input('old_password');
        $password = $request->input('password');
        $getPasswordQry = DB::table('brand_user_tbl')->where('id', '=', $login_id)->first();
        if ($getPasswordQry):
            if ($getPasswordQry->password == md5($old_password)):
                $updatePassword = DB::table('brand_user_tbl')
                        ->where('id', $login_id)
                        ->update(['password' => md5($password)]);
                if ($updatePassword):
                    Session::flash('success_message', ' Successfully Updated !!!');
                    return Redirect::to('changepassword');
                else:
                    Session::flash('error_message', ' Failed To Updated !!!');
                    return Redirect::to('changepassword');
                endif;
            else:
                Session::flash('error_message', ' Password not match !!!');
                return Redirect::to('changepassword');
            endif;
        else:
            Session::flash('error_message', ' Password not match !!!');
            return Redirect::to('changepassword');
        endif;
    }

}
