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
use PDF;



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


  public function scrapingfromhtmlpdf($url='', $filename=''){
    $context = stream_context_create(
    array(
    "http" => array(
    "header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36"
                  )
         )
                                   );
    $pdfcontent = file_get_contents($url, false, $context); 
    //print_r($content); die;
    $pdf_invoice_file_path = public_path('webscrap/zzz-dom/').$filename;

      $pdf = PDF::loadHTML($pdfcontent);
      $pdf->save($pdf_invoice_file_path);
       $pdf->stream();
    return $pdf;
   }

  public function pdfWithoutExtension($url='', $filename=''){
      $context = stream_context_create(
      array(
      "http" => array(
      "header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36"
                    )
           )
                                     );
      $pdfcontent = file_get_contents($url, false, $context); 
      header('Content-Type: application/pdf');
      header('Content-Length: '.strlen($pdfcontent));
      header('Content-disposition: inline; filename="' . $filename . '"');
      header('Cache-Control: public, must-revalidate, max-age=0');
      header('Pragma: public');
      header('Expires: Sat, 26 Jul 1997 05:00:00 GMT');
      header('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT');
      //print_r($pdfcontent); die;
      $getpdf = copy($url, public_path('webscrap/xyz') . DIRECTORY_SEPARATOR . $filename);
      return $getpdf;
  }

              
	  public function index(Request $request){
      //$url1 = 'https://www.igi.org/viewpdf.php?r=425072875';
      // $filename = time().'.pdf'; 
      // $file = $this->pdfWithoutExtension($url1, $filename);

      // $url = 'https://www.gia.edu/report-check?reportno=1349200880';
      // $filename1 = time().'.pdf'; 
      // $file = $this->scrapingfromhtmlpdf($url1, $filename1);
      //  echo $file; die;
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
$downloadUrl=curl_exec($ch);
//$downloadUrl= 'D:\xamp7.2.33\htdocs\summerbydiamondwd\summersby202009300803-1.csv';
$file = file_get_contents($downloadUrl);
 $fsave = file_put_contents($saveto.'/'.'summersby_'.date('d-m-Y').'_'.time().'.csv', $file);
 echo '<p style="text-align:center"> Your Latest file <b>'.$latestcsv.'</b> download successfully'.'</p>';

    //========================  
     
  
      if (!empty($input) && $ext === 'csv' || $ext = 'xlsx') {
        
          if (($handle = fopen(public_path('csvautoupload\\') . $input, 'r')) !== false) {

           //echo '<pre>'; print_r(fgetcsv($handle, 1000, ',')); die;

              $importData_arr = array();
              $i              = 0;
              while (($fileData = fgetcsv($handle, 1000, ',')) !== false) {
              //echo '<pre>'; print_r($fileData); die;
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
              //echo '<pre>';print_r($importData_arr); die;
              foreach ($importData_arr as $importData) {
                $videoFileName = NULL;
                $imgFileName = NULL;
               $pdfFileName = NULL;
                //video save
               if(!empty($importData[28])){
                $videoFileName = 'video_'.$importData[1].'.'.\File::extension($importData[28]);
               if(!empty(\File::extension($importData[28]))){
               copy($importData[28], public_path('webscrap/video') . DIRECTORY_SEPARATOR . $videoFileName);
                  }}
               //pdf save
               if(!empty($importData[31]) || $importData[31] !== 'TRUE'){
                if(\File::extension($importData[31])=='pdf'){
               $pdfFileName = 'pdf_'.$importData[1].'.'.\File::extension($importData[31]);
               copy($importData[31], public_path('webscrap/pdf') . DIRECTORY_SEPARATOR . $pdfFileName);
                   }}
               //image save
               if(!empty($importData[30])){
               $imgFileName = 'image_'.$importData[1].'.'.\File::extension($importData[30]);
               copy($importData[30], public_path('webscrap/image') . DIRECTORY_SEPARATOR . $imgFileName);
                 }
                //die;

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
                      "lwratio"             => $importData[13]/$importData[14],
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
                      "actual_supplier"     => $importData[34],
                      "discount"            => $importData[25],
                      "price"               => $importData[26],
                      "price_per_carat"     => $importData[27],
                      "video"               => $importData[28],
                      "video_frames"        => $importData[29],
                      "image"               => $importData[30],
                      "pdf"                 => $importData[31],
                      "mine_of_origin"      => $importData[32],
                      "canada_mark_eligble" => $importData[33],
                      "supplier_name"       => $importData[34],
                      "location"            => $importData[35],
                      "is_returnable"       => $importData[36],
                      "supplier_id"         => $importData[37],
                       "video_url"          => $videoFileName, 
                       "img_url"            => $imgFileName, 
                       "pdf_url"            => $pdfFileName, 
                       "uniqueId"           => $importData[5].'Z'.$importData[1].'X',
                       
                        );

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
