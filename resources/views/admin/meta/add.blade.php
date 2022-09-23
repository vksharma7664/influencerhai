@extends('admin/layout/layout')
@section('page_title','Add New Meta details')
@section('meta_right_in','in')
@section('container')
<div class="row">
    <div class="col-lg-12">
        <div class="page-title">
            <h1>@yield('page_title')
            </h1>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i>  <a href="">Home</a></li>
                <li class="">Meta</li>
                <li class="active">@yield('page_title')</li>
            </ol>
        </div>
    </div>
</div>
    <div class="row">
    <div class="col-lg-12">
        <div class="portlet portlet-default">
            <div class="portlet-heading">
                <div class="portlet-title">
                    <h4>@yield('page_title')</h4>
                </div>
                
                <div class="clearfix"></div>
            </div>
            <div id="basicFormExample" class="panel-collapse collapse in">
                <div class="portlet-body">
                    <form role="form" method="post"  action="{{ route('meta.store') }}"enctype="multipart/form-data">
                    @csrf
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="exampleInputEmail1">Page </label>
                                @error('route')<b class="text-center text-red">{{$message}}</b>@enderror
                                <select class="form-control" name="route" required>
                                    <option value="">Please Select Page</option>
                                    @foreach($pages as $key => $val)
                                    <option value="{{$key}}">{{$val}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Title </label>
                                @error('title')<b class="text-center text-red">{{$message}}</b>@enderror
                                <input type="text" name="title" class="form-control" placeholder="Enter title"  required>
                            </div>
                            
                            <!-- <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Short Description</label>
                                @error('short_desc')<b class="text-center text-red">{{$message}}</b>@enderror
                                <textarea class="form-control" name="short_desc" placeholder="Enter Short Description"></textarea>
                                
                            </div> -->
                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Description</label>
                                <textarea class="form-control" id="desc" name="desc" placeholder="Enter Short Description" required></textarea>
                                
                            </div>
                            
                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Meta Tags (comma , seperated)</label>
                                @error('tags')<b class="text-center text-red">{{$message}}</b>@enderror
                                <textarea class="form-control"  name="tags" placeholder="Enter  meta tags"></textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Meta Keywords</label>
                                 @error('keywords')<b class="text-center text-red">{{$message}}</b>@enderror
                                <textarea class="form-control" name="keywords" placeholder="Enter meta Keywords" required></textarea>
                            </div>
                            <div class="form-group col-md-12 text-center">
                                <input type="submit" value="Submit" name="btn_submit" class="btn btn-success">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.portlet -->
        </div>
    </div>
@endsection