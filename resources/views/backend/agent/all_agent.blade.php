@extends('admin.admin_dashboard')
@section('admin')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title">Agents Table</h4>
                    <a href="{{ route('add.agent') }}" type="button" class="btn btn-primary">Add Agent</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>
                                    Agent Image
                                </th>
                                <th>
                                    First Name
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Phone Number
                                </th>
                                <th>
                                    Stratus
                                </th>
                                <th>
                                    Social Networks
                                </th>
                                <th>
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($agents as $key => $agent)
                                <tr>
                                    <td class="text-start align-middle">
                                        <img src="{{ asset($agent->agent_photo) }}"
                                        style="width:70px; height:60px;">
                                    </td>
                                    <td>
                                        {{ $agent->agent_name }}
                                    </td>
                                    <td>
                                        {{ $agent->agent_email }}
                                    </td>
                                    <td>
                                        {{ $agent->agent_phone }}
                                    </td>
                                    <td>
                                        {{ $agent->agent_status }}
                                    </td>
                                    <td>
                                        <a href="{{$agent->agent_facebookurl}}" class="btn btn-social-icon btn-facebook btn-rounded"
                                            style="padding:12px;"><i class="mdi mdi-facebook" target="_blank"></i></a>
                                        <a href="{{$agent->agent_twitterurl}}" class="btn btn-social-icon btn-twitter btn-rounded"
                                            style="padding:12px;"><i class="mdi mdi-twitter" target="_blank"></i></a>
                                        <a href="{{$agent->agent_instagramurl}}" class="btn btn-social-icon btn-linkedin btn-rounded"
                                            style="padding:12px;"><i class="mdi mdi-linkedin" target="_blank"></i></a>
                                    </td>
                                    <td>
                                        <a href="{{route('edit.agent', $agent->id)}}" class="btn btn-inverse-primary"> Edit </a>
                                        <a href="{{route('delete.agent', $agent->id)}}" class="btn btn-inverse-danger"id="delete"> Delete </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
