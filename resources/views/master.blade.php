<!DOCTYPE html>
<!--[if lt IE 9 ]> <html lang="fa" dir="rtl" class="no-js ie-old"> <![endif]-->
<!--[if IE 9 ]> <html lang="fa" dir="rtl" class="no-js ie9"> <![endif]-->
<!--[if IE 10 ]> <html lang="fa" dir="rtl" class="no-js ie10"> <![endif]-->
<!--[if (gt IE 10)|!(IE)]><!-->
<html lang="en" dir="rtl" class="no-js">
<!--<![endif]-->

<head>
    <!-- ––––––––––––––––––––––––––––––––––––––––– -->
    <!-- META TAGS                                 -->
    <!-- ––––––––––––––––––––––––––––––––––––––––– -->
    <meta charset="utf-8">
    <!-- Always force latest IE rendering engine -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile specific meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!-- ––––––––––––––––––––––––––––––––––––––––– -->
    <!-- PAGE TITLE                                -->
    <!-- ––––––––––––––––––––––––––––––––––––––––– -->
    <title>جزوه‌سرا| مرجع دسترسی به جزوات دانشگاهی</title>
    <!-- ––––––––––––––––––––––––––––––––––––––––– -->
    <!-- SEO METAS                                 -->
    <!-- ––––––––––––––––––––––––––––––––––––––––– -->
    <meta name="description" content="مرجع دسترسی به جزوات دانشگاهی">
    <meta name="keywords" content="جزوه">
    <meta name="robots" content="index, follow">
    <meta name="author" content="kiyana">
    <!-- ––––––––––––––––––––––––––––––––––––––––– -->
    <!-- PAGE FAVICON                              -->
    <!-- ––––––––––––––––––––––––––––––––––––––––– -->
    <link rel="apple-touch-icon" href="images/apple-icon.png">
    <link rel="icon" href="images/favicon.png">
    <!-- ––––––––––––––––––––––––––––––––––––––––– -->
    <!-- GOOGLE FONTS                              -->
    <!-- ––––––––––––––––––––––––––––––––––––––––– -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=El+Messiri:700" rel="stylesheet">
    <!-- ––––––––––––––––––––––––––––––––––––––––– -->
    <!-- Include CSS Filess                        -->
    <!-- ––––––––––––––––––––––––––––––––––––––––– -->
    <link href="{{ url('css/style.css') }}" rel="stylesheet">
</head>

<body id="body" class="wide-layout preloader-active">
<!--[if lt IE 9]>
<p class="browserupgrade alert-error">
    You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.
</p>
<![endif]-->
<noscript>
    <div class="noscript alert-error">
        For full functionality of this site it is necessary to enable JavaScript. Here are the <a href="http://www.enable-javascript.com/" target="_blank">instructions how to enable JavaScript in your web browser</a>.
    </div>
</noscript>
<!-- ––––––––––––––––––––––––––––––––––––––––– -->
<!-- PRELOADER                                 -->
<!-- ––––––––––––––––––––––––––––––––––––––––– -->
<div id="preloader" class="preloader">
    <div class="loader-cube">
        <div class="loader-cube__item1 loader-cube__item"></div>
        <div class="loader-cube__item2 loader-cube__item"></div>
        <div class="loader-cube__item4 loader-cube__item"></div>
        <div class="loader-cube__item3 loader-cube__item"></div>
    </div>
</div>
<!-- ––––––––––––––––––––––––––––––––––––––––– -->
<!-- WRAPPER                                   -->
<!-- ––––––––––––––––––––––––––––––––––––––––– -->
<div id="pageWrapper" class="page-wrapper">
    <!-- –––––––––––––––[ HEADER ]––––––––––––––– -->
    <header id="mainHeader" class="main-header">
        <!-- Header Header -->
        @include('includes.header')
        <!-- End Header Header -->
        <!-- Header Menu -->
        @include('includes.menu')
        <!-- End Header Menu -->
    </header>
    <!-- –––––––––––––––[ HEADER ]––––––––––––––– -->
    <!-- –––––––––––––––[ PAGE CONTENT ]––––––––––––––– -->
    <main id="mainContent" class="main-content">
        <div class="page-container ptb-60">
            <div class="container">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                @endif
                @yield('content')
            </div>
        </div>
    </main>
    <!-- –––––––––––––––[ END PAGE CONTENT ]––––––––––––––– -->
    @include('includes.footer')
    <!-- –––––––––––––––[ END FOOTER ]––––––––––––––– -->
</div>
<!-- ––––––––––––––––––––––––––––––––––––––––– -->
<!-- END WRAPPER                               -->
<!-- ––––––––––––––––––––––––––––––––––––––––– -->
<!-- ––––––––––––––––––––––––––––––––––––––––– -->
<!-- BACK TO TOP                               -->
<!-- ––––––––––––––––––––––––––––––––––––––––– -->
<div id="backTop" class="back-top is-hidden-sm-down">
    <i class="fa fa-angle-up" aria-hidden="true"></i>
</div>
<!-- ––––––––––––––––––––––––––––––––––––––––– -->
<!-- SCRIPTS                                   -->
<!-- ––––––––––––––––––––––––––––––––––––––––– -->
<script type="text/javascript" rel="script" src="{{ asset('js/script.js') }}"></script>
</body>

</html>
