<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WardController extends Controller
{
    public function search(Request $request)
    {
        $output = '';
        if ($request->ajax()) {
           $xas = DB::select('select * from wards where id_dt = ' . $request->search);
           if($xas) {
            foreach($xas as $key => $xa) {
                $output .= '<option value="' . $xa->id .'">'. $xa->name .'</option>';
            }
           }
        }
        return $output;
    }
    public function addtowishlist(Request $request) {
        if($request->ajax()) {
            DB::select("insert into wishlists(id_user,id_post) values (" . Auth::user()->id . "," . $request->post_id .")");
            return 'success';
        }
    }

    public function removewishlist(Request $request) {
        if($request->ajax()) {
            DB::select("DELETE FROM wishlists WHERE id_user = " . Auth::user()->id . " AND id_post = " . $request->post_id);
            return 'success';
        }
    }
}
