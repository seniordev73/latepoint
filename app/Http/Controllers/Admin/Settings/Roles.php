<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class Roles extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings = Setting::all();
        $latepoints = Setting::query()
            ->where('name', 'LIKE', '%latepoint_agent%')
            ->get();
        $otherroles = Setting::query()
            ->where('name', 'LIKE', '%role_custom%')
            ->get();
        $count = $latepoints->count();
        if ($count > 0) {
            $latepoint = $latepoints[0];
            $check = 1;
            return view('content.settings.roles', compact('latepoint', 'check', 'otherroles'));
        } else {
            $check = 0;
            return view('content.settings.roles', compact('check', 'otherroles'));

        }
        return view('content.settings.roles');
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
        $role = new Setting();
        $role->name = $request->role['wp_role'] . $finalId;
        $role->value = serialize($request->role['capabilities']);
        // dd($tax->value);
        $role->save();

        return redirect('/settings/roles')->with('success', 'Tax created successfully.');
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
        $role = Setting::findOrFail($id);
        $role->value = serialize($request->role['capabilities']);
        // dd($tax->value);
        $role->save();

        return redirect('/settings/roles')->with('success', 'role updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = Setting::findOrFail($id);
        $role->delete();

        return redirect('/settings/roles')->with('success', 'Tax deleted successfully.');
    }
}
