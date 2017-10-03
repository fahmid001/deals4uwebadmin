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

class PromoController extends Controller {

    public function __construct() {
        
    }

    public function index() {
        $brandId = Session::get('brand_id');
        $data['branddealList'] = DB::table('brand_dealinfo_tbl')->where('ref_brand_id', '=', $brandId)->orderBy('id', 'desc')->get();
        $data['active_menu'] = 'promo';
        return view('controlpanel.promo.promo', $data);
    }

    public function details($id, $active) {
        if ($active == 'approve'):
            $data['active_menu'] = 'approve-list';
        elseif ($active == 'pomolist'):
            $data['active_menu'] = 'promo';
        else:
            $data['active_menu'] = 'reject-list';
        endif;
        $data['promoDetails'] = DB::table('brand_dealinfo_tbl')->where('id', '=', $id)->first();
        return view('controlpanel.promo.promo-details', $data);
    }
    
    public function approveddetails($id, $active) {
        if ($active == 'approve'):
            $data['active_menu'] = 'approve-list';
        elseif ($active == 'pomolist'):
            $data['active_menu'] = 'promo';
        else:
            $data['active_menu'] = 'reject-list';
        endif;
        $data['promoDetails'] = DB::table('brand_dealinfo_tbl')->where('id', '=', $id)->first();
        return view('controlpanel.promo.approved-details', $data);
    }

    public function pdetails($id) {
        $data['promoDetails'] = DB::table('brand_dealinfo_tbl')->where('id', '=', $id)->first();
        $data['active_menu'] = 'pending-list';
        return view('controlpanel.promo.p-promo-details', $data);
    }

    public function storelat(Request $request) {
        $div_id = $request->input('value');
        $address_id = $request->input('addressid');
        $updateData = DB::table('brand_address_tbl')
                ->where('id', $address_id)
                ->update([
            'lat' => $div_id
        ]);
        if ($updateData):
            echo 1;
        else:
            echo 0;
        endif;
    }

    public function storelng(Request $request) {
        $div_id = $request->input('value');
        $address_id = $request->input('addressid');
        $updateData = DB::table('brand_address_tbl')
                ->where('id', $address_id)
                ->update([
            'lng' => $div_id
        ]);
        if ($updateData):
            echo 1;
        else:
            echo 0;
        endif;
    }

}
