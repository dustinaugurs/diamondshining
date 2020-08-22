@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.diamondtemplates.management') . ' | ' . trans('labels.backend.diamondtemplates.create'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.diamondtemplates.management') }}
        <small></small>
    </h1>
@endsection

@section('content')
  
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">Price(USD)</h3>

                <div class="box-tools pull-right">
                   Add Multiple Price 
                </div><!--box-tools pull-right-->
            </div><!--box-header with-border-->

            <div class="box-body">
                <div class="form-group">
				  
				       <form action="{{url('admin/diamondtemplates/savePrice') }}" method="POST" enctype="multipart/form-data">
            @csrf
			<div class="form-group">
			
			<H3> {{$detail['title']}}</H3>
      
			</div>
			
	<div class="form-group">
		 <table id="POITable" class="table-Success table table-bordered" cellpadding="0" cellspacing="0" border="1">
			 <thead>
				<tr>
					<th>From (Ex VAT)USD</th>
					<th>To (Ex VAT)USD</th>
					<th>Multiplier</th>
					<th>Add Rows</th>
				</tr>
			</thead>
      <tbody>
			<tr>
			 <input type="hidden" class="form-control temp_id" name="temp_id[]"  id="temp_id" value="{{ $detail['id']}}" />
			  <td><input size=25 type="text" class="form-control vat_from_usd"  name="vat_from_usd[]" id="vat_from_usd" /></td>
			  <td><input size=25 type="text" class="form-control vat_to_usd" name="vat_to_usd[]" id="vat_to_usd" /></td>
			  <td><input size=25 type="text" class="form-control multiplier_usd" name="multiplier_usd[]" id="multiplier_usd" /></td>
			  <td><button  type="button" id="delPOIbutton" onclick="deleteRow(this)"><i class="fa fa-minus" aria-hidden="true"></i></button>
			      <button type="button" id="delPOIbutton" onclick="insRow()"> <i class="fa fa-plus" aria-hidden="true"></i> </button>
			  </td>
			</tr>
      </tbody>
		 </table>
		 

</div>	
		<div>
    <button type="submit" class="btn btn-danger" onclick="saveRow()">SAVE</button>
			<!-- <input class="btn btn-danger" type="submit" value="save"> -->
		</div>
    </form>

                  <!--  <div class="edit-form-btn">
                        {{ link_to_route('admin.diamondtemplates.index', trans('buttons.general.cancel'), [], ['class' => 'btn btn-danger btn-md']) }}
                        {{ Form::submit(trans('buttons.general.crud.create'), ['class' => 'btn btn-primary btn-md']) }}
                        <div class="clearfix"></div>
                    </div><!--edit-form-btn-->
                </div><!-- form-group -->
            </div><!--box-body-->
			</div>
			
			    <div class="box box-info">
			
			<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">From (Ex VAT)USD</th>
      <th scope="col">To (Ex VAT)USD</th>
      <th scope="col">Multiplier</th>
	    <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody id="PriceDetailsUpdated">
  
  @foreach($all_detail as $info)
  <tr class="updatedRow_{{$info->id}}"> 
      <td>{{$loop->iteration}}</td>
      <td>{{$info->vat_from_usd}}</td>
      <td>{{$info->vat_to_usd}}</td>
      <td>{{$info->multiplier_usd}}</td>
      <td>
      <button class="btn btn-success" id="editRow" onclick="editRow({{$info->id}})"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
      <button class="btn btn-danger" id="deleteRow" onclick="deleteTrRow({{$info->id}})"><i class="fa fa-trash-o" aria-hidden="true"></i> </button>
      </td>
    </tr>
    <tr class="editrowdisplay editedRow_{{$info->id}}">
			 <td> 
       <input type="text" readonly class="form-control" id="loop_id_{{$loop->iteration}}" value="{{$loop->iteration}}" />
       <input type="hidden"class="form-control edittemp_id_{{$info->id}}"  id="edittemp_id_{{$info->id}}" value="{{$info->id}}" />
       <input type="hidden" class="form-control editParenttemp_id_{{$info->id}}"  id="editParenttemp_id_{{$info->id}}" value="{{$info->temp_id}}" />
       </td>
			  <td><input type="text" value="{{$info->vat_from_usd}}" class="form-control editvat_from_usd_{{$info->id}}" id="editvat_from_usd_{{$info->id}}" /></td>
			  <td><input type="text" value="{{$info->vat_to_usd}}" class="form-control editvat_to_usd_{{$info->id}}" id="editvat_to_usd_{{$info->id}}" /></td>
			  <td><input type="text" value="{{$info->multiplier_usd}}" class="form-control editmultiplier_usd_{{$info->id}}" id="editmultiplier_usd_{{$info->id}}" /></td>
			  <td>
			  <button id="updateRow" class="btn btn-primary" onclick="updateRow({{$info->id}})"> <i class="fa fa-pencil" aria-hidden="true"></i>  UPDATE</button>
			  </td>
			</tr>
  @endforeach
  </tbody>
</table>
			
			</div>
        <!--box box-success-->
		
		
		
		
		
		
		
		
    {{ Form::close() }}
	<script>
function deleteRow(row) {
  var i = row.parentNode.parentNode.rowIndex;
  if (confirm("Do you want to delete")) {
                //Get the reference of the Table.
               // var table = document.getElementById("POITable");
                //Delete the Table row using it's Index.
                //table.deleteRow(row.rowIndex);
			    document.getElementById('POITable').deleteRow(i);
            }
 
}

function insRow() {
  console.log('hi');
  var x = document.getElementById('POITable');
   var new_row = x.rows[0].cloneNode(true);
  var new_row = x.rows[1].cloneNode(true);
   //var new_row = x.rows[2].cloneNode(true);
  var len = x.rows.length;
  // new_row.cells[0].innerHTML = len;
  var inp0 = new_row.cells[0].getElementsByTagName('input')[0];
  inp0.id += len;
  inp0.value = '';
  var inp1 = new_row.cells[1].getElementsByTagName('input')[0];
  inp1.id += len;
  inp1.value = '';
  var inp2 = new_row.cells[2].getElementsByTagName('input')[0];
  inp2.id += len;
  inp2.value = '';
  x.appendChild(new_row);
}
</script>

<!-- <script src="{{public_path('assets/js/vendor/jquery-3.3.1.min.js')}}"></script> -->
<script>

  function deleteTrRow(id){
    
    var  edittemp_id='', editParenttemp_id='';          
      edittemp_id = id;
      editParenttemp_id = $('.editParenttemp_id_'+id).val();
      if (!confirm("Do you want to delete this Record")){
      return false;
    }else{
			var data = 'edittemp_id='+edittemp_id+'&editParenttemp_id='+editParenttemp_id+'&_token={{ csrf_token() }}';
            //console.log('mydatat_'+data); return false;
            $.ajax({
                type:"GET",
                url:"{{ url('admin/diamondtemplates/deletePrice') }}",
                data:data,
                cache:false,
				       // dataType:'json',
                beforeSend: function(){
                    $("#PriceDetailsUpdated").html('<tr><td colspan="5"><div class="dkprealoader"><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span> </div></td></tr>');	
                },
                success: function(result) {
                  //console.log('htmdata _'+resultJSON)
                  toastr.success('Your Data Successfully Deleted');
				      	$('#PriceDetailsUpdated').html(result);	
                }
               
            });

          }


  }



function editRow(id){
   $('.updatedRow_'+id).hide(); 
   $('.editrowdisplay.editedRow_'+id).show();
}

function updateRow(id){
      var  edittemp_id='', editvat_from_usd='', editvat_to_usd='', editmultiplier_usd='', editParenttemp_id='';

     $('.updatedRow_'+id).show(); 
     $('.editrowdisplay.editedRow_'+id).hide();
          
      edittemp_id = $('.edittemp_id_'+id).val();
      editvat_from_usd = $('.editvat_from_usd_'+id).val();
      editvat_to_usd = $('.editvat_to_usd_'+id).val();
      editmultiplier_usd = $('.editmultiplier_usd_'+id).val();
      editParenttemp_id = $('.editParenttemp_id_'+id).val();

			var data = 'edittemp_id='+edittemp_id+'&editvat_from_usd='+editvat_from_usd+'&editvat_to_usd='+editvat_to_usd+'&editmultiplier_usd='+editmultiplier_usd+'&editParenttemp_id='+editParenttemp_id+'&_token={{ csrf_token() }}';
            //console.log('mydatat_'+data); return false;
            $.ajax({
                type:"GET",
                url:"{{ url('admin/diamondtemplates/editAndUpdatePrice') }}",
                data:data,
                cache:false,
				       // dataType:'json',
                beforeSend: function(){
                    $("#PriceDetailsUpdated").html('<tr><td colspan="5"><div class="dkprealoader"><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span> </div></td></tr>');	
                },
                success: function(result) {
                  //console.log('htmdata _'+resultJSON)
                  toastr.success('Your Data Successfully Updated');
				      	$('#PriceDetailsUpdated').html(result);	
                }
               
            });
    };
    

    function saveRow(){
            this.form.submit();
		};


</script>
@endsection
