@extends('customer.master')
@section('judul', 'UMKM Malang')
@section('isi')
<br><br><br><br><br><br>
<div class="container">
    <h1>Inbox</h1>
    <ul class="message-list">
        @foreach($customer as $customers)
            <li>
                <a href="{{ url('message/'.$users->id.'/'.$customers->id) }}">{{ $customers->name }} start chat</a>

            </li>
        @endforeach
    </ul>
</div>
@endsection
