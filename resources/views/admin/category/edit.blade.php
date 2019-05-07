@extends('admin.master')

@section('content')

    <div class="card card-register mx-auto mt-5">
        <div class="card-header">Update Category Form</div>
        <div class="card-body">
            <form class="form-horizontal" action="{{ url('/update-category') }}" method="POST" id="editCategoryForm">
                @csrf
                <div class="form-group">
                    <label>Category Name</label>
                    <input type="text" class="form-control" value="{{$edit_category->main_category}}" id="main_category" name="main_category" placeholder="Add Category">
                    <input type="hidden" class="form-control" value="{{$edit_category->id}}" id="id" name="id" placeholder="Add Category">
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

    <script>
        document.forms['editCategoryForm'].elements['status'].value="{{$edit_category->status}}";
    </script>


@endsection