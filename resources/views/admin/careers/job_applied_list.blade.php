@extends('admin/layout/layout')
@section('page_title','Show All Job Applications')
@section('job_right_in','in')
@section('container')
<!-- begin PAGE TITLE ROW -->
<div class="row">
    <div class="col-lg-12">
        <div class="page-title">
            <h1>@yield('page_title')
            </h1>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i>  <a href="">Home</a></li>
                <li class="">Job Applications</li>
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
                                                <th>Qualification</th>
                                                <th>Position</th>
                                                <th>Experience</th>
                                                <th>Resume</th>
                                                <th>Reason to hire</th>
                                                <th>Date</th>

                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                       <?php $sr=1; ?>
                                        @foreach($career_jobs_applies as $list)
                                            <tr>
                                                <td width="5%">{{$sr}}</td>
                                               
                                                
                                                <td>{{$list->name}}</td>
                                                <td>{{$list->email}}</td>
                                                <td>{{$list->number}}</td>
                                                <td>{{$list->qualification}}</td>
                                                <td>{{$list->position}}</td>
                                                <td>{{$list->experience}}</td>
                                                <!-- <td>{{$list->resume}}</td> -->
                                                <td><a href="{{$list->resume}}" target="_blank"><i class="fa fa-download" aria-hidden="true"></i> </a></td>
                                                <td>{{$list->reason_to_hire}}</td>
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