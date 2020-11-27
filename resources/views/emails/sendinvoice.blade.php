<!doctype html>
<html lang="en">
<head>
<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
<title>Invoice Letter</title>
<style>
  * {
	margin: 0;
	padding: 0;
}


/* @font-face {
  font-family: "Metric";
  src: url("{{url('public/assets/fonts')}}/metric-web-regular.eot");
  src: url("{{url('public/assets/fonts')}}/metric-web-regular.woff") format("woff"),
 url("{{url('public/assets/fonts')}}/metric-web-regular.woff2") format("woff2");

 
  } */

@font-face {
	font-family: "Helvetica";
	src: "http://www.shiningqualities.com/public/assets/fonts/Helvetica.ttf");
}

body {
	line-height: 1.5;
	font-size: 11px;
	font-family: "Helvetica";
	color: #707070;
	padding: 25px 36px 28px 36px;
}
tr, td,p,div,h1,h2,h3,h4,h5,h6{
  font-family: "Helvetica";
  font-weight:600;
}

.header {
	padding: 0;
}

.header img {
	height: 40px;
	margin-bottom: 25px !important;
}

.total-section tr td {
	border: 0px !important;
}

.header p {
	font-weight: 500;
	margin: 0;
	line-height: normal;
}


.shiningbox {
	display: block;
	text-decoration: none;
	text-align: left;
	margin-bottom: 10px;
	width: 300px;
	overflow: hidden;
}

.shiningbox img {
	width: 100%
}

.shiningbox span {
	margin: 0;
	font-size: 12px;
	text-transform: uppercase;
	font-weight: 600;
	border-bottom: 1px dashed #000;
	padding: 0 0 8px 0;
	letter-spacing: 3px;
	display: inline-block;
}

.shiningbox span.first {
	font-size: 30px;
	letter-spacing: 3px;
	border-bottom: 1px solid #333;
	margin-bottom: 5px;
}

.shiningbox span.last {
	letter-spacing: 8px;
}

#identity {
	width: 100%;
	float: left;
	clear: both;
}

tr.prbox td {
	font-size: 15px
}

.priceboxxx {
	width: 100%;
	margin: 0px;
	padding: 0px;
	clear: both;
}

p.headerbox {
	background-color: #002853;
	padding: 10px 10px;
	text-align: center;
	color: #fff;
	letter-spacing: 15px;
	font-weight: 600;
	font-size: 20px;
}

.wrapper {
	width: 100%;
	margin: 0;
	padding: 0px;
}

.wrapper table {
	width: 100%;
	border: none;
	border-collapse: collapse
}

.wrapper table tr td {
	border: none;
  vertical-align: middle;
  border: 2px solid #fff ;
}

table.pricesummary tr th {
	background-color: #002853;
	text-align: left;
	text-transform: uppercase;
	color: #fff;
}

table.pricesummary tr td,
table.pricesummary tr th {
	border: 1px solid #ddd;
	padding: 5px 10px;
	height: auto;
}

table.pricesummary tr td p,
table.pricesummary tr th p {
	margin: 0px !important;
}

.mrgtable {
	margin-bottom: 30px;
}

.wrapinbox {
	padding: 0px 0px;
	margin: 0px 0 20px 0;
}

.wrapinbox.termbox {
	text-align: center;
}

.wrapinbox.termbox {
	border-top: 1px solid #DDD;
	padding-top: 10px;
}

.wrapinbox.termbox h5 {
	letter-spacing: 2px;
	text-transform: uppercase;
	font-weight: 600;
	font-size: 21px;
}

.wrapinbox td.balance {
	background-color: #eee;
	font-weight: 600;
}

.wrapinbox h4 {
	margin: 0;
	padding: 10px 0px;
	font-size: 18px;
	font-style: normal;
	font-weight: 600;
}

.addrtable p {
	margin-bottom: 5px
}

.addrtable h5 {
	margin: 0px 0 8px 0;
	font-size: 12px;
	text-transform: uppercase;
	font-weight: 600;
	border-bottom: 1px dashed #000;
	padding: 0 0 8px 0;
	letter-spacing: 3px;
	display: inline-block;
}


.companyaddress {
	width: 80%;
	float: right;
	padding: 20px;
}

td.desbox p {
	line-height: normal;
	margin: 0px;
}

.grey_heder tr td {
	background-color: #f8f8f8;
	padding: 22px 20px;
	
}

.right_div_td {
	background-color: #f8f8f8;
	padding: 10px 20px;
}

.right_div_td p {
	line-height: 18px;
}

.right_div_td h6 {
	text-transform: uppercase;
	margin-bottom: 10px;
  font-weight: 500;
  font-size: 10px;
}
.bottom-info {
	text-align: center;
}
.newtable td {
	text-align: right;
	border-bottom: 1px solid #828282 !important;
	padding: 7px 10px;
  font-weight: 500;
  border-left: 0 !important;
  border-right: 0 !important;
  BORDER-TOP: 0 !important;
}
.newtable th {
	border-right: 0;
	text-align: left;
	background-color: transparent;
	height: 200px;
	vertical-align: top;
}
.newtable th:last-child {
	text-align: right;
}
.invoice_heading {
  text-align:right;
	font-size: 22px;
	/* height: 40px; */
	vertical-align: middle;
	display: flex;
	width: 100%;
	justify-content: flex-end;
	align-items: flex-end;
}
.logo {
	/* height: 40px;
	margin-bottom: 25px !important; */
}
</style>
</head>
<body>

<div class="wrapper">
<div class="header">
<table>
  <tr><td>
        <p class="logo"><img src="http://www.shiningqualities.com/public/assets/img/logo/sm-logo-black.png"></p></td>
        <td><p class="invoice_heading">Invoice</p>
        </td>
    </tr>
  <tr>
    <td>
      <table class="grey_heder">
        <!-- <tr>
          <td colspan="2"><p>Customer number : {{$invoicenumber}}</p></td>
        </tr> -->
        <tr>
        <td colspan="2">
        <p><span style="text-transform:uppercase;">COMPANY NAME</span>: Diamonds and More Diamonds</p>

      </td>
      </tr>
        <tr>
          <td><p><span style="text-transform:uppercase;">Invoice date</span></p></td>
          <td><p>{{$invoice_date}}</p></td>
        </tr>
        <tr>
           <td><p><span style="text-transform:uppercase;">Order number ref</span></p></td>
          <td><p>{{$invoice_date}}</p></td>
        </tr>
      </table>
    </td>
    <td class="right_div_td" style="text-align:center;">
      <h6><strong>FOR PAYMENT</strong></h6>
   
        <p>
       Please remit payment in GBP to: <br> Barclays Bank plc Shining Qualities<br> Sort Code: 20-99-40 <br>Acc: 13129713</p>
    </td>
  </tr>
  <tr>
    <td class="right_div_td">
     
    <h6><span style="text-transform:uppercase;">Billed to </span></h6>
      <p>Company Name:  {{$order->user->company}}</p>
        <p>
        Address  : 
        @if($order->delivery_location=='otherAddress') 
        {{$order->address_line1}} {{$order->address_line2}}, 
        {{$order->city}}, {{$order->state}}, {{$order->country}}-{{$order->zip}}
        @elseif($order->delivery_location=='sameAddress')
        {{$order->user->address_line1}} {{$order->user->address_line2}}, 
        {{$order->user->city}}, {{$order->user->state}}, {{$order->user->country}}-{{$order->user->zip}}
        @endif
        </p>
        <p>Email   :  {{$order->user->email}}</p>
        <p>Phone  :  {{$order->user->phone_no}}</p>
        <p>VAT Number  : {{$order->user->VATnumber}}</p>
        
    </td>
    <td class="right_div_td">
    <div class="clientaddress">
        <h6><span style="text-transform:uppercase;">Ship to</span></h6>
        <p>Company Name   :  {{$order->user->company}}</p>
        <p>Address  : 
        @if($order->delivery_location=='otherAddress') 
        {{$order->address_line1}} {{$order->address_line2}}, 
        {{$order->city}}, {{$order->state}}, {{$order->country}}-{{$order->zip}}
        @elseif($order->delivery_location=='sameAddress')
        {{$order->user->address_line1}} {{$order->user->address_line2}}, 
        {{$order->user->city}}, {{$order->user->state}}, {{$order->user->country}}-{{$order->user->zip}}
        @endif
        </p>
        <p>Email   :  {{$order->user->email}}</p>
        <p>Phone  :  {{$order->user->phone_no}}</p>
        <p>VAT Number  :  {{$order->user->VATnumber}}</p>
        </div>
    </td>
  </tr>
    
</table>
</div>

<!-- <div class="wrapinbox"> 
<table class="mrgtable addrtable">
    <tr>
        <td width="50%">
        <div class="clientaddress">
        <h5>Customer Details</h5>
        <p><strong>Company Name   : </strong> {{$order->user->company}}</p>
        <p>
        <strong>Address  :</strong> 
        @if($order->delivery_location=='otherAddress') 
        {{$order->address_line1}} {{$order->address_line2}}, 
        {{$order->city}}, {{$order->state}}, {{$order->country}}-{{$order->zip}}
        @elseif($order->delivery_location=='sameAddress')
        {{$order->user->address_line1}} {{$order->user->address_line2}}, 
        {{$order->user->city}}, {{$order->user->state}}, {{$order->user->country}}-{{$order->user->zip}}
        @endif
        </p>
        <p><strong>Email   : </strong> {{$order->user->email}}</p>
        <p><strong>Phone  : </strong> {{$order->user->phone_no}}</p>
        <p><strong>VAT Number  : </strong> {{$order->user->VATnumber}}</p>
        </div>
     
      </td>
        <td width="50%">
        <div class="companyaddress">
            <div class="shiningbox">
            <span>{{$setting->from_name}} </span>
            </div>
        <p>
        <strong>Address  :</strong>  
        {!! $setting->company_address !!} 
        </p>
        <p><strong>VAT Number  : </strong> {{$setting->VATnumber}} </p>
        </div>
            </td>
    </tr>
</table>
</div> 
 -->
<!-- <div class="wrapinbox"> 
<table>
    <tr>
        <td width="20%"></td>
        <td width="20%"></td>
        <td width="20%"></td>
        <td width="40%">
        <table class="pricesummary total-section">
                <tr>
                    <td class="meta-head"><strong>Invoice #</strong></td>
                    <td><p>{{$invoicenumber}}</p></td>
                </tr>
                <tr>

                    <td class="meta-head"><strong>Date</strong></td>
                    <td><p id="date">{{$invoice_date}}</p></td>
                </tr>
                <tr>
                    <td class="meta-head balance">Total {{$order->currency_code}}</td>
                    <td class="balance"><div class="due balance">
                    @php
                    $finalprice = ($order->p_price_without_vat)+($order->p_price_without_vat)*$order->p_vat/100;
                    $vatprice = ($order->p_price_without_vat)*$order->p_vat/100;
                    @endphp
                    {{$order->c_symbol}} {{round($finalprice, 2)}}
                    </div></td>
                </tr>

            </table>
        </td>
    </tr>
</table>
</div> -->



<div class="wrapinbox"> <!----start-wrapinbox------>
<!-- <h4>Items: </h4> -->
<!-- <table class="pricesummary">
    <thead>
    <tr>
              <th>Stock Number</th>
              <th>Shape</th>
              <th>Certificate Number</th>
              <th>Carat Weight</th>
              <th>Colour</th>
              <th>Clarity</th>
		      <th>Price</th>
		  </tr>
    </thead>

    <tbody>
    <tr>
              <td>{{$order->diamondfeed->stock_id}}</td>
              <td>{{$order->diamondfeed->shape}}</td>
              <td>{{$order->diamondfeed->ReportNo}}</td>
              <td>{{$order->diamondfeed->carats}}</td>
              <td>{{$order->diamondfeed->col}}</td>
              <td>{{$order->diamondfeed->clar}}</td>
		      <td><span class="price balance">{{$order->c_symbol}} {{round($finalprice, 2)}}</span></td>
    </tr>
    </tbody>
   
</table> -->
<table class="newtable1" style="margin-top:20px">
<tr>
      <th style="border-left:0;text-align:right">Price</th>
    </tr>
    <tr>
      <th style="border-right: 0;background-color: #f8f8f8;padding: 10px 15px;text-align: left">Shining Qualities</th>
</tr>
</div>
<table class="newtable" style="margin-top:20px">
    <thead>

 
    <tr>
      <th style="border-right:0">Items Description</th>
      <th style="border-left:0">$80,000</th>
    </tr>
    </thead>

    <tbody>
      <!-- <tr>
        <td colspan="2">Inclusive of VAT at 20%</td>
      </tr> -->
      <tr>
        <td colspan="2">Subtotal $80,000</td>
      </tr>
       <tr>
        <td colspan="2">VAT charged at 20% $80,000</td>
      </tr>
        <tr>
        <td colspan="2">Total $10,0000</td>
      </tr>
    </tbody>
   
</table>
<!-- <table class="pricesummary" style="margin-top:20px">
    <thead>
    <tr>
              <th style="border-right:0">Description</th>
              <th style="border-left:0"></th>
              <th>Net</th>
              <th>Vat {{$order->p_vat}}%</th>
              <th>Gross</th>
             
		  </tr>
    </thead>

    <tbody>
    <tr>
              <td style="border-right:0" class="desbox">
              <p>{{$order->diamondfeed->shape}} , {{$order->diamondfeed->carats}} ct, {{$order->diamondfeed->col}} colour , {{$order->diamondfeed->clar}} clarity.</p>
              <p>This diamond is certificated by {{$order->diamondfeed->lab}} report number {{$order->diamondfeed->ReportNo}}</p>
              </td>
              <td style="border-left:0"></td>
              <td>{{$order->c_symbol}} {{$order->p_price_without_vat}}</td>
              <td>{{$order->p_price_without_vat * $order->p_vat/100}} </td>
              <td> {{$order->c_symbol}} {{round($finalprice, 2)}}</td>
             
    </tr>
    <tr>
              <td style="border-right:0"></td>
              <td style="border-left:0"><strong>Total</strong></td>
              <td>{{$order->c_symbol}} {{$order->p_price_without_vat}}</td>
              <td>{{$order->p_price_without_vat * $order->p_vat/100}} </td>
              <td> {{$order->c_symbol}} {{round($finalprice, 2)}}</td>
             
    </tr>
    </tbody>
   
</table> -->
<!-- <table class="pricesummary" style="margin-top:20px">
    <thead>
    <tr>
              <th style="border-right:0">For Payment</th>
              
             
		  </tr>
    </thead>

    <tbody>
    <tr>
            <td style="border-right:0" class="desbox">
            Please remit payment in GBP to: Barclays Bank plc Account Name: Shining Qualities ltd Account Number: 13129713 Sort Code: 209940

            </td>
              
    </tr>
    </tbody>
    -->
</table>
</div><!----End-wrapinbox------>

<div class="wrapinbox"> <!----start-wrapinbox------>
<!-- <table>
    <tr>
        <td width="20%"></td>
        <td width="20%"></td>
        <td width="20%"></td>
        <td width="40%">
        <table class="pricesummary total-section">
                <tr>
                    <td class="meta-head"><strong>Subtotal</strong></td>
                    <td><p class="subtotal">{{$order->c_symbol}} {{$order->p_price_without_vat}}</p></td>
                </tr>
                <tr>

                    <td class="meta-head"><strong>Total VAT {{$order->p_vat}}%</strong></td>
                    <td><p id="total">{{$order->p_price_without_vat * $order->p_vat/100}} </p></td>
                </tr>
                <tr>
                    <td class="meta-head"><strong>Amount Paid</strong></td>
                    <td><div class="paid">{{$order->c_symbol}} 0.00</div></td>
                </tr>

                <tr>
                    <td class="meta-head balance"><strong>Total {{$order->currency_code}}</strong></td>
                    <td class="balance"><div class="due">
                    {{$order->c_symbol}} {{round($finalprice, 2)}}
                    </div></td>
                </tr>

            </table>
        </td>
    </tr>
</table> -->
</div>
</div>
  <div class="bottom-info">
  
  <p style="margin-bottom:30px;">The goods listed on this Invoice are non returnable unless specifically <br> agreed with Shining Qualities management, prior to purchase.</p>
  <p style="margin-bottom:10px;">Shining Qualities <br>16 Stoneleigh Court , Lansdown Road, Bath, BA1 5TL</p>
  <p style="margin-bottom:20px;">VAT Number DRRE52 <br> Company Registration number 23473848484</p>
  <p>All Rights Reserved <br> Copyright © 2020 Shining Qualities</p>
	
	
</body>

</html>