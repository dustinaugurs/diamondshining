
                                <!-- product single item start -->

<!-------------Start-search-stock--------------------->
<div class="row dkpsearchbox">

<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
<h4 class="certifieddiamond_heading">Certified diamonds</h4>
<h4 class="fancyclrdiamon_heading">Fancy coloured diamonds</h4>
<h4 class="labgrowndiamond_heading">Lab Grown Diamonds</h4>
<h4 class="meleediamond_heading">Melee diamonds</h4>
</div>

<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 totaldimondbox">
<h5><span>Diamond Found:</span> <span><i class="fa fa-diamond" aria-hidden="true"></i></span> 
<span>{{$total_diamond_found}}</span> </h5>
</div>

<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 diamondserachbox">
<form enctype="multipart/form-data" method="get" action="{{url('search-products')}}"> 
<div class="form-group">
  <div class="row">
    <div class="col-sm-8" style="padding-right:0px;">
<input type="text" class="form-control" style="border-radius: 5px 0px 0px 5px;" id="search_stock_number" name="search_stock_number" placeholder="Search Stock Number" required>
</div>
<div class="col-sm-2" style="padding-left:0px; padding-right:0px;">
<button class="searchbtn" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
</div>

<div class="col-sm-2 resetvisibility">
  <a href="{{url('our-products')}}">&times;</a>
</div>
</div>
</div>
</form>
</div>


<div class="col-lg-1 col-md-1 col-sm-1 col-xs-12 dkresetfilter"> 
<button type="button" class="button1 dkreset"><i class="fa fa-refresh"></i><br> Reset Filters</button>
</div>

</div>

<!--------------End-search-stock----------------------->
 
 <table class="table table-bordered" style="border-collapse:collapse;" id="product_data_table">
<thead>
<tr>
    <th>@sortablelink('video')</th>
    <th>@sortablelink('image')</th>
    <th>@sortablelink('shape')</th>
    <th>@sortablelink('lab')</th>
    <th>@sortablelink('carats')</th>
    <th>@sortablelink('col')</th>
    <th>@sortablelink('clar')</th>
    <th>Dimensions</th>
    <th>@sortablelink('cut')</th>
    <th>@sortablelink('pol')</th>
    <th>@sortablelink('symm')</th>
    <th>@sortablelink('flo')</th>
    <th>@sortablelink('price')(Ex. VAT)</th>
    <th>Final Price(inc. VAT)</th>
    <!-- <th>Final Price(inc. VAT)</th> -->
    <th>Ratio(%)</th>
    <th>Enquiry / Order</th>
</tr>
 </thead>
 <tbody>
 
@forelse($products as $product) 
<tr colspan="16" data-toggle="collapse" data-target="#p{{$product->id}}" class="accordion-toggle">               
    <td>@if($product->video == '')
	  <p><img src="http://diamonds.augurstech.com/public/assets/img/product/No_image.jpg" alt="product" class="sec-img img33"></p>
	@else
	 <p>
	     <video width="75" height="75" controls>
  <source src="{{$product->video}}">
</video>
	     
	     </p>
	@endif</td>
    <td>
	@if($product->image == '' || $product->image == 'true' )
	  <p><img src="http://diamonds.augurstech.com/public/assets/img/product/No_image.jpg" alt="product" class="sec-img img33"></p>
	@else
	 <p><img src="{{$product->image}}" alt="product" class="sec-img img33"></p>
	@endif
	</td>
    <td>{{$product->shape}}</td>
    <td>{{$product->lab}}</td>
    <td>{{$product->carats}}</td>
    <td>{{$product->col}}</td>
    <td>{{ $product->clar }}</td>
    <td>
	{{$product->length}} <span>&#215;</span> {{$product->width}} <span>&#215;</span>  {{$product->height}} </td>   
    <td>{{$product->cut}}</td>
    <td>{{$product->pol}}</td>
    <td>{{$product->symm}}</td>
    <td>{{$product->flo}}</td>
  
    <td>
       
        @foreach($multiplier as $mlusd)
 			@if($product->price >= $mlusd->vat_from_usd && $product->price <= $mlusd->vat_to_usd)
       @if($current_currency !== '')

        {{$symbol}} {{number_format(floor(($current_currency * ($product->price*$mlusd->multiplier_usd))*100)/100,2, '.', '')}} 
        @else
        $ {{number_format(floor(($product->price*$mlusd->multiplier_usd)*100)/100,2, '.', '')}}
        @endif
       @endif
       @endforeach
        (Ex. VAT)
    </td>


    <td> <!----mulipliercost---->
    @foreach($multiplier as $mlusd)
 			@if($product->price >= $mlusd->vat_from_usd && $product->price <= $mlusd->vat_to_usd)
       @if($current_currency !== '')
   <?php 
   $finalprice = ($product->price * $mlusd->multiplier_usd)+($product->price * $mlusd->multiplier_usd)*$setting->VAT/100; 
   ?>
    {{$symbol}} {{number_format(floor(($current_currency * ($finalprice))*100)/100,2, '.', '')}} 
    @else
    $ {{number_format(floor(($product->price * $mlusd->multiplier_usd)*100)/100,2, '.', '')}}
    @endif
    @endif
       @endforeach
      
    (Inc. VAT)
    </td>

    <!-- <td>
    @if($current_currency !== '')
        {{$symbol}}{{number_format(floor(($current_currency * (($setting->VAT / 100 ) * $product->price + $product->price))*100)/100,2, '.', '')}}
        @else
        $ {{number_format(floor((($setting->VAT / 100 ) * $product->price + $product->price)*100)/100,2, '.', '')}}
        @endif
         (inc. VAT)
    </td> -->


        <td> {{number_format(floor(($product->length / $product->width)*100)/100,2, '.', '')}} </td>
     
    <td><a href="javascript:void(0);" class="detail-order-btn">Enquiry / Order</a></td>
</tr>

<!--------------------------------------------->
<tr class="p">
    <td colspan="16" class="hiddenRow">
        <div class="accordian-body collapse p-3" id="p{{$product->id}}">

            <div class="row">
    <div class="col">
        <div class="product-img-wrp">

<div class="product-img-tabs">    
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" data-toggle="tab" href="#home11">Image</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#menu1">Video</a>
  </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane imgbox  active container" id="home11">
@if($product->image == '' || $product->image == 'true' )
    <p><img src="http://diamonds.augurstech.com/public/assets/img/product/No_image.jpg" alt="product" class="sec-img">
@else
 <img src="{{$product->image}}" alt="product" class="sec-img"></p>
@endif
</div>
  <div class="tab-pane imgbox container" id="menu1">
@if($product->video == '')
<p>
 <img src="http://diamonds.augurstech.com/public/assets/img/product/No_image.jpg" alt="video" class="sec-img">
@else
<button data-toggle="modal" data-target="#videopopup_{{$product->id}}">
  <video width="200" height="200" controls>
  <source src="{{$product->video}}" >
</video></button></p>
@endif
<!----======start-video-popup===========---->
<div class="modal fade" id="videopopup_{{$product->id}}" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="clsbutton close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div class="videopopupbox">
        <video controls>
  <source src="{{$product->video}}" >
</video>
</div>
        </div>
      </div>
    </div>
  </div>

<!----=======End-video-popup===========-----> 
</div>
</div>
</div>
  <!-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took</p> -->
        </div>
    </div>
    <div class="col tbl22">
	
        <table class="table">
 <tr>
<td><strong>Stock Number:</strong></td>   
<td>{{$product->stock_id}}</td></tr>
 <tr>
<td><strong>Certificate:</strong></td>  
<td><a target="new" href="{{$product->pdf}}">{{$product->lab}}</a></td></tr>
 <tr>
<td><strong>Carat Weight :</strong> </td>  
<td>{{$product->carats}}</td></tr>
 <tr><td><strong>Colour : </strong></td> 
<td>{{$product->col}}</td></tr>
 <tr><td><strong>Clarity :</strong></td> 
<td>{{$product->clar}}</td></tr>
 <tr><td><strong>Cut : </strong></td>  
<td>{{$product->cut}}</td></tr>
 <tr><td><strong>Polish</strong></td>
<td>{{$product->pol}}</td></tr>
 <tr><td><strong>Symmetry</strong></td>
<td>{{$product->symm}}</td></tr>
 <tr><td><strong>Fluo. </strong></td>  
<td>{{$product->flo}}</td></tr>
 <tr><td><strong>Depth %:</strong></td> 
<td> {{$product->depth}}</td></tr>
 <tr><td><strong>Table %:</strong></td>  
<td>{{$product->table}}</td></tr>
 <tr><td><strong>Dimmensions(mm): </strong></td>  
<td>
		{{$product->length}} <span>&#215;</span> {{$product->width}} <span>&#215;</span> {{$product->height}}</td>
<tr>		
<td><strong>Ratio %:</strong></td> 
</tr>
 <tr>
     <td>{{number_format(floor(($product->length / $product->width)*100)/100,2, '.', '')}}</td>
</tr>		
		
</tr>

</table>
</div>

<div class="col">        
<div class="price-wrp"> 
@foreach($multiplier as $mlusd)
 			@if($product->price >= $mlusd->vat_from_usd && $product->price <= $mlusd->vat_to_usd)
       @if($current_currency !== '')

        {{$symbol}} {{number_format(floor(($current_currency * ($product->price*$mlusd->multiplier_usd))*100)/100,2, '.', '')}} 
        @else
        $ {{number_format(floor(($product->price*$mlusd->multiplier_usd)*100)/100,2, '.', '')}}
        @endif
       @endif
       @endforeach
</div>
<div class="price-sub">(EX. VAT)</div>

<div class="order-btn-wrp" onclick="orderPopup({{$product->id}})"><a href="#" data-toggle="modal" data-target="#OrderModal" class="order-btn"> ORDER</a>
<input type="hidden" class="stocknumo_{{$product->id}}" value="{{$product->stock_id}}">
@foreach($multiplier as $mlusd)
 			@if($product->price >= $mlusd->vat_from_usd && $product->price <= $mlusd->vat_to_usd)
  <input type="hidden" class="multiplierUsdo_{{$product->id}}" value="{{$mlusd->multiplier_usd}}">      
	 	  @endif
@endforeach
</div>

<div class="enquire-btn-wrp" onclick="enquiryPopup({{$product->id}})" ><a href="#" data-toggle="modal" data-target="#EnquiryModal" class="enquire-btn"> ENQUIRE </a>
<input type="hidden" class="stocknum_{{$product->id}}" value="{{$product->stock_id}}">
@foreach($multiplier as $mlusd)
 			@if($product->price >= $mlusd->vat_from_usd && $product->price <= $mlusd->vat_to_usd)
  <input type="hidden" class="multiplierUsd_{{$product->id}}" value="{{$mlusd->multiplier_usd}}">      
	 	  @endif
@endforeach
</div>

<div class="copy-btn-wrp" onclick="copyPopup({{$product->id}})" ><a href="#" data-toggle="modal" data-target="#CopyModal" class="enquire-btn"> Copy </a>
<input type="hidden" class="stocknumc_{{$product->id}}" value="{{$product->stock_id}}">
@foreach($multiplier as $mlusd)
 			@if($product->price >= $mlusd->vat_from_usd && $product->price <= $mlusd->vat_to_usd)
  <input type="hidden" class="multiplierUsdc_{{$product->id}}" value="{{$mlusd->multiplier_usd}}">      
	 	  @endif
@endforeach
</div>

</div>

</div>
</div> 
</td> 
</tr> 

@empty
<!----------------------------->

<tr>  
<p>There are no data match !.</p>
</tr>  

@endforelse
<!--------->
<tr>
<td colspan="16">
{!! $products->appends(\Request::except('page'))->render() !!}
</td>
</tr>
<!--------->
</tbody>
</table>              
							 
							 
       
        <!-----------start-Enquiry-Model--------------->
<div class="modal fade" id="EnquiryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm maxwidth650" role="document">
    <div class="modal-content enquiryboxmodel">
      <div class="modal-header">
        <h1><strong>Product Enquiry :</strong> Hi <strong><i>{{Auth::user()->name}}</i></strong> Check Your Details</h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<form method="POST" action="{{url('enquirysend')}}">
             @csrf

             <div class="row">

          <div class="col-md-6 col-sm-6 col-xs-12" style="display:none;">
          <div class="input-group">
          <span class="input-group-addon">Product ID</span>
          <input type="text" id="diamondFeed_id" class="form-control" name="diamondFeed_id" value="" readonly required>
          </div>
          </div>

          <input type="hidden" id="multiplier_usd" class="form-control" name="multiplier_usd" value="">
        
          <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="input-group">
          <span class="input-group-addon">Stock Number</span>
          <input id="stock_number" type="text" name="stock_number" class="form-control" readonly placeholder="Your Stock Number">
          </div>
          </div>

          <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="input-group">
          <span class="input-group-addon">Client</span>
          <input id="client" type="text" name="client" value="{{Auth::user()->name}}" class="form-control" readonly  placeholder="Enter Client">
          </div>
          </div>

          <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="input-group">
          <span class="input-group-addon">Reference</span>
          <input id="reference" type="text" name="reference" class="form-control"  placeholder="Enter Reference">
          </div>
          </div>

          <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="input-group">
          <span class="input-group-addon">Email</span>
          <input id="userEmail" type="email" class="form-control" name="userEmail" value="{{Auth::user()->email}}" placeholder="Enter Your Correct Email Address ">
          </div>
          </div>

             </div>

  <button type="submit" class="btn btn-primary custombtn">Submit</button>
</form>
      </div>
    </div>
  </div>
</div>	 
<!-----------end-Enquiry-Model--------------->


<!-----------start-Order-Model--------------->
<div class="modal fade" id="OrderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm maxwidth650" role="document">
    <div class="modal-content enquiryboxmodel">
      <div class="modal-header">
        <h1><strong>Product Order :</strong> Hi <strong><i>{{Auth::user()->name}}</i></strong> Check Your Details</h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<form method="POST" action="{{url('ordersend')}}">
             @csrf

             <div class="row">

             <div class="col-md-6 col-sm-6 col-xs-12" style="display:none;">
          <div class="input-group">
          <span class="input-group-addon">Product ID</span>
          <input type="text" id="diamondFeed_ido" class="form-control" name="diamondFeed_ido" value="" readonly required>
          </div>
          </div>

          <input type="hidden" id="multiplier_usdo" class="form-control" name="multiplier_usdo" value="">

          <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="input-group">
          <span class="input-group-addon">Stock Number</span>
          <input id="stock_numbero" type="text" name="stock_numbero" class="form-control" readonly placeholder="Your Stock Number">
          </div>
          </div>

          <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="input-group">
          <span class="input-group-addon">Client</span>
          <input id="cliento" type="text" name="cliento" value="{{Auth::user()->name}}" class="form-control" readonly placeholder="Enter Client">
          </div>
          </div>

          <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="input-group">
          <span class="input-group-addon">Reference</span>
          <input id="referenceo" type="text" name="referenceo" class="form-control" placeholder="Enter Reference">
          </div>
          </div>

          <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="input-group">
          <span class="input-group-addon">Email</span>
          <input id="userEmailo" type="email" class="form-control" name="userEmailo" value="{{Auth::user()->email}}" placeholder="Enter Your Correct Email Address ">
          </div>
          </div>

             </div>

  <button type="submit" class="btn btn-primary custombtn">Submit</button>
</form>
      </div>
    </div>
  </div>
</div>	 
<!-----------end-Order-Model--------------->


<!-----------start-Copy-Model--------------->
<div class="modal fade" id="CopyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm maxwidth650" role="document">
    <div class="modal-content enquiryboxmodel">
      <div class="modal-header">
        <h1><strong>Product Detail :</strong> Hi <strong><i>{{Auth::user()->name}}</i></strong> Send to Product Details</h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<form method="POST" action="{{url('copysend')}}">
             @csrf

             <div class="row">

             <div class="col-md-6 col-sm-6 col-xs-12" style="display:none;">
          <div class="input-group">
          <span class="input-group-addon">Product ID</span>
          <input type="text" id="diamondFeed_idc" class="form-control" name="diamondFeed_idc" value="" readonly required>
          </div>
          </div>

          <input type="hidden" id="multiplier_usdc" class="form-control" name="multiplier_usdc" value="">

          <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="input-group">
          <span class="input-group-addon">Stock Number</span>
          <input id="stock_numberc" type="text" name="stock_numberc" class="form-control" readonly placeholder="Your Stock Number">
          </div>
          </div>

          <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="input-group">
          <span class="input-group-addon">Client</span>
          <input id="clientc" type="text" name="clientc" value="{{Auth::user()->name}}" class="form-control" readonly placeholder="Enter Client">
          </div>
          </div>

          <div class="col-md-6 col-sm-6 col-xs-12" style="display:none;">
          <div class="input-group">
          <span class="input-group-addon">Reference</span>
          <input id="referencec" type="text" name="referencec" class="form-control" placeholder="Enter Reference">
          </div>
          </div>

          <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="input-group">
          <span class="input-group-addon">Enter Email Address to Send Product Details </span>
          <input id="userEmailc" type="email" class="form-control" name="userEmailc" value="{{Auth::user()->email}}" placeholder="Enter Your Correct Email Address ">
          </div>
          </div>

             </div>

  <button type="submit" class="btn btn-primary custombtn">Send</button>
</form>
      </div>
    </div>
  </div>
</div>	 
<!-----------end-Copy-Model--------------->

							 
							 
							 