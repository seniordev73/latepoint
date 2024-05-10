<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\Customer;
use App\Models\Service;
use Illuminate\Http\Request;

class agent_Dashboard extends Controller
{
  public function index()
  {
    $customerCnt = Customer::count();
    $agents = Agent::all();
    $services = Service::all();
    return view('agent.dashboard', compact("agents", "services"));
  }
}