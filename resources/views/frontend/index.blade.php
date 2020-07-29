@extends('frontend.layouts.app')

@section('content')
   <!--================Slider Area =================-->
   @include('frontend.includes.slider')
        <!--================End Slider Area =================-->

        <!--================Feature Area =================-->
        @include('frontend.includes.feature')
        <!--================End Feature Area =================-->
        <!--================Team People Area =================-->
        @include('frontend.includes.team_people')
        <!--================End Team People Area =================-->
        <!--================Get in Touch Area =================-->
        @include('frontend.includes.get_in_touch')
        <!--================End Get in Touch Area =================-->
        <!--================Footer Area =================-->
        @include('frontend.includes.footer')
        <!--================End Footer Area =================-->
@endsection