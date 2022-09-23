<?php 
$title = "Best Influencer Marketing Agency In India - InfluencerHai.com";
?>


@extends('layouts.app')
 
@section('title', $title)

 
@section('content')
      <!--banner area start here-->

    <section class="home-five-banner-area banner-section ps-0 pe-0 mt-0 mb-0">
        <div class="container">
            <div class="row">
                <div class="col-md-7 banner-content-section">
                    <div class="home-five-banner home-banner-content get-bottom animate mt-5">
                        <h1 class=" h1 pb-20 text-white animate">Promote your Brand with our ingenious Influencer Marketing Programs</h1>
                        <p class="pb-50 pb-md-25 text-white animate">We make it feasible for your brand to be visible globally in the digital space, fostering growth and ensuring success.
                        </p>
                        <div class="animate">
                            <a href="{{ route('brand')}}" class="btn btn-sm btn-orange2 btn-shatter-orange2 btn-animate btn-radious text-capital">I am a Brand</a>
                           <a href="{{ route('influencer')}}" class="btn btn-sm btn-orange2 btn-shatter-orange2 btn-animate btn-radious text-capital space-in-banner">I am an Influencer</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--banner area end here-->



    <!--h2-logo slider start here-->
    @include('front.include.brand-logos')
    <!--h2-logo slider end here-->


    <!--h2-features area start here--><!--  hide for now -->
    <section class="feature-card-two  pb-100 pb-md-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-md-30">
                   <div class="technology-content">
                      <h2 class="h2">Boost the awareness of your brand with us.</h2>
                      <p>Influencer Hai is a renowned influencer marketing platform in India that integrates businesses with social media influencers to create epic product marketing narratives. Through impressive influencer content and marketing campaigns, our professionals connect businesses with top content producers, social media influencers, artists, and bloggers to reach and engage millions of consumers.</p>
                   </div>
                </div>
                <div class="col-lg-4 mb-md-30">
                    <div class="single-feature-two blue-shape">
                        <div class="h2-feature-icon d-center blue-shadow bg-blue mb-40 mb-sm-25  get-bottom">
                           <img src="{{ env('AWS_BASEURL_IMAGE').'front_assets/img/svg/email-marketing.svg' }}" alt="Contact InfuencerHai.com's team for the benefits of influencer marketing as brand/client.">
                        </div>
                        <div class="card-two-content  get-bottom">
                            <div class="">
                                <div class="card-title">
                                    <h3 class="pb-25 pb-md-20">Influencers</h3>
                                </div>
                                <p class="pb-30 pb-md-25">Boost your visibility on social media by generating interesting content to receive fantastic deals, discounts, and of course cash!</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-feature-two red-shape">
                        <div class="h2-feature-icon d-center red-shadow bg-red mb-40 mb-sm-25  get-bottom">
                           <img src="{{ env('AWS_BASEURL_IMAGE').'front_assets/img/svg/earth-globe.svg' }}" alt="Contact InfuencerHai.com's team to collaborate with brands/companies for their brand promotion.">
                        </div>
                        <div class="card-two-content  get-bottom">
                            <div class="">
                            <div class="card-title">
                                <h3 class="pb-25 pb-md-20 ">Brands</h3>
                            </div>
                            <p class="pb-30 pb-md-25 ">Collaborate with well-known and innovative influencers to increase the value of your brand and gain a strong online presence swiftly.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--h2-features area end here-->
    <!--h2-we-are area start here-->
    <section class="we-are-area section-bg-padding">
        <div class="we-are-img">
            <div class="we-are-banner-img">
                <img src="{{ env('AWS_BASEURL_IMAGE').'front_assets/img/home2/we-are/banner.webp' }}" alt="A man is holding a laptop in his hand, he seems like he is promoting influencer marketing.">
            </div>
            <div class="we-are-animation">
                <img src="{{ env('AWS_BASEURL_IMAGE').'front_assets/img/home2/we-are/like.png' }}" alt="" class="h2-like">
                <img src="{{ env('AWS_BASEURL_IMAGE').'front_assets/img/home2/we-are/heart.png' }}" alt="" class="h2-heart">
                <img src="{{ env('AWS_BASEURL_IMAGE').'front_assets/img/home2/we-are/message.png' }}" alt="" class="h2-message">
                <img src="{{ env('AWS_BASEURL_IMAGE').'front_assets/img/home2/we-are/square.png' }}" alt="" class="h2-square">
                <img src="{{ env('AWS_BASEURL_IMAGE').'front_assets/img/home2/we-are/circle.png' }}" alt="" class="moving-circle">
                <img src="{{ env('AWS_BASEURL_IMAGE').'front_assets/img/home2/we-are/circle2.png' }}" alt="" class="moving-circle-right">
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-lg-6">
                    <div class="we-are-content get-bottom animate">
                        <div class="section-title animate">
                            <h2  class="h1">How Influencer Hai - Leading Influencer Marketing Agency in India can benefit brands?</h2>
                        </div>
                        <p class="pb-50 animate">As a well-known influencer marketing agency in India, we are dedicated to developing social media strategies that make brands stand out from the crowd. To ensure that a brand achieves its financial objectives, we assist them in selecting influencers who fit their specific brand, are within their range, and run effective social media campaigns.</p>
                        <div class="animate">
                            <a href="{{ route('about')}}" class="btn btn-sm btn-light-red br-6 btn-shatter-white btn-animate">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--h2-we-are area end here-->
    
    <!--traffic area start here-->

    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="h2-we-make-heading heading-content pb-50 get-bottom animate">
                        <div class="section-title animate">
                            <h2 class="pb-10">Our commercial categories & Segments</h2>
                        </div>
                        <p class="animate">To conquer the digital sphere, you need to have an army of talent at your disposal. The right social influencer when combined with relatable content and a targeted audience produces guaranteed results.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="row">
                        <div class="col-md-3 col-sm-6 mx-auto mb-md-30 bottom-content get-bottom animate">
                            <a href="{{route('influencers.category')}}">
                                <div class="working-card case-card animate">
                                    <div class="comon-card-icon m-auto d-center svg-50 svg-blue animate">
                                        <img src="{{ env('AWS_BASEURL_IMAGE').'front_assets/img/svg/grid.pn' }}g" alt="">
                                    </div>
                                    <h3 class="pt-25 animate">All</h3>
                                </div>
                            </a>
                        </div>
                        @foreach($categories as $cat)
                        
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
  
    <!--traffic area end here-->

 
    <section class="web-Strategy-area relative pt-20 pt-md-60 pb-50 pb-md-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="web-Strategy-content-wrapper">
                        <div class="web-Strategy-content">
                            <div class="section-heading pb-20">
                                <h2 class="h2">Our Bespoke Influencer Marketing Services</h2>
                            </div>
                            <br>
                           
                        </div>
                        <div class="row">
                            <div class="col-sm-6 mb-50 mb-sm-30">
                                <div class="web-Strategy-single d-flex align-items-center">
                                    <div class="web-Strategy-icon svg-50 svg-paste mr-15">
                                        <img src="{{ env('AWS_BASEURL_IMAGE').'front_assets/img/client/influencer-marketing.png' }}" class="img-fluid" alt="Influencer Marketing Infrographic image">
                                    </div>
                                    <div class="card-title">
                                        <h4>Influencer Marketing</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-50 mb-sm-30">
                                <div class="web-Strategy-single d-flex align-items-center">
                                    <div class="web-Strategy-icon svg-50 svg-ired mr-15">
                                        <img src="{{ env('AWS_BASEURL_IMAGE').'front_assets/img/client/social-media.png' }}" alt="Social media marketing logo">
                                    </div>
                                    <div class="card-title">
                                        <h4>Social Media Marketing</h4>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="col-sm-6 mb-xs-30">
                                <div class="web-Strategy-single d-flex align-items-center">
                                    <div class="web-Strategy-icon svg-50 svg-pink mr-15">
                                        <img src="{{ env('AWS_BASEURL_IMAGE').'front_assets/img/client/brand-promotion.png' }}" alt="Brand Promotion Icon asking brands/companies to join and collaborate with Infuencerhai.com to achieve brand value through India's rapidly growing Influencer marketing agency.">
                                    </div>
                                    <div class="card-title">
                                        <h4>Brand Promotion </h4>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="col-sm-6 ">
                                <div class="web-Strategy-single d-flex align-items-center">
                                    <div class="web-Strategy-icon svg-50 svg-pink mr-15">
                                        <img src="{{ env('AWS_BASEURL_IMAGE').'front_assets/img/client/meme.png' }}" alt="Meme Marketing Logo - Meme marketing is used to promote brand narrative. Meme marketing connects with the audience effectively since it is all about humor.">
                                    </div>
                                    <div class="card-title">
                                        <h4>Meme Marketing </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="web-Strategy-img">
            <img src="{{ env('AWS_BASEURL_IMAGE').'front_assets/img/Web-strategy.png' }}" alt="">
            <div class="web-stratgey-animation">
                <div class="line-set-light web-stray-1">
                    <img class="line-path" src="{{ env('AWS_BASEURL_IMAGE').'front_assets/img/home3/banner/animation/line1.png' }}" alt="">
                    <img class="line-path" src="{{ env('AWS_BASEURL_IMAGE').'front_assets/img/home3/banner/animation/line2.png' }}" alt="">
                </div>
                <div class="line-set web-stray-2">
                    <img class="line-path" src="{{ env('AWS_BASEURL_IMAGE').'front_assets/img/home3/banner/animation/small-line1.png' }}" alt="">
                    <img class="line-path" src="{{ env('AWS_BASEURL_IMAGE').'front_assets/img/home3/banner/animation/small-line2.png' }}" alt="">
                </div>
                <div class="star-set web-stray-3">
                    <img class="circle-path" src="{{ env('AWS_BASEURL_IMAGE').'front_assets/img/home3/banner/animation/star2.png' }}" alt="">
                    <img class="start-position circle-path" src="{{ env('AWS_BASEURL_IMAGE').'front_assets/img/home3/banner/animation/star3.png' }}" alt="">
                </div>
                <div class="star-set web-stray-4">
                    <img class="circle-path" src="{{ env('AWS_BASEURL_IMAGE').'front_assets/img/home3/banner/animation/star2.png' }}" alt="">
                    <img class="start-position circle-path" src="{{ env('AWS_BASEURL_IMAGE').'front_assets/img/home3/banner/animation/star3.png' }}" alt="">
                </div>
                <span class="circle-sm r-yellow web-stray-5 circle-path"></span>
                <span class="circle-md r-yellow web-stray-6 circle-path"></span>
                <img class="web-stray-7 circle-path" src="{{ env('AWS_BASEURL_IMAGE').'front_assets/img/home3/banner/animation/sui-1.png' }}" alt="">
                <img class="web-stray-8 circle-path" src="{{ env('AWS_BASEURL_IMAGE').'front_assets/img/home3/banner/animation/sui-1.png' }}" alt="">
            </div>
        </div>
    </section>



    <!--prefer area start here-->
    <section class="prefer-area h2-prefer-area pt-100 pt-md-60 pb-50 pb-md-30 relative">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-xl-7 col-lg-6">
                    <div class="prefer-content h2-prefer-content pb-md-30">
                        <div class="prefer-heading pb-50 pb-sm-25  get-bottom animate">
                            <div class="section-title">
                                <h2 class="pb-15 animate">Why choose us – Leading Influencer Marketing Agency in India</h2>
                            </div>
                            <p class="animate">As a well-known influencer marketing agency in India, we are dedicated to developing social media strategies that make brands stand out from the crowd. To ensure that a brand achieves its financial objectives, we assist them in selecting influencers who fit their specific brand, are within their range, and run effective social media campaigns.
                              <br>
                           We analyze the intended audience, offer insightful market information, and design marketing campaigns that adhere to the target audience's preferences and fit the current trends. As a result, we contribute to the creation of buzz in the online community.
                           </p>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
        <div class="h2-prefer-image-area">
            <div class="h2-prefer-bg-img"></div>
            <div class="h2-prefer-banner-img">
                <img src="{{ env('AWS_BASEURL_IMAGE').'front_assets/img/home2/feature/banner-man.webp' }}" alt="Inforgraphic Influencer Marketing Agency Banner for InfluencerHai.com">
            </div>
        </div>
    </section>


    <!--press release start here-->
    <section class="faq-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center mb-5">
                    <h2 class="frequently-text">Frequently Asked Questions</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-9 m-auto">
                    <div class="accordion-content">
                        <div class="accordion_container">
                            <div class="accordion_head">1. Are small businesses a good fit for influencer marketing?<span class="plusminus">+</span></div>
                            <div class="accordion_body" style="display: none;">
                              <p>Since start-ups and mid-sized enterprises typically have limited resources, influencer marketing is perfect for them. Additionally, it is a tried-and-true way to generate buzz in a specific region. For this reason, influencer marketing is preferable for small firms rather than conventional marketing. Your audience won't be swamped with information during an influencer marketing campaign. They will be encouraged to purchase your products & services for all the benefits they offer. </p>
                            </div>
                            <div class="accordion_head">2. What Are the Responsibilities of Influencer Marketing Firms?<span class="plusminus">+</span></div>
                            <div class="accordion_body" style="display: none;">
                              <p>The influencer marketing campaigns are organized by influencer marketing agencies to promote various brands and businesses. These firms find the top influencers and get them to sign contracts committing to the deliverables. The concepts and material your brand develops with the aid of an influencer agency will encourage engagement from the influencers' audience. For each campaign, these set up tracking pixels and other tools to give your brand in-depth data and quantifiable information.</p>
                            </div>
                            <div class="accordion_head">3.  What is influencer marketing meaning? Is it the same as Celebrity Endorsements?<span class="plusminus">+</span></div>
                            <div class="accordion_body" style="display: none;">
                              <p>No.
                              Compared to celebrities, influencers typically have a limited reach. They specialize in a specific area and produce content in that particular area to attract those with similar interests. In contrast to celebrities, influencers typically engage with their devoted fans who share common perspectives with them.
                              </p>
                            </div>
                            <div class="accordion_head">4. What benefits might I expect from my marketing campaign? <span class="plusminus">+</span></div>
                            <div class="accordion_body" style="display: none;">
                              <p>Following the successful conclusion of your campaign, you can anticipate:

                              ●  Exceptional visual content for your project's promotion
                              ●  Increased number of visitors to your social media pages
                              ●  More engagement
                              ●  Increased queries
                              </p>
                            </div>
                            <div class="accordion_head">5. How can I launch my first influencer marketing campaign?<span class="plusminus">+</span></div>
                            <div class="accordion_body" style="display: none;">
                              <p>To launch your first influencer marketing campaign, get in touch with an Influencer Hai - an authentic influencer marketing agency. Our team will provide you with thorough guidance and handle everything from reaching out to influencers to creating a successful marketing campaign. We use the latest analytics technology that will enable you to assess the success of your campaign.</p>
                            </div>
                            <div class="accordion_head">6. Can influencer marketing work as a long-term marketing plan for my business?<span class="plusminus">+</span></div>
                            <div class="accordion_body" style="display: none;">
                              <p>Influencer marketing has a significant impact on your company's long-term strategy. Your website's traffic will grow naturally as a result of an effective campaign, which will help your SEO ranking on google search engines over time. Additionally, it will enable you to establish lasting relationships with your clients, which will lead to you achieving your business goals successfully.</p>
                            </div>
                            <div class="accordion_head">7. Why should I partner with an Influencer Hai?<span class="plusminus">+</span></div>
                            <div class="accordion_body" style="display: none;">
                              <p>Influencer Hai is a top influencer marketing firm, and hiring us as a beginner will ensure that your ROI is maximized. You can check the effectiveness of your campaigns using our analytics software. 
                                 <br>
                              Additionally, we will assist you in choosing the right influencers who can effectively convey your brand's message using their creative style. Working with us is not only an affordable option, but it's time-efficient too. Furthermore, we will assist you in creating a premium campaign that will effectively increase the revenue from your target audience. 
                              </p>
                            </div>
                            <div class="accordion_head">8. How do I measure the effectiveness of my marketing campaign?<span class="plusminus">+</span></div>
                            <div class="accordion_body" style="display: none;">
                              <p>Influencer Hai provides you with numerous analytics tools to monitor the performance of your campaign. You may check your business profile's reach and impression on Instagram and other social media influencer platforms. 
                                 <br>
                              The formula for engagement is pretty straightforward:
                                 <br>
                              Engagement =  Reach + Clicks + Likes + Comments + Shares 
                              </p>
                            </div>
                            <div class="accordion_head">9. What is the step-by-step process of an influencer marketing strategy?<span class="plusminus">+</span></div>
                            <div class="accordion_body" style="display: none;">
                              <p>The steps followed for an influencer marketing campaign to be successful are:

                              Step I: Set your promotional objectives.

                              Step II: List your specifics (budget, type of content, design, etc.)

                              Step III: Decide which influencers you want to work with

                              Step IV: Create engaging content

                              Step V: Promote your content on social media

                              Step VI: Track Performance
                              </p>
                            </div>
                            <div class="accordion_head">10. How much does launching an influencer marketing campaign cost?<span class="plusminus">+</span></div>
                            <div class="accordion_body" style="display: none;">
                              <p>The cost of the campaign varies from business to business and from one industry to another. Additionally, it will depend on the deliverables and the number of influencers you wish to collaborate with. You will receive more inquiries and your campaign will cost you more if you want to run it simultaneously across several social media networks.</p>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
   
@endsection