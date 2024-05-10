<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class FormFields extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $checkVal = Setting::query()
            ->where('name', 'LIKE', "%settingsformfield%")
            ->get();
        $check = $checkVal->count();
        $customfields = Setting::query()
            ->where('name', 'LIKE', "%settingscustomfield%")
            ->get();
        if ($check == 0) {
            return view('content.settings.form-fields', compact('check', 'customfields'));
        } else {
            $id = $checkVal[0]->id;
            $formfield = Setting::findOrFail($id);
            return view('content.settings.form-fields', compact('check', 'formfield', 'customfields'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $settings = Setting::all();
        $count = $settings->count();
        if ($count > 0) {
            $finalId = $settings[$count - 1]->id;
        } else {
            $finalId = 0;
        }

        $customfield = new Setting();
        $customfield->name = "settingscustomfield" . $finalId;
        $customfield->value = serialize($request->custom_fields);
        $customfield->save();
        return redirect('/settings/form-fields')->with('success', 'CustomField created successfully.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $checkVal = Setting::query()
            ->where('name', 'LIKE', "%settingsformfield%")
            ->get();
        $formfield_value = [
            'firstName' => $request->first_name,
            'lastName' => $request->last_name,
            'phone' => $request->phone,
            'comments' => $request->comments,
            'email_width' => $request->email_width
        ];
        $check = $checkVal->count();
        if ($check == 0) {
            $settings = Setting::all();
            $count = $settings->count();
            if ($count > 0) {
                $finalId = $settings[$count - 1]->id;
            } else {
                $finalId = 0;
            }

            $formfield = new Setting();
            $formfield->name = "settingsformfield" . $finalId;
            $formfield->value = serialize($formfield_value);
        } else {
            $id = $checkVal[0]->id;
            $formfield = Setting::findOrFail($id);
            $formfield->value = serialize($formfield_value);
        }
        $formfield->save();
        // return redirect('/settings/general')->with('success', 'Customer created successfully.');
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
        $setting = Setting::findOrFail($id);
        $setting->value = serialize($request->custom_fields);
        $setting->save();
        return redirect('/settings/form-fields')->with('success', 'CustomField created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $setting = Setting::findOrFail($id);
        $setting->delete();
        return redirect('/settings/form-fields')->with('success', 'CustomField created successfully.');
    }
}
