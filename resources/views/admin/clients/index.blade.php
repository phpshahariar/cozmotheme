@extends('admin.master')

@section('content')

    <div class="card card-register mx-auto mt-5">
        <div class="card-header">Add Client Form</div>
        <div class="card-body">
            <form class="form-horizontal" action="{{ url('/save/client/product') }}" method="POST" id="clientForm" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <input type="file" id="client_logo" name="client_logo" accept="image/*">
                    </div>
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option>---Select Status---</option>
                        <option value="1">Active</option>
                        <option value="0">Pending</option>
                    </select>
                </div>
                    <a href="{{url('/add/client')}}" type="submit" name="btn" class="btn btn-danger">Back</a>
                    <button type="submit" name="btn" class="btn btn-primary">SubmiT</button>
            </form>
        </div>
    </div>
    @endsection