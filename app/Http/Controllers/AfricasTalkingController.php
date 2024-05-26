<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use AfricasTalking\SDK\AfricasTalking;

class AfricasTalkingController extends Controller
{
    //

    public function sendSMS()
    {
        $username = env('AFRICASTALKING_USERNAME');
        $apiKey = env('AFRICASTALKING_API_KEY');

        $AT       = new AfricasTalking($username, $apiKey);

        $sms = $AT->sms();

        $message = "Hello from Africa's Talking!";
        $recipients = "+254743381134";

        try {
            $result = $sms->send([
                'to' => $recipients,
                'message' => $message,
            ]);

            if ($result['status'] === 'success') {
                return response()->json(['success' => true, 'message' => 'Message sent successfully']);
            } else {
                return response()->json(['success' => false, 'message' => 'Message sent successfully']);
            }
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }
}
