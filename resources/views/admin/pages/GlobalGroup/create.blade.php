@extends('admin.master')
@section('header_title', 'ایجاد گروه آموزشی')
@section('breadcrumb-items')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">صفحه اصلی</a></li>
    <li class="breadcrumb-item"><a href="{{ route('groups.index') }}">مدیریت گروه های آموزشی</a></li>
    <li class="breadcrumb-item active">ایجاد گروه آموزشی</li>
@endsection

@section('content')
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">ایجاد گروه آموزشی</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>

        <form method="POST" role="form" action="{{ route('groups.store') }}">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="title">عنوان گروه آموزشی</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="عنوان" required>
                    </div>

                    <div class="form-group col-sm-6">
                        <label>وضعیت</label>
                        <div class="form-check">
                            <input name="status" type="hidden" value="">
                            <input id="enable" name="status" class="form-check-input" type="radio" value="enable" required>
                            <label for="enable" class="form-check-label">فعال</label>
                        </div>
                        <div class="form-check">
                            <input id="disable" name="status" class="form-check-input" type="radio" value="disable">
                            <label for="disable" class="form-check-label">غیرفعال</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-info">ثبت</button>
            </div>
        </form>
    </div>
@endsection
