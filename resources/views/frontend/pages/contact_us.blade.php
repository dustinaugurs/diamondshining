  @extends('frontend.layouts.app')
  @section('title') Contact Us @endsection
@section('meta_description')Contact Us @endsection
@section('meta_keywords') Contact Us @endsection

@section('content')
 <!--================Banner Area =================-->
        <section class="banner_area">
            <div class="container">
                <div class="banner_inner_text">
                    <h2>Contact</h2>
                    <p>Get in touch</p>
                </div>
            </div>
        </section>
        <!--================End Banner Area =================-->
        
        <!--================Get in Touch Area =================-->
        <section class="get_in_touch_area p_100">
            <div class="container">
                <div class="row get_touch_inner">
                    <div class="col-lg-6">
                        <form class="contact_us_form row" action="{{url('contactussend')}}" method="post" id="contactForm">
                        @csrf
                            <div class="form-group col-lg-4">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name*" required>
                            </div>
                            <div class="form-group col-lg-4">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email*" required>
                            </div>
                            <div class="form-group col-lg-4">
                                <input type="text" class="form-control" id="contact_no" name="contact_no" placeholder="Contact Number*" maxlength="10" onkeypress="return isNumber(event)" required >
                            </div>
                            <div class="form-group col-lg-12">
                                <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject*" required>
                            </div>
                            <div class="form-group col-lg-12">
                                <textarea class="form-control" name="message" id="message" rows="1" placeholder="Message"></textarea>
                            </div>
                            <div class="form-group col-lg-12">
                                <button type="submit" value="submit" class="btn submit_btn form-control" >Send</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-6">
                        <div class="touch_details contactinfo">
                            <div class="l_title">
                                <img src="{{url('public/img/frontend/img/icon/title-icon.png')}}" alt="">
                                <h6>Say hello</h6>
                                <h2>Get in touch, send us an e-mail or call us</h2>
                            </div>
                            <a href="tel:+0207869525"><span><i class="fa fa-phone" aria-hidden="true"></i></span> <span>Telephone number :</span> <h4>0207 869525</h4></a>

                            <a href="mailto:enquries@shiningqualities.com"> <span><i class="fa fa-envelope-o" aria-hidden="true"></i></span> <span>Email :</span> <h4>enquries@shiningqualities.com</h4></a>
                            <a href="https://wa.me/7969852535?text=Hi, Summerby Diamond, Do You Want to Chat with me ?"><span><i class="fa fa-whatsapp" aria-hidden="true"></i></span> <span>Whatsapp number :</span> <h4>+44 7969 852535</h4></a>

                        </div>
                    </div>
                </div>
            </div>
        </section>

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
        