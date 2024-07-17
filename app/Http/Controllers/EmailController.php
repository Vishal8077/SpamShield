<?php

// app/Http/Controllers/EmailController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ExampleMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\SendEmailRequest;

class EmailController extends Controller
{
    public function sendEmail(SendEmailRequest $request)
    {
        $data = [
            'subject' => $request->subject,
            'name' => $request->name,
            'message' => $request->message,
        ];

        Mail::to($request->to)->send(new ExampleMail($data));

        return response()->json(['message' => 'Email sent successfully!']);
    }
}
