@extends('admin/layout/layout')
@section('page_title','Show All Meta')
@section('meta_right_in','in')
@section('container')
<!-- begin PAGE TITLE ROW -->
<div class="row">
    <div class="col-lg-12">
        <div class="page-title">
            <h1>@yield('page_title')
            </h1>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i>  <a href="">Home</a></li>
                <li class="">Meta Pages</li>
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
                                <div class="table-responsive">
                                    <table id="example-table" class="table table-striped table-bordered table-hover table-green">
                                        <thead>
                                            <tr>
                                                <th>SR. No.</th>
                                                <th>Page</th>
                                                <th>Meta Title</th>
                                                <th>Meta Desc</th>
                                                <th>Meta Tags</th>
                                                <th>Meta Keywords</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                       <?php $sr=1; ?>
                                        @foreach($result as $list)
                                            <tr>
                                                <td width="5%">{{$sr}}</td>
                                                <td>{{$pages[$list->route]}}</td>
                                                <td>{{$list->title}}</td>
                                                <td>{{$list->desc}}</td>
                                                <td>{{$list->tags}}</td>
                                                <td>{{$list->keywords}}</td>
                                                <td width="10%">
                                                    <a class="btn btn-warning btn-xs" href="{{route('meta.edit', $list->id) }}">Edit</a> 
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