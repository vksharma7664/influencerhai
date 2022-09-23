@extends('admin/layout/layout')
@section('page_title','Add Edit Job')
@section('job_right_in','in')
@section('container')
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
                    <form role="form" method="post"  action="{{ route('jobs.update',$result->id) }}"enctype="multipart/form-data">
                    @csrf
                        <div class="row">
                            
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Title </label>
                                @error('title')<b class="text-center text-red">{{$message}}</b>@enderror
                                <input type="text" name="title" class="form-control" placeholder="Enter title" value="{{ $result->title }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Image</label>
                                @error('image')<b class="text-center text-red">{{$message}}</b>@enderror
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Short Description</label>
                                @error('short_desc')<b class="text-center text-red">{{$message}}</b>@enderror
                                <textarea class="form-control" name="short_desc" placeholder="Enter Short Description">{{ $result->short_desc }}</textarea>
                                
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Location</label>
                                @error('location')<b class="text-center text-red">{{$message}}</b>@enderror
                                <input type="text" name="location" class="form-control" placeholder="Enter Location" value="{{ $result->location }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Experience</label>
                                @error('experience')<b class="text-center text-red">{{$message}}</b>@enderror
                                <input type="text" name="experience" class="form-control" placeholder="Enter Experience" value="{{ $result->experience }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Status </label>
                               
                                <select class="form-control" name="status" require>
                                    <!-- <option value="">Please Select Category</option> -->
                                    <option value="1" @if($result->status == '1') selected @endif>Enable</option>
                                    <option value="0" @if($result->status == '0') selected @endif>Disable</option>
                                </select>
                            </div>
                            
                            <!-- <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">SEO Keyword</label>
                                <input type="text" name="seo_keyword" class="form-control" placeholder="Enter SEO Keyword">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">SEO Description</label>
                                <textarea class="form-control" name="seo_desc" placeholder="Enter Short SEO Description"></textarea>
                            </div> -->
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