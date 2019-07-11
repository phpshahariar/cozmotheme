@extends('front.master')

@section('content')
        <div class="container">
            <br/>
            <br/>
            <div class="col-lg-12" style="background: #002a80; height: 650px;">
                <br/>
                <br/>
                <h3 style="color: #FFFFFF; text-align: center;">
                    Login /
                    <a href="#" style="color: #FFFFFF; text-align: center;" data-toggle="modal" data-target="#exampleModal">
                        Registration
                    </a>
                </h3>
                <!-- Button trigger modal -->
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h5 class="modal-title" id="exampleModalLabel">Customer Registration Form</h5>
                            </div>
                            <div class="modal-body">
                                <form action="{{ url('/customer/dashboard') }}" method="POST" class="form-horizontal">
                                    @csrf
                                    <label style="color: #0d0f13; font-size: 18px; font-weight: bold;">Name</label>
                                    <input type="text" name="name" class="form-control" required>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                    @endif
                                    <label style="color: #0d0f13; font-size: 18px; font-weight: bold;">E-mail</label>
                                    <input type="email" name="email" class="form-control" required>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                    @endif
                                    <label style="color: #0d0f13; font-size: 18px; font-weight: bold;">Password</label>
                                    <input type="password" name="password" class="form-control" required>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                    @endif
                                    <br/>
                                    <input type="submit" name="btn" class="btn btn-block btn-primary" value="Sign Up">
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <span style="color: red; text-align: center;">{{ Session::get('message') }}</span>
                <br/>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
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
                    <div class="col-md-3"></div>
                </div>
            </div>
        </div>
    @endsection