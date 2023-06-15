@extends('dasboard.dasboard')
@section('content')
<div class="pb-3">
    <a href="{{ route('profile.index') }}" class="btn btn-secondary"> Back
    </a>
</div>
<form action="{{ route('profile.update',$data->id) }}"method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Nama:</label>
        <input type="text" class="form-control" name="name" required value="{{ $data->name }}" />
    </div>
    <div class="form-group">
        <label for="phone">Nomor Telepon:{{ $data->notel }}</label>
        <input type="text" class="form-control" name="phone" required />
    </div>
    <div class="form-group">
        <label for="address">Alamat:{{ $data->address }}</label>
        <textarea class="form-control" name="address" rows="4" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection