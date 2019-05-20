@extends('admin.master')

@section('content')
    <div id="content-wrapper">

        <div class="container-fluid">
            <!-- DataTables Example -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Admin Order List</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr style="text-align: center;">
                                <th class="th-sm" width="10%" >SL NO</th>
                                <th class="th-sm">Customer Name</th>
                                <th class="th-sm">Product Name</th>
                                <th class="th-sm">Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i = 0)
                            @foreach($customer_order as $order)
                                <tr style="text-align: center;">
                                    <td>{{ $i++ }}</td>
                                    <td>
                                        @if(isset($order->name ))
                                            {{ $order->name }}
                                        @else
                                            <p>Customer Name Not Found</p>
                                        @endif
                                    </td>
                                    <td>{{ $order->product_id }}</td>
                                    <td>TK. {{ number_format($order->price,2) }}</td>
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