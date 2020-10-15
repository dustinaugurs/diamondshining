<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice Letter</title>
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
   <p><strong>Dear <?php echo $mailData['customername'] ?>, </strong></p>

<p><?php echo $mailData['message'] ?></p>
       <br>
       <br>
      
       <p><strong>Kind regards , </strong><br><br>
       {{Auth::user()->first_name}} {{Auth::user()->last_name}} <br>
       <?php echo $mailData['fromName'] ?> <br>
       <?php echo $mailData['address'] ?>
       </p>
       
   </div> 
</body>
</html>

 
   
