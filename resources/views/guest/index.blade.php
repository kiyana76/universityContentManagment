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
            <div class="owl-carousel owl-theme">
                @foreach($resources as $item)
                    <div class="coupon-single panel t-center item">
                        <div class="row">
                            <div class="col-xs-12"><img src="{{ ('images/thumbnail-default.jpg') }}"></div>
                            <div class="col-xs-12">
                                <div class="panel-body">
                                    <h5 class="deal-title mb-10">
                                        <a href="{{ $item->slug }}">{{ $item->full_name }}</a>
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
