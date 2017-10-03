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

class FavoriteController extends Controller {

    public function __construct() {
        
    }

    public function index() {
        $data['brandList'] = DB::table('brand_list')->get();
        $data['active_menu'] = 'favorite';
        return view('controlpanel.favorite.favorite', $data);
    }

    public function store(Request $request) {
        $SaveData = DB::table('brand_list')->insert([
            'brand_title' => $request->input('favorite_name'),
            'brand_details' => $request->input('favorite_details')
        ]);
        if ($SaveData):
            Session::flash('success_message', ' Created successfully !!!');
        else :
            Session::flash('error_message', ' Created failed !!!');
        endif;
        return Redirect::to('favorite');
    }

    public function edit($id) {
        $data['active_menu'] = 'favorite';
        $data['editFavorite'] = 'editFavorite';
        $data['brandList'] = DB::table('brand_list')->get();
        $data['brandInfo'] = DB::table('brand_list')->where('id', '=', $id)->get();
        return view('controlpanel.favorite.favorite', $data);
    }

    public function update(Request $request) {
        $catid = $request->input('catid');
        $updateData = DB::table('brand_list')
                ->where('id', $catid)
                ->update([
            'brand_title' => $request->input('favorite_name'),
            'brand_details' => $request->input('favorite_details')
        ]);
        if ($updateData) :
            Session::flash('success_message', ' Update successfully !!!');
        else:
            Session::flash('error_message', ' update failed !!!');
        endif;
        return Redirect::to('favorite');
    }

    public function destroy($id) {
        $delete = DB::table('brand_list')->where('id', '=', $id)->delete();
        if ($delete) :
            $delete = DB::table('brand_user_tbl')->where('brand_name', '=', $id)->delete();
            Session::flash('success_message', ' Delete successfully !!!');
        else:
            Session::flash('error_message', ' Delete failed !!!');
        endif;
        return Redirect::to('favorite');
    }

    public function brandsignup() {
        $data['active_menu'] = 'favorite';
        return view('controlpanel.favorite.signup-brand-form', $data);
    }

    public function signupstore(Request $request) {
        //save brand name and get the id and save it to brand user table
        $SaveBrand = DB::table('brand_list')->insertGetId([
            'brand_title' => $request->input('brand_name'),
        ]);
        $SaveData = DB::table('brand_user_tbl')->insert([
            'brand_name' => $SaveBrand,
            'email' => $request->input('email'),
            'mobile' => $request->input('mobile'),
            'password' => md5($request->input('password')),
            'date' => date('Y-m-d')
        ]);
        if ($SaveData):
            Session::flash('success_message', ' Signup successfully !!!');
            return Redirect::to('signup-brand');
        else :
            Session::flash('error_message', ' Signup failed !!!');
            return Redirect::to('signup-brand');
        endif;
    }

    public function branduserprofiledetails($id) {
        $data['active_menu'] = 'favorite';
        $data['profileInfo'] = DB::table('brand_user_tbl')->where('brand_name', '=', $id)->first();
        return view('controlpanel.favorite.branduser-profile-details', $data);
    }

    public function branduserprofileedit($id) {
        $data['active_menu'] = 'favorite';
        $data['profileInfo'] = DB::table('brand_user_tbl')->where('brand_name', '=', $id)->first();
        $data['brand_id'] = $id;
        return view('controlpanel.favorite.branduser-profile-edit', $data);
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

                $updateProfileInfo = DB::table('brand_user_tbl')
                        ->insert([
                    'brand_logo' => $photo_name,
                    'brand_name' => $request->input('brand_id'),
                    'address' => $request->input('address'),
                    'contact_person_1' => $request->input('contact_person_1'),
                    'email_1' => $request->input('email_1'),
                    'mobile_1' => $request->input('mobile_1'),
                    'contact_person_2' => $request->input('contact_person_2'),
                    'email_2' => $request->input('email_2'),
                    'mobile_2' => $request->input('mobile_2'),
                    'website' => $request->input('website'),
                    'status' => 1,
                    'date' => date('Y-m-d')
                ]);

                if ($updateProfileInfo):
                    Session::flash('success_message', ' Successfully Updated !!!');
                    return Redirect::to('favorite');
                else:
                    Session::flash('success_message', ' Successfully Updated !!!');
                    return Redirect::to('favorite');
                endif;
            endif;
        else :
            Session::flash('error_message', ' One or more mandatory fields are empty !!!');
            return Redirect::to('favorite');
        endif;
    }

    public function updatebrand(Request $request) {
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
                return Redirect::to('favorite');
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
                    return Redirect::to('favorite');
                else:
                    Session::flash('success_message', ' Successfully Updated !!!');
                    return Redirect::to('favorite');
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
                return Redirect::to('favorite');
            else:
                Session::flash('success_message', ' Successfully Updated !!!');
                return Redirect::to('favorite');
            endif;
        endif;
    }

}
