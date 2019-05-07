@extends('admin.master')

@section('content')

    <div class="card card-register mx-auto mt-5">
        <div class="card-header">Update About Form</div>
        <div class="card-body">
            <form class="form-horizontal" action="{{ url('/update-footer') }}" method="POST" id="editAbout">
                @csrf
                <input type="hidden" value="{{ $edit_footer->id }}" class="form-control" id="id" name="id" placeholder="Add Title">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" value="{{ $edit_footer->title }}" class="form-control" id="title" name="title" placeholder="Add Title">
                </div>
                <div class="form-group">
                    <label>Category Name</label>
                    <textarea class="form-control" name="category_name" id="editor1">{{ $edit_footer->category_name }}</textarea>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option>---Select Status---</option>
                        <option value="1">Active</option>
                        <option value="0">Pending</option>
                    </select>
                </div>
                <a href="{{url('/add/footer')}}" type="submit" name="btn" class="btn btn-danger">Back</a>
                <button type="submit" name="btn" class="btn btn-primary">SubmiT</button>
            </form>
        </div>
    </div>
    <script src="//cdn.ckeditor.com/4.11.3/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'editor1' );
    </script>

    <script>
        document.forms['editAbout'].elements['status'].value="{{ $edit_footer->status }}";
    </script>


@endsection