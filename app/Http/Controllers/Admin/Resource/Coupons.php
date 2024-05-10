<?php

namespace App\Http\Controllers\Admin\Resource;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use Illuminate\Validation\Rule;


class Coupons extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coupons = Coupon::all();
        return view('content.resource.coupons', compact('coupons'));
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
            'coupon_name' => 'string|nullable|max:110',
            'code' => [
                'required',
                'string',
                'max:110',
                Rule::unique('coupons'), // Unique email validation
            ],
            'discount_type' => 'string|nullable|max:110', // Validate allowed types
            'discount_value' => 'nullable|numeric|between:0.0000,1.0000', // Allow decimals and limit range (0 to 1)
            'status' => 'required|string',
        ]);

        $coupon = new Coupon();
        $coupon->code = $validatedData['code'];
        $coupon->name = $validatedData['coupon_name'];
        $coupon->discount_value = $validatedData['discount_value'];
        $coupon->discount_type = $validatedData['discount_type'];
        $coupon->status = $validatedData['status'];
        $coupon->description = serialize($request->description);

        $coupon->save();

        return redirect('/resource/coupons')->with('success', 'Category updated successfully.');

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
        $validatedData = $request->validate([
            'coupon_name' => 'string|nullable|max:110',
            'code' => [
                'required',
                'string',
                'max:110',
                Rule::unique('coupons'), // Unique email validation
            ],
            'discount_type' => 'string|nullable|max:110', // Validate allowed types
            'discount_value' => 'nullable|numeric|between:0.0000,1.0000', // Allow decimals and limit range (0 to 1)
            'status' => 'required|string',
        ]);

        $coupon = Coupon::findOrFail($id);
        $coupon->code = $validatedData['code'];
        $coupon->name = $validatedData['coupon_name'];
        $coupon->discount_value = $validatedData['discount_value'];
        $coupon->discount_type = $validatedData['discount_type'];
        $coupon->status = $validatedData['status'];
        $coupon->description = serialize($request->description);

        $coupon->save();

        return redirect('/resource/coupons')->with('success', 'Category updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $coupon = Coupon::findOrFail($id);
        $coupon->delete();
        return redirect('/resource/coupons')->with('success', 'Category updated successfully.');
    }
}
