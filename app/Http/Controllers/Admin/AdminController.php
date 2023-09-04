<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index() {
        if(Auth::user()->role == 1)
            return view('admin.index', [
                'title' => 'Admin'
            ]);
        return redirect('/');
    }
    public function getUser() {
        if(Auth::check() && Auth::user()->role == 1) {
            $users = DB::select('select * from users');
            return view('admin.user', compact('users'));
        } else {
            return redirect('/');
        }
    }
}
