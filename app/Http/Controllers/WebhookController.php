<?php

// app/Http/Controllers/WebhookController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WebhookController extends Controller
{
    public function handle(Request $request)
    {
        $payload = $request->all();

        // Log the webhook payload for debugging
        Log::info('Webhook received', $payload);

        // Handle different event types (bounces, complaints, etc.)
        if (isset($payload['event-data'])) {
            $event = $payload['event-data'];

            if ($event['event'] == 'bounced' || $event['event'] == 'complained') {
                // Handle bounces or complaints
                Log::warning('Email bounced or complained', $event);
            }
        }

        return response()->json(['status' => 'success']);
    }
}
