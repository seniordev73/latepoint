<?php

namespace App\Http\Controllers\Admin\Settings\Processes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Process;

class Processes extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $processes = Process::all();
        return view('content.settings.processes.processes', compact('processes'));
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

        $process = new Process();
        $process->name = $request->process['name'];
        $process->status = $request->process['status'];
        $process->event_type = $request->process['event']['type'];
        $allActions = [
            "event" => $request->process['event'],
            "actions" => $request->process['actions']
        ];
        $process->actions_json = serialize($allActions);
        $process->save();

        return redirect('/settings/processes')->with('success', 'process created successfully.');
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
        $process = Process::findOrFail($id);
        $process->name = $request->process['name'];
        $process->status = $request->process['status'];
        $process->event_type = $request->process['event']['type'];
        $allActions = [
            "event" => $request->process['event'],
            "actions" => $request->process['actions']
        ];
        $process->actions_json = serialize($allActions);

        // dd($tax->value);
        $process->save();

        return redirect('/settings/processes')->with('success', 'process created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $process = Process::findOrFail($id);
        $process->delete();

        return redirect('/settings/processes')->with('success', 'process created successfully.');
    }
}
