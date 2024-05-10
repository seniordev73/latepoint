<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;

class Dashboard extends Controller
{
  public function index()
  {
    return view('landing');
  }
}