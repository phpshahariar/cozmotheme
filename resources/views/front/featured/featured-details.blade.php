@extends('front.master')

@section('content')

    <section class="latest-product section--padding">
        <div class="container">
            <div class="row">
                <!-- Ends: .col-md-12 -->
                <div class="col-lg-8" style="border: 0px solid #0d0d0d;">
                    <div class="product-list">

                        <div class="tab-content" id="lp-tab-content">
                            <div class="tab-pane fade show active" id="tab" role="tabpanel" aria-labelledby="tab-one">
                                <div class="row">
                                    @foreach($featured_details as $key => $product)
                                        <div  class="col-sm-12">

                                            <div class="product-single latest-single">

                                                <div class="product-thumb">
                                                    <img src="{{ asset('/featured-images/'.$product->image) }}" height="100%" width="100%"/>
                                                </div>
                                                <!-- Ends: .product-thumb -->
                                                <div class="product-excerpt">
                                                    <h5>
                                                        <h2><u>{{ $product->category->main_category }}</u></h2>
                                                    </h5>
                                                    <h5>
                                                        {!! $product->long_description !!}
                                                    </h5>

                                                </div>
                                                <!-- Ends: .product-excerpt -->
                                            </div><!-- Ends: .product-single -->
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Ends: .product-list -->
                <div class="col-sm-4" style="border-left: 2px solid #d4edda;">
                    <div class="card-header bg-success" style="border-radius: 8px 8px 0px 0px;"><h3 style="color: #ffffff;">Product Specification</h3></div>
                    <div class="card-header">
                        <h4 >
                            Price :  <em style="color: #0e90d2; font-size: 18px;">TK. {{ number_format($product->price,2) }}</em>
                        </h4>
                    </div>
                    <div class="card-header">
                        <h4 >
                            Total View : <em style="color: #0e90d2; font-size: 18px;">{{ $product->view_count }}</em>
                        </h4>
                    </div>
                    <div class="card-header">
                        <h4 >
                            Published : <em style="color: #0e90d2; font-size: 18px;">{{ date('F j, Y', strtotime($product->created_at)) }}</em>
                        </h4>
                    </div>
                    <div class="card-header">
                        <h4 >
                            High Resolution : <em style="color: #0e90d2; font-size: 18px;">Yes</em>
                        </h4>
                    </div>
                    <div class="card-header">
                        <h4 >
                            Browsers : <em style="color: #0e90d2; font-size: 18px;">Firefox, Safari, Opera, Chrome</em>
                        </h4>
                    </div>
                    <div class="card-header">
                        <h4 >
                            Documentation : <em style="color: #0e90d2; font-size: 18px;">Well</em>
                        </h4>
                    </div>
                    <div class="card-header">
                        <h4 >
                            Layout : <em style="color: #0e90d2; font-size: 18px;">Responsive</em>
                        </h4>
                    </div>
                    <div class="card-header bg-success" style="border-radius: 0px 0px 8px 8px;"><h3 style="color: #ffffff; text-align: center;">Best Quality</h3></div>
                    <div class="text-center m-top-20">
                        <a href="#" data-toggle="modal" data-target="#buyProduct" class="btn btn--lg btn-primary">Buy Now</a>
                    </div>
                </div>
            </div>
        </div>

        {{--        Customer Order Form--}}

        <div class="modal fade" id="buyProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <form action="{{ url('/customer/product/order') }}"  method="POST" id="addCustomerForm">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h5 class="modal-title" id="exampleModalLabel">Please Add Your Information</h5>
                        </div>
                        <div class="modal-body">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control" required placeholder="Name" name="name">
                                <span style="color: red"> {{ $errors->has('name') ? $errors->first('name') : ' ' }}</span>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="icon-phone"></i></span>
                                </div>
                                <input type="number" class="form-control" required placeholder="Phone Number" name="phone">
                                <span style="color: red"> {{ $errors->has('balance') ? $errors->first('balance') : ' ' }}</span>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="icon-envelope"></i></span>
                                </div>
                                <input type="email" class="form-control" required placeholder="Enter Your Email..." name="email">
                                <span style="color: red"> {{ $errors->has('email') ? $errors->first('email') : ' ' }}</span>
                                <input type="hidden" class="form-control"  name="price" value="{{ number_format($product->price) }}">
                                <input type="hidden" class="form-control"  name="user_id" value="{{ $product->user_id }}">
                                <input type="hidden" class="form-control"  name="product_id" value="{{ $product->category->main_category }}">
                            </div>

                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" value="confirmed" required name="confirm" id="confirm">
                                <label class="form-check-label" for="confirm">Confirm Order</label><br/>
                                <input type="checkbox" value="confirmed" class="form-check-input" required name="accept" id="accept">
                                <label class="form-check-label" for="confirm">Yes I accept Your Trams & Condition</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">SubmiT</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        {{--        Customer Order Form End--}}

    </section>
@endsection