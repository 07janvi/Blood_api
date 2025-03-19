<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Agronomy;
use validate;

class AgronomyController extends Controller
{
    //
    public function agronomy_view()
    {
        return view('Agronomy/create');
    }

    public function store(Request $request)
    {
        // dd($request->all()); 

        // Handle file uploads
        $imagePaths = [];
        if ($request->hasFile('crop_farmer_photos')) {
            foreach ($request->file('crop_farmer_photos') as $image) {
                $path = $image->store('farmer_photos', 'public');
                $imagePaths[] = $path;
            }
        }

        // Store data in the database
        Agronomy::create([
            'farmer_name' => $request->farmer_name,
            'contact_number' => $request->contact_number,
            'state' => $request->state,
            'district' => $request->district,
            'mandal_taluk' => $request->mandal_taluk,
            'village' => $request->village,
            'crop' => $request->crop,
            'area' => $request->area,
            'mis_type' => $request->mis_type,
            'crop_spacing' => $request->crop_spacing ?? 'default_value',  // Ensure it's set
            'installation_date' => $request->installation_date,
            'planting_date' => $request->planting_date,
            'harvesting_date' => $request->harvesting_date,
            'drip_current_area' => $request->drip_current_area,
            'drip_par' => $request->drip_par,
            'expenditure_current_area' => $request->expenditure_current_area,
            'expenditure_par' => $request->expenditure_par,
            'income_current_area' => $request->income_current_area,
            'income_par' => $request->income_par,
            'profit_current_area' => $request->profit_current_area,
            'profit_par' => $request->profit_par,
            'yield_current_area' => $request->yield_current_area,
            'yield_par' => $request->yield_par,
            'e_current_area' => $request->e_current_area,
            'e_par' => $request->e_par,
            'i_current_area' => $request->i_current_area,
            'i_par' => $request->i_par,
            'net_current_area' => $request->net_current_area,
            'net_par' => $request->net_par,
            'income_drip_current_area' => $request->income_drip_current_area,
            'income_drip_par' => $request->income_drip_par,
            'farmer_feedback' => $request->farmer_feedback,  // Ensure this is included
            'crop_farmer_photos' => json_encode($imagePaths),
            'success_story' => $request->success_story
        ]);

        return response()->json(['message' => 'Details stored successfully!'], 201);
    }

    public function agronomy_edit($id)
    {
        // $agronomy = Agronomy::findOrFail($id);
        // return view('agronomy/edit', compact('agronomy'));

        $agronomy = Agronomy::findOrFail($id);
        return view('agronomy/edit', compact('agronomy'));
    }

    public function agronomy_update(Request $request, $id)
    {
        $agronomy = Agronomy::findOrFail($id);

        // Handle file uploads
        if ($request->hasFile('crop_farmer_photos')) {
            $photos = [];
            foreach ($request->file('crop_farmer_photos') as $photo) {
                $filename = time() . '_' . $photo->getClientOriginalName();
                $path = $photo->storeAs('crop_photos', $filename, 'public');
                $photos[] = $path;
            }
            $agronomy->crop_farmer_photos = json_encode($photos);
        }

        // Updating fields
        $agronomy->farmer_name = $request->farmer_name;
        $agronomy->contact_number = $request->contact_number;
        $agronomy->state = $request->state;
        $agronomy->district = $request->district;
        $agronomy->mandal_taluk = $request->mandal_taluk;
        $agronomy->village = $request->village;
        $agronomy->crop = $request->crop;
        $agronomy->area = $request->area;
        $agronomy->mis_type = $request->mis_type;
        $agronomy->crop_spacing = $request->crop_spacing;
        $agronomy->installation_date = $request->installation_date;
        $agronomy->planting_date = $request->planting_date;
        $agronomy->harvesting_date = $request->harvesting_date;
        $agronomy->drip_current_area = $request->drip_current_area;
        $agronomy->drip_par = $request->drip_par;
        $agronomy->expenditure_current_area = $request->expenditure_current_area;
        $agronomy->expenditure_par = $request->expenditure_par;
        $agronomy->income_current_area = $request->income_current_area;
        $agronomy->income_par = $request->income_par;
        $agronomy->profit_current_area = $request->profit_current_area;
        $agronomy->profit_par = $request->profit_par;
        $agronomy->yield_current_area = $request->yield_current_area;
        $agronomy->yield_par = $request->yield_par;
        $agronomy->e_current_area = $request->e_current_area;
        $agronomy->e_par = $request->e_par;
        $agronomy->i_current_area = $request->i_current_area;
        $agronomy->i_par = $request->i_par;
        $agronomy->net_current_area = $request->net_current_area;
        $agronomy->net_par = $request->net_par;
        $agronomy->income_drip_current_area = $request->income_drip_current_area;
        $agronomy->income_drip_par = $request->income_drip_par;
        $agronomy->farmer_feedback = $request->farmer_feedback;
        $agronomy->success_story = $request->success_story;

        $agronomy->save();

        return response(['message' => 'Details updated successfully!', 'data' => $agronomy], 201);
    }

    public function list()
    {
        // Fetch all capacity records from the database
        $agronomy = Agronomy::all();

        // Return the view with data
        return view('agronomy/list', compact('agronomy'));
    }

    public function agronomy_delete($id)
    {
        $agronomy = Agronomy::findOrFail($id);
        $agronomy->delete();

        return redirect()->route('list')->with('success', 'Record deleted successfully!');
    }
}
