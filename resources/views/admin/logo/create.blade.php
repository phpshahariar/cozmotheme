@extends('admin.master')

@section('content')

    <div class="card card-register mx-auto mt-5">
        <div class="card-header">Add Logo</div>
        <div class="card-body">
            <form class="form-horizontal" action="{{ url('/save-logo') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="file" id="image" name="image" accept="image/*">
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option>---Select Status---</option>
                        <option value="1">Active</option>
                        <option value="0">Pending</option>
                    </select>
                </div>
                <a href="{{url('/add/logo')}}"  name="btn" class="btn btn-danger">Back</a>
                <button type="submit" name="btn" class="btn btn-primary">SubmiT</button>
            </form>
        </div>
    </div>
@endsection