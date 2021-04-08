@extends('admin.master')
@section('header_title', 'ویرایش نقش')
@section('breadcrumb-items')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">صفحه اصلی</a></li>
    <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">مدیریت نقش‌ها</a></li>
    <li class="breadcrumb-item active">ویرایش نقش</li>
@endsection

@section('content')
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">ویرایش نقش</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>

        <form method="POST" role="form" action="{{ route('roles.update', $role->id) }}">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="title">عنوان انگلیسی نقش</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="عنوان" required
                               value="{{ $role->name }}">
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="title">عنوان فارسی نقش</label>
                        <input type="text" class="form-control" id="fa_name" name="fa_name" placeholder="عنوان" required
                               value="{{ $role->fa_name }}">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="permission_id"> مجوزهای مربوطه </label>
                        <select class="form-control select2" name="permissions_id[]" id="permissions_id" style="width: 100%" multiple>
                            @foreach($permissions as $item)
                                <option value="{{ $item->id }}" {{ in_array($item->id, $role_permissions_id) ? 'selected' : '' }}>
                                    {{ $item->fa_name }}</option>
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
