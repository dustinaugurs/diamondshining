@php
$pageName = 'home';
@endphp
@extends('frontend.layouts.app')

@section('content')
   <!--================Slider Area =================-->
       @include('frontend.includes.slider')
        <!--================Footer Area =================-->
        @include('frontend.includes.footer')
        <!--================End Footer Area =================-->
@endsection