@extends('admin.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Update Dynamic Page</h2>
        </div>
        @if($message = Session::get('message'))
            <h5 class="alert alert-success" style="text-align: center;">{{$message}}</h5>
        @endif
        <div class="card-body">
            <form action="{{ url('/update/page') }}" method="POST" id="dynamic-page" style="margin-top: 20px;">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <td>
                                    <input type="text" value="{{ $edit_dynamic_page->page_name }}" name="page_name" class="form-control" placeholder="Page Name Here">
                                    <input type="hidden" value="{{ $edit_dynamic_page->id }}" name="id" id="id" class="form-control" placeholder="Page Name Here">
                                </td>
                                <td>
                                    <input type="text" value="{{ $edit_dynamic_page->page_link }}" name="page_link"  class="form-control" placeholder="Page Link Here">
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
    @endsection