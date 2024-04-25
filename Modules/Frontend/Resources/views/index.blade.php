<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SkyZone</title>
    <!-- favicon -->
    <link rel=icon href=assets/version-2/img/favicon.png sizes="20x20" type="image/png">
   
    <link rel="stylesheet" href="{{ asset('website/css/vendor.css')}}">
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{ asset('website/css/style.css')}}">
    <!-- responsive Stylesheet -->
    <link rel="stylesheet" href="{{ asset('website/css/responsive.css')}}">


 
</head>
<body>

<!--wcu-area start-->
<div class="wcu-area-2 pd-top-115" style="background-image: url({{asset('website/img/wcu/bg-2.png')}});">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-title style-white text-center">
                    <h2 class="title">WwELCOME TO SKYZONE CARGO SERVICES LLC</h2>
                    <p class="content">Skyzone cargo is present in all steps of the logistics process.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="single-wcu-wrap style-2">
                    <div class="icon">
                        <img src="{{asset('website/img/wcu/icon-4.png')}}" alt="img">
                    </div>
                    <div class="details">
                        <h6>FAST TRANSPORTION SERVICE</h6>
                        <p>Our fast transportation service delivers goods quickly and efficiently using advanced technology</p>
                    </div>
                </div>
                <div class="single-wcu-wrap style-2">
                    <div class="icon">
                        <img src="{{asset('website/img/wcu/icon-5.png')}}" alt="img">
                    </div>
                    <div class="details">
                        <h6>SAFETY AND RELIABILITY</h6>
                        <p>Our priority is safety and reliability, ensuring your peace of mind every step of the way.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="thumb text-center">
                    <img src="{{asset('website/img/wcu/delivery-man.png')}}" alt="img">
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single-wcu-wrap style-2">
                    <div class="icon">
                        <img src="{{asset('website/img/wcu/icon-6.png')}}" alt="img">
                    </div>
                    <div class="details">
                        <h6>24/7 ONLINE SUPPORT</h6>
                        <p>Our 24/7 online support team is here to assist you anytime, anywhere, ensuring you have continuous assistance whenever you need it</p>
                    </div>
                </div>
                <div class="single-wcu-wrap style-2">
                    <div class="icon">
                        <img src="{{asset('website/img/wcu/icon-7.png')}}" alt="img">
                    </div>
                    <div class="details">
                        <h6>ONLINE TRACKING</h6>
                        <p>With our online tracking system, you can easily monitor the status and location of your shipments in real-time, providing you with peace of mind and convenience</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--wcu-area end-->

<!--request-quote-area start-->
<div class="request-quote-area" >
    <div class="container">
        <div class="request-quote-inner">
            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true"><img src="{{asset('website/img/request-quote/1.png')}}" alt="img">TRACK & TRACE</button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="row">
                        <div class="col-lg-12">
                            <h6 class="subtitle">Order Id</h6>
                              <div class="row">
                                <div class="col-lg-4">
                                  <div class="single-input-inner style-border">
                                      <input type="text" id="order_id_input" placeholder="Your Name">
                                  </div>
                              </div>
                              <div class="col-lg-2">
                                  <a class="btn btn-base w-100" id="submit_button" href="#">SUBMIT</a>
                              </div>
                                {{-- new --}}
                                <div class="container py-5 " id="order_status">
                                    <div class="row">
                                  
                                      <div class="col-md-12 col-lg-12">
                                        <div id="tracking-pre"></div>
                                        <div id="tracking">
                                          <div class="tracking-list">
                                            
                                            <div class="tracking-item-pending" id="pickupclass">
                                              <div class="tracking-icon status-intransit">
                                                <svg class="svg-inline--fa fa-circle fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                                  <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path>
                                                </svg>
                                              </div>
                                              <div class="tracking-date"><img src="https://raw.githubusercontent.com/shajo/portfolio/a02c5579c3ebe185bb1fc085909c582bf5fad802/delivery.svg" class="img-responsive" alt="order-placed" /></div>
                                              <div class="tracking-content" >PICK UP<span id="pickup"></span></div>
                                            </div>
                                  
                                            <div class="tracking-item-pending" id="bookedclass">
                                              <div class="tracking-icon status-intransit">
                                                <svg class="svg-inline--fa fa-circle fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                                  <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path>
                                                </svg>
                                              </div>
                                              <div class="tracking-date"><img src="https://raw.githubusercontent.com/shajo/portfolio/a02c5579c3ebe185bb1fc085909c582bf5fad802/delivery.svg" class="img-responsive" alt="order-placed" /></div>
                                              <div class="tracking-content" >BOOKED / DISPATCHED<span id="booked"></span></div>
                                            </div>

                                            <div class="tracking-item-pending" id="on_his_wayclass">
                                              <div class="tracking-icon status-intransit">
                                                <svg class="svg-inline--fa fa-circle fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                                  <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path>
                                                </svg>
                                              </div>
                                              <div class="tracking-date"><img src="https://raw.githubusercontent.com/shajo/portfolio/a02c5579c3ebe185bb1fc085909c582bf5fad802/delivery.svg" class="img-responsive" alt="order-placed" /></div>
                                              <div class="tracking-content" >ON HIS WAY<span id="on_his_way"></span></div>
                                            </div>

                                            <div class="tracking-item-pending" id="at_destinationclass">
                                              <div class="tracking-icon status-intransit">
                                                <svg class="svg-inline--fa fa-circle fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                                  <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path>
                                                </svg>
                                              </div>
                                              <div class="tracking-date"><img src="https://raw.githubusercontent.com/shajo/portfolio/a02c5579c3ebe185bb1fc085909c582bf5fad802/delivery.svg" class="img-responsive" alt="order-placed" /></div>
                                              <div class="tracking-content" >AT DESTINATION<span id="at_destination"></span></div>
                                            </div>

                                            <div class="tracking-item-pending" id="out_for_deliveryclass">
                                              <div class="tracking-icon status-intransit">
                                                <svg class="svg-inline--fa fa-circle fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                                  <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path>
                                                </svg>
                                              </div>
                                              <div class="tracking-date"><img src="https://raw.githubusercontent.com/shajo/portfolio/a02c5579c3ebe185bb1fc085909c582bf5fad802/delivery.svg" class="img-responsive" alt="order-placed" /></div>
                                              <div class="tracking-content" >OUT FOR DELIVERY<span id="out_for_delivery"></span></div>
                                            </div>

                                            <div class="tracking-item-pending" id="deliveryclass">
                                              <div class="tracking-icon status-intransit">
                                                <svg class="svg-inline--fa fa-circle fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                                  <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z"></path>
                                                </svg>
                                              </div>
                                              <div class="tracking-date"><img src="https://raw.githubusercontent.com/shajo/portfolio/a02c5579c3ebe185bb1fc085909c582bf5fad802/delivery.svg" class="img-responsive" alt="order-placed" /></div>
                                              <div class="tracking-content" >DELIVERED<span id="delivery"></span></div>
                                            </div>
                                           
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
{{-- new --}}

                            </div>   
                           </div>
                           <div id="order_canceled"></div>
                        <div class="col-lg-12 align-self-end">
                            <div class="quote-wrap" style="background: var(--main-color);">
                                <h4>How Can
                                    We Help You!</h4>
                                <a class="btn btn-white" href="contact.html">CONTACT US</a>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="fact-area " style="background: #f9f9f9;margin-top: 7%">
                 
                    {{-- <div class="container">
                        <div class="fact-counter-area" style="background: url({{asset('website/img/fact/bg.png')}});">
                            <div class="row ">
                                <div class="col-lg-2 col-md-4">
                                    <div class="single-fact-wrap">
                                        <h5>PICKUP</h5>
                                        <p>Mon, June 24</p>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4">
                                    <div class="single-fact-wrap">
                                        <h5>BOOKED / DISPATCHED</h5>
                                        <p>Mon, June 24</p>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4">
                                    <div class="single-fact-wrap">
                                        <h5>ON HIS WAY</h5>
                                        <p>Mon, June 24</p>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4">
                                    <div class="single-fact-wrap">
                                        <h5>AT DESTINATION</h5>
                                        <p>Mon, June 24</p>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-4">
                                    <div class="single-fact-wrap">
                                        <h5>OUT FOR DELIVERY</h5>
                                        <p>Mon, June 24</p>
                                    </div>
                                </div>
                               
                             
                            </div>
                        </div>
                    </div> --}}
                </div>


            </div>
        </div>
    </div>
</div>
<!--request-quote-area end-->

 <!--fact-area start-->

<!--fact-area end-->




<script src="{{ asset('website/js/vendor.js')}}"></script>
<script src="{{ asset('website/js/main.js')}}"></script>
<script src="{{ asset('website/script/order-status.js')}}"></script>
</body>
</html>