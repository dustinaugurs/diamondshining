@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.reports.heading'))

@section('page-header')
    <h1>{{ trans('labels.backend.reports.heading') }}</h1>
@endsection

@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.reports.keyreport') }}</h3>

            
        </div><!--box-header with-border-->

        <div class="box-body">


        <div class=""> <!--start-row---->


        <div class="col-sm-4 reportblock"> <!----start-col-sm-4------>

            <div class="table-responsive data-table-wrapper">
                <h4 class="reportheading">{{ trans('labels.backend.reports.title') }}</h4>
                <table class="table table-condensed table-hover table-bordered">
                <thead>
<tr>
<th>#</th>
<th>Supplier Name</th>
<th>Total Diamonds </th>
</tr>
 </thead>
 <tbody id="diamondsfilter">  
 @if(!empty($totaldiamonds))
 @foreach($totaldiamonds as $totaldiamond)
 <tr>
     <td>{{$loop->iteration}}</td>
     <td>{{$totaldiamond->supplier_name}}</td>
     <td><a target="new" href="{{url('admin/reportdetails')}}/{{$totaldiamond->supplier_name}}" >{{$totaldiamond->total}}</a> 
     </td>
 </tr>
 @endforeach
 @endif
</tbody>
<!--------->
<tr class="paginationblock">
<td colspan="3">
{!! $totaldiamonds->appends(\Request::except('page'))->render() !!}
</td>
</tr>
<!--------->
                </table>
                
            </div><!--table-responsive-->

            </div> <!----end-col-sm-4------>


            <div class="col-sm-4 reportblock" style="display:none;"> <!----start-col-sm-4------>

            <div class="table-responsive data-table-wrapper">
                <h4 class="reportheading">{{ trans('labels.backend.reports.title') }}</h4>
                <table class="table table-condensed table-hover table-bordered">
                <thead>
<tr>
<th>#</th>
<th>Supplier Name</th>
<th>Total Diamonds </th>
</tr>
 </thead>
 <tbody id="diamondsfilter">  
 @if(!empty($totaldiamonds))
 @foreach($totaldiamonds as $totaldiamond)
 <tr>
     <td>{{$loop->iteration}}</td>
     <td>{{$totaldiamond->supplier_name}}</td>
     <td>{{$totaldiamond->total}}</td>
 </tr>
 @endforeach
 @endif
</tbody>
<!--------->
<tr class="paginationblock">
<td colspan="3">
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
