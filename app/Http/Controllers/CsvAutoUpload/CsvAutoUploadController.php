<?php

namespace App\Http\Controllers\CsvAutoUpload;

use App\Http\Controllers\Controller;
use App\Models\Settings\Setting;
use DB;
use Auth;
use Notification;
use App\Notifications\Frontend\Enquire;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;

use App\Models\DiamondFeeds\DiamondFeed;
use App\Models\Orders\Order;
use App\Models\Currency;

use Illuminate\Pagination\Paginator;

use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

use File;



/**
 * Class FrontendController.
 */
class CsvAutoUploadController extends Controller
{

  const MODEL = DiamondFeed::class;
  protected $feed_path;
  protected $storage;

  public function __construct()
  {
      $time            = Carbon::now();
      $year            = $time->year;
      $month           = $time->month;
      $day             = $time->day;
      $this->feed_path = 'feed' . DIRECTORY_SEPARATOR . $year . DIRECTORY_SEPARATOR . $month . DIRECTORY_SEPARATOR . $day . DIRECTORY_SEPARATOR;
      $this->storage   = Storage::disk('public');
  }

    
	  public function index(Request $request){
//-----checking-internet--------
$host_name = 'www.google.com';
$port_no = '80';
$st = (bool)@fsockopen($host_name, $port_no, $err_no, $err_str, 10);
if ($st) {
    //echo '<p style="text-align:center">You are connected to internet.</p>';
} else {
    echo '<p style="text-align:center">Sorry! You are offline. Check your internet connection.</p>';
    die;
}
//------------------------------ 
    $folderpath = scandir(public_path('csvautoupload'), SCANDIR_SORT_DESCENDING);
     $filelists = array_slice($folderpath,2);
     $latestcsv = $filelists['0']; 
     //print_r($latestcsv); die;
		 $input = $latestcsv;
      // $filename = $latestcsv->getClientOriginalName();
      $ext      = \File::extension($latestcsv);
 //====================================
    $csvUrl = 'https://integrations.nivoda.net/api/file/download/93aec95b-7652-4c41-ba68-eabb473de064';
    $saveto = public_path('csvautoupload');
    
//print_r($saveto); die;
$ch = curl_init ($csvUrl);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
//$downloadUrl=curl_exec($ch);
$downloadUrl= 'C:\xampp\htdocs\augurslp-diamondwtvy\csvfile.txt';
$file = file_get_contents($downloadUrl);
 $fsave = file_put_contents($saveto.'/'.'summersby_'.date('d-m-Y').'_'.time().'.csv', $file);
 echo '<p style="text-align:center"> Your Latest file <b>'.$latestcsv.'</b> download successfully'.'</p>';
 //print_r($file);
  // die;
  
    //========================  
     
  
      if (!empty($input) && $ext === 'csv' || $ext = 'xlsx') {
        
          if (($handle = fopen(public_path('csvautoupload\\') . $input, 'r')) !== false) {

          // echo '<pre>'; print_r(fgetcsv($handle, 1000, ',')); die;

              $importData_arr = array();
              $i              = 0;
              while (($fileData = fgetcsv($handle, 1000, ',')) !== false) {
          //print_r($fileData); die;
                  $num = count($fileData);
                //  if($num !== 34){
                      //throw new GeneralException('Invalid CSV File Data');
                 // }
                  // Skip first row (Remove below comment if you want to skip the first row)
                  if ($i == 0) {
                      $i++;
                      continue;
                  }
                  for ($c = 0; $c < $num; $c++) {
                      $importData_arr[$i][] = $fileData[$c];
                  }
                  $i++;

              }
              fclose($handle);
              foreach ($importData_arr as $importData) {

                  $insertData = array(
                      "stock_id"            => $importData[1],
                      "ReportNo"            => $importData[2],
                      "shape"               => $importData[3],
                      "carats"              => $importData[4],
                      "col"                 => $importData[5],
                      "clar"                => $importData[6],
                      "cut"                 => $importData[7],
                      "pol"                 => $importData[8],
                      "symm"                => $importData[9],
                      "flo"                 => $importData[10],
                      "floCol"              => $importData[11],
                      "lwratio"             => $importData[12],
                      "length"              => $importData[13],
                      "width"               => $importData[14],
                      "height"              => $importData[15],
                      "depth"               => $importData[16],
                      "table"               => $importData[17],
                      "culet"               => $importData[18],
                      "lab"                 => $importData[19],
                      "girdle"              => $importData[20],
                      "eyeclean"            => $importData[21],
                      "brown"               => $importData[22],
                      "green"               => $importData[23],
                      "milky"               => $importData[24],
                      "actual_supplier"     => $importData[25],
                      "discount"            => $importData[26],
                      "price"               => $importData[27],
                      "price_per_carat"     => $importData[28],
                      "video"               => $importData[29],
                      "video_frames"        => $importData[30],
                      "image"               => $importData[31],
                      "pdf"                 => $importData[32],
                      "mine_of_origin"      => $importData[33],
                      "canada_mark_eligble" => $importData[34],
                      "supplier_name"       => $importData[35],
                      "location"            => $importData[36],
                      "is_returnable"       => $importData[37],
                      "supplier_id"         => $importData[38]);
  //print_r($insertData); die;
                  DiamondFeed::insertData($insertData);
              }
              echo '<p style="text-align:center">Data Inserted/Updated Successfully</p>';
          }else{
            echo '<p style="text-align:center">Data Not Inserted/Updated Successfully</p>';
          }
      }else{
        echo '<p style="text-align:center">Please check file Or Path / or File Extension</p>';
      }

     
      
      if(file_exists($saveto.'/'.$latestcsv)){
        unlink($saveto.'/'.$latestcsv);
        echo '<p style="text-align:center">Your <b>'.$latestcsv.'</b> old file remove successfully'.'</p>';
      } //die;
      //-----------------
      }

//=====---End-Order-request-ajax-function----====== 
public function update(DiamondFeed $diamondfeed, array $input)
{  
  //print_r('deepak'); die;
    if ($diamondfeed->update($input)) {
        return true;
    }

}

//=======================================
   
	 
   	  
	
	
    
    
	 
}
