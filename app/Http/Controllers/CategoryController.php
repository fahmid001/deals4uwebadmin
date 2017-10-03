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

class CategoryController extends Controller {

    public function __construct() {
        
    }

    public function index() {
        $data['categoryList'] = DB::table('category')->get();
        $data['active_menu'] = 'category';
        return view('controlpanel.category.category', $data);
    }

    public function store(Request $request) {
        $SaveData = DB::table('category')->insert([
            'category_title' => $request->input('cat_name'),
            'category_details' => $request->input('cat_details')
        ]);
        if ($SaveData):
            Session::flash('success_message', ' Created successfully !!!');
        else :
            Session::flash('error_message', ' Created failed !!!');
        endif;
        return Redirect::to('category');
    }

    public function edit($id) {
        $data['active_menu'] = 'category';
        $data['editCategory'] = 'editCategory';
        $data['categoryList'] = DB::table('category')->get();
        $data['categoryInfo'] = DB::table('category')->where('id', '=', $id)->get();
        return view('controlpanel.category.category', $data);
    }

    public function update(Request $request) {
        $catid = $request->input('catid');
        $updateData = DB::table('category')
                ->where('id', $catid)
                ->update([
            'category_title' => $request->input('cat_name'),
            'category_details' => $request->input('cat_details')
        ]);
        if ($updateData) :
            Session::flash('success_message', ' Update successfully !!!');
        else:
            Session::flash('error_message', ' Update failed !!!');
        endif;
        return Redirect::to('category');
    }

    public function destroy($id) {
        $categoryDelete = DB::table('address_details')->where('category_id', '=', $id)->count();
        if ($categoryDelete > 0):
            Session::flash('error_message', ' Category cannot be deleted. It is used by other one !!!');
        else:
            $delete = DB::table('category')->where('id', '=', $id)->delete();
            if ($delete) :
                Session::flash('success_message', ' Delete successfully !!!');
            else:
                Session::flash('error_message', ' Delete failed !!!');
            endif;
        endif;

        return Redirect::to('category');
    }

}
