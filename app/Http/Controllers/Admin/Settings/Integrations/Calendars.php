<?php

namespace App\Http\Controllers\Admin\Settings\Integrations;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class Calendars extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings = Setting::all();
        $results = Setting::query()
            ->where('name', 'LIKE', '%settingscalendar%')
            ->get();
        $count = $results->count();
        if ($count > 0) {
            $result = $results[0];
            $check = 1;
            return view('content.settings.integrations.calendars', compact('result', 'check'));
        } else {
            $check = 0;
            return view('content.settings.integrations.calendars', compact('check'));

        }
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
        $checkVal = Setting::query()
            ->where('name', 'LIKE', "%settingscalendar%")
            ->get();
        $check = $checkVal->count();
        if ($check == 0) {
            $settings = Setting::all();
            $count = $settings->count();
            $finalId = $settings[$count - 1]->id;
            $calendar = new Setting();
            $calendar->name = "settingscalendar" . $finalId;
            $calendar->value = serialize($request->settings);
        } else {
            $calendar = $checkVal[0];
            $calendar->value = serialize($request->settings);
        }
        $calendar->save();
        return redirect('/settings/integrations-calendars')->with('success', 'Calendar created successfully.');
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
        $calendar = Setting::findOrFail($id);
        $calendar->value = serialize($request->settings);
        // dd($tax->value);
        $calendar->save();

        return redirect('/settings/integrations-calendars')->with('success', 'Calendar created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
