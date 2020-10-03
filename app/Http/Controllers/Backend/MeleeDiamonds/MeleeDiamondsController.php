<?php

namespace App\Http\Controllers\Backend\MeleeDiamonds;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Backend\MeleeDiamonds\MeleeDiamondsRepository;
use App\Models\MeleeDiamonds\MeleeDiamond;
use Yajra\DataTables\Facades\DataTables;
use DB;
use Auth;

class MeleeDiamondsController extends Controller
{
    
    public function __construct(MeleeDiamondsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request){
          $currency = DB::table('currencies')->where('code', Auth::user()->currency_code)->first();
          $price_arr = $this->repository->get_currency();
          $rate = (array) $price_arr['rates'];
          $current_currency = $rate[$currency->code];
          $symbol = $currency->symbol; 
          //print_r($current_currency);die;
         $shape = 'ROUND';
      $data = $this->repository->meleeDiamondList($shape);
     //echo '<pre>data'; print_r($request->ajax()); die;;
        if ($request->ajax()) {
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('EF_VS', function($row) use($symbol, $current_currency) {return $symbol.''.round($current_currency*$row->EF_VS,2);})
                    ->addColumn('GH_VS', function($row) use($symbol, $current_currency) {return $symbol.''.round($current_currency*$row->GH_VS,2);})
                    ->addColumn('EF_SI1', function($row) use($symbol, $current_currency) {return $symbol.''.round($current_currency*$row->EF_SI1,2);})
                    ->addColumn('GH_SI1', function($row) use($symbol, $current_currency) {return $symbol.''.round($current_currency*$row->GH_SI1,2);})
                    ->addColumn('EF_SI2', function($row) use($symbol, $current_currency) {return $symbol.''.round($current_currency*$row->EF_SI2,2);})
                    ->addColumn('GH_SI2', function($row) use($symbol, $current_currency) {return $symbol.''.round($current_currency*$row->GH_SI2,2);})
                    ->addColumn('IJ_SI1', function($row) use($symbol, $current_currency) {return $symbol.''.round($current_currency*$row->IJ_SI1,2);})

                    ->addColumn('action', function($row){
                           $btn = '<a href="'.url('admin/addMeleeDiamond').'/'.$row->id.'/'.$row->shape.'" class="edit btn btn-primary btn-sm"><i class="fa fa-edit"></i></a> <form id="submitdelete"  action="'.url('admin/deleteMeleeDiamond').'" method="get"><button type="submit" id="delbutton" name="id" value="'.$row->id.'" class="edit btn btn-danger btn-sm"><i class="fa fa-trash"></i></button> </form> ';
                            return $btn;
                    })
                    ->rawColumns(['action', 'EF_VS', 'GH_VS', 'EF_SI1', 'GH_SI1', 'EF_SI2', 'GH_SI2', 'IJ_SI1'])
                    ->make(true);
        }
       
        return view('backend.meleediamonds.index');

    }

    public function princessList(Request $request){
        $currency = DB::table('currencies')->where('code', Auth::user()->currency_code)->first();
          $price_arr = $this->repository->get_currency();
          $rate = (array) $price_arr['rates'];
          $current_currency = $rate[$currency->code];
          $symbol = $currency->symbol; 
        $shape = 'PRINCESS';
          $i=1;
   $data = $this->repository->meleeDiamondList($shape);
    //echo '<pre>data'; print_r($request->ajax()); die;;
       if ($request->ajax()) {
           return Datatables::of($data)
                   ->addIndexColumn()
                   ->addColumn('EF_VS', function($row) use($symbol, $current_currency) {return $symbol.''.round($current_currency*$row->EF_VS,2);})
                    ->addColumn('GH_VS', function($row) use($symbol, $current_currency) {return $symbol.''.round($current_currency*$row->GH_VS,2);})
                    ->addColumn('EF_SI', function($row) use($symbol, $current_currency) {return $symbol.''.round($current_currency*$row->EF_SI,2);})
                    ->addColumn('GH_SI', function($row) use($symbol, $current_currency) {return $symbol.''.round($current_currency*$row->GH_SI,2);})
                   ->addColumn('action', function($row){
                          $btn = '<a href="'.url('admin/addMeleeDiamond').'/'.$row->id.'/'.$row->shape.'" class="edit btn btn-primary btn-sm"><i class="fa fa-edit"></i></a> <form id="submitdelete" action="'.url('admin/deleteMeleeDiamond').'" method="get"><button type="submit" id="delbutton" name="id" value="'.$row->id.'" class="edit btn btn-danger btn-sm"><i class="fa fa-trash"></i></button> </form>';
                           return $btn;
                   })
                   ->rawColumns(['action', 'EF_VS', 'GH_VS', 'EF_SI', 'GH_SI'])
                   ->make(true);
       }
      
       return view('backend.meleediamonds.princesslist');

   }

public function addMeleeDiamond(Request $request){
    return view('backend.meleediamonds.add', [
        'meleediamonds' => '',
        'round' => ''
    ]);
} 

public function editMeleeDiamond($id = '', $shape = ''){
    $meleediamonds = $this->repository->meleeDiamondSingleData($id, $shape);
   // echo '<pre>'; print_r($meleediamonds->toArray()); die;
    return view('backend.meleediamonds.add',[
          'meleediamonds' => $this->repository->meleeDiamondSingleData($id, $shape),
        ]);   
}


public function submitMeleeDiamond(Request $request){
    $shape = $request->shape;
    $weight = MeleeDiamond::where('shape', $shape)->where('weight', $request->weight)->count();
    $size = MeleeDiamond::where('shape', $shape)->where('weight', $request->size)->count();
    
       $meleediamonds = new MeleeDiamond();
        //echo '<pre>'; print_r($request->all()); die;
         $redirectURL = '';

         if($weight > 0 || $size > 0){
            toastr()->warning('Weight & Size Not Allowed Duplicate Entry'); 
            $redirectURL = back(); 
        }else{
         if($shape=='ROUND'){
            $meleediamonds->shape = $request->shape;
            $meleediamonds->weight = $request->weight;
            $meleediamonds->size = $request->size;
            $meleediamonds->EF_VS = $request->EF_VS;
            $meleediamonds->GH_VS = $request->GH_VS;
            $meleediamonds->EF_SI1 = $request->EF_SI1;
            $meleediamonds->GH_SI1 = $request->GH_SI1;
            $meleediamonds->EF_SI2 = $request->EF_SI2;
            $meleediamonds->GH_SI2 = $request->GH_SI2;
            $meleediamonds->IJ_SI1 = $request->IJ_SI1;
            $redirectURL = redirect('admin/meleediamonds');
         }else if($shape=='PRINCESS'){
            $meleediamonds->shape = $request->shape;
            $meleediamonds->weight = $request->weight;
            $meleediamonds->size = $request->size;
            $meleediamonds->EF_VS = $request->EF_VS;
            $meleediamonds->GH_VS = $request->GH_VS;
            $meleediamonds->EF_SI = $request->EF_SI;
            $meleediamonds->GH_SI = $request->GH_SI;
            $redirectURL = redirect('admin/princessList');   
         }else{
            $redirectURL = redirect('admin/meleediamonds'); 
            }

            if($meleediamonds->save()){
                toastr()->success('Data Added Successfully');
                return $redirectURL;
            }else{
                toastr()->warning('Not Update');
                return redirect('admin/addMeleeDiamond');
                }
            }

        return $redirectURL;
        }



public function updateMeleeDiamond(Request $request){
    $id = $request->id;
    $shape = $request->shape;
    $meleediamonds = $this->repository->meleeDiamondSingleData($id, $shape);
        //echo '<pre>'; print_r($request->all()); die;

    $weight = MeleeDiamond::where('shape', $shape)->where('weight', $request->weight)->count();
    $size = MeleeDiamond::where('shape', $shape)->where('weight', $request->size)->count();
         $redirectURL = '';
        //  if($weight > 0 || $size > 0){
        //     toastr()->warning('Weight & Size Not Allowed Duplicate Entry'); 
        //     $redirectURL = back();
        //  }else{
         if($shape=='ROUND'){
            $meleediamonds->shape = $request->shape;
            $meleediamonds->weight = $request->weight;
            $meleediamonds->size = $request->size;
            $meleediamonds->EF_VS = $request->EF_VS;
            $meleediamonds->GH_VS = $request->GH_VS;
            $meleediamonds->EF_SI1 = $request->EF_SI1;
            $meleediamonds->GH_SI1 = $request->GH_SI1;
            $meleediamonds->EF_SI2 = $request->EF_SI2;
            $meleediamonds->GH_SI2 = $request->GH_SI2;
            $meleediamonds->IJ_SI1 = $request->IJ_SI1;
            $redirectURL = redirect('admin/meleediamonds');
         }else if($shape=='PRINCESS'){
            $meleediamonds->shape = $request->shape;
            $meleediamonds->weight = $request->weight;
            $meleediamonds->size = $request->size;
            $meleediamonds->EF_VS = $request->EF_VS;
            $meleediamonds->GH_VS = $request->GH_VS;
            $meleediamonds->EF_SI = $request->EF_SI;
            $meleediamonds->GH_SI = $request->GH_SI;
            $redirectURL = redirect('admin/princessList');   
         }else{
            $redirectURL = redirect('admin/meleediamonds'); 
            }
            
            if($meleediamonds->save()){
                toastr()->success('Data Updated Successfully');
                return $redirectURL;
            }else{
                toastr()->warning('Not Update');
                return redirect('admin/addMeleeDiamond/'.$id.'/'.$shape);
                }
            

            //}
           
            return $redirectURL;
          
             }

   //--------------------------
   
   public function deleteMeleeDiamond(Request $request){
       $id = $request->id;
    $meleediamonds = MeleeDiamond::findOrFail($id);
    //echo '<pre>'; print_r($request->all()); die;
    if($meleediamonds->delete()){
        toastr()->success('Data Remove Successfully');
    }else{
        toastr()->warning('Not Deleted');
        }

    return back();
   }




}
