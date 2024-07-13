<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use AfricasTalking\SDK\AfricasTalking;
use Illuminate\Support\Facades\Log;

class AfricasTalkingController extends Controller
{
    public function sendSMS(Request $request)
    {

        $username = env('AFRICASTALKING_SENDER_ID');
        $apiKey =  env('AFRICASTALKING_SENDER_ID');
        $senderId = env('AFRICASTALKING_SENDER_ID');

        if (!$username || !$apiKey || !$senderId) {
            return response()->json(['success' => false, 'error' => 'Missing AfricasTalking credentials or sender ID']);
        }

        $AT = new AfricasTalking($username, $apiKey);
        $sms = $AT->sms();

        $request->validate([
            'message' => 'required|string',
        ]);


        $recipient = "+254743381134";
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