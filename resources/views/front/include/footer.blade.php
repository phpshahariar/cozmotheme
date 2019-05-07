<footer class="footer-area footer--light">
    <div class="footer-big" style="padding-top: 50px;">
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
                        <h2>Popular</h2>
                        <br/>
                        <ul>
                            @foreach($show_category as $category)
                                <li style="line-height: 35px;"><a href="{{ $category->id }}" style="text-decoration: none; font-weight: bold; color: #0a8cf0;">{{ $category->main_category }}</a> </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-md-2">
                        <h2>Company</h2>
                        <br/>
                        <ul>
                            @foreach($show_category as $category)
                                <li style="line-height: 35px;"><a href="{{ $category->id }}" style="text-decoration: none; font-weight: bold; color: #0a8cf0;">{{ $category->main_category }}</a> </li>
                            @endforeach
                        </ul>
                    </div>
                        <div class="col-md-4" style="border: 0px solid red;">
                            <h2 style="text-align: center;">Contact US</h2>
                            <br/>
                            <form action="{{ url('/contact/info') }}" method="POST" class="form-horizontal">
                                @csrf
                                <input type="text" class="form-control" name="name" placeholder="Enter Your Full Name.......">
                                <span style="color: red">{{ $errors->has('name') ? $errors->first('name') : ' ' }}</span>
                                <br/>
                                <input type="text" class="form-control" name="number" placeholder="Enter Your Number.......">
                                <span style="color: red">{{ $errors->has('number') ? $errors->first('number') : ' ' }}</span>
                                <br/>
                                <input type="text" class="form-control" style="height: 100px;" name="comments" placeholder="Enter Your Comments.......">
                                <br/>
                                <input type="submit" class="btn btn-block btn-danger" name="btn">
                            </form>
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