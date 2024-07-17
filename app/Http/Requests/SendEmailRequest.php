<?php

// app/Http/Requests/SendEmailRequest.php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendEmailRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'to' => 'required|email',
            'subject' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'message' => 'required|string',
        ];
    }
}
