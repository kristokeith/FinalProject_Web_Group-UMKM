@extends('dasboard.dasboard')
@section('content')
    <p class="card-title">halaman</p> 
   
    <div class="pb-3"><a href="{{ route('halaman.create') }}" class="btn btn-primary">Tambah Product</a></div>
    <div class="card-tools">
        <form action="{{ route('halaman.index') }}" class="form-inline" method="GET">
          <input type="search" name="search" class="form-control " placeholder="Search">
          <div class="input-group-append">
            <button type="submit" class="btn btn-default">
              <i class="uil uil-search"></i>
            </button>
          </div>
        </form>
      </div>
    <div class="container">
        <div class="row">
            @foreach ($products as $card)
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ asset('product/'.$card->gambar) }}" class="card-img-top" alt="{{ $card->judul }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $card->judul }}</h5>
                            <p class="card-text">{{ $card->kategori->name }}</p>
                            <p class="card-text">{{ $card->deskripsi }}</p>
                            <a href='{{ route('halaman.edit',$card->id) }}'class="btn btn-sm btn-warning"><i class="uil uil-edit-alt"></i>Edit</a>
                                <form onsubmit="return confirm('yakin mau hapus data ini?')" action="{{ route('halaman.destroy', $card->id) }}"class="d-inline" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" type="submit"
                                    name='submit'><i class="uil uil-trash-alt"></i>Delete</button>
                                </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
                  {{-- <div class="table-responsive">
                   <table class="table table-stripped">
                    <thead>
                        <tr>
                            <th class="col-1">No</th>
                            <th>Judul</th>
                            <th>Deskripsi</th>
                            <th >Product</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                        @foreach ($data as $card)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $card->judul }}</td>
                            <td>{{ $card->deskripsi }}</td>
                            <td>{{ $card->gambar }}</td>
                            <td>
                                <a href='{{ route('halaman.edit',$card->id) }}'class="btn btn-sm btn-warning">Edit</a>
                                <form onsubmit="return confirm('yakin mau hapus data ini?')" action="{{ route('halaman.destroy', $card->id) }}"class="d-inline" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" type="submit"
                                    name='submit'>Del</button>
                                </form>
                           </td>
                        </tr>
                        
                        @endforeach
                    </tbody>
                   </table>
                  </div> --}}
@endsection
