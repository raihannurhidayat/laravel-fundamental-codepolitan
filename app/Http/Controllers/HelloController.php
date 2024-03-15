<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index(){
        echo "Hello Wprld";
    }

    public function world (){
        echo "World";
    }
}
