@php
    $shared_data = $shared_data[Route::currentRouteName()] ?? [];
    
@endphp

<!DOCTYPE html>
<html lang="en">
    <head>
        <title> {{ $shared_data ? $shared_data['title'] : $meta_details['meta_title'] ?? 'A hand-crafted list of the best influencers in India.' }} </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

          <meta name="description" content="{{ $shared_data ? $shared_data['desc'] : $meta_details['meta_desc'] ?? '' }}">
          <meta name="keywords" content="{{ $shared_data ? $shared_data['keywords'] : $meta_details['meta_keywords'] ?? '' }}" />


          <meta property="og:type" @if(Route::currentRouteName() == 'blog.details') content="article" @else content="website" @endif />
          <meta property="og:locale" content="en_US" />
          

          <meta property="og:url" content="{{ URL::current() }}" />
          <meta property="og:site_name" content="Influencer Marketing Agency India" />
          <meta property="og:image" @if(Route::currentRouteName() == 'blog.details') content="{{env('AWS_BASEURL_IMAGE').$blog->image}}" @else content="{{ env('AWS_BASEURL_IMAGE').'front_assets/img/og/best-influencer-marketing-in-india.webp' }}" @endif/>
          <meta property="og:description" content="{{ $shared_data ? $shared_data['desc'] : $meta_details['meta_desc'] ?? '' }}" />
          <meta property="og:title" content="{{ $shared_data ? $shared_data['title'] : $meta_details['meta_title'] ?? '' }}" />
        <meta property="og:image:width" content="1000"/>
        <meta property="og:image:height" content="600"/>
        @php
        $tags = $shared_data ? $shared_data['tags'] : $meta_details['meta_tags'] ?? '';
        @endphp
        @if($tags != '')
        @foreach(explode(',',$tags) as $tag)
        <meta property="article:tag" content="{{$tag}}" />
        @endforeach
        @endif

        <!-- <title>Influencer</title> -->
        <link rel="stylesheet" href="{{ asset('front_assets/css/base-style.css') }}">
        <!-- <link rel="stylesheet" href="{{ env('AWS_BASEURL_IMAGE').'front_assets/css/base-style.css' }}"> -->
        <link rel="stylesheet" href="{{ env('AWS_BASEURL_IMAGE').'front_assets/css/style.css' }}">
        <!-- toastr  -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
        <link rel="shortcut icon" href="{{ env('AWS_BASEURL_IMAGE').'front_assets/img/favicon.ico' }}" type="image/x-icon">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/fontawesome.min.css" integrity="sha512-RvQxwf+3zJuNwl4e0sZjQeX7kUa3o82bDETpgVCH2RiwYSZVDdFJ7N/woNigN/ldyOOoKw8584jM4plQdt8bhA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        @section('css')
           
           
                <style>
                    
                    .technology-content {
                        margin-top: 0px;
                    }
                    .slick-slide img {
                        display: block;
                        height: 135px;
                    }
                </style>
           
        @show

        @section('head-scripts')
            
            <!--Start of Tawk.to Script-->
           <!--  <script type="text/javascript">
            var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
            (function(){
            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
            s1.async=true;
            s1.src='https://embed.tawk.to/62f2ae8f54f06e12d88dc89c/1ga1vjpfn';
            s1.charset='UTF-8';
            s1.setAttribute('crossorigin','*');
            s0.parentNode.insertBefore(s1,s0);
            })();
            </script> -->
            <!--End of Tawk.to Script-->

            <!-- Google tag (gtag.js) -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=G-C71ETW355L"></script>
            <script>
              window.dataLayer = window.dataLayer || [];
              function gtag(){dataLayer.push(arguments);}
              gtag('js', new Date());

              gtag('config', 'G-C71ETW355L');
              gtag('config', 'AW-10974838218');

            </script>

            <!-- Global site tag (gtag.js) - Google Ads: 10974838218 -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=AW-10974838218"></script>
            <script>
              window.dataLayer = window.dataLayer || [];
              function gtag(){dataLayer.push(arguments);}
              gtag('js', new Date());

              gtag('config', 'AW-10974838218');
              gtag('config', 'G-C71ETW355L');
            </script>
        @show




    </head>
    <body class="placeholder" data-scrollbar="#0a35dc">
        @section('header')
            <!--header area start here-->
            <header class="header-area sticky-blue stic">
                <div class="container-fluid">
                    <div class="row">
                        <div class="d-flex justify-content-between align-items-center header-menu header-transparent">
                            <div id="rect" class="logo">
                            <a href="{{ url('/')}}" class="logo-demo">
                                <img src="{{ env('AWS_BASEURL_IMAGE').'front_assets/img/logo2.jpeg' }}" class="img-fluid" alt="Influencerhai.com's website logo.">
                            </a>
                            </div>
                            <div class="pupko-menu d-flex align-items-center justify-content-between">
                                <nav class="main-navbar pupko-nav-white">
                                    <ul>
                                        <li>
                                            <a href="{{ route('influencers.category')}}">Influencers</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('about')}}">About Us</a>
                                        </li>
                                       
                                        
                                       
                                        <li><a href="{{ route('blog')}}">Blog</a>
                                           <!--  <ul>
                                                <li>one</li>
                                                <li>one</li>
                                                <li>one</li>
                                            </ul> -->
                                        </li>
                                        <li><a href="{{ route('careers')}}">Careers</a></li>
                                    </ul>
                                </nav>
                                <a href="{{ route('contact')}}" class="btn btn-sm btn-light-red br-6 btn-shatter-white btn-animate">Get in Touch</a>
                            </div>
                            <!-- responsive bar -->
                            <div class="animate-bar white-bar">
                                <div class="line1"></div>
                                <div class="line2"></div>
                                <div class="line3"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!--header area end here-->
        @show
 
        <!-- <div class="container"> -->
            @yield('content')
        <!-- </div> -->



        @section('footer')
            <!--footer area start here-->
            <footer class="footer-area relative pt-md-60 bg-blue2">
                <div class="footer-animation">
                    <img class="footer-ani1" src="{{ env('AWS_BASEURL_IMAGE').'front_assets/img/home2/footer-ani.png' }}" alt="">
                    <img class="footer-ani2" src="{{ env('AWS_BASEURL_IMAGE').'front_assets/img/home2/footer-ani.png' }}" alt="">
                </div>
                <div class="container">
                    <div class="row">
                      
                        <div class="footer-conent-area bdr-y-white py-50 width-100p px-15">
                            <div class="row">
                                <div class="col-lg-4 col-sm-6">
                                    <div class="company-menu comon-footer mb-md-50 animate get-bottom">
                                        <h3 class="pb-50 pb-sm-25 text-white animate">Our Company</h3>
                                        <ul class="animate get-bottom hover-pink-ftr">
                                            <li class="animate"><a href="{{ route('about')}}">About Us</a></li>
                                            <li class="animate"><a href="{{ route('contact')}}">Contact</a></li>
                                            <li class="animate"><a href="{{ route('terms')}}">Terms & Conditions</a></li>
                                            <li class="animate"><a href="{{ route('privacy')}}">Privacy Policy</a></li>
                                            <li class="animate"><a href="{{ route('careers')}}">Careers</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6">
                                    <div class="company-menu comon-footer mb-md-50 animate get-bottom">
                                        <h3 class="pb-50 pb-sm-25 text-white text-capital animate">feature</h3>
                                        <ul class="animate get-bottom hover-pink-ftr">
                                            <li class="animate"><a href="{{ route('influencers.category')}}">Influencers</a></li>
                                            <li class="animate"><a href="{{ route('influencer')}}">I am Influencer</a></li>
                                            <li class="animate"><a href="{{ route('brand')}}">I am Brands</a></li>
                                            <li class="animate"><a href="#">Press Release</a></li>
                                            <li class="animate"><a href="{{ route('ourworks')}}">Our Works</a></li>
                                            <li class="animate"><a href="{{ route('blog')}}">Latest Blogs</a></li>
                                        </ul>
                                    </div>
                                </div>
                                
                                <div class="col-lg-4 col-sm-6">
                                    <div class="company-menu animate get-bottom">
                                        <h3 class="pb-50 pb-sm-25 text-white text-capital animate">Enquiry</h3>
                                        <ul class="animate get-bottom">
                                            <li class="pb-10 text-regular text-gray animate">feel free to  get in touch with via email</li>
                                            <li class="pb-20 animate">
                                               <!--  <a class="text-regular text-white text-sbold" href="#">contact@influencerhai.com</a></li>
                                                <li class="pb-10 text-regular text-gray animate">Address: E-46, Sector-3, Noida, UP, INDIA</li> -->
                                                <address style="color: #d7d6d6;">
                                                    E-mail: <a style="color: #d7d6d6;" href="mailto:contact@influencerhai.com"> contact@influencerhai.com</a><br> 
                                                    Address: E-46, Sector-3, <br> 
                                                    Noida, UP, INDIA

                                                </address>
                                            <li>
                                                <ul class="d-flex flex-wrap align-items-center animate get-bottom">
                                                    <li><a class="text-20 text-white social-round mr-15 bg-icon icon-animation-purple icon-animation" href="https://m.facebook.com/101901749266288/" target="_blank"><i class="icofont-facebook"></i></a></li>
                                                    <li><a class="text-20 text-white social-round mr-15 bg-icon icon-animation-purple icon-animation" target="_blank" href="https://twitter.com/Influencerhai?s=20&t=NTIEYjxvqO8Jyb8pHrC1DA"><i class="icofont-twitter"></i></a></li>
                                                    <li><a class="text-20 text-white social-round mr-15 bg-icon icon-animation-purple icon-animation" target="_blank" href="https://instagram.com/influencerhai?igshid=YmMyMTA2M2Y="><i class="icofont-instagram"></i></a></li>
                                                    <li><a class="text-20 text-white social-round bg-icon icon-animation-purple icon-animation" target="_blank" href="https://www.linkedin.com/mwlite/company/influencerhai"><i class="icofont-linkedin"></i></a></li>

                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <hr style="background-color:white;">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="copy-right h2-cr text-center d-flex justify-content-between align-items-center animate get-top">
                                        <a href="#" class="logo-demo logo-footer-image">
                                            Influencer Hai
                                        </a>
                                        <p class="text-gray" style="font-size:10px;"> COPYRIGHT © 2022 | ALL RIGHTS RESERVED BY TECHISTIC ONLINE PLATFORM PVT LTD </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="row">
                        <div class="col-md-12">
                            <div class="copy-right h2-cr text-center d-flex justify-content-between align-items-center animate get-top">
                                <a href="#" class="logo-demo logo-footer-image">
                                    Influencer Hai
                                </a>
                                <p class="text-gray"> COPYRIGHT © 2022 | ALL RIGHTS RESERVED BY TECHISTIC ONLINE PLATFORM PVT LTD </p>
                            </div>
                        </div>
                    </div> -->
                </div>
                
            </footer>
            <!--footer area end here-->
        @show

        @section('scripts')

              <!-- DEFAULT JQUERY SCRIPT HERE
            ================================================== -->
            <script src="{{ env('AWS_BASEURL_IMAGE').'front_assets/js/default/jquery-3.3.1.min.js' }}"></script>
            <script src="{{ env('AWS_BASEURL_IMAGE').'front_assets/js/default/popper.js' }}"></script>
            <script src="{{ env('AWS_BASEURL_IMAGE').'front_assets/js/default/bootstrap.min.js' }}"></script>
            <script src="{{ env('AWS_BASEURL_IMAGE').'front_assets/js/default/jquery-ui.min.js' }}"></script>
            <script src="{{ env('AWS_BASEURL_IMAGE').'front_assets/js/default/jquery-migrate-1.4.1.min.js' }}"></script>

            <!-- ALL ANIMATION SCRIPT CALL HERE 
            ====================================-->
            <!-- animation plugin script -->
            <script src="{{ env('AWS_BASEURL_IMAGE').'front_assets/js/plugin/animation-js/gsap.min.js' }}"></script>
            <script src="{{ env('AWS_BASEURL_IMAGE').'front_assets/js/plugin/animation-js/scroll-tigger.js' }}"></script>
            <script src="{{ env('AWS_BASEURL_IMAGE').'front_assets/js/plugin/animation-js/scroll-magic.js' }}"></script>
            <script src="{{ env('AWS_BASEURL_IMAGE').'front_assets/js/plugin/animation-js/nicescroll.min.js' }}"></script>
            <!--<script src="assets/js/plugin/animation-js/aos.js"></script>-->

             <!-- ALL PLUGIN SCRIPT CALL HERE 
            ====================================-->
            <!--skick script-->
            <script src="{{ env('AWS_BASEURL_IMAGE').'front_assets/js/plugin/slick.min.js' }}"></script>

            <!--Owl script-->
            <script src="{{ env('AWS_BASEURL_IMAGE').'front_assets/js/plugin/owl.carousel.min.js' }}"></script>
            <script src="{{ env('AWS_BASEURL_IMAGE').'front_assets/js/plugin/owl-custom.js' }}"></script>


            <!--Waypoint script-->
            <!-- <script src="assets/js/plugin/jquery.waypoints.min.js"></script> -->

            <!--Counterup script-->
            <!-- <script src="assets/js/plugin/jquery.counterup.min.js"></script> -->

            <!--Youtube overlay script-->
            <!-- <script src="assets/js/plugin/youtube-overlay.js"></script>  -->

            <!--swiper script-->
             <!-- <script src="assets/js/plugin/swiper.min.js"></script> -->
             
            <!--Parallax script-->
            <!-- <script src="assets/js/plugin/simpleParallax.min.js"></script> -->

            <!-- Nice Select -->
            <script src="{{ env('AWS_BASEURL_IMAGE').'front_assets/js/plugin/nice-select.min.js' }}"></script>
            <!-- Elevatezoom  script-->
            <script src="{{ env('AWS_BASEURL_IMAGE').'front_assets/js/plugin/jquery.elevatezoom.js' }}"></script>


            <!--isotope script-->
            <script src="{{ env('AWS_BASEURL_IMAGE').'front_assets/js/plugin/isotop-pakage-min.js' }}"></script>
            <script src="{{ env('AWS_BASEURL_IMAGE').'front_assets/js/plugin/image-loaded.min.js' }}"></script>

            <!-- CUSTOM SCRIPT CALL HERE 
            ====================================-->
            <script src="{{ asset('front_assets/js/flying-pages.mina305.js') }}"></script>
            <script src="{{ env('AWS_BASEURL_IMAGE').'front_assets/js/tl-custom.js' }}"></script>
            <!--<script src="assets/js/mouse-event.js"></script>-->
            <script src="{{ env('AWS_BASEURL_IMAGE').'front_assets/js/scrollTrigger.js' }}"></script>
            <script src="{{ env('AWS_BASEURL_IMAGE').'front_assets/js/scripts.js' }}"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>



            <script>
               $(document).ready(function() {
                  //toggle the component with class accordion_body
                  $(".accordion_head").click(function() {
                    if ($('.accordion_body').is(':visible')) {
                      $(".accordion_body").slideUp(300);
                      $(".plusminus").text('+');
                    }
                    if ($(this).next(".accordion_body").is(':visible')) {
                      $(this).next(".accordion_body").slideUp(300);
                      $(this).children(".plusminus").text('+');
                    } else {
                      $(this).next(".accordion_body").slideDown(300);
                      $(this).children(".plusminus").text('-');
                    }
                  });
                });
            </script>


            <script>
                $('#owl-carousel002').owlCarousel({
                loop:true,
                margin:10,
                nav:true,
                autoplay:true,
                autoplayTimeout:1000,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:3
                    },
                    1000:{
                        items:6
                    }
                }
            })
            </script>
            
              <!-- toastr js  -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

            <script>
                $(document).ready(function() {
                    toastr.options.timeOut = 10000;
                    @if (Session::has('error'))
                        toastr.error('{{ Session::get('error') }}');
                    @elseif(Session::has('success'))
                        toastr.success('{{ Session::get('success') }}');
                    @endif
                });

            </script>

            <script type="text/javascript">
                var h1 = document.getElementsByTagName("h1");

                for (i = 0; i < h1.length; i++) {
                    h1[i].className += ' h1';
                }

                var h2 = document.getElementsByTagName("h2");

                for (i = 0; i < h2.length; i++) {
                    h2[i].className += ' h2';
                }


                var h3 = document.getElementsByTagName("h3");

                for (i = 0; i < h3.length; i++) {
                    h3[i].className += ' h3';
                }



            </script>

            <!-- script for load more -->
            <script>
                var ENDPOINT = "{{ URL::current() }}";
                var page = 1;
                $(document).ready(function() {
                    $(".load-more-button").click(function(){
                        // alert(ENDPOINT);
                       
                        page = page + 1;

                        //get more data

                        $.ajax({
                            url: ENDPOINT + "?page=" + page,
                            datatype: "html",
                            type: "get",
                            beforeSend: function () {
                                $('.auto-load').show();
                                $('.load-more-button').hide();
                            }
                        })
                        .done(function (response) {
                            // console.log(response);
                            if (response.length == 0) {
                                $('.auto-load').html("We don't have more data to display :(");
                                return;
                            }
                            $('.auto-load').hide();
                            $('.load-more-button').show();
                            $("#data-wrapper").append(response);
                        })
                        .fail(function (jqXHR, ajaxOptions, thrownError) {
                            console.log('Server error occured');
                        });
                

                    });
                });

            </script>
        
        @show

    </body>
</html>