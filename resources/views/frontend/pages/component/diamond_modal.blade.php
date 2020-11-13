        <!-----------start-Enquiry-Model--------------->
        <div class="modal fade" id="EnquiryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm maxwidth650" role="document">
    <div class="modal-content enquiryboxmodel">
      <div class="modal-header">
        <h1><strong>Product Enquiry :</strong> Hi <strong><i>{{Auth::user()->name}}</i></strong> Please Check Your Details</h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<form id="enquirysubmit" action="javascript:void(0)">
        
             <div class="row">

          <div class="col-md-6 col-sm-6 col-xs-12" style="display:none;">
          <div class="input-group">
          <span class="input-group-addon">Product ID</span>
          <input type="text" id="diamondFeed_id" class="form-control" name="diamondFeed_id" value="" readonly required>
          </div>
          </div>

          <input type="hidden" id="multiplier_usd" class="form-control" name="multiplier_usd" value="">
          
          <input id="p_finalprice" class="pprice" type="hidden" name="p_finalprice" class="form-control" readonly value="">
          <input type="hidden" id="p_vat" class="form-control" name="p_vat" value="">
        
          <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="input-group">
          <span class="input-group-addon">Stock Number</span>
          <input id="stock_number" type="text" name="stock_number" class="form-control" readonly placeholder="Your Stock Number">
          </div>
          </div>

          <div class="col-md-6 col-sm-6 col-xs-12" style="display:none;">
          <div class="input-group finalpricebox">
          <span class="input-group-addon">Sell price ex vat</span>
         
          <input id="c_symbol" class="symb" type="text" name="c_symbol" class="form-control" readonly value="">
          <input type="text" id="p_price_without_vat" class="form-control pprice" name="p_price_without_vat" value="" required>
         
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
          <input id="userEmail" type="email" class="form-control" name="userEmail" value="{{Auth::user()->email}}" placeholder="Enter Your Correct Email Address" required>
          </div>
          </div>

          <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="input-group">
          <span class="input-group-addon">VAT Number</span>
          <input id="vatnumber" type="text" class="form-control" name="vatnumber" value="{{Auth::user()->VATnumber}}" placeholder="Enter Company VAT Number " required readonly>
          </div>
          </div>

           <!------------------------------->
           <div class="col-md-12 col-sm-12 col-xs-12 qaddressradio divhidden">
          <div class="form-group margin0">
          <div class="row">
          <div class="col-sm-4"><label>Check Delivery Address</label></div>
          <div class="col-sm-4">
          <input id="sameaddress" checked type="radio" name="qdeliveryaddress" value="sameAddress" required>
          <span>Same Address</span>
          </div>
          <div class="col-sm-4">
          <input id="otherddress" type="radio" name="qdeliveryaddress" value="otherAddress" required>
          <span> Other Address</span>
          </div>
          </div>
          </div>
          </div>

           <!---start-sameaddress---->
           @php $user = Auth::user(); @endphp
          <div class="divhidden">
            <div class="" id="qsameaddressbox">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <p class="addressheading">Please Check & Update Your Same Address</p>
            </div>

            <div class="col-md-12 col-sm-12 col-xs-12"> <!---start-form-row------>
          <div class="input-group">
          <span class="input-group-addon">Address Line 1 *</span>
          <input id="qaddressline_1" type="text" class="form-control qsamevalidate" name="qaddressline_1" value="{{$user->address_line1}}" placeholder="Enter Address Line 1 *" required>
          </div>
          </div><!---start-form-row------>

          <div class="col-md-12 col-sm-12 col-xs-12"> <!---start-form-row------>
          <div class="input-group">
          <span class="input-group-addon">Address Line 2</span>
          <input id="qaddressline_2" type="text" class="form-control" name="qaddressline_2" value="{{$user->address_line2}}" placeholder="Enter Address Line 2">
          </div>
          </div><!---start-form-row------>

          <div class="col-md-12 col-sm-12 col-xs-12"> <!---start-form-row------>
          <div class="input-group">
          <span class="input-group-addon">Address Line 3</span>
          <input id="qaddressline_3" type="text" class="form-control " name="qaddressline_3" value="{{$user->address_line3}}" placeholder="Enter Address Line 3">
          </div>
          </div><!---start-form-row------>
            <div class="col-md-12">
            <div class="row"> <!---start-mid-row--->
          <div class="col-md-6 col-sm-6 col-xs-12"> <!---start-form-row------>
          <div class="input-group">
          <span class="input-group-addon">City*</span>
          <input id="qcity" type="text" class="form-control qsamevalidate" name="qcity" value="{{$user->city}}" placeholder="Enter City" required>
          </div>
          </div><!---start-form-row------>

          <div class="col-md-6 col-sm-6 col-xs-12"> <!---start-form-row------>
          <div class="input-group">
          <span class="input-group-addon">State*</span>
          <input id="qstate" type="text" class="form-control qsamevalidate" name="qstate" value="{{$user->state}}" placeholder="Enter State" required>
          </div>
          </div><!---start-form-row------>

          <div class="col-md-6 col-sm-6 col-xs-12"> <!---start-form-row------>
          <div class="input-group">
          <span class="input-group-addon">Country*</span>
          <input id="qcountry" type="text" class="form-control qsamevalidate" name="qcountry" value="{{$user->country}}" placeholder="Enter Country" required>
          </div>
          </div><!---start-form-row------>

          <div class="col-md-6 col-sm-6 col-xs-12"> <!---start-form-row------>
          <div class="input-group">
          <span class="input-group-addon">Zip Code*</span>
          <input id="qzip" type="text" class="form-control qsamevalidate" name="qzip" max-length="6" value="{{$user->zip}}" placeholder="Enter Zip Code" onkeypress="return numeric_only(event, this);" required >
          </div>
          </div><!---start-form-row------>
          </div> <!--end-mid-row--->

            </div>
            </div>
           </div>
          <!---end-sameaddress------>

          <!---start-otheraddress---->
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="row" id="qotheraddressbox">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <p class="addressheading">Please Fill Up Your Other Address</p>
            </div>

            <div class="col-md-12 col-sm-12 col-xs-12"> <!---start-form-row------>
          <div class="input-group">
          <span class="input-group-addon">Address Line 1 *</span>
          <input id="qoaddressline_1" type="text" class="form-control qothervalidate" name="qoaddressline_1" value="" placeholder="Enter Address Line 1 *" required>
          </div>
          </div><!---start-form-row------>

          <div class="col-md-12 col-sm-12 col-xs-12"> <!---start-form-row------>
          <div class="input-group">
          <span class="input-group-addon">Address Line 2</span>
          <input id="qoaddressline_2" type="text" class="form-control" name="qoaddressline_2" value="" placeholder="Enter Address Line 2">
          </div>
          </div><!---start-form-row------>

          <div class="col-md-12 col-sm-12 col-xs-12"> <!---start-form-row------>
          <div class="input-group">
          <span class="input-group-addon">Address Line 3</span>
          <input id="qoaddressline_3" type="text" class="form-control" name="qoaddressline_3" value="" placeholder="Enter Address Line 3">
          </div>
          </div><!---start-form-row------>
          <div class="col-md-12">
          <div class="row"> <!---start-mid-row--->
          <div class="col-md-6 col-sm-6 col-xs-12"> <!---start-form-row------>
          <div class="input-group">
          <span class="input-group-addon">City*</span>
          <input id="qocity" type="text" class="form-control qothervalidate" name="qocity" value="" placeholder="Enter City" required >
          </div>
          </div><!---start-form-row------>

          <div class="col-md-6 col-sm-6 col-xs-12"> <!---start-form-row------>
          <div class="input-group">
          <span class="input-group-addon">State*</span>
          <input id="qostate" type="text" class="form-control qothervalidate" name="qostate" value="" placeholder="Enter State" required >
          </div>
          </div><!---start-form-row------>

          <div class="col-md-6 col-sm-6 col-xs-12"> <!---start-form-row------>
          <div class="input-group">
          <span class="input-group-addon">Country*</span>
          <input id="qocountry" type="text" class="form-control qothervalidate" name="qocountry" value="" placeholder="Enter Country" required>
          </div>
          </div><!---start-form-row------>

          <div class="col-md-6 col-sm-6 col-xs-12"> <!---start-form-row------>
          <div class="input-group">
          <span class="input-group-addon">Zip Code*</span>
          <input id="qozip" type="text" class="form-control qothervalidate" name="qozip" max-length="6" value="" placeholder="Enter Zip Code" onkeypress="return numeric_only (event, this);" required>
          </div>
          </div><!---start-form-row------>
          </div> <!--end-mid-row--->
          </div>
            </div>
           </div>
          <!---end-otheraddress------>

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
        <h1><strong>Product Order :</strong> Hi <strong><i>{{Auth::user()->name}}</i></strong> Please Check Your Details</h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<form id="ordersubmit" action="javascript:void(0);">

             <div class="row">

             <div class="col-md-6 col-sm-6 col-xs-12" style="display:none;">
          <div class="input-group">
          <span class="input-group-addon">Product ID</span>
          <input type="text" id="diamondFeed_ido" class="form-control" name="diamondFeed_ido" value="" readonly required>
          </div>
          </div>

          <input type="hidden" id="multiplier_usdo" class="form-control" name="multiplier_usdo" value="">
          <input id="p_finalpriceo" class="pprice" type="hidden" name="p_finalpriceo" class="form-control" readonly value="">
          <input type="hidden" id="p_vato" class="form-control" name="p_vato" value="">
          <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="input-group">
          <span class="input-group-addon">Stock Number</span>
          <input id="stock_numbero" type="text" name="stock_numbero" class="form-control" readonly placeholder="Your Stock Number">
          </div>
          </div>

          <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="input-group finalpricebox">
          <span class="input-group-addon">Sell price ex vat</span>
         
          <input id="c_symbolo" class="symb" type="text" name="c_symbolo" class="form-control" readonly value="">
          <input type="text" id="p_price_without_vato" class="form-control pprice" name="p_price_without_vato" value="" required>
         
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
          <input id="userEmailo" type="email" class="form-control" name="userEmailo" value="{{Auth::user()->email}}" placeholder="Enter Your Correct Email Address " required>
          </div>
          </div>

          <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="input-group">
          <span class="input-group-addon">VAT Number</span>
          <input id="vatnumbero" type="text" class="form-control" name="vatnumbero" value="{{Auth::user()->VATnumber}}" placeholder="Enter Company VAT Number " required readonly>
          </div>
          </div>

          <!------------------------------->
          <div class="col-md-12 col-sm-12 col-xs-12 addressradio divhidden">
          <div class="form-group margin0">
          <div class="row">
          <div class="col-sm-4"><label>Check Delivery Address</label></div>
          <div class="col-sm-4">
          <input id="sameaddress" checked type="radio" name="deliveryaddress" value="sameAddress" required>
          <span>Same Address</span>
          </div>
          <div class="col-sm-4">
          <input id="otherddress" type="radio" name="deliveryaddress" value="otherAddress" required>
          <span> Other Address</span>
          </div>
          </div>
          </div>
          </div>

          <!---start-sameaddress---->
          @php $user = Auth::user(); @endphp
          <div class="divhidden">
            <div class="" id="sameaddressbox">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <p class="addressheading">Please Check & Update Your Same Address</p>
            </div>

            <div class="col-md-12 col-sm-12 col-xs-12"> <!---start-form-row------>
          <div class="input-group">
          <span class="input-group-addon">Address Line 1 *</span>
          <input id="addressline_1" type="text" class="form-control samevalidate" name="addressline_1" value="{{$user->address_line1}}" placeholder="Enter Address Line 1 *" required>
          </div>
          </div><!---start-form-row------>

          <div class="col-md-12 col-sm-12 col-xs-12"> <!---start-form-row------>
          <div class="input-group">
          <span class="input-group-addon">Address Line 2</span>
          <input id="addressline_2" type="text" class="form-control" name="addressline_2" value="{{$user->address_line2}}" placeholder="Enter Address Line 2">
          </div>
          </div><!---start-form-row------>

          <div class="col-md-12 col-sm-12 col-xs-12"> <!---start-form-row------>
          <div class="input-group">
          <span class="input-group-addon">Address Line 3</span>
          <input id="addressline_3" type="text" class="form-control " name="addressline_3" value="{{$user->address_line3}}" placeholder="Enter Address Line 3">
          </div>
          </div><!---start-form-row------>
            <div class="col-md-12"> <!---start-mid-row--->
            <div class="row"> <!---start-mid-row--->
          <div class="col-md-6 col-sm-6 col-xs-12"> <!---start-form-row------>
          <div class="input-group">
          <span class="input-group-addon">City*</span>
          <input id="city" type="text" class="form-control samevalidate" name="city" value="{{$user->city}}" placeholder="Enter City" required>
          </div>
          </div><!---start-form-row------>

          <div class="col-md-6 col-sm-6 col-xs-12"> <!---start-form-row------>
          <div class="input-group">
          <span class="input-group-addon">State*</span>
          <input id="state" type="text" class="form-control samevalidate" name="state" value="{{$user->state}}" placeholder="Enter State" required>
          </div>
          </div><!---start-form-row------>

          <div class="col-md-6 col-sm-6 col-xs-12"> <!---start-form-row------>
          <div class="input-group">
          <span class="input-group-addon">Country*</span>
          <input id="country" type="text" class="form-control samevalidate" name="country" value="{{$user->country}}" placeholder="Enter Country" required>
          </div>
          </div><!---start-form-row------>

          <div class="col-md-6 col-sm-6 col-xs-12"> <!---start-form-row------>
          <div class="input-group">
          <span class="input-group-addon">Zip Code*</span>
          <input id="zip" type="text" class="form-control samevalidate" name="zip" max-length="6" value="{{$user->zip}}" placeholder="Enter Zip Code" onkeypress="return numeric_only (event, this);" required>
          </div>
          </div><!---start-form-row------>
          </div> <!--end-mid-row--->

            </div></div>
           </div>
          <!---end-sameaddress------>

          <!---start-otheraddress---->
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="row" id="otheraddressbox">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <p class="addressheading">Please Fill Up Your Other Address</p>
            </div>

            <div class="col-md-12 col-sm-12 col-xs-12"> <!---start-form-row------>
          <div class="input-group">
          <span class="input-group-addon">Address Line 1 *</span>
          <input id="oaddressline_1" type="text" class="form-control othervalidate" name="oaddressline_1" value="" placeholder="Enter Address Line 1 *" required>
          </div>
          </div><!---start-form-row------>

          <div class="col-md-12 col-sm-12 col-xs-12"> <!---start-form-row------>
          <div class="input-group">
          <span class="input-group-addon">Address Line 2</span>
          <input id="oaddressline_2" type="text" class="form-control" name="oaddressline_2" value="" placeholder="Enter Address Line 2">
          </div>
          </div><!---start-form-row------>

          <div class="col-md-12 col-sm-12 col-xs-12"> <!---start-form-row------>
          <div class="input-group">
          <span class="input-group-addon">Address Line 3</span>
          <input id="oaddressline_3" type="text" class="form-control" name="oaddressline_3" value="" placeholder="Enter Address Line 3">
          </div>
          </div>
          <!---start-form-row------>
          
            <div class="col-md-12"> <!---start-mid-row--->
            <div class="row"> <!---start-mid-row--->
          <div class="col-md-6 col-sm-6 col-xs-12"> <!---start-form-row------>
            <div class="input-group">
            <span class="input-group-addon">City*</span>
            <input id="ocity" type="text" class="form-control othervalidate" name="ocity" value="" placeholder="Enter City" required >
            </div>
          </div><!---start-form-row------>

          <div class="col-md-6 col-sm-6 col-xs-12"> <!---start-form-row------>
            <div class="input-group">
            <span class="input-group-addon">State*</span>
            <input id="ostate" type="text" class="form-control othervalidate" name="ostate" value="" placeholder="Enter State" required >
            </div>
          </div><!---start-form-row------>

          <div class="col-md-6 col-sm-6 col-xs-12"> <!---start-form-row------>
            <div class="input-group">
            <span class="input-group-addon">Country*</span>
            <input id="ocountry" type="text" class="form-control othervalidate" name="ocountry" value="" placeholder="Enter Country" required>
            </div>
          </div><!---start-form-row------>

          <div class="col-md-6 col-sm-6 col-xs-12"> <!---start-form-row------>
            <div class="input-group">
            <span class="input-group-addon">Zip Code*</span>
            <input id="ozip" type="text" class="form-control othervalidate" name="ozip" max-length="6" value="" placeholder="Enter Zip Code" onkeypress="return numeric_only (event, this);" required>
            </div>
          </div><!---start-form-row------>
          </div> <!--end-mid-row--->
          </div>

            </div>
           </div>
          <!---end-otheraddress------>


          <!-------------------------------->

             </div>

  <button type="submit" id="ordersubmit" class="btn btn-primary custombtn">Submit</button>
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
<form id="sharesubmit" action="javascript:void(0);">
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
          <input id="userEmailc" type="email" class="form-control" name="userEmailc" value="{{Auth::user()->email}}" placeholder="Enter Your Correct Email Address " required>
          </div>
          </div>


             </div>
   <div id="copysubmit">         
  <button type="submit" class="btn btn-primary custombtn">Submit</button>
  </div> 
</form>
      </div>
    </div>
  </div>
</div>	 
<!-----------end-Copy-Model--------------->


<!-----------start-lab-grown-section-Model--------------->
<div class="modal fade" id="grownMsg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm maxwidth650" role="document">
    <div class="modal-content enquiryboxmodel">
      <div class="modal-header">
        <h1><strong>Lab Grown Diamond</strong></h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="msgshow">
      <p>We are working on this section at the moment. If you are looking for a lab grown diamond, please email us at <a href="mailto:enquiries@shiningqualities.com">enquiries@shiningqualities.com</a></p>
      </div>
      </div>
    </div>
  </div>
</div>	 
<!-----------end-lab-grown-section-Model--------------->

<!-----------start-fancy-colour-section-Model--------------->
<div class="modal fade" id="fancyMsg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm maxwidth650" role="document">
    <div class="modal-content enquiryboxmodel">
      <div class="modal-header">
        <h1><strong>Fancy coloured diamonds</strong></h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="msgshow">
      <p>We are working on this section at the moment. If you are looking for a fancy coloured diamond, please email us at <a href="mailto:enquiries@shiningqualities.com">enquiries@shiningqualities.com</a></p>
      </div>
      </div>
    </div>
  </div>
</div>	 
<!-----------end-fancy-colour-section-Model--------------->