@extends('admin.master')
@section('header_title', 'ایجاد نقش')
@section('breadcrumb-items')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">صفحه اصلی</a></li>
    <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">مدیریت نقش‌ها</a></li>
    <li class="breadcrumb-item active">ایجاد نقش</li>
@endsection

@section('content')
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">ایجاد نقش</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>

        <form method="POST" role="form" action="{{ route('roles.store') }}">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="title">عنوان انگلیسی نقش</label>
                        <input type="text" class="form-control" id="title" name="name" placeholder="عنوان" required>
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="title">عنوان فارسی نقش</label>
                        <input type="text" class="form-control" id="title" name="fa_name" placeholder="عنوان" required>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="permission_id"> مجوزهای مربوطه </label>
                        <select class="form-control select2" name="permissions_id[]" id="permissions_id" style="width: 100%" multiple>
                            @foreach($permissions as $item)
                                <option value="{{ $item->id }}">{{ $item->fa_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-info">ثبت</button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function (){
            $('.select2').select2({
                dir: 'rtl'
            });
        })
    </script>
@endpush
