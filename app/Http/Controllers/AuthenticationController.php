<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthenticateRequest;
use App\Services\AuthenticationService;

class AuthenticationController extends Controller
{

    public function __construct(protected readonly AuthenticationService $authenticationService){
    }

    public function Authenticate(AuthenticateRequest $request) {
        if(!$this->authenticationService->AuthenticateUser($request)) {
            return back()->withErrors([
                'email' => 'Credentials not found.',
            ])->onlyInput('email');
        }

        return redirect()->route('dashboard');
    }
}
