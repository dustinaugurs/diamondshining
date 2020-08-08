<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    body{margin:0px; padding:0px;}
    .wrapper{ max-width:600px; margin:0px; padding:0px;}
    .wrapper table{ width:100%; margin:0px; border:1px solid #DDD; border-collapse:collapse; background:#f2f2f2;}
    .wrapper table tr > td{ border:1px solid #DDD; padding:8px 10px; text-transform:uppercase;}
    </style>
</head>
<body>
   <div class="wrapper">
       <h4>Dear <?php echo $enquiry['username']; ?>,</h4>
       <p>Find Your <?php echo $enquiry['subject']; ?> Details :</p>
       <br><br>
   <table>
   <tr> <td>Subject : </td> <td> <?php echo $enquiry['subject']; ?> </td> </tr>  
   <tr> <td>Product ID : </td> <td> <?php echo $enquiry['productid']; ?> </td> </tr>  
   <tr> <td>Stock Number : </td> <td> <?php echo $enquiry['stock_number']; ?> </td> </tr>  
   </table>
   </div> 
</body>
</html>

 
   
