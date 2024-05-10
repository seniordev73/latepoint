<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class Schedule extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $checkVal = Setting::query()
            ->where('name', 'LIKE', "%settingweekschedule%")
            ->get();
        $check = $checkVal->count();

        if ($check == 0) {
            return view('content.settings.schedule', compact('check'));
        } else {
            $weekSchedule = $checkVal[0];
            return view('content.settings.schedule', compact('check', 'weekSchedule'));

        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $checkVal = Setting::query()
            ->where('name', 'LIKE', "%settingweekschedule%")
            ->get();
        $check = $checkVal->count();
        if ($check == 0) {
            $settings = Setting::all();
            $count = $settings->count();
            if ($count > 0) {
                $finalId = $settings[$count - 1]->id;
            } else {
                $finalId = 0;
            }

            $schedule = new Setting();
            $schedule->name = "settingweekschedule" . $finalId;
            $schedule->value = serialize($request->work_periods);
        } else {
            $id = $checkVal[0]->id;
            $schedule = Setting::findOrFail($id);
            $schedule->value = serialize($request->work_periods);
        }

        $schedule->save();

        return redirect('/settings/schedule')->with('success', 'Schedule created successfully.');

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
    public function destroy(string $id)
    {
        //
    }
}
