@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.diamondfeeds.management') . ' | ' . trans('labels.backend.diamondfeeds.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.diamondfeeds.management') }}
        <small>{{ trans('labels.backend.diamondfeeds.edit') }}</small>
    </h1>
@endsection

@section('content')
   
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('labels.backend.diamondfeeds.edit') }}</h3>
            </div><!--box-header with-border-->

               <form action="{{url('admin/updateReq')}}" method="GET">
                <div class="box-body">
                <div class="col-md-6 col-md-offset-3">
                <input type="hidden" name="productID" value="{{$productID}}">
                <input type="hidden" name="orderStatus" value="{{$orderStatus}}">
                 @if($orderStatus == 6)  <!----Order_status 6 for image----->
                <div class="form-group"><!--start-form-row---->
                <label for="image" class="col-lg-12 control-label required">Image URL</label>
                <div class="col-lg-12">
                <input type="text" class="form-control" name="image" id="image" placeholder="Enter Image URL" required>
                </div>
                </div><!--end-form-row---->
                @elseif($orderStatus == 7) <!----Order_status 7 for image----->
                <div class="form-group"><!--start-form-row---->
                <label for="video" class="col-lg-12 control-label required">Video URL</label>
                <div class="col-lg-12">
                <input type="text" class="form-control" name="video" id="video" placeholder="Enter Video URL" required>
                </div>
                </div><!--end-form-row---->
                @elseif($orderStatus == 8) <!----Order_status 8 for pdf Certificate----->
                <div class="form-group"><!--start-form-row---->
                <label for="pdf" class="col-lg-12 control-label required">PDF Certificate URL</label>
                <div class="col-lg-12">
                <input type="text" class="form-control" name="pdf" id="pdf" placeholder="Enter PDF URL" required>
                </div>
                </div><!--end-form-row---->
                @endif

                <div class="form-group"><!--start-form-row---->
                <div class="col-lg-12" style="margin:20px 0 50px 0">
                <button type="submit" class="btn btn-primary">Update</button>
                </div>
                </div><!--end-form-row---->


                </div><!--box-body-->

                </form>

            
        </div><!--box box-success -->
   
@endsection
