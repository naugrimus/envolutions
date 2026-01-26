<?php

namespace App\Services;

use App\Http\Requests\AuthenticateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthenticationService
{

    public function AuthenticateUser(AuthenticateRequest $request): ?User {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return auth()->user();
        }

        return null;
    }
}
