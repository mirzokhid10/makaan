@extends('frontend.frontend_dashboard')

@section('main')
    {{-- Header Start --}}
    @include('frontend.home.header')
    {{-- Header End --}}

    {{-- property --}}
    @include('frontend.home.propertylist')
    {{-- property --}}

    {{-- contactagent --}}
    @include('frontend.home.contactagent')
    {{-- contactagent --}}
@endsection
