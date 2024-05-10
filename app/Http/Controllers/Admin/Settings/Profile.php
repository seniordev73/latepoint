<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class Profile extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $user_id = $user->id;
        $currentUser = User::findOrFail($user_id);

        return view('content.settings.profile', compact('currentUser'));
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
        //
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
    public function edit()
    {
        $user = Auth::user();
        $user_id = $user->id;
        $currentUser = User::findOrFail($user_id);


        return view('content.settings.editprofile', compact('currentUser'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $user = User::findOrFail($request->id);

        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'string|nullable|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id), // Unique email validation, ignoring the current user
            ],
            'new_password' => 'nullable|string|max:255|min:8',
            'confirm_password' => 'same:new_password|max:255'

        ]);

        $user->first_name = $validatedData['first_name'];
        $user->last_name = $validatedData['last_name'];
        $user->email = $validatedData['email'];

        if ($request->filled('new_password')) {
            $user->password = Hash::make($validatedData['new_password']);
            $user->save();
        } else {
            $user->save();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
