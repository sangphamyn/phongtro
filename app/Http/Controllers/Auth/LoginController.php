<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\District;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        if (Auth::check()) {
            if(Auth::user()->trangthai == 0) {
                $reason = DB::select('select reason from banned_accs where id_user = ' . Auth::user()->id)[0]->reason;
                Auth::logout();
                return view('banned', [
                    'title' => 'Đăng nhập',
                    'reason' => $reason
                ]);
            }
            
            else
                return redirect()->to('/');
        }
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
