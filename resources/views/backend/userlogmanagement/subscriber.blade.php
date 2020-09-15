@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.userlogs.subscriber'))

@section('page-header')
    <h1>{{ trans('labels.backend.userlogs.subscriber') }}</h1>
@endsection

@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.userlogs.subscriber') }}</h3>

            
        </div><!--box-header with-border-->

        <div class="box-body enquiryorderbox">
            <div class="table-responsive data-table-wrapper">

                <table class="table table-condensed table-hover table-bordered" id="data-table">
                <thead>
<tr>
<th>#</th>
    <th>Email</th>
    <th>Date & Time</th>
    <th>IP Address</th>
    <th>Browser</th>
    <th>Plateform</th>
    <!-- <th>Action</th> -->
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
        ajax: "{{ url('admin/subscriberDetails') }}",
        type: 'get',
        columns: [
            {data: 'id', name: 'id'},
            {data: 'email', name: 'email'},
            {data: 'datetime', name: 'datetime'},
            {data: 'ip_address', name: 'ip_address'},
            {data: 'browser', name: 'browser'},
            {data: 'plateform', name: 'plateform'},
            //{data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });


    
  });
</script>

@endsection
