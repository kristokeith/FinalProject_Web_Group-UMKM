<?php

namespace App\Http\Controllers;

use \App\Models\User;
use App\Models\message;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil pengguna saat ini
        $user = auth()->user();
        $users = User::where('id', $user->id)->first();
        $customer = User::join('messages', 'users.id', '=', 'messages.sender_id')
            ->where(function ($query) {
                $query->where('users.role', 'owner')
                    ->orWhere('users.role', 'customer')
                    ->orWhere('users.role', 'admin');
            })
            ->where('messages.receiver_id',$user->id)
            ->select('users.*')
            ->distinct()
            ->get();  
        return view('chat.index', compact('users', 'customer'));
    }

    public function show($sendId, $receiverId)
    {
        // Ambil pengguna saat ini
        $user = auth()->user();

        // Ambil pesan berdasarkan ID yang diberikan
        $sentMessages = Message::orderBy('created_at', 'asc')
            ->where('sender_id', $sendId)
            ->where('receiver_id', $receiverId)
            ->get();

        $receivedMessages = Message::orderBy('created_at', 'desc')
            ->where('sender_id', $receiverId)
            ->where('receiver_id', $sendId)
            ->get();

        $allMessages = $sentMessages->concat($receivedMessages)->sortBy('created_at');

        $sender = User::find($sendId);
        $receiver = User::find($receiverId);

        return view('chat.index2', compact('allMessages', 'sender', 'receiver'));
    }

    public function sendMessage(Request $request, $senderId, $receiverId)
    {
        $validatedData = $request->validate([
            'message' => 'required|string|max:255',
        ]);

        $message = new Message();
        $message->sender_id = $senderId;
        $message->receiver_id = $receiverId;
        $message->content = $validatedData['message'];
        $message->save();

        return redirect()->back()->with('success', 'Message sent successfully!');
    }
    public function index2()
    {
        // Ambil pengguna saat ini
        $user = auth()->user();
        $users = User::where('id', $user->id)->first();
        $customer = User::join('messages', 'users.id', '=', 'messages.sender_id')
            ->where(function ($query) {
                $query->where('users.role', 'owner')
                    ->orWhere('users.role', 'customer')
                    ->orWhere('users.role', 'admin');
            })
            ->where('messages.receiver_id',$user->id)
            ->select('users.*')
            ->distinct()
            ->get(); 
        return view('chat.indexCust', compact('users', 'customer'));
    }

    public function show2($sendId, $receiverId)
    {
        // Ambil pengguna saat ini
        $user = auth()->user();

        // Ambil pesan berdasarkan ID yang diberikan
        $sentMessages = Message::orderBy('created_at', 'asc')
            ->where('sender_id', $sendId)
            ->where('receiver_id', $receiverId)
            ->get();

        $receivedMessages = Message::orderBy('created_at', 'desc')
            ->where('sender_id', $receiverId)
            ->where('receiver_id', $sendId)
            ->get();

        $allMessages = $sentMessages->concat($receivedMessages)->sortBy('created_at');

        $sender = User::find($sendId);
        $receiver = User::find($receiverId);

        return view('chat.indexCust2', compact('allMessages', 'sender', 'receiver'));
    }

    public function sendMessage2(Request $request, $senderId, $receiverId)
    {
        $validatedData = $request->validate([
            'message' => 'required|string|max:255',
        ]);

        $message = new Message();
        $message->sender_id = $senderId;
        $message->receiver_id = $receiverId;
        $message->content = $validatedData['message'];
        $message->save();

        return redirect()->back()->with('success', 'Message sent successfully!');
    }
    public function index3()
    {
        // Ambil pengguna saat ini
        $user = auth()->user();
        $users = User::where('id', $user->id)->first();
        $customer = User::join('messages', 'users.id', '=', 'messages.sender_id')
            ->where(function ($query) {
                $query->where('users.role', 'owner')
                    ->orWhere('users.role', 'customer');
            })
            ->where('messages.receiver_id',$user->id)
            ->select('users.*')
            ->distinct()
            ->get();
        return view('chat.indexAdmin', compact('users', 'customer'));
    }

    public function show3($sendId, $receiverId)
    {
        // Ambil pengguna saat ini
        $user = auth()->user();

        // Ambil pesan berdasarkan ID yang diberikan
        $sentMessages = Message::orderBy('created_at', 'asc')
            ->where('sender_id', $sendId)
            ->where('receiver_id', $receiverId)
            ->get();

        $receivedMessages = Message::orderBy('created_at', 'desc')
            ->where('sender_id', $receiverId)
            ->where('receiver_id', $sendId)
            ->get();

        $allMessages = $sentMessages->concat($receivedMessages)->sortBy('created_at');

        $sender = User::find($sendId);
        $receiver = User::find($receiverId);

        return view('chat.indexAdmin2', compact('allMessages', 'sender', 'receiver'));
    }

    public function sendMessage3(Request $request, $senderId, $receiverId)
    {
        $validatedData = $request->validate([
            'message' => 'required|string|max:255',
        ]);

        $message = new Message();
        $message->sender_id = $senderId;
        $message->receiver_id = $receiverId;
        $message->content = $validatedData['message'];
        $message->save();

        return redirect()->back()->with('success', 'Message sent successfully!');
    }
    public function index4(Request $r)
    {
        // Ambil pengguna saat ini
        $user = auth()->user();
        $users = User::where('id', $user->id)->first();
        if ($r->has('search')) {
            $searchTerm = $r->search;
            $customer = User::where('name',$searchTerm)->get();
        }else {
       
        $customer = User::all();
        }
        return view('chat.indexx', compact('users', 'customer'));
    }
    public function index5(Request $r)
    {
        // Ambil pengguna saat ini
        $user = auth()->user();
        $users = User::where('id', $user->id)->first();
        if ($r->has('search')) {
            $searchTerm = $r->search;
            $customer = User::where('name',$searchTerm)->get();
        }else {
       
        $customer = User::all();
        }
        return view('chat.indexx2', compact('users', 'customer'));
    }
    public function index6(Request $r)
    {
        // Ambil pengguna saat ini
        $user = auth()->user();
        $users = User::where('id', $user->id)->first();
        if ($r->has('search')) {
            $searchTerm = $r->search;
            $customer = User::where('name',$searchTerm)->get();
        }else {
       
        $customer = User::all();
        }
        return view('chat.indexx3', compact('users', 'customer'));
    }
}
