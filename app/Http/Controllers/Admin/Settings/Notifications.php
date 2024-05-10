<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;


class Notifications extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings = Setting::all();
        $results = Setting::query()
            ->where('name', 'LIKE', '%settingsnotifications%')
            ->get();
        $count = $results->count();
        if ($count > 0) {
            $result = $results[0];
            $check = 1;
            return view('content.settings.notifications', compact('result', 'check'));
        } else {
            $check = 0;
            return view('content.settings.notifications', compact('check'));

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
        $settings = Setting::all();
        $count = $settings->count();
        $finalId = $settings[$count - 1]->id;
        $tax = new Setting();
        $tax->name = "settingsnotifications" . $finalId;
        $tax->value = serialize($request->settings);
        // dd($tax->value);
        $tax->save();

        return redirect('/settings/notifications')->with('success', 'Tax created successfully.');

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
        $tax = Setting::findOrFail($id);
        $tax->value = serialize($request->settings);
        // dd($tax->value);
        $tax->save();

        return redirect('/settings/notifications')->with('success', 'Tax created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
