@extends('admin.master')

@section('content')
    <!-- Large modal -->
    <div class="container-fluid">
        <a href="{{ url('/create/work') }}" class="btn btn-primary">
            Add Work
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
            @foreach($show_work as $key => $work)
                <tr>
                    <th scope="row" width="5%">{{ $key+1 }}</th>
                    <td>
                        <img src="{{ asset('/work-images/'.$work->image) }}" height="90" width="120"/>
                    </td>
                    <td width="20%">{{ $work->title }}</td>
                    <td width="20%">{!! substr($work->short_description,0,60) !!}....</td>
                    <td width="20%">{{ $work->status ==1 ? 'Active' : 'Pending'}}</td>
                    <td width="20%">
                        @if($work->status ==1)
                        <a href="{{ url('/active-work/'.$work->id) }}" class="btn btn-sm btn-success">Active</a>
                        @else
                        <a href="{{ url('/pending-work/'.$work->id) }}" class="btn btn-sm btn-warning">Pending</a>
                        @endif
                        <a href="{{ url('/edit-work/'.$work->id) }}" class="btn btn-sm btn-info">Edit</a>
                        <a href="{{ url('/delete-work/'.$work->id) }}" onclick="return confirm('Are You Sure! Delete This Information?');" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection