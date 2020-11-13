<!DOCTYPE html>
<html lang="en">
<head>
   <?php header("Content-Type: image/png"); ?>
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
     <!---start-header--><p style="border-bottom: 1px solid #ccc; padding-bottom: 10px; width:100%; float:left;">
      <span style="display:block; width:120px; float:left"><img style="max-width:100%" src="http://www.shiningqualities.com/public/assets/img/logo/logomail.png"></span>

      <span style="display:block; width:120px; float:right">
        Date : {{date('d/m/Y')}}
      </span>
     </p><!---End-header-->
   <p><strong>Dear <?php echo $mailData['customername'] ?>, </strong></p>

      <p><?php echo $mailData['message'] ?></p>
       <br>
    
       <p><strong>Kind regards ,</strong><br>
        Shining Qualities team
        </p>
       
   </div> 
</body>
</html>

 
   
