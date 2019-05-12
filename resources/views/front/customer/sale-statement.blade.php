@extends('front.master')

@section('content')
    @if(Session::get('user_id'))
    <div class="container-fluid">
        <div class="content">
            <div class="module">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr style="text-align: center; background: #0d0f13;">
                                    <th style="border: 1px solid lightslategray; color: #ffffff;">SL</th>
                                    <th style="border: 1px solid lightslategray; color: #ffffff;">Product Name</th>
                                    <th style="border: 1px solid lightslategray; color: #ffffff;">Product Price</th>
                                    <th style="border: 1px solid lightslategray; color: #ffffff;" width="25%">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($i = 0)
                                @foreach($statement as $sale)
                                    <tr style="text-align: center;">
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $sale->product_id }}</td>
                                        <td>TK. {{$money = number_format($sale->price,2)}}</td>
                                        <td>
                                            @if($money == 0)
                                                <button class="btn btn-sm btn-success" disabled>Withdrawal</button>
                                             @else
                                                <button data-toggle="modal" data-target="#caseOut" value="{{ $sale->id }}" class="btn btn-sm btn-success caseOut">Withdrawal</button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{--   Modal Start--}}
                            <div class="modal fade" id="caseOut" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form action="{{ url('/case/out') }}"  method="POST" id="addCustomerForm">
                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <h5 class="modal-title" id="exampleModalLabel">Cash Out Form</h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                                                    </div>
                                                    <input type="text" class="form-control" readonly id="case_out" name="case_out">
                                                    <input type="text" class="form-control"  id="id" name="id">
                                                </div>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-dollar"></i></span>
                                                    </div>
                                                    <select class="form-control" name="withdrawal" id="withdrawal_id">
                                                        <option>---Select Withdrawal Polici---</option>
                                                        <option id="bank"  value="1">Bank Account</option>
                                                        <option id="mobile" value="2">Mobile Wallet</option>
                                                        <option id="others" value="3">Others</option>
                                                    </select>
                                                    <span style="color: red"> {{ $errors->has('withdrawal') ? $errors->first('withdrawal') : ' ' }}</span>
                                                </div>

                                                <div class="input-group mb-3" id="bankshow">
                                                    <input type="text" class="form-control"  name="bank" placeholder="Bank Name">
                                                    <input type="number" class="form-control"  name="bank" placeholder="Bank account">
                                                </div>

                                                <div class="input-group mb-3" id="mobileshow">
                                                    <input type="text" class="form-control"  name="mobile" placeholder="Enter Bkash Or Rocket Number">
                                                </div>

                                                <div class="input-group mb-3" id="othersshow">
                                                    <input type="text" class="form-control"  name="others" placeholder="Enter Your Mobile Number">
                                                </div>

                                                <div class="form-group form-check">
                                                    <input type="checkbox" class="form-check-input" value="confirmed" required name="confirm" id="confirm">
                                                    <label class="form-check-label" for="confirm">Confirm</label><br/>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">SubmiT</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        {{--  Modal End--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <h3 style="text-align: center;" class="badge-danger">You are Not Valid User.. Please Login First</h3>
    @endif


    <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous">
    </script>

    <script>
        $('.caseOut').click(function () {
            var id = $(this).val();
            $.ajax({
                url:"{{ url('/sale/withdrawal') }}/" + id,
                data: {},
                success:function (data) {
                    $("#case_out").val(data.price);
                    $("#id").val(data.id);
                }
            });
        });

        $("#bankshow").hide();
        $("#mobileshow").hide();
        $("#othersshow").hide();

        $('#withdrawal_id').change(function () {
            var data = $(this).val();
            if (data == 1) {
                $("#bankshow").show();
            }else if(data == 2){
                $("#mobileshow").show();
                $("#bankshow").hide();
            }else {
                $("#bankshow").hide();
                $("#mobileshow").hide();
                $("#othersshow").show();
            }
        });

    </script>

@endsection