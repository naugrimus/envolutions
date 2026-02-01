<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthenticateRequest;
use App\Services\AuthenticationService;
use Illuminate\Http\RedirectResponse;

class AuthenticationController extends Controller
{

    public function __construct(protected readonly AuthenticationService $authenticationService){
    }

    public function Authenticate(AuthenticateRequest $request):?RedirectResponse {
        if(!$this->authenticationService->AuthenticateUser($request)) {
            return back()->withErrors([
                'error' => 'Credentials not found.',
            ])->onlyInput('email');
        }

        return redirect()->route('ticket.index');
    }

}
