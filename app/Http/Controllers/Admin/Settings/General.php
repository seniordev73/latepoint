<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class General extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $checkVal = Setting::query()
            ->where('name', 'LIKE', "%settingsgeneral%")
            ->get();
        $check = $checkVal->count();
        if ($check == 0) {
            return view('content.settings.general', compact('check'));
        } else {
            $general = $checkVal[0];
            return view('content.settings.general', compact('general', 'check'));
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
            ->where('name', 'LIKE', "%settingsgeneral%")
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

            $general = new Setting();
            $general->name = "settingsgeneral" . $finalId;
            $general->value = serialize($request->settings);
        } else {
            $id = $checkVal[0]->id;
            $general = Setting::findOrFail($id);
            $general->value = serialize($request->settings);
        }
        $general->save();
        return redirect('/settings/general')->with('success', 'Customer created successfully.');
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
