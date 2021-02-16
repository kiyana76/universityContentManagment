<div class="row mb-2">
    <div class="col-sm-6">
        <h1>@yield('header_title')</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-left">
            {{--<li class="breadcrumb-item"><a href="#">خانه</a></li>
            <li class="breadcrumb-item active">صفحه خالی</li>--}}
            @yield('breadcrumb-items')
        </ol>
    </div>
</div>
