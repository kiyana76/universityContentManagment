@extends('admin.master')
@section('header_title', 'ایجاد گروه آموزشی')
@section('breadcrumb-items')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">صفحه اصلی</a></li>
    <li class="breadcrumb-item"><a href="{{ route('fields.index') }}">مدیریت رشته های تحصیلی</a></li>
    <li class="breadcrumb-item active">ایجاد رشته تحصیلی</li>
@endsection

@section('content')
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">ایجاد تحصیلی</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>
        </div>

        <form method="POST" role="form" action="{{ route('fields.update', $field->id) }}">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-sm-6">
                        <label for="title">عنوان رشته تحصیلی</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="عنوان" value="{{ $field->title }}" required>
                    </div>

                    <div class="form-group col-sm-6">
                        <label>وضعیت</label>
                        <div class="form-check">
                            <input name="status" type="hidden" value="">
                            <input id="enable" name="status" class="form-check-input" type="radio" {{ $field->status == 'enable' ? 'checked' : '' }} value="enable" required>
                            <label for="enable" class="form-check-label">فعال</label>
                        </div>
                        <div class="form-check">
                            <input id="disable" name="status" class="form-check-input" type="radio" {{ $field->status == 'disable' ? 'checked' : '' }} value="disable">
                            <label for="disable" class="form-check-label">غیرفعال</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="group_id"> گروه آموزشی مربوطه </label>
                        <select class="form-control select2" name="group_id" style="width: 100%">
                            <option value="">پیش فرض</option>
                            @foreach($groups as $item)
                                <option value="{{ $item->id }}" {{ $field->group_id == $item->id ? 'selected' : ''}}>{{ $item->full_name }}</option>
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

            /*$('#course_id').on('select2:opening select2:closing', function( event ) {
                var $searchfield = $(this).parent().find('.select2-search__field');
                $searchfield.prop('disabled', true);
            });*/
        })
    </script>
@endpush
