<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use AfricasTalking\SDK\AfricasTalking;

class AfricasTalkingController extends Controller
{
    //

    public function sendSMS()
    {
        // Initialize the Africa's Talking SDK
        // $AT = new AfricasTalking(config('services.africastalking.username'), config('services.africastalking.api_key'));
        $username = 'mathewwahome'; // use 'sandbox' for development in the test environment
        $apiKey   = 'dc433f548f5215e107c13ba95af090b49331d784d422b3f16e5603c539af96b0'; // use your sandbox app API key for development in the test environment
        $AT       = new AfricasTalking($username, $apiKey);

        // Get the SMS service
        $sms = $AT->sms();

        // Set the parameters
        $message = "Hello from Africa's Talking!";
        $recipients = "+254743381134";

        // Send the SMS
        $result = $sms->send([
            'to'      => $recipients,
            'message' => $message
        ]);

        // Handle the response
        if ($result['status'] === 'success') {
            return "SMS sent successfully";
        } else {
            return "Failed to send SMS";
        }
    }
}
