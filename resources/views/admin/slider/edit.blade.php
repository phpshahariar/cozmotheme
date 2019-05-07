@extends('admin.master')

@section('content')
    <div class="card card-register mx-auto mt-5">
        <div class="card-header">Update Slider Table</div>
        <div class="card-body">
            <form action="{{ url('/update-slider') }}" id="editSlider" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" value="{{ $edit_slider->title }}" class="form-control" name="title" id="title" required placeholder="Title"/>
                    <input type="hidden" value="{{ $edit_slider->id }}" class="form-control" name="id" id="id"/>
                </div>
                <div class="form-group">
                    <label>Short Description</label>
                    <textarea class="form-control" name="short_description" required>{{ $edit_slider->short_description }}</textarea>
                </div>
                <div class="form-group">
                    <input type="file" name="image" id="image"/>
                    <img src="{{ asset('slider-images/'.$edit_slider->image) }}" height="90" width="120">
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status" id="status">
                        <option>---Select Sub Category---</option>
                        <option value="1">Active</option>
                        <option value="0">Pending</option>
                    </select>
                </div>
                <a href="{{url('/add/slider')}}" name="btn" class="btn btn-danger">Back</a>
                <button type="submit" name="btn" class="btn btn-primary">SubmiT</button>
            </form>
        </div>
    </div>
<script>
    document.forms['editSlider'].elements['status'].value="{{ $edit_slider->status }}";
</script>
@endsection