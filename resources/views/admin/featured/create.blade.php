@extends('admin.master')

@section('content')

    <div class="card card-register mx-auto mt-5">
        <div class="card-header">Featured Form</div>
        <div class="card-body">
            <form id="addForm" action="{{ url('/save-featured') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Main Category</label>
                        <select class="form-control" name="main_category_id">
                            <option>---Select Main Category---</option>
                            @foreach($all_category as $all)
                                <option value="{{ $all->id }}">{{ $all->main_category }}</option>
                            @endforeach
                        </select>
                    </div>
                    <span style="color: red"> {{ $errors->has('main_category_id') ? $errors->first('main_category_id') : ' ' }}</span>
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Sub Category</label>
                        <select class="form-control" name="sub_category_id">
                            <option>---Select Sub Category---</option>
                            @foreach($sub_category as $sub)
                                <option value="{{ $sub->id }}">{{ $sub->sub_category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <span style="color: red"> {{ $errors->has('sub_category_id') ? $errors->first('sub_category_id') : ' ' }}</span>
                </div>
                <div class="form-group">
                    <label for="featured_name">Featured_Name</label>
                    <input type="text" class="form-control" id="featured_name" name="featured_name" placeholder="Enter Your Featured Name">
                    <span style="color: red"> {{ $errors->has('featured_name') ? $errors->first('featured_name') : ' ' }}</span>
                </div>
                <div class="form-group">
                    <label for="featured_name">Price</label>
                    <input type="number" class="form-control" id="price" name="price" placeholder="Enter Your Price">
                    <span style="color: red"> {{ $errors->has('price') ? $errors->first('price') : ' ' }}</span>
                </div>
                <div class="form-group">
                    <label for="long_description">Description</label>
                    <textarea class="form-control" name="long_description" id="editor1" required></textarea>
                    <span style="color: red"> {{ $errors->has('long_description') ? $errors->first('long_description') : ' ' }}</span>
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" id="image" name="image">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Status</label>
                    <select class="form-control" name="status">
                        <option>---Select Status---</option>
                        <option value="1">Active</option>
                        <option value="0">Pending</option>
                    </select>
                </div>
                <span style="color: red"> {{ $errors->has('image') ? $errors->first('image') : ' ' }}</span>
                <a href="{!! url('/add/features') !!}" class="btn btn-danger">
                    Back
                </a>
                <button type="submit" name="btn" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
    <script src="//cdn.ckeditor.com/4.11.3/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'editor1' );
    </script>
@endsection