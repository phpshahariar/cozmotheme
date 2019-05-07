@extends('front.master')

@section('content')
    <div class="container">
            <div class="col-lg-12" style="background: #002a80; height: 650px;">
                <div class="row" style="margin-top: 20px;">
                    <div class="col-lg-6" style="margin-top: 100px; border-right: 1px solid #1d68a7;">
                        <h3 style="color: #FFFFFF; text-align: center;">Registration</h3>
                        <br/>
                        <form action="{{ url('/customer/dashboard') }}" method="POST" class="form-horizontal">
                            @csrf
                            <label style="color: #FFFFFF; font-size: 18px; font-weight: bold;">Name</label>
                            <input type="text" name="name" class="form-control" required>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                            <label style="color: #FFFFFF; font-size: 18px; font-weight: bold;">E-mail</label>
                            <input type="email" name="email" class="form-control" required>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                            <label style="color: #FFFFFF; font-size: 18px; font-weight: bold;">Password</label>
                            <input type="password" name="password" class="form-control" required>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                            <br/>
                            <input type="submit" name="btn" class="btn btn-block btn-danger" value="Sign Up">
                        </form>
                    </div>
                    <div class="col-lg-6" style="margin-top: 100px;">
                        <h3 style="color: #FFFFFF; text-align: center;">Login</h3>
                        <br/>
                        <form action="{{ url('/customer/login') }}" method="POST" class="form-horizontal">
                            @csrf
                            <label style="color: #FFFFFF; font-size: 18px; font-weight: bold;">E-mail</label>
                            <input type="email" name="email" class="form-control" required>
                            <span style="color: red"> {{ $errors->has('email') ? $errors->first('email') : ' ' }}</span>
                            <label style="color: #FFFFFF; font-size: 18px; font-weight: bold;">Password</label>
                            <input type="password" name="password" class="form-control" required>
                            <span style="color: red"> {{ $errors->has('password') ? $errors->first('password') : ' ' }}</span>
                            <br/>
                            <input type="submit" name="btn" class="btn btn-block btn-success" value="Login">
                        </form>
                    </div>
                </div>
        </div>
    </div>
    @endsection