<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\EmailListController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\TestEmail;

Route::get('/', function () {
    return view('welcome');
});

// Route::post('/send-email', [EmailController::class, 'sendEmail']);
// Route::post('/send-email', function () {
//     $data = [
//         'to' => '8077vishal@gmail.com',
//         'subject' => 'Test Email',
//         'name' => 'Recipient Name',
//         'message' => 'This is a test message.',
//     ];

//     Mail::to($data['to'])->send(new TestEmail($data));
//     return response()->json(['message' => 'Email sent successfully!']);
// });
// Route to display the form
Route::get('/send-email-form', function () {
    return view('email-form');
});
// Route to handle form submission and send email
Route::post('/send-email', function () {
    // Validate input (if needed)

    // Prepare email data
    $data = [
        'to' => request()->input('email'), // Replace with your form field name for email
        'subject' => 'Test Email',          // Email subject
        'name' => request()->input('name'), // Replace with your form field name for name (optional)
        'message' => request()->input('message'), // Replace with your form field name for message
    ];

    try {
        // Send email
        Mail::to($data['to'])->send(new TestEmail($data));

        // Log success
        Log::info('Email sent successfully to: ' . $data['to']);

        // Return success response
        return redirect('/send-email-form')->with('success', 'Email sent successfully!');
    } catch (\Exception $e) {
        // Log error
        Log::error('Failed to send email to: ' . $data['to'] . '. Error: ' . $e->getMessage());

        // Return error response
        return redirect('/send-email-form')->with('error', 'Failed to send email. Please try again later.');
    }
});

Route::get('/email-list', [EmailListController::class, 'index']);
Route::post('/email-list', [EmailListController::class, 'store']);
Route::delete('/email-list/{id}', [EmailListController::class, 'destroy']);
