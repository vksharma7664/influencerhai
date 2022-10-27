@extends('layouts.app')
 
@section('title', $title)

@section('css')
    @parent
    

@endsection
 
@section('content')
     <main class="influencer" style="background-color: #f2f1fd;">

        <section class="desktop-space">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="h2-we-make-heading heading-content spmo get-bottom animate">
                            <div class="section-title animate">
                                <h1 class="h3 bg-primary text-white" >
                                   A hand-picked list of the best influencers in India.</h1>
                            </div>
                        </div>
                    </div>
                </div>
             
                         <div class="row mobile-hidden">
                            @foreach($nano_categories as $cat)
                            <div class="col-lg-3 col-md-4 col-sm-6 mb-sm-50 get-bottom animate" style="opacity: 1; visibility: inherit; transform: translate(0px, 0px);">
                                <div class="top-content-icon-text">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="img-solical-icons">
                                                <img src="{{ env('AWS_BASEURL_IMAGE').'front_assets/img/Icon-1.png' }}" class="img-fluid img-aspiring" alt="">
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="aspiring-para">
                                                <p>{{ explode(' ',trim($cat->name))[0]}} <br> Influencers </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="h4-single-team ">
                                    @if($cat->long_desc != null)<a href="{{route('influencers.list',$cat->slug)}}"> @endif
                                        <div class="h4-team-img team-images relative">
                                            <img src="{{env('AWS_BASEURL_IMAGE').$cat->image}}" alt="{{$cat->name}} Logo" style=" max-width: 61%; margin-left: 54px;">
                                           
                                        </div>
                                    @if($cat->long_desc != null)</a> @endif
                                    <div class="h4-team-cont cont-pw get-bottom animate" style="opacity: 1; visibility: inherit; transform: translate(0px, 0px);">
                                     <div class="influencer-para-content">
                                        
                                      <p> {{$cat->sort_desc}} </p>       
                                     </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            
                        </div>
                        <div class="row mobile-slider">
                            <div class="owl-carousel owl-theme">
                            @foreach($nano_categories as $cat)
                            <div class="col-md-3 item mb-sm-50 get-bottom animate" style="opacity: 1; visibility: inherit; transform: translate(0px, 0px);">
                                <div class="top-content-icon-text">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="img-solical-icons">
                                                <img src="{{ env('AWS_BASEURL_IMAGE').'front_assets/img/Icon-1.png' }}" class="img-fluid img-aspiring" alt="">
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="aspiring-para">
                                                <div class="influen-text">{{ explode(' ',trim($cat->name))[0]}}</div>
                                                <div class="influen-text-2">Influencers</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="h4-single-team team-single-section">
                                    @if($cat->long_desc != null)<a href="{{route('influencers.list',$cat->slug)}}"> @endif
                                        <div class="h4-team-img team-images relative">
                                            <img src="{{env('AWS_BASEURL_IMAGE').$cat->image}}" alt="{{$cat->name}} Logo">
                                            
                                        </div>
                                   @if($cat->long_desc != null)</a> @endif
                                    <div class="h4-team-cont cont-pw get-bottom animate" style="opacity: 1; visibility: inherit; transform: translate(0px, 0px);">
                                     <div class="influencer-para-content">
                                        
                                      <p> People who want to start out but don’t know how to </p>       
                                     </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            
                           </div>

                        </div>
                   
                      
                </div>
            </div>
        </section>
       
       
        <section class="desktop-space pb-50">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="row">
                           
                            @foreach($normal_categories as $cat)
                            
                           <div class="col-md-3 col-sm-6 mx-auto mb-md-30 bottom-content get-bottom animate">
                            @if($cat->long_desc != null)<a href="{{route('influencers.list',$cat->slug)}}"> @endif
                                <div class="working-card case-card relative animate">
                                    <div class="comon-card-icon m-auto d-center svg-50 svg-blue animate">
                                        <img src="{{env('AWS_BASEURL_IMAGE').$cat->image}}" alt="{{$cat->name}} Logo "> 
                                    </div>
                                    <h3 class="pt-25 animate">{{$cat->name}}</h3>
                                </div>
                            @if($cat->long_desc != null)</a> @endif
                        </div>
                            
                            @endforeach
                           
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
@endsection

@section('scripts')
	@parent
	
@endsection