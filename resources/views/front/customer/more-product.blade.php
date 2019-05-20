@extends('front.master')

@section('content')
    <section class="latest-product section--padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h1>All Update Products</h1>
                    </div>
                </div><!-- Ends: .col-md-12 -->
                <div class="col-lg-12">
                    <div class="product-list">
                        <ul class="nav nav__product-list" id="lp-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#all_tab">All Items</a>
                            </li>
                            @foreach($show_category as $key => $c_info)
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tab-{{$c_info->id}}">{!! $c_info->main_category !!}</a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="tab-content" id="lp-tab-content">

                            <div class="tab-pane fade show active" id="all_tab" role="tabpanel" aria-labelledby="tab-one">
                                <div class="row">
                                    @foreach($customer_product as $key => $product)
                                        <div  class="col-lg-4 col-md-6">
                                            <div class="product-single latest-single">
                                                <div class="product-thumb">
                                                    <figure>
                                                        <img src="{{ asset('/customer-images/'.$product->image) }}"/>
                                                        <figcaption>
                                                            <ul class="list-unstyled">
                                                                {{--                                                            <li><a href="" data-toggle="modal" data-target="#BuyNow"><span class="icon-basket"></span></a></li>--}}
                                                                <li><a href="{{url('/customer/product/details/'.$product->id)}}" >Buy Now</a></li>
                                                                <li><a href="">Live Demo</a></li>
                                                            </ul>
                                                        </figcaption>
                                                    </figure>
                                                </div>
                                                <!-- Ends: .product-thumb -->
                                                <div class="product-excerpt">
                                                    <h5>
                                                        <a href="{{ url('/customer/product/details/' .$product->id) }}">{{ substr($product->short_description,0,50) }}</a>
                                                    </h5>
                                                    <ul class="titlebtm">
                                                        <li>
                                                            <img src="{{ asset('/customer-images/'.$product->image) }}" height="30" width="30"/>
                                                            <p><a href="{{ url('/customer/product/details/' .$product->id) }}">{{ $product->name }}</a></p>
                                                        </li>
                                                    </ul>
                                                    <ul class="product-facts clearfix">
                                                        @if(isset($product->price))
                                                        <li class="price">TK. {{ number_format($product->price,2) }}</li>
                                                        @else
                                                            <p>Price Not Found</p>
                                                        @endif
                                                        <li class="sells">
                                                            <span class="icon-basket"></span>{{ $product->view_count }}
                                                        </li>
                                                        <li class="product-fav">
                                                            <span class="icon-heart" title="Add to collection" data-toggle="tooltip"></span>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- Ends: .product-excerpt -->
                                            </div><!-- Ends: .product-single -->
                                        </div>
                                    @endforeach
                                </div>
                            </div><!-- Ends: .tab-pane -->

                            @foreach($all_category as $c_info)
                                <div class="tab-pane fade show" id="tab-{{$c_info->id}}" role="tabpanel" aria-labelledby="tab-one">
                                    <div class="row">
                                        <?php
                                        $chield = DB::table('sub_categories')
                                            ->where('main_category_id', $c_info->id)
                                            ->get();

                                        foreach ($chield as $ch) {
                                        $category_by_tab_products_customer_info_1 = DB::table('customer_products')
                                            ->where('sub_category_id', $ch->id)
                                            ->get();
                                        ?>
                                        @foreach($category_by_tab_products_customer_info_1 as $product)
                                            <div  class="col-lg-4 col-md-6">
                                                <div class="product-single latest-single">
                                                    <div class="product-thumb">
                                                        <figure>
                                                            <img src="{{ asset('/customer-images/'.$product->image) }}"/>
                                                            <figcaption>
                                                                <ul class="list-unstyled">
                                                                    {{--                                                            <li><a href="" data-toggle="modal" data-target="#BuyNow"><span class="icon-basket"></span></a></li>--}}
                                                                    <li><a href="{{url('/customer/product/details/'.$product->id)}}">Buy Now</a></li>
                                                                    <li><a href="#">Live Demo</a></li>
                                                                </ul>
                                                            </figcaption>
                                                        </figure>
                                                    </div>
                                                    <!-- Ends: .product-thumb -->
                                                    <div class="product-excerpt">
                                                        <ul class="titlebtm">
                                                            <li>
                                                                <img src="{{ asset('/customer-images/'.$product->image) }}" height="30" width="30"/>
                                                                <p><a href="{{ url('/customer/product/details/' .$product->id) }}">{{ $product->name }}</a></p>
                                                            </li>
                                                        </ul>
                                                        <ul class="product-facts clearfix">
                                                            @if(isset($product->price))
                                                                <li class="price">TK. {{ number_format($product->price,2) }}</li>
                                                            @else
                                                                <p>Price Not Found</p>
                                                            @endif
                                                            <li class="sells">
                                                                <span class="icon-basket"></span>{{ $product->view_count }}
                                                            </li>
                                                            <li class="product-fav">
                                                                <span class="icon-heart" title="Add to collection" data-toggle="tooltip"></span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <!-- Ends: .product-excerpt -->
                                                </div><!-- Ends: .product-single -->
                                            </div>
                                        @endforeach
                                        <?php } ?>
                                    </div>
                                </div><!-- Ends: .tab-pane -->
                        @endforeach
                        <!-- Ends: .tab-pane -->
{{--                            <div class="modal fade" id="buyProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--                                <div class="modal-dialog" role="document">--}}
{{--                                    <form action="{!! url('/buy/product/info') !!}"  method="POST" id="adddepositform">--}}
{{--                                        @csrf--}}
{{--                                        <div class="modal-content">--}}
{{--                                            <div class="modal-header">--}}
{{--                                                <h5 class="modal-title" id="exampleModalLabel">Please Add Your Information</h5>--}}
{{--                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                                    <span aria-hidden="true">&times;</span>--}}
{{--                                                </button>--}}
{{--                                            </div>--}}
{{--                                            <div class="modal-body">--}}
{{--                                                <div class="input-group mb-3">--}}
{{--                                                    <div class="input-group-prepend">--}}
{{--                                                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>--}}
{{--                                                    </div>--}}
{{--                                                    <input type="text" class="form-control" placeholder="Name" name="name">--}}
{{--                                                    <span style="color: red"> {{ $errors->has('name') ? $errors->first('name') : ' ' }}</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="input-group mb-3">--}}
{{--                                                    <div class="input-group-prepend">--}}
{{--                                                        <span class="input-group-text" id="basic-addon1"><i class="icon-phone"></i></span>--}}
{{--                                                    </div>--}}
{{--                                                    <input type="number" class="form-control" placeholder="Phone Number" name="phone">--}}
{{--                                                    <span style="color: red"> {{ $errors->has('balance') ? $errors->first('balance') : ' ' }}</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="input-group mb-3">--}}
{{--                                                    <div class="input-group-prepend">--}}
{{--                                                        <span class="input-group-text" id="basic-addon1"><i class="icon-envelope"></i></span>--}}
{{--                                                    </div>--}}
{{--                                                    <input type="email" class="form-control" placeholder="Enter Your Email..." name="email">--}}
{{--                                                    <span style="color: red"> {{ $errors->has('email') ? $errors->first('email') : ' ' }}</span>--}}
{{--                                                </div>--}}
{{--                                                <div class="form-group form-check">--}}
{{--                                                    <input type="checkbox" class="form-check-input" name="confirm" id="confirm">--}}
{{--                                                    <label class="form-check-label" for="confirm">Confirm Order</label><br/>--}}
{{--                                                    <input type="checkbox" class="form-check-input" name="confirm" id="confirm">--}}
{{--                                                    <label class="form-check-label" for="confirm">Yes I accept Your Trams & Condition</label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="modal-footer">--}}
{{--                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
{{--                                                <button type="submit" class="btn btn-primary">SubmiT</button>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </form>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <!-- Ends: .tab-pane -->
                        </div>
                        {{ $customer_product->links() }}
                    </div>
                    <!-- Ends: .product-list -->
                </div>
            </div>
        </div>
    </section>
@endsection