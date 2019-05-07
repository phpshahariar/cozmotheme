@extends('admin.master')

@section('content')
    <div class="card card-register mx-auto mt-5">
        <div class="card-header">Product Table</div>
        <div class="card-body">
            <form action="{{ url('/update-work') }}" method="POST" enctype="multipart/form-data" id="workEditForm">
                @csrf
                <input type="hidden" name="id" id="id" value="{{ $pending_work->id }}">
                <div class="form-group">
                    <label>Product Title</label>
                    <input type="text" class="form-control" value="{{ $pending_work->title }}" name="title" id="title" required placeholder="Product Title"/>
                </div>
                <div class="form-group">
                    <label>Short Description</label>
                    <textarea class="form-control" name="short_description" id="editor1" required>{{ $pending_work->short_description }}</textarea>
                </div>
                <div class="form-group">
                    <input type="file" name="image" id="image"/>
                    <img src="{!! asset('work-images/'.$pending_work->image) !!}" height="90" width="120"/>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status" id="status">
                        <option>---Select Sub Category---</option>
                        <option value="1">Active</option>
                        <option value="0">Pending</option>
                    </select>
                </div>
                <a href="{{url('/add/work')}}" name="btn" class="btn btn-danger">Back</a>
                <button type="submit" name="btn" class="btn btn-primary">SubmiT</button>
            </form>
        </div>
    </div>

    <script src="//cdn.ckeditor.com/4.11.3/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'editor1' );
    </script>

    <script>
        document.forms['workEditForm'].elements['status'].value="{{ $pending_work->status }}"
    </script>

@endsection