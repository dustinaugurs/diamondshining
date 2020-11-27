<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    body{margin:0px; padding:0px;}
    .wrapper{ max-width:600px; margin:0px; padding:15px; background:#f2f2f2; }
    .wrapper table{ width:100%; margin:0px; border:1px solid #DDD; border-collapse:collapse; background:#f2f2f2;}
    .wrapper table tr > td{ border:0px solid #DDD; padding:8px 10px; text-transform:uppercase;}
    .wrapper p{font-size:15px;}
    </style>
</head>
<body>
   <div class="wrapper">
      <!---start-header--><p style="border-bottom: 1px solid #ccc; padding-bottom: 10px; width:100%; float:left;">
<<<<<<< HEAD
      <span style="display:block; width:120px; float:left"><img style="max-width:100%" src="http://www.shiningqualities.com/public/assets/img/logo/logowhite.png"></span>
         <span style="display:block; width:120px; float:right">
           {{date('d/m/Y')}}
         </span>
        </p><!---End-header-->
    <p> Dear <?php echo $products['username']; ?> ,</p>
       <p><?php echo $products['message']; ?></p><br>
       <p>Kind regards ,<br><br>
=======
         <span style="display:block; width:120px; float:left"><img style="max-width:100%" src="http://www.shiningqualities.com/public/assets/img/logo/logomail.png"></span>

         <span style="display:block; width:120px; float:right">
           Date : {{date('d/m/Y')}}
         </span>
        </p><!---End-header-->
    <p> Dear <strong><?php echo $products['username']; ?> ,</strong></p>
       <p><?php echo $products['message']; ?></p>
       <p><strong>Kind regards ,</strong><br>
>>>>>>> ae3b59b112dba3aec89c8b5004770b3d0aa3321f
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

 
   
