<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthenticateRequest;
use App\Models\User;
use App\Services\AuthenticationService;

class AuthenticationController extends Controller
{

    public function __construct(protected readonly AuthenticationService $authenticationService){
    }

    public function Authenticate(AuthenticateRequest $request) {
        if(!$user = $this->authenticationService->AuthenticateUser($request)) {
            return back()->withErrors([
                'email' => 'Credentials not found.',
            ])->onlyInput('email');
        }

        return redirect()->route($this->redirectTo($user));
    }

    protected function redirectTo(User $user): string {
        if($user->hasRole('agent')) {
            return route('agent.dashboard');
        }
        return route('user.dashboard');
    }
}
