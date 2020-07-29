@if(!empty($products))

@foreach($products as $product)
                                <!-- product single item start -->
                                <div class="col-md-4 col-sm-6">
                                    <!-- product grid start -->
                                    <div class="product-item">
                                        <figure class="product-thumb">
                                            <a href="{{url('product_detail/'.$product->id)}}">
											@if($product->pdf == '' || $product->pdf == 'true' )
                                                <img class="pri-img" src="{{url('assets/img/product/No_image.jpg')}}" alt="product">
                                                <img class="sec-img" src="{{url('assets/img/product/No_image.jpg')}}" alt="product">
											@else
												<img class="pri-img" src="{{$product->pdf}}" alt="product">
                                                <img class="sec-img" src="{{$product->pdf}}" alt="product">	
										    @endif
                                            </a>
                                            <div class="product-badge">
                                               <!-- <div class="product-label new">
                                                    <span>new</span>
                                                </div>-->
                                                <!--<div class="product-label discount">
                                                    <span> {{$product->discount}}</span>
                                                </div> -->
                                            </div>
                                            <div class="button-group">
                                                <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                                <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                                <a href="#" data-toggle="modal" data-target="#quick_view"><span data-toggle="tooltip" data-placement="left" title="" data-original-title="Quick View"><i class="pe-7s-search"></i></span></a>
                                            </div>
                                            <div class="cart-hover">
                                                <button class="btn btn-cart">add to cart</button>
                                            </div>
                                        </figure>
                                        <div class="product-caption text-center">
                                            <div class="product-identity">
                                                <p class="manufacturer-name"><a href="#">{{$product->shape}}  / CUT - {{$product->cut}}</a></p>
                                            </div>
                                          <!--  <ul class="color-categories">
                                                <li>
                                                    <a class="c-lightblue" href="#" title="LightSteelblue"></a>
                                                </li>
                                                <li>
                                                    <a class="c-darktan" href="#" title="Darktan"></a>
                                                </li>
                                                <li>
                                                    <a class="c-grey" href="#" title="Grey"></a>
                                                </li>
                                                <li>
                                                    <a class="c-brown" href="#" title="Brown"></a>
                                                </li>
                                            </ul> -->
                                            <h6 class="product-name">
                                                <a href="#">{{$product->floCol}} Carats - {{$product->carats}}</a>
												<p class="manufacturer-name">
												 <a href="#">Depth -{{$product->depth}}%/Table - {{$product->table}}%</a>
												 </p>
                                            </h6>
                                            <div class="price-box">
                                                <span class="price-regular">{{$current_currency * $product->price}}{{$symbol}}</span>
                                               <!-- <span class="price-old"><del>{{$product->price_per_carat}}</del></span>-->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- product grid end -->

                                    <!-- product list item end -->
                                    <div class="product-list-item">
                                        <figure class="product-thumb">
                                            <a href="#">pdf
                                               @if($product->pdf == '' || $product->pdf == 'true' )
                                                <img class="pri-img" src="{{url('assets/img/product/No_image.jpg')}}" alt="product">
                                                <img class="sec-img" src="{{url('assets/img/product/No_image.jpg')}}" alt="product">
											@else
												<img class="pri-img" src="{{$product->pdf}}" alt="product">
                                                <img class="sec-img" src="{{$product->pdf}}" alt="product">	
										    @endif
                                            </a>
                                            <div class="product-badge">
                                                <div class="product-label new">
                                                    <span>new</span>
                                                </div>
                                                <div class="product-label discount">
                                                    <span>{{$product->discount}}</span>
                                                </div>
                                            </div>
                                            <div class="button-group">
                                                <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                                <a href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                                <a href="#" data-toggle="modal" data-target="#quick_view"><span data-toggle="tooltip" data-placement="left" title="" data-original-title="Quick View"><i class="pe-7s-search"></i></span></a>
                                            </div>
                                            <div class="cart-hover">
                                                <button class="btn btn-cart">add to cart</button>
                                            </div>
                                        </figure>
                                        <div class="product-content-list">
                                            <div class="manufacturer-name">
                                                <a href="#">{{$product->shape}}  / CUT - {{$product->cut}}</a>
                                            </div>
                                            <ul class="color-categories">
                                                <li>
                                                    <a class="c-lightblue" href="#" title="LightSteelblue"></a>
                                                </li>
                                                <li>
                                                    <a class="c-darktan" href="#" title="Darktan"></a>
                                                </li>
                                                <li>
                                                    <a class="c-grey" href="#" title="Grey"></a>
                                                </li>
                                                <li>
                                                    <a class="c-brown" href="#" title="Brown"></a>
                                                </li>
                                            </ul>

                                            <h5 class="product-name"><a href="#">{{$product->shape}} / CUT -{{$product->cut}} </a></h5>
                                            <div class="price-box">
                                                <span class="price-regular">{{$product->price}}</span>
                                                <span class="price-old"><del>{{$product->price_per_carat}}</del></span>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Unde perspiciatis
                                                quod numquam, sit fugiat, deserunt ipsa mollitia sunt quam corporis ullam
                                                rem, accusantium adipisci officia eaque.</p>
                                        </div>
                                    </div>
                                    <!-- product list item end -->
                                </div>
                                <!-- product single item start -->
                             @endforeach
@else
	
<div class="">
NO DATA
  </div>
@endif
							 
							 
							 
		
 <script type="text/javascript">
  //$('.accordion-toggle').click(function(){
  //$('.hiddenRow').hide();
  //$(this).next('tr').find('.hiddenRow').show();
 // });

 $(document).ready(function(){

    $('.accordion-toggle').click(function(e){
    e.stopPropagation();
// $('.hiddenRow').hide();
//     $(this).next('tr').find('.hiddenRow').show();
    let id = $(this).attr('data-target');
    if($(id).is('.show.in')){
        $(id).removeClass('show in')
    }else{
        $(id).addClass('show in')
   }
    

});

})


  
</script>

					 
							 
							 