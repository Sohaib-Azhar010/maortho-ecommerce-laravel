<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedback = Feedback::latest()->paginate(15);

        return view('admin.feedback.index', compact('feedback'));
    }

    public function update(Request $request, Feedback $feedback)
    {
        $feedback->update([
            'show_on_site' => $request->boolean('show_on_site'),
        ]);

        return redirect()->route('admin.feedback.index')->with('success', 'Feedback visibility updated.');
    }
}
