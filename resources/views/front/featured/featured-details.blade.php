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
                                <!--start .search-area -->
                            </div><!-- ends: .col-md-12 -->
                        </div><!-- ends: .row -->
                    </div><!-- ends: .container -->
                </div><!-- ends: .contact_wrapper -->
            </div>
        @endforeach
    </section>
    <section class="latest-product section--padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    {{--                    @foreach($category_product as $product)--}}
                    {{--                        <div class="section-title">--}}
                    {{--                            <h2>{{ $product->category->main_category }}</h2>--}}
                    {{--                        </div>--}}
                    {{--                        @endforeach--}}
                </div><!-- Ends: .col-md-12 -->
                <div class="col-lg-12">
                    <div class="product-list">
                        {{--                        <ul class="nav nav__product-list" id="lp-tab" role="tablist">--}}
                        {{--                            <li class="nav-item">--}}
                        {{--                                <a class="nav-link active" data-toggle="tab" href="all" role="tab" aria-selected="true">All Items</a>--}}
                        {{--                            </li>--}}
                        {{--                            @foreach($show_category as $key => $category)--}}
                        {{--                                <li class="nav-item" >--}}
                        {{--                                    <a class="nav-link" data-toggle="tab" href="{{ $category->id }}" >{!! $category->main_category !!}</a>--}}
                        {{--                                </li>--}}
                        {{--                            @endforeach--}}
                        {{--                        </ul>--}}
                        <div class="tab-content" id="lp-tab-content">
                            <div class="tab-pane fade show active" id="tab" role="tabpanel" aria-labelledby="tab-one">
                                <div class="row">
                                    @foreach($featured_details as $key => $product)
                                        <div  class="col-lg-8 col-md-4">
                                            <div class="product-single latest-single">
                                                <div class="product-thumb">
                                                    <figure>
                                                        <img src="{{ asset('/featured-images/'.$product->image) }}" width="100%"/>
                                                        <figcaption>
                                                            <ul class="list-unstyled">
                                                                <li><a href="#"><span class="icon-basket"></span></a></li>
                                                                <li><a href="#">Live Demo</a></li>
                                                            </ul>
                                                        </figcaption>
                                                    </figure>
                                                </div>
                                                <!-- Ends: .product-thumb -->
                                                <div class="product-excerpt">
                                                    <h5>
                                                        <a href="">{{ $product->featured_name }}</a>
                                                    </h5>
                                                    <h5>
                                                        <a href="">{!! $product->long_description !!}</a>
                                                    </h5>
                                                    <ul class="product-facts clearfix">
                                                        <li class="price">TK. {{ number_format($product->price,2) }}</li>
                                                        <li class="sells">
                                                            <span class="icon-basket"></span>
                                                        </li>
                                                        <li class="product-fav">
                                                            <span class="icon-heart" title="Add to collection" data-toggle="tooltip"></span>
                                                            <span class="icon-eye" data-toggle="tooltip"></span>{{ $product->view_count }}
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- Ends: .product-excerpt -->
                                            </div><!-- Ends: .product-single -->
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="text-center m-top-20">
                            <a href="" class="btn btn--lg btn-primary">All New Products</a>
                        </div>
                    </div>
                    <!-- Ends: .product-list -->
                </div>
            </div>
        </div>
    </section>
@endsection