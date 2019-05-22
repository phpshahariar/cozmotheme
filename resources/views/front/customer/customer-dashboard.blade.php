@extends('front.master')

@section('content')
    <div class="container-fluid">
        <br/>
        <!-- Button trigger modal -->
        <button type="button" style="margin-left: 45px;" class="btn btn-primary" data-toggle="modal" data-target=".customer-product">Add Product</button>

        <div class="modal fade customer-product" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h5 class="modal-title" id="exampleModalLabel">
                            @if(Session::get('id'))
                                <h4>[ Mr. {{ Session::get('name') }} Upload Your Product ]</h4>
                            @endif
                        </h5>
                        <br/>
                        <form action="{{ url('/save/customer/product') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <label>Main Category</label>
                            <div class="form-group">
                                <select class="form-control" name="main_category_id" id="category_id" required>
                                    <option>---Select Category---</option>
                                    @foreach($show_category as $category)
                                        <option value="{{ $category->id }}">{{$category->main_category}}</option>
                                    @endforeach
                                </select>

                            </div>
                            <label>Sub Category</label>
                            <div class="form-group">
                                <select class="form-control" name="sub_category_id" id="sub_id" required>
                                    <option value="">---Sub Category---</option>
                                    @foreach($sub_category as $sub)
                                        <option value="{{$sub->id}}">{{$sub->sub_category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <label>Product Name</label>
                            <div class="form-group">
                                <input type="text" name="name" required class="form-control" placeholder="Enter Your Product Name...">
                            </div>
                            <label>Product Price</label>
                            <div class="form-group">
                                <input type="number" name="price" required class="form-control price" placeholder="Enter Your Product Price...">
                                <p style="color: red;">Extra 20% Will Be Added to your Price</p>
                                <input type="text" name="price" readonly class="form-control totalPrice">
                            </div>
                            <label>Product Description</label>
                            <div class="form-group">
                                <textarea class="form-control" required name="description" id="editor1"></textarea>
                            </div>
                            <label>Demo Link</label>
                            <div class="form-group">
                                <input type="text" name="demo_link" required class="form-control" placeholder="Enter Your Product Live Link...">
                            </div>
                            <div class="form-group">
                                <input type="file" name="image" required accept="image/*">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button type="submit" name="btn" class="btn btn-primary">Upload</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <br/><br/>
        <div class="content">
            <div class="module">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th style="border: 1px solid lightslategray;">SL</th>
                                    <th style="border: 1px solid lightslategray;">Product Image</th>
                                        <span style="color: red"> {{ $errors->has('image') ? $errors->first('image') : ' ' }}</span>
                                    <th style="border: 1px solid lightslategray;">Product Name</th>
                                        <span style="color: red"> {{ $errors->has('name') ? $errors->first('name') : ' ' }}</span>
                                    <th style="border: 1px solid lightslategray;">Product Price</th>
                                        <span style="color: red"> {{ $errors->has('price') ? $errors->first('price') : ' ' }}</span>
                                    <th style="border: 1px solid lightslategray;">Status</th>
                                    <th style="border: 1px solid lightslategray;">Demo Link</th>
                                    <th style="border: 1px solid lightslategray;">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($show_customer as $key => $customer)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>
                                            <img src="{{ asset('customer-images/'.$customer->image) }}" height="50" width="120">
                                        </td>

                                        <td>{{ $customer->name }}</td>

                                        <td>TK. {{ number_format($customer->price,2) }}</td>
                                        <td style="text-align: center;">
                                            <span class="badge badge-success" style="font-size: 14px;">
                                                {{ $customer->status ==1 ? 'Approved' : 'Pending' }}
                                            </span>
                                        </td>
                                        <td>{{ $customer->demo_link }}</td>
                                        <td>

                                            <a href="{{ url('/edit/product/'.$customer->id) }}" class="badge badge-info" style="font-size: 14px;">Edit</a>
                                            <a href="{{ url('/delete/product/'.$customer->id) }}" class="badge badge-danger" style="font-size: 14px;" onclick="return confirm('Are you Sure!! \n You Want To delete This?')">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


{{--    // Sale Statement //--}}


    <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous">
    </script>
    <script>
        $("#category_id").change(function () {
            var category = $("#category_id").val();

            $("#sub_id").html("");
            var option = "";

            $.get( "http://localhost/Cozmo/public/customer-category/"+category, function( data ) {
                var data = JSON.parse(data);
                data.forEach(function (element) {
                    console.log(element.sub_category_name);
                    option += "<option value='"+ element.id +"'>"+ element.sub_category_name +"</option>";
                });

                $("#sub_id").html(option);
            });
        });

        $(".price").on('keyup',function(){
            var price = $(this).val();
            var total = price/100*20;
            $(".totalPrice").val(parseInt(total) + parseInt(price));
        })


    </script>




    <script src="//cdn.ckeditor.com/4.11.3/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'editor1' );
    </script>



@endsection