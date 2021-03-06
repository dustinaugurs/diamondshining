@php
    use Illuminate\Support\Facades\Route;
@endphp

<!------------------------>
@if($logged_in_user)
    @php
    $user_role = userLogin();
    @endphp
    
    @if($user_role->role_id == 1)
    <script type="text/javascript">
    window.location = "{{url('admin/dashboard')}}";
    </script>
     @endif
    
    @endif
<!------------------------->

<!DOCTYPE html>
<html class="no-js" lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
		
        <title>@yield('title', app_name())</title>
		<meta name="robots" content="noindex, follow" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Meta -->
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="keywords" content="">
        <link rel="shortcut icon" href="assets/img/logo/logo-icon-black.png" type="image/x-icon" />
        @yield('meta')

        <!-- Styles -->
        @yield('before-styles')
         @langrtl
            {{ Html::style(getRtlCss(mix('css/frontend.css'))) }}
        @else
            {{ Html::style(mix('css/frontend.css')) }}
        @endlangrtl


        {!! Html::style('js/select2/select2.min.css') !!}
        <!-- Bootstrap-->
        {!! Html::style('css/bootstrap2.min.css') !!}
        
        <!-- Rev slider css -->
        {!! Html::style('vendors/revolution/css/settings.css') !!}
        {!! Html::style('vendors/revolution/css/layers.css') !!}
        {!! Html::style('vendors/revolution/css/navigation.css') !!}

        <!-- Extra plugin css -->
        {!! Html::style('vendors/owl-carousel/owl.carousel.min.css') !!}
        <!-- Check if the language is set to RTL, so apply the RTL layouts -->
        <!-- Otherwise apply the normal LTR layouts -->
       

        {!! Html::style('css/responsive.css') !!}
				    <!-- Favicon -->
  
	<!-- {!! Html::style('assets/img/favicon.ico') !!} -->

    <!-- CSS
	============================================ -->
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,900" rel="stylesheet">
    <!-- Bootstrap CSS -->
	{!! Html::style('assets/css/vendor/bootstrap.min.css') !!}
    <!-- Pe-icon-7-stroke CSS -->
	{!! Html::style('assets/css/vendor/pe-icon-7-stroke.css') !!}
    <!-- Font-awesome CSS -->
	{!! Html::style('assets/css/vendor/font-awesome.min.css') !!}
    <!-- Slick slider css -->
	{!! Html::style('assets/css/plugins/slick.min.css') !!}
    <!-- animate css -->
	{!! Html::style('assets/css/plugins/animate.css') !!}
    <!-- Nice Select css -->
    {!! Html::style('assets/css/plugins/nice-select.css') !!}
    <!--Deepak-style-custom--->
    {!! Html::style('assets/css/custom_style.css') !!}
    {!! Html::style('assets/css/toastr.min.css') !!}
    {!! Html::style('datatable/css/dataTables.bootstrap.min.css') !!}
	{!! Html::style('assets/css/style.css') !!}
	{!! Html::style('assets/css/plugins/jqueryui.min.css') !!}
    {!! Html::style('assets/css/price_range_style.css') !!}
    {!! Html::style('assets/css/filter-style.css') !!}

    <!-- komal --->
    {!! Html::style('assets/css/custom.css') !!}
     
     <!-- Modernizer JS -->
	 {!! Html::script('assets/js/vendor/modernizr-3.6.0.min.js') !!}
    <!-- jQuery JS -->
	{!! Html::script('assets/js/vendor/jquery-3.3.1.min.js') !!}
    <!-- Popper JS -->
	{!! Html::script('assets/js/vendor/popper.min.js') !!}
    <!-- Bootstrap JS -->
	{!! Html::script('assets/js/vendor/bootstrap.min.js') !!}
        @yield('after-styles')
        <!-- Scripts -->
        <script>
            window.Laravel = <?php echo json_encode([
    'csrfToken' => csrf_token(),
]); ?>
        </script>
        <?php
if (!empty($google_analytics)) {
    echo $google_analytics;
}
?>

    </head>
    <body> 
    <div class="loaderonclick loaderdisplay"> <!----start-loader----->
    <div class="loaderboxforall">
    <p>Thank you! We are now processing your request.</p>
    <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i><span class="sr-only">Loading...</span> 
    </div>
    </div> <!----end-loader----->
    @if($pageName == 'home')
    <div id="app" class="homepage"> 
    @else
    <div id="app">  
    @endif
           
            @include('includes.partials.logged-in-as')
            <!--================Header Menu Area =================-->
            @include('frontend.includes.nav')
            <!--================End Header Menu Area =================-->
           
           
           
			@include('frontend.layouts.header')
           
           
          

			<div class="contentSection">@yield('content')</div>
			@include('frontend.layouts.footer')

           
            @if(Route::currentRouteName() != "frontend.auth.register")
                @include('includes.partials.messages')
            @endif
               
           
            </div>
        <!-- Scripts -->
        @yield('before-scripts')
        {!! Html::script(mix('js/frontend.js')) !!}
        @yield('after-scripts')
        {{ Html::script('js/jquerysession.min.js') }}
        {{ Html::script('js/frontend/frontend.min.js') }}
        {!! Html::script('js/select2/select2.min.js') !!}

        <!-- {!! Html::script('scripts/popper.min.js') !!}
        {!! Html::script('scripts/bootstrap.min.js') !!} -->
    
        {!! Html::script('vendors/revolution/js/jquery.themepunch.tools.min.js') !!}
        {!! Html::script('vendors/revolution/js/jquery.themepunch.revolution.min.js') !!}
        {!! Html::script('vendors/revolution/js/extensions/revolution.extension.actions.min.js') !!}
        {!! Html::script('vendors/revolution/js/extensions/revolution.extension.video.min.js') !!}
        {!! Html::script('vendors/revolution/js/extensions/revolution.extension.slideanims.min.js') !!}
        {!! Html::script('vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js') !!}
        {!! Html::script('vendors/revolution/js/extensions/revolution.extension.navigation.min.js') !!}
        {!! Html::script('vendors/revolution/js/extensions/revolution.extension.slideanims.min.js') !!}

        {!! Html::script('vendors/counterup/jquery.waypoints.min.js') !!}
        {!! Html::script('vendors/counterup/jquery.counterup.min.js') !!}
        {!! Html::script('vendors/counterup/apear.js') !!}
        {!! Html::script('vendors/counterup/countto.js') !!}
        {!! Html::script('vendors/owl-carousel/owl.carousel.min.js') !!}
        {!! Html::script('vendors/magnify-popup/jquery.magnific-popup.min.js') !!}
        {!! Html::script('scripts/smoothscroll.js') !!}

        {!! Html::script('scripts/theme.js') !!}

		
		
    <!-- JS ============================================ -->

   
    <!-- slick Slider JS -->
	{!! Html::script('assets/js/plugins/slick.min.js') !!}
    <!-- Countdown JS -->
	{!! Html::script('assets/js/plugins/countdown.min.js') !!}
    <!-- Nice Select JS -->
	{!! Html::script('assets/js/plugins/nice-select.min.js') !!}
    <!-- jquery UI JS -->  
	{!! Html::script('assets/js/plugins/jqueryui.min.js') !!}
    {!! Html::script('assets/js/plugins/jquery.ui.touch-punch.min.js') !!}
    <!-- Image zoom JS -->
	{!! Html::script('assets/js/plugins/image-zoom.min.js') !!}
    <!-- Imagesloaded JS -->
	{!! Html::script('assets/js/plugins/imagesloaded.pkgd.min.js') !!}
    <!-- Instagram feed JS -->
	{!! Html::script('assets/js/plugins/instagramfeed.min.js') !!}
    <!-- mailchimp active js -->
	{!! Html::script('assets/js/plugins/ajaxchimp.js') !!}
    <!-- contact form dynamic js -->
	{!! Html::script('assets/js/plugins/ajax-mail.js') !!}
    <!-- google map api -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfmCVTjRI007pC1Yk2o2d_EhgkjTsFVN8"></script>
    <!-- google map active js -->
	{!! Html::script('assets/js/plugins/google-map.js') !!}
    <!-- Main JS -->
	{!! Html::script('assets/js/main.js') !!}
    {!! Html::script('assets/js/price_range_script.js') !!}
    
    
    <script type="text/javascript">
      
        if("{{Route::currentRouteName()}}" !== "frontend.user.account")
        {
            //  $.session.clear();
        } 
    </script>
    @include('includes.partials.ga')

    <!-------------------------->
    <script type='text/javascript'>
    $( document ).ready(function() {

        var totalHeight = window.innerHeight;
        var headerHeight = $('header').height();
        var footerHeight = $('footer').height();
        var headfoot = headerHeight + footerHeight;
        var sectionHeight = totalHeight - headfoot;
      
        $('.contentSection').css("min-height", sectionHeight);

        // console.log( secPadd);
        // console.log( totalHeight);
        // console.log( headerHeight);
        // console.log( footerHeight);
        // console.log( headfoot);
        // console.log( sectionHeight);
    });
    $('.carousel').carousel({
        interval: 1000,
        autoplay:true
        })
    $(window).on("load",function(){
          $(".loader-wrapper").fadeOut(6000);
        });
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function() {
            $('#changecurrency').on('change', function() {
                this.form.submit();
            });
        })
    </script>

<!-------------------------->
</body class="fix">
{!! Html::script('assets/js/toastr.min.js') !!}
@toastr_render
</html>