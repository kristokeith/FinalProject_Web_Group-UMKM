@extends('dasboard.dasboard')

@section('content')
<div class="container">
    <h1>Chat</h1>
    <div class="card-tools">
        <form action="{{ route('chat') }}" class="form-inline" method="GET">
          <input type="search" name="search" class="form-control " placeholder="Search">
          <div class="input-group-append">
            <button type="submit" class="btn btn-default">
              <i class="uil uil-search"></i>
            </button>
          </div>
        </form>
      </div>
    <ul class="message-list">
        @foreach($customer as $customers)
            <li>
                <a href="{{ url('messages/'.$users->id.'/'.$customers->id) }}">{{ $customers->name }} start chat</a>

            </li>
        @endforeach
    </ul>
</div>
@endsection
