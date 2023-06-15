@extends('admin.layouts.master')
@section("headerName", "Edit Frequently Asked Question")
@section("pageName", "Edit News")
@section("content")
<div class="container">
    <form action="/news/{{$news->id}}" method="POST" enctype="multipart/form-data">
    @method('put')
    @csrf
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Edit the News</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Headline :" name="headline" value="{{$news->headline}}">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Date : " name="date" value="{{$news->date}}">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Author : " name="author" value="{{$news->author}}">
                            </div>
                            <div class="form-group">
                                <textarea type="text" name="content" placeholder="Content : "id="compose-textarea" class="form-control" style="height: 300px">{{$news->content}}</textarea>
                            </div>
                            <div class="mb-3">
                                 
                                <label for="picture" class="form-label">Post Image</label>
                                @if($news->picture)
                                <img src="{{asset('newspicture/'.$news->picture)}}" class="img-preview img-fluid mb-3 col-sm-10 d-block   ">
                                @else
                                <img class="img-preview img-fluid mb-3 col-sm-10    ">
                                @endif
                                <input class="form-control @error('picture') is-invalid @enderror" type="file" id="picture"
                                name="picture" onchange="previewImage()">
                                @error('picture')
                                <div class="invalid-feedback">
                                Invalid file
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="float-right">
                                <input type="submit" name="submit" value="Save" class="btn btn-primary">
                            </div>
                            <button type="reset" class="btn btn-default"><i class="fas fa-times"></i> Discard</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    function previewImage(){
    const image = document.querySelector('#picture');
    const imgPreview = document.querySelector('.img-preview');

    imgPreview.style.display = 'block';

    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload=function(oFREvent){
        imgPreview.src = oFREvent.target.result;
    }
}
</script>
@endsection