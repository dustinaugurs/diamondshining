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
                                    <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="fa fa-home"></i></a></li>
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
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6">
                            <div class="contact-message">
                                <h4 class="contact-title">Questions? We would love to hear from you.</h4>
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
                                                <button class="btn btn-sqr" type="submit" value="submit">Send</button>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-center">
                                            <p class="form-messege"></p>
                                        </div>
                                    </div>
                                </form>
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
        