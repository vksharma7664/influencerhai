@extends('layouts.app')
 
@section('title', $title)

@section('css')
    @parent
    
@endsection
 
@section('content')
    <section class="blog-heading-text pt-20">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="blog-text">
                        <h2>Press Release</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

   
    <!-- blog mesonry start here -->
    <div class="blog-mesonry-area section-bg-padding">
        <div class="container">
            <div class="row mesonry">
                <div class="col-lg-4 col-sm-6 mesonry-item">
                    <a href="{{ route('blog.details')}}">
                    <div class="single-mesonry single-blog radious-10 bg-white border-shadow">
                        <div class="single-blog-img radious-10">
                            <img src="{{ asset('front_assets/img/home1/blog1.png') }}" alt="">
                        </div>
                        <div class="single-blog-content p-20 get-bottom animate">
                            <div class="blog-title">
                                <span  class="pb-10 text-18">Top 10 Food Influencers In India To Follow On Instagram</span>
                            </div>
                            <p class="text-14">12 Jun 2022</p>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6 mesonry-item">
                    <a href="blog-details.html">
                    <div class="single-mesonry single-blog radious-10 bg-white border-shadow">
                        <div class="single-blog-img radious-10">
                            <img src="{{ asset('front_assets/img/blog-mesonry/img1.png') }}" alt="">
                        </div>
                        <div class="single-blog-content p-20 get-bottom animate">
                            <div class="blog-title">
                                <a href="blog-details.html" class="pb-10 text-18">An Updated List Of Top Vegan Influencers Of India To Follow In 2022</a>
                            </div>
                            <p class="text-14">12 Jun 2022</p>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6 mesonry-item">
                    <a href="blog-details.html">
                    <div class="single-mesonry single-blog radious-10 bg-white border-shadow">
                        <div class="single-blog-img radious-10">
                           <img src="{{ asset('front_assets/img/blog-mesonry/img2.png') }}" alt="">
                        </div>
                        <div class="single-blog-content p-20 get-bottom animate">
                            <div class="blog-title">
                                <a href="blog-details.html" class="pb-10 text-18">Top Sustainability Influencers In India Who Are Promoting Electrical Vehicles</a>
                            </div>
                            <p class="text-14">12 Jun 2022</p>
                        </div>
                    </div>
                </a>
                </div>
                <div class="col-lg-4 col-sm-6 mesonry-item">
                    <a href="blog-details.html">
                    <div class="single-mesonry single-blog radious-10 bg-white border-shadow">
                        <div class="single-blog-img radious-10">
                           <img src="{{ asset('front_assets/img/blog-mesonry/img2.png') }}" alt="">
                        </div>
                        <div class="single-blog-content p-20 get-bottom animate">
                            <div class="blog-title">
                                <a href="blog-details.html" class="pb-10 text-18">Top 10 Climate Activists of India Every Conscious Person Should Follow</a>
                            </div>
                            <p class="text-14">12 Jun 2022</p>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6 mesonry-item">
                    <a href="blog-details.html">
                    <div class="single-mesonry single-blog radious-10 bg-white border-shadow">
                        <div class="single-blog-img radious-10">
                           <img src="{{ asset('front_assets/img/blog-mesonry/img3.png') }}" alt="">
                        </div>
                        <div class="single-blog-content p-20 get-bottom animate">
                            <div class="blog-title">
                                <a href="blog-details.html" class="pb-10 text-18">Things You Can Learn From These Top Sustainability Influencers In India</a>
                            </div>
                            <p class="text-14">12 Jun 2022</p>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6 mesonry-item">
                    <a href="blog-details.html">
                    <div class="single-mesonry single-blog radious-10 bg-white border-shadow">
                        <div class="single-blog-img radious-10">
                           <img src="{{ asset('front_assets/img/blog-mesonry/img4.png') }}" alt="">
                        </div>
                        <div class="single-blog-content p-20 get-bottom animate">
                            <div class="blog-title">
                                <a href="blog-details.html" class="pb-10 text-18">Sustainable Fashion Influencers In India We Admire</a>
                            </div>
                            <p class="text-14">12 Jun 2022</p>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6 mesonry-item">
                    <a href="blog-details.html">
                    <div class="single-mesonry single-blog radious-10 bg-white border-shadow">
                        <div class="single-blog-img radious-10">
                           <img src="{{ asset('front_assets/img/blog-mesonry/img5.png') }}" alt="">
                        </div>
                        <div class="single-blog-content p-20 get-bottom animate">
                            <div class="blog-title">
                                <a href="blog-details.html" class="pb-10 text-18">Things You Can Learn From These Top Sustainability Influencers In India</a>
                            </div>
                            <p class="text-14">12 Jun 2022 </p>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6 mesonry-item">
                    <a href="blog-details.html">
                    <div class="single-mesonry single-blog radious-10 bg-white border-shadow">
                        <div class="single-blog-img radious-10">
                           <img src="{{ asset('front_assets/img/blog-mesonry/img6.png') }}" alt="">
                        </div>
                        <div class="single-blog-content p-20 get-bottom animate">
                            <div class="blog-title">
                                <a href="blog-details.html" class="pb-10 text-18">Things You Can Learn From These Top Sustainability Influencers In India</a>
                            </div>
                            <p class="text-14">12 Jun 2022</p>
                        </div>
                    </div>
                </a>
                </div>
                <div class="col-lg-4 col-sm-6 mesonry-item">
                    <a href="blog-details.html">
                    <div class="single-mesonry single-blog radious-10 bg-white border-shadow">
                        <div class="single-blog-img radious-10">
                           <img src="{{ asset('front_assets/img/blog-mesonry/img8.png') }}" alt="">
                        </div>
                        <div class="single-blog-content p-20 get-bottom animate">
                            <div class="blog-title">
                                <a href="blog-details.html" class="pb-10 text-18">Things You Can Learn From These Top Sustainability Influencers In India</a>
                            </div>
                            <p class="text-14">12 Jun 2022</p>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- blog mesonry end here -->


    <div class="blog-navigation d-flex justify-content-center pb-50">
        <ul class="d-flex align-items-center get-bottom " style="opacity: 1; visibility: inherit; transform: translate(0px, 0px);">
            <li class="am-comon d-center"><i class="icofont-thin-right rotate-180 text-25 d-block"></i></li>
            <li class="am-comon d-center active">1</li>
            <li class="am-comon d-center">2</li>
            <li class="am-comon d-center">3</li>
            <li class="am-comon d-center">4</li>
            <li class="am-comon d-center"><i class="icofont-thin-right text-25"></i></li>
        </ul>
    </div>
@endsection

@section('scripts')
	@parent
	
@endsection