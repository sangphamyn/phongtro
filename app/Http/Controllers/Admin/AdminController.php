<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\banned_acc;
use App\Models\Post;
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
                'active' => 'qlnd',
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
                'active' => 'qlnd',
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
    public function topUp(Request $request) {
        if(Auth::check() && Auth::user()->role == 1) {
            $request->offsetUnset('_token');
            DB::select('UPDATE users SET sodu = sodu + '.$request->money.' WHERE id = ' . $request->id);
            return redirect('/admin/user');
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
    public function duyet(Request $request) {
        if(Auth::check() && Auth::user()->role == 1) {
            $request->offsetUnset('_token');
            DB::select('UPDATE posts SET trangthai = 1 WHERE id = ' . $request->id);
            return redirect('/admin/post?trangthai=1');
        } else {
            return redirect('/');
        }
    }public function tuchoi(Request $request) {
        if(Auth::check() && Auth::user()->role == 1) {
            $request->offsetUnset('_token');
            DB::select('UPDATE posts SET trangthai = 2 WHERE id = ' . $request->id);
            return redirect('/admin/post?trangthai=2');
        } else {
            return redirect('/');
        }
    }
    public function getPost(Request $request) {
        $trangthai = $request->trangthai;
        if($trangthai==1) $title = "Danh sách đã duyệt";
        elseif($trangthai==0) $title = "Danh sách chưa duyệt";
        else $title = "Danh sách từ chối";
        if(Auth::check() && Auth::user()->role == 1) {
            $posts = Post::where('trangthai','=',$trangthai)->with('huyen')->with('xa')->with('services')->with('images')->paginate();
            return view('admin.post', [
                'title' => 'Danh sách bài đăng',
                'active' => 'qlbd',
                'posts' => $posts]);
        } else {
            return redirect('/');
        }
    }
}
 