@extends('admin.master')

@section('content')

    <div class="card card-register mx-auto mt-5">
        <div class="card-header">Update Logo</div>
        <div class="card-body">
            <form id="editLogoForm" class="form-horizontal" action="{{ url('/update-logo') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{ $edit_logo->id }}" name="id" id="id"/>
                <div class="form-group">
                    <input type="file" id="image" name="image" accept="image/*">
                    <img src="{{ asset('logo-images/'.$edit_logo->image) }}" height="40" width="150"/>
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
                <button type="submit" name="btn" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
    <script>
        document.forms['editLogoForm'].elements['status'].value="{{ $edit_logo->status }}";
    </script>
@endsection