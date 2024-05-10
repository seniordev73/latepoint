<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class Home extends Controller
{
  public function index()
  {
    return view('landing');
  }
}