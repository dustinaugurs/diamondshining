<?php

namespace App\Repositories\Backend\DiamondFeeds;

use App\Exceptions\GeneralException;
use App\Models\DiamondFeeds\DiamondFeed;
use App\Repositories\BaseRepository;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

use App\Models\Access\User\User;
use App\Models\Currency;

/**
 * Class DiamondFeedRepository.
 */
class DiamondFeedRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = DiamondFeed::class;
    /**
     * diamond_feed file path.
     *
     * @var string
     */
    protected $feed_path;

    /**
     * Storage Class Object.
     *
     * @var \Illuminate\Support\Facades\Storage
     */
    protected $storage;
    /**
     * Constructor.
     */
    public function __construct()
    {
        $time            = Carbon::now();
        $year            = $time->year;
        $month           = $time->month;
        $day             = $time->day;
        $this->feed_path = 'feed' . DIRECTORY_SEPARATOR . $year . DIRECTORY_SEPARATOR . $month . DIRECTORY_SEPARATOR . $day . DIRECTORY_SEPARATOR;
        $this->storage   = Storage::disk('public');
    }
    /**
     * This method is used by Table Controller
     * For getting the table data to show in
     * the grid
     * @return mixed
     */
    public function testdata(){
        $mydata = DiamondFeed::where('active', 0)->get();
        return $mydata ; 
    }

    public function get_currency(){
        $client = new \GuzzleHttp\Client();     
        // Create a request
        $res = $client->get('https://api.exchangeratesapi.io/latest?base=USD');
        // Get the actual response without headers
        $response =  $res->getBody();
          $aa= (array) json_decode($response);
          return $aa;
      }

    public function getForDataTable()
    {   
        return $this->query()->where(config('module.diamond_feeds.table') . '.active', 1)
            ->select([
                config('module.diamond_feeds.table') . '.id',
                config('module.diamond_feeds.table') . '.stock_id',
                config('module.diamond_feeds.table') . '.ReportNo',
                config('module.diamond_feeds.table') . '.shape',
                config('module.diamond_feeds.table') . '.carats',
                config('module.diamond_feeds.table') . '.col',
                config('module.diamond_feeds.table') . '.clar',
                config('module.diamond_feeds.table') . '.cut',
                config('module.diamond_feeds.table') . '.pol',
                config('module.diamond_feeds.table') . '.symm',
                config('module.diamond_feeds.table') . '.flo',
                config('module.diamond_feeds.table') . '.floCol',
                config('module.diamond_feeds.table') . '.lwratio',
                config('module.diamond_feeds.table') . '.length',
                config('module.diamond_feeds.table') . '.width',
                config('module.diamond_feeds.table') . '.height',
                config('module.diamond_feeds.table') . '.depth',
                config('module.diamond_feeds.table') . '.table',
                config('module.diamond_feeds.table') . '.culet',
                config('module.diamond_feeds.table') . '.lab',
                config('module.diamond_feeds.table') . '.girdle',
                config('module.diamond_feeds.table') . '.eyeclean',
                config('module.diamond_feeds.table') . '.brown',
                config('module.diamond_feeds.table') . '.green',
                config('module.diamond_feeds.table') . '.milky',
                config('module.diamond_feeds.table') . '.actual_supplier',
                config('module.diamond_feeds.table') . '.discount',
                config('module.diamond_feeds.table') . '.price',
                config('module.diamond_feeds.table') . '.price_per_carat',
                config('module.diamond_feeds.table') . '.video',
                config('module.diamond_feeds.table') . '.video_frames',
                config('module.diamond_feeds.table') . '.image',
                config('module.diamond_feeds.table') . '.pdf',
                config('module.diamond_feeds.table') . '.mine_of_origin',
                config('module.diamond_feeds.table') . '.canada_mark_eligble',
				config('module.diamond_feeds.table') . '.supplier_name',
                
                config('module.diamond_feeds.table') . '.active',
                config('module.diamond_feeds.table') . '.created_at',
                config('module.diamond_feeds.table') . '.updated_at',
            ]);
    }

    /**
     * For Creating the respective model in storage
     *
     * @param array $input
     * @throws GeneralException
     * @return bool
     */
    public function create(array $input)
    {
		//print_r('sdcvdbf'); die;
		
        $filename = $input['feed_file']->getClientOriginalName();
        $ext      = \File::extension($filename);
		
        if (!empty($input['feed_file']) && $ext === 'csv' || $ext = 'xlsx') {

            $input['feed_file'] = $this->uploadFeedFile($input['feed_file']);

            // $data = array_map('str_getcsv', file(public_path ().'\\storage\\'. $this->feed_path . $input['feed_file']));
            // $csv_data = array_slice($data, 0, 2);

            // dd($data);

            // dd(storage_path ().'\\'.$this->feed_path . $input['feed_file']);
            if (($handle = fopen(storage_path() . '//uploads//' . $this->feed_path . $input['feed_file'], 'r')) !== false) {

                $importData_arr = array();
                $i              = 0;
			//print_r( $input['feed_file']); die;
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
		//print_r($insertData); die;
                    DiamondFeed::insertData($insertData);

                }
            }
        }

        // if (DiamondFeed::create($input)) {
        //     return true;
        // }
        // throw new GeneralException(trans('exceptions.backend.diamondfeeds.create_error'));
    }
    /*
     * Upload logo image
     */

    //  public function createSingleRecordAll($insertData){
    //     DiamondFeed::insertData($insertData);
    //     return true;
    //  }

    public function uploadFeedFile($feedFile)
    {
        $path = $this->feed_path;

        $file_name = time() . $feedFile->getClientOriginalName();

        $this->storage->put($path . $file_name, file_get_contents($feedFile->getRealPath()));

        return $file_name;
    }
    /**
     * For updating the respective Model in storage
     *
     * @param DiamondFeed $diamondfeed
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(DiamondFeed $diamondfeed, array $input)
    {
        if ($diamondfeed->update($input)) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.diamondfeeds.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param DiamondFeed $diamondfeed
     * @throws GeneralException
     * @return bool
     */
    public function delete(DiamondFeed $diamondfeed)
    {
        if ($diamondfeed->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.diamondfeeds.delete_error'));
    }
}
