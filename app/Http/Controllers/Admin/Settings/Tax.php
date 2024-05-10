<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class Tax extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings = Setting::all();
        $results = Setting::query()
            ->where('name', 'LIKE', '%tax%')
            ->get();
        return view('content.settings.tax', compact('results'));
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
        $tax->name = "tax" . $finalId;
        $tax->value = serialize([
            "name" => $request->name,
            "type" => $request->type,
            "value" => $request->value
        ]);
        $tax->save();

        return redirect('/settings/tax')->with('success', 'Tax created successfully.');
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
    public function update(Request $request)
    {
        $tax = Setting::findOrFail($request->id);
        $tax->value = serialize([
            "name" => $request->name,
            "type" => $request->type,
            "value" => $request->value
        ]);
        $tax->save();

        return redirect('/settings/tax')->with('success', 'Tas updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tax = Setting::findOrFail($id);
        $tax->delete();

        return redirect('/settings/tax')->with('success', 'Tax deleted successfully.');
    }
}
