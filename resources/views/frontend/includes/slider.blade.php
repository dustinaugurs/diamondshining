
<div class="custom-design">
   <section class="sliderhomepage">
      {{-- <div class="nav">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-3 col-sm-4 col-lg-2">
                  <div class="logo"><a href="{{url('/')}}"><img src="{{url('/')}}/assets/img/logo/logo-light.svg" class="logo-white">
                  <img src="{{url('/')}}/assets/img/logo/logo-black.svg" class="logo-blk"></a></div>
               </div>
               <div class="col-md-7 col-sm-6 col-lg-9 ">
                  <div class="login-btns">
                  @if (!$logged_in_user)
                     {{ link_to_route('frontend.auth.login', trans('navs.frontend.login')) }}
                     {{ link_to_route('frontend.auth.register', trans('navs.frontend.register')) }}
                  @else
                     {{ link_to_route('frontend.auth.logout', trans('navs.general.logout')) }}
                  @endif
                  </div>
               </div>
               <div class="col-md-2 col-sm-2 col-lg-1">
                  <div class="toggle-btn downclass">
                     <span class="one"></span>
                     <span class="two"></span>
                     <span class="three"></span>
                     <span class="close-icn">
                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                           viewBox="0 0 512.001 512.001" style="enable-background:new 0 0 512.001 512.001;" xml:space="preserve">
                           <path d="M284.286,256.002L506.143,34.144c7.811-7.811,7.811-20.475,0-28.285c-7.811-7.81-20.475-7.811-28.285,0L256,227.717
                              L34.143,5.859c-7.811-7.811-20.475-7.811-28.285,0c-7.81,7.811-7.811,20.475,0,28.285l221.857,221.857L5.858,477.859
                              c-7.811,7.811-7.811,20.475,0,28.285c3.905,3.905,9.024,5.857,14.143,5.857c5.119,0,10.237-1.952,14.143-5.857L256,284.287
                              l221.857,221.857c3.905,3.905,9.024,5.857,14.143,5.857s10.237-1.952,14.143-5.857c7.811-7.811,7.811-20.475,0-28.285
                              L284.286,256.002z"/>
                        </svg>
                     </span>
                  </div>
                  <div class="menu">
                     <div class="data-outer">
                        <div class="data-inner">
                           <ul>
                              <li></li>
                              <li><a href="{{url('/')}}">Home</a></li>
                              <li><a href="{{url('pages')}}/about-us" >About</a></li>
                              @if($logged_in_user) 
                             
                              <li> <a href="{{url('account')}}" class="">{{ trans('frontend.menu.Edit Profile') }}</a></li>
                              <li> <a href="{{url('our-products')}}" class="">{{ trans('frontend.menu.ourproduct') }}</a></li>
                              <li> <a href="{{url('enquiry-order')}}" class=""> {{ trans('frontend.menu.enqorder') }}</a></li> 
                              @endif
                              <li><a href="{{url('pages')}}/news"  class="">{{ trans('frontend.menu.news') }}</a></li>
                              <li><a href="{{url('/contact-us')}}">Contact</a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div> --}}
      <div id="carouselExampleInterval" class="carousel slide carousel-fade" data-ride="carousel">
         <div class="carousel-inner">
            <div class="carousel-item active" data-interval="10000">
            <div class="imgdiv">
               <img src="assets/img/banner/img3.jpg" />
            </div>
               <div class="carousel-caption  d-md-block">
                  <h1><a href="{{url('/')}}" class="shiningbox"><img src="{{url('/')}}/assets/img/logo/logo-icon-white.svg"></a></h1>
               </div> 
            </div>
            <!-- <div class="carousel-item" data-interval="2000">
               <div class="imgdiv">
                  <img src="assets/img/banner/img2.jpg" />
               </div>
               <div class="carousel-caption  d-md-block">
                  <h1><a href="{{url('/')}}" class="shiningbox"><img src="{{url('/')}}/assets/img/logo/logo-icon-white.svg"></a></h1>
               </div> 
            </div>
            <div class="carousel-item">
               <div class="imgdiv">
                  <img src="assets/img/banner/img1.jpg" />
               </div>
               <div class="carousel-caption  d-md-block">
                  <h1><a href="{{url('/')}}" class="shiningbox"><img src="{{url('/')}}/assets/img/logo/logo-icon-white.svg"></a></h1>
               </div> 
            </div> -->
         </div>
         <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
         <!-- <span class="carousel-control-prev-icon" aria-hidden="true"></span>
         <span class="sr-only">Previous</span> -->
         </a>
         <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
         <!-- <span class="carousel-control-next-icon" aria-hidden="true"></span>
         <span class="sr-only">Next</span> -->
         </a>
      </div>
   </section>
  
</div>
<script>
   $(document).ready(function(){
      if($(window).width() >= 1024){
         $(window).on('scroll', function() { 
         
         if ($(window).scrollTop() >= 400) { 
          $('.logo-blk').show();
          $('.logo-white').hide();
          $('.toggle-btn span').css("background-color", "#555");
          $('.toggle-btn span.close-icn').css("background-color", "transparent"); 
          $('.nav').addClass('navbg');
     } 
     else{
          $('.logo-blk').hide()
          $('.logo-white').show();
          $('.toggle-btn span').css("background-color", "#fff");
          $('.toggle-btn span.close-icn').css("background-color", "transparent");
          $('.nav').removeClass('navbg');
          }
});
         }
        $(window).on('scroll', function() { 
         
                 if ($(window).scrollTop() >= 700) { 
                  $('.logo-blk').show();
                  $('.logo-white').hide();
                  $('.toggle-btn span').css("background-color", "#555");
                  $('.toggle-btn span.close-icn').css("background-color", "transparent"); 
                  $('.nav').addClass('navbg');
             } 
             else{
                  $('.logo-blk').hide()
                  $('.logo-white').show();
                  $('.toggle-btn span').css("background-color", "#fff");
                  $('.toggle-btn span.close-icn').css("background-color", "transparent");
                  $('.nav').removeClass('navbg');
                  }
        });
        $('.sliderhomepage .menu').css('top', '-100%').slideUp(700);
             $("body").on('click', '.downclass', function(){
                  $("body").css('overflow','hidden');
                  $('.sliderhomepage .menu').css('top', '0%').slideDown(700);
                  $(this).removeClass('downclass').addClass('upclass');
             });
             $("body").on('click', '.upclass', function(){
                  $("body").css('overflow','auto');
                  $('.sliderhomepage .menu').css('top', '-100%').slideUp(700);
                  $(this).removeClass('upclass').addClass('downclass');
             
             });
             $(".menu ul li a[href^='#']").click(function() {
                  $(this).closest('.menu').hide()
                  $( ".upclass" ).trigger('click');
                  
                    id=$(this).attr("href")
                    $('html, body').animate({
                         scrollTop: $(id).offset().top 
                    }, 2000);
               });
   });
   
</script>