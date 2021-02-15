<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="_nK">
    <link rel="icon" href="{{url('panel/assets/_con/images/icon.png')}}">

    <title>Con - Admin Dashboard with Material Design</title>

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
    <!-- FontAwesome -->
    <link rel="stylesheet" type="text/css" href="{{url('font_awesome')}}" />

    <!-- Material Design Icons -->
    <link rel="stylesheet" type="text/css" href="{{url('panel/assets/material-design-icons/css/material-design-icons.min.css')}}" />

    <link rel="stylesheet" type="text/css" href="{{url('panel/bower_components/ionicons/css/ionicons.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{url('panel/assets/_con/css/con-base.css')}}" />

<!--[if lt IE 9]>
    <script src="{{url('panel/bower_components/html5shiv/dist/html5shiv.min.js')}}"></script>
    <![endif]-->


</head>

<body>

<section id="sign-in">

    <canvas id="bubble-canvas"></canvas>
    <form method="POST" action="{{route('admin.login.submit')}}">
        @csrf
        <div class="row links">
            <div class="col s12 right-align">
                <strong>Sign In</strong></div>
        </div>

        <div class="card-panel clearfix">

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert">{{ $error }}</div>
            @endforeach
        @endif

        <!-- Username -->
            <div class="input-field">
                <i class="fa fa-user prefix"></i>
                <input id="username-input" name="username" type="text" class="validate" required value="{{ old('username') }}">
                <label for="username-input">Username</label>
            </div>
            <!-- /Username -->

            <!-- Password -->
            <div class="input-field">
                <i class="fa fa-unlock-alt prefix"></i>
                <input id="password-input" name="password" type="password" class="validate" required>
                <label for="password-input">Password</label>
            </div>
            <!-- /Password -->


            <div class="input-field">
                <img src="{{captcha_src('flat')}}" style="display: block;margin: 0 auto;">
            </div>

            <!-- Password -->
            <div class="input-field">
                <i class="fa fa-check-square-o prefix"></i>
                <input id="captcha-input" name="captcha" type="text" class="validate" required>
                <label for="captcha-input">Captcha</label>
            </div>
            <!-- /Password -->

            <div class="switch">
                <label>
                    <input name="remember" type="checkbox" checked />
                    <span class="lever"></span>
                    Remember
                </label>
            </div>

            <button class="waves-effect waves-light btn-large z-depth-0 z-depth-1-hover">Sign In</button>
        </div>

        <div class="links right-align">
            <a href="#">Forgot Password?</a>
        </div>

    </form>
    <!-- /Sign In Form -->

</section>


<script type="text/javascript" src="{{url('panel/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{url('panel/bower_components/jquery-requestAnimationFrame/dist/jquery.requestAnimationFrame.min.js')}}"></script>
<script type="text/javascript" src="{{url('panel/bower_components/nanoscroller/bin/javascripts/jquery.nanoscroller.min.js')}}"></script>
<script type="text/javascript" src="{{url('panel/bower_components/materialize/bin/materialize.js')}}"></script>
<script type="text/javascript" src="{{url('panel/assets/_con/js/_con.js')}}"></script>


</body>

</html>
