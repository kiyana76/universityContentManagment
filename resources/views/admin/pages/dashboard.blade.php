
@extends('admin.master')
@section('header_title', 'صفحه اصلی')
@section('breadcrumb-items')
    <li class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">صفحه اصلی</a></li>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">عنوان</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="card-body">
            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            فوتر
        </div>
        <!-- /.card-footer-->
    </div>
</div><!-- /.container-fluid -->
@endsection
