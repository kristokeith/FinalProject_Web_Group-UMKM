@extends('admin.layouts.master')
@section("pageName", "UMKM Account Detail")
@section('content')
        


    <div class="container">
        <h1>Chat</h1>
    
        <div class="chat-container">
            <div class="chat-messages">
                @foreach($allMessages as $message)
                @if($message->sender_id == $sender->id)
                <div class="message receiver-message">
                    <h4 class="message-content font-weight-bold"> {{ $sender->name }} </h4>
                    <p class="message-content">{{ $message->content }}</p>
                    <small class="message-timestamp "style="color:grey;">{{ $message->created_at->format('H:i') }}</small>
                </div>
                <br>
                @else
                <div class="message sender-message">
                    <h4 class="message-content font-weight-bold"> {{ $receiver->name }} </h4>
                    <p class="message-content">{{ $message->content }}</p>
                    <small class="message-timestamp" style="color:grey;">{{ $message->created_at->format('H:i') }}</small>
                    
                    
                </div>
                <br>
                
                @endif
            @endforeach
                {{-- @foreach($allMessage as $message)
                <div class="message sender-message">
                    <span class="message-content">( {{ $sender->name }} )</span>
                    <span class="message-content">{{ $message->content }}</span>
                    <span class="message-timestamp">{{ $message->created_at->format('H:i') }}</span>
                </div>
                @endforeach
                
                @foreach($receivedMessages as $message)
                <div class="message receiver-message">
                    <span class="message-timestamp">{{ $message->created_at->format('H:i') }}</span>
                    <span class="message-content">{{ $message->content }}</span>
                    <span class="message-content">( {{ $receiver->name }} )</span>
                </div>
                @endforeach --}}
            </div>
            <div class="chat-input">
                <form method="POST" action="{{ route('chat.send', ['senderId' => $sender->id, 'receiverId' => $receiver->id]) }}">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="message" class="form-control" placeholder="Type your message here">
                    </div>
                    <button type="submit" class="btn btn-primary">Send</button>
                </form>
            </div>
        </div>
    </div>
    <style>
        .message.sender-message {
            text-align: left;
        }
    
        .message.receiver-message {
            text-align: right;
        }
    </style>
   @endsection



