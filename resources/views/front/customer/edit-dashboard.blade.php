@extends('front.master')

@section('content')

    <div class="container">
        <div class="content">
            <div class="module">
                <div class="card mb-3">
                    <div class="card-header">
                        <h3>Edit Customer Product Form</h3>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ url('/update/customer') }}" method="POST" id="customerProductEdit" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" id="id" value="{{$customer_product_edit->id}}"/>
                                <label>Main Category</label>
                                <div class="form-group">
                                    <select class="form-control" name="main_category_id" id="main_category_id" required>
                                        <option>---Select Category---</option>
                                        @foreach($show_category as $category)
                                            <option value="{{ $category->id }}">{{$category->main_category}}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <label>Sub Category</label>
                                <div class="form-group">
                                    <select class="form-control" name="sub_category_id" id="sub_category_id" required>
                                        <option value="">---Sub Category---</option>
                                        @foreach($sub_category as $sub)
                                            <option value="{{$sub->id}}">{{$sub->sub_category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <label>Product Name</label>
                                <div class="form-group">
                                    <input type="text" name="name" value="{{ $customer_product_edit->name }}" required class="form-control" placeholder="Enter Your Product Name...">
                                </div>
                                <label>Product Price</label>
                                <div class="form-group">
                                    <input type="number" name="price" value="{{ $customer_product_edit->price }}" required class="form-control" placeholder="Enter Your Product Price...">
                                </div>
                                <label>Product Description</label>
                                <div class="form-group">
                                    <textarea class="form-control" required name="description" id="editor1">{!! $customer_product_edit->description !!}</textarea>
                                </div>
                                <label>Demo Link</label>
                                <div class="form-group">
                                    <input type="text" name="demo_link" required class="form-control" placeholder="Enter Your Product Live Link...">
                                </div>
                                <div class="form-group">
                                    <input type="file" name="image" required accept="image/*">
                                    <img src="{{asset('customer-images/'.$customer_product_edit->image)}}" height="90" width="120"/>
                                </div>
                                <div class="modal-footer">
                                    <a href="{{ url('/customer/dashboard') }}" class="btn btn-danger">Back</a>
                                    <button type="submit" name="btn" class="btn btn-primary">Upload</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.forms['customerProductEdit'].elements['main_category_id'].value="{{ $customer_product_edit->main_category_id }}";
        document.forms['customerProductEdit'].elements['sub_category_id'].value="{{ $customer_product_edit->sub_category_id }}";
    </script>



@endsection