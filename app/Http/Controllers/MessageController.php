<?php

namespace App\Http\Controllers;

use App\Models\message;
use App\Models\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        // Ambil semua pesan yang dikirim dan diterima oleh pengguna saat ini
        $user = auth()->user();
        $sentMessages = $user->sentMessages()->with('receiver')->get();
        $receivedMessages = $user->receivedMessages()->with('sender')->get();
    
        // Ambil daftar users dengan role customer atau owner
        $users = User::whereIn('role', ['customer', 'owner'])->get();
    
        return view('chat.index2', compact('sentMessages', 'receivedMessages', 'users'));
    }
    public function create($receiverId)
    {
        // Ambil pengguna saat ini sebagai pengirim (sender)
        $sender = auth()->user();

        // Ambil penerima (receiver) berdasarkan ID yang diberikan
        $receiver = User::findOrFail($receiverId);

        // Ambil semua pesan antara sender dan receiver
        $messages = Message::where(function ($query) use ($sender, $receiver) {
            $query->where('sender_id', $sender->id)
                  ->where('receiver_id', $receiver->id);
        })->orWhere(function ($query) use ($sender, $receiver) {
            $query->where('sender_id', $receiver->id)
                  ->where('receiver_id', $sender->id);
        })->orderBy('created_at', 'asc')->get();

        return view('chat.index2', compact('sender', 'receiver', 'messages'));
    }

    public function sendMessage(Request $request)
    {
        // Validasi data yang diterima dari formulir pengiriman pesan
        $validatedData = $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'content' => 'required|string',
        ]);

        // Ambil pengguna saat ini sebagai pengirim (sender)
        $sender = auth()->user();

        // Buat pesan baru
        $message = new Message();
        $message->sender_id = $sender->id;
        $message->receiver_id = $validatedData['receiver_id'];
        $message->content = $validatedData['content'];
        $message->save();

        // Redirect kembali ke halaman chat dengan parameter receiver_id
        return redirect()->route('chat.create', ['receiver_id' => $validatedData['receiver_id']]);
    }
}
