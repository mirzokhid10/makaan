@extends('frontend.frontend_dashboard')

@section('main')

    {{-- Header Start --}}
    @include('frontend.home.header')
    {{-- Header End --}}

    {{-- Search Start --}}
    @include('frontend.home.search')
    {{-- Search End --}}

    {{-- category --}}
    @include('frontend.home.propertytypes')
    {{-- category --}}

    {{-- perfectproperty --}}
    @include('frontend.home.perfectproperty')
    {{-- perfectproperty --}}

    {{-- property --}}
    @include('frontend.home.propertylist')
    {{-- property --}}

    {{-- contactagent --}}
    @include('frontend.home.contactagent')
    {{-- contactagent --}}

    {{-- property --}}
    @include('frontend.home.propertyagent')
    {{-- property --}}

    {{-- ourclientssay --}}
    @include('frontend.home.ourclientssay')
    {{-- ourclientssay --}}

@endsection

