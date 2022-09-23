@extends('layouts.app')
 
@section('title', $title)

@section('css')
    @parent
    

@endsection
 
@section('content')
    <section class="contact-us-wrapper pt-100 pt-md-60 pb-50 pb-md-30 relative">
        <div class="contact-heading text-center mx-w-700 m-auto pb-25 get-bottom animate">
            <div class="section-title pb-25 animate">
                <h1 class="h1">Contact us for any help</h1>
            </div>
            <p class="animate px-15">Name everything the its countries my numbered the container was the children physics the effort. Of stage its we his saw that rung slogging and saw bulletin thoughts</p>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-8 m-auto get-bottom animate mb-sm-15">
                    <div class="conatct-card d-flex align-items-center">
                       <div class="contact-card-icon d-center card-paste svg-paste svg-50 get-bottom animate">
                           <img src="{{ env('AWS_BASEURL_IMAGE').'front_assets/img/svg/call.svg' }}" alt="">
                       </div> 
                       <div class="contact-card-content get-bottom animate">
                            <h6 class="animate pb-10">+91 82 35 932170</h6>
                       </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-8 m-auto get-bottom animate mb-sm-15">
                    <div class="conatct-card d-flex align-items-center">
                       <div class="contact-card-icon d-center card-pink1 svg-ired svg-50 get-bottom animate">
                           <img src="{{ env('AWS_BASEURL_IMAGE').'front_assets/img/svg/chat.svg' }}" alt="">
                       </div> 
                       <div class="contact-card-content animate get-bottom ">
                            <h6 class="animate pb-10">contact@influencerhai.com</h6>
                       </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-8 m-auto get-bottom animate">
                    <div class="conatct-card d-flex align-items-center">
                       <div class="contact-card-icon d-center card-orange svg-orange svg-50 get-bottom animate">
                           <img src="{{ env('AWS_BASEURL_IMAGE').'front_assets/img/svg/placeholder.svg' }}" alt="">
                       </div> 
                       <div class="contact-card-content animate get-bottom ">
                            <h6 class="animate pb-10">E-46, Sector-3, Noida,</h6>
                            <h6 class="animate">UP, India - 201301</h6>
                       </div>
                    </div>
                </div>
            </div>
        </div>
        <img src="{{ env('AWS_BASEURL_IMAGE').'front_assets/img/contact/Contact-round.png'  }}" alt="" class="contact-circle">
        <img src="{{ env('AWS_BASEURL_IMAGE').'front_assets/img/contact/Contact-man.png'  }}" alt="" class="conatct-man">
    </section>
    <section class="contact-information pt-50 pt-sm-30 pb-100 pb-md-60">
        <div class="container">
            <div class="section-title text-center pb-50 pb-md-30 get-bottom animate">
                <h2 class="h3 bg-light">Get in Touch with us</h2>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="contact-information-img">
                        <img src="{{ env('AWS_BASEURL_IMAGE').'front_assets/img/contact/Contact-get-tuch.png' }}" alt="">
                        <div class="contact-ani-circle">
                            <span class="circle-sm r-yellow circle-path"></span>
                            <span class="circle-md r-yellow circle-path"></span>
                            <span class="round-md"></span>
                            <span class="round-sm"></span>
                            <span class="round-lg"></span>
                            <span class="round-md r-paste"></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 mt-md-50">
                    <div class="contact-information-fild get-bottom animate bg-gray-30 px-30 px-sm-15 py-50 py-sm-30">
                        <form method="POST" action="{{ route('contact.submit')}}">
                            @csrf 
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">

                                <div class="single-form">
                                    @error('name')<span class="text-center text-red" style="color:red !important;">{{$message}}</span>@enderror
                                    <input type="text" name="name" class="form-control" placeholder="Your Name*" required>
                                </div>
                            </div>
                        
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="single-form">
                                    @error('number')<span class="text-center text-red" style="color:red !important;">{{$message}}</span>@enderror
                                    <input type="number" name="number" class="form-control" placeholder="Contact Number*">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="single-form">
                                    @error('email')<span class="text-center text-red" style="color:red !important;">{{$message}}</span>@enderror
                                    <input type="email" name="email" class="form-control" placeholder="Official Email*">
                                </div>
                            </div>
                          
                            <div class="col-lg-12 col-md-12 col-sm-12 mt-4">
                                <div class="single-form">
                                    @error('message')<span class="text-center text-red" style="color:red !important;">{{$message}}</span>@enderror
                                    <textarea name="message" cols="150" placeholder="Any Message*" style="height: 150px;"></textarea>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-lg btn-purple btn-radious">Send massage</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
	@parent
	
@endsection