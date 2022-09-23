@extends('admin/layout/layout')
@section('page_title','Add New Influencer')
@section('influencer_right_in','in')
@section('container')
<div class="row">
    <div class="col-lg-12">
        <div class="page-title">
            <h1>@yield('page_title')
            </h1>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i>  <a href="">Home</a></li>
                <li class="">Influencer</li>
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
                    <form role="form" method="post"  action="{{ url('admin/influencers/submit') }}"enctype="multipart/form-data">
                    @csrf
                        <div class="row">
                            @foreach($platform as $one)
                            
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">{{$one->name }} Channel link </label>
                                
                                <input type="text" name="channel_link_{{$one->id }}" class="form-control" placeholder="Enter link" value="{{ old('channel_link_'.$one->id) }}"> 
                            </div>
                            @endforeach
                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Select Influencer Categories </label>
                            </div>
                            @foreach($categories as $one)
                            
                            <div class="form-group col-md-3">
                                    
                                <input type="checkbox" name="categories[]" class="form-control" placeholder="Enter link" value="{{$one->id }}" @if(old('categories') != null && in_array($one->id, old('categories'))) checked @endif> 
                                <label for="exampleInputEmail1">{{$one->name }} </label>
                            </div>
                            @endforeach

                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Influencer Email </label>
                                @error('email')<b class="text-center text-red">{{$message}}</b>@enderror
                                <input type="text" name="email" class="form-control" placeholder="Enter Name" value="{{ old('email')}}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Influencer Name </label>
                                @error('name')<b class="text-center text-red">{{$message}}</b>@enderror
                                <input type="text" name="name" class="form-control" placeholder="Enter Name"value="{{ old('name')}}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Influencer Username </label>
                                @error('username')<b class="text-center text-red">{{$message}}</b>@enderror
                                <input type="text" name="username" class="form-control" placeholder="Enter Username"value="{{ old('username')}}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Influencer Image</label>
                                @error('image')<b class="text-center text-red">{{$message}}</b>@enderror
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Influencer Number </label>
                                @error('number')<b class="text-center text-red">{{$message}}</b>@enderror
                                <input type="number" name="number" class="form-control" placeholder="Enter Number"value="{{ old('number')}}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Influencer City </label>
                                @error('city')<b class="text-center text-red">{{$message}}</b>@enderror
                                <input type="text" name="city" class="form-control" placeholder="Enter City"value="{{ old('city')}}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Influencer State</label>
                                @error('state')<b class="text-center text-red">{{$message}}</b>@enderror
                                <select  name="state" class="form-control">
                                    <option value="">-- select one -- </option>
                                    <option value="Andra Pradesh">Andra Pradesh</option>
                                    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                    <option value="Assam">Assam</option>
                                    <option value="Bihar">Bihar</option>
                                    <option value="Chhattisgarh">Chhattisgarh</option>
                                    <option value="Goa">Goa</option>
                                    <option value="Gujarat">Gujarat</option>
                                    <option value="Haryana">Haryana</option>
                                    <option value="Himachal Pradesh">Himachal Pradesh</option>
                                    <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                    <option value="Jharkhand">Jharkhand</option>
                                    <option value="Karnataka">Karnataka</option>
                                    <option value="Kerala">Kerala</option>
                                    <option value="Madya Pradesh">Madya Pradesh</option>
                                    <option value="Maharashtra">Maharashtra</option>
                                    <option value="Manipur">Manipur</option>
                                    <option value="Meghalaya">Meghalaya</option>
                                    <option value="Mizoram">Mizoram</option>
                                    <option value="Nagaland">Nagaland</option>
                                    <option value="Orissa">Orissa</option>
                                    <option value="Punjab">Punjab</option>
                                    <option value="Rajasthan">Rajasthan</option>
                                    <option value="Sikkim">Sikkim</option>
                                    <option value="Tamil Nadu">Tamil Nadu</option>
                                    <option value="Telangana">Telangana</option>
                                    <option value="Tripura">Tripura</option>
                                    <option value="Uttaranchal">Uttaranchal</option>
                                    <option value="Uttar Pradesh">Uttar Pradesh</option>
                                    <option value="West Bengal">West Bengal</option>
                                    <option disabled style="background-color:#aaa; color:#fff">UNION Territories</option>
                                    <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                    <option value="Chandigarh">Chandigarh</option>
                                    <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                                    <option value="Daman and Diu">Daman and Diu</option>
                                    <option value="Delhi">Delhi</option>
                                    <option value="Lakshadeep">Lakshadeep</option>
                                    <option value="Pondicherry">Pondicherry</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Influencer Gender </label>
                                @error('gender')<b class="text-center text-red">{{$message}}</b>@enderror
                                <select name="gender" class="form-control">
                                    <option value="Male">Male </option>
                                    <option value="Female">Female </option>
                                    <option value="Other">Other </option>
                                    
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Influencer Reach </label>
                                @error('type')<b class="text-center text-red">{{$message}}</b>@enderror
                                <select name="type" class="form-control">
                                    @foreach($type as $one)
                                    <option value="{{$one->id}}" >{{$one->name}} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Influencer Subscribers </label>
                                @error('subscribers')<b class="text-center text-red">{{$message}}</b>@enderror
                                <input type="text" name="subscribers" class="form-control" placeholder="Enter Subscribers"value="{{ old('subscribers')}}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Influencer Followers </label>
                                @error('followers')<b class="text-center text-red">{{$message}}</b>@enderror
                                <input type="text" name="followers" class="form-control" placeholder="Enter Followers"value="{{ old('followers')}}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Avg Likes</label>
                                @error('likes_avg')<b class="text-center text-red">{{$message}}</b>@enderror
                                <input type="text" name="likes_avg" class="form-control" placeholder="Enter Likes"value="{{ old('likes_avg')}}">
                            </div>

                            <!-- <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Short Description</label>
                                @error('short_desc')<b class="text-center text-red">{{$message}}</b>@enderror
                                <textarea class="form-control" name="short_desc" placeholder="Enter Short Description"></textarea>
                                
                            </div>
                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Long Description</label>
                                <textarea class="form-control" id="long_desc" name="long_desc" placeholder="Enter Short Description"></textarea>
                                <script>
                                CKEDITOR.replace( 'long_desc', {
                                filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
                                filebrowserUploadMethod: 'form'
                                });
                                </script>
                            </div> -->
                            
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Meta Title*</label>
                                @error('meta_title')<b class="text-center text-red">{{$message}}</b>@enderror
                                <input type="text" name="meta_title" class="form-control" placeholder="Enter meta Title"value="{{ old('meta_title')}}">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Meta Description*</label>
                                @error('meta_desc')<b class="text-center text-red">{{$message}}</b>@enderror
                                <textarea class="form-control" name="meta_desc" placeholder="Enter Short meta Description">{{ old('meta_desc')}}</textarea>
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