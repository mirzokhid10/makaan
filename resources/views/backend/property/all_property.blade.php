@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">All Properties</h4>
                        <a href="{{ route('add.property') }}" type="button" class="btn btn-primary">Add Property</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Admin</th>
                                    <th>Property Name</th>
                                    <th>Property Status</th>
                                    <th>City</th>
                                    <th>Status</th>
                                    <th>Amount</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @if ($properties->isEmpty())
                                    <tr>
                                        <td colspan="12">Data not available</td>
                                    </tr>
                                @else --}}
                                @foreach ($properties as $key => $property)
                                    <tr>
                                        <td class="py-1">
                                            <img style="width: 50px; height: 50px"
                                                src="{{ !empty($profileData->photo) ? url('upload/admin_images/' . $profileData->photo) : url('upload/no_image.jpg') }}"
                                                alt="profile" />
                                        </td>
                                        <td>{{ $property->property_name }}</td>
                                        <td>{{ $property->property_status }}</td>
                                        <td>{{ $property->city }}</td>
                                        <td>{{ $property->status }}</td>
                                        <td>{{ $property->lowest_price }}</td>
                                        <td>
                                            <a href="{{ route('edit.property', $property->id) }}"
                                                class="btn btn-inverse-warning"> Edit </a>
                                            <a href="{{ route('delete.property', $property->id) }}"
                                                class="btn btn-inverse-danger" id="delete"> Delete </a>
                                        </td>
                                    </tr>
                                @endforeach
                                {{-- @endif --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
