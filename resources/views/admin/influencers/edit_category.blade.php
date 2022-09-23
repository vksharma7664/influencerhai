@extends('admin/layout/layout')
@section('page_title','Edit Influencers Category')
@section('influencer_right_in','in')
@section('container')
<div class="row">
    <div class="col-lg-12">
        <div class="page-title">
            <h1>@yield('page_title')
            </h1>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i>  <a href="">Home</a></li>
                <li class="">Influencers</li>
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
                    <form role="form" method="post"  action="{{url('admin/influencers')}}/category-update/{{$result['0']->id}}"enctype="multipart/form-data">
                    @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Category Type</label>
                                @error('type')<b class="text-center text-red">{{$message}}</b>@enderror
                                <select class="form-control" name="type" required>
                                    <option value="">Please Select Category type</option>
                                    <option value="normal" {{$result['0']->type == 'normal' ? 'selected' : ''}}>Normal</option>
                                    <option value="nano" {{$result['0']->type == 'nano' ? 'selected' : ''}}>Nano</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Name </label>
                                @error('name')<b class="text-center text-red">{{$message}}</b>@enderror
                                <input type="text" name="name" value="{{$result['0']->name}}" class="form-control" placeholder="Enter Name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Image</label>
                                @error('image')<b class="text-center text-red">{{$message}}</b>@enderror
                                <input type="file" name="image" class="form-control">
                            </div>
                             <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Short Description</label>
                                @error('sort_desc')<b class="text-center text-red">{{$message}}</b>@enderror
                                <input type="text" name="sort_desc" class="form-control" placeholder="Enter sort desc" value="{{$result['0']->sort_desc}}">
                            </div>
                             <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Long Description</label>
                                <textarea class="form-control" id="long_desc" name="long_desc" placeholder="Enter Short Description" required>{{$result['0']->long_desc}}</textarea>
                                <script>
                                CKEDITOR.replace( 'long_desc', {
                                filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}", 
                                filebrowserUploadMethod: 'form'
                                });
                                </script>
                            </div>
                            
                            
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Meta Title</label>
                                 @error('meta_title')<b class="text-center text-red">{{$message}}</b>@enderror
                                <input type="text" name="meta_title" class="form-control" placeholder="Enter meta Title" value="{{$result['0']->meta_title}}">
                            </div>
                          
                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Meta Description</label>
                                 @error('meta_desc')<b class="text-center text-red">{{$message}}</b>@enderror
                                <textarea class="form-control" name="meta_desc" placeholder="Enter Short meta Description">{{$result['0']->meta_desc}}</textarea>
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