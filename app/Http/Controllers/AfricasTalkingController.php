<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use AfricasTalking\SDK\AfricasTalking;

class AfricasTalkingController extends Controller
{
    //

    public function sendSMS(Request $request)
    {
        $username = env('AFRICASTALKING_USERNAME');
        $apiKey = env('AFRICASTALKING_API_KEY');
        $appname = env('AFRICASTALKING_APP_NAME');
        $AT       = new AfricasTalking($username, $apiKey);

        $sms = $AT->sms();

        $recipient = '+254759522811'; //$request->input('recipient');
        $message = $request->input('message');

        try {
            $result = $sms->send([
                'to' => $recipient,
                'message' => $message,
            ]);

            if ($result['status'] === 'success') {
                return response()->json(['success' => true, 'message' => $request->input('message')]);
            } else {
                return response()->json(['success' => false, 'message' => 'Message Not sent']);
            }
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }
}
