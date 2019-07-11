<footer class="footer-area footer--light">
    <div class="" style="padding-top: 50px;">
        <!-- start .container -->
        <div class="container">
            <img src="{{ asset('/frontend/') }}/img/footer.png" style="margin-left: 50px;" alt="" height="90" width="120" class="img-fluid">
            <div class="col-md-12" style="border: 0px solid red;">
                <div class="row">
                    @foreach($show_about as $about)
                    <div class="col-md-4">
                        <h2>{!! $about->title !!}</h2>
                        <p>{!! $about->category_name !!}</p>
                    </div>
                    @endforeach
                    <div class="col-md-2">
                        <h2>Category</h2>
                        <br/>
                        <ul>
                            @foreach($show_category as $category)
                                <li style="line-height: 35px;"><a href="{{ $category->id }}" style="text-decoration: none; font-weight: bold; color: #0a8cf0;">{{ $category->main_category }}</a> </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-md-2" style="margin-left: 20px;">
                        <h2>Company</h2>
                        <br/>
                        <ul>
                            @foreach($show_dynamic_page as $dynamic_page)
                                <li>
                                    <p><a href="#" style="color: red; font-weight: bold; text-align: center;"> {{ $dynamic_page->page_name }}</a></p>
                                </li>
                             @endforeach
                        </ul>
                    </div>
                        <div class="col-md-3" style="border: 0px solid red; margin-left: 50px;">
                            <h2 style="text-align: center;">Support</h2>
                            @foreach($show_support_page as $support_page)
                                <strong style="margin-left: 30px;">{!! $support_page->support !!}</strong>
                            @endforeach
                        </div>
                    </div>
            </div>
        </div>
            <!-- end /.row -->


        </div>
        <!-- end /.container -->
    </div>

    <!-- end /.footer-big -->
    <div class="mini-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright-text">
                        <p>&copy; 2018
                            <a href="#">Cozmo-Theme</a>. All rights reserved. Created by
                            <a href="#">Cozmo-Theme</a>
                        </p>
                    </div>
                    <div class="go_top">
                        <span class="icon-arrow-up"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>