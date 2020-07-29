@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.diamondfeeds.management'))

@section('page-header')
    <h1>{{ trans('labels.backend.diamondfeeds.management') }}</h1>
@endsection

@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.diamondfeeds.management') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.diamondfeeds.partials.diamondfeeds-header-buttons')
            </div>
        </div><!--box-header with-border-->

        <div class="box-body">
            <div class="table-responsive data-table-wrapper">
                <table id="diamondfeeds-table" class="table table-condensed table-hover table-bordered">
                    <thead>
                        <tr>
                            <!--<th>{{ trans('labels.backend.diamondfeeds.dtable.id') }}</th>-->
							 <th>{{ trans('labels.backend.diamondfeeds.supplier_name') }}</th>
                            <th>{{ trans('labels.backend.diamondfeeds.stock_id') }}</th>
                            <th>{{ trans('labels.backend.diamondfeeds.shape') }}</th>
							<th>{{ trans('labels.backend.diamondfeeds.carats') }}</th>
							<!--<th>{{ trans('labels.backend.diamondfeeds.weight') }}</th>-->
                            <th>{{ trans('labels.backend.diamondfeeds.colour') }}</th>
                            <th>{{ trans('labels.backend.diamondfeeds.clarity') }}</th>
                            <th>{{ trans('labels.backend.diamondfeeds.fluoresence') }}</th>
                            <th>{{ trans('labels.backend.diamondfeeds.length') }}</th>
							<th>{{ trans('labels.backend.diamondfeeds.width') }}</th>
							<th>{{ trans('labels.backend.diamondfeeds.height') }}</th>
                            <th>{{ trans('labels.backend.diamondfeeds.discount') }}</th>
							<th>{{ trans('labels.backend.diamondfeeds.price') }}</th>
                            <th>{{ trans('labels.general.actions') }}</th>
                        </tr>
                    </thead>
                    <thead class="transparent-bg">
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                </table>
            </div><!--table-responsive-->
        </div><!-- /.box-body -->
    </div><!--box-->
@endsection

@section('after-scripts')
    {{-- For DataTables --}}
    {{ Html::script(mix('js/dataTable.js')) }}

    <script>
        //Below written line is short form of writing $(document).ready(function() { })
        $(function() {
          
            
            var dataTable = $('#diamondfeeds-table').dataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.diamondfeeds.get") }}',
                    type: 'post'
                },
                columns: [
                   <!-- {data: 'id', name: '{{config('module.diamond_feeds.table')}}.id'},-->
					{data: 'supplier_name', name: '{{config('module.diamond_feeds.table')}}.supplier_name'},
                    {data: 'stock_id', name: '{{config('module.diamond_feeds.table')}}.stock_id'},
                    {data: 'shape', name: '{{config('module.diamond_feeds.table')}}.shape'},
					{data: 'carats', name: '{{config('module.diamond_feeds.table')}}.carats'},
                   <!-- {data: 'length', name: '{{config('module.diamond_feeds.table')}}.length'},-->
                    {data: 'col', name: '{{config('module.diamond_feeds.table')}}.col'},
                    {data: 'clar', name: '{{config('module.diamond_feeds.table')}}.clar'},
                    {data: 'flo', name: '{{config('module.diamond_feeds.table')}}.flo'},
					{data: 'length', name: '{{config('module.diamond_feeds.table')}}.length' },
					{data: 'width', name: '{{config('module.diamond_feeds.table')}}.width' },
					{data: 'height', name: '{{config('module.diamond_feeds.table')}}.height' },
                    {data: 'discount', name: '{{config('module.diamond_feeds.table')}}.discount'},
                    {data: 'price', name: '{{config('module.diamond_feeds.table')}}.price'},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
                order: [[0, "asc"]],
                searchDelay: 500,
                dom: 'lBfrtip',
                buttons: {
                    buttons: [
                        { extend: 'copy', className: 'copyButton',  exportOptions: {columns: [ 0, 1 ]  }},
                        { extend: 'csv', className: 'csvButton',  exportOptions: {columns: [ 0, 1 ]  }},
                        { extend: 'excel', className: 'excelButton',  exportOptions: {columns: [ 0, 1 ]  }},
                        { extend: 'pdf', className: 'pdfButton',  exportOptions: {columns: [ 0, 1 ]  }},
                        { extend: 'print', className: 'printButton',  exportOptions: {columns: [ 0, 1 ]  }}
                    ]
                }
            });

            Backend.DataTableSearch.init(dataTable);
        });
    </script>
@endsection
