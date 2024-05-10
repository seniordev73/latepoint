<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Hash;
use App\Models\Customer;


class Appointments extends Controller
{
  public function index()
  {
    $appointments = Booking::all();

    $jsonData = json_encode(['data' => $appointments]);
    $filePath = public_path('assets/json/table-datatable.json');
    file_put_contents($filePath, $jsonData);

    return view('content.tables.tables-appointments');
  }

  public function store(Request $request)
  {
    $rule =
      [
        'first_name' => 'required|string|max:20',
        'last_name' => 'required|string|max:20',
        'email' => 'required|email|unique:users,email',
      ];
    $error_msg = [
      'email.required' => __('Please fill in the field'),
      'email.email' => __('Email must be a valid email address'),
    ];

    $request->validate($rule, $error_msg);
    //save user
    $user = User::create([
      'first_name' => $request->first_name,
      'last_name' => $request->last_name,
      'email' => $request->email,
      'password' => Hash::make('123'),
      'status' => '1',
      'is_verified' => '1',
      'avatar' => $request->avatar_image,
      'account_type' => '2'
    ]);
    //save user to customer table
    $customer = new Customer();
    $customer->user_id = $user->id;
    $customer->first_name = $user->first_name;
    $customer->last_name = $user->last_name;
    $customer->email = $user->email;
    $customer->phone = $request->telephone_number;
    $customer->status = "Active";
    $customer->notes = $request->input('notes');
    $customer->admin_notes = $request->input('admin_notes');

    $customers = Customer::all();


    if ($request->customer_avatar) {
      $customer->avatar_image_id = $request->customer_avatar;
    } else {
    }
    ;

    $customer->save();
    //save appointment
    $appointment = new Booking();
    $appointment->customer_id = $user->id;
    $appointment->first_name = $request->first_name;
    $appointment->last_name = $request->last_name;
    $appointment->service_id = $request->service;
    $appointment->agent_id = $request->agent;
    $appointment->location_id = "1";
    $appointment->booking_code = "1";
    $appointment->start_date = new DateTime($request->start_date);
    $appointment->start_time = $request->start_time;
    $appointment->end_time = $request->end_time;
    if ($request->buffer_before) {
      $appointment->buffer_before = $request->buffer_before;
    } else {
      $appointment->buffer_before = '0';
    }
    if ($request->buffer_after) {
      $appointment->buffer_after = $request->buffer_after;
    } else {
      $appointment->buffer_after = '0';

    }
    $appointment->subtotal = $request->subtotal;
    $appointment->price = $request->price;
    $appointment->status = $request->status;
    $appointment->coupon_code = $request->coupon_code;
    $appointment->customer_comment = $request->customer_comment;

    $appointment->save();
    return redirect('/admin/appointments')->with('success', 'Booking created successfully.');
  }
}
