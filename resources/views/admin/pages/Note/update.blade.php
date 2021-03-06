@extends('admin.master')
@section('header_title', 'ویرایش جزوه')
@section('breadcrumb-items')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">صفحه اصلی</a></li>
    <li class="breadcrumb-item"><a href="{{ route('notes.index') }}">مدیریت جزوه ها</a></li>
    <li class="breadcrumb-item active">ویرایش جزوه</li>
@endsection

@section('content')
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">ویرایش جزوه</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>

        <div class="col-sm-4 image card-img">
            <img class="card-img" src="{{ url('storage/' . $note->resource->thumbnail_image) }}">
        </div>

        <form method="POST" role="form" action="{{ route('notes.update', $note->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="title">عنوان جزوه</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="عنوان" required value="{{ $note->resource->title }}">
                    </div>

                    <div class="form-group col-sm-6">
                        <label>وضعیت</label>
                        <div class="form-check">
                            <input name="status" type="hidden" value="">
                            <input id="approve" name="status" class="form-check-input" type="radio" value="approve" required {{ $note->resource->status == 'approve' ? 'checked' : '' }}>
                            <label for="approve" class="form-check-label">تایید شده</label>
                        </div>
                        <div class="form-check">
                            <input id="pending" name="status" class="form-check-input" type="radio" value="pending" {{ $note->resource->status == 'pending' ? 'checked' : '' }}>
                            <label for="pending" class="form-check-label">در انتظار تایید</label>
                        </div>
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="description">توضیحات</label>
                        <input class="form-control" id="description" name="description" type="text" placeholder="توضیحات" value="{{ $note->resource->description }}">
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="teacher_name">نام استاد</label>
                        <input class="form-control" id="teacher_name" name="teacher_name" type="text" placeholder="نام استاد" required value="{{ $note->teacher_name }}">
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="year">سال تحصیلی</label>
                        <div class="col-sm-12">
                            <select class="form-control select2" name="year" id="year" style="width: 50%" required>
                                <option value="1394" {{ $note->year == "1394" ? 'selected' : '' }}>۱۳۹۴</option>
                                <option value="1395" {{ $note->year == "1395" ? 'selected' : '' }}>۱۳۹۵</option>
                                <option value="1396" {{ $note->year == "1396" ? 'selected' : '' }}>۱۳۹۶</option>
                                <option value="1397" {{ $note->year == "1397" ? 'selected' : '' }}>۱۳۹۷</option>
                                <option value="1398" {{ $note->year == "1398" ? 'selected' : '' }}>۱۳۹۸</option>
                                <option value="1399" {{ $note->year == "1399" ? 'selected' : '' }}>۱۳۹۹</option>
                                <option value="1400" {{ $note->year == "1400" ? 'selected' : '' }}>۱۴۰۰</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group col-sm-6">
                        <label>ترم</label>
                        <div class="form-check">
                            <input name="term" type="hidden" value="">
                            <input id="1" name="term" class="form-check-input" type="radio" value="1" required {{ $note->term == '1' ? 'checked' : '' }}>
                            <label for="1" class="form-check-label">۱</label>
                        </div>
                        <div class="form-check">
                            <input id="2" name="term" class="form-check-input" type="radio" value="2" {{ $note->term == '2' ? 'checked' : '' }}>
                            <label for="2" class="form-check-label">۲</label>
                        </div>
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="field_id"> رشته تحصیلی مربوطه </label>
                        <div class="col-sm-12">
                            <select class="form-control select2" name="field_id[]" required multiple>
                                @foreach($fields as $item)
                                    <option value="{{ $item->id }}" {{ in_array($item->id, $fields_id) ? 'selected' : '' }}>{{ $item->full_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="thumbnail_image">Thumbnail</label>
                        <div class="">
                            <input type="file" name="thumbnail_image" id="thumbnail_image">
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
