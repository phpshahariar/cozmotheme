@extends('front.master')

@section('content')
    <section class="hero-area bgimage">
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
                                    <h1 class="display-3">
                                        {!! $slider->title !!}
                                    </h1>
                                    <p class="tagline">
                                        {!! $slider->short_description !!}
                                    </p>
                                </div>
                                <!-- end .hero__btn-area-->
                                <div class="search-area">
                                    <div class="row">
                                        <div class="col-md-10 offset-md-1">
                                            <div class="search_box">
                                                <form action="#">
                                                    <input type="text" class="text_field" placeholder="Search your products...">
                                                    <div class="search__select select-wrap">
                                                        <select name="category" class="select--field">
                                                            <option value="">All Categories</option>
                                                            @foreach($all_category as $all)
                                                                <option value="{!! $all->id !!}">{{ $all->main_category }}</option>
                                                            @endforeach
                                                        </select>
                                                        <span class="icon-arrow-down"></span>
                                                    </div><!-- ends: .select-wrap -->
                                                    <button type="submit" class="search-btn btn--lg btn-primary">Search Now</button>
                                                </form>
                                            </div><!-- end .search_box -->
                                        </div>
                                    </div>
                                </div>
                                <!--start .search-area -->
                            </div><!-- ends: .col-md-12 -->
                        </div><!-- ends: .row -->
                    </div><!-- ends: .container -->
                </div><!-- ends: .contact_wrapper -->
            </div>
        @endforeach
    </section>
    <section class="featured-area section--padding bgcolor">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h1>Featured Products</h1>
                    </div>
                </div><!-- Ends: .col-md-12 -->
                <div class="col-md-12">
                    <div class="product-slide-area owl-carousel">
                        <!-- Ends: .product-single -->
                        <!-- Ends: .product-single -->
                        @foreach($show_featurd as $featurd)
                            <div class="product-single">
                                <div class="featured-badge">
                                    <span>Featured</span>
                                </div>
                                <div class="product-thumb">
                                    <figure>
                                        <img src="{{ asset('featured-images/'.$featurd->image) }}" height="490" width="350" alt="" class="img-fluid">
                                        <figcaption>
                                            <ul class="list-unstyled">
                                                <li>
                                                    <a href="">
                                                        <span class="icon-basket"></span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">Live Demo</a>
                                                </li>
                                            </ul>
                                        </figcaption>
                                    </figure>
                                </div><!-- Ends: .product-thumb -->
                                <div class="product-excerpt">
                                    <h3>
                                        <a href="{{ url('/featured-details/'.$featurd->id) }}">{!! $featurd->featured_name !!}</a>
                                    </h3>
                                    <ul class="titlebtm">
                                        <li>
                                            <img src="{{ asset('featured-images/'.$featurd->image) }}" height="30" width="40" alt="" class="img-fluid">
                                            <p>
                                                <a href="#">{!! $featurd->category->main_category !!}</a>
                                            </p>
                                        </li>
                                        <li class="product_cat">
                                            in
                                            <a href="#">{!! $featurd->sub_category->sub_category_name !!}</a>
                                        </li>
                                    </ul>
                                    <ul class="product-facts clearfix">
                                        <li class="price"><span>BDT. {{ number_format($featurd->price,2) }}</span></li>
                                        <li class="sells">
                                            <span class="icon-eye"></span>{{ $featurd->view_count}}
                                        </li>
                                        <li class="product-fav">
                                            <span class="icon-heart" title="Add to collection" data-toggle="tooltip"></span>
                                        </li>
                                        <li class="product-rating">
                                            <ul class="list-unstyled">
                                                <li class="stars">
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                    <span><i class="fa fa-star"></i></span>
                                                </li>
                                                <li class="total-rating">
                                                    <span>(5)</span>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div><!-- Ends: .product-excerpt -->
                            </div>
                        @endforeach
                    <!-- Ends: .product-single -->
                    </div>
                    <div class="more-item-btn">
                        <a href="#" class="btn btn--lg btn-secondary">More Featured Items</a>
                    </div>
                </div><!-- Ends: .produ-slide-area -->
            </div>
        </div>
    </section><!-- ends: .featured-area -->
    <section class="latest-product section--padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h1>Newest Products</h1>
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
                                    @foreach($products as $key => $product)
                                    <div  class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="{{ asset('/product-images/'.$product->image) }}"/>
                                                    <figcaption>
                                                        <ul class="list-unstyled">
{{--                                                            <li><a href="" data-toggle="modal" data-target="#BuyNow"><span class="icon-basket"></span></a></li>--}}
                                                            <li><a href="#" data-toggle="modal" data-target="#buyProduct">Buy Now</a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="{{ url('/new/product/details/' .$product->id) }}">{{ substr($product->short_description,0,50) }}</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img src="{{ asset('/product-images/'.$product->image) }}" height="30" width="30"/>
                                                        <p><a href="{{ url('/new/product/details/' .$product->id) }}">{{ $product->name }}</a></p>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">TK. {{ number_format($product->balance,2) }}</li>
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
                                        $category_by_tab_products_info_1 = DB::table('products')
                                            ->where('sub_category_id', $ch->id)
                                            ->get();
                                        ?>
                                    @foreach($category_by_tab_products_info_1 as $product)
                                    <div  class="col-lg-4 col-md-6">
                                        <div class="product-single latest-single">
                                            <div class="product-thumb">
                                                <figure>
                                                    <img src="{{ asset('/product-images/'.$product->image) }}"/>
                                                    <figcaption>
                                                        <ul class="list-unstyled">
                                                            {{--                                                            <li><a href="" data-toggle="modal" data-target="#BuyNow"><span class="icon-basket"></span></a></li>--}}
                                                            <li><a href="#" data-toggle="modal" data-target="#buyProduct">Buy Now</a></li>
                                                            <li><a href="">Live Demo</a></li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <!-- Ends: .product-thumb -->
                                            <div class="product-excerpt">
                                                <h5>
                                                    <a href="{{ url('/new/product/details/' .$product->id) }}">{{ substr($product->short_description,0,50)}}</a>
                                                </h5>
                                                <ul class="titlebtm">
                                                    <li>
                                                        <img src="{{ asset('/product-images/'.$product->image) }}" height="30" width="30"/>
                                                        <p><a href="{{ url('/new/product/details/' .$product->id) }}">{{ $product->name }}</a></p>
                                                    </li>
                                                </ul>
                                                <ul class="product-facts clearfix">
                                                    <li class="price">TK. {{ number_format($product->balance,2) }}</li>
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
                            <!-- Ends: .tab-pane -->
                        </div>
                        <div class="text-center m-top-20">
                            <a href="" class="btn btn--lg btn-primary">All New Products</a>
                        </div>
                    </div>
                    <!-- Ends: .product-list -->
                </div>
            </div>
        </div>
    </section><!-- ends: .latest-product -->
    <section class="services ">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="service-single">
                        <span class="icon-lock"></span>
                        <h4>Secure Paument</h4>
                        <p>Pellentesque facilisis kamcorper sapien interdum magna.</p>
                    </div>
                </div><!-- Ends: .col-sm-6 -->
                <div class="col-lg-3 col-sm-6">
                    <div class="service-single">
                        <span class="icon-like"></span>
                        <h4>Quality Products</h4>
                        <p>Pellentesque facilisis kamcorper sapien interdum magna.</p>
                    </div>
                </div><!-- Ends: .col-sm-6 -->
                <div class="col-lg-3 col-sm-6">
                    <div class="service-single">
                        <span class="icon-wallet"></span>
                        <h4>14 Days Money Backs</h4>
                        <p>Pellentesque facilisis kamcorper sapien interdum magna.</p>
                    </div>
                </div><!-- Ends: .col-sm-6 -->
                <div class="col-lg-3 col-sm-6">
                    <div class="service-single">
                        <span class="icon-people"></span>
                        <h4>24/7 Customer Care</h4>
                        <p>Pellentesque facilisis kamcorper sapien interdum magna.</p>
                    </div>
                </div><!-- Ends: .col-sm-6 -->
            </div>
        </div>
    </section><!-- ends: .services -->
    <section class="counter-up-area bgimage">
        <div class="bg_image_holder">
            <img src="{{ asset('/frontend/') }}/img/bg.jpg" alt="">
        </div><!-- start .container -->
        <div class="container content_above">
            <div class="row">
                <div class="col-md-12">
                    <div class="counter-up">
                        <div class="counter warning">
                            <span class="icon-briefcase"></span>
                            <span class="count_up">38,436</span>
                            <p>Items for sale</p>
                        </div><!-- ends: .counter -->
                        <div class="counter info">
                            <span class="icon-basket"></span>
                            <span class="count_up">68,257</span>
                            <p>Total Sale</p>
                        </div><!-- ends: .counter -->
                        <div class="counter secondary">
                            <span class="icon-emotsmile"></span>
                            <span class="count_up">25,567</span>
                            <p>Happy Customers</p>
                        </div><!-- ends: .counter -->
                        <div class="counter danger">
                            <span class="icon-people"></span>
                            <span class="count_up">76,458</span>
                            <p>Members</p>
                        </div><!-- ends: .counter -->
                    </div><!-- ends: .counter-up -->
                </div><!-- end .col-md-12 -->
            </div>
        </div><!-- end .container -->
    </section>
    <section class="working-process section--padding">
        <div class="container">
            <div class="row">
                <!-- Start Section Title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h1>It Works Really Easy</h1>
                    </div>
                </div>
                <!-- Ends: .col-md-12/Section Title -->
                @foreach($show_work as $work)
                <div class="col-md-12 step-single">
                    <div class="step-count">
                        <span>Step {{ $work->id }}</span>
                        <span><i class="fa fa-long-arrow-down"></i></span>
                    </div>
                    <div class="row">
                        <div class="col-md-6 step-text r-padding">
                            <div>
                                <h2>{!! $work->title !!}</h2>
                                <p>
                                    {!! substr($work->short_description,0,300) !!}....
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6 step-image l-padding">
                            <div>
                                <img src="{!! asset('work-images/'.$work->image) !!}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                    <!-- Ends .step-single -->
            <!-- Ends .step-single -->
                <!-- Ends .step-single -->
            </div>
        </div>
    </section><!-- ends: .wroking-process -->
    <!-- ends: .testimonial2 -->
    <!-- ends: .cta -->
    <h2 style="text-align: center; color: #f05b44;">Our Clients</h2>
    <section class="clients-logo">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="partners">
                        @foreach($show_client as $client)
                            <div class="partner">
                                    <img src="{{ asset('clients-images/'.$client->client_logo) }}" alt="partner image">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section><!-- ends: .clients-logo -->
    <section class="subscribe bgimage">
        <div class="bg_image_holder">
            <img src="{{ asset('/frontend/') }}/img/subscribe-bg.png" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-12 subscribe-inner">
                    <div class="envelope-svg">
                        <img src="{{ asset('/frontend/') }}/img/svg/newsletter.svg" alt="" class="svg">
                    </div>
                    <p>Subscribe to get the latest themes, templates and offer information. Don't worry, we won't send
                        spam!</p>
                    <form action="#" class="subscribe-form">
                        <div class="form-group">
                            <input type="text" placeholder="Enter your email address" required>
                            <button type="submit" class="btn btn--sm btn-primary">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    @endsection