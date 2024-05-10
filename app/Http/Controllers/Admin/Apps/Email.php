<?php

namespace App\Http\Controllers\Admin\Apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Email extends Controller
{
  public function index()
  {
    return view('content.apps.app-email');
  }
}
