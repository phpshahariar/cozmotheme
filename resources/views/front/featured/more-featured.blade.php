@extends('front.master')

@section('content')
    <section class=" bgimage" style="height: 310px;">
        @foreach($show_slider as $slider)
            <div class="bg_image_holder">
                <img src="{{ asset('/slider-images/'.$slider->image) }}" alt="background-image">
            </div>
            <div class="hero-content content_above">
                <div class="content-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="hero__content__title">
                                    <h1 class="display-3" style="color: red; margin-top: 120px; font-family: 'FontAwesome', sans-serif;">
                                        All Featured
                                    </h1>
                                    <p class="tagline">

                                    </p>
                                </div>
                            <!-- end .hero__btn-area-->
                                <!--start .search-area -->
                            </div><!-- ends: .col-md-12 -->
                        </div><!-- ends: .row -->
                    </div><!-- ends: .container -->
                </div><!-- ends: .contact_wrapper -->
            </div>
        @endforeach
    </section>

    <section class="product-grid p-bottom-100" style="margin-top: 50px;">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-12 order-lg-0 order-md-1 order-sm-1 order-1">
                    <aside class="sidebar product--sidebar">
                        <div class="sidebar-card card--category">
                            <a class="card-title" href="#collapse1" data-toggle="collapse" href="#collapse1" role="button" aria-expanded="false" aria-controls="collapse1">
                                <h5>Main Categories
                                    <span class="icon-arrow-down"></span>
                                </h5>
                            </a>
                            <div class="collapse show collapsible-content" id="collapse1">
                                <ul class="card-content">
                                    @foreach($show_category as $main)
                                        <li>
                                            <a href="#">
                                                {{ $main->main_category }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div><!-- end .collapsible_content -->
                        </div><!-- end .sidebar-card -->
                        <div class="sidebar-card card--filter">
                            <a class="card-title" href="#collapse2" data-toggle="collapse" href="#collapse2" role="button" aria-expanded="false" aria-controls="collapse2">
                                <h5>Sub Category
                                    <span class="icon-arrow-down"></span>
                                </h5>
                            </a>
                            <div class="collapse show collapsible-content" id="collapse2">
                                <ul class="card-content">
                                    @php($i = 0)
                                    @foreach($all_category as $all)
                                        <li>
                                            <span class="icon-arrow-right-circle"></span>
                                            <a href="{{url('/category-page/' .$all->id)}}" style="text-decoration: none; color: #495057;">
                                                {{ $all->sub_category_name }}

                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div><!-- end .sidebar-card -->
                        <div class="sidebar-card card--slider">
                            <a class="card-title" href="#collapse3" data-toggle="collapse" href="#collapse3" role="button" aria-expanded="false" aria-controls="collapse3">
                                <h5>Filter Products
                                    <span class="icon-arrow-down"></span>
                                </h5>
                            </a>
                            <div class="collapse show collapsible-content" id="collapse3">
                                <div class="card-content">
                                    <div class="range-slider price-range"></div>
                                    <div class="price-ranges">
                                        <span class="from rounded">$30</span>
                                        <span class="to rounded">$300</span>
                                    </div>
                                    <div class="search-update">
                                        <a href="#" class="btn btn-sm btn-primary">Search Update</a>
                                    </div>
                                </div>
                            </div>
                        </div><!-- end .sidebar-card -->
                        {{--                        <div class="sidebar-card card--category card--date-range">--}}
                        {{--                            <a class="card-title" href="#collapse4" data-toggle="collapse" href="#collapse4" role="button" aria-expanded="false" aria-controls="collapse4">--}}
                        {{--                                <h5>Date Range--}}
                        {{--                                    <span class="icon-arrow-down"></span>--}}
                        {{--                                </h5>--}}
                        {{--                            </a>--}}
                        {{--                            <div class="collapse show collapsible-content" id="collapse4">--}}
                        {{--                                <ul class="card-content">--}}
                        {{--                                    <li>--}}
                        {{--                                        <a href="#">--}}
                        {{--                                            Last Week--}}
                        {{--                                            <span class="item-count">35</span>--}}
                        {{--                                        </a>--}}
                        {{--                                    </li>--}}
                        {{--                                    <li>--}}
                        {{--                                        <a href="#">--}}
                        {{--                                            Last Month--}}
                        {{--                                            <span class="item-count"> 45</span>--}}
                        {{--                                        </a>--}}
                        {{--                                    </li>--}}
                        {{--                                    <li>--}}
                        {{--                                        <a href="#">--}}
                        {{--                                            Last 6 Month--}}
                        {{--                                            <span class="item-count">13</span>--}}
                        {{--                                        </a>--}}
                        {{--                                    </li>--}}
                        {{--                                    <li>--}}
                        {{--                                        <a href="#">--}}
                        {{--                                            Last Year--}}
                        {{--                                            <span class="item-count">08</span>--}}
                        {{--                                        </a>--}}
                        {{--                                    </li>--}}
                        {{--                                </ul>--}}
                        {{--                            </div><!-- end .collapsible_content -->--}}
                        {{--                        </div><!-- end .sidebar-card -->--}}
                    </aside><!-- end aside -->
                </div><!-- end .col-md-3 -->

                <div class="col-xl-9 col-lg-8 col-md-12 order-lg-1 order-md-0 order-sm-0 order-0 product-list">
                    <div class="row">
                        @foreach($show_featurd as $key => $product)
                            <div class="col-xl-6 col-lg-6 col-md-6" >
                                <div class="product-single latest-single">
                                    <div class="product-thumb" >
                                        <figure style="height: 230px; width: 360px;">
                                            <img src="{{ asset('/featured-images/'.$product->image) }}" alt="" class="img-fluid">
                                            <figcaption>
                                                <ul class="list-unstyled">
                                                    <li><a href="#" data-toggle="modal" data-target="#buyProduct">Buy Now</a></li>
                                                    <li>
                                                        <a href="">Live Demo</a>
                                                    </li>
                                                </ul>
                                            </figcaption>
                                        </figure>
                                    </div><!-- Ends: .product-thumb -->
                                    <div class="product-excerpt" style="height: 160px; width: 360px;">
                                        <h5>
                                            <a href="{{ url('/new/product/details/' .$product->id) }}">{{ $product->name }}</a>
                                            <a href="{{ url('/new/product/details/' .$product->id) }}">{{ $product->featured_name }}</a>
                                        </h5>
                                        <ul class="titlebtm">
                                            <li>
                                                <img src="{{ asset('/product-images/'.$product->image) }}" alt="" class="img-fluid">
                                                <p>
                                                    <a href="{{ url('/new/product/details/' .$product->id) }}">{{ $product->category->main_category }}</a>
                                                </p>
                                            </li>
                                        </ul>
                                        <ul class="product-facts clearfix">
                                            <li class="price">TK. {{ number_format($product->price,2) }}</li>
                                            <li class="sells">
                                                <span class="icon-eye"></span> {{ $product->view_count }}
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
                    {{ $show_featurd->links() }}
                    <!-- Start Pagination --><!-- Ends: .pagination-default -->
                </div>

                <!-- Ends: .product-list -->
            </div>
        </div>
    </section>


    <!--Modal-->

    <div class="modal fade" id="buyProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form action="{!! url('/buy/product/info') !!}"  method="POST" id="adddepositform">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Please Add Your Information</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Name" name="name">
                            <span style="color: red"> {{ $errors->has('name') ? $errors->first('name') : ' ' }}</span>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="icon-phone"></i></span>
                            </div>
                            <input type="number" class="form-control" placeholder="Phone Number" name="phone">
                            <span style="color: red"> {{ $errors->has('balance') ? $errors->first('balance') : ' ' }}</span>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="icon-envelope"></i></span>
                            </div>
                            <input type="email" class="form-control" placeholder="Enter Your Email..." name="email">
                            <span style="color: red"> {{ $errors->has('email') ? $errors->first('email') : ' ' }}</span>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" name="confirm" id="confirm">
                            <label class="form-check-label" for="confirm">Confirm Order</label><br/>
                            <input type="checkbox" class="form-check-input" name="confirm" id="confirm">
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
    <!--end modal-->



@endsection