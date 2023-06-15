@extends('admin.layouts.master')
@section("headerName", "Add UMKM News")
@section('headerPlus')
<br>
<div class="container">
    <a type="button" class="btn btn-danger plus float-left" href="/news/create">Add News</a>
</div>
@endsection
@section("pageName", "News")
@section("content")
<div class="container">
    <div class="row">
        <div class="col-12" id="accordion">
        @foreach($news as $n)
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h4 class="card-title w-100">
                        <div class="d-md-flex justify-content-end" role="group" aria-label="Basic example">
                            <a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
                            {{$n->headline}}
                            </a> 
                            <a class="btn btn-warning plus float-right" href="/news/{{$n->id}}/edit">Edit</a>      
                            <form action="/news/{{$n->id}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('delete')
                                <input class="btn btn-danger" type="submit" value="Delete">
                            </form>
                        </div> 
                    </h4>
                </div>
                <div id="collapseOne" class="collapse " data-parent="#accordion">
                    <div class="card-body">
                        <img src="{{asset('newspicture/'.$n->picture)}}" alt="" style=" width : 80px;">
                        <br>
                        Date : {{$n->date}}
                        <br>
                        Author : {{$n->author}}
                        <br>
                        Content : {{$n->content}}
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</div>
@endsection