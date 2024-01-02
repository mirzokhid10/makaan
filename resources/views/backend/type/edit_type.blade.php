@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <div class="page-content">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Edit Property Type</h4>
                    </div>
                    <div class="table-responsive">
                        <form method="POST" action="{{ route('update.type', $types->id) }}" class="forms-sample">
                            @csrf
                            <input type="hidden" name="id" value="{{ $types->id }}">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Type Name</label>
                                <input type="text" name="type_name" class="form-control
                                @error('type_name') is-invalid @enderror"
                                value="{{ $types->type_name }}">
                                @error('type_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Type Icon</label>
                                <input type="text" name="type_icon" class="form-control @error('type_icon') is-invalid @enderror " value="{{ $types->type_icon }}" >
                                @error('type_icon')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary me-2">Save Changes</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
