<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Model\ActivityLogModel;
use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use Redirect;
use Crypt;
use Hash;
use DB;

class CustomerController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $data['main_menu'] = 'activitylog';
        $data['sub_menu'] = 'activitylog';
        $data['userList'] = DB::table('users_tbl')->get();
        return view('controlpanel.userlist.userlist', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $DeleteData = DB::table('users_tbl')->where('id', '=', $id)->delete();
        if ($DeleteData):
            Session::flash('success_message', ' Delete Successfully !!!');
        else :
            Session::flash('error_message', ' Delete Failed !!!');
        endif;
        return Redirect::to('customers');
    }

    public function customerstatus($id, $flag) {
        $update = DB::table('users_tbl')
                ->where('id', $id)
                ->update(['status' => $flag]);
        if ($update):
            Session::flash('success_message', ' Delete Successfully !!!');
        else :
            Session::flash('error_message', ' Delete Failed !!!');
        endif;
        return Redirect::to('customers');
    }

}
