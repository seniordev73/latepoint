<?php

namespace App\Http\Controllers\Admin\Resource;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Activity;
use App\Models\ServiceCategory;
use App\Models\ServiceExtra;

class Services extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::all();

        $categories = ServiceCategory::all();

        return view('content.resource.services', compact('services', 'categories'));
    }


    public function get()
    {
        $services = Service::all();

        // Fetch all categories to minimize database queries
        $categories = ServiceCategory::pluck('name', 'id');

        // Group services by category_id
        $groupedServices = $services->groupBy('category_id');

        // Format the response
        $response = $groupedServices->map(function ($services, $categoryId) use ($categories) {
            // Determine the category name
            $categoryName = $categoryId == 0 ? 'Uncategorized' : ($categories[$categoryId] ?? 'Unknown Category');

            // Map services data
            $servicesData = $services->map(function ($service) {
                return [
                    'id' => $service->id,
                    'name' => $service->name,
                    'duration' => $service->duration,
                    'buffer_before' => $service->buffer_before,
                    'buffer_after' => $service->buffer_after,
                    'capacity_min' => $service->capacity_min,
                    'capacity_max' => $service->capacity_max,
                ];
            });

            return [
                'category' => $categoryName,
                'services' => $servicesData
            ];
        })->values();

        return response()->json($response);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('content.resource.createservices');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255', // Adjust length if needed
            'short_description' => 'string|nullable',
            'price_min' => 'nullable|numeric|min:0.0000', // Allow decimals, non-negative
            'price_max' => 'nullable|numeric|min:0.0000', // Non-negative, greater than price_min
            'charge_amount' => 'nullable|numeric|min:0.0000',  // Allow decimals, non-negative
            'deposit_amount' => 'nullable|numeric|min:0.0000', // Allow decimals, non-negative
            'duration_name' => 'string|nullable|max:255', // Adjust length if needed
            'duration' => 'required|string', // Required duration format
            'buffer_before' => 'string|nullable', // Validate time format if needed
            'buffer_after' => 'string|nullable', // Validate time format if needed
            'category_id' => 'string|nullable', // Validate category ID existence
            'bg_color' => 'string|nullable', // Validate hex color format (optional)
            'timeblock_interval' => 'string|nullable', // Validate time interval format
            'capacity_min' => 'nullable|numeric|min:0', // Non-negative integer
            'capacity_max' => 'nullable|numeric|min:0', // Non-negative integer, greater than capacity_min
            'status' => 'required|string', // Validate allowed statuses
            'visibility' => 'required|string', // Validate allowed visibility options
            'override_default_booking_status' => 'string|nullable|max:255', // Adjust length if needed

        ]);

        $service = new Service;
        $service->name = $validatedData['name'];
        $service->short_description = $validatedData['short_description'];
        $service->price_min = $validatedData['price_min'];
        $service->price_max = $validatedData['price_max'];
        $service->charge_amount = $validatedData['charge_amount'];
        $service->deposit_amount = $validatedData['deposit_amount'];
        $service->duration_name = $validatedData['duration_name'];
        $service->duration = $validatedData['duration'];
        $service->buffer_before = $validatedData['buffer_before'];
        $service->buffer_after = $validatedData['buffer_after'];
        $service->category_id = $validatedData['category_id'];
        $service->selection_image_id = $request->selection_image_id;
        $service->description_image_id = $request->description_image_id;
        $service->bg_color = $validatedData['bg_color'];
        $service->timeblock_interval = $validatedData['timeblock_interval'];
        $service->capacity_min = $validatedData['capacity_min'];
        $service->capacity_max = $validatedData['capacity_max'];
        $service->status = $validatedData['status'];
        $service->visibility = $validatedData['visibility'];
        $service->override_default_booking_status = $validatedData['override_default_booking_status'];

        $service->save();

        $activity = new Activity();
        $activity->service_id = $service->id;
        $activity->code = "service_created";
        $activity->description = json_encode([
            'service_data' => [
                'name' => $validatedData['name'],
                'short_description' => $validatedData['short_description'],
                'price_min' => $validatedData['price_min'],
                'price_max' => $validatedData['price_max'],
                'charge_amount' => $validatedData['charge_amount'],
                'deposit_amount' => $validatedData['deposit_amount'],
                'duration_name' => $validatedData['duration_name'],
                'duration' => $validatedData['duration'],
                'buffer_before' => $validatedData['buffer_before'],
                'buffer_after' => $validatedData['buffer_after'],
                'category_id' => $validatedData['category_id'],
                'bg_color' => $validatedData['bg_color'],
                'timeblock_interval' => $validatedData['timeblock_interval'],
                'capacity_min' => $validatedData['capacity_min'],
                'capacity_max' => $validatedData['capacity_max'],
                'status' => $validatedData['status'],
                'visibility' => $validatedData['visibility'],
                'override_default_booking_status' => $validatedData['override_default_booking_status'],
            ]
        ]);
        $activity->initiated_by = "admin";
        $activity->initiated_by_id = $request->user()['id'];
        $activity->save();
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $service = Service::findOrFail($id);
        $categories = ServiceCategory::all();
        $agents = Agent::all();
        $extras = ServiceExtra::all();

        return view('content.resource.editservices', compact('service', 'categories', 'agents', 'extras'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255', // Adjust length if needed
            'price_min' => 'nullable|numeric|min:0.0000', // Allow decimals, non-negative
            'price_max' => 'nullable|numeric|min:0.0000', // Non-negative, greater than price_min
            'charge_amount' => 'nullable|numeric|min:0.0000',  // Allow decimals, non-negative
            'deposit_amount' => 'nullable|numeric|min:0.0000', // Allow decimals, non-negative
            'duration_name' => 'string|nullable|max:255', // Adjust length if needed
            'duration' => 'required|string', // Required duration format
            'buffer_before' => 'string|nullable', // Validate time format if needed
            'buffer_after' => 'string|nullable', // Validate time format if needed
            'category_id' => 'string|nullable', // Validate category ID existence
            'bg_color' => 'string|nullable', // Validate hex color format (optional)
            'timeblock_interval' => 'string|nullable', // Validate time interval format
            'capacity_min' => 'nullable|numeric|min:0', // Non-negative integer
            'capacity_max' => 'nullable|numeric|min:0', // Non-negative integer, greater than capacity_min
            'status' => 'required|string', // Validate allowed statuses
            'visibility' => 'required|string', // Validate allowed visibility options
            'override_default_booking_status' => 'string|nullable|max:255', // Adjust length if needed

        ]);
        $service = Service::findOrFail($request->id);

        $service->name = $validatedData['name'];
        $service->short_description = $request->short_description;
        $service->price_min = $validatedData['price_min'];
        $service->price_max = $validatedData['price_max'];
        $service->charge_amount = $validatedData['charge_amount'];
        $service->deposit_amount = $validatedData['deposit_amount'];
        $service->duration_name = $validatedData['duration_name'];
        $service->duration = $validatedData['duration'];
        $service->buffer_before = $validatedData['buffer_before'];
        $service->buffer_after = $validatedData['buffer_after'];
        $service->category_id = $validatedData['category_id'];
        $service->bg_color = $validatedData['bg_color'];
        $service->timeblock_interval = $validatedData['timeblock_interval'];
        $service->capacity_min = $validatedData['capacity_min'];
        $service->capacity_max = $validatedData['capacity_max'];
        $service->status = $validatedData['status'];
        $service->visibility = $validatedData['visibility'];
        $service->override_default_booking_status = $validatedData['override_default_booking_status'];


        if ($request->selection_image_id) {
            $service->selection_image_id = $request->selection_image_id;
        }
        if ($request->description_image_id) {
            $service->description_image_id = $request->description_image_id;
        }

        $service->save();

        $activity = new Activity();
        $activity->service_id = $service->id;
        $activity->code = "service_updated";
        $activity->description = json_encode([
            'service_data' => [
                'name' => $validatedData['name'],
                'price_min' => $validatedData['price_min'],
                'price_max' => $validatedData['price_max'],
                'charge_amount' => $validatedData['charge_amount'],
                'deposit_amount' => $validatedData['deposit_amount'],
                'duration_name' => $validatedData['duration_name'],
                'duration' => $validatedData['duration'],
                'buffer_before' => $validatedData['buffer_before'],
                'buffer_after' => $validatedData['buffer_after'],
                'category_id' => $validatedData['category_id'],
                'bg_color' => $validatedData['bg_color'],
                'timeblock_interval' => $validatedData['timeblock_interval'],
                'capacity_min' => $validatedData['capacity_min'],
                'capacity_max' => $validatedData['capacity_max'],
                'status' => $validatedData['status'],
                'visibility' => $validatedData['visibility'],
                'override_default_booking_status' => $validatedData['override_default_booking_status'],
            ]
        ]);
        $activity->initiated_by = "admin";
        $activity->initiated_by_id = $request->user()['id'];
        $activity->save();

        return redirect('/admin/resource/services')->with('success', 'Category updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = Service::findOrFail($id);

        $activity = new Activity();
        $activity->service_id = $service->id;
        $activity->code = "service_deleted";
        $activity->description = json_encode([
            'service_data' => [
                'name' => $service->name,
                'short_description' => $service->short_description,
                'price_min' => $service->price_min,
                'price_max' => $service->price_max,
                'charge_amount' => $service->charge_amount,
                'deposit_amount' => $service->deposit_amount,
                'duration_name' => $service->duration_name,
                'duration' => $service->duration,
                'buffer_before' => $service->buffer_before,
                'buffer_after' => $service->buffer_after,
                'category_id' => $service->category_id,
                'bg_color' => $service->bg_color,
                'timeblock_interval' => $service->timeblock_interval,
                'capacity_min' => $service->capacity_min,
                'capacity_max' => $service->capacity_max,
                'status' => $service->status,
                'visibility' => $service->visibility,
                'override_default_booking_status' => $service->override_default_booking_status,
            ]
        ]);
        $activity->initiated_by = "admin";
        // $activity->initiated_by_id = $request->user()['id'];
        $activity->save();

        $service->delete();

        return redirect('/admin/resource/services')->with('success', 'Category updated successfully.');
    }
}
