<?php

namespace App\Http\Controllers\Admin\Resource;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceExtra;
use App\Models\Service;

class Serviceextras extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $extras = ServiceExtra::all();
        return view('content.resource.serviceextras', compact('extras'));
    }

    public function get()
    {
        $extras = ServiceExtra::all();
        return response()->json($extras);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Service::all();
        return view('content.resource.createserviceextras', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255', // Adjust length if needed
            'short_description' => 'string|nullable',
            'charge_amount' => 'nullable|numeric|min:0.0000', // Allow decimals, non-negative
            'duration' => 'required|integer|min:0', // Non-negative integer
            'max_quantity' => 'nullable|integer|min:0', // Non-negative integer
            // 'multiplied_by_attendees' => 'nullable|string|in:yes,no', // Validate allowed options
            'status' => 'required|string', // Validate allowed statuses
        ]);
        $serviceExtra = new ServiceExtra();
        $serviceExtra->name = $validatedData['name'];
        $serviceExtra->status = $validatedData['status'];
        $serviceExtra->short_description = $validatedData['short_description'];
        $serviceExtra->charge_amount = $validatedData['charge_amount'];
        $serviceExtra->duration = $validatedData['duration'];
        $serviceExtra->maximum_quantity = $validatedData['max_quantity'];
        $serviceExtra->selection_image_id = $request->selection_image_id;
        $serviceExtra->multiplied_by_attendies = $request->multiplied_by_attendies;
        // $serviceExtra->description_image_id = $request->description_image_id;

        $serviceExtra->save();
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
        $serviceExtra = ServiceExtra::findOrFail($id);
        $services = Service::all();
        return view('content.resource.editserviceextras', compact('serviceExtra', 'services'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255', // Adjust length if needed
            'short_description' => 'string|nullable',
            'charge_amount' => 'nullable|numeric|min:0.0000', // Allow decimals, non-negative
            'duration' => 'required|integer|min:0', // Non-negative integer
            'max_quantity' => 'nullable|integer|min:0', // Non-negative integer
            // 'multiplied_by_attendees' => 'nullable|string|in:yes,no', // Validate allowed options
            'status' => 'required|string', // Validate allowed statuses
        ]);

        $id = $request->input('id');
        $serviceExtra = ServiceExtra::findOrFail($id);
        $serviceExtra->name = $validatedData['name'];
        $serviceExtra->status = $validatedData['status'];
        $serviceExtra->short_description = $validatedData['short_description'];
        $serviceExtra->charge_amount = $validatedData['charge_amount'];
        $serviceExtra->duration = $validatedData['duration'];
        $serviceExtra->maximum_quantity = $validatedData['max_quantity'];
        $serviceExtra->selection_image_id = $request->selection_image_id;
        $serviceExtra->multiplied_by_attendies = $request->multiplied_by_attendies;
        // $serviceExtra->description_image_id = $request->description_image_id;

        if ($request->selection_image_id) {
            $serviceExtra->selection_image_id = $request->selection_image_id;
        }
        $serviceExtra->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $serviceExtra = ServiceExtra::findOrFail($id);
        $serviceExtra->delete();

        return redirect('/resource/serviceextras')->with('success', 'Category updated successfully.');
    }
}
