<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::orderByDesc('created_at')->paginate(15);
        
        $unreadCount = Message::where('is_read', false)->count();
        
        return view('admin.messages.index', compact('messages', 'unreadCount'));
    }

    public function show(Message $message)
    {
        return view('admin.messages.show', compact('message'));
    }

    public function update(Request $request, Message $message)
    {
        $validated = $request->validate([
            'reply' => 'required|string',
        ]);

        $message->update([
            'reply' => $validated['reply'],
            'replied_at' => now(),
        ]);

        // Send email reply (optional - you can implement email sending here)
        // Mail::to($message->email)->send(new MessageReply($message));

        return redirect()->route('admin.messages.show', $message)
            ->with('success', 'Reply sent successfully!');
    }

    public function destroy(Message $message)
    {
        $message->delete();

        return redirect()->route('admin.messages.index')
            ->with('success', 'Message deleted successfully!');
    }

    public function markAsRead(Message $message)
    {
        $message->markAsRead();

        return redirect()->back()->with('success', 'Message marked as read.');
    }

    public function markAsUnread(Message $message)
    {
        $message->markAsUnread();

        return redirect()->back()->with('success', 'Message marked as unread.');
    }
}
