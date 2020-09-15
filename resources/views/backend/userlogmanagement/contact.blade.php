@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.userlogs.contact'))

@section('page-header')
    <h1>{{ trans('labels.backend.userlogs.contact') }}</h1>
@endsection

@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.userlogs.contact') }}</h3>

            
        </div><!--box-header with-border-->

        <div class="box-body enquiryorderbox">
            <div class="table-responsive data-table-wrapper">

                <table class="table table-condensed table-hover table-bordered" id="data-table">
                <thead>
<tr>
<th>#</th>
    <th>Name</th>
    <th>Email</th>
    <th>Contact No.</th>
    <th>Subject</th>
    <th>Message</th>
    <th>Date & Time</th>
    <th>IP Address</th>
    <th>Browser</th>
    <th>Plateform</th>
    <th>Action</th>
</tr>
 </thead>
 <tbody>
                       
</tbody>
 </table>
                
            </div><!--table-responsive-->
        </div><!-- /.box-body -->
    </div><!--box-->

    <div id="msgdetails" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Customer Message Details</h4>
      </div>
      <div class="modal-body">
        <p id="msgbody"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

@endsection

@section('after-scripts')
    {{-- For DataTables --}}
    {{ Html::script(mix('js/dataTable.js')) }}


    <script type="text/javascript">
  $(function () {

    var table = $('#data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ url('admin/contactDetails') }}",
        type: 'get',
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'email', name: 'email'},
            {data: 'contact_no', name: 'contact_no'},
            {data: 'subject', name: 'subject'},
            {data: 'message', name: 'message', render: function (data, type, row) {
            return type === 'display' && data.length > 20 ? data.substr(0, 20) + '<a class="mdetails" href="#" data="'+data+'">…Details</a>' : data;
            }},
            {data: 'datetime', name: 'datetime'},
            {data: 'ip_address', name: 'ip_address'},
            {data: 'browser', name: 'browser'},
            {data: 'plateform', name: 'plateform'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });


    
  });
</script>

<script>


//=================
$(document).ready(function(){

    $(document).on('click', '.mdetails', function(){
        var data = $(this).attr('data');
        $('#msgbody').html(data);
        $('#msgdetails').modal('show');  
    })





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
