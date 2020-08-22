<?php

namespace App\Http\Controllers\Backend\DiamondFeeds;

use App\Models\DiamondFeeds\DiamondFeed;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\DiamondFeeds\CreateResponse;
use App\Http\Responses\Backend\DiamondFeeds\ImportResponse;
use App\Http\Responses\Backend\DiamondFeeds\EditResponse;
use App\Repositories\Backend\DiamondFeeds\DiamondFeedRepository;
use App\Http\Requests\Backend\DiamondFeeds\ManageDiamondFeedRequest;
use App\Http\Requests\Backend\DiamondFeeds\CreateDiamondFeedRequest;
use App\Http\Requests\Backend\DiamondFeeds\ImportDiamondFeedRequest;
use App\Http\Requests\Backend\DiamondFeeds\StoreDiamondFeedRequest;
use App\Http\Requests\Backend\DiamondFeeds\EditDiamondFeedRequest;
use App\Http\Requests\Backend\DiamondFeeds\UpdateDiamondFeedRequest;
use App\Http\Requests\Backend\DiamondFeeds\DeleteDiamondFeedRequest;
use DB;

/**
 * DiamondFeedsController
 */
class DiamondFeedsController extends Controller
{
    /**
     * variable to store the repository object
     * @var DiamondFeedRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param DiamondFeedRepository $repository;
     */
    public function __construct(DiamondFeedRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\DiamondFeeds\ManageDiamondFeedRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageDiamondFeedRequest $request)
    {
        //print_r(config('module.diamondfeeds.table')); die; 
        return new ViewResponse('backend.diamondfeeds.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateDiamondFeedRequestNamespace  $request
     * @return \App\Http\Responses\Backend\DiamondFeeds\CreateResponse
     */
    public function create(CreateDiamondFeedRequest $request)
    {
		//print_r('sfsxvgs'); die;
        return new CreateResponse('backend.diamondfeeds.create');
    }


    public function createSingleData(CreateDiamondFeedRequest $request)
    {    
		//print_r('hello'); die;
        return view('backend.diamondfeeds.createsingledata');
    }

    public function storeSingleData(Request $request)
    {
        //Input received from the request
		//print_r('hello'); die;
        $data = $request->except(['_token']);
        //Create the model using repository create method
		//echo '<pre>'; print_r($input); die;
        $value=DB::table('diamond_feeds')->where('stock_id', $data['stock_id'])->get();
        if($value->count() == 0){
           DB::table('diamond_feeds')->insert($data);
        }

        return new RedirectResponse(route('admin.diamondfeeds.index'), ['flash_success' => trans('alerts.backend.diamondfeeds.created')]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreDiamondFeedRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreDiamondFeedRequest $request)
    {
        //Input received from the request
		print_r($request->all()); die;
        $input = $request->except(['_token']);
        //Create the model using repository create method
		//print_r($input); die;
        $this->repository->create($input);
		
		
		//print_r($input); die;
        //return with successfull message
        return new RedirectResponse(route('admin.diamondfeeds.index'), ['flash_success' => trans('alerts.backend.diamondfeeds.created')]);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\DiamondFeeds\DiamondFeed  $diamondfeed
     * @param  EditDiamondFeedRequestNamespace  $request
     * @return \App\Http\Responses\Backend\DiamondFeeds\EditResponse
     */
    public function edit(DiamondFeed $diamondfeed, EditDiamondFeedRequest $request)
    {    //echo '<pre>'; print_r($diamondfeed->toArray()); die;
        return new EditResponse($diamondfeed);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateDiamondFeedRequestNamespace  $request
     * @param  App\Models\DiamondFeeds\DiamondFeed  $diamondfeed
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateDiamondFeedRequest $request, DiamondFeed $diamondfeed)
    {   
        //echo '<pre>'; print_r($request->all()); die;
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $diamondfeed, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.diamondfeeds.index'), ['flash_success' => trans('alerts.backend.diamondfeeds.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteDiamondFeedRequestNamespace  $request
     * @param  App\Models\DiamondFeeds\DiamondFeed  $diamondfeed
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(DiamondFeed $diamondfeed, DeleteDiamondFeedRequest $request)
    {     $dimondActive = DiamondFeed::findOrFail($diamondfeed->id);
        $dimondActive->active = 0;
        $dimondActive->save();
        //echo '<pre>'; print_r($dimondActive->toArray()); die;
        //Calling the delete method on repository
        //$this->repository->delete($diamondfeed);
        //returning with successfull message
        return new RedirectResponse(route('admin.diamondfeeds.index'), ['flash_success' => trans('alerts.backend.diamondfeeds.deleted')]);
    }
    
}
