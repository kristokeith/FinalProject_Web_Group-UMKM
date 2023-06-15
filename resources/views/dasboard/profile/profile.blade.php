@extends('dasboard.dasboard')
@section('content')
<div class="pb-3">
    <a href="{{ route('profile.index') }}" class="btn btn-secondary"> Back
    </a>
</div>
<form action="{{ route('profile.update',$profile->id) }}"method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <img width="100" height="100"src="{{ asset('profile/' . Auth::user()->avatar) }} " alt="profile"/>
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
        <label for="phone">Nomor Telepon:</label>
        <input type="text" class="form-control" name="phone" required value="{{ $profile->notel }}" />
    </div>
    <div class="form-group">
        <label for="address">Alamat:</label>
        <input type="text" class="form-control" name="address" rows="4" required value="{{ $profile->alamat }}"></textarea>
    </div>
    <label for="pdf_file">File Perijinan:</label>
    <input type="file" name="pdf_file" value="{{ $profile->perijinan }}"><br>
    
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection