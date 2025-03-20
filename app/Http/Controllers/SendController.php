<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Twilio\Rest\Client;
use App\Models\Sendotp;
use Illuminate\Support\Facades\Log;

class SendController extends Controller
{
    public function sendview()
    {
        return view('send_otp/send_otp_create');
    }

    public function sendOtp(Request $request)
    {
        $request->validate([
            'number' => 'required|digits:10'
        ]);

        $otp = rand(1000, 9999);
        session(['otp' => $otp]);

        $number = $request->number;

        // Add country code if missing (e.g., +91 for India)
        if (!preg_match('/^\+/', $number)) {
            $number = '+91' . $number;  // Change +91 to your country code
        }


        try {
            $twilioSid = env('TWILIO_SID');
            $twilioToken = env('TWILIO_AUTH_TOKEN');
            $twilioFrom = env('TWILIO_PHONE_NUMBER');

            if (!$twilioSid || !$twilioToken || !$twilioFrom) {
                throw new \Exception('Twilio credentials are missing!');
            }

            $twilio = new Client($twilioSid, $twilioToken);

            $twilio->messages->create($number, [ // ✅ Use the formatted number
                "from" => $twilioFrom,
                "body" => "Your OTP code is: $otp"
            ]);

            return response()->json(['message' => 'OTP sent successfully']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to send OTP: ' . $e->getMessage()], 500);
        }
    }

    public function verifyOtp(Request $request)
    {
        $request->validate(['otp' => 'required|digits:4']);

        if ($request->otp == session('otp')) {
            session(['otp_verified' => true]);
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }

    public function storesendotp(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'person_name' => 'required',
            'surname' => 'required',
            'dob' => 'required',
            'contactno' => 'required|digits:10',
            // 'otp' => 'required',
            'state' => 'required',
            'district' => 'required',
            'address' => 'required',
        ]);

        // 🛠️ Log incoming data for debugging
        // Log::info('Storing data:', $request->all());

        // Store data directly
        Sendotp::create([
            'date' => $request->date,
            'person_name' => $request->person_name,
            'surname' => $request->surname,
            'dob' => $request->dob,
            'contactno' => $request->contactno,
            // 'otp' => $request->otp,
            'state' => $request->state,
            'district' => $request->district,
            'address' => $request->address,
        ]);

        session()->forget('otp_verified');

        return response()->json(['message' => 'Data submitted successfully']);
    }
}