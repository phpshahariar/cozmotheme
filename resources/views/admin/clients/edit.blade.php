@extends('admin.master')

@section('content')

    <div class="card card-register mx-auto mt-5">
        <div class="card-header">Update Client Form</div>
        <div class="card-body">
            <form class="form-horizontal" action="{{ url('/update-client') }}" method="POST" id="clientFormEdit" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="id" name="id" value="{{ $edit_client->id }}">
                <div class="form-group">
                    <input type="file" id="client_logo" name="client_logo" accept="image/*">
                    <img src="{{ asset('clients-images/'.$edit_client->client_logo) }}" height="90" width="120">
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
    <script>
        document.forms['clientFormEdit'].elements['status'].value="{{ $edit_client->status }}";
    </script>
@endsection