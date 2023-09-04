<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\RegistrationRequest;
use App\Http\Services\Auth\RegistrationService;
class RegisterController extends Controller
{
    
    protected $userInput;
    public function __construct(RegistrationService $userInput) {
        $this->userInput = $userInput;
    }
    public function index(Request $request) {
        if (Auth::check())
            return redirect('/');
        return view('auth.register', [
            'title' => 'Đăng ký'
        ]);
    }
    public function store(RegistrationRequest $request) {
        $this->userInput->insert($request);
        return redirect()->back();
    }
}
