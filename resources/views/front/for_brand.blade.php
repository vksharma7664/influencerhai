@extends('layouts.app')
 
@section('title', $title)

@section('css')
    @parent
    
@endsection
 
@section('content')
    <section class="contact-us-module pt-50">
            <div class="inner-wrap">
                <div class="row">
                    <div class="col-md-12">
                       <div class="brand-text text-center mt-5 mb-5">
                        <h1 class="h3 bg-light">Sign up today & Work with hand-picked 50k-plus influencers across India. </h1>
                        <p>Please help us with your contact details or contact us at :</p>
                        <p><i class="icofont-email"></i> info@influencerhai.com &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; <i class="icofont-phone"></i> +91 82 35 932170 </p>
                       </div>
                    </div>
                </div>
              <div class="row brand_module">
                <div class="contact-data col-md-5 mt-5">
                    <div class="brand-box textbold">
                         <img src="{{ env('AWS_BASEURL_IMAGE').'front_assets/img/contact-woman.webp' }}" class="brand-girl">
                    </div>
                
                </div>
                    <div class="form-data mobile-form-control col-md-7">
                        <div role="form" class="wpcf7" id="wpcf7-f994-p1005-o1" lang="en-US" dir="ltr">
                         <form method="POST" action="{{ route('brand.store')}}">
                            @csrf
                         
                    <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12 form-sec">
                     <span class="field-text">Name*</span><br>

                     <span class="wpcf7-form-control-wrap" data-name="Name"><input type="text" name="name" value="" size="40" class="control-form-input" aria-required="true" aria-invalid="false"></span>
                     @error('name')<span class="text-center text-red" style="color:red !important;">{{$message}}</span>@enderror
                    </div>
                   <div class="col-lg-6 col-md-12 col-sm-12 col-last form-sec">
                   <span class="field-text">Designation*</span><br>
                  <span class="wpcf7-form-control-wrap" data-name="Designation"><input type="text" name="designation" value="" size="40" class="control-form-input" aria-required="true" aria-invalid="false"></span>
                  @error('designation')<span class="text-center text-red" style="color:red !important;">{{$message}}</span>@enderror
                  </div>
                   <div class="col-lg-6 col-md-12 col-sm-12 form-sec">
                   <span class="field-text">Brand / Company Name*</span><br>
                    <span class="wpcf7-form-control-wrap" data-name="Company"><input type="text" name="company_name" value="" size="40" class="control-form-input" aria-required="true" aria-invalid="false"></span>
                    @error('company_name')<span class="text-center text-red" style="color:red !important;">{{$message}}</span>@enderror
                    </div>
                   <div class="col-lg-6 col-md-12 col-sm-12 form-sec">
                    <span class="field-text">Contact No*</span><br>
                   <span class="wpcf7-form-control-wrap" data-name="Contact"><input type="number" name="number" value="" size="40" class="control-form-input" aria-required="true" aria-invalid="false"></span>
                   @error('number')<span class="text-center text-red" style="color:red !important;">{{$message}}</span>@enderror
                    </div>
                   <div class="col-lg-6 col-md-12 col-sm-12 form-sec col-last">
                    <span class="field-text">Official Email*</span><br>
                   <span class="wpcf7-form-control-wrap" data-name="Email"><input type="text" name="email" value="" size="40" class="control-form-input" aria-required="true" aria-invalid="false"></span>
                   @error('email')<span class="text-center text-red" style="color:red !important;">{{$message}}</span>@enderror
                 </div>
                 <div class="col-lg-6 col-md-12 col-sm-12 form-sec">
                     <span class="field-text">Budget*</span><br>
                    <span class="wpcf7-form-control-wrap" data-name="budget"><input type="text" name="budget" value="" size="40" class="control-form-input" aria-required="true" aria-invalid="false"></span>
                    @error('budget')<span class="text-center text-red" style="color:red !important;">{{$message}}</span>@enderror
                   </div>
                 
                  <div class="col-lg-6 col-md-12 col-sm-12 col-last form-sec">
                   <span class="field-text">Platforms</span><br>
                   <span class="wpcf7-form-control-wrap" data-name="Selectplatform"><select name="platform" class="control-form-input-2" aria-required="true" aria-invalid="false"><option value="">Select Platforms</option><option value="Facebook">Facebook</option><option value="Instagram">Instagram</option><option value="YouTube">YouTube</option><option value="Mix">Mix</option></select></span>
                    </div>
                  
                     <div class="col-lg-6 col-md-12 col-sm-12 col-last form-sec">
                    <span class="field-text">Type of Influencers</span><br>
                   <span class="wpcf7-form-control-wrap" data-name="Influencers"><select name="influencer_type" class="control-form-input-2" aria-required="true" aria-invalid="false"><option value="">Select Type of Influencers</option><option value="Nano">Nano</option><option value="Micro">Micro</option><option value="Macro">Macro</option><option value="Celebrity">Celebrity</option><option value="Customized">Customized</option></select></span>
                    </div>
                    
                   <div class="col-lg-12 col-md-12 col-sm-12  col-last form-sec">
                  <span class="field-text">Any Message?*</span><br>
                <span class="wpcf7-form-control-wrap" data-name="experience">
                   <!--  <input type="text" name="message" value="" size="40" class="control-form-input" aria-required="true" aria-invalid="false"> -->
                   <textarea name="message" value="" rows="10" class="input-contorls" aria-required="true" aria-invalid="false"></textarea>
                </span>
                @error('message')<span class="text-center text-red" style="color:red !important;">{{$message}}</span>@enderror
               </div>
               </div>
               <div>
              </div>
              <div class="btn-section">
            <input type="submit" value="Send" class="btn btn-sm btn-light-red br-6 btn-shatter-white btn-animate mt-5"><span class="wpcf7-spinner"></span>
            </div>
           </form>
          </div>
          </div>             
         </div>
        </section>
    <div class="brand-card-section mobile-respo pt-50">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <div class="brand-heading-cart">
                    <h2 class="h2 bg-light text-center">Influence the targeted audience.</h2>
                    <p>A successful influencer campaign cannot simply rely on a fan base. To interact with the influencers' audience most successfully, content and communication are essential. We aim to establish a positive brand image and connect with the relevant audience through our marketing campaign. We create effective social media strategies that make brands stand out from the crowd. Through our high-end experience and proven strategies, we can create a buzz about your products among your target audience.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="cord-brand">
                        <div class="card-brand-image">
                            <img src="{{ env('AWS_BASEURL_IMAGE').'front_assets/img/Influencer-marketing-1024x683.jpg' }}" class="img-fluid brand-image-card" alt="">
                        </div>
                        <div class="brand-card-text">
                            <h5>Influencer Marketing</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="cord-brand">
                        <div class="card-brand-image">
                            <img src="{{ env('AWS_BASEURL_IMAGE').'front_assets/img/Celebrity-endorsement-1024x683.jpg' }}" class="img-fluid brand-image-card" alt="">
                        </div>
                        <div class="brand-card-text">
                            <h5>Celebrity Endorsements</h5>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="cord-brand">
                        <div class="card-brand-image">
                            <img src="{{ env('AWS_BASEURL_IMAGE').'front_assets/img/Meme-marketing-1024x683.jpg' }}" class="img-fluid brand-image-card" alt="">
                        </div>
                        <div class="brand-card-text">
                            <h5>Meme Marketing</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row pt-20">
                <div class="col-md-4">
                    <div class="cord-brand">
                        <div class="card-brand-image">
                            <img src="{{ env('AWS_BASEURL_IMAGE').'front_assets/img/Movie_webseries-integration-1024x683.jpg' }}" class="img-fluid brand-image-card" alt="">
                        </div>
                        <div class="brand-card-text">
                            <h5>Movie/Web-series Integration</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="cord-brand">
                        <div class="card-brand-image">
                            <img src="{{ env('AWS_BASEURL_IMAGE').'front_assets/img/Live-celebrity-sessions-1024x683.jpg' }}" class="img-fluid brand-image-card" alt="">
                        </div>
                        <div class="brand-card-text">
                            <h5>Live Celebrity Sessions</h5>
                        </div>
                    </div>
                </div>
                 <div class="col-md-4">
                    <div class="cord-brand">
                        <div class="card-brand-image">
                            <img src="{{ env('AWS_BASEURL_IMAGE').'front_assets/img/comedy-show_Music-concertsjghgu-1024x669.jpg' }}" class="img-fluid brand-image-card" alt="">
                        </div>
                        <div class="brand-card-text">
                            <h5>Comedy Shows / Music Concerts</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



        <!--h2-logo slider start here-->
        @include('front.include.brand-logos')
        <!--h2-logo slider end here-->


        <section class="brand-platfroms">
            <div class="container">
               <div class="row">
                <div class="col-md-12">
                    <div class="brand-heading-cart">
                        <h2 class="text-center">Platforms we work on</h2>
                    </div>
                </div>
               </div>
               <div class="row">       
                <div class="col-lg-2 col-md-4 col-sm-6 col-6 social-content-brand">
                    <img src="{{ env('AWS_BASEURL_IMAGE').'front_assets/img/social-icon-image/Facebook.png' }}" class="img-fluid soc-brand" alt="">
                    <h6>Facebook</h6>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-6 social-content-brand">
                    <img src="{{ env('AWS_BASEURL_IMAGE').'front_assets/img/social-icon-image/li.png' }}" class="img-fluid soc-brand" alt="">
                    <h6>LinkdIn</h6> 
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-6 social-content-brand">
                    <img src="{{ env('AWS_BASEURL_IMAGE').'front_assets/img/social-icon-image/tw.png' }}" class="img-fluid soc-brand" alt="">
                    <h6>Twitter</h6>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-6 social-content-brand">
                    <img src="{{ env('AWS_BASEURL_IMAGE').'front_assets/img/social-icon-image/tele.png' }}" class="img-fluid soc-brand" alt="">
                    <h6>Telegram</h6>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-6 social-content-brand">
                    <img src="{{ env('AWS_BASEURL_IMAGE').'front_assets/img/social-icon-image/inst.png' }}" class="img-fluid soc-brand" alt="">
                    <h6>Instagram</h6>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-6 social-content-brand">
                    <img src="{{ env('AWS_BASEURL_IMAGE').'front_assets/img/social-icon-image/tik.png' }}" class="img-fluid soc-brand" alt="">
                    <h6>Tiktok</h6>
                </div>
              </div>
            </div>        
        </section>



        
@endsection

@section('scripts')
	@parent
	
@endsection