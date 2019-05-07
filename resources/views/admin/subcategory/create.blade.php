@extends('admin.master')

@section('content')
    <div class="container">
        <div class="card card-register mx-auto mt-5">
            <div class="card-header">Sub Category</div>
            <div class="card-body">
                <form action="{{url('/save/subcategory')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="sub_category_name">Sub Category Name</label>
                        <input type="text" class="form-control" id="sub_category_name" name="sub_category_name" placeholder="Enter SubCategory Name">
                    </div>
                    <div class="form-group">
                        <label for="main_category_id">Main Category</label>
                        <select name="main_category_id" class="form-control">
                            <option>---Select Main Category---</option>
                            @foreach($main_category as $key => $category)
                                <option value="{{$category->id}}">{!! $category->main_category !!}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Status</label>
                        <select name="status" class="form-control">
                            <option>---Select Status---</option>
                            <option value="1">Active</option>
                            <option value="0">Pending</option>
                        </select>
                    </div>
                    <a href="{{url('/add/sub/category')}}" name="btn" class="btn btn-danger">Back</a>
                    <button type="submit" name="btn" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    @endsection