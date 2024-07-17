<?php

// app/Http/Controllers/EmailListController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmailList;

class EmailListController extends Controller
{
    public function index()
    {
        $emails = EmailList::all();
        return response()->json($emails);
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:email_list,email',
            'name' => 'required|string|max:255',
        ]);

        $email = EmailList::create($request->all());

        return response()->json($email, 201);
    }

    public function destroy($id)
    {
        $email = EmailList::findOrFail($id);
        $email->delete();

        return response()->json(null, 204);
    }
}
