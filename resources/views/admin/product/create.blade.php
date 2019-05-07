@extends('admin.master')

@section('content')
    <div class="card card-register mx-auto mt-5">
        <div class="card-header">Product Table</div>
        <div class="card-body">
            <form action="{{ url('/save-product') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Main Category Name</label>
                    <select class="form-control" name="main_category_id">
                        <option>---Select Main Category---</option>
                        @foreach($categories as $main_category)
                            <option value="{{$main_category->id}}">{{ $main_category->main_category }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Sub Category Name</label>
                    <select class="form-control" name="sub_category_id">
                        <option>---Select Sub Category---</option>
                        @foreach($sub_categories as $sub)
                            <option value="{{$sub->id}}">{{ $sub->sub_category_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Product Name</label>
                    <input type="text" class="form-control" name="name" id="name" required placeholder="Product Name"/>
                </div>
                <div class="form-group">
                    <label>Product Price</label>
                    <input type="number" class="form-control" name="balance" id="balance" required placeholder="Product Price"/>
                </div>
                <div class="form-group">
                    <label>Short Description</label>
                    <textarea class="form-control" name="short_description" required></textarea>
                </div>
                <div class="form-group">
                    <label>Long Description</label>
                    <textarea class="form-control" name="long_description" id="editor1" required></textarea>
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
                <a href="{{url('/add/product')}}" name="btn" class="btn btn-danger">Back</a>
                <button type="submit" name="btn" class="btn btn-primary">SubmiT</button>
            </form>
        </div>
    </div>

    <script src="//cdn.ckeditor.com/4.11.3/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'editor1' );
    </script>
    @endsection