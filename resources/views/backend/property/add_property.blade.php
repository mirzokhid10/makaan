@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <div class="page-content">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Property</h4>
                    <form method="post" action="{{ route('store.property') }}" id="myForm"
                    enctype="multipart/form-data">
                        @csrf
                        <p class="card-description">Property Info</p>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-sm-3 col-form-label">Property Name</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="property_name" class="form-control @error('property_name') is-invalid @enderror ">
                                        @error('property_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-sm-3 col-form-label">Property Type</label>
                                    <div class="col-sm-12">
                                        <select name="ptype_id" class="form-select" style="padding: 10px; border: 1px solid #f3f3f3;"
                                        id="exampleFormControlSelect1">
                                            <option selected="" disabled="">Select Property Type</option>
                                            @foreach($propertytype as $ptype)
                                            <option value="{{ $ptype->id }}">{{ $ptype->type_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('property_slug')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-sm-3 col-form-label">Property Slug</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="property_slug" class="form-control @error('property_slug') is-invalid @enderror ">
                                        @error('property_slug')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-sm-3 col-form-label">Property Status</label>
                                    <div class="col-sm-12">
                                        <select name="property_status" class="form-select" style="padding: 10px; border: 1px solid #f3f3f3;"
                                            id="exampleFormControlSelect1">
                                            <option selected="" disabled="">Select Status</option>
                                            <option value="Rent">For Rent</option>
                                            <option value="Buy">For Sell</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-sm-3 col-form-label">Lowest Price</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="lowest_price" class="form-control">
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-sm-3 col-form-label">Highest Price</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="max_price" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-sm-3 col-form-label">Bedrooms</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="bedrooms" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-sm-3 col-form-label">Bathrooms</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="bathrooms" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-sm-3 col-form-label">Garage</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="garage" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-sm-3 col-form-label">Garage Size</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="garage_size" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-sm-3 col-form-label">Proprty Size</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="proprty_size" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-sm-3 col-form-label">Address</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="address" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-sm-3 col-form-label">City</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="city" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-sm-3 col-form-label">State</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="state" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="col-sm-3 col-form-label">Neighborhood</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="neighborhood" class="form-control" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="col-sm-3 col-form-label">Agent</label>
                                    <div class="col-sm-12">
                                        <select name="agent" class="form-select" style="padding: 10px; border: 1px solid #f3f3f3;"
                                            id="exampleFormControlSelect1">
                                            <option selected="" disabled="">Select Status</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-3 col-form-label">Short Description</label>
                                    <div class="col-sm-12">
                                        <textarea name="short_descp" class="form-control" id="exampleFormControlTextarea" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-3 col-form-label">Long Description</label>
                                    <div class="col-sm-12">
                                        <textarea name="long_descp" class="form-control" name="tinymce" id="tinymceExample" rows="10"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-3 col-form-label">Main Image</label>
                                    <div class="col-sm-12">
                                        <input type="file" name="property_mainimage" class="form-control" onChange="mainThamUrl(this)" >
                                    </div>
                                    <div class="row" id="mainThmb"> </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-3 col-form-label">Additional Images</label>
                                    <div class="col-sm-12">
                                        <input type="file" name="additional_images[]" class="form-control" id="multiImg" multiple="" >
                                    </div>
                                    <div class="row" id="preview_img"> </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Changes </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function mainThamUrl(input){
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#mainThmb').attr('src',e.target.result).width(80).height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script>

    $(document).ready(function(){
    $('#multiImg').on('change', function(){ //on file input change
        if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
        {
            var data = $(this)[0].files; //this file data

            $.each(data, function(index, file){ //loop though each file
                if(/(\.|\/)(gif|jpe?g|png|webp)$/i.test(file.type)){ //check supported file type
                    var fRead = new FileReader(); //new filereader
                    fRead.onload = (function(file){ //trigger function on successful read
                    return function(e) {
                        var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(100)
                    .height(80); //create image element
                        $('#preview_img').append(img); //append image to output element
                    };
                    })(file);
                    fRead.readAsDataURL(file); //URL representing the file's data.
                }
            });

        }else{
            alert("Your browser doesn't support File API!"); //if File API is absent
        }
    });
    });

    </script>
@endsection
