@extends('admin/layout/layout')
@section('page_title','Influencers Category')
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
    <p class="text-center text-red">{{session('msg')}}</p>
        <div class="portlet portlet-default">
            <div class="portlet-heading">
                <div class="portlet-title">
                    <h4>Add New @yield('page_title')</h4>
                </div>
                
                <div class="clearfix"></div>
            </div>
            <div id="basicFormExample" class="panel-collapse collapse in">
                <div class="portlet-body">
                    <form role="form" method="post"  action="{{ route('influencer.cat.store') }}"enctype="multipart/form-data">
                    @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Category Type</label>
                                @error('type')<b class="text-center text-red">{{$message}}</b>@enderror
                                <select class="form-control" name="type" required>
                                    <option value="">Please Select Category type</option>
                                    <option value="normal">Normal</option>
                                    <option value="nano">Nano</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Name </label>
                                @error('name')<b class="text-center text-red">{{$message}}</b>@enderror
                                <input type="text" name="name" class="form-control" placeholder="Enter Name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Image</label>
                                @error('image')<b class="text-center text-red">{{$message}}</b>@enderror
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Short Description</label>
                                @error('sort_desc')<b class="text-center text-red">{{$message}}</b>@enderror
                                <input type="text" name="sort_desc" class="form-control" placeholder="Enter sort desc">
                            </div>
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
                           
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Meta Title</label>
                                 @error('meta_title')<b class="text-center text-red">{{$message}}</b>@enderror
                                <input type="text" name="meta_title" class="form-control" placeholder="Enter meta Title">
                            </div>
                          
                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Meta Description</label>
                                 @error('meta_desc')<b class="text-center text-red">{{$message}}</b>@enderror
                                <textarea class="form-control" name="meta_desc" placeholder="Enter Short meta Description"></textarea>
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
    <div class="row">
    <div class="col-lg-12">
    
                        <div class="portlet portlet-default">
                            <div class="portlet-heading">
                                <div class="portlet-title">
                                    <h4>Manage All @yield('page_title')</h4>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="portlet-body">
                                <div class="table-responsive">
                                    <table id="example-table" class="table table-striped table-bordered table-hover table-green">
                                        <thead>
                                            <tr>
                                                <th>SR. No.</th>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Type</th>
                                                <th>Meta Title</th>
                                                <th>Meta Desc</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                       <?php $sr=1; ?>
                                        @foreach($result as $list)
                                            <tr>
                                                <td width="5%">{{$sr}}</td>
                                                <td width="10%">
                                                    <!-- <img src="https://fantasypower11.com/blog/public/storage/post/{{$list->image}}" width="60"> -->
                                                    <img src="{{env('AWS_BASEURL_IMAGE')}}{{$list->image}}" width="60">

                                                    
                                                </td>
                                                <td>{{$list->name}}</td>
                                                <td>{{$list->type}}</td>
                                                <td>{{$list->meta_title}}</td>
                                                <td>{{$list->meta_desc}}</td>
                                                <td width="10%">
                                                    <a class="btn btn-warning btn-xs" href="{{route('influencer.cat.edit', $list->id) }}">Edit</a> | 
                                                    <a class="btn btn-danger btn-xs" href="{{route('influencer.cat.edit', $list->id) }}">Delete</a>
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