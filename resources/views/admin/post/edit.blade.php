@extends('admin/layout/layout')
@section('page_title','Edit Post')
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
                    <form role="form" method="post"  action="{{route('post.update', $result['0']->id)}}"enctype="multipart/form-data">
                    @csrf




                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Post Category </label>
                                @error('post_cat_id')<b class="text-center text-red">{{$message}}</b>@enderror
                                <select class="form-control" name="post_cat_id" require>
                                    <option value="">Please Select Category</option>
                                    @foreach($result2 as $list2)
                                    <?php
                                    $selected="";
                                    if($list2->id == $result['0']->post_cat_id)
                                        {
                                            $selected="selected";
                                        }
                                    ?>
                                    <option value="{{$list2->id}}" {{$selected}}>{{$list2->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-8">
                                <label for="exampleInputEmail1">Blog Title </label>
                                @error('title')<b class="text-center text-red">{{$message}}</b>@enderror
                                <input type="text" name="title" value="{{$result['0']->title}}" class="form-control" placeholder="Enter title">
                            </div>
                            <div class="form-group col-md-8">
                                <label for="exampleInputEmail1">Blog Slug </label>
                                @error('slug')<b class="text-center text-red">{{$message}}</b>@enderror
                                <input type="text" name="slug" class="form-control" placeholder="Enter slug" value="{{$result['0']->slug}}"  required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Image</label>
                                @error('image')<b class="text-center text-red">{{$message}}</b>@enderror
                                <input type="file" name="image" class="form-control">
                            </div>

                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Long Description</label>
                                <textarea class="form-control" id="long_desc" name="long_desc" placeholder="Enter Short Description">{{$result['0']->long_desc}}</textarea>
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
                                <input type="text" value="{{$result['0']->meta_title}}" name="meta_title" class="form-control" placeholder="Enter meta Title">
                            </div>
                            
                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Meta Description</label>
                                @error('meta_desc')<b class="text-center text-red">{{$message}}</b>@enderror
                                <textarea class="form-control"  name="meta_desc" placeholder="Enter  meta Description">{{$result['0']->meta_desc}}</textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Meta Tags (comma , seperated)</label>
                                @error('tags')<b class="text-center text-red">{{$message}}</b>@enderror
                                <textarea class="form-control"  name="tags" placeholder="Enter  meta tags">{{$result['0']->tags}}</textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Meta Keywords</label>
                                 @error('keywords')<b class="text-center text-red">{{$message}}</b>@enderror
                                <textarea class="form-control" name="keywords" placeholder="Enter meta Keywords" required>{{$result['0']->keywords}}</textarea>
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