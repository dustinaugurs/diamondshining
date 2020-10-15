 <!-- Start Header Area -->
    <header class="header-area header-wide">
        <!-- mobile header start -->
        <!-- mobile header start -->
        <div class="mobile-header headermobile d-md-block sticky">
            <!--mobile header top start -->
            <div class="container-fluid">

                <div class="row align-items-center">
                       
                         
                        <div class="col-sm-5 col-4">
                            <div class="mobile-logo">
                                <a href="{{url('/')}}">
                                    <img src="{{url('/')}}/public/assets/img/logo/logo-light.svg" alt="Brand Logo" class="white_logo">
                                    <img src="{{url('/')}}/public/assets/img/logo/logo-black.svg" alt="Brand Logo" class="black_logo">
                                </a>
                            </div>
                          </div>    
                         
                         <div class="col-sm-4 col-2 diamondheading">
                         @if($pageName=='ourproduct' || $pageName=='searchproduct')
                        <!--<h1> {{ trans('frontend.menu.ourproduct') }} </h1>-->
                         @endif
                         </div>
                             
                          <div class="col-sm-2 col-4">
                            <div class="header-top-settings">
                            <ul class="nav align-items-center justify-content-end">
                                @if($logged_in_user)
                                    <li class="curreny-wrap">
                                    <form id="currencyform3" class="changecurrencybox"  method="POST" action="{{url('account/mycurrency')}}">
                                    {{ csrf_field() }}
                                    @php
                                    $langs = ['USD'=>'$', 'EUR'=>'€', 'GBP'=>'£',];
                                     @endphp
                                     
                                    <select name="currency_code" id="changecurrency" style="display:none;">
                                    <option selected value="{{Auth::user()->currency_code}}">{{Auth::user()->currency_symbol}} {{Auth::user()->currency_code}}</option>

                                    @foreach($langs as $key => $value)
                                    @if($key !== Auth::user()->currency_code)
                                    <option value="{{$key}}">{{$value}} {{$key}}</option>
                                    @endif
                                    @endforeach
                                    </select>
                                    </form>

                                    </li> @endif

                                </ul>
                                </div>
                                </div>
                            
                           <div class="col-sm-1 col-2">
                           <div class="mobile-main-header mobileMenu">
                            <div class="mobile-menu-toggler">
                                <button class="mobile-menu-btn">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </button>
                            </div>
                            </div>
                            </div>

                    </div>

            </div>

            <!-- mobile header top start -->

        </div>

        <!-- mobile header end -->

        <!-- mobile header end -->

        <!-- offcanvas mobile menu start -->

        <!-- off-canvas menu start -->

        <aside class="off-canvas-wrapper">
            <div class="off-canvas-overlay"></div>
            <div class="off-canvas-inner-content">
                <div class="btn-close-off-canvas">
                    <i class="pe-7s-close"></i>
                </div>
                <div class="off-canvas-inner frontusersection">
                @if($logged_in_user)
                    <div class="frontuser"> <!---start-user---->
                  <span>
                      <a href="#"><i class="fa fa-user-o" aria-hidden="true"></i> </a>
                 </span>
                 <span>
                <strong class=""> 
                    {{Auth::user()->first_name}} {{Auth::user()->last_name}}
                </strong>
                 </span>
                 </div>
                 @endif 
                 <!--End-User---->
                                      
                    <!-- start-mobile-menu -->
<ul>
<li> <a href="{{url('/')}}">home</a></li>
@if($logged_in_user) 
<li> <a href="{{url('account')}}" class="">{{ trans('frontend.menu.Edit Profile') }}</a></li>
@endif
<li> <a href="{{url('pages')}}/about-us" class="active">{{ trans('frontend.menu.aboutus') }}</a></li>
@if($logged_in_user) 
<li> <a href="{{url('our-products')}}" class="">{{ trans('frontend.menu.ourproduct') }}</a></li>
<li> <a href="{{url('enquiry-order')}}" class=""> {{ trans('frontend.menu.enqorder') }}</a></li> 
@endif
<li> <a href="{{url('pages')}}/news"  class="">{{ trans('frontend.menu.news') }}</a></li>
<li> <a href="{{url('contact-us')}}" class="">{{ trans('frontend.menu.contactus') }}</a></li>

@if (!$logged_in_user)
<li>{{ link_to_route('frontend.auth.login', trans('navs.frontend.login')) }}</li>
<li>{{ link_to_route('frontend.auth.register', trans('navs.frontend.register')) }}</li>
@else
<li class="logoutuser">{{ link_to_route('frontend.auth.logout', trans('navs.general.logout')) }}</li>
<!-- <li>{{ link_to_route('frontend.user.account', trans('navs.frontend.user.account')) }}</a></li> -->
@endif
</ul>    
                </div>

            </div>

        </aside>

       

        <!-- off-canvas menu end -->

        <!-- offcanvas mobile menu end -->

    </header>

    <!-- end Header Area -->

	