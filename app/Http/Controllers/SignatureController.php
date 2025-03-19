<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Signature;
use Illuminate\Support\Facades\Storage;

class Signaturecontroller extends Controller
{
    //
    public function signature_view()
    {
        return view("Signature/create");
    }
    public function store_signature(Request $request)
    {
        // Initialize signature path
        $signaturePath = null;

        // Handle signature upload (supports base64 or file upload)
        if ($request->has('signature')) {
            $imageData = $request->signature;

            // Check if the signature is in base64 format (e.g., from a canvas)
            if (preg_match('/^data:image\/(\w+);base64,/', $imageData)) {
                $imageType = substr($imageData, 11, strpos($imageData, ';') - 11);
                $imageData = base64_decode(substr($imageData, strpos($imageData, ',') + 1));

                // Generate a unique filename
                $fileName = 'signature_' . time() . '.' . $imageType;

                // Store the signature in 'public/signatures'
                $signaturePath = 'signatures/' . $fileName;
                Storage::disk('public')->put($signaturePath, $imageData);
            }
            // Handle regular file upload (if the user uploads a signature file directly)
            elseif ($request->hasFile('signature')) {
                $signaturePath = $request->file('signature')->store('signatures', 'public');
            }
        }

        // Create a new signature record in the database
        $signature = Signature::create([
            'date' => $request->date,
            'person_name' => $request->person_name,
            'surname' => $request->surname,
            'dob' => $request->dob,
            'contectno' => $request->contectno,
            'state' => $request->state,
            'district' => $request->district,
            'address' => $request->address,
            'signature' => $signaturePath // Save the signature file path
        ]);

        return response()->json(['message' => 'Signature saved successfully!', 'data' => $signature], 201);
    }


    public function signature_edit($id)
    {
        $signature = Signature::findOrFail($id);
        return view('Signature/edit', compact('signature'));
    }

    public function signature_update(Request $request, $id)
    {
        $signature = Signature::findOrFail($id);

        try {
            // Check if a new signature is drawn
            if ($request->has('signature') && !empty($request->signature)) {
                $imageData = $request->signature;

                // Process base64 signature data
                if (preg_match('/^data:image\/(\w+);base64,/', $imageData)) {
                    $imageData = base64_decode(substr($imageData, strpos($imageData, ',') + 1));

                    // Generate a unique filename
                    $fileName = 'signature_' . time() . '.png';

                    // Ensure the directory exists
                    if (!Storage::disk('public')->exists('signatures')) {
                        Storage::disk('public')->makeDirectory('signatures');
                    }

                    // Save the new signature image
                    Storage::disk('public')->put('signatures/' . $fileName, $imageData);

                    // Delete the old file if it exists
                    if ($signature->signature && Storage::disk('public')->exists($signature->signature)) {
                        Storage::disk('public')->delete($signature->signature);
                    }

                    // Save the new signature path
                    $signature->signature = 'signatures/' . $fileName;
                }
            }

            // Update other details
            $signature->update([
                'person_name' => $request->person_name,
                'surname' => $request->surname,
                'dob' => $request->dob,
                'contectno' => $request->contectno,
                'state' => $request->state,
                'district' => $request->district,
                'address' => $request->address,
            ]);

            return response()->json(['message' => 'Details updated successfully!', 'data' => $signature], 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to save signature!', 'error' => $e->getMessage()], 500);
        }
    }

 

    public function list()
    {
        $signature = Signature::all();

        return view('Signature/list', compact('signature'));
    }

    public function signature_delete($id)
    {
        $signature = Signature::findOrFail($id);
        $signature->delete();

        return redirect()->route('list')->with('success', 'Record deleted successfully!');
    }
}