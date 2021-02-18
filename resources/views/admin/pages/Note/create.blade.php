@extends('admin.master')
@section('header_title', 'ایجاد جزوه')
@section('breadcrumb-items')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">صفحه اصلی</a></li>
    <li class="breadcrumb-item"><a href="{{ route('notes.index') }}">مدیریت جزوه ها</a></li>
    <li class="breadcrumb-item active">ایجاد جزوه</li>
@endsection

@section('content')
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">ایجاد جزوه</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>

        <form method="POST" role="form" action="{{ route('notes.store') }}">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="title">عنوان جزوه</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="عنوان" required>
                    </div>

                    <div class="form-group col-sm-6">
                        <label>وضعیت</label>
                        <div class="form-check">
                            <input name="status" type="hidden" value="">
                            <input id="approve" name="status" class="form-check-input" type="radio" value="approve" required>
                            <label for="approve" class="form-check-label">تایید شده</label>
                        </div>
                        <div class="form-check">
                            <input id="pending" name="status" class="form-check-input" type="radio" value="pending">
                            <label for="pending" class="form-check-label">در انتظار تایید</label>
                        </div>
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="description">توضیحات</label>
                        <input class="form-control" id="description" name="description" type="text" placeholder="توضیحات">
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="teacher_name">نام استاد</label>
                        <input class="form-control" id="teacher_name" name="teacher_name" type="text" placeholder="نام استاد">
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="year">سال تحصیلی</label>
                        <div class="col-sm-12">
                            <select class="form-control select2" name="year" id="year" style="width: 50%">
                                <option value="1394">۱۳۹۴</option>
                                <option value="1395">۱۳۹۵</option>
                                <option value="1396">۱۳۹۶</option>
                                <option value="1397">۱۳۹۷</option>
                                <option value="1398">۱۳۹۸</option>
                                <option value="1399">۱۳۹۹</option>
                                <option value="1400">۱۴۰۰</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group col-sm-6">
                        <label>ترم</label>
                        <div class="form-check">
                            <input name="term" type="hidden" value="">
                            <input id="1" name="term" class="form-check-input" type="radio" value="1" required>
                            <label for="1" class="form-check-label">۱</label>
                        </div>
                        <div class="form-check">
                            <input id="2" name="term" class="form-check-input" type="radio" value="2">
                            <label for="2" class="form-check-label">۲</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field_id"> رشته تحصیلی مربوطه </label>
                        <div class="col-sm-12">
                            <select class="form-control select2" name="field_id">
                                <option value="">انتخاب کنید</option>
                                @foreach($fields as $item)
                                    <option value="{{ $item->id }}">{{ $item->full_name }}</option>
                                @endforeach
                            </select>
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

@push('scripts')
    <script>
        $(document).ready(function (){
            $('.select2').select2({
                dir: 'rtl',
            });
        });

        $('#year').val('1399');
    </script>
@endpush
