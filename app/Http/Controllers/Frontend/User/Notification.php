<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Notification as Notification_model;
use App\User;
use Notification as Mail_Notification;
use App\Notifications\Notifications;

class Notification extends Controller{
	
	public function index(){
	  
	}
	  public function notification($tokenList, $noti_detail){
        /* echo "<pre>";
        print_r($noti_detail->file_url);exit;  */
        $token = $tokenList[1];
        $server_key = "AIzaSyD5KpnMe4sQKF70AW8haB274HiGgX9heRQ";
        $fcmUrl = 'https://fcm.googleapis.com/fcm/send';
        $content = substr(strip_tags($noti_detail->content) , 0 , 100);
        $notification = ['title' => $noti_detail->title,'sound' => true, 'body'=>$content , 'image'=>$noti_detail->file_url];
        $more_data = ['image'=>$noti_detail->file_url , 'url'=>$noti_detail->url , 'body'=>$content];
        $extraNotificationData = ["message"=>$notification,"moredata" =>$more_data];
        $fcmNotification = [
            'registration_ids'=>$tokenList, //multple token array
            //'to'        => $token, //single token
            'notification' => $notification,
            'data' => $extraNotificationData
        ];
        $headers = [
            'Authorization:key='.$server_key,
            'Content-Type: application/json'
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$fcmUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
        $result = curl_exec($ch);
        curl_close($ch);
        return true;
    }
  
}
