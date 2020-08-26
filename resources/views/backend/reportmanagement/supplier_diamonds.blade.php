@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.reports.heading'))

@section('page-header')
    <h1>{{ trans('labels.backend.reports.heading') }}</h1>
@endsection

@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.reports.suppliername') }}  <strong>{{ $supplier_name }}</strong></h3>

            
        </div><!--box-header with-border-->

        <div class="box-body">


        <div class=""> <!--start-row---->


        <div class="col-sm-12 reportblock"> <!----start-col-sm-4------>

            <div class="table-responsive data-table-wrapper">
                <h4 class="reportheading">{{ trans('labels.backend.reports.list') }}  <span>Total Diamonds : <strong>{{$countTotalDiamonds}}</strong></span></h4>
                <table class="table table-condensed table-hover table-bordered">
                <thead>
<tr>
<th>#</th>
<th>Stock No.</th>
<th>Report No. </th>
<th>Shape </th>
<th>Certificate </th>
<th>Carats Weight </th>
<th>Colour </th>
<th>Clarity </th>
<th>Fluoresence</th>
<th>Length </th>
<th>Width </th>
<th>Height </th>
<th>Discount </th>
<th>Price </th>
</tr>
 </thead>
 <tbody id="diamondsfilter">  
 @if(!empty($totaldiamonds))
 @foreach($totaldiamonds as $totaldiamond)
 <tr>
     <td>{{$loop->iteration}}</td>
     <td>{{$totaldiamond->stock_id}}</td>
     <td>{{$totaldiamond->ReportNo}}</td>
     <td>{{$totaldiamond->shape}}</td>
     <td><a target="new" href="{{$totaldiamond->pdf}}">{{$totaldiamond->lab}}</a></td>
     <td>{{$totaldiamond->carats}}</td>
     <td>{{$totaldiamond->col}}</td>
     <td>{{$totaldiamond->clar}}</td>
     <td>{{$totaldiamond->flo}}</td>
     <td>{{$totaldiamond->length}}</td>
     <td>{{$totaldiamond->width}}</td>
     <td>{{$totaldiamond->height}}</td>
     <td>{{$totaldiamond->discount}}</td>
     <td>{{$symbol}} {{number_format(floor(($totaldiamond->price*$current_currency)*100)/100,2, '.', '')}}</td>
 </tr>
 @endforeach
 @else
 <tr>
     <td colspan="14">No Any Diamonds of This Supplier</td>
 </tr>
 @endif
</tbody>
<!--------->
<tr class="paginationblock">
<td colspan="14">
{!! $totaldiamonds->appends(\Request::except('page'))->render() !!}
</td>
</tr>
<!--------->
                </table>
                
            </div><!--table-responsive-->

            </div> <!----end-col-sm-4------>

            </div> <!--end-row---->

        </div><!-- /.box-body -->
    </div><!--box-->

@endsection

@section('after-scripts')
    {{-- For DataTables --}}
    {{ Html::script(mix('js/dataTable.js')) }}

<script>
//=================
$(document).ready(function(){

			// Pagination data Tag //
			$(document).find('.pagination a').each(function(){
					var href = $(this).attr('href');
					$(this).removeAttr('href');
					$(this).attr('data-target', href);
			})

			// Pagination click //
			$(document).find('.pagination a').on('click', function(){
						var target = $(this).attr('data-target');
						location.href = target;
			})

//===========---Start-Order-Section---===============

    $('body').on('change', '.month_year, .customer_id, .browser_name, .plateform_name', function(){
      var month_year='', customer_id='', browser_name='',  plateform_name='' ;
          //console.log('date value_'+$(this).val());
          month_year = $(".month_year").find("option:selected").val();
          customer_id = $(".customer_id").find("option:selected").val();
          browser_name = $(".browser_name").find("option:selected").val();
          plateform_name = $(".plateform_name").find("option:selected").val();

			var data = 'month_year='+month_year+'&customer_id='+customer_id+'&browser_name='+browser_name+'&plateform_name='+plateform_name+'&_token={{ csrf_token() }}';
            //console.log('mydatat_'+data); return false;
            $.ajax({
                type:"GET",
                url:"{{ url('admin/userLogFilter') }}",
                data:data,
                cache:false,
				       // dataType:'json',
                beforeSend: function(){
                    $("#customerfilter").html('<tr><td colspan="11"><div class="dkprealoader"><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span> </div></td></tr>');	
                },
                success: function(result) {
                  //console.log('htmdata _'+result)
				      	$('#customerfilter').html(result);	
                }
               
            });
		});

//=========================================

$('body').on('click', '.deleteclass', function(){
      var detid='' ;
          //console.log('date value_'+$(this).val());
          detid = $(this).attr('deldata');
               
          if (!confirm("Do you want to delete this Record")){
      return false;
    }else{
			var data = 'detid='+detid+'&_token={{ csrf_token() }}';
            console.log(data); //return false;
            $.ajax({
                type:"POST",
                url:"{{ url('admin/userLogDelete') }}",
                data:data,
                cache:false,
				       // dataType:'json',
                beforeSend: function(){
                    $("#customerfilter").html('<tr><td colspan="11"><div class="dkprealoader"><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span> </div></td></tr>');	
                },
                success: function(result) {
                  //console.log('htmdata _'+result)
                  toastr.success('User Log Details Deleted Successfully ');
				      	$('#customerfilter').html(result);	
                }
               
            });

    }
    
		});


    
//===========---End-Order-Section---===============

});
</script>
@endsection
