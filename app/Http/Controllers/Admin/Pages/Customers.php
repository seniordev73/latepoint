<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Activity;
use Illuminate\Validation\Rule;

class Customers extends Controller
{
  public function index()
  {
    $customers = Customer::all();
    return view('content.tables.tables-customers', ['customers' => $customers]);
  }

  public function list()
  {
    $customers = Customer::all();

    $jsonData = json_encode(['data' => $customers]);
    $filePath = public_path('assets/json/table-datatable2.json');
    file_put_contents($filePath, $jsonData);

    return response()->json(['message' => 'Data written to file successfully']);
  }

  // Add Customer
  public function add()
  {
    return view('content.resource.addcustomer');
  }

  public function add_customer(Request $request)
  {

    $validatedData = $request->validate([
      'first_name' => 'string|nullable|max:255', // Adjust length as needed
      'last_name' => 'string|nullable|max:255',
      'email' => [
        'required',
        'string',
        'email',
        'max:255',
        Rule::unique('customers'), // Unique email validation
      ],
      'country' => 'string|nullable|max:255',
      'phone' => 'string|nullable|max:255', // Adjust for phone number format
    ]);


    $customer = new Customer();
    $customer->user_id = $request->user()['id'];
    $customer->first_name = $validatedData['first_name'];
    $customer->last_name = $validatedData['last_name'];
    $customer->email = $validatedData['email'];
    $customer->country = $request->country;
    $customer->phone = $validatedData['phone'];
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

    $activity = new Activity();
    $activity->customer_id = $customer->id;
    $activity->code = "customer_created";
    $activity->description = json_encode([
      'customer_data' => [
        'user_id' => $request->user()['id'],
        'first_name' => $validatedData['first_name'],
        'last_name' => $validatedData['last_name'],
        'email' => $validatedData['email'],
        'country' => $request->country,
        'phone' => $validatedData['phone'],
        'status' => "Active",
        'notes' => $request->input('notes'),
        'admin_notes' => $request->input('admin_notes'),
      ]
    ]);
    $activity->initiated_by = "admin";
    $activity->initiated_by_id = $request->user()['id'];
    $activity->save();


    $jsonData = json_encode(['data' => $customers]);
    $filePath = public_path('assets/json/table-datatable2.json');
    file_put_contents($filePath, $jsonData);

    return redirect('/customers')->with('success', 'Customer created successfully.');
  }

  public function edit_customer($id)
  {
    $customer = Customer::findOrFail($id);
    return view('content.resource.editcustomer', compact('customer'));
  }

  public function update_customer(Request $request, $customerId)
  {
    // Retrieve the customer model instance
    $customer = Customer::findOrFail($customerId);

    $validatedData = $request->validate([
      'first_name' => 'string|nullable|max:255', // Adjust length as needed
      'last_name' => 'string|nullable|max:255',
      'email' => [
        'required',
        'string',
        'email',
        'max:255',
        Rule::unique('customers'), // Unique email validation
      ],
      'phone' => 'string|nullable|max:255', // Adjust for phone number format
    ]);

    $customer->first_name = $validatedData['first_name'];
    $customer->last_name = $validatedData['last_name'];
    $customer->email = $validatedData['email'];
    $customer->country = $request->country;
    $customer->phone = $validatedData['phone'];
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

    $activity = new Activity();
    $activity->customer_id = $customer->id;
    $activity->code = "customer_updated";
    $activity->description = json_encode([
      'customer_data' => [
        'user_id' => $request->user()['id'],
        'first_name' => $validatedData['first_name'],
        'last_name' => $validatedData['last_name'],
        'email' => $validatedData['email'],
        'country' => $request->country,
        'phone' => $validatedData['phone'],
        'status' => "Active",
        'notes' => $request->input('notes'),
        'admin_notes' => $request->input('admin_notes'),
      ]
    ]);
    $activity->initiated_by = "admin";
    $activity->initiated_by_id = $request->user()['id'];
    $activity->save();

    $jsonData = json_encode(['data' => $customers]);
    $filePath = public_path('assets/json/table-datatable2.json');
    file_put_contents($filePath, $jsonData);

    return redirect()->route('admin.app-customers')->with('success', 'Customer updated successfully.');
  }

  public function delete_customer($id)
  {
    // dd($id);
    $customer = Customer::findOrFail($id);
    $activity = new Activity();
    $activity->customer_id = $customer->id;
    $activity->code = "customer_deleted";
    // $activity->description = json_encode([
    //     'customer_data' =>[
    //       'user_id' => $request->user()['id'],
    //       'first_name' => $validatedData['first_name'],
    //       'last_name' => $validatedData['last_name'],
    //       'email' => $validatedData['email'],
    //       'country' => $request->country,
    //       'phone' => $validatedData['phone'],
    //       'status' => "Active",
    //       'notes' => $request->input('notes'),
    //       'admin_notes' => $request->input('admin_notes'),
    //     ]
    // ]);
    $activity->initiated_by = "admin";
    $activity->save();
    $customer->delete();

    $customers = Customer::all();

    $jsonData = json_encode(['data' => $customers]);
    $filePath = public_path('assets/json/table-datatable2.json');
    file_put_contents($filePath, $jsonData);
    return redirect()->route('admin.app-customers')->with('success', 'Customer deleted successfully.');

  }


}