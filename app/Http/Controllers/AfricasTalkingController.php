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
        $apiKey =  'atsk_51fbc1fd6b7cd1d3b90136a26d47f67bcedf1106205d0da19545e51750a0b227fee7e483';
        $senderId = 'YNetSlution';

        if (!$username || !$apiKey || !$senderId) {
            return response()->json(['success' => false, 'error' => 'Missing AfricasTalking credentials or sender ID']);
        }

        $AT = new AfricasTalking($username, $apiKey);
        $sms = $AT->sms();

        $request->validate([
            'message' => 'required|string',
        ]);


        $recipient = "+254759522811";
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