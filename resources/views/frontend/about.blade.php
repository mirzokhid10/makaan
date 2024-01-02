@extends('frontend.frontend_dashboard')

@section('main')
    {{-- Header Start --}}
    @include('frontend.home.header')
    {{-- Header End --}}

    {{-- perfectproperty --}}
    @include('frontend.home.perfectproperty')
    {{-- perfectproperty --}}

    {{-- contactagent --}}
    @include('frontend.home.contactagent')
    {{-- contactagent --}}

    {{-- property --}}
    @include('frontend.home.propertyagent')
    {{-- property --}}
@endsection
