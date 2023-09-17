<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\District;
use App\Models\Service;
use App\Models\Post;
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

        $new_posts = Post::where('trangthai','=','1')->with('huyen')->with('xa')->with('services')->with('images')->orderBy('created_at', 'desc')->paginate(8);
        $tptn = DB::select('select count(id) as a from posts where id_dt = 1');
        $tppy = DB::select('select count(id) as a from posts where id_dt = 8');
        $tpsc = DB::select('select count(id) as a from posts where id_dt = 2');
        $hpb = DB::select('select count(id) as a from posts where id_dt = 9');
        $hdt = DB::select('select count(id) as a from posts where id_dt = 7');
        return view('home', [
            'title' => "Trang chủ",
            'districts' => $districts,
            'services' => $services,
            'tptn' => $tptn[0]->a,
            'tppy' => $tppy[0]->a,
            'tpsc' => $tpsc[0]->a,
            'hpb' => $hpb[0]->a,
            'hdt' => $hdt[0]->a,
            'new_posts'=>$new_posts
        ]);
    }
}
