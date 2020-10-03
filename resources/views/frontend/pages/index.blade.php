@php
$pageName = 'pages';
@endphp
@extends('frontend.layouts.app')

@section('title'){{ $page->seo_title }}@endsection
@section('meta_description'){{ $page->seo_description }}@endsection
@section('meta_keywords'){{ $page->seo_keyword }}@endsection

@section('content')
 <!--================Banner Area =================-->
 <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{!! $page->title !!}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<section class="pageContent">

<div class="container">
    <div class="section-box">
    <div class="row">
        <div class="col-md-12">
            <h2>{!! $page->title !!} </h2>
            <!-- <p>Get to know us</p> -->
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
        {!! $page->description !!} 
        </div>
    </div>
</div>
</div>
</section>

@endsection