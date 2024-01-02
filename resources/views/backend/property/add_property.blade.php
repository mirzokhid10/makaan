@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <div class="page-content">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Property</h4>
                    <form method="post" action="{{ route('store.property') }}"
                    enctype="multipart/form-data" class="form-sample">
                        @csrf
                        <p class="card-description">Property Info</p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Property Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="property_name" class="form-control @error('property_name') is-invalid @enderror ">
                                        @error('property_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Property Slug</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="property_slug" class="form-control @error('property_slug') is-invalid @enderror ">
                                        @error('property_slug')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Property Status</label>
                                    <div class="col-sm-9">
                                        <select name="property_status" class="form-select"
                                            id="exampleFormControlSelect1">
                                            <option selected="" disabled="">Select Status</option>
                                            <option value="rent">For Rent</option>
                                            <option value="buy">For Sell</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Lowest Price</label>
                                    <div class="col-sm-3">
                                        <input type="text" name="lowest_price" class="form-control">
                                    </div>
                                    <label class="col-sm-3 col-form-label">Highest Price</label>
                                    <div class="col-sm-3">
                                        <input type="text" name="max_price" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Bedrooms</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="bedrooms" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Bathrooms</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="bathrooms" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Garage</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="garage" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Garage Size</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="garage_size" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Proprty Size</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="proprty_size" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Address</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="address" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">City</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="city" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">State</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="state" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Neighborhood</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="neighborhood" class="form-control" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Agent</label>
                                    <div class="col-sm-9">
                                        <select name="agent" class="form-select"
                                            id="exampleFormControlSelect1">
                                            <option selected="" disabled="">Select Status</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Short Description</label>
                                    <div class="col-sm-9">
                                        <textarea name="short_descp" class="form-control" id="exampleFormControlTextarea" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Long Description</label>
                                    <div class="col-sm-9">
                                        <textarea name="long_descp" class="form-control" name="tinymce" id="tinymceExample" rows="10"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Main Images</label>
                                    <div class="col-sm-9">
                                        <input class="col-sm-9 form-control" type="file" name="multi_img[]" id="multiImg" multiple="">
                                    </div>
                                    <div class="row" id="preview_img"> </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mb-2 ms-auto">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
