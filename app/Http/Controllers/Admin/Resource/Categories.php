<?php

namespace App\Http\Controllers\Admin\Resource;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceCategory;
use App\Models\Service;

class Categories extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = ServiceCategory::all();
        return view('content.resource.categories', compact('categories'));
    }

    public function get()
    {
        $categories = ServiceCategory::all();
        return response()->json($categories);

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
            'name' => 'required|string|max:255', // Adjust length if needed
            'short_description' => 'nullable|string', // Allow decimals, non-negative
            'selection_image_id' => 'nullable|string', // Non-negative, greater than price_min
        ]);
        $category = new ServiceCategory();
        $category->name =  $validatedData['name'];
        $category->short_description =  $validatedData['short_description'];
        $category->selection_image_id = $validatedData['selection_image_id'];
        // $category->parent_id = 1;

        $category->save();
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
    // public function edit(string $id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = ServiceCategory::findOrFail($id);

        $category->name = $request->name;
        $category->short_description = $request->short_description;

        $category->save();

        return redirect('/admin/resource/categories')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = ServiceCategory::findOrFail($id);
        Service::where('category_id', $id)->update(['category_id' => 0]);
        $category->delete();

        return redirect('/admin/resource/categories')->with('success', 'Category updated successfully.');

    }
}
