<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserServices;
use Illuminate\Support\Facades\Auth;


class RegisterController extends Controller
{

    public function __construct(private UserServices $userServices)
    {
    }

    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {

       $result = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed'
        ]);

        $user = $this->userServices->createUser(
            $result['name'],
            $result['email'],
            $result['password']
        );

        Auth::login($user);

        $request->session()->regenerate();

        return redirect()->route('dashboard');

    }
}
