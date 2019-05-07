@extends('admin.master')

@section('content')
    <div class="card card-register mx-auto mt-5">
        <div class="card-header">Product Table</div>
        <div class="card-body">
            <form action="{{ url('/save/work/product') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Product Title</label>
                    <input type="text" class="form-control" name="title" id="title" required placeholder="Product Title"/>
                </div>
                <div class="form-group">
                    <label>Short Description</label>
                    <textarea class="form-control" name="short_description" id="editor1" required></textarea>
                </div>
                <div class="form-group">
                    <input type="file" name="image" id="image"/>
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
@endsection