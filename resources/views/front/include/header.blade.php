<div class="top-menu-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="menu-fullwidth">
                    <div class="logo-wrapper">
                        <div class="logo logo-top">
                            @foreach($show_logo as $logo)
                                <a href="{{ url('/') }}"><img src="{{ asset('logo-images/'.$logo->image) }}" alt="logo image" class="img-fluid"></a>
                            @endforeach
                        </div>
                    </div>
                    <div class="menu-container">
                        <div class="d_menu">
                            <nav class="navbar navbar-expand-lg mainmenu__menu">
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon icon-menu"></span>
                                </button>
                                <!-- Collect the nav links, forms, and other content for toggling -->
                                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                    <ul class="navbar-nav">
                                        @foreach($show_category as $v_category)
                                        <li class="has_dropdown">
                                            <a href="#">{{ $v_category->main_category }}</a>
                                            <div class="dropdown dropdown--menu">
                                                <ul>
                                                    <?php
                                                        $sub_categories = DB::table('sub_categories')->where('main_category_id', $v_category->id)->get();
                                                        foreach ($sub_categories as $sub_cat){ ?>
                                                    <li>
                                                        <a href="{{url('/category-page/' .$sub_cat->id)}}"><?php echo $sub_cat->sub_category_name; ?></a>
                                                    </li>
                                                    <?php } ?>
                                                </ul>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <!-- /.navbar-collapse -->
                            </nav>
                        </div>
                    </div>
                    <div class="author-menu">
                        <!-- start .author-area -->
                        <div class="author-area">
                            <div class="search-wrapper">
                                <div class="nav_right_module search_module">
                                    <span class="icon-magnifier search_trigger"></span>
                                    <div class="search_area">
                                        <form action="#">
                                            <div class="input-group input-group-light">
                                                        <span class="icon-left" id="basic-addon1">
                                                            <i class="icon-magnifier"></i>
                                                        </span>
                                                <input type="text" class="form-control search_field" placeholder="Type words and hit enter...">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="author__notification_area">
                                <ul>
                                    <li class="has_dropdown">
                                        <div class="icon_wrap">
                                            <span class="icon-bell"></span>
                                            <span class="notification_status noti"></span>
                                        </div>
                                        <div class="dropdown notification--dropdown">
                                            <div class="dropdown_module_header">
                                                <h6>My Notifications</h6>
                                            </div>
                                            <div class="notifications_module">
                                                <div class="notification">
                                                    <div class="notification__info">
                                                        <div class="info_avatar">
                                                            <img src="{{ asset('/frontend/') }}/img/notification_head.png" alt="">
                                                        </div>
                                                        <div class="info">
                                                            <p>
                                                                <span>Anderson</span> added to Favourite
                                                                <a href="#">Mccarther Coffee Shop</a>
                                                            </p>
                                                            <p class="time">Just now</p>
                                                        </div>
                                                    </div>
                                                    <!-- end /.notifications -->
                                                    <div class="notification__icons ">
                                                        <span class="icon-heart loved noti_icon"></span>
                                                    </div>
                                                    <!-- end /.notifications -->
                                                </div>
                                                <!-- end /.notifications -->
                                                <div class="notification">
                                                    <div class="notification__info">
                                                        <div class="info_avatar">
                                                            <img src="{{ asset('/frontend/') }}/img/notification_head2.png" alt="">
                                                        </div>
                                                        <div class="info">
                                                            <p>
                                                                <span>Michael</span> commented on
                                                                <a href="#">DigiPro Extension Bundle</a>
                                                            </p>
                                                            <p class="time">Just now</p>
                                                        </div>
                                                    </div>
                                                    <!-- end /.notifications -->
                                                    <div class="notification__icons ">
                                                        <span class="icon-bubble commented noti_icon"></span>
                                                    </div>
                                                    <!-- end /.notifications -->
                                                </div>
                                                <!-- end /.notifications -->
                                                <div class="notification">
                                                    <div class="notification__info">
                                                        <div class="info_avatar">
                                                            <img src="{{ asset('/frontend/') }}/img/notification_head3.png" alt="">
                                                        </div>
                                                        <div class="info">
                                                            <p>
                                                                <span>Khamoka </span>purchased
                                                                <a href="#"> Visibility Manager
                                                                    Subscriptions</a>
                                                            </p>
                                                            <p class="time">Just now</p>
                                                        </div>
                                                    </div>
                                                    <!-- end /.notifications -->
                                                    <div class="notification__icons ">
                                                        <span class="icon-basket-loaded purchased noti_icon"></span>
                                                    </div>
                                                    <!-- end /.notifications -->
                                                </div>
                                                <!-- end /.notifications -->
                                                <div class="notification">
                                                    <div class="notification__info">
                                                        <div class="info_avatar">
                                                            <img src="{{ asset('/frontend/') }}/img/notification_head4.png" alt="">
                                                        </div>
                                                        <div class="info">
                                                            <p>
                                                                <span>Anderson</span> added to Favourite
                                                                <a href="#">Mccarther Coffee Shop</a>
                                                            </p>
                                                            <p class="time">Just now</p>
                                                        </div>
                                                    </div>
                                                    <!-- end /.notifications -->
                                                    <div class="notification__icons "><span class="icon-star reviewed noti_icon"></span>
                                                    </div>
                                                    <!-- end /.notifications -->
                                                </div>
                                                <!-- end /.notifications -->
                                                <div class="text-center m-top-30 p-left-20 p-right-20"><a href="notification.html" class="btn btn-primary btn-md btn-block">View
                                                        All</a></div>
                                                <!-- end /.notifications -->
                                            </div>
                                            <!-- end /.dropdown -->
                                        </div>
                                    </li>
                                    <li class="has_dropdown">
                                        <div class="icon_wrap">
                                            <span class="icon-envelope-open"></span>
                                            <span class="notification_status msg"></span>
                                        </div>
                                        <div class="dropdown messaging--dropdown">
                                            <div class="dropdown_module_header">
                                                <h6>My Messages</h6>
                                            </div>
                                            <div class="messages">
                                                <a href="message.html" class="message recent">
                                                    <div class="message__actions_avatar">
                                                        <div class="avatar">
                                                            <img src="{{ asset('/frontend/') }}/img/notification_head4.png" alt="">
                                                        </div>
                                                    </div>
                                                    <!-- end /.actions -->
                                                    <div class="message_data">
                                                        <div class="name_time">
                                                            <div class="name">
                                                                <p>NukeThemes</p>
                                                                <span class="icon-envelope"></span>
                                                            </div>
                                                            <span class="time">Just now</span>
                                                            <p>Hello John Smith! Nunc placerat mi ...</p>
                                                        </div>
                                                    </div>
                                                    <!-- end /.message_data -->
                                                </a>
                                                <!-- end /.message -->
                                                <a href="message.html" class="message recent">
                                                    <div class="message__actions_avatar">
                                                        <div class="avatar">
                                                            <img src="{{ asset('/frontend/') }}/img/notification_head5.png" alt="">
                                                        </div>
                                                    </div>
                                                    <!-- end /.actions -->
                                                    <div class="message_data">
                                                        <div class="name_time">
                                                            <div class="name">
                                                                <p>Crazy Coder</p>
                                                                <span class="icon-envelope"></span>
                                                            </div>
                                                            <span class="time">Just now</span>
                                                            <p>Hi! Nunc placerat mi id nisi interum ...</p>
                                                        </div>
                                                    </div>
                                                    <!-- end /.message_data -->
                                                </a>
                                                <!-- end /.message -->
                                                <a href="message.html" class="message">
                                                    <div class="message__actions_avatar">
                                                        <div class="avatar">
                                                            <img src="{{ asset('/frontend/') }}/img/notification_head2.png" alt="">
                                                        </div>
                                                    </div>
                                                    <!-- end /.actions -->
                                                    <div class="message_data">
                                                        <div class="name_time">
                                                            <div class="name">
                                                                <p>Hybrid Insane</p>
                                                            </div>
                                                            <span class="time">Just now</span>
                                                            <p>Hi! Nunc placerat mi id nisi interum ...</p>
                                                        </div>
                                                    </div>
                                                    <!-- end /.message_data -->
                                                </a>
                                                <!-- end /.message -->
                                                <a href="message.html" class="message">
                                                    <div class="message__actions_avatar">
                                                        <div class="avatar">
                                                            <img src="{{ asset('/frontend/') }}/img/notification_head3.png" alt="">
                                                        </div>
                                                    </div>
                                                    <!-- end /.actions -->
                                                    <div class="message_data">
                                                        <div class="name_time">
                                                            <div class="name">
                                                                <p>ThemeXylum</p>
                                                            </div>
                                                            <span class="time">Just now</span>
                                                            <p>Hi! Nunc placerat mi id nisi interum ...</p>
                                                        </div>
                                                    </div>
                                                    <!-- end /.message_data -->
                                                </a>
                                                <!-- end /.message -->
                                                <a href="message.html" class="message">
                                                    <div class="message__actions_avatar">
                                                        <div class="avatar">
                                                            <img src="{{ asset('/frontend/') }}/img/notification_head4.png" alt="">
                                                        </div>
                                                    </div>
                                                    <!-- end /.actions -->
                                                    <div class="message_data">
                                                        <div class="name_time">
                                                            <div class="name">
                                                                <p>NukeThemes</p>
                                                                <span class="icon-envelope"></span>
                                                            </div>
                                                            <span class="time">Just now</span>
                                                            <p>Hello John Smith! Nunc placerat mi ...</p>
                                                        </div>
                                                    </div>
                                                    <!-- end /.message_data -->
                                                </a>
                                                <!-- end /.message -->
                                            </div>
                                            <div class="text-center m-top-30 m-bottom-30 p-left-20 p-right-20">
                                                <a href="message.html" class="btn btn-primary btn-md btn-block">View All</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="has_dropdown">
                                        <div class="icon_wrap">
                                            <span class="icon-basket-loaded"></span>
                                            <span class="notification_count purch">2</span>
                                        </div>
                                        <div class="dropdown dropdown--cart">
                                            <div class="cart_area">
                                                <div class="cart_list">
                                                    <div class="cart_product">
                                                        <div class="product__info">
                                                            <div class="thumbn">
                                                                <img src="{{ asset('/frontend/') }}/img/capro1.jpg" alt="cart product thumbnail">
                                                            </div>
                                                            <div class="info">
                                                                <a class="title" href="single-product.html">Finance
                                                                    and Consulting Business Theme</a>
                                                                <div class="cat">
                                                                    <a href="#">
                                                                        <img src="{{ asset('/frontend/') }}/img/catword.png" alt="">Wordpress</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product__action">
                                                            <a href="#">
                                                                <span class="icon-trash"></span>
                                                            </a>
                                                            <p>$60</p>
                                                        </div>
                                                    </div>
                                                    <div class="cart_product">
                                                        <div class="product__info">
                                                            <div class="thumbn">
                                                                <img src="{{ asset('/frontend/') }}/img/capro2.jpg" alt="cart product thumbnail">
                                                            </div>
                                                            <div class="info">
                                                                <a class="title" href="single-product.html">Flounce
                                                                    - Multipurpose OpenCart Theme</a>
                                                                <div class="cat">
                                                                    <a href="#">
                                                                        <img src="{{ asset('/frontend/') }}/img/catword.png" alt="">Wordpress</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product__action">
                                                            <a href="#">
                                                                <span class="icon-trash"></span>
                                                            </a>
                                                            <p>$60</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="total">
                                                    <p>
                                                        <span>Total :</span>$80</p>
                                                </div>
                                                <div class="cart_action">
                                                    <a class="btn btn-primary" href="cart.html">View
                                                        Cart</a>
                                                    <a class="btn btn-secondary" href="checkout.html">Checkout</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!--start .author-author__info-->
                            <div class="author-author__info has_dropdown">
                                <div class="author__avatar online">
                                    <img src="{{ asset('/frontend/') }}/img/user-avater.png" alt="user avatar" class="rounded-circle">
                                </div>
                                <div class="dropdown dropdown--author">
                                    <div class="author-credits d-flex">
                                        <div class="author__avatar">
                                            <img src="{{ asset('/frontend/') }}/img/user-avater.png" alt="user avatar" class="rounded-circle">
                                        </div>
                                        <div class="autor__info">
                                            <p class="name">

                                            </p>
                                        </div>
                                    </div>
                                    <ul>
                                        <li>
                                            <a href="{{ url('/customer/info') }}">
                                                <span class="icon-user"></span>Profile</a>
                                        </li>
                                        <li>
                                            <a href="dashboard.html">
                                                <span class="icon-home"></span> Dashboard</a>
                                        </li>
                                        <li>
                                            <a href="dashboard-setting.html">
                                                <span class="icon-settings"></span> Setting</a>
                                        </li>
                                        <li>
                                            <a href="cart.html">
                                                <span class="icon-basket"></span>Purchases</a>
                                        </li>
                                        <li>
                                            <a href="favourites.html">
                                                <span class="icon-heart"></span> Favourite</a>
                                        </li>
                                        <li>
                                            <a href="dashboard-add-credit.html">
                                                <span class="icon-credit-card"></span>Add Credits</a>
                                        </li>
                                        <li>
                                            <a href="dashboard-statement.html">
                                                <span class="icon-chart"></span>Sale Statement</a>
                                        </li>
                                        <li>
                                            <a href="dashboard-upload.html">
                                                <span class="icon-cloud-upload"></span>Upload Item</a>
                                        </li>
                                        <li>
                                            <a href="dashboard-manage-item.html">
                                                <span class="icon-notebook"></span>Manage Item</a>
                                        </li>
                                        <li>
                                            <a href="dashboard-withdrawal.html">
                                                <span class="icon-briefcase"></span>Withdrawals</a>
                                        </li>
                                        <li>
                                            <a href="#" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                <span class="icon-logout">

                                                </span>
                                                Logout
                                            </a>
                                            <form id="logout-form" action="{{ url('/customer/logout') }}" method="get" style="display: none;">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!--end /.author-author__info-->
                        </div>
                        <!-- end .author-area -->
                        <!-- author area restructured for mobile -->
                        <div class="mobile_content ">
                            <span class="icon-user menu_icon"></span>
                            <!-- offcanvas menu -->
                            <div class="offcanvas-menu closed">
                                <span class="icon-close close_menu"></span>
                                <div class="author-author__info">
                                    <div class="author__avatar v_middle">
                                        <img src="{{ asset('/frontend/') }}/img/user-avater.png" alt="user avatar">
                                    </div>
                                </div>
                                <!--end /.author-author__info-->
                                <div class="author__notification_area">
                                    <ul>
                                        <li>
                                            <a href="notification.html">
                                                <div class="icon_wrap">
                                                    <span class="icon-bell"></span>
                                                    <span class="notification_count noti">25</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="message.html">
                                                <div class="icon_wrap">
                                                    <span class="icon-envelope"></span>
                                                    <span class="notification_count msg">6</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="cart.html">
                                                <div class="icon_wrap">
                                                    <span class="icon-basket"></span>
                                                    <span class="notification_count purch">2</span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <!--start .author__notification_area -->
                                <div class="dropdown dropdown--author">
                                    <ul>
                                        <li>
                                            <a href="author.html">
                                                <span class="icon-user"></span>Profile</a>
                                        </li>
                                        <li>
                                            <a href="dashboard.html">
                                                <span class="icon-home"></span> Dashboard</a>
                                        </li>
                                        <li>
                                            <a href="dashboard-setting.html">
                                                <span class="icon-settings"></span> Setting</a>
                                        </li>
                                        <li>
                                            <a href="cart.html">
                                                <span class="icon-basket"></span>Purchases</a>
                                        </li>
                                        <li>
                                            <a href="favourites.html">
                                                <span class="icon-heart"></span> Favourite</a>
                                        </li>
                                        <li>
                                            <a href="dashboard-add-credit.html">
                                                <span class="icon-credit-card"></span>Add Credits</a>
                                        </li>
                                        <li>
                                            <a href="dashboard-statement.html">
                                                <span class="icon-chart"></span>Sale Statement</a>
                                        </li>
                                        <li>
                                            <a href="dashboard-upload.html">
                                                <span class="icon-cloud-upload"></span>Upload Item</a>
                                        </li>
                                        <li>
                                            <a href="dashboard-manage-item.html">
                                                <span class="icon-notebook"></span>Manage Item</a>
                                        </li>
                                        <li>
                                            <a href="dashboard-withdrawal.html">
                                                <span class="icon-briefcase"></span>Withdrawals</a>
                                        </li>
                                        <li>
                                            <a href="#" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                <span class="icon-logout">

                                                </span>
                                                Logout
                                            </a>
                                            <form id="logout-form" action="{{ url('/') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                                <div class="text-center">
                                    <a href="#" class="author-area__seller-btn inline">Become a
                                        Seller</a>
                                </div>
                            </div>
                        </div>
                        <!-- end /.mobile_content -->
                    </div>
                </div>
            </div>
        </div>
        <!-- end /.row -->
    </div>
    <!-- end /.container -->
</div>