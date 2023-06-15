@extends('admin.layouts.master')
@section("headerName", "User Account Detail")
@section("pageName", "User Account Detail")
@section('content')
<form action="{{ route('customer.update',$profile->id) }}"method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
    <img width="100" height="100"src="{{ asset('profile/' . $profile->avatar) }} " alt="profile"/>
    <div class="mb-3">
      <label for="profile" class="form-label text-light">GAMBAR</label>
      <input type="file" class="form-control @error('profile') is-invalid @enderror" value="{{ old ('profile') }}" id="profile" name="profile"
      accept="image/*" onchange="document.getElementById('output').src = window. URL.createObjectURL(this.files[0])">
      @error('profile')
      <span class="invalid-feedback" >
      <strong>{{ $message }}</strong>
      </span>
      @enderror
      </div>
    <div class="form-group">
        <label for="name">Nama:</label>
        <input type="text" class="form-control" name="name" required value="{{ $profile->name }}" />
    </div>
    <div class="form-group">
        <label for="email">email:</label>
        <input type="text" class="form-control" name="email" required value="{{ $profile->email }}" />
    </div>
    <div class="form-group">
        <label for="phone">Nomor Telepon:</label>
        <input type="text" class="form-control" name="phone" required value="{{ $profile->notel }}" />
    </div>
    <div class="form-group">
        <label for="address">Alamat:</label>
        <input type="text" class="form-control" name="address" rows="4" required value="{{ $profile->alamat }}"></textarea>
    
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
