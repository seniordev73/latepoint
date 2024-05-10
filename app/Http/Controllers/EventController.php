<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventExtend;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Allevents = Event::with(['extendedProps'=>function ($query)  {
            return $query->select('calendar');
        }])->get();
        // dd($Allevents);
        $events = [];
        foreach ($Allevents as $event) {
            $event['extendedProps'] = $event['extendedProps'];
            array_push($events, $event);
        }
        return response()->json(['status'=>true,'data'=>$events,'message'=>'Event successfully added']);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        try {
            $data = $request->all();
            if ($request->has('id')) {
                // Property exists, access the value using $request->name
                $event = Event::find($request->id);
                $eventextend = EventExtend::where('event_id',$event->id)->first();
                if (!empty($request->guests)) {
                    $data['guests'] = implode(', ',$request->guests); 
                }
                $event->update($request->except(['_token']));
                
                $eventextend->update($data);
                // ...
              } else {
                // dd($data);
                $event = Event::create($request->except(['_token']));
                if (!empty($request->guests)) {
                    $data['guests'] = implode(', ',$request->guests); 
                }
                $data['event_id'] = $event->id;
                $eventextend = EventExtend::create($data);
            }
            if ($event) {
                return response()->json(['status'=>true,'message'=>'Event successfully added']);
            }
            return response()->json(['status'=>false,'message'=>'Event successfully added']);
        } catch (\Throwable $th) {
            return response()->json(['status'=>false,'message'=>$th->getMessage()]);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $eventextend = EventExtend::where('event_id', $event->id)->first();
        $eventextend->delete();
        $event->delete();
        return response()->json(['message' => 'Product deleted successfully!']);    
    }
}
