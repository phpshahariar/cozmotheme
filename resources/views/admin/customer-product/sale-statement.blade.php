@extends('admin.master')

@section('content')
    <div class="container">
        <div class="content">
            <div class="module">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="card-header">Customer Sale Statement</div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>SL No</th>
                                    <th>Seller Name</th>
                                    <th>Bank Name</th>
                                    <th>Bank Account</th>
                                    <th>Bkash/Rocket</th>
                                    <th>Others</th>
                                    <th>Withdrawal Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($customer_cashout as $key => $cashout)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{$cashout->user_id}}</td>
                                    <td>
                                        @if(isset($cashout->bank_name))
                                            {{ $cashout->bank_name }}
                                         @else
                                            <p>N/A</p>
                                     @endif
                                    </td>
                                    <td>
                                        @if($cashout->bank)
                                            {{ $cashout->bank }}
                                         @else
                                            <p>N/A</p>
                                        @endif
                                    </td>
                                    <td>
                                        @if(isset($cashout->mobile))
                                            {{ $cashout->mobile }}
                                         @else
                                            <p>N/A</p>
                                        @endif
                                    </td>
                                    <td>
                                        @if(isset($cashout->others))
                                            {{ $cashout->others }}
                                        @else
                                            <p>N/A</p>
                                        @endif
                                    </td>
                                    <td>TK. {{ number_format($cashout->case_out,2) }}</td>
                                    <td>
                                        <a href="{{url('/statement/delete/'.$cashout->id)}}" onclick="return confirm('Are You Sure You Want To Delete This Statement!')" class="badge badge-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
 @endsection