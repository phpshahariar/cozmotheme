@extends('admin.master')
@section('content')
    <div class="container-fluid">
        <div class="content">
            <div class="module">
                <div class="card mb-3">
                    <div class="card-header">
                        <h3>Customer Product Request</h3>
                    </div>
                    <form action="{{ route('search')}}" method="POST" id="searchForm">
                        @csrf
                        <div class="col-md-12 mt-3">
                            <div class="row" style="margin-left: 40px;">
                                <div class="col-md-9">
                                    <input type="text" name="search" class="form-control" placeholder="Seraching....">
                                </div>
                                <div class="col-md-3">
                                    <input type="submit" name="btn" value="Submit" class="btn btn-success rounded-0"/>
                                </div>
                            </div>
                        </div>
                    </form>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered laraveldata" style="text-align: center;">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Customer Name</th>
                                        <th scope="col">Product Category</th>
                                        <th scope="col">Product Image</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($customer_product as $key => $product)
                                        <tr>
                                            <th scope="row">{{ $key+1 }}</th>
                                            <td>
                                                @if(isset($product->customers->name))
                                                    {{ $product->customers->name }}
                                                @else
                                                    <p>Customer Name Not Found</p>
                                                @endif
                                            </td>
                                            <td>{{ $product->category->main_category }}</td>
                                            <td>
                                                <img src="{{ asset('customer-images/'.$product->image) }}" height="50" width="120">
                                            </td>
                                            <td><span class="badge badge-success">{{ $product->status == 1 ? 'Approved' : 'Pending' }}</span></td>
                                            <td style="text-align: center;">
                                                @if($product->status == 1)
                                                    <a href="{{ url('/customer/product/approved/'.$product->id) }}" class="btn btn-sm btn-success">Pending</a>
                                                @else
                                                    <a href="{{ url('/customer/product/pending/'.$product->id) }}" class="btn btn-sm btn-danger">Need Approved</a>
                                                @endif
                                                    <a href="{{ url('/customer/product/edit/'.$product->id) }}" class="btn btn-sm btn-primary">Edit</a>
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
    </div>
{{--    <script--}}
{{--            src="https://code.jquery.com/jquery-3.4.1.min.js"--}}
{{--            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="--}}
{{--            crossorigin="anonymous">--}}

{{--    </script>--}}

{{--    <script>--}}
{{--        $.ajaxSetup({--}}
{{--            headers: {--}}
{{--                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--            }--}}
{{--        });--}}
{{--    </script>--}}

{{--    <script type="text/javascript">--}}
{{--        $('#searchForm').submit(function (e) {--}}
{{--            e.preventDefault();--}}
{{--            $.ajax({--}}
{{--                url:'customer/product',--}}
{{--                method:'GET',--}}
{{--                data: new FormData(this),--}}
{{--                dataType: 'JSON',--}}
{{--                contentType: false,--}}
{{--                processData: false,--}}
{{--                success: function (response) {--}}
{{--                    console.log(response);--}}
{{--                }--}}
{{--            });--}}
{{--        })--}}
{{--    </script>--}}

    @endsection