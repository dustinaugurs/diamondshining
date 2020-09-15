@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.orders.customerrequest'))

@section('page-header')
    <h1>{{ trans('labels.backend.orders.customerrequest') }}</h1>
@endsection

@section('content')
    <div class="box box-info">
        <div class="boxHeader">
            
        <div class="tab">   
  <button class="tablinks active"><a href="{{url('admin/requestForImage')}}">{{ trans('labels.backend.orders.imagerequest') }}</a></button>
  <button class="tablinks"><a href="{{url('admin/requestForVideo')}}">{{ trans('labels.backend.orders.videorequest') }}</a></button>
  <button class="tablinks"><a href="{{url('admin/requestForPdf')}}">{{ trans('labels.backend.orders.pdfrequest') }}</a></button>
</div>
  
        </div><!--box-header with-border-->

        <div class="box-body enquiryorderbox">
            <div class="table-responsive data-table-wrapper">

                <table class="table table-condensed table-hover table-bordered" id="data-table">
                <thead>
<tr>
<th>Stock ID</th>
<th>Request Date</th>
    <th>Customer Name</th>
    <th>Customer Email</th>
    <th>Supplier Name</th>
    <th>Report No.</th>
    <th>Certificate</th>
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
        ajax: "{{ url('admin/requestForImage') }}",
        type: 'get',
        columns: [
            //{data: 'id', name: 'id'},
            {data: 'stock_id', name: 'stock_id'},
            {data: 'order_date', name: 'order_date'},
            {data: 'customer', name: 'customer'},
            {data: 'email', name: 'email'},
            {data: 'supplier_name', name: 'supplier_name'},
            {data: 'ReportNo', name: 'ReportNo'},
            {data: 'certificate', name: 'certificate'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
  });
</script>

@endsection
