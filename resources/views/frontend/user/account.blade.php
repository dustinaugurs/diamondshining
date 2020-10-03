@php
$pageName = 'account';
@endphp
@extends('frontend.layouts.app')

@section('content')
<!--================Banner Area =================-->

 <!-- breadcrumb area start -->
 <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ trans('navs.frontend.user.account') }}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="challange_area">
            <div class="container">

                 <!-- <div class="row">
				 
<a class="btn-primary view-product" href="{{url('our-products')}}" >View Product</a>

                 </div> -->


                <div class="row userprofileupdate signup">

                        <div class="col-lg-12 account-box">
                        <div role="tabpanel">

<!-- Nav tabs -->
<ul class="nav"  id="myTab">
    <li role="presentation" class="active nav-tabs" id="li-profile">
        <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab" class="active nav-link">{{ trans('navs.frontend.user.profile') }}</a>
    </li>

    <li role="presentation" id="li-edit" class="nav-tabs">
        <a href="#edit" aria-controls="edit" role="tab" data-toggle="tab" class="nav-link">{{ trans('labels.frontend.user.profile.update_information') }}</a>
    </li>

    @if ($logged_in_user->canChangePassword())
        <li role="presentation" id="li-password" class="nav-tabs">
            <a href="#password" aria-controls="password" role="tab" data-toggle="tab" class="nav-link">{{ trans('navs.frontend.user.change_password') }}</a>
        </li>
    @endif
</ul>

<div class="tab-content">

    <div role="tabpanel" class="tab-pane mt-30 active" id="profile">
        @include('frontend.user.account.tabs.profile')
    </div><!--tab panel profile-->

    <div role="tabpanel" class="tab-pane" id="edit">
        @include('frontend.user.account.tabs.edit')
    </div><!--tab panel profile-->

    @if ($logged_in_user->canChangePassword())
        <div role="tabpanel" class="tab-pane" id="password">
            @include('frontend.user.account.tabs.change-password')
        </div><!--tab panel change password-->
    @endif

    @include('frontend.user.account.upload-photo-modal')

</div><!--tab content-->

</div><!--tab panel-->
                            </div>

                           

                    </div><!-- row -->
                    </div>
</section>
@endsection

@section('after-scripts')

<script type="text/javascript">
    
$(document).ready(function(){
    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = localStorage.getItem('activeTab');
    if(activeTab){
        $('#myTab a[href="' + activeTab + '"]').tab('show');
    }
});
</script>
@endsection