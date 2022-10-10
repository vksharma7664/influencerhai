@extends('admin/layout/layout')
@section('page_title','Show All Campaign')
@section('campaign_right_in','in')
@section('container')
<!-- begin PAGE TITLE ROW -->
<div class="row">
    <div class="col-lg-12">
        <div class="page-title">
            <h1>@yield('page_title')
            </h1>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i>  <a href="">Home</a></li>
                <li class="">Campaigns</li>
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
                                                <th>Unique ID</th>
                                                <th>Brand</th>
                                                <th>Payment Method</th>
                                                <th>Campaign Title</th>
                                                <th>Campaign Hastags</th>
                                                <th>Campaign Deadline</th>
                                                <th>Campaign Live Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                       <?php $sr=1; ?>
                                        @foreach($campaign as $list)
                                            <tr>
                                                <td width="5%">{{$sr}}</td>
                                                <td>{{$list->unique_id}}</td>
                                                <td>{{$list->user->company_name}}</td>
                                                <td>{{$list->payment_type}}</td>
                                                <td>{{$list->title}}</td>
                                                <td>{{$list->hastags}}</td>
                                                <td>{{$list->deadline}}</td>
                                                <td>{{$list->live_date}}</td>
                                                <td>{{$list->status}}</td>
                                                <td width="10%">
                                                    <!-- <a class="btn btn-warning btn-xs" href="{{route('meta.edit', $list->id) }}">Edit</a> -->
                                                    <a class="btn btn-warning btn-xs" href="{{route('admin.campaign.details', $list->unique_id) }}">View</a> 
                                                </td>
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