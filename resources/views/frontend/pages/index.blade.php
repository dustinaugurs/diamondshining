@extends('frontend.layouts.app')

@section('title'){{ $page->seo_title }}@endsection
@section('meta_description'){{ $page->seo_description }}@endsection
@section('meta_keywords'){{ $page->seo_keyword }}@endsection

@section('content')
 <!--================Banner Area =================-->
 <section class="banner_area">
            <div class="container">
                <div class="banner_inner_text">
                    <h2>{!! $page->title !!} </h2>
                    <p>Get to know us</p>
                </div>
            </div>
        </section>
        <!--================End Banner Area =================-->
        <!--================Challange Area =================-->
        <section class="challange_area p_100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-10">
                     {!! $page->description !!} 
                     </div>
                     </div>
            </div>
        </section>
@endsection