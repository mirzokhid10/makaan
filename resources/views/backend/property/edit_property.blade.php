@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <div class="page-content">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Property</h4>
                    <form method="post" action="{{ route('update.property') }}" id="myForm"
                    enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $properties->id }}">
                        <p class="card-description">Property Info</p>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-sm-3 col-form-label">Property Name</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="property_name" class="form-control
                                        @error('property_name') is-invalid @enderror "
                                        value="{{$properties->property_name}}">
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
                                            <option value="{{$ptype->id}}"
                                            {{ $ptype->id == $properties->ptype_id ? 'selected' : '' }}>
                                                {{ $ptype->type_name }}
                                            </option>
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
                                        <input type="text" name="property_slug" class="form-control @error('property_slug') is-invalid @enderror"
                                        value="{{$properties->property_slug}} ">
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
                                            <option selected="" disabled="" value="{{$properties->property_status}}">Select Status</option>
                                            <option value="Rent" {{ $properties->property_status == 'Rent' ? 'selected' : '' }} >For Rent</option>
                                            <option value="Buy" {{ $properties->property_status == 'Buy' ? 'selected' : '' }}>For Buy</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-sm-3 col-form-label">Lowest Price</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="lowest_price" class="form-control"
                                        value="{{$properties->lowest_price}}">
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="col-sm-3 col-form-label">Highest Price</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="max_price" class="form-control"
                                        value="{{$properties->max_price}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-sm-3 col-form-label">Bedrooms</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="bedrooms" class="form-control"
                                        value="{{$properties->bedrooms}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-sm-3 col-form-label">Bathrooms</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="bathrooms" class="form-control"
                                        value="{{$properties->bathrooms}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-sm-3 col-form-label">Garage</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="garage" class="form-control"
                                        value="{{$properties->garage}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-sm-3 col-form-label">Garage Size</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="garage_size" class="form-control"
                                        value="{{$properties->garage_size}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-sm-3 col-form-label">Proprty Size</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="proprty_size" class="form-control"
                                        value="{{$properties->proprty_size}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-sm-3 col-form-label">Address</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="address" class="form-control"
                                        value="{{$properties->address}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-sm-3 col-form-label">City</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="city" class="form-control"
                                        value="{{$properties->city}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="col-sm-3 col-form-label">State</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="state" class="form-control"
                                        value="{{$properties->state}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="col-sm-3 col-form-label">Neighborhood</label>
                                    <div class="col-sm-12">
                                        <input type="text" name="neighborhood" class="form-control"
                                        value="{{$properties->neighborhood}}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group ">
                                    <label class="col-sm-3 col-form-label">Agent</label>
                                    <div class="col-sm-12">
                                        <select name="agent" class="form-select" style="padding: 10px; border: 1px solid #f3f3f3;"
                                            id="exampleFormControlSelect1"
                                            value="{{$properties->agent}}">
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
                                        <textarea name="short_descp" class="form-control" id="exampleFormControlTextarea" rows="3"
                                        >{!! $properties->short_descp !!}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-3 col-form-label">Long Description</label>
                                    <div class="col-sm-12">
                                        <textarea name="long_descp" class="form-control" id="tinymceExample" rows="10"
                                        >{!! $properties->long_descp !!}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Changes </button>
                    </form>
                </div>
                {{-- Edit single image section --}}
                <div class="card-body">
                    <h4 class="card-title">Edit Main Image</h4>
                    <form method="post" action="{{ route('update.property.property_mainimage') }}"
                    id="myForm" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="mainImageId" value="{{ $properties->id }}">
                        <input type="hidden" name="oldMainImage" value="{{ $properties->property_mainimage }}" >
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Sl</th>
                                                <th>Current Image</th>
                                                <th>New Image</th>
                                                <th>Change Image </th>
                                                <th>Actions </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ 1 }}</td>
                                                <td class="py-1">
                                                    <img src="{{ asset($properties->property_mainimage) }}" style="width:60px; height:50px;">
                                                </td>
                                                <td>
                                                    <img src="<?= !empty($imageSrc) ? $imageSrc : ''; ?>" id="mainThmb" alt="<?= !empty($imageSrc) ? '' : 'Not uploaded image yet'; ?>">
                                                </td>
                                                <td>
                                                    <input type="file" name="property_mainimage" class="form-control" onChange="mainThamUrl(this)" >
                                                </td>
                                                <td>
                                                    <button type="submit" class="btn btn-primary px-4" >Update Image</button>
                                                    {{-- <a href="{{ route('property.property_mainimage.delete',  $properties->id) }}" class="btn btn-danger" id="delete">Delete </a> --}}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                {{-- Edit single image section --}}

                {{-- Edit multi image section --}}
                <div class="card-body">
                    <h4 class="card-title">Edit Additional Images</h4>
                    <form method="post" action="{{ route('update.property.additional_images') }}" id="myForm" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Sl</th>
                                                <th>Current Image</th>
                                                <th>New Image</th>
                                                <th>Change Image </th>
                                                <th>Actions </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($additional_images as $key => $add_imgs)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td class="py-1">
                                                    <img src="{{ asset($add_imgs->photo_name) }}" alt="image"  style="width:60px; height:50px;">
                                                </td>
                                                <td>
                                                    <img src="" id="additional_images">
                                                </td>
                                                <td>
                                                    <input type="file" class="form-control" name="additional_images[{{ $add_imgs->id }}]">
                                                </td>
                                                <td>
                                                    <input type="submit" class="btn btn-primary px-4" value="Update Image" >
                                                    <a href="{{ route('property.additional_images.delete',$add_imgs->id) }}" class="btn btn-danger" id="delete">Delete </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-4">Save Changes </button>
                    </form>
                </div>
                {{-- Edit multi image section --}}
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function mainThamUrl(input){
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#mainThmb').attr('src',e.target.result).width(60).height(50);
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
                        var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(60)
                    .height(50); //create image element
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
