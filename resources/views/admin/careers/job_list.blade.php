@extends('admin/layout/layout')
@section('page_title','Show All Jobs')
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
                <li class="">Careers</li>
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
                                                <th>Image</th>                                                
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Location</th>
                                                <th>Exp</th>
                                                <th>Status</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                       <?php $sr=1; ?>
                                        @foreach($career_jobs as $list)
                                            <tr>
                                                <td width="5%">{{$sr}}</td>
                                                <td width="10%">
                                                    <!-- <img src="{{env('WEB_SITE_STORAGE_IMAGE').'post/'.$list->image}}" width="60"> -->
                                                    <img src="{{$list->image}}" width="60">
                                                </td>
                                                <td>{{$list->title}}</td>
                                                <td>{{$list->short_desc}}</td>
                                                <td>{{$list->location}}</td>
                                                <td>{{$list->experience}}</td>
                                                <td>{{$list->status ? 'Enable' : 'Disable'}}</td>
                                                <td>{{ date('d M Y H:i', strtotime($list->created_at)) }}</td>
                                                <td width="10%">
                                                    <a class="btn btn-warning btn-xs" href="{{route('jobs.edit', $list->id) }}">Edit</a> | 
                                                    <a class="btn btn-danger btn-xs" href="{{route('jobs.delete', $list->id) }}">Delete</a>
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