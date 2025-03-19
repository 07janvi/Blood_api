<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Camera;

class CameraController extends Controller
{
    //
    public function camerashow()
    {
        return view("Camera/create");
    }
    public function store(Request $request)
    {
        
    }
}