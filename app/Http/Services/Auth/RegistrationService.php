<?php

namespace App\Http\Services\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;



class RegistrationService
{
    public function insert($request) {
        try {
            $request->offsetUnset('_token');
            $user = User::create($request->all());
            Auth::login($user);
        } catch(\Exception $e) {
            Session::flash('error', 'Register failá');
            return false;
        }
    }
}
