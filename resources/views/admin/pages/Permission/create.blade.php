@extends('admin.master')
@section('header_title', 'ایجاد مجوز')
@section('breadcrumb-items')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">صفحه اصلی</a></li>
    <li class="breadcrumb-item"><a href="{{ route('permissions.index') }}">مدیریت مجوز‌ها</a></li>
    <li class="breadcrumb-item active">ایجاد مجوز</li>
@endsection

@section('content')
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">ایجاد مجوز</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>

        <form method="POST" role="form" action="{{ route('permissions.store') }}">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="title">عنوان انگلیسی مجوز</label>
                        <input type="text" class="form-control" id="title" name="name" placeholder="عنوان" required>
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="title">عنوان فارسی مجوز</label>
                        <input type="text" class="form-control" id="title" name="fa_name" placeholder="عنوان" required>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-info">ثبت</button>
            </div>
        </form>
    </div>
@endsection
