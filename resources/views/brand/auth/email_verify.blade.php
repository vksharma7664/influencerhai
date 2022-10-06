@extends('layouts.app')
 
@section('title', $title)

@section('css')
    @parent
    <style type="text/css">
        
        .check{
            fill:none;
            stroke: rgb(27, 76, 168);
            stroke-width: 2px;
            stroke-linecap:round;
            stroke-linejoin:round;
            stroke-miterlimit:10;
        }
          
        .check {
            stroke-dasharray: 60 200;
            animation-delay: 1.7s;
            animation: check 2s cubic-bezier(0.67, 0, 0.1, 1) forwards 0.0s; 
            opacity: 0;
        }

        @-webkit-keyframes check {
            from {stroke-dashoffset: 60;
        opacity: 1;}

            to {stroke-dashoffset: 293;
            opacity: 1;}
        }


        .thankyou{
            display: block;
            width: 100%;
        }

        h2{
            margin-bottom: 10px;
        }
        p{
            margin-bottom: 30px;
        }


        .smaller {
            width: 130px;
            margin: 20px auto -50px auto;
        }
    </style>
@endsection

@section('head-scripts')
@parent
    <script> gtag('event', 'conversion', {'send_to': 'AW-10974838218/djyLCJuK3dwDEMr7mvEo'}); </script>

 <script>
  gtag('event', 'conversion', {'send_to': 'AW-10974838218/kuBSCIWQ-OADEMr7mvEo'});
</script>
@endsection


 
@section('content')
     <div class="thankyou mb-100">
        @if(Session::has('success'))
        <div class="smaller">
            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
            viewBox="0 0 60 60" style="enable-background:new 0 0 60 60;" xml:space="preserve">
            <path class="check" d="M40.61,23.03L26.67,36.97L13.495,23.788c-1.146-1.147-1.359-2.936-0.504-4.314
            c3.894-6.28,11.169-10.243,19.283-9.348c9.258,1.021,16.694,8.542,17.622,17.81c1.232,12.295-8.683,22.607-20.849,22.042
            c-9.9-0.46-18.128-8.344-18.972-18.218c-0.292-3.416,0.276-6.673,1.51-9.578"/>
            </svg>
        </div>  
        
        <h2 style="text-align: center; font-weight: 500; margin-top: 10px; font-weight: bold;">Email Verification Successfull ! </h2>
        <p style="text-align: center;">Please <a href="{{ route('brand.login') }}">login</a> . </p>
        @else
         <h2 style="text-align: center; font-weight: 500; margin-top: 10px; font-weight: bold;">{{ Session::get('error') }} </h2>
        @endif
        
    </div>
@endsection
