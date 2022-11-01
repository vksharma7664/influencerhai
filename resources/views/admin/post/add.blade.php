@extends('admin/layout/layout')
@section('page_title','Add New Post')
@section('post_right_in','in')
@section('container')
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
                    <form role="form" method="post"  action="{{ url('admin/post/submit') }}"enctype="multipart/form-data">
                    @csrf
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Post Category </label>
                                @error('post_cat_id')<b class="text-center text-red">{{$message}}</b>@enderror
                                <select class="form-control" name="post_cat_id" required>
                                    <option value="">Please Select Category</option>
                                    @foreach($result as $list)
                                    <option value="{{$list->id}}">{{$list->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-8">
                                <label for="exampleInputEmail1">Blog Title </label>
                                @error('title')<b class="text-center text-red">{{$message}}</b>@enderror
                                <input type="text" name="title" class="form-control" placeholder="Enter title"  required>
                            </div>
                             <div class="form-group col-md-8">
                                <label for="exampleInputEmail1">Blog Slug </label>
                                @error('slug')<b class="text-center text-red">{{$message}}</b>@enderror
                                <input type="text" name="slug" class="form-control" placeholder="Enter slug"  required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Image</label>
                                @error('image')<b class="text-center text-red">{{$message}}</b>@enderror
                                <input type="file" name="image" class="form-control" required>
                            </div>
                            <!-- <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Short Description</label>
                                @error('short_desc')<b class="text-center text-red">{{$message}}</b>@enderror
                                <textarea class="form-control" name="short_desc" placeholder="Enter Short Description"></textarea>
                                
                            </div> -->
                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Long Description</label>
                                <textarea class="form-control" id="long_desc" name="long_desc" placeholder="Enter Short Description" required></textarea>
                                <script>
                                CKEDITOR.replace( 'long_desc', {
                                filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
                                filebrowserUploadMethod: 'form'
                                });
                                </script>
                            </div>
                            <h3> Meta Details</h3>
                            
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Meta Title</label>
                                 @error('meta_title')<b class="text-center text-red">{{$message}}</b>@enderror
                                <input type="text" name="meta_title" class="form-control" placeholder="Enter meta Title" required>
                            </div>
                           
                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Meta Description</label>
                                 @error('meta_desc')<b class="text-center text-red">{{$message}}</b>@enderror
                                <textarea class="form-control" name="meta_desc" placeholder="Enter meta Description" required></textarea>
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