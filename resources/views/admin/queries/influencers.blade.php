@extends('admin/layout/layout')
@section('page_title','Show All Influencers Qureies')
@section('query_right_in','in')
@section('container')
<!-- begin PAGE TITLE ROW -->
<div class="row">
    <div class="col-lg-12">
        <div class="page-title">
            <h1>@yield('page_title')
            </h1>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i>  <a href="">Home</a></li>
                <li class="">Queries</li>
                <li class="active">@yield('page_title')</li>
            </ol>
        </div>
    </div>
</div>
<!-- /.row -->
<!-- end PAGE TITLE ROW -->
<div class="row">
    <div class="col-lg-12">
    <p class="text-center text-red">{{session('msg')}}</p>
                        <div class="portlet portlet-default">
                            <div class="portlet-heading">
                                <div class="portlet-title">
                                    <h4> @yield('page_title')</h4>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="portlet-body">
                                <div class="table-responsive" style="overflow-y: auto !important;"> 
                                    <table id="example-table" class="table table-striped table-bordered table-hover table-green">
                                        <thead>
                                            <tr>
                                                <th>SR. No.</th>
                                                
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Number</th>
                                                <th> Whatsapp</th>
                                                <th> Gender</th>
                                                <th> Age</th>
                                                <th> Channel Link</th>
                                                <th> Message</th>
                                                <th>Date</th>

                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                       <?php $sr=1; ?>
                                        @foreach($influencer_queries as $list)
                                        <!-- check https exist or not -->
                                        @php
                                        if(!str_contains($list->channel_link, 'https://') || !str_contains($list->channel_link, 'http://')){
                                            $list->channel_link = 'https://'.$list->channel_link;
                                        }
                                        @endphp
                                            <tr>
                                                <td width="5%">{{$sr}}</td>
                                               
                                                
                                                <td>{{$list->name}}</td>
                                                <td>{{$list->email}}</td>
                                                <td>{{$list->number}}</td>
                                                <td>{{$list->w_number}}</td>
                                                <td>{{$list->gender}}</td>
                                                <td>{{$list->age}}</td>
                                                <td><a href="{{$list->channel_link}}" target="_blank"> {{$list->channel_link}} </a></td>
                                                <td>{{$list->msg}}</td>
                                                <td>{{ date('d M Y H:i', strtotime($list->created_at)) }}</td>
                                               
                                            </tr>
                                       <?php $sr++; ?>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.portlet-body -->
                        </div>
                        <!-- /.portlet -->

                    </div>
</div>





@endsection