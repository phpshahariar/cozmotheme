@extends('admin.master')

@section('content')
    <!-- Large modal -->
    <div class="container-fluid">
        <a href="{{ url('/create/slider') }}" class="btn btn-primary">
            Add Slider
        </a>
        <br/><br/>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col" width="5%">ID</th>
                <th scope="col">Image</th>
                <th scope="col">Title</th>
                <th scope="col">Short Description</th>
                <th scope="col">Status</th>
                <th scope="col" width="20%">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($info_slider as $key => $info)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>
                        <img src="{{ asset('slider-images/'.$info->image) }}" height="100" width="300" alt="slider"/>
                    </td>
                    <td>{{ $info->title }}</td>
                    <td>{{ $info->short_description }}</td>
                    <td>{{ $info->status ==1 ? 'Active' : 'Pending'}}</td>
                    <td>
                        @if($info->status ==1)
                            <a href="{{ url('/active-slider/'.$info->id) }}" class="btn btn-sm btn-outline-primary">Active</a>
                        @else
                            <a href="{{ url('/pending-slider/'.$info->id) }}" class="btn btn-sm btn-outline-warning">Pending</a>
                        @endif
                        <a href="{{ url('/edit-slider/'.$info->id) }}" class="btn btn-sm btn-outline-success">Edit</a>
                        <a href="{{ url('/delete-slider/'.$info->id) }}" class="btn btn-sm btn-outline-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection