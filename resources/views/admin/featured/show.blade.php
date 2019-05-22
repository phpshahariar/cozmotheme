@extends('admin.master')

@section('content')
    <!-- Large modal -->
    <div class="container-fluid">
        <a href="{{ url('/create/featured') }}" class="btn btn-primary">
            Add Featured
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
                <th scope="col">Demo Link</th>
                <th scope="col">Status</th>
                <th scope="col" width="20%">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($show_featured as $key => $featured)
                <tr>
                    <th scope="row" width="5%">{{ $key+1 }}</th>
                    <td>
                        <img src="{{ asset('featured-images/' .$featured->image) }}" height="50" width="130" alt="Featured"/>
                    </td>
                    <td>{!! $featured->category->main_category !!}</td>
                    <td>{!! $featured->sub_category->sub_category_name !!}</td>
                    <td>{!! $featured->featured_name !!}</td>
                    <td>TK. {!! number_format($featured->price,2) !!}</td>
                    <td>{!! $featured->demo_link !!}</td>
                    <td>{!! $featured->status == 1 ? 'Active' : 'Pending'!!}</td>
                    <td>
                        @if($featured->status == 1)
                            <a href="{{url('/active/featured/'.$featured->id)}}" class="badge badge-success">Active</a>
                        @else
                            <a href="{{url('/pending/featured/'.$featured->id)}}" class="badge badge-warning">Pending</a>
                        @endif
                        <a href="{{url('/edit/featured/'.$featured->id)}}" class="badge badge-info">Edit</a>
                        <a href="{{url('/delete/featured/'.$featured->id)}}" onclick="return confirm('Are You Sure! Delete This Information?');" class="badge badge-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection