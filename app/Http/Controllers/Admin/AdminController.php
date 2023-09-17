<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\banned_acc;
use App\Models\User;
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
            $users = User::where('trangthai','=','1')->get();
            return view('admin.user', [
                'title' => 'Danh sách người dùng',
                'users' => $users
            ]);
        } else {
            return redirect('/');
        }
    }
    public function getUserbanned() {
        if(Auth::check() && Auth::user()->role == 1) {
            $users = User::with('banned')->where('trangthai','=','0')->get();
            return view('admin.user_banned', [
                'title' => 'Danh sách người dùng bị khóa',
                'users' => $users
            ]);
        } else {
            return redirect('/');
        }
    }

    public function block(Request $request) {
        if(Auth::check() && Auth::user()->role == 1) {
            $request->offsetUnset('_token');
            banned_acc::insert(["id_user" => $request->id, "id_admin" => Auth::user()->id, "reason" => $request->reason]);
            DB::select('UPDATE users SET trangthai = 0 WHERE id = ' . $request->id);
            return redirect('/admin/banned_user');
        } else {
            return redirect('/');
        }
    }
    public function unblock(Request $request) {
        if(Auth::check() && Auth::user()->role == 1) {
            $request->offsetUnset('_token');
            DB::select('DELETE FROM banned_accs WHERE id_user = ' . $request->id);
            DB::select('UPDATE users SET trangthai = 1 WHERE id = ' . $request->id);
            return redirect('/admin/banned_user');
        } else {
            return redirect('/');
        }
    }
}
