@extends('front.master')

@section('content')
<br/>
    <div class="container">
        <div class="col-sm-12" style="height: 400px;">
            <h5>Dear [{!! Session::get('name') !!}] Sir,</h5><br/>
            <h1 style="color: #1b7943;">Thank You for Your Confirm Order.</h1><br/>
            <h4>
                You are a very important buyer for us. We will deliver the product you like within 24 hours to us.
            </h4>
            <br/>
            <h4>
                Please check your mail. We made you a Confirmation mail......<br/>
            </h4>
            <h5 style="color: red;">Thank You <br> Cozmo Theme Team</h5>
        </div>
    </div>

@endsection