<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'c_fname' => 'required|string|max:255',
            'c_lname' => 'required|string|max:255',
            'c_email' => 'required|email|max:255',
            'c_subject' => 'nullable|string|max:255',
            'c_message' => 'nullable|string',
        ]);

        Message::create([
            'first_name' => $validated['c_fname'],
            'last_name' => $validated['c_lname'],
            'email' => $validated['c_email'],
            'subject' => $validated['c_subject'] ?? null,
            'message' => $validated['c_message'] ?? '',
            'is_read' => false,
        ]);

        return redirect()->route('contact')
            ->with('success', 'Thank you for contacting us! We will get back to you soon.');
    }
}
