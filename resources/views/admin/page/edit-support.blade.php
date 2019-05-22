@extends('admin.master')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>Update Support Page</h2>
            </div>
            @if($message = Session::get('message'))
                <h5 class="alert alert-success" style="text-align: center;">{{$message}}</h5>
            @endif
            <div class="card-body">
                <form action="{{ url('/update/support') }}" method="POST" id="support-page" style="margin-top: 20px;">
                    @csrf
                    <input type="hidden" name="id" id="id" value="{{ $edit_support->id }}">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <td>
                                        <textarea type="text" name="support" id="editor1" class="form-control" placeholder="Enter Support Information....">{{ $edit_support->support }}</textarea>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <br/>
                    <div class="col-md-12">
                        <input type="submit" name="btn" class="btn btn-block btn-danger" value="Update">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="//cdn.ckeditor.com/4.11.3/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'editor1' );
    </script>
    @endsection