<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body{background:#f2f2f2; margin:0px; padding:0px;} 
        body h1{margin:0px 0 0px 0; font-size:15px; padding:10px 15px; text-transform:capitalize;}
        body h3{margin:0px 0 0px 0; font-size:12px; padding:10px 15px; text-transform:capitalize;}
        table{width:100%; margin:auto; background:#f2f2f2; font-size:11px; border-collapse:collapse;}
        table tr td, table tr th{border:1px solid #ccc; padding:5px 15px; text-align:left}
        table tr td span{height:35px; width:35px; overflow:hidden; display:block; float:left;}
        table tr td span img{max-width:100%;}
        table tr td:first-child, table tr th:first-child{font-weight:700; text-transform: uppercase; font-size:10px;}
    </style>
</head>
<h1><strong>Customer Name : </strong> {{$client}}</h1>
<h3>{{$subject}}</h3><table>
<tr><td>Stock Number </td><td>{{$stock_number}}</td></tr>
<tr><td>ReportNo </td><td>{{$reportno}}</td></tr>
<tr><td>shape </td><td>{{$shape}}</td></tr>
    <tr><td>carats </td><td>$mydata->carats</td></tr>
    <tr><td>col </td><td>$mydata->col</td></tr>
    '<tr>'.'<td>clar </td>'.'<td>'.$mydata->clar.'</td>'.'</tr>'.
    '<tr>'.'<td>cut </td>'.'<td>'.$mydata->cut.'</td>'.'</tr>'.
    '<tr>'.'<td>pol </td>'.'<td>'.$mydata->pol.'</td>'.'</tr>'.
    '<tr>'.'<td>symm </td>'.'<td>'.$mydata->symm.'</td>'.'</tr>'.
    '<tr>'.'<td>flo </td>'.'<td>'.$mydata->flo.'</td>'.'</tr>'.
    '<tr>'.'<td>floCol </td>'.'<td>'.$mydata->floCol.'</td>'.'</tr>'.
    '<tr>'.'<td>lwratio </td>'.'<td>'.$mydata->lwratio.'</td>'.'</tr>'.
    '<tr>'.'<td>length </td>'.'<td>'.$mydata->length.'</td>'.'</tr>'.
    '<tr>'.'<td>width </td>'.'<td>'.$mydata->width.'</td>'.'</tr>'.
    '<tr>'.'<td>height </td>'.'<td>'.$mydata->height.'</td>'.'</tr>'.
    '<tr>'.'<td>depth(%) </td>'.'<td>'.$mydata->depth.'</td>'.'</tr>'.
    '<tr>'.'<td>table(%) </td>'.'<td>'.$mydata->table.'</td>'.'</tr>'.
    '<tr>'.'<td>culet </td>'.'<td>'.$mydata->culet.'</td>'.'</tr>'.
    '<tr>'.'<td>Certificate </td>'.'<td></td>'.'</tr>'.
    '<tr>'.'<td>girdle </td>'.'<td>'.$mydata->girdle.'</td>'.'</tr>'.
    '<tr>'.'<td>eyeclean </td>'.'<td>'.$mydata->eyeclean.'</td>'.'</tr>'.
    '<tr>'.'<td>brown </td>'.'<td>'.$mydata->brown.'</td>'.'</tr>'.
    '<tr>'.'<td>green </td>'.'<td>'.$mydata->green.'</td>'.'</tr>'.
    '<tr>'.'<td>milky </td>'.'<td>'.$mydata->milky.'</td>'.'</tr>'.
    '<tr>'.'<td>video </td>'.'<td>'.'<a target="new" href="'.$mydata->video.'">'.'Click For Watch Video'.'</a>'.'</td>'.'</tr>'.
    '<tr>'.'<td>video_frames </td>'.'<td>'.$mydata->video_frames.'</td>'.'</tr>'.
    '<tr>'.'<td>image </td>'.'<td>'.'<span><a target="new" href="'.$mydata->image.'"><img src="'.$mydata->image.'"></a></span>'.'</td>'.'</tr>'.
    '<tr>'.'<td>mine_of_origin </td>'.'<td>'.$mydata->mine_of_origin.'</td>'.'</tr>'.
    '<tr>'.'<td>canada_mark_eligble </td>'.'<td>'.$mydata->canada_mark_eligble.'</td>'.'</tr>'.
    '<tr>'.'<td>Dimension(mm) </td>'.'<td>'.$mydata->length.' X '.$mydata->width.' X '.$mydata->height.'</td>'.'</tr>'.
    '<tr>'.'<td>Ratio(%) </td>'.'<td>'.number_format(floor(($mydata->length/$mydata->width)*100)/100,2, '.', '').'</td>'.'</tr>'.
    '</table></body>
</html>

 
   
