@extends('layouts.app')
 
@section('title', $title)

@section('css')
    @parent
    

@endsection


 
@section('content')


    <section class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="h2-we-make-heading heading-content pb-50 get-bottom animate">
                        <div class="section-title animate">
                            <h1 class="h1 pb-10">A leading influencer marketing agency in India - About Us</h1>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="col-md-12">
                    <div class="privacy-content">
                        
                        <p>Influencer Hai - A data-driven team of designer & creators transforming relationships between brands, influencers, and their audiences.</p>
                        <p class="mt-3">Influencer Hai is a leading influencer marketing firm that connects major brands with passionate, socially engaged audiences through social media influencers. Our goal is to establish relationships with new talent and assist brands in telling stories that matter. We firmly believe in a human-first approach to talent identification and high-touch service in addition to our dependable data and technology.</p>
                        <p class="mt-3">We complement brand marketing strategies with strong campaigns to guarantee high-quality engagement for the brand. Our user-friendly platform makes it simple for brands to create influencer marketing campaigns, collaborate with specific influencers, set marketing budgets, and track progress.</p>
                        <p class="mt-3">We also connect businesses with content curators across the country to maintain the competitiveness of their brand. We support businesses of all sizes in using social insights to generate more revenue. Our sponsored content campaigns captivate consumers, advance brand engagement and exposure, while increasing product sales. </p>
                       
                    </div>
                </div>
            </div>
        
        </div>
    </section>


    <section class="about-award pt-5- pt-md-60 pb-20 pb-md-30 pt-50 pb-50" style="background-color: #eef1fa">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-award-content get-bottom animate">
                        <div class="section-title animate">
                            <h2 class="pb-20">Our Mission</h2>
                        </div>
                        <p class="animate">Influencer Hai aspires to create a dynamic workplace where every individual can prosper and have a fulfilling career. Our mission is to unite a generation of digital creators and build strong relationships with our clients to create a diverse workplace that caters to everyone's needs.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="get-bottom animate">
                       <h2 class="pb-20">Our Vision</h2>
                       <p class="animate">As the #1 influencer marketing business in India, Influencer Hai wants to be a one-stop agency for brands and influencers. With the use of successful strategies, our goal is to make influencer marketing the most productive and sought-after path in the marketing landscape for businesses. We deploy storytelling, which we passionately believe has the power to lead effective brand communication.</p>
                    </div>
                </div>
            </div>
           
        </div>
    </section>

    <section class="counter-effect">
        <div class="container">
            <div class="row counter mt-50 pt-md-30 pb-50 mb-md-30">
                <div class="col-lg-3 col-6 get-bottom animate">
                    <div class="single-counter-two d-flex align-items-center justify-content-center">
                        <div class="h2-counter-icon  d-center svg-50 svg-grdnt-purple mr-15">
                           <img src="{{ env('AWS_BASEURL_IMAGE').'front_assets/img/svg/smile.svg' }}" alt="">
                        </div>
                        <div class="comon-counter-content text-center">
                            <span class="h2-cn1">3580</span>
                            <p>Food</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6 get-bottom animate">
                    <div class="single-counter-two d-flex align-items-center justify-content-center">
                        <div class="h2-counter-icon  d-center svg-50 svg-grdnt-purple mr-15">
                            <img src="{{ env('AWS_BASEURL_IMAGE').'front_assets/img/svg/user-cup.svg' }}" alt="">
                        </div>
                        <div class="comon-counter-content text-center">
                            <span class="h2-cn2">3580</span>
                            <p>Education</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6 get-bottom animate">
                    <div class="single-counter-two d-flex align-items-center justify-content-center">
                        <div class="h2-counter-icon d-center svg-50 svg-grdnt-purple mr-15">
                            <img src="{{ env('AWS_BASEURL_IMAGE').'front_assets/img/svg/tea-cup.svg' }}" alt="">
                        </div>
                        <div class="comon-counter-content text-center">
                            <span class="h2-cn3">1587</span>
                            <p>Mom</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6 get-bottom animate">
                    <div class="single-counter-two d-flex align-items-center justify-content-center">
                        <div class="h2-counter-icon d-center svg-50 svg-grdnt-purple mr-15">
                            <img src="{{ env('AWS_BASEURL_IMAGE').'front_assets/img/svg/layers.svg' }}" alt="">
                        </div>
                        <div class="comon-counter-content text-center">
                            <span class="h2-cn4">2548</span>
                            <p>Health</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- our executive -->

   <!-- add team here -->
    @include('front.include.team')


    <!--our-clients area start here-->
    <section class="our-clients pt-10 pt-md-60 pb-50 pb-md-30">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="clients-heading get-bottom animate">
                        <h2 class="pb-50 mx-width-80p">Some Feedback From Our Clients</h2>
                    </div>
                    <div class="clients-owl-nav d-flex align-items-center get-left animate">
                        <div class="co-prev co-comon mr-20">
                            <i class="icofont-long-arrow-right rotate-180 d-block"></i>
                        </div>
                        <div class="co-next co-comon">
                            <i class="icofont-long-arrow-right"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="clients-owl-area owl-carousel" data-carousel-items="1">
                        <div class="single-cowl-wrap">
                            <div class="relative black-shadow single-client-owl radious-10">
                                <div class="client-owl-img black-shadow">
                                    <img src="{{ env('AWS_BASEURL_IMAGE').'front_assets/img/home1/client.png' }}" alt="">
                                </div>
                                <div class="get-bottom animate">
                                    <p class="pb-40 animate">I truly admire everything the Influencer Hai team has done for us. They truly deserve praise for the manner they handled our campaigns and for their dedication. We are happy to have Influencer Hai as a partner. Looking forward to more collaborations</p>
                                    <h3 class="pb-5 animate">Gravine Adwards</h3>
                                    <p class="animate">influencer</p>
                                </div>
                            </div>
                        </div>
                        <div class="single-cowl-wrap">
                            <div class="single-client-owl relative black-shadow radious-10">
                                <div class="client-owl-img black-shadow">
                                    <img src="{{ env('AWS_BASEURL_IMAGE').'front_assets/img/home1/client.png' }}" alt="">
                                </div>
                                <div class="get-bottom animate">
                                    <p class="pb-40 animate"> Our efforts to use influencer marketing to grow our business in India were massively assisted by the Influencer Hai team. They were able to locate extremely talented creators across a variety of industries, and they were in charge of the whole process from start to finish. The team is professional and dependable in all aspects. Without a doubt, this is a company I'll keep working with.</p>
                                    <h3 class="pb-5 animate">Gravine Adwards</h3>
                                    <p class="animate">influencer</p>
                                </div>
                            </div>
                        </div>
                        <div class="single-cowl-wrap">
                            <div class="single-client-owl relative black-shadow radious-10">
                                <div class="client-owl-img black-shadow">
                                    <img src="{{ env('AWS_BASEURL_IMAGE').'front_assets/img/home1/client.png' }}" alt="">
                                </div>
                                <div class="get-bottom animate">
                                    <p class="pb-40 animate">Influencerhai.com, is an influencer marketing platform, creating a chain of internet creators and consumers through scaling businesses</p>
                                    <h3 class="pb-5 animate">Gravine Adwards</h3>
                                    <p class="animate">influencer</p>
                                </div>
                            </div>
                        </div>
                        <div class="single-cowl-wrap">
                            <div class="single-client-owl relative black-shadow radious-10">
                                <div class="client-owl-img black-shadow">
                                    <img src="{{ env('AWS_BASEURL_IMAGE').'front_assets/img/home1/client.png' }}" alt="">
                                </div>
                                <div class="get-bottom animate">
                                    <p class="pb-40 animate">I have worked with the Influencer Hai crew on numerous occasions. The crew is knowledgeable, motivated, and skilled in the use of influencer marketing, and the outcomes we achieved speak highly of their expertise. Influencer hai is  your best bet if you want to use influencer marketing strategy to engage your customers. </p>
                                    <h3 class="pb-5 animate">Gravine Adwards</h3>
                                    <p class="animate">influencer</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--our-clients area end here-->

     <!--h2-logo slider start here-->
    @include('front.include.brand-logos')
    <!--h2-logo slider end here-->
@endsection

@section('scripts')
	@parent
	
@endsection