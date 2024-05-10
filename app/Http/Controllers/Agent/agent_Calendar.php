<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class agent_Calendar extends Controller
{
  public function index()
  {
    $Allevents = Event::with(['extendedProps'])->get();
        // dd($Allevents);
        $events = [];
        foreach ($Allevents as $event) {
            $event['extendedProps'] = $event['extendedProps'];
            array_push($events, $event);
        }
    return view('agent.app-calendar',compact('events'));
  }
}
