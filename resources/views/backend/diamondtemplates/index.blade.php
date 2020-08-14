@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.diamondtemplates.management'))

@section('page-header')
    <h1>{{ trans('labels.backend.diamondtemplates.management') }}</h1>
@endsection

@section('content')
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.diamondtemplates.management') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.diamondtemplates.partials.diamondtemplates-header-buttons')
            </div>
        </div><!--box-header with-border-->

        <div class="box-body">
            <div class="table-responsive data-table-wrapper">
                <table id="diamondtemplates-table" class="table table-condensed table-hover table-bordered">
                    <thead>
                        <tr>
                            <!--<th>{{ trans('labels.backend.diamondtemplates.table.id') }}</th>-->
                            <th>Title</th>
                          <!--  <th>Vat To(GBP)</th>
                            <th>Vat From(GBP)</th> -->
							<!--<th>Vat From(USD)</th>
                            <th>Vat To(USD)</th>
                           
                           <!-- <th>Multiplier(GBP)</th> -->
                           <!-- <th>Multiplier(USD)</th> -->
                            <th>Status</th>
                            <th>{{ trans('labels.backend.diamondtemplates.table.createdat') }}</th>
                            <th>{{ trans('labels.general.actions') }}</th>
							<th>Add multiple price</th>
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
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            var dataTable = $('#diamondtemplates-table').dataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route("admin.diamondtemplates.get") }}',
                    type: 'post'
                },
                columns: [
                   // {data: 'id', name: '{{config('module.diamond_templates.table')}}.id'},
                    {data: 'title', name: '{{config('module.diamond_templates.table')}}.title'},
                   // {data: 'vat_to_gbp', name: '{{config('module.diamond_templates.table')}}.vat_to_gbp'},
                   // {data: 'vat_from_gbp', name: '{{config('module.diamond_templates.table')}}.vat_from_gbp'},
				  //  {data: 'vat_from_usd', name: '{{config('module.diamond_templates.table')}}.vat_from_usd'},
                   // {data: 'vat_to_usd', name: '{{config('module.diamond_templates.table')}}.vat_to_usd'},
                  //{data: 'multiplier_gbp', name: '{{config('module.diamond_templates.table')}}.multiplier_gbp'},
                  //  {data: 'multiplier_usd', name: '{{config('module.diamond_templates.table')}}.multiplier_usd'},
                    {data: 'is_term_accept', name: '{{config('module.diamond_templates.table')}}.is_term_accept'},
                    {data: 'created_at', name: '{{config('module.diamond_templates.table')}}.created_at'},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false},
				    { data: 'id',
  render: function(data,type,row){
    var edit_button = "<a href='{{URL('/')}}/admin/diamondtemplates/addPrice/"+ row.id +"' class='btn btn-primary' role='button' aria-pressed='true'>Add Price</a>";
  return edit_button;
  }
},

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
