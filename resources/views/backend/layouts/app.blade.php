<!doctype html>
<html class="no-js" lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        {{-- <link rel="icon" sizes="16x16" type="image/png" href="{{route('frontend.index')}}/img/favicon_icon/{{settings()->favicon}}"> --}}
        <title>@yield('title', app_name())</title>

        <!-- Meta -->
        <meta name="description" content="@yield('meta_description', 'Default Description')">
        <meta name="author" content="@yield('meta_author', 'Augurs')">
        <link href="https://fonts.googleapis.com/css?family=Fira+Sans" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        @yield('meta')
        
        <!-- Styles -->
      
        @yield('before-styles')

        {!! Html::style('assets/css/deepak_style.css') !!}
        {!! Html::style('assets/css/toastr.min.css') !!}
        <!-- Check if the language is set to RTL, so apply the RTL layouts -->
        <!-- Otherwise apply the normal LTR layouts -->
        @langrtl
            {{ Html::style(getRtlCss(mix('css/backend.css'))) }}
        @else
            {{ Html::style(mix('css/backend.css')) }}
        @endlangrtl

        {{ Html::style(mix('css/backend-custom.css')) }}
        @yield('after-styles')

        <!-- Html5 Shim and Respond.js IE8 support of Html5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        {{ Html::script('https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js') }}
        {{ Html::script('https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js') }}
        <![endif]-->

        <!-- Scripts -->
        <script>
            window.Laravel = {!! json_encode([ 'csrfToken' => csrf_token() ]) !!};
        </script>
        <?php
            if (!empty($google_analytics)) {
                echo $google_analytics;
            }
        ?>
    </head>
    <body class="skin-{{ config('backend.theme') }} {{ config('backend.layout') }} sidebar-collapse">
        <div class="loading" style="display:none"></div>
        @include('includes.partials.logged-in-as')

        <div class="wrapper" id="app">
            @include('backend.includes.header')
            @include('backend.includes.sidebar-dynamic')

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    @yield('page-header')
                    <!-- Breadcrumbs would render from routes/breadcrumb.php -->
                    @if(Breadcrumbs::exists())
                        {!! Breadcrumbs::render() !!}
                    @endif
                </section>

                <!-- Main content -->
                <section class="content">
                    @include('includes.partials.messages')
                    @yield('content')
                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->

            @include('backend.includes.footer')
        </div><!-- ./wrapper -->

        <!-- JavaScripts -->
        @yield('before-scripts')
        {{ Html::script(mix('js/backend.js')) }}
        {{ Html::script(mix('js/backend-custom.js')) }}
        @yield('after-scripts')

        <!---------Notification-start----------->
        <script>
        $(document).ready(function() {
            setInterval(function() {			
           checkOrderLive();
           checkEnquiryLive();
        }, 3000);

        //=======Start-latest-update==========
        $('body').on('click', '.updatelivestatus', function(){
      var order_status=''; successMsg = '', rescode = '';
            order_status = $(this).attr('findOrdstatus');
			var data = 'order_status='+order_status+'&_token={{ csrf_token() }}';
            console.log('ordSt '+data); //return false;
            $.ajax({
                type:"POST",
                url:"{{ url('admin/notificationUpdate') }}",
                data:data,
                cache:false,
				//dataType:'json',
                // beforeSend: function(){
                //     $(".dataafterfilterOrder").html('<tr><td colspan="14"><div class="dkprealoader"><i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span> </div></td></tr>');	
                // },
                success: function(resultJSON) {
                  //console.log(resultJSON);
                  successMsg = resultJSON.message,
                  rescode = resultJSON.rescode  
                  toastr.success(successMsg);	
                }
               
            });
		});
      //===========---End-latest-Update---===============
   
        });
     
     //-----------------------------------------------   
        function checkOrderLive(){    //==========start-Order===========
            var totalOrders = '', orders = '', outputdata = '', heading = '', urlaccess = '';
            $.ajax({
                type:"GET",
                url:"{{ url('admin/notificationOrders') }}",
                //data:data,
                cache:false,
				dataType:'json',
                // beforeSend: function(){
                //     $("#totalorder").html('<i class="fa fa-spinner fa-pulse fa-1x fa-fw"></i><span class="sr-only">Loading...</span>');	
                // },
                success: function(resultJSON) {
                    //console.log(resultJSON);
                  orders = resultJSON.orders;
                  totalOrders = resultJSON.totalorders;
                  //console.log('VAT '+totalOrders);
                  if(orders.length > 0){ 
                    heading = '<li class="header heading">List of Latest Order</li>'
              for(i = 0; i < orders.length; i++) {
                outputdata += '<li class="header bbxxes">'+
                          '<a href="">'+
                          '<span>('+(i+1)+'.)</span>'+
                          '<span>'+orders[i].first_name+' '+orders[i].last_name+'</span>'+
                          '<span>'+'Stock No. : '+orders[i].stock_id+'</span>'+
                          '<span>'+orders[i].order_date+'</span>'+
                           '</li>'+'</a>';
              }
              urlaccess = '<li class="footer updatelivestatus" findOrdstatus="4">'+
                        '<a href="{{url('admin/orders')}}">{{  trans('strings.backend.general.see_all.messages') }}</a>'+
                        '</li>';
              }else{ outputdata = '<li class="header">'+
                                    '<a href="">{{ trans_choice('strings.backend.general.you_have.messages', 0, ['number' => 0]) }}</a>'+
                                    '</li>';
                                    }
					$('#orderlist').html(heading+''+outputdata+''+urlaccess);
                    $('#totalorder').html(totalOrders);	
                }
               
            });
            //------------------
                   }   //==========End-Order===========

                   function checkEnquiryLive(){    //==========start-Enquiries===========
            var totalEnquiries = '', enquiries = '', outputdata = '', heading = '', urlaccess = '';
            $.ajax({
                type:"GET",
                url:"{{ url('admin/notificationEnquiries') }}",
                //data:data,
                cache:false,
				dataType:'json',
                // beforeSend: function(){
                //     $("#totalenquiry").html('<i class="fa fa-spinner fa-pulse fa-1x fa-fw"></i><span class="sr-only">Loading...</span>');	
                // },
                success: function(resultJSON) {
                    //console.log(resultJSON);
                    enquiries = resultJSON.enquiries;
                  totalEnquiries = resultJSON.totalenquiries;
                  //console.log('VAT '+totalOrders);
                  if(enquiries.length > 0){ 
                    heading = '<li class="header heading">List of Latest Enquiries</li>'
              for(i = 0; i < enquiries.length; i++) {
                outputdata += '<li class="header bbxxes">'+
                          '<a href="">'+
                          '<span>('+(i+1)+'.)</span>'+
                          '<span>'+enquiries[i].first_name+' '+enquiries[i].last_name+'</span>'+
                          '<span>'+'Stock No. : '+enquiries[i].stock_id+'</span>'+
                          '<span>'+enquiries[i].order_date+'</span>'+
                           '</li>'+'</a>';
              }
              urlaccess = '<li class="footer updatelivestatus" findOrdstatus="1">'+
                        '<a href="{{url('admin/enquiriesIndex')}}">{{  trans('strings.backend.general.see_all.messages') }}</a>'+
                        '</li>';
              }else{ outputdata = '<li class="header">'+
                                    '<a href="">{{ trans_choice('strings.backend.general.you_have.messages', 0, ['number' => 0]) }}</a>'+
                                    '</li>';
                                    }
					$('#enquirylist').html(heading+''+outputdata+''+urlaccess);
                    $('#totalenquiry').html(totalEnquiries);	
                }
               
            });
            //------------------
                   }   //==========End-Enquiries===========



        </script>

<script type='text/javascript'>
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
 $(document).ready(function() {
        $('#changecurrency').on('change', function() {
            this.form.submit();
        });
    })
</script>
        <!---------Notification-End----------->
    </body>

    {!! Html::script('assets/js/toastr.min.js') !!}
@toastr_render
</html>