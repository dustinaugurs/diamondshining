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
    .wrapper table tr > td{ border:1px solid #DDD; padding:8px 10px; }
    .wrapper table tr > td.messagebox{text-transform:uppercase;}
    </style>
</head>
<body>
   <div class="wrapper">
       <h4>Hi I am  <?php echo $contact['name']; ?>,</h4>
       <p>Please Find My Conatct Details From Here : </p>
       <br><br>
   <table>
   <tr> <td class="messagebox">Email Address : </td> <td> <?php echo $contact['email']; ?> </td> </tr>  
   <tr> <td class="messagebox">Subject : </td> <td> <?php echo $contact['subject']; ?> </td> </tr>  
   <tr> <td class="messagebox" colspan="2">Important Message : </td></tr> 
   <tr><td colspan="2"> <?php echo $contact['message']; ?> </td> </tr>  
   </table>
   </div> 
</body>
</html>

 
   
