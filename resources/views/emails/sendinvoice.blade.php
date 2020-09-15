<!doctype html>
<html lang="en">
<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	
	<title>Invoice Letter</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style>
         * { margin: 0; padding: 0; }
body{font: 13px/1.4 Georgia, serif; }
.shiningbox{display: block; text-decoration:none; text-align: center; color:#000}
  .shiningbox span{display: block; text-transform: uppercase;}
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
    .wrapper{width:100%; margin:0px; padding:0px}
    .wrapper table{width:100%; border:none;}
    .wrapper table tr td{border:none;}
    table.pricesummary tr td, table.pricesummary tr th{border:1px solid #ddd; padding:5px 10px; height:auto;}
    table.pricesummary tr td p,table.pricesummary tr th p{margin:0px !important;}
    .mrgtable{margin-bottom:30px;}
    .wrapinbox{width:100%; margin:0px 0 20px 0; padding:0 15px; }
    .wrapinbox.termbox{text-align:center;}
    .wrapinbox.termbox{border-top:1px solid #DDD; padding-top:10px;}
    .wrapinbox.termbox h5{letter-spacing: 6px;
    text-transform: uppercase;
    font-weight: 600;
    font-size: 15px;
}
.wrapinbox td.balance{background:#eee; font-weight:600;}
.wrapinbox h4{margin: 0px 0 5px 0;
    padding: 0px 10px;
    font-size: 12px;
    font-style: italic;
    font-weight: 600;}
    </style> 

	
</head>

<body>

<div class="wrapper">
<table>
    <tr>
        <td><p class="headerbox">INVOICE</p></td>
    </tr>
</table>

<div class="wrapinbox"> <!----start-wrapinbox------>
<table class="mrgtable">
    <tr>
        <td width="80%"><p  id="address">
        <strong><i>Billing Address </i> :</strong> <br> {{$setting->from_name}}<br>
                   {{$setting->company_address}} <br><br>
        <strong><i>Email  </i> : </strong> {{$setting->from_email}} <br><br>
        <strong><i>Contact No. </i> : </strong> {{$setting->company_contact}}
     </p></td>
        <td width="20%"><div class="shiningbox">
            <span class="first">shining</span> <span class="last">qualities</span>
            </div></td>
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
        <table class="pricesummary">
                <tr>
                    <td class="meta-head">Invoice #</td>
                    <td><p>{{$invoicenumber}}</p></td>
                </tr>
                <tr>

                    <td class="meta-head">Date</td>
                    <td><p id="date">{{$order->order_date}}</p></td>
                </tr>
                <tr>
                    <td class="meta-head balance">Amount Due</td>
                    <td class="balance"><div class="due balance">{{$order->c_symbol}} {{$order->p_finalprice}}</div></td>
                </tr>

            </table>
        </td>
    </tr>
</table>
</div><!----End-wrapinbox------>



<div class="wrapinbox"> <!----start-wrapinbox------>
<h4>Product Details : </h4>
<table class="pricesummary">
    <thead>
    <tr>
		      <th>Stock No.</th>
		      <th>Carats Weight</th>
		      <th>Clarity</th>
              <th>Police</th>
              <th>Colour</th>
              <th>Cut</th>
              <th>Symmtery</th>
              <th>Depth(%)</th>
              <th>Dimension(mm)</th>
              <th>Table(%)</th>
		      <th>Price</th>
		  </tr>
    </thead>

    <tbody>
    <tr>
            <td>{{$order->diamondfeed->stock_id}}</td>
              <td>{{$order->diamondfeed->carats}}</td>
              <td>{{$order->diamondfeed->clar}}</td>
              <td>{{$order->diamondfeed->pol}}</td>
              <td>{{$order->diamondfeed->col}}</td>
              <td>{{$order->diamondfeed->cut}}</td>
              <td>{{$order->diamondfeed->symm}}</td>
              <td>{{$order->diamondfeed->depth}}</td>
              <td>{{$order->diamondfeed->length}} X {{$order->diamondfeed->width}} X {{$order->diamondfeed->height}}</td>
              <td>{{$order->diamondfeed->table}}</td>
		      <td><span class="price balance">{{$order->c_symbol}} {{$order->p_finalprice}}</span></td>
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
        <table class="pricesummary">
                <tr>
                    <td class="meta-head">Sub Total</td>
                    <td><p class="subtotal">{{$order->c_symbol}} {{$order->p_finalprice}}</p></td>
                </tr>
                <tr>

                    <td class="meta-head">Total</td>
                    <td><p id="total">{{$order->c_symbol}} {{$order->p_finalprice}}</p></td>
                </tr>
                <tr>
                    <td class="meta-head">Amount Paid</td>
                    <td><div class="paid">{{$order->c_symbol}} 0.00</div></td>
                </tr>

                <tr>
                    <td class="meta-head balance">Balance Due</td>
                    <td class="balance"><div class="due">{{$order->c_symbol}} {{$order->p_finalprice}}</div></td>
                </tr>

            </table>
        </td>
    </tr>
</table>
</div><!----End-wrapinbox------>

<div class="wrapinbox termbox"> <!----start-wrapinbox------>
<h5>Terms & Conditions</h5>
<p>Your text for Terms & Conditions</p>
</div><!----End-wrapinbox------>


</div>

	
	
</body>

</html>