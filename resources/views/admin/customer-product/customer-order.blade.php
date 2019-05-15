@extends('admin.master')

@section('content')
    <div id="content-wrapper">

        <div class="container-fluid">
            <!-- DataTables Example -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Customer Order List</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr style="text-align: center;">
                                <th class="th-sm" width="10%" >Seller ID</th>
                                <th class="th-sm">Customer Name</th>
                                <th class="th-sm">Product Name</th>
                                <th class="th-sm">Price</th>
                                <th class="th-sm" width="20%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($customer_order as $order)
                                <tr style="text-align: center;">
                                    <td>{{ $order->user_id }}</td>
                                    <td>
                                        @if(isset($order->name ))
                                            {{ $order->name }}
                                        @else
                                            <p>Customer Name Not Found</p>
                                        @endif
                                    </td>
                                    <td>{{ $order->product_id }}</td>
                                    <td>TK. {{ number_format($order->price,2) }}</td>
                                    <td>
                                        @if($order->status ==0)
                                            <a href="{{ url('/delivered/pending/' .$order->id) }}" class="btn btn-sm btn-danger">Not Delivered</a>
                                        @else
                                            <button class="btn btn-primary btn-sm" type="button" disabled>Delivered</button>
                                            <a href="{{ url('/delivered/delete/' .$order->id) }}" onclick="return confirm('Are You Sure Delete This!')" class="btn btn-sm btn-danger">Delete</a>
                                        @endif

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