@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">All Types</h4>
                        <a href="{{route('add.type')}}" type="button" class="btn btn-primary">Add Type</a>
                    </div>
                    <div class="table-responsive">
                        @php
                            $id = Auth::user()->id;
                            $profileData = App\Models\User::find($id);
                        @endphp
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>
                                        Admin
                                    </th>
                                    <th>
                                        Type Name
                                    </th>
                                    <th>
                                        Icon Name
                                    </th>
                                    <th>
                                        Amount
                                    </th>
                                    <th>
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($types->isEmpty())
                                    <tr>
                                        <td colspan="6">Data not available</td>
                                    </tr>
                                @else
                                    @foreach($types as $key => $item)
                                    <tr>
                                        <td class="py-1">
                                            <img style="width: 50px; height: 50px"
                                            src="{{ (!empty($profileData->photo)) ?
                                                url('upload/admin_images/'.$profileData->photo) :
                                                url('upload/no_image.jpg') }}" alt="profile" />
                                        </td>
                                        <td>
                                            {{ $item->type_name }}
                                        </td>
                                        <td>
                                            {{ $item->type_icon }}
                                        </td>
                                        <td>
                                            1
                                        </td>
                                        <td>
                                            <a href="{{ route('edit.type',$item->id) }}" class="btn btn-inverse-warning"> Edit </a>
                                            <a href="{{ route('delete.type',$item->id) }}" class="btn btn-inverse-danger" id="delete"> Delete  </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
