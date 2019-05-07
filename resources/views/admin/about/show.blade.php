@extends('admin.master')

@section('content')

    <!-- Button trigger modal -->
    {{--        Category Data Start--}}

    <div class="container-fluid">
        <a href="{{url('/create/footer')}}" type="button" class="btn btn-sm" style="background-color: limegreen; color: floralwhite;">
            Add About
        </a>
        <br/><br/>
        <div class="content">

            <div class="module">
                @if(Session::get('message'))
                    <p class="alert alert-success" style="color: #0e90d2; text-align: center;">{{Session::get('message')}}</p>
                @endif
                    <!-- DataTables Example -->
                    <div class="card mb-3">
                        <div class="card-header">
                            <i class="fas fa-table"></i>
                            About Table</div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th width="5%" style="text-align: center;">SL No</th>
                                        <th style="text-align: center;">Title</th>
                                        <th style="text-align: center;">Category Name</th>
                                        <th style="text-align: center;">Status</th>
                                        <th style="text-align: center;">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($i = 1)
                                    @foreach($show_footer as $key => $about)
                                        <tr class="odd gradeX">
                                            <td>{!! $i++ !!}</td>
                                            <td style="text-align: center;">{!! $about->title !!}</td>
                                            <td style="text-align: center;">{!! substr($about->category_name,0,50) !!}....</td>
                                            <td style="text-align: center;">{!! $about->status ==1 ? 'Active' : 'Pending'!!}</td>
                                            <td width="15%">
                                                <div class="btn-group">
                                                    @if($about->status ==1)
                                                        <a href="{!! url('active-footer/'.$about->id) !!}" data-id="{!! $about->id !!}" id="published" class="btn btn-success">Active</a>
                                                    @else
                                                        <a href="{!! url('/pending-footer/'.$about->id) !!}" data-id="{!! $about->id !!}" id="unpublished" class="btn btn-warning">Pending</a>
                                                    @endif
                                                    <a href="{!! url('/edit-footer/'.$about->id) !!}" data-id="{!! $about->id !!}" id="edit" class="btn btn-info">Edit</a>
                                                    <a onclick="return confirm('Are You sure Delete This!')" href="{!! url('/delete-footer/'.$about->id) !!}" data-id="{!! $about->id !!}" id="delete" class="btn btn-danger">Delete</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

            <br />

        </div><!--/.content-->
    </div>
        </div>
    </div>

    {{--        Category Data End--}}
    <!-- Modal -->

@endsection