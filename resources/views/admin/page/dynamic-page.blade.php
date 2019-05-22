@extends('admin.master')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Add Dynamic Page</h2>
            </div>
            @if($message = Session::get('message'))
                <h5 class="alert alert-success" style="text-align: center;">{{$message}}</h5>
            @endif
            <div class="card-body">
                <form action="{{ url('/save/page') }}" method="POST" id="dynamic-page" style="margin-top: 20px;">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>
                                            <input type="text" name="page_name" class="form-control" placeholder="Page Name Here">
                                        </td>
                                        <td>
                                            <input type="text" name="page_link"  class="form-control" placeholder="Page Link Here">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <br/>
                    <div class="col-md-12">
                        <input type="submit" name="btn" class="btn btn-block btn-danger" value="SubmiT">
                    </div>
                </form>
            </div>
        </div>
        <br/>
        <div class="table table-bordered">
            <div class="content">
                <div class="module">
                    <div class="card">
                        <div class="card-header">
                            <h3>Show All Dynamic Page</h3>
                        </div>
                        <table>
                            <thead>
                                <tr style="text-align: center">
                                    <th width="5%">SN NO</th>
                                    <th>Page Name</th>
                                    <th>Page Link</th>
                                    <th width="15%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php($i =0)
                            @foreach($dynamic_page_show as $page_show)
                                <tr style="text-align: center">
                                    <td>{{$i++}}</td>
                                    <td>{{ $page_show->page_name }}</td>
                                    <td>{{ $page_show->page_link }}</td>
                                    <td>
                                        <a href="{{ url('/edit/page/'.$page_show->id) }}" class="btn btn-sm btn-success">Edit</a>
                                        <a href="{{ url('/delete/page/'.$page_show->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are You sure Delete This!')">Delete</a>
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



{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>--}}
{{--    <script>--}}
{{--        $(document).ready(function () {--}}
{{--           $('#add_btn').click(function () {--}}
{{--               addRow();--}}
{{--            });--}}

{{--           function addRow() {--}}
{{--               add = '<tr>\n' +--}}
{{--                   '                                        <td>\n' +--}}
{{--                   '                                            <input type="text" name="page_name[]" class="form-control" placeholder="Page Name Here">\n' +--}}
{{--                   '                                        </td>\n' +--}}
{{--                   '                                        <td>\n' +--}}
{{--                   '                                            <input type="text" name="page_link[]"  class="form-control" placeholder="Page Link Here">\n' +--}}
{{--                   '                                        </td>\n' +--}}
{{--                   '                                        <td width="5%">\n' +--}}
{{--                   '                                            <button type="button" name="add_btn" id="no_btn" class="btn btn-sm btn-danger">No</button>\n' +--}}
{{--                   '                                        </td>\n' +--}}
{{--                   '                                    </tr>';--}}
{{--               $('tbody').append(add);--}}
{{--           }--}}
{{--        });--}}
{{--    </script>--}}

{{--    <script type="text/javascript">--}}
{{--        $(document).ready(function () {--}}
{{--            $( "#no_btn" ).on('click',function () {--}}
{{--                console.log("Hellon");--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
 @endsection