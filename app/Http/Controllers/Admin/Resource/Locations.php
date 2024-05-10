<?php

namespace App\Http\Controllers\Admin\Resource;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Activity;


class Locations extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locations = Location::all();
        return view('content.resource.locations', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('content.resource.createlocations');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255', // Adjust length if needed
            'full_address' => 'nullable|string', // Allow optional address with basic validation
            'status' => 'required|string', // Validate allowed statuses
        ]);
        $location = new Location();
        $location->name = $validatedData['name'];
        $location->full_address = $validatedData['full_address'];
        $location->status = $validatedData['status'];
        $location->selection_image_id = $request->selection_image_id;
        $location->category_id = $request->input('category_id');

        $location->save();

        $activity = new Activity();
        $activity->location_id = $location->id;
        $activity->code = "location_created";
        $activity->description = json_encode([
            'location_data' => [
                'name' => $validatedData['name'],
                'full_address' => $validatedData['full_address'],
                'status' => $validatedData['status'],
                'selection_image_id' => $request->selection_image_id,
                'category_id' => $request->input('category_id'),
            ]
        ]);
        $activity->initiated_by = "admin";
        $activity->initiated_by_id = $request->user()['id'];
        $activity->save();
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
        $location = Location::findOrFail($id);
        return view('content.resource.editlocations', compact('location'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255', // Adjust length if needed
            'full_address' => 'nullable|string', // Allow optional address with basic validation
            'status' => 'required|string', // Validate allowed statuses
        ]);
        $location = Location::findOrFail($request->input('id'));
        $location->name = $validatedData['name'];
        $location->full_address = $validatedData['full_address'];
        $location->status = $validatedData['status'];
        $location->selection_image_id = $request->selection_image_id;
        $location->category_id = $request->input('category_id');

        $location->save();

        $activity = new Activity();
        $activity->location_id = $location->id;
        $activity->code = "location_updated";
        $activity->description = json_encode([
            'location_data' => [
                'name' => $validatedData['name'],
                'full_address' => $validatedData['full_address'],
                'status' => $validatedData['status'],
                'selection_image_id' => $request->selection_image_id,
                'category_id' => $request->input('category_id'),
            ]
        ]);
        $activity->initiated_by = "admin";
        $activity->initiated_by_id = $request->user()['id'];
        $activity->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
