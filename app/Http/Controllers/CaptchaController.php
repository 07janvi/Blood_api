<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Captcha;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;


class CaptchaController extends Controller
{
    //

    public function index()
    {
        // Generate a more complex captcha with mixed characters
        $captchaWord = substr(str_shuffle('ABCDEFGHJKLMNPQRSTUVWXYZabcdefghjkmnpqrstuvwxyz23456789'), 0, 6);

        // Store captcha in session
        Session::put('captcha', $captchaWord);

        return view('captcha.create', ['captcha' => $captchaWord]);
    }

    public function reloadCaptcha()
    {
        $captchaWord = substr(str_shuffle('ABCDEFGHJKLMNPQRSTUVWXYZabcdefghjkmnpqrstuvwxyz23456789'), 0, 6);
        Session::put('captcha', $captchaWord);

        return response()->json(['captcha' => $captchaWord]);
    }

    public function storecaptcha(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'person_name' => 'required',
            'surname' => 'required',
            'contactno' => 'required',
            'state' => 'required',
            'district' => 'required',
            'address' => 'required',
            'captcha' => 'required'
        ]);

        if ($validator->fails()) {
            // Log::error('Validation failed', $validator->errors()->toArray());
            return response()->json(['message' => 'Validation failed!', 'errors' => $validator->errors()], 422);
        }

        try {
            // Log::info('Data to store:', $request->all());

            $captcha = Captcha::create([
                'person_name' => $request->person_name,
                'surname' => $request->surname,
                'contactno' => $request->contactno,
                'state' => $request->state,
                'district' => $request->district,
                'address' => $request->address
            ]);

            // Log::info('Data stored successfully', ['id' => $captcha->id]);

            return response()->json(['message' => 'Form submitted successfully!']);
        } catch (\Exception $e) {
            // Log::error('Database error: ' . $e->getMessage());
            return response()->json(['message' => 'Failed to store data!'], 500);
        }
    }
}