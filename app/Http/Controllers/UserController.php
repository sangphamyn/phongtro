<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index() {
        $id=Auth::user()->id;
        $da_duyet = DB::select('select count(id) as a from posts where author = ' .$id. ' and trangthai = 1');
        $doi_duyet = DB::select('select count(id) as a from posts where author = ' .$id. ' and trangthai = 0');
        $tu_choi = DB::select('select count(id) as a from posts where author = ' .$id. ' and trangthai = 2');
        return view('profile.index', [
            'title' => 'Thông tin cá nhân',
            'dad' => $da_duyet[0]->a,
            'doid' => $doi_duyet[0]->a, 
            'tc' => $tu_choi[0]->a          
        ]);
    }
    public function edit() {
        return view('profile.edit', [
            'title' => 'Chỉnh sửa thông tin cá nhân'
        ]);
    }
    public function update(Request $request) {
        $name = $request->input('name') != '' ? $request->input('name') : Auth::user()->name;
        $avatar = $request->input('avatar') != '' ? $request->input('avatar') : Auth::user()->avatar;
        $password = $request->input('password') != '';
        $diachi = $request->input('address') != '' ? $request->input('address') : Auth::user()->diachi;
        $ngaysinh = $request->input('ngaysinh') != '' ? $request->input('ngaysinh') : Auth::user()->ngaysinh;
        if($password != '') {
            $password = $request->input('password');
            if($password != $request->input('password1')) {
                return redirect()->back()->with('error', 'Nhập lại mật khẩu không chính xác');
            }
        } else {
            $password = Auth::user()->password;
        }
        User::where('id', Auth::id())->update(['name' => $name, 'avatar' => $avatar, 'password' => $password, 'diachi' => $diachi, 'ngaysinh' => $ngaysinh]);
        return redirect()->back()->with('success', 'Update success');
    }
    //select * from posts, images, post_services, services where author = 1 and trangthai = 1 and posts.id = images.id_post AND posts.id = post_services.id_post AND services.id = post_services.id_services
    public function dadang() {
        $id=Auth::user()->id;
        // $posts = DB::select('select * from posts, images where author = ' .$id. ' and trangthai = 1 and posts.id = images.id_post');
        $id=Auth::user()->id;
        $da_duyet = DB::select('select count(id) as a from posts where author = ' .$id. ' and (trangthai = 1 or trangthai = 4)' );
        $doi_duyet = DB::select('select count(id) as a from posts where author = ' .$id. ' and trangthai = 0');
        $tu_choi = DB::select('select count(id) as a from posts where author = ' .$id. ' and trangthai = 2');
        $posts = Post::with('huyen')->with('xa')->with('services')->with('images')
                        ->where('author','=',$id)
                        ->where('trangthai','=','1')
                        ->orWhere('trangthai','=','4')
                        ->paginate();
        return view('profile.dadang', [
            'title' => 'Danh sách bài đã được duyệt',
            'posts' => $posts,
            'dad' => $da_duyet[0]->a,
            'doid' => $doi_duyet[0]->a, 
            'tc' => $tu_choi[0]->a
        ]);
    }
    public function chuaduyet() {
        $id=Auth::user()->id;
        // $posts = DB::select('select * from posts, images where author = ' .$id. ' and trangthai = 1 and posts.id = images.id_post');
        $id=Auth::user()->id;
        $da_duyet = DB::select('select count(id) as a from posts where author = ' .$id. ' and (trangthai = 1 or trangthai = 4)');
        $doi_duyet = DB::select('select count(id) as a from posts where author = ' .$id. ' and trangthai = 0');
        $tu_choi = DB::select('select count(id) as a from posts where author = ' .$id. ' and trangthai = 2');
        $posts = Post::with('huyen')->with('xa')->with('services')->with('images')
                        ->where('author','=',$id)
                        ->where('trangthai','=','0')
                        ->paginate();
        return view('profile.chuaduyet', [
            'title' => 'Danh sách bài chưa được duyệt',
            'posts' => $posts,
            'dad' => $da_duyet[0]->a,
            'doid' => $doi_duyet[0]->a, 
            'tc' => $tu_choi[0]->a
        ]);
    }
    public function tuchoi() {
        $id=Auth::user()->id;
        // $posts = DB::select('select * from posts, images where author = ' .$id. ' and trangthai = 1 and posts.id = images.id_post');
        $id=Auth::user()->id;
        $da_duyet = DB::select('select count(id) as a from posts where author = ' .$id. ' and (trangthai = 1 or trangthai = 4)');
        $doi_duyet = DB::select('select count(id) as a from posts where author = ' .$id. ' and trangthai = 0');
        $tu_choi = DB::select('select count(id) as a from posts where author = ' .$id. ' and trangthai = 2');
        $posts = Post::with('huyen')->with('xa')->with('services')->with('images')
                        ->where('author','=',$id)
                        ->where('trangthai','=','2')
                        ->paginate();
        return view('profile.tuchoi', [
            'title' => 'Danh sách bài bị từ chối',
            'posts' => $posts,
            'dad' => $da_duyet[0]->a,
            'doid' => $doi_duyet[0]->a, 
            'tc' => $tu_choi[0]->a
        ]);
    }
}
