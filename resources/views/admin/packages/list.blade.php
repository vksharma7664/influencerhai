@extends('admin/layout/layout')
@section('page_title','Show All Packages')
@section('packages_right_in','in')
@section('container')
<!-- begin PAGE TITLE ROW -->
<div class="row">
    <div class="col-lg-12">
        <div class="page-title">
            <h1>@yield('page_title')
            </h1>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i>  <a href="">Home</a></li>
                <li class="">Packages</li>
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
                                <div class="pull-right">
                                    <a href="{{ route('admin.package.add') }}" class="btn btn-primary" >Add New Package</a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="portlet-body">
                                <div class="table-responsive" style="overflow-y: auto !important;">
                                    <table id="example-table" class="table table-striped table-bordered table-hover table-green">
                                        <thead>
                                            <tr>
                                                <th>SR. No.</th>
                                                <th>Package For</th>     
                                                <th>Package Name</th>
                                                <th>Short</th>
                                                <th>Description</th>
                                                <th>Package Type</th>
                                                <th>Monthly</th>
                                                <th>Quarterly</th>
                                                <th>Yearly</th>
                                                <th>Package Details</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                       <?php $sr=1; ?>
                                        @foreach($packages as $list)
                                            <tr>
                                                <td width="5%">{{$sr}}</td>
                                                <td width="10%">
                                                    {{ $list->pkgfor->name}}
                                                </td>
                                                <td>{{$list->title}}</td>
                                                <td>{{$list->short_desc}}</td>
                                                <td>{{$list->long_desc}}</td>
                                                <td>{{$list->price_flag}}</td>
                                                <td>{{$list->monthly}}</td>
                                                <td>{{$list->quarterly}}</td>
                                                <td>{{$list->yearly}}</td>
                                                <td><a href="{{ route('admin.package.details', $list->id)}}" > Details</a>
                                                </td>
                                                <td width="10%">
                                                    <a class="btn btn-warning btn-xs" href="{{route('admin.package.edit', $list->id) }}">Edit</a> | 
                                                    <a class="btn btn-danger btn-xs" href="{{route('admin.package.delete', $list->id) }}">Delete</a>
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