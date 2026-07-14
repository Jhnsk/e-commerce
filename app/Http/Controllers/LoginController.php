<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserServices;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct(private UserServices $userServices)
    {
    }

    public function login()
    {
        return view('auth.login');
    }

    public function checkUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        try {

            $user = $this->userServices->validateUser(
                $request->email,
                $request->password
            );

            Auth::login($user);

            $request->session()->regenerate();

            return redirect()->route('dashboard');

        } catch (\Exception $e) {
            return back()->withErrors([
                'login' => $e->getMessage()
            ]);
        }

    }

}
