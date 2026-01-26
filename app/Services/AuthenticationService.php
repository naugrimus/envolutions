<?php

namespace App\Services;

use App\Http\Requests\AuthenticateRequest;
use Illuminate\Support\Facades\Auth;

class AuthenticationService
{

    public function AuthenticateUser(AuthenticateRequest $request): bool {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return true;
        }

        return false;
    }
}
