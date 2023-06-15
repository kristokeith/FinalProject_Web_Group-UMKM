@extends('dasboard.dasboard')

@section('content')
<div class="container">
    <h1>Inbox</h1>
    <ul class="message-list">
        @foreach($customer as $customers)
            <li>
                <a href="{{ url('messages/'.$users->id.'/'.$customers->id) }}">{{ $customers->name }} start chat</a>

            </li>
        @endforeach
    </ul>
</div>
@endsection
