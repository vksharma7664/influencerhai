@extends('admin/layout/layout')
@section('page_title','Edit Post Category')
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
                    <form role="form" method="post"  action="{{ route('post.cat.update',$result['0']->id) }}"enctype="multipart/form-data">
                    @csrf
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Name </label>
                                @error('name')<b class="text-center text-red">{{$message}}</b>@enderror
                                <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{$result[0]->name}}">
                            </div>
                            <!-- <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Image</label>
                                @error('image')<b class="text-center text-red">{{$message}}</b>@enderror
                                <input type="file" name="image" class="form-control">
                            </div> -->

                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Short Description</label>
                                <textarea class="form-control" id="short_desc" name="short_desc" placeholder="Enter Short Description" required>{{$result[0]->short_desc}}</textarea>
                                <script>
                                CKEDITOR.replace( 'short_desc', {
                                filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
                                filebrowserUploadMethod: 'form'
                                });
                                </script>
                            </div>
                            <h3> Meta Details</h3>
                            
                            <div class="form-group col-md-8">
                                <label for="exampleInputEmail1">Meta Title</label>
                                 @error('meta_title')<b class="text-center text-red">{{$message}}</b>@enderror
                                <input type="text" name="meta_title" class="form-control" placeholder="Enter meta Title" required value="{{$result[0]->meta_title}}">
                            </div>
                           
                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Meta Description</label>
                                 @error('meta_desc')<b class="text-center text-red">{{$message}}</b>@enderror
                                <textarea class="form-control" name="meta_desc" placeholder="Enter meta Description" required>{{$result[0]->meta_desc}}</textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Meta Tags (comma , seperated)</label>
                                @error('tags')<b class="text-center text-red">{{$message}}</b>@enderror
                                <textarea class="form-control"  name="tags" placeholder="Enter  meta tags">{{$result[0]->tags}}</textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Meta Keywords</label>
                                 @error('keywords')<b class="text-center text-red">{{$message}}</b>@enderror
                                <textarea class="form-control" name="keywords" placeholder="Enter meta Keywords" required>{{$result[0]->keywords}}</textarea>
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