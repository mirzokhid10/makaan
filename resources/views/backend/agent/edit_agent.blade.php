@extends('admin.admin_dashboard')
@section('admin')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Agent Registration Page</h4>
                <form method="post" action="{{ route('update.agent') }}"
                enctype="multipart/form-data" class="form-sample" id="myForm">
                <input type="hidden" name="id" value="{{ $editAgents->id }}">
                <input type="hidden" name="agentImageId" value="{{ $editAgents->agent_id }}">
                <input type="hidden" name="prevAgentImage" value="{{ $editAgents->agent_photo }}" >
                @csrf
                    <p class="card-description">
                        Personal info
                    </p>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Username</label>
                                <div class="col-sm-9">
                                    <input type="text" name="agent_username"
                                    class="form-control" value="{{$editAgents->agent_username}}" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">First Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="agent_name"
                                    class="form-control" value="{{$editAgents->agent_name}}" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" name="agent_email"
                                    class="form-control" value="{{$editAgents->agent_email}}" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Facebook Url</label>
                                <div class="col-sm-9">
                                    <input type="text" name="agent_facebookurl"
                                    class="form-control" value="{{$editAgents->agent_facebookurl}}"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Twitter Url</label>
                                <div class="col-sm-9">
                                    <input type="text" name="agent_twitterurl"
                                    class="form-control" value="{{$editAgents->agent_twitterurl}}"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Instagram Url</label>
                                <div class="col-sm-9">
                                    <input type="text" name="agent_instagramurl"
                                    class="form-control" value="{{$editAgents->agent_instagramurl}}"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Phone</label>
                                <div class="col-sm-9">
                                    <input type="text" name="agent_phone"
                                    class="form-control" value="{{$editAgents->agent_phone}}" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Address</label>
                                <div class="col-sm-9">
                                    <input type="address" name="agent_address"
                                     class="form-control" value="{{$editAgents->agent_address}}" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-4">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" name="agent_status" class="form-check-input"
                                            id="membershipRadios1" value="active" checked>
                                            Active
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" name="agent_status" class="form-check-input"
                                            id="membershipRadios2" value="disactive">
                                            Disactive
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Description</label>
                                <div class="col-sm-9">
                                    <textarea name="agent_description" class="form-control"
                                    id="tinymceExample" rows="10">{!! $editAgents->agent_description !!}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Current Image</th>
                                            <th>Image Uploaded</th>
                                            <th>Select Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <img src="{{ asset($editAgents->agent_photo) }}" style="width:60px; height:60px;">
                                            </td>
                                            <td>
                                                <img src="<?= !empty($imageSrc) ? $imageSrc : ''; ?>" id="agent_image"
                                                alt="<?= !empty($imageSrc) ? '' : 'Not uploaded image yet'; ?>">
                                            </td>
                                            <td>
                                                <input type="file" name="agent_photo" class="form-control"
                                                    onChange="mainThamUrl(this)">
                                            </td>
                                            <td>
                                                <button type="submit" class="btn btn-primary px-4">Save Details</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function mainThamUrl(input){
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#agent_image').attr('src',e.target.result).width(60).height(60);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    <script>
        $(document).ready(function() {
            $('#agent_image').on('change', function() { //on file input change
                if (window.File && window.FileReader && window.FileList && window
                    .Blob) //check File API supported browser
                {
                    var data = $(this)[0].files; //this file data

                    $.each(data, function(index, file) { //loop though each file
                        if (/(\.|\/)(gif|jpe?g|png|webp)$/i.test(file
                            .type)) { //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function(file) { //trigger function on successful read
                                return function(e) {
                                    var img = $('<img/>').addClass('thumb').attr('src',
                                            e.target.result).width(60)
                                        .height(50); //create image element
                                    $('#preview_img').append(
                                    img); //append image to output element
                                };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });
                } else {
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });
        });
    </script>
@endsection
