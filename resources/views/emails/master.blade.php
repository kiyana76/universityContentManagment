<html>
<head>
    <link rel="stylesheet" href="{{url('assets/css/fontiran.css')}}">
    <style>
        body{direction: rtl;text-align: right;font-family: iranyekan;}
        a{text-decoration: none}
        .box{width: 95%;border-radius: 8px;border:solid 2px #2ed87b;margin:20px auto;}
        .title{
            background: #2ed87b;color:white;padding:20px;border-radius: 5px 5px 0 0;
            font-size: 25px;
        }
        .content{padding: 20px;}
        .text-center {text-align: center}
        .text-justify{text-align: justify}
        .center {margin-left: auto;margin-right: auto;}
        .button {
            padding: 8px 15px;
            color:white !important;
            background: #2ed87b;
            text-align: center;
            border-radius: 45px;
        }
    </style>
    @stack('styles')
</head>
<body dir="rtl">
<div class="box">
    <div class="title text-medium">@yield('title')</div>
    <div class="content">
        @yield('content')
    </div>
</div>
</body>
</html>
