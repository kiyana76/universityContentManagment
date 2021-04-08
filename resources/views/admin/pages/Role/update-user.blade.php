@extends('admin.master')
@section('header_title', 'ویرایش نقش کاربران')
@section('breadcrumb-items')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">صفحه اصلی</a></li>
    <li class="breadcrumb-item"><a href="{{ route('all-users') }}">مدیریت نقش‌ کاربران</a></li>
    <li class="breadcrumb-item active">ویرایش نقش کاربر</li>
@endsection

@section('content')
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">ویرایش نقش کاربر</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>

        <form method="POST" role="form" action="{{ route('updateUserRole', $user->id) }}">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="full_name">نام و نام حانوادگی</label>
                        <input type="text" class="form-control" id="full_name" name="full_name" placeholder="نام و نام خانودگی" required
                               disabled value="{{ $user->full_name }}">
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="email">ایمیل</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="ایمیل" required
                               disabled value="{{ $user->email }}">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="role_id"> نقش ها </label>
                        <select class="form-control select2" name="roles_id[]" id="roles_id" style="width: 100%" multiple>
                            @foreach($roles as $item)
                                <option value="{{ $item->id }}" {{ in_array($item->id, $user_roles_id) ? 'selected' : '' }}>
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
