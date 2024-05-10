<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    public function index()
    {
        return view('emails.verify');
    }
    public function verify()
    {
        $details = [
            'firstname' => "firstname",
            'lastname' => "lastname",
            'token' => "token",
            'email' => "email"
        ];
        return view('emails.verify', compact('details'));
    }
    public function forgot()
    {
        $token = "token";
        return view('emails.forgotPassword', compact('token'));
    }
}
