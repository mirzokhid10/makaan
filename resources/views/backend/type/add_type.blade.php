@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <div class="page-content">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <form action="{{ route('store.type') }}" method="post">
                                @csrf
                                <div class="col-md-12 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Add Type</h4>
                                            <form class="">
                                                <div class="form-group">
                                                    <label for="exampleInputUsername1">Type Name</label>
                                                    <input type="text" name="type_name" class="form-control @error('type_name') is-invalid @enderror ">
                                                    @error('type_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Type Icon</label>
                                                    <input type="text" name="type_icon" class="form-control @error('type_icon') is-invalid @enderror ">
                                                    @error('type_icon')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <button type="submit" class="btn btn-primary me-2">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
