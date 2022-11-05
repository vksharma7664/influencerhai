@extends('layouts.app')
 
@section('css')
    @parent
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">

    <style>
        .loginBtn {
        box-sizing: border-box;
        position: relative;
        /* width: 13em;  - apply for fixed size */
        margin: 0.2em;
        padding: 0 15px 0 46px;
        border: none;
        text-align: left;
        line-height: 34px;
        white-space: nowrap;
        border-radius: 0.2em;
        font-size: 16px;
        color: #FFF;
        }
        .loginBtn:before {
        content: "";
        box-sizing: border-box;
        position: absolute;
        top: 0;
        left: 0;
        width: 34px;
        height: 100%;
        }
        .loginBtn:focus {
        outline: none;
        }
        .loginBtn:active {
        box-shadow: inset 0 0 0 32px rgba(0,0,0,0.1);
        }


        /* Facebook */
        .loginBtn--facebook {
        background-color: #4C69BA;
        background-image: linear-gradient(#4C69BA, #3B55A0);
        /*font-family: "Helvetica neue", Helvetica Neue, Helvetica, Arial, sans-serif;*/
        text-shadow: 0 -1px 0 #354C8C;
        }
        .loginBtn--facebook:before {
        border-right: #364e92 1px solid;
        background: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/14082/icon_facebook.png') 6px 6px no-repeat;
        }
        .loginBtn--facebook:hover,
        .loginBtn--facebook:focus {
        background-color: #5B7BD5;
        background-image: linear-gradient(#5B7BD5, #4864B1);
        }


        /* Google */
        .loginBtn--google {
        /*font-family: "Roboto", Roboto, arial, sans-serif;*/
        background: #DD4B39;
        }
        .loginBtn--google:before {
        border-right: #BB3F30 1px solid;
        background: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/14082/icon_google.png') 6px 6px no-repeat;
        }
        .loginBtn--google:hover,
        .loginBtn--google:focus {
        background: #E74B37;
        }
    </style>
@endsection

@section('head-scripts')
@parent
   
@endsection


 
@section('content')
     <section class=" bg-image" style="background-image: url({{ asset('brand-assets/img/login.svg') }});">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3 ">
            <div class="container h-150 ">
                <div class="row d-flex justify-content-center align-items-center h-100 pb-5 pt-5">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6 ">
                        <div class="card" style="border-radius: 8px;">
                            <div class="card-body p-5">

                                <!-- brand login -->
                                <h2 class="text-uppercase text-primary text-center mb-4">Sign in for Influencer</h2>
                                <p class="text-center m4-5">Hello Again ! We were Missing You</p>
                                <button onclick=" window.location = '{{ route('influencer.facebook.login') }}';" class="loginBtn loginBtn--facebook">
                                Login with Facebook
                                </button>
                                <button onclick=" window.location = '{{ route('influencer.google.login') }}';" class="loginBtn loginBtn--google">
                                Login with Google
                                </button>
                                
                               
                                 <!--End brand login -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
