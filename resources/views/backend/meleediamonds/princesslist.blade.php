@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.meleediamonds.management'))

@section('page-header')
    <h1>{{ trans('labels.backend.meleediamonds.management') }}</h1>
@endsection

@section('content')
    <div class="box box-info">
    <div class="boxHeader">
            
        <div class="tab">   
  <button class="tablinks"><a href="{{url('admin/meleediamonds')}}">{{ trans('labels.backend.meleediamonds.roundlist') }}</a></button>
  <button class="tablinks active"><a href="{{url('admin/princessList')}}">{{ trans('labels.backend.meleediamonds.princeslist') }}</a></button>
  <button class="tablinks"><a href="{{url('admin/addMeleeDiamond')}}">
  {{ trans('labels.backend.meleediamonds.add') }} 
</a></button>
</div>
  
        </div><!--box-header with-border-->

        <div class="box-body enquiryorderbox">
            <div class="table-responsive data-table-wrapper">

                <table class="table table-condensed table-hover table-bordered" id="data-table">
                <thead>
<tr>
<th>#</th>
<th>Weight (pts)</th>
<th>Size (mm)</th>
 <th>EF/VS</th>
<th>GH/VS</th>
<th>EF/SI</th>
<th>GH/SI</th>
<th>Action</th>
</tr>
 </thead>
 <tbody>
                       
</tbody>
 </table>
                
            </div><!--table-responsive-->
        </div><!-- /.box-body -->
    </div><!--box-->

@endsection

@section('after-scripts')
    {{-- For DataTables --}}
    {{ Html::script(mix('js/dataTable.js')) }}


    <script type="text/javascript">
  $(function () {

    var table = $('#data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ url('admin/princessList') }}",
        type: 'get',
        columns: [
            {data: 'DT_Row_Index', name: 'DT_Row_Index'},
            {data: 'weight', name: 'weight'},
            {data: 'size', name: 'size'},
            {data: 'EF_VS', name: 'EF_VS'},
            {data: 'GH_VS', name: 'GH_VS'},
            {data: 'EF_SI', name: 'EF_SI'},
            {data: 'GH_SI', name: 'GH_SI'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
  });


  $(document).ready(function(){
    $('body').on('click', '#delbutton', function(){
        if (!confirm("Do you want to delete")){
         return false;
         }else{
            $('form#submitdelete').submit();
            //return true;
         }
         
        
    });
});

</script>

@endsection
