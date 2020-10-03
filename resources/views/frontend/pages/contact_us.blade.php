@php
$pageName = 'contact';
@endphp
  @extends('frontend.layouts.app')
  @section('title') Contact Us @endsection
@section('meta_description')Contact Us @endsection
@section('meta_keywords') Contact Us @endsection

@section('content')

 <!-- breadcrumb area start -->
 <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">contact us</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

     

        <!-- contact area start -->
        <div class="contact-area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="contact-message">
                            <h4 class="contact-title">Tell Us Your Project</h4>
                            <form class="" action="{{url('contactussend')}}" method="post" id="contactForm">
                            @csrf   
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <input type="text"  id="name" name="name" placeholder="Name*" required>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <input type="email"  id="email" name="email" placeholder="Email*" required>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <input type="text"  id="contact_no" name="contact_no" placeholder="Contact Number*" maxlength="10" onkeypress="return isNumber(event)" required >
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input type="text"  id="subject" name="subject" placeholder="Subject*" required>
                                    </div>
                                    <div class="col-12">
                                        <div class="contact2-textarea text-center">
                                        <textarea class="form-control2" name="message" id="message" rows="1" placeholder="Message"></textarea>
                                          
                                        </div>
                                        <div class="contact-btn">
                                            <button class="btn btn-sqr" type="submit" value="submit">Send Message</button>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-center">
                                        <p class="form-messege"></p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-5">
                        <div class="contact-info">
                            <h4 class="contact-title">Contact us</h4>
                            <p>Get in touch, send us an e-mail or call us</p>
                                
                                <ul>
                                    <li><a href=""><i class="fa fa-map-marker" aria-hidden="true"></i> Address : Shining Qualities USA</a></li>
                                    <li><a href=""><i class="fa fa-phone"></i>0207 869525</a></li>
                                    <li><a href="mailto:enquries@shiningqualities.com"><i class="fa fa-envelope-o"></i> enquries@shiningqualities.com</li>
                                    <li><a href="https://wa.me/7969852535?text=Hi, Summerby Diamond, Do You Want to Chat with me ?"><i class="fa fa-whatsapp" aria-hidden="true"></i> +44 7969 852535</a></li>
                                </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- contact area end -->

        <script>

function isNumber(evt) {
  evt = (evt) ? evt : window.event;
  var charCode = (evt.which) ? evt.which : evt.keyCode;
  if(charCode > 31 && (charCode < 48 || charCode > 57)) {
    alert("Please enter only Numbers.");
    return false;
  }
  
  return true;
}

    </script>
        <!--================End Get in Touch Area =================-->
        @endsection
        