<?php

namespace App\Http\Controllers\Backend\DiamondTemplates;

use App\Models\DiamondTemplates\DiamondTemplate;
use App\Models\AddMultiplePrice\AddMultiplePrice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Models\DiamondFeeds\DiamondFeed;
use App\Http\Responses\Backend\DiamondTemplates\CreateResponse;
use App\Http\Responses\Backend\DiamondTemplates\EditResponse;
use App\Repositories\Backend\DiamondTemplates\DiamondTemplateRepository;
use App\Http\Requests\Backend\DiamondTemplates\ManageDiamondTemplateRequest;
use App\Http\Requests\Backend\DiamondTemplates\CreateDiamondTemplateRequest;
use App\Http\Requests\Backend\DiamondTemplates\StoreDiamondTemplateRequest;
use App\Http\Requests\Backend\DiamondTemplates\EditDiamondTemplateRequest;
use App\Http\Requests\Backend\DiamondTemplates\UpdateDiamondTemplateRequest;
use App\Http\Requests\Backend\DiamondTemplates\DeleteDiamondTemplateRequest;
use DB;

/**
 * DiamondTemplatesController
 */
class DiamondTemplatesController extends Controller
{
    /**
     * variable to store the repository object
     * @var DiamondTemplateRepository
     */
    protected $repository;

    /**
     * contructor to initialize repository object
     * @param DiamondTemplateRepository $repository;
     */
    public function __construct(DiamondTemplateRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  App\Http\Requests\Backend\DiamondTemplates\ManageDiamondTemplateRequest  $request
     * @return \App\Http\Responses\ViewResponse
     */
    public function index(ManageDiamondTemplateRequest $request)
    {
        return new ViewResponse('backend.diamondtemplates.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @param  CreateDiamondTemplateRequestNamespace  $request
     * @return \App\Http\Responses\Backend\DiamondTemplates\CreateResponse
     */
    public function create(CreateDiamondTemplateRequest $request)
    {
        $diamondFeeds = DiamondFeed::getSelectData('stock_id');
        // dd($diamondFeeds);
        return new CreateResponse($diamondFeeds);
    }
	
	// show multiple price
	  public function addPrice(Request $request , $id)
    {        $all_detail = DB::table('add_multiple_price')->where('temp_id' , $id)->get(); 
			 $single_detail =  DiamondTemplate::find($id);
			 
			 return view('backend.diamondtemplates.price',['detail'=> $single_detail,'all_detail'=>$all_detail]);
    }
	
	
	
	  public function savePrice(Request $request)
    {
		$vat_from_usd= $request->vat_from_usd;
		$vat_to_usd= $request->vat_to_usd;
        $multiplier_usd = $request->multiplier_usd;
        $temp_id = $request->temp_id;
        $id = $request->temp_id;

        $expvat_from_usd = explode(',', implode(',',$vat_from_usd));
        $exptemp_id = explode(',', implode(',',$temp_id));
        $expvat_to_usd = explode(',', implode(',',$vat_to_usd));
        $multiplier_usd = explode(',', implode(',',$multiplier_usd));
        
        $priceEdit = AddMultiplePrice::whereIn('temp_id', $exptemp_id)
                                    ->whereIn('vat_from_usd', $expvat_from_usd)
                                    ->whereIn('vat_to_usd', $expvat_to_usd)
                                    ->whereIn('multiplier_usd', $multiplier_usd)
                                    ->count();
        //print_r($priceEdit).'-'; die;
        if($priceEdit>=1){
        toastr()->warning($priceEdit.' Record, Price Range already added, Please check'); 
        return back(); 
        }
    
		foreach($temp_id as $key=>$no){
		$data = array(
			'temp_id'       => $no,
			'vat_from_usd'  => $vat_from_usd[$key],
			'vat_to_usd'     => $vat_to_usd[$key],
			'multiplier_usd'  => $multiplier_usd[$key],                    
           );   
		DB::table('add_multiple_price')->insert($data);
			
        }
        toastr()->success('Price Successfully Added');
        //return new RedirectResponse(route('admin.diamondtemplates.index'), ['flash_success' => trans('alerts.backend.diamondtemplates.created')]);
        return back();

    }


    public function editAndUpdatePrice(Request $request){
        $id = $request->editParenttemp_id;
        $edittemp_id = $request->edittemp_id;
        $editvat_from_usd = $request->editvat_from_usd;
        $editvat_to_usd = $request->editvat_to_usd;
        $editmultiplier_usd = $request->editmultiplier_usd;


        $priceEdit = AddMultiplePrice::where('id', $edittemp_id)->first();
        $priceEdit->vat_from_usd  = $editvat_from_usd;
		$priceEdit->vat_to_usd     = $editvat_to_usd;
        $priceEdit->multiplier_usd  = $editmultiplier_usd;

        // $priceCheck = AddMultiplePrice::where('temp_id', $id)
        //                             ->where('vat_from_usd', $editvat_from_usd)
        //                             ->where('vat_to_usd', $editvat_to_usd)
        //                             ->where('multiplier_usd', $editmultiplier_usd)
        //                             ->count();
        // //print_r($priceCheck).'-'; die;
        // if($priceCheck>=1){
        // //toastr()->warning($priceCheck.' Record, Price Range already added, Please check'); 
        // //return back(); 
        // return redirect('admin/diamondtemplates/addPrice/"'..'"');
        // }
        $priceEdit->save();

        //echo '<pre>', print_r($priceEdit->toArray()); die;
     
        $all_detail = DB::table('add_multiple_price')->where('temp_id' , $id)->get(); 
			 $single_detail =  DiamondTemplate::find($id);
			 
			 return view('backend.diamondtemplates.price_component',['detail'=> $single_detail,'all_detail'=>$all_detail]);
          }

    public function deletePrice(Request $request){
        $id = $request->editParenttemp_id;
        $edittemp_id = $request->edittemp_id; 
        $priceEdit = AddMultiplePrice::where('id', $edittemp_id)->first();
        $priceEdit->delete();
        $all_detail = DB::table('add_multiple_price')->where('temp_id' , $id)->get(); 
        $single_detail =  DiamondTemplate::find($id);

        return view('backend.diamondtemplates.price_component',['detail'=> $single_detail,'all_detail'=>$all_detail]);
            } 


    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreDiamondTemplateRequestNamespace  $request
     * @return \App\Http\Responses\RedirectResponse
     */
    public function store(StoreDiamondTemplateRequest $request)
    {
	
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
       $this->repository->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.diamondtemplates.index'), ['flash_success' => trans('alerts.backend.diamondtemplates.created')]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Models\DiamondTemplates\DiamondTemplate  $diamondtemplate
     * @param  EditDiamondTemplateRequestNamespace  $request
     * @return \App\Http\Responses\Backend\DiamondTemplates\EditResponse
     */
    public function edit(DiamondTemplate $diamondtemplate, EditDiamondTemplateRequest $request)
    {
        return new EditResponse($diamondtemplate);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateDiamondTemplateRequestNamespace  $request
     * @param  App\Models\DiamondTemplates\DiamondTemplate  $diamondtemplate
     * @return \App\Http\Responses\RedirectResponse
     */
    public function update(UpdateDiamondTemplateRequest $request, DiamondTemplate $diamondtemplate)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $diamondtemplate, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.diamondtemplates.index'), ['flash_success' => trans('alerts.backend.diamondtemplates.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteDiamondTemplateRequestNamespace  $request
     * @param  App\Models\DiamondTemplates\DiamondTemplate  $diamondtemplate
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(DiamondTemplate $diamondtemplate, DeleteDiamondTemplateRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($diamondtemplate);
        //returning with successfull message
        return new RedirectResponse(route('admin.diamondtemplates.index'), ['flash_success' => trans('alerts.backend.diamondtemplates.deleted')]);
    }
    
}
