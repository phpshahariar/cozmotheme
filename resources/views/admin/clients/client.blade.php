@extends('admin.master')

@section('content')

    <!-- Button trigger modal -->
    {{--        Category Data Start--}}

    <div class="container-fluid">
        <a href="{{url('/create/client')}}" class="btn btn-sm" style="background-color: limegreen; color: floralwhite;">
            Add Client
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
                            Category Table</div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th width="5%" style="text-align: center;">SL No</th>
                                        <th style="text-align: center;">Image</th>
                                        <th style="text-align: center;">Status</th>
                                        <th style="text-align: center;">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($i = 1)
                                    @foreach($show_client as $key => $client)
                                        <tr class="odd gradeX">
                                            <td>{!! $i++ !!}</td>
                                            <td width="20%">
                                                <img src="{{ asset('clients-images/'.$client->client_logo) }}" height="40" width="150"/>
                                            </td>
                                            <td style="text-align: center;">{!! $client->status ==1 ? 'Active' : 'Pending'!!}</td>
                                            <td width="15%">
                                                <div class="btn-group">
                                                    @if($client->status ==1)
                                                        <a href="{!! url('/active-client/'.$client->id) !!}" data-id="{!! $client->id !!}" id="published" class="btn btn-success">Active</a>
                                                    @else
                                                        <a href="{!! url('/pending-client/'.$client->id) !!}" data-id="{!! $client->id !!}" id="unpublished" class="btn btn-warning">Pending</a>
                                                    @endif
                                                    <a href="{!! url('/edit-client/'.$client->id) !!}" data-id="{!! $client->id !!}" id="edit" class="btn btn-info">Edit</a>
                                                    <a onclick="return confirm('Are You sure Delete This!')" href="{!! url('delete-client/'.$client->id) !!}"  id="delete" class="btn btn-danger">Delete</a>
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