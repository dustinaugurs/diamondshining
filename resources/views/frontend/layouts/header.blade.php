 <!-- Start Header Area -->

    <header class="header-area header-wide">

        <!-- main header start -->

        <div class="main-header d-none d-lg-block">

            <!-- header top start -->

            <div class="header-top topheader bdr-bottom">

                <div class="container">

                    <div class="row align-items-center">

                        <div class="col-lg-6">

                            <div class="welcome-message">

                                <p>Welcome to Summers By Diamond Jewellery online store</p>

                            </div>

                        </div>

                        <div class="col-lg-6 text-right">

                            <div class="header-top-settings">

                                <ul class="nav align-items-center justify-content-end">
                                @if($logged_in_user)
                                    <li class="curreny-wrap">
                                    <form id="currencyform" class="changecurrencybox"  method="POST" action="{{url('account/mycurrency')}}">
                                    {{ csrf_field() }}
                                    <select name="currency_code" id="changecurrency">

                                    <option selected value="<?php echo Auth::user()->currency_code; ?>"><?php echo Auth::user()->currency_symbol.' '.Auth::user()->currency_code; ?></option>

                                    <option value="USD">$ USD</option>
                                    <option value="EUR">€ EUR</option>
                                    <option value="GBP">£ GBP</option>
                                    </select>
                                    <!-- <input name="select_date" type="submit" /> -->
                                    </form>

                                        <!-- $ Currency
                                        
                                        <i class="fa fa-angle-down"></i>

                                        <ul class="dropdown-list curreny-list">

                                          <li><a href="{{url('our-products/USD')}}">$ USD</a></li>

                                          <li><a href="{{url('our-products/EUR')}}">€ EURO</a></li>

										  <li><a href="{{url('our-products/GBP')}}">£ GBP</a></li>

                                        

                                        </ul> -->

                                    </li> @endif

                                    <li class="language">

                                        <img src="{{url('assets/img/icon/en.png')}}" alt="flag"> English

                                        <i class="fa fa-angle-down"></i>

                                        <ul class="dropdown-list">

                                            <li><a href="#"><img src="{{url('assets/img/icon/en.png')}}" alt="flag"> english</a></li>

                                            <li><a href="#"><img src="{{url('assets/img/icon/fr.png')}}" alt="flag"> french</a></li>

                                        </ul>

                                    </li>

                                </ul>

								

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!-- header top end -->



            <!-- header middle area start -->

            <div class="header-main-area bottomheader sticky">

                <div class="container">

                    <div class="row align-items-center position-relative">



                        <!-- start logo area -->

                        <div class="col-lg-2 logosection">

                            <div class="logo">

                                <a href="{{url('/')}}">

                                    <img src="{{url('assets/img/logo/logo.png')}}" alt="Brand Logo">

                                </a>

                            </div>

                        </div>

                        <!-- start logo area -->



                        <!-- main menu area start -->
                        <div class="col-lg-8 position-static">
                        <div class="customnavbar">
                         <ul>
                         @if($logged_in_user) <li> <a href="{{url('dashboard')}}" class="active">Dashboard</a></li>@endif
                             <li> <a href="{{url('pages')}}/about-us" class="active">About Us</a></li>
                             @if($logged_in_user) <li> <a href="{{url('our-products')}}" class="">Our Products</a></li>
                             <li> <a href="{{url('enquiry-order')}}" class=""> Enquiries / Orders</a></li> @endif
                             <li> <a href="{{url('pages')}}/news"  class="">News</a></li>
                             <li> <a href="{{url('contact-us')}}" class="">Contact Us</a></li>
                         </ul>
                        </div>
                        </div>
                        <!-- main menu area end -->



                        <!-- mini cart area start -->
                        <div class="col-lg-2">
                            <div class="header-right d-flex align-items-center justify-content-xl-between justify-content-lg-end">
                                <!-- <div class="header-search-container">
                                    <button class="search-trigger d-xl-none d-lg-block"><i class="pe-7s-search"></i></button>
                                    <form class="header-search-box d-lg-none d-xl-block animated jackInTheBox">
                                        <input type="text" placeholder="Search entire store hire" class="header-search-field">
                                        <button class="header-search-btn"><i class="pe-7s-search"></i></button>
                                    </form>
                                </div> -->

                                <div class="header-configure-area">

                                    <ul class="nav justify-content-end">

                                        <li class="user-hover">

                                            <a href="#">

                                                <i class="pe-7s-user"></i>

                                            </a>

                                            <ul class="dropdown-list">

											@if (! $logged_in_user)

                                                <li>{{ link_to_route('frontend.auth.login', trans('navs.frontend.login')) }}</li>

										        <li>{{ link_to_route('frontend.auth.register', trans('navs.frontend.register')) }}</li>

											

											@else

												<li>{{ link_to_route('frontend.auth.logout', trans('navs.general.logout')) }}</li>

											    <li>{{ link_to_route('frontend.user.account', trans('navs.frontend.user.account')) }}</a></li>

											@endif

                                               

                                                </ul>

                                        </li>

                                        <li>

                                            <a href="#">

                                                <i class="pe-7s-like"></i>

                                                <div class="notification">0</div>

                                            </a>

                                        </li>

                                        <li>

                                            <a href="#" class="minicart-btn">

                                                <i class="pe-7s-shopbag"></i>

                                                <div class="notification">2</div>

                                            </a>

                                        </li>

                                    </ul>

                                </div>

                            </div>

                        </div>

                        <!-- mini cart area end -->



                    </div>



                </div>

            </div>

            <!-- header middle area end -->

        </div>

        <!-- main header start -->



        <!-- mobile header start -->

        <!-- mobile header start -->

        <div class="mobile-header headermobile d-lg-none d-md-block sticky">

            <!--mobile header top start -->

            <div class="container-fluid">

                <div class="row align-items-center">

                    <div class="col-12">

                        <div class="mobile-main-header">

                            <div class="mobile-logo">

                                <a href="{{url('/')}}">

                                    <img src="assets/img/logo/logo.png" alt="Brand Logo">

                                </a>

                            </div>

                            <div class="mobile-menu-toggler">

                                <div class="mini-cart-wrap">
                                    <a href="#">
                                        <i class="pe-7s-shopbag"></i>
                                        <div class="notification">0</div>

                                    </a>

                                </div>

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



                <div class="off-canvas-inner">

                    <!-- search box start -->

                    <div class="search-box-offcanvas">

                        <form>

                            <input type="text" placeholder="Search Here...">

                            <button class="search-btn"><i class="pe-7s-search"></i></button>

                        </form>

                    </div>

                    <!-- search box end -->



                    <!-- mobile menu start -->

                 



                    <!-- mobile menu end -->



                   



                    <!-- offcanvas widget area start -->

                    

                    <!-- offcanvas widget area end -->

                </div>

            </div>

        </aside>

        <!-- off-canvas menu end -->

        <!-- offcanvas mobile menu end -->

    </header>

    <!-- end Header Area -->

	