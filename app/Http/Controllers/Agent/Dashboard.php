<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;

class Dashboard extends Controller
{
  public function index()
  {
    return view('landing');
  }
}