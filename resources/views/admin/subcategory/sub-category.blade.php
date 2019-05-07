@extends('admin.master')

@section('content')

    <!-- Button trigger modal -->
    {{--        Category Data Start--}}

    <div class="container-fluid">
        <a href="{{url('/create/sub/category')}}" class="btn btn-sm" style="background-color: limegreen; color: floralwhite;">
            Add Sub Category
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
                        Sub Category Table</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th width="5%" style="text-align: center;">SL No</th>
                                    <th style="text-align: center;">Sub Category Name</th>
                                    <th style="text-align: center;">Main Category Name</th>
                                    <th style="text-align: center;">Status</th>
                                    <th style="text-align: center;">Action</th>
                                </tr>
                                </thead>
                                <tbody>
{{--                                @php($i = 1)--}}
                                @foreach($sub_category as $key => $category)
                                    <tr class="odd gradeX">
                                        <td width="5%">{{$key+1}}</td>
                                        <td style="text-align: center;">{{$category->sub_category_name}}</td>
                                        <td style="text-align: center;"><?php if (isset($category->main_category->main_category)){echo $category->main_category->main_category;}else{ echo "No Category Found"; }?></td>
                                        <td style="text-align: center;">{{$category->status ==1 ? 'Active' : 'Pending'}}</td>
                                        <td width="15%">
                                            <div class="btn-group">
                                                @if($category->status ==1)
                                                    <a href="{{ url('/active/category/'.$category->id) }}" data-id="" id="active" class="btn btn-success">Active</a>
                                                @else
                                                    <a href="{{ url('/pending/category/'.$category->id) }}" data-id="" id="pending" class="btn btn-warning">Pending</a>
                                                @endif
                                                <a href="{{ url('/edit/category/'.$category->id) }}" data-id="" id="edit" class="btn btn-info">Edit</a>
                                                <a onclick="return confirm('Are You sure Delete This!')" href="{{ url('/delete/category/'.$category->id) }}" data-id="" id="delete" class="btn btn-danger">Delete</a>
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
@endsection