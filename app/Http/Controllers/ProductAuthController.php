<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductAuthController extends Controller
{
    public function login(){
        return view('products.auth.login');
    }

    public function loginUser(Request $request){
        $credentials = $request->only('email','password');
        if(Auth::attempt($credentials)){
            return redirect('product');
        } else {
            return redirect('loginpage');
        }
    }
}
