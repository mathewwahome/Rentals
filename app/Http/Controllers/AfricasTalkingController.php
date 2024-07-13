<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use AfricasTalking\SDK\AfricasTalking;
use Illuminate\Support\Facades\Log;

class AfricasTalkingController extends Controller
{
    public function sendSMS(Request $request)
    {

        $username = 'mathewwahome';
        $apiKey = 'atsk_f796b99ef6c409298d546e35e90cb5cfe73fc88b55b1045c6944680f9f0457ab73ddc324';
        $senderId = 'YNetRental'; //env('AFRICASTALKING_SENDER_ID');

        if (!$username || !$apiKey || !$senderId) {
            return response()->json(['success' => false, 'error' => 'Missing AfricasTalking credentials or sender ID']);
        }

        $AT = new AfricasTalking($username, $apiKey);
        $sms = $AT->sms();

        $request->validate([
            'message' => 'required|string',
        ]);


        $recipient = "0759522811, 0743381134, 0772814073";
        $message = $request->input('message');

        try {
            $result = $sms->send([
                'to' => $recipient,
                'message' => $message,
                'from' => $senderId,
            ]);

            Log::info('SMS Request:', [
                'to' => $recipient,
                'message' => $message,
                'from' => $senderId,
            ]);
            Log::info('SMS Response:', $result);

            if ($result['status'] === 'success') {
                return response()->json(['success' => true, 'message' => 'Message sent successfully']);
            } else {
                return response()->json(['success' => false, 'message' => 'Message not sent', 'details' => $result]);
            }
        } catch (\Exception $e) {
            Log::error('SMS Error:', ['error' => $e->getMessage()]);
            return response()->json(['success' => false, 'error' => 'Error: ' . $e->getMessage()]);
        }
    }
}