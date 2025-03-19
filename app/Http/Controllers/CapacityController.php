<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Capacity;

class CapacityController extends Controller
{
    //

    public function capacity_view()
    {
        return view("Capacity/create");
    }

    public function store_capacity(Request $request)
    {

        // Store in the database
        $capacity = Capacity::create([
            'date' => $request->date,
            'agronomy_name' => $request->agronomy_name,
            'activity' => $request->activity,
            'audience' => $request->audience,
            'topic_name' => $request->topic_name,
            'state' => $request->state,
            'district' => $request->district,
            'mandal_taluk' => $request->mandal_taluk,
            'location' => $request->location,
            'participant' => $request->participant,
            'remarks' => $request->remarks,
            'upload_file' => $request->upload_file,
            'upload_photo' => $request->upload_photo,

        ]);

        if ($request->hasFile('upload_file')) {
            $validatedData['upload_file'] = $request->file('upload_file')->store('uploads/files', 'public');
        }

        if ($request->hasFile('upload_photo')) {
            $validatedData['upload_photo'] = $request->file('upload_photo')->store('uploads/photos', 'public');
        }

        return response()->json(['message' => 'Details stored successfully!', 'data' => $capacity], 201);
    }

    //edit code                                               
    public function edit($id)
    {
        $capacity = Capacity::findOrFail($id);
        return view('capacity/edit', compact('capacity'));
    }

    // Update Capacity Data
    public function update(Request $request, $id)
    {
        // Find the existing record
        $capacity = Capacity::findOrFail($id);

        // Update values from the request
        $capacity->date = $request->date;
        $capacity->agronomy_name = $request->agronomy_name;
        $capacity->activity = $request->activity;
        $capacity->audience = $request->audience;
        $capacity->topic_name = $request->topic_name;
        $capacity->state = $request->state;
        $capacity->district = $request->district;
        $capacity->mandal_taluk = $request->mandal_taluk;
        $capacity->location = $request->location;
        $capacity->participant = $request->participant;
        $capacity->remarks = $request->remarks;

        // Handle file uploads
        if ($request->hasFile('upload_file')) {
            $filePath = $request->file('upload_file')->storeAs('uploads/files', time() . '_' . $request->file('upload_file')->getClientOriginalName(), 'public');
            $capacity->upload_file = $filePath;
        }

        if ($request->hasFile('upload_photo')) {
            $photoPath = $request->file('upload_photo')->storeAs('uploads/photos', time() . '_' . $request->file('upload_photo')->getClientOriginalName(), 'public');
            $capacity->upload_photo = $photoPath;
        }

        $capacity->save();

        return response(['message' => 'Details updated successfully!', 'data' => $capacity], 201);
    }

    public function list()
    {
        // Fetch all capacity records from the database
        $capacity = Capacity::all();

        // Return the view with data
        return view('capacity/list', compact('capacity'));
    }

    public function delete($id)
    {
        $capacity = Capacity::findOrFail($id);
        $capacity->delete();

        return redirect()->route('list')->with('success', 'Record deleted successfully!');
    }
}
