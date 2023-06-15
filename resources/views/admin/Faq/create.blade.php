@extends('admin.layouts.master')
@section("headerName", "Create Frequently Asked Question")
@section("pageName", "Create FAQ")
@section("content")
<div class="container">
    <form action="/faq/store" method="POST">
        @csrf
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Compose New Question and Answer</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Question : " name="question">
                            </div>
                            <div class="form-group">
                                <textarea type="text" name="answer" placeholder="Answer : "id="compose-textarea" class="form-control" style="height: 300px"></textarea>
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
@endsection