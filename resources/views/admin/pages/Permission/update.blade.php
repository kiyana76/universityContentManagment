@extends('admin.master')
@section('header_title', 'ویرایش مجوز')
@section('breadcrumb-items')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">صفحه اصلی</a></li>
    <li class="breadcrumb-item"><a href="{{ route('permissions.index') }}">مدیریت نقش‌ها</a></li>
    <li class="breadcrumb-item active">ویرایش نقش</li>
@endsection

@section('content')
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">ویرایش مجوز</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>

        <form method="POST" role="form" action="{{ route('permissions.update', $permission->id) }}">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="title">عنوان انگلیسی مجوز</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="عنوان" required value="{{ $permission->name }}">
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="title">عنوان فارسی مجوز</label>
                        <input type="text" class="form-control" id="fa_name" name="fa_name" placeholder="عنوان" required value="{{ $permission->fa_name }}">
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-info">ثبت</button>
            </div>
        </form>
    </div>
@endsection
