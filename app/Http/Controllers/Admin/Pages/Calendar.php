<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class Calendar extends Controller
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
    return view('content.apps.app-calendar',compact('events'));
  }
}
