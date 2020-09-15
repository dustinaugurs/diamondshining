<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    body{margin:0px; padding:0px;}
    .wrapper{ max-width:600px; margin:0px; padding:15px; background:#f2f2f2; font-style:italic;}
    .wrapper table{ width:100%; margin:0px; border:1px solid #DDD; border-collapse:collapse; background:#f2f2f2;}
    .wrapper table tr > td{ border:1px solid #DDD; padding:8px 10px; text-transform:uppercase;}
    .wrapper p{font-size:15px;}
    </style>
</head>
<body>
   <div class="wrapper">
   <p><strong>Dear <?php echo $products['customername'] ?>, </strong></p>

<p>I hope you’re well! Please see attached invoice number <strong><?php echo $products['invoiceNumber'] ?></strong> for <strong>Stock Number <?php echo $products['stockNumber'] ?></strong>, due on <strong> <?php echo $products['duedate'] ?></strong>. Don’t hesitate   to reach out if you have any questions.</p>
       <br>
       <br>
      
       <p><strong>Kind regards , </strong><br><br>
       {{Auth::user()->first_name}} {{Auth::user()->last_name}} <br>
       <?php echo $products['fromName'] ?> <br>
       <?php echo $products['address'] ?>
       </p>
       
   </div> 
</body>
</html>

 
   
