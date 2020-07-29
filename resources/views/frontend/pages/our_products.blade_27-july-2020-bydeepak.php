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
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#certified-colourless-diamonds" role="tab" aria-controls="nav-home" aria-selected="true" onclick="myFunction()">Certified diamonds</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#fancy-coloured-diamonds" role="tab" aria-controls="nav-profile" aria-selected="false">Fancy coloured diamonds</a>
                        
                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#canada-mark-diamonds" role="tab" aria-controls="nav-contact" aria-selected="false">Canada mark diamonds</a>
                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#lab-Grown-Diamonds" role="tab" aria-controls="nav-contact" aria-selected="false">Lab Grown Diamonds</a>
                                <a class="nav-item nav-link hide55" id="nav-contact-tab" data-toggle="tab" href="#melee-diamonds" role="tab" aria-controls="nav-contact" aria-selected="false">Melee diamonds</a>
                            </div>
                          </nav>

                     
<!---deepak-filterbox------>
<div class="Search-for-Diamonds-wrp"  id="Search-for-Diamonds-wrp">
    
<!-- shape-filter  start -->
<div id="shortFilterBox"> <!--start-dkp-div------>

<div class="row gaye-box">        
<div class="col-md-4">
    <h3 class="heading-text">Shape</h3>
    <div class="shape-filter" id="shape_shape_div">
        
            <div class="shape-filter-btn">
             <label class="checkbox33">Round
             <input type="checkbox" value="ROUND" >
             <span class="checkmark Round-icon"></span>
            </label>
            </div>

            <div class="shape-filter-btn">
             <label class="checkbox33">Princess
             <input type="checkbox" value="PRINCESS" >
             <span class="checkmark Princess-icon"></span>
            </label>
            </div>

            <div class="shape-filter-btn">
             <label class="checkbox33">Emerald
             <input type="checkbox" value="EMERALD" class="shape_checkbox">
             <span class="checkmark Emerald-icon"></span>
            </label>
            </div>

            <div class="shape-filter-btn">
             <label class="checkbox33">Asscher
             <input type="checkbox"  value="ASSCHER" class="shape_checkbox">
             <span class="checkmark Asscher-icon"></span>
            </label>
            </div>

            <div class="shape-filter-btn">
             <label class="checkbox33">Cushion
             <input type="checkbox" value="Cushion" class="shape_checkbox">
             <span class="checkmark Cushion-icon"></span>
            </label>
            </div>

            <div class="shape-filter-btn">
             <label class="checkbox33">Marquise
             <input type="checkbox" value="MARQUISE" class="shape_checkbox">
             <span class="checkmark Marquise-icon"></span>
            </label>
            </div>
            
            <div class="shape-filter-btn">
             <label class="checkbox33">Radiant
             <input type="checkbox" value="RADIANT" class="shape_checkbox">
             <span class="checkmark Radiant-icon"></span>
            </label>
            </div>

            <div class="shape-filter-btn">
             <label class="checkbox33">Oval
             <input type="checkbox" value="OVAL" class="shape_checkbox">
             <span class="checkmark Oval-icon"></span>
            </label>
            </div>

            <div class="shape-filter-btn">
             <label class="checkbox33">Pear
             <input type="checkbox" value="PEAR" class="shape_checkbox">
             <span class="checkmark Pear-icon"></span>
            </label>
            </div>

            <div class="shape-filter-btn">
             <label class="checkbox33">Heart
             <input type="checkbox" value="HEART" class="shape_checkbox">
             <span class="checkmark Heart-icon"></span>
            </label>
            </div>    
    </div>
   <!-- shape-filter  end --> 

</div>



<div class="col-md-4" id="js_carat_filter">
    <h3 class="heading-text">Carat</h3>
    <!-- Price-filter  start -->  
<div class="Carat-filter-container">

<div class="price-range-block">  

    <div class="price-range-box ">
        <div class="Min-Price">Min</div><div class="Max-Price">Max</div>
      
      <input type="number" step="any" readonly  oninput="validity.valid||(value='0');" id="min_price1" class="price-range-field Min-Price-in" />
      <input type="number" step="any" readonly  max="15.00" oninput="validity.valid||(value='15.00');" id="max_price1" class="price-range-field Max-Price-in" />
      
      <div class="clear"></div>
    </div>
    <div id="slider-range1" class="price-filter-range caratzz-slider"  name="rangeInput"></div>
   <!-- <button class="price-range-search" id="price-range-submit1">Search</button>-->
    <div id="searchResults1" class="search-results-block"></div>
<!-- <div class="clear"></div> -->
    <!-- <button class="search-btn">Search</button> -->
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

      <input type="number" readonly step="any" min=0 max="9900" oninput="validity.valid||(value='0');" id="min_price" class="price-range-field Min-Price-in" />

      <input type="number"  readonly step="any" min=0 max="10000" oninput="validity.valid||(value='10000');" id="max_price" class="price-range-field Max-Price-in" />
      <div class="clear"></div>
    </div>
    <div id="slider-range" class="price-filter-range" name="rangeInput"></div>
        <button class="price-range-search" id="price-range-submit">Search</button>
    <div id="searchResults" class="search-results-block"></div>

    <div class="clear"></div>
   <!--  <button class="search-btn">Search</button> -->
</div>

</div>
 <!-- price-filter-container  start -->   
</div>
</div>

</div> <!--end-dkp-div------>

<div id="showAdvanceFilterBox">
 <div class="row gaye-box2">

<div class="col-md-4 slider-range-color">
    
<h3 class="heading-text">Color</h3>

<div class="gp-btn-wrp" role="group">
<button type="button" data-divvalue="D"  class="btn gp-btn div_color">D</button>
<button type="button" data-divvalue="E"  class="btn gp-btn div_color">E</button>
<button type="button" data-divvalue="F"  class="btn gp-btn div_color">F</button>
<button type="button" data-divvalue="G"  class="btn gp-btn div_color">G</button>
<button type="button" data-divvalue="H"  class="btn gp-btn div_color">H</button>
<button type="button" data-divvalue="I"  class="btn gp-btn div_color">I</button>
<button type="button" data-divvalue="J"  class="btn gp-btn div_color">J</button>
<button type="button" data-divvalue="K"  class="btn gp-btn div_color">K</button>
<button type="button" data-divvalue="L"  class="btn gp-btn div_color">L</button>
</div>

</div>


<div class="col-md-4 slider-range-clarity">
    
<h3 class="heading-text">Clarity</h3>

<div class="gp-btn-wrp" role="group">
<button type="button" data-divvalue="FL" class="btn gp-btn div_cla">FL</button>
<button type="button" data-divvalue="IF" class="btn gp-btn div_cla">IF</button>
<button type="button" data-divvalue="VVS1" class="btn gp-btn div_cla">VVS1</button>
<button type="button" data-divvalue="VVS2" class="btn gp-btn  div_cla">VVS2</button>
<button type="button" data-divvalue="VS1" class="btn gp-btn div_cla">VS1</button>
<button type="button" data-divvalue="VS2" class="btn gp-btn  div_cla">VS2</button>
<button type="button" data-divvalue="SI1" class="btn gp-btn div_cla">SI1</button>
<button type="button" data-divvalue="SI2" class="btn gp-btn div_cla">SI2</button>
</div>

</div>





<div class="col-md-4 slider-range-clarity">
    
<h3 class="heading-text">Certificate</h3>

<div class="gp-btn-wrp" role="group">
<button type="button" data-divvalue="GIA"  class="btn gp-btn div_certi">GIA</button>
<button type="button" data-divvalue="HRD"  class="btn gp-btn div_certi">HRD</button>
<button type="button" data-divvalue="IGI"  class="btn gp-btn div_certi">IGI</button>
<button type="button" data-divvalue="EGL"  class="btn gp-btn div_certi">EGL</button>
</div>
</div>
</div>

<div class="row gaye-box2 ">
<div class="col-md-3 slider-range-cut">
    <h3 class="heading-text">Cut</h3>
<div class="gp-btn-wrp" role="group"  id="cut_filter" >
<button type="button" data-divvalue="EX" class="btn gp-btn div_cut">EXCELLENT</button>
<button type="button" data-divvalue="VG"  class="btn gp-btn div_cut">VERY GOOD</button>
<button type="button" data-divvalue="GD" class="btn gp-btn div_cut">GOOD</button>
<button type="button" data-divvalue="F"  class="btn gp-btn div_cut">FAIR</button>
</div>
</div>

<div class="col-md-3 slider-range-cut">
    <h3 class="heading-text">Polish</h3>
    <div class="gp-btn-wrp" role="group" >
<button type="button" data-divvalue="EX" class="btn gp-btn div_pol">EXCELLENT</button>
<button type="button" data-divvalue="VG"  class="btn gp-btn div_pol">VERY GOOD</button>
<button type="button" data-divvalue="GD" class="btn gp-btn div_pol">GOOD</button>
<button type="button" data-divvalue="F"  class="btn gp-btn div_pol">FAIR</button>
</div>




</div>





<div class="col-md-3 slider-range-cut">
    <h3 class="heading-text">Symmetry </h3>

<div class="gp-btn-wrp" role="group" >
<button type="button" data-divvalue="EX" class="btn gp-btn div_sym">EXCELLENT</button>
<button type="button" data-divvalue="VG"  class="btn gp-btn div_sym">VERY GOOD</button>
<button type="button" data-divvalue="GD" class="btn gp-btn div_sym">GOOD</button>
<button type="button" data-divvalue="F"  class="btn gp-btn div_sym">FAIR</button>
</div>

</div>


<div class="col-md-3 slider-range-cut">
    <h3 class="heading-text">Fluorescence</h3>

<div class="gp-btn-wrp" role="group" >
<button type="button" data-divvalue="NON"  class="btn gp-btn div_flo">NONE</button> 
<button type="button" data-divvalue="FNT"  class="btn gp-btn div_flo">FAINT </button>
<button type="button" data-divvalue="MED" class="btn gp-btn div_flo">MEDIUM</button> 
<button type="button" data-divvalue="STG" class="btn gp-btn div_flo">STRONG  </button>
<button type="button" data-divvalue="STG" class="btn gp-btn div_flo">V.STR.</button>
</div>
</div>

</div>



<div class="row gaye-box">

<div class="col-md-4" id="js_depth_filter">
    <h3 class="heading-text">Depth % </h3>

    <!-- Price-filter  start -->
<div class="gp-btn-wrp" role="group" >
 <div class="row">
    <div class="col">
      <input type="text" id="min_depth" class="form-control icon55" placeholder="0">
    </div>
    <div class="col to-wrp"> To</div>
    <div class="col">
      <input type="text" id="max_depth" class="form-control icon55" placeholder="1">
    </div>
</div>
    <div class="clear"></div>
     <button class="search-btn" id="depth_search">Search</button>
  
</div>
 <!-- Carat-filter-container  start -->   
</div>
<div class="col-md-4" id="js_table_filter">
    <h3 class="heading-text">Table % </h3>
  
    <!-- Price-filter  start -->  
    <div class="gp-btn-wrp" role="group" >
 <div class="row">
    <div class="col">
      <input type="text" id="min_table" class="form-control icon55" placeholder="0">
    </div>
    <div class="col to-wrp"> To</div>
    <div class="col">
      <input type="text" id="max_table" class="form-control icon55" placeholder="1">
    </div>
</div>
    <div class="clear"></div>
     <button class="search-btn" id="table_search">Search</button>
  
</div>
 
</div> 

<div class="col-md-4" id="js_ratio_filter">
    <h3 class="heading-text">L/W Ratio</h3>
 <div class="gp-btn-wrp" role="group" > 
 <div class="row">
    <div class="col">
      <input type="text" id="min_ratio" class="form-control icon55" placeholder="0">
    </div>
    <div class="col to-wrp"> To</div>
    <div class="col">
      <input type="text" id="max_ratio" class="form-control icon55" placeholder="1">
    </div>
</div>
    <div class="clear"></div>
     <button class="search-btn" id="ratio_search">Search</button>
  
 
</div>
</div>


</div>

</div>

<!-----deepak------->
<div class="col-md-12 dkFilterbox">
<div class="row">

<div class="col-md-4 col-sm-4 col-xs-12 dkfilter">
<button class="btn-primary dkf showFilter"><span><i class="fa fa-chevron-down" aria-hidden="true"></i></span>  Show Filters</button>
<button class="btn-primary dkf hideFilter"><span><i class="fa fa-chevron-up" aria-hidden="true"></i></span>  Hide Filters</button>
</div>

<div class="col-md-4 col-sm-4 col-xs-12 dkadvancefilter">
<button class="btn-primary dkaf showAfilter"><span><i class="fa fa-chevron-down" aria-hidden="true"></i></span>  Advance Filters</button>

<button class="btn-primary dkaf hideAfilter"><span><i class="fa fa-chevron-up" aria-hidden="true"></i></span>  Advance Filters</button>

</div>

<div class="col-md-4 col-sm-4 col-xs-12 dkresetfilter"> 
<button type="button" class="button1 dkreset"> Reset Filters <i class="fa fa-refresh"></i></button>
</div>

</div>
</div> 
<!------------>


<!-- Search-for-Diamonds-wrp -->

<div class="tab-content" id="nav-tabContent" >

<div class="tab-pane fade show active" id="certified-colourless-diamonds" role="tabpanel" aria-labelledby="nav-home-tab"> 

<!-----deepak------>
<div class="row dkpsearchbox">

<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
<h4>Certified diamonds</h4>
</div>

<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 totaldimondbox">
<h5><span>Diamond Found:</span> <span><i class="fa fa-diamond" aria-hidden="true"></i></span> 
<span>{{$total_diamond_found}}</span> </h5>
</div>

<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 diamondserachbox">
<form enctype="multipart/form-data" method="post" action="{{url('search-products')}}"> 
{{ csrf_field() }} 
<div class="form-group">
  <div class="row">
    <div class="col-sm-8" style="padding-right:0px;">
<input type="text" class="form-control" style="border-radius: 5px 0px 0px 5px;" id="search_stock_number" name="search_stock_number" placeholder="Search Stock Number" required>
</div>
<div class="col-sm-2" style="padding-left:0px; padding-right:0px;">
<button class="searchbtn" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
</div>

<div class="col-sm-2" style="visibility:hidden">
<button class="resetbtn" type="reset">&times;</button>
</div>

</div>
</div>
</form>
</div>

</div>
<!------------->


<div class="col-lg-12 table-accordion-wrp">
    <div  class="text-center loader" style="display: none">
     <div class="spinner-border text-primary" role="status">
  <span class="sr-only">Loading...</span>
</div>
</div>
<div class="table-responsive" id="product_div">
                                
 

@include('frontend.pages.component.product_component')
</div>
</div> 


</div>


<!-- Fancy coloured diamonds -->

<div class="tab-pane fade" id="fancy-coloured-diamonds" role="tabpanel" aria-labelledby="nav-profile-tab">
<h4>Fancy coloured diamonds</h4>


<div class="col-lg-12 table-accordion-wrp">
     <div  class="text-center loader" style="display: none">
     <div class="spinner-border text-primary" role="status">
  <span class="sr-only">Loading...</span>
</div>
</div>
    
<div class="table-responsive" id="product_div">


@include('frontend.pages.component.product_component')
</div>
</div> 


</div>

<!-- Fancy coloured diamonds -->
<div class="tab-pane fade" id="canada-mark-diamonds" role="tabpanel" aria-labelledby="nav-contact-tab">
<h4>Canada mark diamonds</h4>

<div class="col-lg-12 table-accordion-wrp">
     <div  class="text-center loader" style="display: none">
     <div class="spinner-border text-primary" role="status">
  <span class="sr-only">Loading...</span>
</div>
</div>
<div class="table-responsive" id="product_div">

@include('frontend.pages.component.product_component1')
</div>
</div> 

 
</div>

<!-- canada-mark-diamonds -->

<div class="tab-pane fade" id="lab-Grown-Diamonds" role="tabpanel" aria-labelledby="nav-contact-tab">
<h4>Lab Grown Diamonds</h4>

<div class="col-lg-12 table-accordion-wrp">
    
<div class="table-responsive" id="product_div">
 <div  class="text-center loader" style="display: none">
     <div class="spinner-border text-primary" role="status">
  <span class="sr-only">Loading...</span>
</div>
</div>
@include('frontend.pages.component.product_component')
</div>
</div> 


 
</div>

<!-- lab-Grown-Diamonds -->

<div class="tab-pane fade" id="melee-diamonds" role="tabpanel" aria-labelledby="nav-contact-tab">
 <h4>Melee diamonds</h4>

 <div class="col-lg-12 table-accordion-wrp">
     <div  class="text-center loader" style="display: none">
     <div class="spinner-border text-primary" role="status">
  <span class="sr-only">Loading...</span>
</div>
</div>
    
<div class="table-responsive" id="product_div4">
@include('frontend.pages.component.product_component')
</div>
</div> 

 </div>

<!-- melee-diamonds -->

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- page main wrapper start -->

           
    </main>

    <!-- Scroll to top start -->
    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div>
    <!-- Scroll to Top End -->





<script>
function myFunction() {
  var x = document.getElementById("Search-for-Diamonds-wrp");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
  $(".hide55").click(function(){
  $("Search-for-Diamonds").hide();
});
}
//===================
// $('.hideFilter').hide();
// $("#Search-for-Diamonds-wrp").slideDown();
$(document).ready(function(){
  $(".showFilter").click(function(){
    $(this).hide();
    $('.hideFilter').show();
    $('.showAfilter').show();
    $("#shortFilterBox").slideDown(700);
  });
  $(".hideFilter").click(function(){
    $(this).hide();
    $('.showFilter').show();
    $('.hideAfilter, .showAfilter').hide();
    $("#shortFilterBox").slideUp(700);
  });
 //-----------------
 $(".showAfilter").click(function(){
    $(this).hide();
    $('.hideFilter').hide();
    $('.hideAfilter').show();
    $("#showAdvanceFilterBox").slideDown(700);
  });
  $(".hideAfilter").click(function(){
    $(this).hide();
    $('.hideFilter').show();
    $('.showAfilter').show();
    $("#showAdvanceFilterBox").slideUp(700);
  });
  //=======
  $('.resetbtn').click(function(){
    location.reload();
  });

  
$(document).on('click', '#nav-tab.nav.nav-tabs > a', function(){
   var href = $(this).attr('href');
    if('#melee-diamonds' ==  href){
            // $('.btn-primary.btn-new2').hide();
            // $('.Search-for-Diamonds-wrp').hide();
            $("#shortFilterBox").hide();
            $("#showAdvanceFilterBox").hide();
            $(".showFilter, .hideFilter, .dkreset, .showAfilter, .hideAfilter").hide();
    } 
    else{
        // $('.btn-primary.btn-new2').show();
        //  $('.Search-for-Diamonds-wrp').show();
        //  $("#shortFilterBox").show();
        //     $("#showAdvanceFilterBox").show();
            $(".showFilter, .dkreset").show();
    }
})



 //------------------- 
//  $(".gp-btn-wrp button").click(function () {
//       clicked = true;
//       if (clicked) {
//         $(this).toggleClass('active');
//         clicked = true;
//       } else {
//         $(this).removeClass('active');
//         clicked = false;
//       }
//     });
 //-------------------
  
});
</script>





 <script type="text/javascript">
    shape_arr = [];
        max_price='';
        min_price='';
        max_price1='';
        min_price1='';
        max_depth='';
        min_depth='';
        min_table='';
        max_table='';
        min_ratio='';
        max_ratio='';
        cut_div_val='';
        color_div_val='';
        cla_div_val ='';
        certi_div_val ='';
        pol_div_val ='';
        sym_div_val ='';
        flo_div_val='';
        page='';
        short_data_clarity_asc='';
 
    function get_product(
    shape_arr,max_price,min_price ,
    max_price1 , min_price1 ,min_depth,max_depth,min_table , max_table ,min_ratio ,max_ratio,
    cut_div_val,color_div_val,cla_div_val,certi_div_val,pol_div_val,sym_div_val,flo_div_val, page){
        // console.log("?page="+page);
    $.ajax({
            url: "./ajax_get_products",
            type: "GET",        
            data: {shape_arr:shape_arr ,max_price:max_price,min_price:min_price 
            ,max_price1:max_price1,min_price1:min_price1 ,min_depth:min_depth ,max_depth:max_depth 
            ,min_table:min_table , max_table:max_table ,min_ratio:min_ratio, max_ratio:max_ratio,cut_div_val:cut_div_val 
            ,color_div_val:color_div_val ,cla_div_val:cla_div_val ,certi_div_val:certi_div_val
            ,pol_div_val:pol_div_val ,sym_div_val:sym_div_val,flo_div_val:flo_div_val, short_data_clarity_asc:short_data_clarity_asc},
            beforeSend: function(){
             // Show image container
             $(".loader").show();
             
             $('body #product_div').hide();
            
            },
            success: function(data){
                // alert(data)
              $("#product_div").html(data); 
              // $("#loading").hide();
            } ,
            complete: function (data) {
                // alert();
                $('.loader').hide();
                $('body #product_div').show();
            },
            
            error: function(xhr, error){
               //alert(show);
               }
        });
        
    } 

    //---------deepak-------------
    
    //----------------------- 
  $(window).on('load', function(){
	  $("#slider-range1").slider({
	       
		range: true,
		orientation: "horizontal",
		min: 0.15,
		max: 15.00,
		values: [0.15, 15.00],
		step: 0.01,

		slide: function (event, ui) {
		  if (ui.values[0] == ui.values[1]) {
			  return false;
		  }
		  //console.log(ui, '=====Ele')
		 // alert("yes123");
		  $("#min_price1").val(ui.values[0]);
		  $("#max_price1").val(ui.values[1]);
		  
		  //min_price1 = ui.values[0];
		 // max_price1 = ui.values[1];
		},
		
		change: function (event, ui) {
		  min_price1 = ui.values[0];
		  max_price1 = ui.values[1];
		  //console.log(ui)
		   get_product(shape_arr,max_price , min_price , max_price1 
         , min_price1,min_depth , max_depth ,min_table , max_table ,min_ratio ,max_ratio, cut_div_val , color_div_val , cla_div_val, certi_div_val ,pol_div_val ,sym_div_val, flo_div_val,page);

		},
	  });
	  $("#min_price1").val($("#slider-range1").slider("values", 0));
	  $("#max_price1").val($("#slider-range1").slider("values", 1));
	  
	  

	  $("#slider-range").slider({
		range: true,
		orientation: "horizontal",
		min: 0,
		max: 10000,
		values: [0, 10000],
		step: 100,

		slide: function (event, ui) {
		  if (ui.values[0] == ui.values[1]) {
			  return false;
		  }
		  
		  $("#min_price").val(ui.values[0]);
		  $("#max_price").val(ui.values[1]);
		},
		
		change: function (event, ui) {
		  min_price = ui.values[0];
		  max_price = ui.values[1];
		  //console.log(ui)
		   get_product(shape_arr,max_price , min_price , max_price1 
         , min_price1,min_depth , max_depth ,min_table , max_table ,min_ratio ,max_ratio, cut_div_val , color_div_val , cla_div_val, certi_div_val ,pol_div_val ,sym_div_val, flo_div_val, page);

		},
		
	  });
//alert(hggjkjk)
	  $("#min_price").val($("#slider-range").slider("values", 0));
	  $("#max_price").val($("#slider-range").slider("values", 1));


	});
	
	function return_shape_filter(){
	     var shape_arrrr = [];
	     $("#shape_shape_div .shape-filter-btn").each(function() {
               if($(this).find('input').is(':checked')){
                var shape_name = $(this).find('input').val();
                 shape_arrrr.push(shape_name); 
               }
           });
           return shape_arrrr;
	}
	
	
	
    $(document).ready(function(e) {
      $('.pagination a').click(function(){
          // var page = $(this).attr('href').split('page=')[1];
          // $(location).attr('href', "http://shiningqualities.com/ajax_get_products?page='"+page+"'");
        var page = "2";
        get_product(shape_arr,max_price , min_price , max_price1 
             , min_price1,min_depth , max_depth ,min_table , max_table ,min_ratio ,max_ratio, cut_div_val , color_div_val , cla_div_val, certi_div_val ,pol_div_val ,sym_div_val, flo_div_val,page);
      });
       
       $(document).on('click','.shape-filter-btn input',function(e){
          shape_arr = return_shape_filter();
        // var color = 
        console.log(shape_arr, 'ee' ,max_price , min_price , max_price1 
             , min_price1,min_depth , max_depth ,min_table , max_table ,min_ratio ,max_ratio, cut_div_val , color_div_val , cla_div_val, certi_div_val ,pol_div_val ,sym_div_val,page)
         get_product(shape_arr,max_price , min_price , max_price1 
             , min_price1,min_depth , max_depth ,min_table , max_table ,min_ratio ,max_ratio, cut_div_val , color_div_val , cla_div_val, certi_div_val ,pol_div_val ,sym_div_val,page);
              
            
        });
       $(document).on('click','#slider-range',function(e){
           var price_range  = $("#js_price_filter");
            min_price = price_range.children().find('#min_price').val();
            max_price = price_range.children().find('#max_price').val();
            // get_product(shape_arr,max_price , min_price);
            //console.log(shape_arr,max_price,min_price);
              shape_arr =  return_shape_filter();
             get_product(shape_arr,max_price , min_price , max_price1 
             , min_price1,min_depth , max_depth ,min_table , max_table ,min_ratio ,max_ratio, cut_div_val , color_div_val , cla_div_val, certi_div_val ,pol_div_val ,sym_div_val, flo_div_val,page);
        
       });
    
        
        
        $(document).on('click','#slider-range1',function(e){
           var price_range  = $("#js_carat_filter");
            min_price1 = price_range.children().find('#min_price1').val();
            max_price1 = price_range.children().find('#max_price1').val();
              shape_arr =  return_shape_filter();
             get_product(shape_arr,max_price , min_price , max_price1 
             , min_price1,min_depth , max_depth ,min_table , max_table ,min_ratio ,max_ratio, cut_div_val , color_div_val , cla_div_val, certi_div_val ,pol_div_val ,sym_div_val, flo_div_val,page);
            // get_product(shape_arr,max_price , min_price , max_price1 , min_price1);
            //console.log(shape_arr,max_price,min_price, max_price1 , min_price1);
       });
           $(document).on('click','#depth_search',function(e){
            //alert(scdscd)
           var price_range  = $("#js_depth_filter");
            min_depth = price_range.children().find('#min_depth').val();
            max_depth = price_range.children().find('#max_depth').val();
              shape_arr =  return_shape_filter();
             get_product(shape_arr,max_price , min_price , max_price1 
             , min_price1,min_depth , max_depth ,min_table , max_table ,min_ratio ,max_ratio,cut_div_val , color_div_val , cla_div_val, certi_div_val ,pol_div_val ,sym_div_val, flo_div_val,page);
            // get_product(shape_arr,max_price , min_price , max_price1 , min_price1 ,min_price2 , max_price2);
            //console.log(shape_arr,max_price,min_price, max_price1 , min_price1);
       });
        
        
        $(document).on('click','#table_search',function(e){
           var price_range  = $("#js_table_filter");
            min_table = price_range.children().find('#min_table').val();
            max_table = price_range.children().find('#max_table').val();
              shape_arr =  return_shape_filter();
             get_product(shape_arr,max_price , min_price , max_price1 
             , min_price1,min_depth , max_depth ,min_table , max_table ,min_ratio ,max_ratio, cut_div_val , color_div_val , cla_div_val, certi_div_val ,pol_div_val ,sym_div_val, flo_div_val,page);
            
            // get_product(shape_arr,max_price , min_price , max_price1 , min_price1,min_price2 , max_price2 ,min_price3 , max_price3);
            //console.log(shape_arr,max_price,min_price, max_price1 , min_price1);
       });
       
       
         $(document).on('click','#ratio_search',function(e){
           var price_range  = $("#js_ratio_filter");
            min_ratio = price_range.children().find('#min_ratio').val();
            max_ratio = price_range.children().find('#max_ratio').val();
             shape_arr =  return_shape_filter();
             get_product(shape_arr,max_price , min_price , max_price1 
             , min_price1,min_depth , max_depth ,min_table , max_table ,min_ratio ,max_ratio, cut_div_val , color_div_val , cla_div_val, certi_div_val ,pol_div_val ,sym_div_val, flo_div_val,page);
            
      
             //get_product(shape_arr,max_price , min_price , max_price1 , min_price1,min_price2 , max_price2 ,min_price3 , max_price3 ,min_price4,max_price4);
            //console.log(shape_arr,max_price,min_price, max_price1 , min_price1);
       });
        
        
    
       // cut_div_val ='';
        //color_div_val =''; 
        //cla_div_val ='';
        //certi_div_val='';
        //pol_div_val ='';
        //sym_div_val ='';
        //flo_div_val = '';
        $(document).on('click','.div_cut',function(e){
           var cut_div  = $(this).addClass('div_cut_remove active').removeClass('div_cut');
            var cut_div_val = cut_div.data('divvalue');
            //console.log(cut_div_val);
             shape_arr =  return_shape_filter();
             get_product(shape_arr,max_price , min_price , max_price1 
             , min_price1,min_depth , max_depth ,min_table , max_table ,min_ratio ,max_ratio, cut_div_val , color_div_val , cla_div_val, certi_div_val ,pol_div_val ,sym_div_val, flo_div_val,page);
             cut_div.attr("data-divvalue", "");
             //get_product(shape_arr,max_price , min_price , max_price1 , min_price1,min_price2 , max_price2 ,min_price3 , max_price3,min_price4 ,max_price4, cut_div_val);
            
       });
       //-------deepak---div-cut----------
       $(document).on('click','.div_cut_remove',function(e){
        var cut_div  = $(this).addClass('div_cut').removeClass('div_cut_remove active');
            var cut_div_val = '';
             shape_arr =  return_shape_filter();
             get_product(shape_arr,max_price , min_price , max_price1 
             , min_price1,min_depth , max_depth ,min_table , max_table ,min_ratio ,max_ratio, cut_div_val , color_div_val , cla_div_val, certi_div_val ,pol_div_val ,sym_div_val, flo_div_val,page);
             cut_div.attr("data-divvalue",$(this).text()); 
       });
       //-----------------------------
       
      
        $(document).on('click','.div_color',function(e){
             shape_arr =  return_shape_filter();
           // console.log(shape_arr);
            var color_div  = $(this).addClass('div_color_remove active').removeClass('div_color');
            var color_div_val = color_div.data('divvalue');
             get_product(shape_arr,max_price , min_price , max_price1 
             , min_price1,min_depth , max_depth ,min_table , max_table ,min_ratio ,max_ratio, cut_div_val , color_div_val , cla_div_val, certi_div_val ,pol_div_val ,sym_div_val, flo_div_val,page);
             color_div.attr("data-divvalue", "");
            //console.log('colord '+color_div_val);
            // get_product(shape_arr,max_price , min_price , max_price1 , min_price1,min_price2 , max_price2 ,min_price3 , max_price3,min_price4 ,max_price4, max_price3 , cut_div_val , color_div_val);  
       });
       //-------deepak---div-color----------
       $(document).on('click','.div_color_remove',function(e){
        var color_div  = $(this).addClass('div_color').removeClass('div_color_remove active');
            var color_div_val = '';
             shape_arr =  return_shape_filter();
             get_product(shape_arr,max_price , min_price , max_price1 
             , min_price1,min_depth , max_depth ,min_table , max_table ,min_ratio ,max_ratio, cut_div_val , color_div_val , cla_div_val, certi_div_val ,pol_div_val ,sym_div_val, flo_div_val,page);
             color_div.attr("data-divvalue",$(this).text()); 
       });
       //-----------------------------

       
        $(document).on('click','.div_cla',function(e){
           var cla_div  = $(this).addClass('div_cla_remove active').removeClass('div_cla');
            var cla_div_val = cla_div.data('divvalue');
             shape_arr =  return_shape_filter();
             get_product(shape_arr,max_price , min_price , max_price1 
             , min_price1,min_depth , max_depth ,min_table , max_table ,min_ratio ,max_ratio, cut_div_val , color_div_val , cla_div_val, certi_div_val ,pol_div_val ,sym_div_val, flo_div_val,page);
             cla_div.attr("data-divvalue", "");
            //console.log('clarity '+cla_div_val);
            // get_product(shape_arr,max_price , min_price , max_price1 , min_price1,min_price2 , max_price2 ,min_price3 , max_price3 ,min_price4 ,max_price4, cut_div_val , color_div_val , cla_div_val);
       });
       //---------deepak--------------
       $(document).on('click','.div_cla_remove',function(e){
        var cla_div  = $(this).addClass('div_cla').removeClass('div_cla_remove active');
            var cla_div_val = '';
             shape_arr =  return_shape_filter();
             get_product(shape_arr,max_price , min_price , max_price1 
             , min_price1,min_depth , max_depth ,min_table , max_table ,min_ratio ,max_ratio, cut_div_val , color_div_val , cla_div_val, certi_div_val ,pol_div_val ,sym_div_val, flo_div_val,page);
             cla_div.attr("data-divvalue",$(this).text()); 
       });
       //-----------------------

       //cut_div_val = '';
        $(document).on('click','.div_certi',function(e){
           var certi_div  = $(this).addClass('div_certi_remove active').removeClass('div_certi');
            var certi_div_val = certi_div.data('divvalue');
             shape_arr =  return_shape_filter();
            //console.log(certi_div_val);
            // get_product(shape_arr,max_price , min_price , max_price1 , min_price1,min_price2
            // , max_price2 ,min_price3 , max_price3 ,min_price4 ,max_price4, cut_div_val , color_div_val , cla_div_val, certi_div_val);
             get_product(shape_arr,max_price , min_price , max_price1 
             , min_price1,min_depth , max_depth ,min_table , max_table ,min_ratio ,max_ratio, cut_div_val , color_div_val , cla_div_val, certi_div_val ,pol_div_val ,sym_div_val, flo_div_val,page);
             certi_div.attr("data-divvalue", "");
       });
        //---------deepak----div-certi----------
        $(document).on('click','.div_certi_remove',function(e){
        var certi_div  = $(this).addClass('div_certi').removeClass('div_certi_remove active');
            var certi_div_val = '';
             shape_arr =  return_shape_filter();
             get_product(shape_arr,max_price , min_price , max_price1 
             , min_price1,min_depth , max_depth ,min_table , max_table ,min_ratio ,max_ratio, cut_div_val , color_div_val , cla_div_val, certi_div_val ,pol_div_val ,sym_div_val, flo_div_val,page);
             certi_div.attr("data-divvalue",$(this).text()); 
       });
       //-----------------------
       
        $(document).on('click','.div_pol',function(e){
           var pol_div  = $(this).addClass('div_pol_remove active').removeClass('div_pol');
            var pol_div_val = pol_div.data('divvalue');
            console.log(pol_div_val);
              shape_arr =  return_shape_filter();
            // get_product(shape_arr,max_price , min_price , max_price1 , min_price1,min_price2 , max_price2 
            //,min_price3 , max_price3,min_price4 ,max_price4 , cut_div_val , color_div_val , cla_div_val, certi_div_val , pol_div_val);
             get_product(shape_arr,max_price , min_price , max_price1 
             , min_price1,min_depth , max_depth ,min_table , max_table ,min_ratio ,max_ratio, cut_div_val , color_div_val , cla_div_val, certi_div_val ,pol_div_val ,sym_div_val, flo_div_val,page);
             pol_div.attr("data-divvalue", "");
       });
       //---------deepak----div-pol----------
       $(document).on('click','.div_pol_remove',function(e){
        var pol_div  = $(this).addClass('div_pol').removeClass('div_pol_remove active');
            var pol_div_val = '';
             shape_arr =  return_shape_filter();
             get_product(shape_arr,max_price , min_price , max_price1 
             , min_price1,min_depth , max_depth ,min_table , max_table ,min_ratio ,max_ratio, cut_div_val , color_div_val , cla_div_val, certi_div_val ,pol_div_val ,sym_div_val, flo_div_val,page);
             pol_div.attr("data-divvalue",$(this).text()); 
       });
       //-----------------------
       
        
        $(document).on('click','.div_sym',function(e){
           var sym_div  = $(this).addClass('div_sym_remove active').removeClass('div_sym');
            var sym_div_val = sym_div.data('divvalue');
            //console.log(sym_div_val);
            // get_product(shape_arr,max_price , min_price , max_price1 , 
             //min_price1,min_price2 , max_price2 ,min_price3 , max_price3 ,min_price4 ,max_price4,
             //cut_div_val , color_div_val , cla_div_val, certi_div_val ,pol_div_val ,sym_div_val);
              shape_arr =  return_shape_filter();
              get_product(shape_arr,max_price , min_price , max_price1 
             , min_price1,min_depth , max_depth ,min_table , max_table ,min_ratio ,max_ratio, cut_div_val , color_div_val , cla_div_val, certi_div_val ,pol_div_val ,sym_div_val, flo_div_val,page);
             sym_div.attr("data-divvalue", "");    
       });
       //---------deepak----div-sym----------
       $(document).on('click','.div_sym_remove',function(e){
        var sym_div  = $(this).addClass('div_sym').removeClass('div_sym_remove active');
            var sym_div_val = '';
             shape_arr =  return_shape_filter();
             get_product(shape_arr,max_price , min_price , max_price1 
             , min_price1,min_depth , max_depth ,min_table , max_table ,min_ratio ,max_ratio, cut_div_val , color_div_val , cla_div_val, certi_div_val ,pol_div_val ,sym_div_val, flo_div_val,page); 
             sym_div.attr("data-divvalue",$(this).text()); 
       });
       //-----------------------
       
       
        $(document).on('click','.div_flo',function(e){
           var flo_div  = $(this).addClass('div_flo_remove active').removeClass('div_flo');
            var flo_div_val = flo_div.data('divvalue');
             shape_arr =  return_shape_filter();
        //  console.log(flo_div_val);
        //   get_product(shape_arr,max_price , min_price , max_price1 
            // , min_price1,min_price2 , max_price2 ,min_price3 , max_price3 ,min_price4 ,max_price4, cut_div_val , color_div_val , cla_div_val, certi_div_val ,pol_div_val ,sym_div_val, flo_div_val);
             get_product(shape_arr,max_price , min_price , max_price1 
             , min_price1,min_depth , max_depth ,min_table , max_table ,min_ratio ,max_ratio, cut_div_val , color_div_val , cla_div_val, certi_div_val ,pol_div_val ,sym_div_val, flo_div_val,page);
             flo_div.attr("data-divvalue", "");
             });
        //---------deepak----div-flow----------
       $(document).on('click','.div_flo_remove',function(e){
        var flo_div  = $(this).addClass('div_flo').removeClass('div_flo_remove active');
            var flo_div_val = '';
             shape_arr =  return_shape_filter();
             get_product(shape_arr,max_price , min_price , max_price1 
             , min_price1,min_depth , max_depth ,min_table , max_table ,min_ratio ,max_ratio, cut_div_val , color_div_val , cla_div_val, certi_div_val ,pol_div_val ,sym_div_val, flo_div_val,page);
             flo_div.attr("data-divvalue",$(this).text()); 
       });

       //-----------sorting---------------

       $(document).on('click','.shortby_clarity_asc',function(e){
           var short_data  = $(this);
            var short_data_clarity_asc = short_data.data('divvalue');
            //alert(short_data_val);
             shape_arr =  return_shape_filter();
             get_product(shape_arr,max_price , min_price , max_price1 
             , min_price1,min_depth , max_depth ,min_table , max_table ,min_ratio ,max_ratio, cut_div_val , color_div_val , cla_div_val, certi_div_val ,pol_div_val ,sym_div_val, flo_div_val,page, short_data_clarity_asc);
             short_data.attr("data-divvalue", "desc");
             });
     //------------------------------------------------        
       $(".button1").click(function () { 
          history.go(0); 
          alert('reset all filter'); 
      });  
    //==================  
    
      // $('.stcolor > a').text('Color');
      
      //============ 
    });

  
  </script>

  

</body>

@endsection
        