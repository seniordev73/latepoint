<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\Customer;
use App\Models\Service;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
  public function index()
  {

    $customerCnt = Customer::count();
    $agents = Agent::all();
    $services = Service::all();
    return view('content.dashboard.dashboard', compact("agents", "services"));
  }
}