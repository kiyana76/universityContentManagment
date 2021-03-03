@extends('master')
@push('styles')
    <style>
        .thumbnail-img{
            height: 150px;
            align-self: stretch;
        }
        .thumbnail-img img{
            height: 100%;
            object-fit: cover;
            object-position: center;
        }
    </style>
@endpush
@section('content')
<div class="row row-masnory row-tb-20">
    <div class="page-content">
        <div class="col-xs-12">
            <h3 class="h-title mb-30">جدیدترین ها</h3>
            <div class="owl-carousel owl-theme">
                @foreach($resources as $item)
                    <div class="coupon-single panel t-center item">
                        <div class="row">
                            <div class="col-xs-12"><img src="{{ url('storage/' . $item->thumbnail_image) }}"></div>
                            <div class="col-xs-12">
                                <div class="panel-body">
                                    <h5 class="deal-title mb-10">
                                        <a href="{{ $item->link_address }}">{{ $item->full_name }}</a>
                                    </h5>
                                    <p class="mb-15 color-muted mb-20 font-12">
                                        <i class="lnr lnr-clock ml-10"></i>
                                        {{ $item->jalali_created_at }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="col-xs-12">
            <div class="panel pt-20 pb-30 prl-20 mtb-20">
                <h3 class="h-title mb-30">کتاب‌ها</h3>
                <div class="row">
                    @foreach($books as $item)
                        <div class="col-sm-4">
                            <article class="entry panel">
                                <figure class="entry-media post-thumbnail embed-responsive embed-responsive-16by9" data-bg-img="{{ url('storage/' . $item->resource->thumbnail_image) }}">
                                </figure>
                                <div class="entry-wrapper pt-20 pb-10 prl-20">
                                    <header class="entry-header">
                                        <h4 class="entry-title mb-10 mb-md-15 font-xs-16 font-sm-18 font-md-16 font-lg-16">
                                            <a href="{{ $item->link_address }}">{{ $item->full_name }}</a>
                                        </h4>
                                        <div class="entry-meta mb-10">
                                            <ul class="tag-info list-inline">
                                                <li><i class="icon fa fa-user"></i>از طرف: {{ $item->resource->user->full_name }}</li>
                                                <li><i class="icon fa fa-clock-o"></i>{{ $item->resource->jalali_created_at }}</li>
                                            </ul>
                                        </div>
                                    </header>
                                    <div class="entry-content">
                                        <p class="entry-summary">{{ \Illuminate\Support\Str::words($item->resource->description, 8) }}</p>
                                    </div>
                                    <footer class="entry-footer text-left">
                                        <a href="{{ $item->link_address }}" class="more-link btn btn-link">مشاهده<i class="icon fa fa-long-arrow-left"></i></a>
                                    </footer>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col-xs-12">
            <div class="panel pt-20 pb-30 prl-20 mtb-20">
                <h3 class="h-title mb-30">جزوه‌ها</h3>
                <div class="row">
                    @foreach($notes as $item)
                        <div class="col-sm-4">
                            <article class="entry panel">
                                <figure class="entry-media post-thumbnail embed-responsive embed-responsive-16by9" data-bg-img="{{ url('storage/' . $item->resource->thumbnail_image) }}">
                                </figure>
                                <div class="entry-wrapper pt-20 pb-10 prl-20">
                                    <header class="entry-header">
                                        <h4 class="entry-title mb-10 mb-md-15 font-xs-16 font-sm-18 font-md-16 font-lg-16">
                                            <a href="{{ $item->link_address }}">{{ $item->full_name }}</a>
                                        </h4>
                                        <div class="entry-meta mb-10">
                                            <ul class="tag-info list-inline">
                                                <li><i class="icon fa fa-user"></i>از طرف: {{ $item->resource->user->full_name }}</li>
                                                <li><i class="icon fa fa-clock-o"></i>{{ $item->resource->jalali_created_at }}</li>
                                            </ul>
                                        </div>
                                    </header>
                                    <div class="entry-content">
                                        <p class="entry-summary">{{ \Illuminate\Support\Str::words($item->resource->description, 8) }}</p>
                                    </div>
                                    <footer class="entry-footer text-left">
                                        <a href="{{ $item->link_address }}" class="more-link btn btn-link">مشاهده<i class="icon fa fa-long-arrow-left"></i></a>
                                    </footer>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col-xs-12">
            <div class="panel pt-20 pb-30 prl-20 mtb-20">
                <h3 class="h-title mb-30">نمونه سوالات</h3>
                <div class="row">
                    @foreach($questions as $item)
                        <div class="col-sm-4">
                            <article class="entry panel">
                                <figure class="entry-media post-thumbnail embed-responsive embed-responsive-16by9" data-bg-img="{{ url('storage/' . $item->resource->thumbnail_image) }}">
                                </figure>
                                <div class="entry-wrapper pt-20 pb-10 prl-20">
                                    <header class="entry-header">
                                        <h4 class="entry-title mb-10 mb-md-15 font-xs-16 font-sm-18 font-md-16 font-lg-16">
                                            <a href="{{ $item->link_address }}">{{ $item->full_name }}</a>
                                        </h4>
                                        <div class="entry-meta mb-10">
                                            <ul class="tag-info list-inline">
                                                <li><i class="icon fa fa-user"></i>از طرف: {{ $item->resource->user->full_name }}</li>
                                                <li><i class="icon fa fa-clock-o"></i>{{ $item->resource->jalali_created_at }}</li>
                                            </ul>
                                        </div>
                                    </header>
                                    <div class="entry-content">
                                        <p class="entry-summary">{{ \Illuminate\Support\Str::words($item->resource->description, 8) }}</p>
                                    </div>
                                    <footer class="entry-footer text-left">
                                        <a href="{{ $item->link_address }}" class="more-link btn btn-link">مشاهده<i class="icon fa fa-long-arrow-left"></i></a>
                                    </footer>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col-xs-12">
            <div class="panel pt-20 pb-30 prl-20 mtb-20">
                <h3 class="h-title mb-30">سوالات کنکور</h3>
                <div class="row">
                    @foreach($exams as $item)
                        <div class="col-sm-4">
                            <article class="entry panel">
                                <figure class="entry-media post-thumbnail embed-responsive embed-responsive-16by9" data-bg-img="{{ url('storage/' . $item->resource->thumbnail_image) }}">
                                </figure>
                                <div class="entry-wrapper pt-20 pb-10 prl-20">
                                    <header class="entry-header">
                                        <h4 class="entry-title mb-10 mb-md-15 font-xs-16 font-sm-18 font-md-16 font-lg-16">
                                            <a href="{{ $item->link_address }}">{{ $item->full_name }}</a>
                                        </h4>
                                        <div class="entry-meta mb-10">
                                            <ul class="tag-info list-inline">
                                                <li><i class="icon fa fa-user"></i>از طرف: {{ $item->resource->user->full_name }}</li>
                                                <li><i class="icon fa fa-clock-o"></i>{{ $item->resource->jalali_created_at }}</li>
                                            </ul>
                                        </div>
                                    </header>
                                    <div class="entry-content">
                                        <p class="entry-summary">{{ \Illuminate\Support\Str::words($item->resource->description, 8) }}</p>
                                    </div>
                                    <footer class="entry-footer text-left">
                                        <a href="{{ $item->link_address }}" class="more-link btn btn-link">مشاهده<i class="icon fa fa-long-arrow-left"></i></a>
                                    </footer>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function (){
           $('.owl-carousel').owlCarousel({
               center: true,
               margin:10,
               nav:true,
               loop:true,
               rtl:true,
               dots:true,
               dotsContainer: '#dots',
               responsive:{
                   0:{
                       items:1
                   },
                   600:{
                       items:3
                   },
                   1000:{
                       items:5
                   }
               },
               autoplay:true,
               autoplayTimeout:1000,
               autoplayHoverPause:true,
               animateOut: 'slideOutDown',
               animateIn: 'flipInX',
               stagePadding:30,
               smartSpeed:450,
           });
        });
    </script>
@endpush
