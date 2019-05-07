@extends('admin.master')

@section('content')

    <div class="card card-register mx-auto mt-5">
        <div class="card-header">Add Category Form</div>
        <div class="card-body">
            <form class="form-horizontal" action="{{ url('/save-category') }}" method="POST">
                @csrf
                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" class="form-control" id="main_category" name="main_category" placeholder="Add Category">
                    </div>
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option>---Select Status---</option>
                        <option value="1">Active</option>
                        <option value="0">Pending</option>
                    </select>
                </div>
                    <a href="{{url('/add/category')}}" type="submit" name="btn" class="btn btn-danger">Back</a>
                    <button type="submit" name="btn" class="btn btn-primary">SubmiT</button>
            </form>
        </div>
    </div>
    @endsection