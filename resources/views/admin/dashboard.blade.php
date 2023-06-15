@extends('admin.layouts.master')
@section("headerName", "Hello Welcome Back")
@section('content')
<!-- Main content -->
    <section class="content">
      <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Admin Dashboard page</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                Welcome to the admin dashboard page.
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                Portal UMKM Indonesia
            </div>
            <!-- /.card-footer-->
        </div>
      <!-- /.card -->
    </section>
<!-- /.content -->
<!-- /.content-wrapper -->
@endsection