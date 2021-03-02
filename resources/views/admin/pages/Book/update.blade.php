@extends('admin.master')
@section('header_title', 'ویرایش کتاب')
@section('breadcrumb-items')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">صفحه اصلی</a></li>
    <li class="breadcrumb-item"><a href="{{ route('books.index') }}">مدیریت کتب</a></li>
    <li class="breadcrumb-item active">ویرایش کتاب</li>
@endsection

@section('content')
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">ویرایش کتاب</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>

        <div class="col-sm-4 image card-img">
            <img class="card-img" src="{{ url('storage/' . $book->resource->thumbnail_image) }}">
        </div>

        <form method="POST" role="form" action="{{ route('books.update', $book->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="title">عنوان کتاب</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="عنوان" value="{{ $book->resource->title }}" required>
                    </div>

                    <div class="form-group col-sm-6">
                        <label>وضعیت</label>
                        <div class="form-check">
                            <input name="status" type="hidden" value="">
                            <input id="approve" name="status" class="form-check-input" type="radio" value="approve" required {{ $book->resource->status == 'approve' ? 'checked' : '' }}>
                            <label for="approve" class="form-check-label">تایید شده</label>
                        </div>
                        <div class="form-check">
                            <input id="pending" name="status" class="form-check-input" type="radio" value="pending" {{ $book->resource->status == 'pending' ? 'checked' : '' }}>
                            <label for="pending" class="form-check-label">در انتظار تایید</label>
                        </div>
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="description">توضیحات</label>
                        <input class="form-control" id="description" name="description" type="text" placeholder="توضیحات" value="{{ $book->resource->description }}">
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="writer">نام نویسنده</label>
                        <input class="form-control" id="writer" name="writer" type="text" placeholder="نام نویسنده" value="{{ $book->writer }}">
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="publisher">نام انتشارات</label>
                        <input class="form-control" id="publisher" name="publisher" type="text" placeholder="نام انتشارات" value="{{ $book->publisher }}">
                    </div>

                    <div class="form-group col-sm-6">
                        <label>ویرایش</label>
                        <div class="form-check">
                            <input id="edit" name="edit" class="form-check-input" type="number" required value="{{ $book->edit }}">
                        </div>
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="field_id"> رشته تحصیلی مربوطه </label>
                        <div class="col-sm-12">
                            <select class="form-control select2" name="field_id[]" multiple required>
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
    </script>
@endpush
