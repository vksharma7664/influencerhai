@extends('admin/layout/layout')
@section('page_title','Show All Post')
@section('post_right_in','in')
@section('container')
<!-- begin PAGE TITLE ROW -->
<div class="row">
    <div class="col-lg-12">
        <div class="page-title">
            <h1>@yield('page_title')
            </h1>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i>  <a href="">Home</a></li>
                <li class="">Post</li>
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
                                                <th>Category Name</th>
                                                <th>Blog title</th>
                                                <th>Meta Title</th>
                                                <th>Meta Desc</th>
                                                <th>Meta Tags</th>
                                                <th>Meta Keywords</th>
                                                <th>Blog URL</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                       <?php $sr=1; ?>
                                        @foreach($result as $list)
                                            <tr>
                                                <td width="5%">{{$sr}}</td>
                                                <td width="10%">
                                                     <!-- <img src="{{asset(env('APP_FILE_URL').'uploads/blog/post/'.$list->image)}}" width="60"> -->
                                                    <img src="{{env('AWS_BASEURL_IMAGE').$list->image}}" width="60">
                                                </td>
                                                <td>{{$list->cname}}</td>
                                                <td>{{$list->title}}</td>
                                                <td>{{$list->meta_title}}</td>
                                                <td>{{$list->meta_desc}}</td>
                                                <td>{{$list->tags}}</td>
                                                <td>{{$list->keywords}}</td>
                                                <td><a href="{{ route('blog.details', $list->slug)}}" target="_blank"> Open</a></td>
                                                <td width="10%">
                                                    <a class="btn btn-warning btn-xs" href="{{route('post.edit', $list->id) }}">Edit</a> | 
                                                    <a class="btn btn-danger btn-xs" href="{{route('post.delete', $list->id) }}">Delete</a>
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