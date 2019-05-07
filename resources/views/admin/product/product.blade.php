@extends('admin.master')

@section('content')
    <!-- Large modal -->
    <div class="container-fluid">
    <a href="{{ url('/create/product') }}" class="btn btn-primary">
        Add Product
    </a>
        <br/><br/>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col" width="5%">ID</th>
                <th scope="col">Image</th>
                <th scope="col">Main Category</th>
                <th scope="col">Sub Category</th>
                <th scope="col">Name</th>
                <th scope="col">Balance</th>
                <th scope="col">Short Description</th>
                <th scope="col">Long Description</th>
                <th scope="col">Status</th>
                <th scope="col" width="20%">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($show_product as $key => $product)
                <tr>
                    <th scope="row" width="5%">{{$key+1}}</th>
                    <td>
                        <img src="{{ asset('/product-images/'.$product->image) }}" height="90" width="120"/>
                    </td>
                    <td>{{ $product->category->main_category }}</td>
                    <td>{{ $product->sub_category->sub_category_name }}</td>
                    <td>{{ $product->name }}</td>
                    <td>TK. {{ number_format($product->balance,2) }}</td>
                    <td>{!! $product->short_description !!}</td>
                    <td>{!! substr($product->long_description, 0,100) !!}</td>
                    <td>{{ $product->status == 1 ? 'Active' : 'Pending'}}</td>
                    <td width="20%">
                        @if($product->status == 1)
                            <a href="{{ url('/active-product/'.$product->id) }}" class="btn btn-sm btn-success">Active</a>
                        @else
                            <a href="{{ url('/pending-product/'.$product->id) }}" class="btn btn-sm btn-warning">Pending</a>
                        @endif
                        <a href="{{ url('/edit-product/'.$product->id) }}" class="btn btn-sm btn-info">Edit</a>
                        <a href="{{ url('/delete-product/'.$product->id) }}" onclick="return confirm('Are You Sure! Delete This Information?');" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @endsection