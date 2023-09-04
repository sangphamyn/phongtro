<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index() {
        return view('profile.index', [
            'title' => 'Thông tin cá nhân'
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
                return redirect()->back()->with('error', 'Confirm password not match');
            }
        } else {
            $password = Auth::user()->password;
        }
        User::where('id', Auth::id())->update(['name' => $name, 'avatar' => $avatar, 'password' => $password, 'diachi' => $diachi, 'ngaysinh' => $ngaysinh]);
        return redirect()->back()->with('success', 'Update success');
    }
}
