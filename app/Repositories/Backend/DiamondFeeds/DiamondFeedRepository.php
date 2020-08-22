<?php

namespace App\Repositories\Backend\DiamondFeeds;

use App\Exceptions\GeneralException;
use App\Models\DiamondFeeds\DiamondFeed;
use App\Repositories\BaseRepository;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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
    public function getForDataTable()
    {   
        return $this->query()->where(config('module.diamond_feeds.table') . '.active', 0)
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
						"supplier_name"      =>  $importData[35],
						"location"           =>  $importData[36],
						"is_returnable"       =>  $importData[37],
						"supplier_id"       =>  $importData[38]);
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
