@extends('layouts.app')
 

@section('css')
    @parent
    <style type="text/css">
        /* body {
  
        background: #333;
        } */
        .packages {
            margin-top: 50px;
            border: none;
            width: 100%;
            background: none;
            border-collapse: collapse;
            border-spacing: 0;
        }
        .packages thead {
            background: none;
        }
        .packages thead td {
            padding: 9px 10px;
            border-radius: 5px 5px 0 0;
            -webkit-border-radius: 5px 5px 0 0;
            font-size: 16px;
        }
        .packages thead td.gold {
            border-radius: 0;
            color: #8E610D;
        }
        table.packages tbody tr:nth-child(even), table.packages tbody tr:nth-child(odd) {
            background: none;
        }
        .packages tr:hover td {
            background: #EEE7C6;
        }
        .packages tr:hover td.feature, .packages tr:hover td.blank {
            background: inherit;
        }
        .packages tr.register:hover td, .packages tr:hover td.blank.gold {
            background: #fff;
        }
        .packages tr.register:hover td.feature {
            background: transparent;
        }
        .packages td {
            background: #fff;
            text-align: center;
            border-bottom: 1px solid #EEE7C6;
            font-family: 'Avenir Next LT W01 Bold';
            font-size: 18px;
            /* color: #000000; */
            line-height: 20px;
            padding: 15px 10px;
            position: relative;
            z-index: 2;

        }
        .packages tr.bottom td {
        border: none;
        }
        .packages td {
            box-shadow: inset -4px 0 4px -2px rgba(0,0,0,0.30);
            -webkit-box-shadow: inset -4px 0 4px -2px rgba(0,0,0,0.30);
            position: relative;
        }
        .packages thead td:after {
            box-shadow: inset -4px 0 4px -2px rgba(0,0,0,0.30);
            -webkit-box-shadow: inset -4px 0 4px -2px rgba(0,0,0,0.30);
        }
        .packages tr td:last-child, .packages tr td:last-child:after {
            box-shadow: none;
            -webkit-box-shadow: none;
        }
        .packages td.infin {
            font-size: 40px;
        }
        .packages td.feature:after {
            position: absolute;
            content: "";
            left: 0;
            border-bottom: 1px solid #423D31;
            bottom: 0;
            right: -20px;
        }
        .packages .register td.feature:after, .packages .highlight td.feature:after, .packages td.feature.no-border:after  {
            display: none;
        }
        .packages td.blank {
            border: none;
        }

        .packages td.feature, .packages td.blank {
            background: none;
            
        }
        .packages td.feature {
            font-family: 'AvenirNextLTW01-Regular';
            font-size: 18px;
            color: #000000;
            line-height: 20px;
            text-align: left;
            border-bottom: none;
            position: relative;
            padding-left: 0 !important;
            padding-right: 0 !important;
        }
        .packages td.gold {
            border-left: 10px solid #E4D7A0;
            border-right: 10px solid #E4D7A0;
        }
        .packages .top td.gold {
            height: 20px;
            background: #fff;
            border: 10px solid #E4D7A0;
            border-bottom: none;
            border-radius: 5px 5px 0 0;
            -webkit-border-radius: 5px 5px 0 0;
        }
        .packages .bottom td.gold {
            height: 20px;
            background: #fff;
            border: 10px solid #E4D7A0;
            border-top: none;
            border-radius: 0 0 5px 5px;
            -webkit-border-radius: 0 0 5px 5px;
        }

        .packages .highlight td {
            padding: 18px 10px;
            vertical-align: middle;
            font-family: 'AvenirNextLTW01-Regular';
            line-height: 20px;
            height: 120px;
        }
        .packages .highlight td strong {
            font-family: 'Avenir Next LT W01 Bold';
        }
        .packages .highlight td span {
            font-size: 16px;
            margin-bottom: 20px;
            display: inline-block;
        }

        .packages .register td {
            padding: 18px 10px;
            vertical-align: middle;
            border-radius: 0 0 5px 5px;
            -webkit-border-radius: 0 0 5px 5px;
        }
        .packages .register td.gold {
            border-bottom: 0;
            border-radius: 0 ;
            -webkit-border-radius: 0;
        } 
        .packages td {

        position: relative;
        }
        .packages td:after {
            content: "";
            position: absolute;
            }
            
        .packages thead td {
            border-radius: 0;
            position: relative;
            text-transform: uppercase;
        }
        .packages thead td.first {
            border-radius: 5px 0 0 0;
            }
        .packages thead td.second:after {
            content: "";
            position: absolute;
            bottom: 100%;
            height: 10px;
            width: 100%;
            left: 0;
            background: #fff;
            border-radius: 5px 0 0 0;
        }
        .packages thead td.third:after {
            content: "";
            position: absolute;
            bottom: 100%;
            height: 20px;
            width: 100%;
            left: 0;
            background: #fff;
            border-radius: 5px 0 0 0;
        }
        .packages thead td.fourth:after {
            content: "";
            position: absolute;
            bottom: 100%;
            height: 30px;
            width: 100%;
            left: 0;
            background: #fff;
            border-radius: 5px  0 0;
        }
        .packages thead td.fifth:after {
            content: "";
            position: absolute;
            bottom: 100%;
            height: 40px;
            width: 100%;
            left: 0;
            background: #fff;
            border-radius: 5px 5px 0 0;
        }

        .packages td.feature {
            padding-right: 20px !important;
            min-width: 250px;
        }
        .packages td.feature:after {


        }
        .packages thead td.active {
            
            }
        .packages td.active {
            background: #2D281B;
            color: #fff;
            border-bottom: 1px solid #575349;
        }
        .packages .bottom td.first {
            border-radius: 0 0 0 5px;
        }
        .packages tr:hover td {
            background: #fff;
        }
        .packages tr:hover td.active {
            background: #2D281B;
        }
        .packages tr:hover td.feature {
            background: transparent;
        }
        .packages .plans td {
            padding: 18px 10px;
            
            font-family: 'AvenirNextLTW01-Regular';
            line-height: 20px;
            
        }
        .packages .plans td strong {
            font-family: 'Avenir Next LT W01 Bold';
        }
        .packages .plans td span {
            font-size: 16px;
            margin-bottom: 20px;
            display: inline-block;
        }
        .packages .plans td .button {
            margin-top: 20px;
	    }
        
        .check-color{
            color : #00aae5;
        }

        .cross-color{
            color : #cd5a0c;
        }
    </style>
@endsection

@section('head-scripts')
@parent
 
@endsection


 
@section('content')
<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="h2-we-make-heading heading-content pb-50 get-bottom animate">
                    <div class="section-title animate">
                        <h1 class="h1 pb-10">Packages</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <table class="packages" cellpadding="0" cellspacing="0">
                    <thead>
                        
                        <tr>
                            <td class="blank feature"></td>
                            @foreach ($packages['Brand']['pkg_heading'] as $heading)
                            <td class=" first">{{ $heading }}</td>
                            @endforeach
                            <!-- <td class=" first">Starter</td> -->
                            <!-- <td class="second">Silver</td>
                            <td class="third">Gold</td> -->
                            <!-- <td class="fourth">Premium</td> -->
                            <!-- <td class="fifth	">Enterprise</td> -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pvArea as $pva)
                            <tr>
                            <td class="feature"> {{ $pva->name }}</td>
                            <td class=""></td>
                            <td class=""></td>
                            </tr>
                            @foreach ($pva->pvalues as $pval)
                            <tr>
                                <td class="feature"> {{ $pval->title }}</td>
                                @foreach ($packages['Brand']['pkg_heading'] as $heading)
                                    @if(array_key_exists($pval->id, $packages['Brand']['packages'][$heading]['values']))
                                        @if (in_array($packages['Brand']['packages'][$heading]['values'][$pval->id], ['Y', 'N']))
                                            @if ($packages['Brand']['packages'][$heading]['values'][$pval->id] == 'N')
                                            <td class="cross-color"><i class="icofont-close"></i></td>
                                            @else
                                            <td class="check-color"><i class="icofont-check"></i></td>
                                            @endif
                                        @else
                                        <td class="">{{ $packages['Brand']['packages'][$heading]['values'][$pval->id] }}</td>
                                        @endif
                                    @else
                                    <td class="cross-color"><i class="icofont-close"></i></td>
                                    @endif
                                
                                @endforeach
                                
                                <!-- <td class="">10</td> -->
                                
                            </tr>
                            @endforeach 
                        @endforeach
                       
                       
                        
                        <tr class="plans highlight">
                            <td class="feature  no-border"></td>
                            @foreach ($packages['Brand']['pkg_heading'] as $heading)
                            
                                @if ($packages['Brand']['packages'][$heading]['data']['price_flag'] == 'free')
                                    <td class=" "><strong> Free </strong></td>
                                @else
                                    <td class=" "><strong>  &#x20B9; {{$packages['Brand']['packages'][$heading]['data']['monthly']}}/monthly,  </br> &#x20B9; {{$packages['Brand']['packages'][$heading]['data']['quarterly']}}/quarterly, </br>  &#x20B9; {{$packages['Brand']['packages'][$heading]['data']['yearly']}}/yearly</strong></td>
                                @endif
                            
                            @endforeach
                            
                           
                            
                        </tr>
                        <tr class="bottom select-plans">
                            <td class="feature blank no-border"></td>
                            @foreach ($packages['Brand']['pkg_heading'] as $heading)
                            
                                @if ($packages['Brand']['packages'][$heading]['data']['price_flag'] == 'free')
                                    <td class=" "><strong> Free </strong></td>
                                @else
                                    <td class=" "><a href="#" class="button forth " data-plan="Silver" data-price="$40/mo" data-id="5" data-index="3">Register</a></td>
                                @endif
                            
                            @endforeach
                            <!-- <td class="first "><a href="#" class="button  first " data-plan="Starter" data-id="1" data-price="FREE" data-index="2">Register</a></td> -->
                            
                            
                            
                        </tr>
                        
                        
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</section>
@endsection
