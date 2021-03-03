@extends('master')
@section('breadcrumb-items')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">صفحه اصلی</a></li>
    <li class="breadcrumb-item"><a href="{{ route('books') }}">کتب</a></li>
    <li class="breadcrumb-item active">{{ $book->full_name }}</li>
@endsection
@section('content')
    <div class="row row-masnory">
        <div class="col-xs-12">
            <div class="panel">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-4">
                            <img src="{{ url('storage/' . $book->resource->thumbnail_image) }}">
                        </div>
                        <div class="col-xs-8">
                            <h1>{{ $book->full_name }}</h1>
                            <div class="mt-20">
                                <div class="text-light mb-5">
                                    <i class="lnr lnr-pencil"></i>
                                    توضیحات: {{ $book->resource->description }}</div>

                                <div class="text-light mb-5">
                                    <i class="lnr lnr-user"></i>
                                    نام نویسنده: {{ $book->writer }}
                                </div>

                                <div class="text-light mb-5">
                                    <i class="lnr lnr-calendar-full"></i>
                                    انتشارات: {{ $book->publisher }}
                                </div>

                                <div class="text-light mb-5">
                                    <i class="lnr lnr-pushpin"></i>
                                    ویرایش: {{ $book->edit }}
                                </div>

                                <div class="text-light mb-5">
                                    <i class="lnr lnr-users"></i>
                                    کاربر ارسال‌کننده: {{ $book->resource->user->full_name }}
                                </div>

                                <div class="text-light">
                                    <i class="lnr lnr-text-align-justify"></i>
                                    رشته‌های مرتبط:
                                    @foreach($book->resource->fields as $field)
                                        {{ $field->full_name }} ,
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <h3 class="h-title mb-30 mt-10">
                                فایل‌ها
                            </h3>
                            @foreach($book->resource->files as $key => $file)
                                <button class="btn btn-primary"><a href="{{ $file->link_address }}">فایل شماره {{ $key + 1 }}</a></button>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
