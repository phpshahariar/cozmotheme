@extends('admin.master')

@section('content')
    <div class="container-fluid">
        <div class="content">
            <div class="module">
                <div class="card">

                    <div class="card-header">
                        <h2>Update</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{url('/update/customer/product')}}" id="customerEditForm" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" class="form-control" id="id" value="{{$edit_customer_product->id}}" name="id">
                           <label>Main Category</label>
                           <select class="form-control" name="main_category_id" required>
                               <option>---Select Main Category---</option>
                               @foreach($show_category as $category)
                                   <option value="{{ $category->id }}">{{ $category->main_category }}</option>
                               @endforeach
                           </select>
                           <label>Sub Category</label>
                           <select class="form-control" name="sub_category_id" required>
                               <option>---Select Sub Category---</option>
                               @foreach($sub_categories as $sub)
                                    <option value="{{ $sub->id }}">{{ $sub->sub_category_name }}</option>
                               @endforeach
                           </select>
                            <label>Product Name</label>
                            <div class="form-group">
                                <input type="text" name="name" value="{{ $edit_customer_product->name }}" required class="form-control" placeholder="Enter Your Product Name...">
                            </div>
                            <label>Product Price</label>
                            <div class="form-group">
                                <input type="number" name="price" value="{{ $edit_customer_product->price }}" required class="form-control" placeholder="Enter Your Product Price...">
                            </div>
                            <label>Product Description</label>
                            <div class="form-group">
                                <textarea class="form-control" required name="description" id="editor1">{{ $edit_customer_product->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <img src="{{ asset('customer-images/'.$edit_customer_product->image) }}" height="300" width="600">
                            </div>
                            <div class="modal-footer">
                                <a href="{{ url('/customer/product') }}" class="btn btn-danger">Back</a>
                                <button type="submit" name="btn" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.forms['customerEditForm'].elements['main_category_id'].value="{{ $edit_customer_product->main_category_id }}";
        document.forms['customerEditForm'].elements['sub_category_id'].value="{{ $edit_customer_product->sub_category_id }}";
    </script>

    <script src="//cdn.ckeditor.com/4.11.3/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'editor1' );
    </script>
 @endsection