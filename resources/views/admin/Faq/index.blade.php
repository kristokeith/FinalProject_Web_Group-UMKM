@extends('admin.layouts.master')
@section("headerName", "Frequently Asked Questions")
@section('headerPlus')
<br>
<div class="container">
    <a type="button" class="btn btn-danger plus float-left" href="/faq/create">Add Question</a>
</div>
@endsection
@section("pageName", "FAQ")
@section("content")
<div class="container">
    <div class="row">
        <div class="col-12" id="accordion">
        @foreach($faq as $f)
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h4 class="card-title w-100">
                        <div class="d-md-flex justify-content-end" role="group" aria-label="Basic example">
                            <a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
                            {{$f->question}}
                            </a> 
                            <a class="btn btn-warning plus float-right" href="/faq/{{$f->id}}/edit">Edit</a>      
                            <form action="/faq/{{$f->id}}" method="POST">
                                @csrf
                                @method('delete')
                                <input class="btn btn-danger" type="submit" value="Delete">
                            </form>
                        </div> 
                    </h4>
                </div>
                <div id="collapseOne" class="collapse show" data-parent="#accordion">
                    <div class="card-body">
                        {{$f->answer}}
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</div>
@endsection