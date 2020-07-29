@extends('frontend.layouts.app')

@section('title') Our Product @endsection
  
@section('meta_description')Our product @endsection

@section('meta_keywords') Our Product  @endsection

@section('content')


<body>
   

    <main>


          <!--main-menu-area -->
<section id="tabs" class="project-tab">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <nav>
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#certified-colourless-diamonds" role="tab" aria-controls="nav-home" aria-selected="true">Certified diamonds</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#fancy-coloured-diamonds" role="tab" aria-controls="nav-profile" aria-selected="false">Fancy coloured diamonds</a>
                        
                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#canada-mark-diamonds" role="tab" aria-controls="nav-contact" aria-selected="false">Canada mark diamonds</a>
                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#lab-Grown-Diamonds" role="tab" aria-controls="nav-contact" aria-selected="false">Lab Grown Diamonds</a>
                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#melee-diamonds" role="tab" aria-controls="nav-contact" aria-selected="false">Melee diamonds</a>
                            </div>
                            <div class="text-center col-md-12 m-t-60">
                            <a class="btn-primary btn-new" onclick="myFunction()">Advance Search</a>
                        
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent" style="display: none;">
                            <div class="tab-pane fade show active" id="certified-colourless-diamonds" role="tabpanel" aria-labelledby="nav-home-tab">

                              

<!-- <div class="Search-for-Diamonds">
    <div class="row">        
<div class="col-md-4">    
<label class="checkbox33">View Available
  <input type="checkbox" checked="checked">
  <span class="checkmark"></span>
</label>
</div>
<div class="col-md-4">    
<label class="checkbox33">Quick Ship Diamonds
  <input type="checkbox">
  <span class="checkmark"></span>
</label>
</div>
<div class="col-md-4 text-center"><i class="fa fa-undo" aria-hidden="true"></i> Reset Filters</div>
</div>
</div>
-->
<!-- shape-filter  start -->

    <div class="row gaye-box">        
<div class="col-md-4">
    <h3 class="heading-text">Shape</h3>
    <div class="shape-filter" id="shape_shape_div">
        
            <div class="shape-filter-btn">
             <label class="checkbox33">Round
             <input type="checkbox" value="ROUND" >
             <span class="checkmark"></span>
            </label>
            </div>
            <div class="shape-filter-btn">
             <label class="checkbox33">Princess
             <input type="checkbox" value="PRINCESS" >
             <span class="checkmark"></span>
            </label>
            </div>
            <div class="shape-filter-btn">
             <label class="checkbox33">Emerald
             <input type="checkbox" value="EMERALD" class="shape_checkbox">
             <span class="checkmark"></span>
            </label>
            </div>
            <div class="shape-filter-btn">
             <label class="checkbox33">Asscher
             <input type="checkbox"  value="ASSCHER" class="shape_checkbox">
             <span class="checkmark"></span>
            </label>
            </div>
            <div class="shape-filter-btn">
             <label class="checkbox33">Cushion
             <input type="checkbox" value="Cushion" class="shape_checkbox">
             <span class="checkmark"></span>
            </label>
            </div>
            <div class="shape-filter-btn">
             <label class="checkbox33">Marquise
             <input type="checkbox" value="MARQUISE" class="shape_checkbox">
             <span class="checkmark"></span>
            </label>
            </div>
            
            <div class="shape-filter-btn">
             <label class="checkbox33">Radiant
             <input type="checkbox" value="RADIANT" class="shape_checkbox">
             <span class="checkmark"></span>
            </label>
            </div>
            <div class="shape-filter-btn">
             <label class="checkbox33">Oval
             <input type="checkbox" value="OVAL" class="shape_checkbox">
             <span class="checkmark"></span>
            </label>
            </div>
            <div class="shape-filter-btn">
             <label class="checkbox33">Pear
             <input type="checkbox" value="PEAR" class="shape_checkbox">
             <span class="checkmark"></span>
            </label>
            </div>
            <div class="shape-filter-btn">
             <label class="checkbox33">Heart
             <input type="checkbox" value="HEART" class="shape_checkbox">
             <span class="checkmark"></span>
            </label>
            </div>    
<div class="clear"></div>
    </div>
   <!-- shape-filter  end --> 



</div>



<div class="col-md-4" id="js_carat_filter">
    <h3 class="heading-text">Carat</h3>
    <!-- Price-filter  start -->  
<div class="Carat-filter-container">

<div class="price-range-block">  

    <div class="price-range-box">
        <div class="Min-Price">Min</div><div class="Max-Price">Max</div>
      
<input type="number" min=0 max="9900" oninput="validity.valid||(value='0');" id="min_price1" class="price-range-field Min-Price-in" />
      <input type="number" min=0 max="10000" oninput="validity.valid||(value='10000');" id="max_price1" class="price-range-field Max-Price-in" />
      
      <div class="clear"></div>
    </div>
    <div id="slider-range1" class="price-filter-range" name="rangeInput"></div>
    <button class="price-range-search" id="price-range-submit1">Search</button>
    <div id="searchResults1" class="search-results-block"></div>
</div>

</div>
 <!-- Carat-filter-container  start -->   
</div>

<div class="col-md-4" id="js_price_filter">
   <h3 class="heading-text">Price</h3> <!-- Price-filter  start -->  
<div class="price-filter-container">

  <div class="price-range-block">   

    <div class="price-range-box">
        <div class="Min-Price">Min</div><div class="Max-Price">Max</div>

      <input type="number" min=0 max="9900" oninput="validity.valid||(value='0');" id="min_price" class="price-range-field Min-Price-in" />

      <input type="number" min=0 max="10000" oninput="validity.valid||(value='10000');" id="max_price" class="price-range-field Max-Price-in" />
      <div class="clear"></div>
    </div>
    <div id="slider-range" class="price-filter-range" name="rangeInput"></div>
		<button class="price-range-search" id="price-range-submit">Search</button>
    <div id="searchResults" class="search-results-block"></div>
</div>

</div>
 <!-- price-filter-container  start -->   
</div>
</div>

 <div class="row gaye-box2 ">

<div class="col-md-4 slider-range-color">
    
<h3 class="heading-text">Color <i class="fa fa-info-circle" aria-hidden="true"></i></h3>

<div class="gp-btn-wrp" role="group" >
<button type="button" class="btn gp-btn">D</button>
<button type="button" class="btn gp-btn">E</button>
<button type="button" class="btn gp-btn">F</button>
<button type="button" class="btn gp-btn">G</button>
<button type="button" class="btn gp-btn">H</button>
<button type="button" class="btn gp-btn">I</button>
<button type="button" class="btn gp-btn">J</button>
<button type="button" class="btn gp-btn">K</button>
<button type="button" class="btn gp-btn">L</button>

</div>

</div>


<div class="col-md-4 slider-range-clarity">
    
<h3 class="heading-text">Clarity <i class="fa fa-info-circle" aria-hidden="true"></i></h3>

<div class="gp-btn-wrp" role="group" >
<button type="button" class="btn gp-btn">FL</button>
<button type="button" class="btn gp-btn">IF</button>
<button type="button" class="btn gp-btn">VVSI</button>
<button type="button" class="btn gp-btn">VVS2</button>
<button type="button" class="btn gp-btn">VS1</button>
<button type="button" class="btn gp-btn">VS2</button>
<button type="button" class="btn gp-btn">SI1</button>
<button type="button" class="btn gp-btn">SI2</button>
<button type="button" class="btn gp-btn">I1</button>
</div>

</div>





<div class="col-md-4 slider-range-clarity">
    
<h3 class="heading-text">CERTIFICATE <i class="fa fa-info-circle" aria-hidden="true"></i></h3>

<div class="gp-btn-wrp" role="group" >
<button type="button" class="btn gp-btn">GIA</button>
<button type="button" class="btn gp-btn">HRD</button>
<button type="button" class="btn gp-btn">AGS</button>
<button type="button" class="btn gp-btn">IGI</button>
<button type="button" class="btn gp-btn">EGL USA</button>
<button type="button" class="btn gp-btn">EGL INT.</button>
<button type="button" class="btn gp-btn">GCAL DF</button>
</div>

</div>





</div>




 <div class="row gaye-box2 ">


<div class="col-md-3 slider-range-cut">
    <h3 class="heading-text">Cut <i class="fa fa-info-circle" aria-hidden="true"></i></h3>

   <div class="gp-btn-wrp" role="group" >
<button type="button" class="btn gp-btn">EXCELLENT</button>
<button type="button" class="btn gp-btn">VERY GOOD</button>
<button type="button" class="btn gp-btn">GOOD</button>
<button type="button" class="btn gp-btn">FAIR</button>
</div>




</div>

<div class="col-md-3 slider-range-cut">
    <h3 class="heading-text">Polish <i class="fa fa-info-circle" aria-hidden="true"></i></h3>
    <div class="gp-btn-wrp" role="group" >
<button type="button" class="btn gp-btn">EXCELLENT</button>
<button type="button" class="btn gp-btn">VERY GOOD</button>
<button type="button" class="btn gp-btn">GOOD</button>
<button type="button" class="btn gp-btn">FAIR</button>
</div>




</div>





<div class="col-md-3 slider-range-cut">
    <h3 class="heading-text">Symmetry <i class="fa fa-info-circle" aria-hidden="true"></i></h3>

<div class="gp-btn-wrp" role="group" >
<button type="button" class="btn gp-btn">EXCELLENT</button>
<button type="button" class="btn gp-btn">VERY GOOD</button>
<button type="button" class="btn gp-btn">GOOD</button>
<button type="button" class="btn gp-btn">FAIR</button>
</div>

</div>


<div class="col-md-3 slider-range-cut">
    <h3 class="heading-text">Fluorescence <i class="fa fa-info-circle" aria-hidden="true"></i></h3>

<div class="gp-btn-wrp" role="group" >
<button type="button" class="btn gp-btn">NONE</button> 
<button type="button" class="btn gp-btn">FAINT </button>
<button type="button" class="btn gp-btn">MEDIUM</button> 
<button type="button" class="btn gp-btn">STRONG  </button>
<button type="button" class="btn gp-btn">V.STR.</button>
</div>
</div>

</div>



<div class="row gaye-box">

<div class="col-md-4" id="js_depth_filter">
    <h3 class="heading-text">Depth % <i class="fa fa-info-circle" aria-hidden="true"></i></h3>

    <!-- Price-filter  start -->
<div class="gp-btn-wrp" role="group" >
 <div class="row">
    <div class="col">
      <input type="text" class="form-control icon55" placeholder="0">
    </div>
    <div class="col to-wrp"> To</div>
    <div class="col">
      <input type="text" class="form-control icon55" placeholder="1">
    </div>
  </div>
</div>
 <!-- Carat-filter-container  start -->   
</div>
<div class="col-md-4" id="js_table_filter">
    <h3 class="heading-text">Table % <i class="fa fa-info-circle" aria-hidden="true"></i></h3>
  
    <!-- Price-filter  start -->  
    <div class="gp-btn-wrp" role="group" >
 <div class="row">
    <div class="col">
      <input type="text" class="form-control icon55" placeholder="0">
    </div>
    <div class="col to-wrp"> To</div>
    <div class="col">
      <input type="text" class="form-control icon55" placeholder="1">
    </div>
  </div>
</div>
 
</div> 

<div class="col-md-4">
    <h3 class="heading-text">L/W Ratio <i class="fa fa-info-circle" aria-hidden="true"></i></h3>
 <div class="gp-btn-wrp" role="group" > 
 <div class="row">
    <div class="col">
      <input type="text" class="form-control icon55" placeholder="0">
    </div>
    <div class="col to-wrp"> To</div>
    <div class="col">
      <input type="text" class="form-control icon55" placeholder="1">
    </div>
  </div>
 
</div>
</div>


</div>



</div>
                            


                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- page main wrapper start -->
      <div class="container">
<div class="row">               

                    <!-- shop main wrapper start -->
                    <div class="col-lg-12 order-1">
                        <div class="shop-product-wrapper">
                            <!-- shop product top wrap start -->
                            <!-- <div class="shop-top-bar">
                                <div class="row align-items-center">
                                    <div class="col-lg-7 col-md-6 order-2 order-md-1">
                                        <div class="top-bar-left">
                                            <div class="product-view-mode">
                                                <a href="#" class="active" data-target="grid-view" data-toggle="tooltip" title="" data-original-title="Grid View"><i class="fa fa-th"></i></a>
                                                <a href="#" data-target="list-view" data-toggle="tooltip" title="" data-original-title="List View"><i class="fa fa-list"></i></a>
                                            </div>
                                            <div class="product-amount">
                                                <p>Showing 1–15 of 21 results</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-6 order-1 order-md-2">
                                        <div class="top-bar-right">
                                            <div class="product-short">
                                                <p>Sort By : </p>
                                                <select class="nice-select" name="sortby" style="display: none;">
                                                    <option value="trending">Relevance</option>
                                                    <option value="sales">Name (A - Z)</option>
                                                    <option value="sales">Name (Z - A)</option>
                                                    <option value="rating">Price (Low &gt; High)</option>
                                                    <option value="date">Rating (Lowest)</option>
                                                    <option value="price-asc">Model (A - Z)</option>
                                                    <option value="price-asc">Model (Z - A)</option>
                                                </select><div class="nice-select" tabindex="0"><span class="current">Relevance</span><ul class="list"><li data-value="trending" class="option selected">Relevance</li><li data-value="sales" class="option">Name (A - Z)</li><li data-value="sales" class="option">Name (Z - A)</li><li data-value="rating" class="option">Price (Low &gt; High)</li><li data-value="date" class="option">Rating (Lowest)</li><li data-value="price-asc" class="option">Model (A - Z)</li><li data-value="price-asc" class="option">Model (Z - A)</li></ul></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <!-- shop product top wrap start -->

                            <!-- product item list wrapper start -->
                            <div class="shop-product-wrap grid-view row mbn-30">
                                <!-- product single item start -->
								  <!-- product item list wrapper start -->
                            <div class="shop-product-wrap grid-view row mbn-30" id="product_div">
								@include('frontend.pages.component.product_component')
							
                            </div>
                            <!-- product item list wrapper end -->

                            <!-- start pagination area -->
                            <!--   <div class="paginatoin-area text-center">
                                <ul class="pagination-box">
									<?php // echo $products->render(); ?>
                                </ul>
                            </div>-->
                          
                           
                        </div>
                    </div>
                    <!-- shop main wrapper end -->
                </div>
              </div>

               
    </main>

    <!-- Scroll to top start -->
    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div>
    <!-- Scroll to Top End -->


    <!-- Quick view modal start -->
    <div class="modal" id="quick_view">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <!-- product details inner end -->
                    <div class="product-details-inner">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="product-large-slider">
                                    <div class="pro-large-img img-zoom">
                                        <img src="assets/img/product/product-details-img1.jpg" alt="product-details" />
                                    </div>
                                    <div class="pro-large-img img-zoom">
                                        <img src="assets/img/product/product-details-img2.jpg" alt="product-details" />
                                    </div>
                                    <div class="pro-large-img img-zoom">
                                        <img src="assets/img/product/product-details-img3.jpg" alt="product-details" />
                                    </div>
                                    <div class="pro-large-img img-zoom">
                                        <img src="assets/img/product/product-details-img4.jpg" alt="product-details" />
                                    </div>
                                    <div class="pro-large-img img-zoom">
                                        <img src="assets/img/product/product-details-img5.jpg" alt="product-details" />
                                    </div>
                                </div>
                                <div class="pro-nav slick-row-10 slick-arrow-style">
                                    <div class="pro-nav-thumb">
                                        <img src="assets/img/product/product-details-img1.jpg" alt="product-details" />
                                    </div>
                                    <div class="pro-nav-thumb">
                                        <img src="assets/img/product/product-details-img2.jpg" alt="product-details" />
                                    </div>
                                    <div class="pro-nav-thumb">
                                        <img src="assets/img/product/product-details-img3.jpg" alt="product-details" />
                                    </div>
                                    <div class="pro-nav-thumb">
                                        <img src="assets/img/product/product-details-img4.jpg" alt="product-details" />
                                    </div>
                                    <div class="pro-nav-thumb">
                                        <img src="assets/img/product/product-details-img5.jpg" alt="product-details" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="product-details-des">
                                    <div class="manufacturer-name">
                                        <a href="#">HasTech</a>
                                    </div>
                                    <h3 class="product-name">Handmade Golden Necklace</h3>
                                    <div class="ratings d-flex">
                                        <span><i class="fa fa-star-o"></i></span>
                                        <span><i class="fa fa-star-o"></i></span>
                                        <span><i class="fa fa-star-o"></i></span>
                                        <span><i class="fa fa-star-o"></i></span>
                                        <span><i class="fa fa-star-o"></i></span>
                                        <div class="pro-review">
                                            <span>1 Reviews</span>
                                        </div>
                                    </div>
                                    <div class="price-box">
                                        <span class="price-regular">$70.00</span>
                                        <span class="price-old"><del>$90.00</del></span>
                                    </div>
                                    <h5 class="offer-text"><strong>Hurry up</strong>! offer ends in:</h5>
                                    <div class="product-countdown" data-countdown="2022/02/20"></div>
                                    <div class="availability">
                                        <i class="fa fa-check-circle"></i>
                                        <span>200 in stock</span>
                                    </div>
                                    <p class="pro-desc">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
                                        eirmod tempor invidunt ut labore et dolore magna.</p>
                                    <div class="quantity-cart-box d-flex align-items-center">
                                        <h6 class="option-title">qty:</h6>
                                        <div class="quantity">
                                            <div class="pro-qty"><input type="text" value="1"></div>
                                        </div>
                                        <div class="action_link">
                                            <a class="btn btn-cart2" href="#">Add to cart</a>
                                        </div>
                                    </div>
                                    <div class="useful-links">
                                        <a href="#" data-toggle="tooltip" title="Compare"><i
                                            class="pe-7s-refresh-2"></i>compare</a>
                                        <a href="#" data-toggle="tooltip" title="Wishlist"><i
                                            class="pe-7s-like"></i>wishlist</a>
                                    </div>
                                    <div class="like-icon">
                                        <a class="facebook" href="#"><i class="fa fa-facebook"></i>like</a>
                                        <a class="twitter" href="#"><i class="fa fa-twitter"></i>tweet</a>
                                        <a class="pinterest" href="#"><i class="fa fa-pinterest"></i>save</a>
                                        <a class="google" href="#"><i class="fa fa-google-plus"></i>share</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- product details inner end -->
                </div>
            </div>
        </div>
    </div>
    <!-- Quick view modal end -->
	

    <!-- offcanvas mini cart start -->
    <div class="offcanvas-minicart-wrapper">
        <div class="minicart-inner">
            <div class="offcanvas-overlay"></div>
            <div class="minicart-inner-content">
                <div class="minicart-close">
                    <i class="pe-7s-close"></i>
                </div>
                <div class="minicart-content-box">
                    <div class="minicart-item-wrapper">
                        <ul>
                            <li class="minicart-item">
                                <div class="minicart-thumb">
                                    <a href="#">
                                        <img src="assets/img/cart/cart-1.jpg" alt="product">
                                    </a>
                                </div>
                                <div class="minicart-content">
                                    <h3 class="product-name">
                                        <a href="#">Dozen White Botanical Linen Dinner Napkins</a>
                                    </h3>
                                    <p>
                                        <span class="cart-quantity">1 <strong>&times;</strong></span>
                                        <span class="cart-price">$100.00</span>
                                    </p>
                                </div>
                                <button class="minicart-remove"><i class="pe-7s-close"></i></button>
                            </li>
                            <li class="minicart-item">
                                <div class="minicart-thumb">
                                    <a href="#">
                                        <img src="assets/img/cart/cart-2.jpg" alt="product">
                                    </a>
                                </div>
                                <div class="minicart-content">
                                    <h3 class="product-name">
                                        <a href="#">Dozen White Botanical Linen Dinner Napkins</a>
                                    </h3>
                                    <p>
                                        <span class="cart-quantity">1 <strong>&times;</strong></span>
                                        <span class="cart-price">$80.00</span>
                                    </p>
                                </div>
                                <button class="minicart-remove"><i class="pe-7s-close"></i></button>
                            </li>
                        </ul>
                    </div>

                    <div class="minicart-pricing-box">
                        <ul>
                            <li>
                                <span>sub-total</span>
                                <span><strong>$300.00</strong></span>
                            </li>
                            <li>
                                <span>Eco Tax (-2.00)</span>
                                <span><strong>$10.00</strong></span>
                            </li>
                            <li>
                                <span>VAT (20%)</span>
                                <span><strong>$60.00</strong></span>
                            </li>
                            <li class="total">
                                <span>total</span>
                                <span><strong>$370.00</strong></span>
                            </li>
                        </ul>
                    </div>

                    <div class="minicart-button">
                        <a href="#"><i class="fa fa-shopping-cart"></i> View Cart</a>
                        <a href="#"><i class="fa fa-share"></i> Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- offcanvas mini cart end -->

 
 <!-- Modernizer JS -->
	 {!! Html::script('assets/js/vendor/modernizr-3.6.0.min.js') !!}
    <!-- jQuery JS -->
	{!! Html::script('assets/js/vendor/jquery-3.3.1.min.js') !!}
    <!-- Popper JS -->
	{!! Html::script('assets/js/vendor/popper.min.js') !!}
    <!-- Bootstrap JS -->
	{!! Html::script('assets/js/vendor/bootstrap.min.js') !!}
    <!-- slick Slider JS -->
	{!! Html::script('assets/js/plugins/slick.min.js') !!}
    <!-- Countdown JS -->
	{!! Html::script('assets/js/plugins/countdown.min.js') !!}
    <!-- Nice Select JS -->
	{!! Html::script('assets/js/plugins/nice-select.min.js') !!}
    <!-- jquery UI JS -->
	{!! Html::script('assets/js/plugins/jqueryui.min.js') !!}
    <!-- Image zoom JS -->
	{!! Html::script('assets/js/plugins/image-zoom.min.js') !!}
    <!-- Imagesloaded JS -->
	{!! Html::script('assets/js/plugins/imagesloaded.pkgd.min.js') !!}
    <!-- Instagram feed JS -->
	{!! Html::script('assets/js/plugins/instagramfeed.min.js') !!}
    <!-- mailchimp active js -->
	{!! Html::script('assets/js/plugins/ajaxchimp.js') !!}
    <!-- contact form dynamic js -->
	{!! Html::script('assets/js/plugins/ajax-mail.js') !!}
    <!-- google map api -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfmCVTjRI007pC1Yk2o2d_EhgkjTsFVN8"></script>
    <!-- google map active js -->
	{!! Html::script('assets/js/plugins/google-map.js') !!}
    <!-- Main JS -->
	{!! Html::script('assets/js/main.js') !!}
<!-- shape-filter  start -->
{!! Html::script('assets/js/price_range_script.js') !!}		
<script>
function myFunction() {
  var x = document.getElementById("nav-tabContent");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}
</script>

    <script type="text/javascript">
$(function() {

  // Initiate Slider
  $('#slider-range-cut,#slider-range-color,#slider-range-clarity').slider({
    range: true,
    min: 10000,
    max: 110000,
    step: 100,
    values: [45000, 75000]
  });

  // Move the range wrapper into the generated divs
  $('.ui-slider-range').append($('.range-wrapper'));

  // Apply initial values to the range container
  $('.range').html('<span class="range-value"><sup>$</sup>' + $('#slider-range').slider("values", 0).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + '</span><span class="range-divider"></span><span class="range-value"><sup>$</sup>' + $("#slider-range").slider("values", 1).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + '</span>');

  // Show the gears on press of the handles
  $('.ui-slider-handle, .ui-slider-range').on('mousedown', function() {
    $('.gear-large').addClass('active');
  });

  // Hide the gears when the mouse is released
  // Done on document just incase the user hovers off of the handle
  $(document).on('mouseup', function() {
    if ($('.gear-large').hasClass('active')) {
      $('.gear-large').removeClass('active');
    }
  });

  // Rotate the gears
  var gearOneAngle = 0,
    gearTwoAngle = 0,
    rangeWidth = $('.ui-slider-range').css('width');

  $('.gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
  $('.gear-two').css('transform', 'rotate(' + gearTwoAngle + 'deg)');

  $('#slider-range,#slider-range').slider({
    slide: function(event, ui) {

      // Update the range container values upon sliding

      $('.range').html('<span class="range-value"><sup>$</sup>' + ui.values[0].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + '</span><span class="range-divider"></span><span class="range-value"><sup>$</sup>' + ui.values[1].toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") + '</span>');

      // Get old value
      var previousVal = parseInt($(this).data('value'));

      // Save new value
      $(this).data({
        'value': parseInt(ui.value)
      });

      // Figure out which handle is being used
      if (ui.values[0] == ui.value) {

        // Left handle
        if (previousVal > parseInt(ui.value)) {
          // value decreased
          gearOneAngle -= 7;
          $('.gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        } else {
          // value increased
          gearOneAngle += 7;
          $('.gear-one').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        }

      } else {

        // Right handle
        if (previousVal > parseInt(ui.value)) {
          // value decreased
          gearOneAngle -= 7;
          $('.gear-two').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        } else {
			
          // value increased
          gearOneAngle += 7;
          $('.gear-two').css('transform', 'rotate(' + gearOneAngle + 'deg)');
        }

      }
      if (ui.values[1] === 110000) {
        if (!$('.range-alert').hasClass('active')) {
          $('.range-alert').addClass('active');
        }
      } else {
        if ($('.range-alert').hasClass('active')) {
          $('.range-alert').removeClass('active');
      }
        }
    }
  });

  // Prevent the range container from moving the slider
  $('.range, .range-alert').on('mousedown', function(event) {
    event.stopPropagation();
  });

});

    </script>

 <script type="text/javascript">
	function get_product(shape_arr,max_price,min_price , max_price1 , min_price1 ,min_price2,max_price2,min_price3,max_price3,cut_div_val ){
		//console.log(shape_arr);
	$.ajax({
            url: "/ajax_get_products",
            type: "GET",        
            data: {shape_arr:shape_arr ,max_price:max_price,min_price:min_price 
			,max_price1:max_price1,min_price1:min_price1 ,min_price2:min_price2 ,max_price2:max_price2 ,min_price3:min_price3 , max_price3:max_price3,cut_div_val:cut_div_val },
            success: function(data){
				//alert(data)
               $("#product_div").html(data); 
            }	,
            error: function(xhr, error){
               //alert(show);
			   }
        });
	}	
	$(document).ready(function(e) {
		     var shape_arr = [];
       $(document).on('click','.shape-filter-btn',function(e){
		
		   $("#shape_shape_div .shape-filter-btn").each(function() {
			   if($(this).find('input').is(':checked')){
			    var shape_name = $(this).find('input').val();
				shape_arr.push(shape_name);	
			   }
		   });
		   get_product(shape_arr);
		   //console.log(input_type);
	   });
	   $(document).on('click','#slider-range',function(e){
		   var price_range  = $("#js_price_filter");
			min_price = price_range.children().find('#min_price').val();
			max_price = price_range.children().find('#max_price').val();
			 get_product(shape_arr,max_price , min_price);
			console.log(shape_arr,max_price,min_price);
	   });
	    max_price='';
		min_price='';
		
	    $(document).on('click','#slider-range1',function(e){
		   var price_range  = $("#js_carat_filter");
			min_price1 = price_range.children().find('#min_price1').val();
			max_price1 = price_range.children().find('#max_price1').val();
			 get_product(shape_arr,max_price , min_price , max_price1 , min_price1);
			console.log(shape_arr,max_price,min_price, max_price1 , min_price1);
	   });
	    max_price1='';
		min_price1='';
	    $(document).on('click','#slider-range2',function(e){
			//alert(scdscd)
		   var price_range  = $("#js_depth_filter");
			min_price2 = price_range.children().find('#min_price2').val();
			max_price2 = price_range.children().find('#max_price2').val();
			 get_product(shape_arr,max_price , min_price , max_price1 , min_price1 ,min_price2 , max_price2);
			console.log(shape_arr,max_price,min_price, max_price1 , min_price1);
	   });
	    max_price2='';
		min_price2='';
	    $(document).on('click','#slider-range3',function(e){
		   var price_range  = $("#js_table_filter");
			min_price3 = price_range.children().find('#min_price3').val();
			max_price3 = price_range.children().find('#max_price3').val();
			 get_product(shape_arr,max_price , min_price , max_price1 , min_price1,min_price2 , max_price2 ,min_price3 , max_price3);
			console.log(shape_arr,max_price,min_price, max_price1 , min_price1);
	   });
	   
	   max_price3='';
		min_price3='';
	    $(document).on('click','.div_cut',function(e){
		   var cut_div  = $(this);
			var cut_div_val = cut_div.data('divvalue');
			console.log(cut_div_val);
			 get_product(shape_arr,max_price , min_price , max_price1 , min_price1,min_price2 , max_price2 ,min_price3 , max_price3 , cut_div_val);
			
	   });
	   
	});
	
	
  </script>

</body>

@endsection
        