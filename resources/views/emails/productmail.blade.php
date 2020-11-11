<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    body{margin:0px; padding:0px;}
    .wrapper{ max-width:600px; margin:0px; padding:0px; }
    .wrapper table{ width:100%; margin:0px; border:1px solid #DDD; border-collapse:collapse; background:#f2f2f2;}
    .wrapper table tr > td{ border:1px solid #DDD; padding:8px 10px; text-transform:uppercase;}
    .wrapper p{font-size:15px;}
    </style>
</head>
<body>
   <div class="wrapper">
    <p> Dear <strong><?php echo $products['username']; ?> ,</strong></p>
       <p><?php echo $products['message']; ?></p>
       <p><strong>regards ,</strong><br>
        Shining Qualities team
        </p>
        <br>
   <table>
    <tr><td colspan="2"><strong>Diamond Details</strong></td></tr>  
   <tr> <td>Stock Number : </td> <td> <?php echo $products['stock_number']; ?> </td> </tr>  
   <tr> <td>Certificate Number : </td> <td> <?php echo $products['certificate_number']; ?> </td> </tr>  
   <tr> <td>Shape : </td> <td> <?php echo $products['shape']; ?> </td> </tr>  
   <tr> <td>Carat : </td> <td> <?php echo $products['carat']; ?> </td> </tr>
   <tr> <td>Colour : </td> <td> <?php echo $products['colour']; ?> </td> </tr> 
   <tr> <td>clarity : </td> <td> <?php echo $products['clarity']; ?> </td> </tr>  
   <tr> <td>price : </td> <td> <?php echo $products['price']; ?> </td> </tr> 
   </table>
   </div> 
</body>
</html>

 
   
