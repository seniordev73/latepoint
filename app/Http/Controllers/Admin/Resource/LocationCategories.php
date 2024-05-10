<?php

namespace App\Http\Controllers\Admin\Resource;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LocationCategory;

class LocationCategories extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locationcategories = LocationCategory::all();
        return view('content.resource.locationcategories', compact('locationcategories'));
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
        $validatedData = $request->validate([
            'name' => 'required|string|max:100', // Adjust length if needed
            'short_description' => 'string|nullable',
            // 'parent_id' => 'nullable|exists:location_categories,id', // Validate parent category ID existence
            // 'selection_image_id' => 'nullable|integer', // Allow integer or null for image ID
            // 'order_number' => 'nullable|integer', // Allow integer or null for order number
        ]);
        $locationcategory = new LocationCategory();
        $locationcategory->name = $validatedData['name'];
        $locationcategory->short_description = $validatedData['short_description'];
        $locationcategory->selection_image_id = $request->selection_image_id;

        $locationcategory->save();
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
