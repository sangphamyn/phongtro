<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\District;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        if (Auth::check())
            return redirect()->to('/');
        return view('auth.login', [
            'title' => 'Đăng nhập'
        ]);
    }
    public function store(LoginRequest $request) {
        if(Auth::user()->role == 1)
            return redirect()->to('/admin');
        return redirect()->to('/');
    }
    public function destroy() {
        Auth::logout();
        return redirect('/');
    }

    public function home() {
        $districts = District::get();
        $services = Service::get();
        return view('home', [
            'title' => "Trang chủ",
            'districts' => $districts,
            'services' => $services
        ]);
    }
}
