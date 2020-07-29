
                                <!-- product single item start -->

 
 <table class="table table-bordered" style="border-collapse:collapse;" id="product_data_table">
<thead>
<tr>
    <th class="shortdata">Video 
        <span><i class="fa fa-sort" aria-hidden="true"></i></span>
    </th>
    <th class="shortdata">View <span><i class="fa fa-sort" aria-hidden="true"></i></span></th>
    <th class="shortdata">Shape <span><i class="fa fa-sort" aria-hidden="true"></i></span></th>
     <th class="shortdata">Cert. <span><i class="fa fa-sort" aria-hidden="true"></i></span></th>
    <th class="shortdata">Carat <span><i class="fa fa-sort" aria-hidden="true"></i></span></th>
    <th class="shortdata one">Colour <span><i class="fa fa-sort" aria-hidden="true"></i></span></th>
    <th>Clarity 
    <span class="shortby_clarity_asc" data-divvalue="ASC">
      <i class="fa fa-sort" aria-hidden="true"></i></span>
    </th>
    
    <th class="shortdata">Dimensions <span><i class="fa fa-sort" aria-hidden="true"></i></span></th>
    <th class="shortdata">Cut <span><i class="fa fa-sort" aria-hidden="true"></i></span></th>
    <th class="shortdata">Polish <span><i class="fa fa-sort" aria-hidden="true"></i></span></th>
    <th class="shortdata">Symmetry <span><i class="fa fa-sort" aria-hidden="true"></i></span></th>
    <th class="shortdata">Fluo. <span><i class="fa fa-sort" aria-hidden="true"></i></span></th>
    <th class="shortdata">Total Cost(Ex. VAT) <span><i class="fa fa-sort" aria-hidden="true"></i></span></th>
    <th class="shortdata">Total Cost(inc. VAT) <span><i class="fa fa-sort" aria-hidden="true"></i></span></th>
    <th class="shortdata">Ratio(%) <span><i class="fa fa-sort" aria-hidden="true"></i></span></th>
    <th>Detail / Order</th>
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
  
    <td>{{$product->price}}(Ex. VAT)</td>

    <td>
        {{(20 / 100 ) * $product->price + $product->price}}  (inc. VAT)</td>

        <td> {{number_format(floor(($product->length / $product->width)*100)/100,2, '.', '')}} </td>
     
    <td><a href="javascript:void(0);" class="detail-order-btn">Detail / Order</a></td>
</tr>

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
  <div class="tab-pane active container" id="home11">
@if($product->image == '' || $product->image == 'true' )
    <p><img src="http://diamonds.augurstech.com/public/assets/img/product/No_image.jpg" alt="product" class="sec-img">
@else
 <img src="{{$product->image}}" alt="product" class="sec-img"></p>
@endif
</div>
  <div class="tab-pane container" id="menu1">
@if($product->video == '')
<p>
 <img src="http://diamonds.augurstech.com/public/assets/img/product/No_image.jpg" alt="video" class="sec-img">
@else

  <video width="200" height="200" controls>
  <source src="{{$product->video}}" >
</video></p>
@endif
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
<td>{{$product->lab}}</td></tr>
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
<div class="price-wrp"> {{$product->price}} 
@if($current_currency == '')
{{$current_currency}}
@else
$
@endif</div>
<div class="price-sub">(EX. VAT)</div>
<div class="order-btn-wrp"><a href="#" class="order-btn"> ORDER</a></div>
<div class="enquire-btn-wrp"><a href="#"  data-toggle="modal" data-target="#EnquireModal" class="enquire-btn"> ENQUIRE </a></div>
</div>
</div>
</div> 
</td> 
</tr>  
@empty

<tr>  
<p>There are no data match !.</p>
</tr>  

@endforelse
<!--------->
<tr>
<td colspan="16">
{{ $products->links() }}
</td>
</tr>
<!--------->
</tbody>
</table>              
							 
							 
				<!-- Modal -->
<div class="modal fade" id="EnquireModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<form>
  <div class="form-group">
    <label for="exampleInputEmail1">Enter the Email</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter the Email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

        ...
      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>	 
							 
							 
							 