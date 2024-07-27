<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use AfricasTalking\SDK\AfricasTalking;
use App\Models\Message;
use Illuminate\Support\Facades\Log;

class MessagesController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'tenant_id' => 'required|exists:tenants,id',
            'message' => 'required|string',
        ]);

        $message = Message::create([
            'tenant_id' => $request->tenant_id,
            'message' => $request->message,
        ]);

        return redirect()->back();
    }


    public function notice()
    {
        return view('dashboard.pages.notifications.all');
    }
    public function sms()
    {
        return view('dashboard.pages.notifications.sms');
    }
    public function email()
    {
        return view('dashboard.pages.notifications.email');
    }
    public function single(Request $request)
    {
        $message = new Notification();



        $username = env('AFRICASTALKING_USERNAME');
        $apiKey =  env('AFRICASTALKING_API_KEY');
        $senderId = env('AFRICASTALKING_APP_NAME');

        if (!$username || !$apiKey || !$senderId) {
            return response()->json(['success' => false, 'error' => 'Missing AfricasTalking credentials or sender ID']);
        }

        $AT = new AfricasTalking($username, $apiKey);
        $sms = $AT->sms();

        $request->validate([
            'message' => 'required|string',
        ]);

        $message = $request->input('message');

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
