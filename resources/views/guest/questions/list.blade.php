@extends('master')
@section('breadcrumb-items')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">صفحه اصلی</a></li>
    <li class="breadcrumb-item active">نمونه سوالات</li>
@endsection
@section('content')
    <div class="page-content">
        <div class="row row-tb-20 row-masnory">
            @foreach($questions as $question)
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <article class="entry panel">
                        <figure class="entry-media post-thumbnail embed-responsive embed-responsive-16by9" data-bg-img="{{ url('storage/' . $question->resource->thumbnail_image) }}">
                        </figure>
                        <div class="entry-wrapper pt-20 pb-10 prl-20">
                            <header class="entry-header">
                                <h4 class="entry-title mb-10 mb-md-15 font-xs-16 font-sm-18 font-md-16 font-lg-16">
                                    <a href="{{ $question->link_address }}">{{ $question->full_name }}</a>
                                </h4>
                                <div class="entry-meta mb-10">
                                    <ul class="tag-info list-inline">
                                        <li><i class="icon fa fa-user"></i>از طرف: {{ $question->resource->user->full_name }}</li>
                                        <li><i class="icon fa fa-comments"></i>{{ $question->resource->jalali_created_at }}</li>
                                    </ul>
                                </div>
                            </header>
                            <div class="entry-content">
                                <p class="entry-summary">{{ \Illuminate\Support\Str::words($question->resource->description, 6) }}</p>
                            </div>
                            <footer class="entry-footer text-left">
                                <a href="{{ $question->link_address }}" class="more-link btn btn-link">مشاهده بیشتر <i class="icon fa fa-long-arrow-left"></i></a>
                            </footer>
                        </div>
                    </article>
                </div>
            @endforeach
            <div class="col-sm-12 t-center">
                {{ $questions->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection
