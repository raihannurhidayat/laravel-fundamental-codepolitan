<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {

        return view("auth.login");
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect("posts");
        } else {
            return redirect("login")->with('Error_Message', "wrong email or password");
        }
    }

    public function register()
    {
        return view("auth.register");
    }

    public function createUser(Request $request)
    {

        // if (!($request->input('password') == $request->input('password_confirm'))) {
        //     return redirect("register")->with('status', 'Password and Confrim password not equal');
        // }

        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        User::create([
            'name' => $request->input("name"),
            "email" => $request->input("email"),
            "password" => Hash::make($request->input("password")),
        ]);

        return redirect("login")->with('status', 'user created');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect('login');
    }
}
