@extends('admin/layout/layout')
@section('page_title','Show All Features')
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
                <li class="">Features</li>
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
                                    <a href="{{ route('admin.package.feature.add') }}" class="btn btn-primary" >Add New Feature</a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="portlet-body">
                                <div class="table-responsive" style="overflow-y: auto !important;">
                                    <table id="example-table" class="table table-striped table-bordered table-hover table-green">
                                        <thead>
                                            <tr>
                                                <th>SR. No.</th>
                                                <th>Feature For</th>     
                                                <th>Feature Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                       <?php $sr=1; ?>
                                        @foreach($features as $list)
                                            <tr>
                                                <td width="5%">{{$sr}}</td>
                                                <td width="20%">
                                                    {{ $list->pvalueArea->name}}
                                                </td>
                                                <td>{{$list->title}}</td>
                                                </td>
                                                <td width="20%">
                                                    <a class="btn btn-warning btn-xs" href="{{route('admin.package.feature.edit', $list->id) }}">Edit</a> | 
                                                    <a class="btn btn-danger btn-xs" href="{{route('admin.package.feature.delete', $list->id) }}">Delete</a>
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