@extends('master')
@section('breadcrumb-items')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">صفحه اصلی</a></li>
    <li class="breadcrumb-item"><a href="{{ route('questions') }}">نمونه سوالات</a></li>
    <li class="breadcrumb-item active">{{ $question->full_name }}</li>
@endsection
@section('content')
    <div class="row row-masnory">
        <div class="col-xs-12">
            <div class="panel">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-4">
                            <img src="{{ url('storage/' . $question->resource->thumbnail_image) }}">
                        </div>
                        <div class="col-xs-8">
                            <h1>{{ $question->full_name }}</h1>
                            <div class="mt-20">
                                <div class="text-light mb-5">
                                    <i class="lnr lnr-pencil"></i>
                                    توضیحات: {{ $question->resource->description }}</div>

                                <div class="text-light mb-5">
                                    <i class="lnr lnr-user"></i>
                                    نام استاد: {{ $question->teacher_name }}
                                </div>

                                <div class="text-light mb-5">
                                    <i class="lnr lnr-calendar-full"></i>
                                    سال تحصیلی: {{ $question->year }}
                                </div>

                                <div class="text-light mb-5">
                                    <i class="lnr lnr-pushpin"></i>
                                    ترم: {{ $question->term }}
                                </div>

                                <div class="text-light mb-5">
                                    <i class="lnr lnr-users"></i>
                                    کاربر ارسال‌کننده: {{ $question->resource->user->full_name }}
                                </div>

                                <div class="text-light">
                                    <i class="lnr lnr-text-align-justify"></i>
                                    رشته‌های مرتبط:
                                    @foreach($question->resource->fields as $field)
                                        {{ $field->full_name }} ,
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <h3 class="h-title mb-30 mt-10">
                                فایل‌ها
                            </h3>
                            @foreach($question->resource->files as $key => $file)
                                <button class="btn btn-primary"><a href="{{ $file->link_address }}">فایل شماره {{ $key + 1 }}</a></button>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
