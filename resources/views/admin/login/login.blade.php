<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cozmo-Login</title>
    <link type="text/css" href="{!! asset('/admin/assets/') !!}/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="{!! asset('/admin/assets/') !!}/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link type="text/css" href="{!! asset('/admin/assets/') !!}/css/theme.css" rel="stylesheet">
    <link type="text/css" href="{!! asset('/admin/assets/') !!}/images/icons/css/font-awesome.css" rel="stylesheet">
    <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
</head>
<body>

<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                <i class="icon-reorder shaded"></i>
            </a>

            <a class="brand" href="{{url('/login')}}">
                CozmoTheme
            </a>
            <!-- /.nav-collapse -->
        </div>
    </div><!-- /navbar-inner -->
</div><!-- /navbar -->



<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="module module-login span4 offset4">
                <form class="form-vertical" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="module-head">
                        <h3>Sign In</h3>
                    </div>
                    <div class="module-body">
                        <div class="control-group">
                            <div class="controls row-fluid">
                                <input class="span12 {{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls row-fluid">
                                <input class="span12 {{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" name="password" id="password" required autocomplete="current-password" placeholder="Password">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="module-foot">
                        <div class="control-group">
                            <div class="controls clearfix">
                                <button type="submit" class="btn btn-primary pull-right">Login</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><!--/.wrapper-->

<div class="footer">
    <div class="container">


        <b class="copyright">&copy; 2018 CozmoTheme - cozmotheme.com </b> All rights reserved.
    </div>
</div>
<script src="{!! asset('/admin/assets/') !!}/scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="{!! asset('/admin/assets/') !!}/scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
<script src="{!! asset('/admin/assets/') !!}/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>