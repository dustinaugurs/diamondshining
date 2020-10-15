<!doctype html>
<html lang="en">
<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	
	<title>Invoice Letter</title>
	<style>
         * { margin: 0; padding: 0; }
         @font-face {
  font-family: "Metric";
  src: url("{{url('public/assets/fonts')}}/metric-web-regular.eot");
  src: url("{{url('public/assets/fonts')}}/metric-web-regular.woff") format("woff"),
 url("{{url('public/assets/fonts')}}/metric-web-regular.woff2") format("woff2");

 
  }

body {
  line-height: 1.7;
  font-size: 12px;
  font-family: Metric !important;
}
.header{
    background: #002853;
    padding: 8px 12px;
}
.header img{
    width: 232px;

}
.total-section tr td{
     border:0px !important;
}
.header p{
    text-align: left;
    color: #fff;
    letter-spacing: 9px;
    font-size: 22px;
    font-weight: 400;
    margin: 0;
    line-height: normal;
}
p.logo{
    text-align:right;
}
.shiningbox{display: block;
    text-decoration: none;
    text-align: left;
    color: #000;
    margin-bottom: 10px;
    width: 300px;
    overflow: hidden;}
    .shiningbox img{width:100%}
  .shiningbox span{margin: 0;
    font-size: 12px;
    text-transform: uppercase;
    font-weight: 600;
    border-bottom: 1px dashed #000;
    padding: 0 0 8px 0;
    letter-spacing: 3px;
    display: inline-block;}
  .shiningbox span.first{font-size: 30px;
    letter-spacing: 3px;
    border-bottom: 1px solid #333;
    margin-bottom: 5px;}
  .shiningbox span.last{ letter-spacing: 8px;}
  #identity{width:100%; float:left; clear:both;}
  tr.prbox td{font-size:15px}
  .priceboxxx{width:100%; margin:0px; padding:0px; clear:both;}
  p.headerbox{background: #002853;
    padding: 10px 10px;
    text-align: center;
    color: #fff;
    letter-spacing: 15px;
    font-weight: 600;
    font-size: 20px;}
    .wrapper{width: 100%;
    margin: 0;
    padding: 0px;
    border: 1px solid #ccc;}
    .wrapper table{width:100%; border:none;border-collapse: collapse}
    .wrapper table tr td{border:none; vertical-align:top;}
    table.pricesummary tr th{background: #002853;
    text-align: left;
    text-transform: uppercase;
    color: #fff;
    }
    table.pricesummary tr td, table.pricesummary tr th{border:1px solid #ddd; padding:5px 10px; height:auto;}
    table.pricesummary tr td p,table.pricesummary tr th p{margin:0px !important;}
    .mrgtable{margin-bottom:30px;}
    .wrapinbox{padding:0px 20px; margin:0px 0 20px 0;  }
    .wrapinbox.termbox{text-align:center;}
    .wrapinbox.termbox{border-top:1px solid #DDD; padding-top:10px;}
    .wrapinbox.termbox h5{letter-spacing: 2px;
text-transform: uppercase;
font-weight: 600;
font-size: 21px;
}
.wrapinbox td.balance{background:#eee; font-weight:600;}
.wrapinbox h4{margin: 0;
padding: 10px 0px;
font-size: 18px;
font-style: normal;
font-weight: 600;}

.addrtable p{margin-bottom:5px} 
.addrtable h5{margin: 0px 0 8px 0;
    font-size: 12px;
    text-transform: uppercase;
    font-weight: 600;
    border-bottom: 1px dashed #000;
    padding: 0 0 8px 0;
    letter-spacing: 3px;
    display: inline-block;}  

.clientaddress{width:90%;padding:20px} 
.companyaddress{width:80%; float:right; padding:20px;} 
td.desbox p{ line-height:normal; margin:0px;} 
    </style> 

	
</head>

<body>

<div class="wrapper">
<div class="header">
<table>
    <tr>
        
        
        <td>  <p>INVOICE</p>
        </td>
        <td>
        <p class="logo"><img src="{{url('public/assets/img/logo')}}/white-inline.png"></p></td>
    </tr>
</table>
</div>

<div class="wrapinbox"> <!----start-wrapinbox------>
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
</div> <!----End-wrapinbox------>

<div class="wrapinbox"> <!----start-wrapinbox------>
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
                    <td class="meta-head balance">Total GBP</td>
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
</div><!----End-wrapinbox------>



<div class="wrapinbox"> <!----start-wrapinbox------>
<h4>Items: </h4>
<table class="pricesummary">
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
   
</table>
<table class="pricesummary" style="margin-top:20px">
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
              <p>{{$order->diamondfeed->carats}}ct {{$order->diamondfeed->col}} color and {{$order->diamondfeed->clar}} clarity</p>
              <p>This diamond is certificated by {{$order->diamondfeed->lab}} &nbsp; {{$order->diamondfeed->ReportNo}}</p>
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
   
</table>
</div><!----End-wrapinbox------>

<div class="wrapinbox"> <!----start-wrapinbox------>
<table>
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
                    <td class="meta-head balance"><strong>Total GBP</strong></td>
                    <td class="balance"><div class="due">
                    {{$order->c_symbol}} {{round($finalprice, 2)}}
                    </div></td>
                </tr>

            </table>
        </td>
    </tr>
</table>
</div>
</div>

	
	
</body>

</html>