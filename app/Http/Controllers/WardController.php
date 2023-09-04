<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
}
