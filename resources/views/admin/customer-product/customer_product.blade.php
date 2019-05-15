@extends('admin.master')

@section('content')
    <div class="container-fluid">
        <div class="content">
            <div class="module">
                <div class="card mb-3">
                    <div class="card-header">
                        <h3>Customer Product Request</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" style="text-align: center;">
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

    @endsection