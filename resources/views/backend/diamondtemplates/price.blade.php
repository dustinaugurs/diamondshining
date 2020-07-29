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
			<tr>
			 <input type="hidden" class="form-control" name="temp_id[]"  id="temp_id[]" value="{{ $detail['id']}}" />
			  <td><input size=25 type="text" class="form-control"  name="vat_from_usd[]" id="vat_from_usd" /></td>
			  <td><input size=25 type="text" class="form-control" name="vat_to_usd[]" id="vat_to_usd" /></td>
			  <td><input size=25 type="text" class="form-control" name="multiplier_usd[]" id="multiplier_usd" /></td>
			  <td><button  type="button" id="delPOIbutton" onclick="deleteRow(this)"><i class="fa fa-minus" aria-hidden="true"></i></button>
			      <button type="button" id="delPOIbutton" onclick="insRow()"> <i class="fa fa-plus" aria-hidden="true"></i> </button>
			  </td>
			</tr>
		 </table>
		 

</div>	
		<div>
			<input class="btn btn-danger" type="submit" value="save">
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
	  
    </tr>
  </thead>
  <tbody>
  @php 
  $i = 0;
  @endphp
  @foreach($all_detail as $info)
    <tr>
      <th scope="row"> {{$i++}}</th>
      <td>{{$info->vat_from_usd}}</td>
      <td>{{$info->vat_to_usd}}</td>
      <td>{{$info->multiplier_usd}}</td>
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
@endsection
