@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.userlogs.management'))

@section('page-header')
    <h1>{{ trans('labels.backend.userlogs.management') }}</h1>
@endsection

@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.userlogs.management') }}</h3>

            
        </div><!--box-header with-border-->

        <div class="box-body enquiryorderbox">
            <div class="table-responsive data-table-wrapper">
                <table class="table table-condensed table-hover table-bordered">
                <thead>
<tr>
<th>#</th>
<th>Date 
        <div class="changedatabox">
            <select name="month_year" id="month_year" class="month_year">
            <option value="all">All</option>    
            <?php
            $dateTime = new DateTime('first day of this month');
            for ($i = 1; $i <= 56; $i++) {
            echo '<option value="'.$dateTime->format('m_Y').'">'.$dateTime->format('M-y').'</option>';
            $dateTime->modify('-1 month');
            }
            ?>
            </select>
        </div>
    </th>
    <th>Customer Name  
    <div class="changedata">
            <select name="customer_id" id="customer_id" class="customer_id">
                <option value="all">All</option>
                @foreach($customersfilter as $customer)
                <option value="{{$customer->user_id}}">{{$customer->first_name}} {{$customer->last_name}}</option>
                @endforeach
            </select>
        </div>
    </th>
    <th>IP Address</th>
    <th>MAC Address</th>
    <th>Browser
    <div class="changedata">
            <select name="browser_name" id="browser_name" class="browser_name">
                <option value="all">All</option>
                @foreach($customersbrowser as $browser)
                <option value="{{$browser->browser}}">{{$browser->browser}}</option>
                @endforeach
            </select>
        </div>
    </th>
    <th>Plateform
    <div class="changedata">
            <select name="plateform_name" id="plateform_name" class="plateform_name">
                <option value="all">All</option>
                @foreach($customersplateform as $plateform)
                <option value="{{$plateform->plateform}}">{{$plateform->plateform}}</option>
                @endforeach
            </select>
        </div>
    </th>
    <th>Last Login</th>
    <th>Last Logout</th>
    <th>Time Spent</th>
    <th>Action</th>
</tr>
 </thead>
 <tbody id="customerfilter">
    

 @include('backend.userlogmanagement.customer_component')  
                          
</tbody>
<!--------->
<tr class="paginationblock">
<td colspan="17">
{!! $customers->appends(\Request::except('page'))->render() !!}
</td>
</tr>
<!--------->
                </table>
                
            </div><!--table-responsive-->
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
