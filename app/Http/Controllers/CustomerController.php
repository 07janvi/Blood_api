<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\CustomerMail;
use App\Models\Customer;

class CustomerController extends Controller
{
    //
    public function viewcustomer()
    {
        return view("Customer/create");
    }

    // Store data and send email
    public function store_customer(Request $request)
    {
        $customer = Customer::create([
            'customer_name' => $request->customer_name,
            'email' => $request->email,
            'contect_no' => $request->contect_no,
            'state' => $request->state,
            'district' => $request->district,
            'address' => $request->address,
        ]);

        try {
            Mail::to($customer->email)->send(new CustomerMail($customer));

            return response()->json(['message' => 'Customer data saved and email sent successfully!']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to send email. Error: ' . $e->getMessage()], 500);
        }
    }

    public function edit_customer($id)
    {
        $customer = Customer::findOrFail($id);
        return view('Customer/edit', compact('customer'));
    }

    public function update_customer(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);

        $customer->update([
            'customer_name' => $request->customer_name,
            'email' => $request->email,
            'contect_no' => $request->contect_no,
            'state' => $request->state,
            'district' => $request->district,
            'address' => $request->address,
        ]);

        return response()->json(['message' => 'Customer data updated successfully!']);
    }

    public function customer_list()
    {
        // Fetch all capacity records from the database
        $customer = Customer::all();

        // Return the view with data
        return view('Customer/list', compact('customer'));
    }

    public function customer_delete($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return redirect()->route('customer_list')->with('success', 'Record deleted successfully!');
    }
}