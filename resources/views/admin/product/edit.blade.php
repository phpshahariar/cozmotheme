@extends('admin.master')

@section('content')
    <div class="card card-register mx-auto mt-5">
        <div class="card-header">Update Product Table</div>
        <div class="card-body">
            <form action="{{ url('/update-product') }}" method="POST" enctype="multipart/form-data" id="editProductForm">
                @csrf
                <input type="hidden" value="{{ $edit_product->id }}" name="id" id="id">
                <div class="form-group">
                    <label>Main Category Name</label>
                    <select class="form-control" name="main_category_id" id="main_category_id">
                        <option>---Select Main Category---</option>
                        @foreach($categories as $main_category)
                            <option value="{{$main_category->id}}">{{ $main_category->main_category }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Sub Category Name</label>
                    <select class="form-control" name="sub_category_id" id="sub_category_id">
                        <option>---Select Sub Category---</option>
                        @foreach($sub_categories as $sub)
                            <option value="{{$sub->id}}">{{ $sub->sub_category_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Product Name</label>
                    <input type="text" value="{{ $edit_product->name }}" class="form-control" name="name" id="name" required placeholder="Product Name"/>
                </div>
                <div class="form-group">
                    <label>Product Price</label>
                    <input type="number" value="{{ $edit_product->balance }}" class="form-control" name="balance" id="balance" required placeholder="Product Price"/>
                </div>
                <div class="form-group">
                    <label>Short Description</label>
                    <textarea class="form-control" name="short_description" required>{{ $edit_product->short_description }}</textarea>
                </div>
                <div class="form-group">
                    <label>Long Description</label>
                    <textarea class="form-control" name="long_description" id="editor1" required>{{ $edit_product->long_description }}</textarea>
                </div>
                <label>Demo Link</label>
                <div class="form-group">
                    <input type="text" name="demo_link" value="{{ $edit_product->demo_link }}" required class="form-control" placeholder="Enter Your Product Live Link...">
                </div>
                <div class="form-group">
                    <input type="file" name="image" id="image"/>
                    <img src="{{ asset('product-images/'.$edit_product->image) }}" height="50" width="100"/>
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
                <button type="submit" name="btn" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>

    <script src="//cdn.ckeditor.com/4.11.3/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'editor1' );
    </script>
    <script>
        document.forms['editProductForm'].elements['main_category_id'].value="{{ $edit_product->main_category_id }}";
        document.forms['editProductForm'].elements['sub_category_id'].value="{{ $edit_product->sub_category_id }}";
        document.forms['editProductForm'].elements['status'].value="{{ $edit_product->status }}";
    </script>

@endsection