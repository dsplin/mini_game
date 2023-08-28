<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationRequest;
use App\Services\UniqueLinkService;
use App\Services\UserService;

class RegistrationController extends Controller
{
    protected $uniqueLinkService;
    protected $userService;

    public function __construct(UniqueLinkService $uniqueLinkService, UserService $userService)
    {
        $this->uniqueLinkService = $uniqueLinkService;
        $this->userService = $userService;
    }

    public function showRegistrationForm()
    {
        return view('auth/registration');
    }

    public function register(RegistrationRequest $request)
    {
        $user = $this->userService->createUser(
            $request->input('username'),
            $request->input('phonenumber')
        );

        $uniqueLink = $this->uniqueLinkService->createUniqueLink($user->id);

        return redirect()->route('registration.form')
            ->with('success', 'Registration successful.')
            ->with('uniqueLink', $uniqueLink->link);
    }
}
