@extends('admin.layouts.master')
@section("pageName", "UMKM Account Detail")
@section('content')
<div class="container">
    <h1>Inbox</h1>
    <ul class="message-list">
        @foreach($customer as $customers)
            <li>
                <a href="{{ url('messagess/'.$users->id.'/'.$customers->id) }}">{{ $customers->name }} start chat</a>

            </li>
        @endforeach
    </ul>
</div>
@endsection
