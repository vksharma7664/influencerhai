@extends('admin/layout/layout')
@section('page_title','Show All Brands')
@section('brand_right_in','in')
@section('container')
<!-- begin PAGE TITLE ROW -->
<div class="row">
    <div class="col-lg-12">
        <div class="page-title">
            <h1>@yield('page_title')
            </h1>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i>  <a href="">Home</a></li>
                <li class="">Brands</li>
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
                                                <th>name</th>
                                                <th>email</th>
                                                <th>mobile</th>
                                                <th>designation</th>
                                                <th>company_name</th>
                                                <th>company_url</th>
                                                <th>industry</th>
                                                <th>Status</th>
                                                <th>Registration</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                       <?php $sr=1; ?>
                                        @foreach($users as $list)
                                            <tr>
                                                <td width="5%">{{$sr}}</td>
                                                <td>{{$list->name}}</td>
                                                <td>{{$list->email}}</td>
                                                <td>{{$list->mobile}}</td>
                                                <td>{{$list->designation}}</td>
                                                <td>{{$list->company_name}}</td>
                                                <td>{{$list->company_url}}</td>
                                                <td>{{$list->industry}}</td>
                                                <td>{{$list->email_verified_at != null ? 'Verified' : ' Not Verified'}}</td>
                                                <td>{{readableDate($list->created_at)}}</td>
                                                <td width="10%">
                                                    <a class="btn btn-warning btn-xs" href="{{route('admin.brand.show', $list->id) }}">Edit</a> 
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