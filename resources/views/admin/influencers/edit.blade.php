@extends('admin/layout/layout')
@section('page_title','Edit Influencer')
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
                    <form role="form" method="post"  action="{{url('admin/influencers')}}/update/{{$result['0']->id}}"enctype="multipart/form-data">
                    @csrf




                        <div class="row">
                            @foreach($influencers_platforms as $one)
                            
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">{{$one->name }} Channel link </label>
                                
                                <input type="text" name="channel_link_{{$one->platform_id }}" class="form-control" placeholder="Enter link" value="{{$one->channel_link }}"> 
                            </div>
                            @endforeach
                            <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Select Influencer Categories </label>
                            </div>
                            @foreach($categories as $one)
                            
                            <div class="form-group col-md-3">
                                    
                                <input type="checkbox" name="categories[]" class="form-control" placeholder="Enter link" @if(in_array($one->id, $influencers_categories)) checked @endif value="{{$one->id }}"> 
                                <label for="exampleInputEmail1">{{$one->name }} </label>
                            </div>
                            @endforeach
                             <div class="form-group col-md-12">
                                <label for="exampleInputEmail1">Influencer Email </label>
                                @error('email')<b class="text-center text-red">{{$message}}</b>@enderror
                                <input type="text" name="email" class="form-control" placeholder="Enter Name" value="{{$result['0']->email}}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Influencer Name </label>
                                @error('name')<b class="text-center text-red">{{$message}}</b>@enderror
                                <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{$result['0']->name}}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Influencer Username </label>
                                @error('username')<b class="text-center text-red">{{$message}}</b>@enderror
                                <input type="text" name="username" class="form-control" placeholder="Enter Username" value="{{$result['0']->username}}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Influencer Image</label>
                                @error('image')<b class="text-center text-red">{{$message}}</b>@enderror
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Influencer Number </label>
                                @error('number')<b class="text-center text-red">{{$message}}</b>@enderror
                                <input type="text" name="number" class="form-control" placeholder="Enter Number" value="{{$result['0']->number}}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Influencer City </label>
                                @error('city')<b class="text-center text-red">{{$message}}</b>@enderror
                                <input type="text" name="city" class="form-control" placeholder="Enter City" value="{{$result['0']->city}}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Influencer State</label>
                                @error('state')<b class="text-center text-red">{{$message}}</b>@enderror
                                <select  name="state" class="form-control">
                                    <option value="">-- select one -- </option>
                                    <option value="Andra Pradesh" @if($result['0']->state == 'Andra Pradesh') selected="selected" @endif >Andra Pradesh</option>
                                    <option value="Arunachal Pradesh" @if($result['0']->state == 'Arunachal Pradesh') selected="selected" @endif >Arunachal Pradesh</option>
                                    <option value="Assam" @if($result['0']->state == 'Assam') selected="selected" @endif >Assam</option>
                                    <option value="Bihar" @if($result['0']->state == 'Bihar') selected="selected" @endif >Bihar</option>
                                    <option value="Chhattisgarh" @if($result['0']->state == 'Chhattisgarh') selected="selected" @endif >Chhattisgarh</option>
                                    <option value="Goa" @if($result['0']->state == 'Goa') selected="selected" @endif >Goa</option>
                                    <option value="Gujarat" @if($result['0']->state == 'Gujarat') selected="selected" @endif >Gujarat</option>
                                    <option value="Haryana" @if($result['0']->state == 'Haryana') selected="selected" @endif >Haryana</option>
                                    <option value="Himachal Pradesh" @if($result['0']->state == 'Himachal Pradesh') selected="selected" @endif >Himachal Pradesh</option>
                                    <option value="Jammu and Kashmir" @if($result['0']->state == 'Jammu and Kashmir') selected="selected" @endif >Jammu and Kashmir</option>
                                    <option value="Jharkhand" @if($result['0']->state == 'Jharkhand') selected="selected" @endif >Jharkhand</option>
                                    <option value="Karnataka" @if($result['0']->state == 'Karnataka') selected="selected" @endif >Karnataka</option>
                                    <option value="Kerala" @if($result['0']->state == 'Kerala') selected="selected" @endif >Kerala</option>
                                    <option value="Madya Pradesh" @if($result['0']->state == 'Madya Pradesh') selected="selected" @endif >Madya Pradesh</option>
                                    <option value="Maharashtra" @if($result['0']->state == 'Maharashtra') selected="selected" @endif >Maharashtra</option>
                                    <option value="Manipur" @if($result['0']->state == 'Manipur') selected="selected" @endif >Manipur</option>
                                    <option value="Meghalaya" @if($result['0']->state == 'Meghalaya') selected="selected" @endif >Meghalaya</option>
                                    <option value="Mizoram" @if($result['0']->state == 'Mizoram') selected="selected" @endif >Mizoram</option>
                                    <option value="Nagaland" @if($result['0']->state == 'Nagaland') selected="selected" @endif >Nagaland</option>
                                    <option value="Orissa" @if($result['0']->state == 'Orissa') selected="selected" @endif >Orissa</option>
                                    <option value="Punjab" @if($result['0']->state == 'Punjab') selected="selected" @endif >Punjab</option>
                                    <option value="Rajasthan" @if($result['0']->state == 'Rajasthan') selected="selected" @endif >Rajasthan</option>
                                    <option value="Sikkim" @if($result['0']->state == 'Sikkim') selected="selected" @endif >Sikkim</option>
                                    <option value="Tamil Nadu" @if($result['0']->state == 'Tamil Nadu') selected="selected" @endif >Tamil Nadu</option>
                                    <option value="Telangana" @if($result['0']->state == 'Telangana') selected="selected" @endif >Telangana</option>
                                    <option value="Tripura" @if($result['0']->state == 'Tripura') selected="selected" @endif >Tripura</option>
                                    <option value="Uttaranchal" @if($result['0']->state == 'Uttaranchal') selected="selected" @endif >Uttaranchal</option>
                                    <option value="Uttar Pradesh" @if($result['0']->state == 'Uttar Pradesh') selected="selected" @endif >Uttar Pradesh</option>
                                    <option value="West Bengal" @if($result['0']->state == 'West Bengal') selected="selected" @endif >West Bengal</option>
                                    <option disabled style="background-color:#aaa; color:#fff">UNION Territories</option>
                                    <option value="Andaman and Nicobar Islands" @if($result['0']->state == 'Andaman and Nicobar Islands') selected="selected" @endif >Andaman and Nicobar Islands</option>
                                    <option value="Chandigarh" @if($result['0']->state == 'Chandigarh') selected="selected" @endif >Chandigarh</option>
                                    <option value="Dadar and Nagar Haveli" @if($result['0']->state == 'Dadar and Nagar Haveli') selected="selected" @endif >Dadar and Nagar Haveli</option>
                                    <option value="Daman and Diu" @if($result['0']->state == 'Daman and Diu') selected="selected" @endif >Daman and Diu</option>
                                    <option value="Delhi" @if($result['0']->state == 'Delhi') selected="selected" @endif >Delhi</option>
                                    <option value="Lakshadeep" @if($result['0']->state == 'Lakshadeep') selected="selected" @endif >Lakshadeep</option>
                                    <option value="Pondicherry" @if($result['0']->state == 'Pondicherry') selected="selected" @endif >Pondicherry</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Influencer Gender </label>
                                @error('gender')<b class="text-center text-red">{{$message}}</b>@enderror
                                <select name="gender" class="form-control">
                                    <option value="Male" @if($result['0']->gender == 'Male') selected="selected" @endif >Male </option>
                                    <option value="Female" @if($result['0']->gender == 'Female') selected="selected" @endif >Female </option>
                                    <option value="Other" @if($result['0']->gender == 'Other') selected="selected" @endif >Other </option>
                                    
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Influencer Reach </label>
                                @error('type')<b class="text-center text-red">{{$message}}</b>@enderror
                                <select name="type" class="form-control">
                                    @foreach($type as $one)
                                    <option value="{{$one->id}}" @if($result['0']->type == $one->id) 
                                        selected="selected" @endif >{{$one->name}} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Influencer Subscribers </label>
                                @error('subscribers')<b class="text-center text-red">{{$message}}</b>@enderror
                                <input type="text" name="subscribers" class="form-control" placeholder="Enter Subscribers" value="{{$result['0']->subscribers}}" value="{{$result['0']->city}}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Influencer Followers </label>
                                @error('followers')<b class="text-center text-red">{{$message}}</b>@enderror
                                <input type="text" name="followers" class="form-control" placeholder="Enter Followers" value="{{$result['0']->followers}}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Avg Likes</label>
                                @error('likes_avg')<b class="text-center text-red">{{$message}}</b>@enderror
                                <input type="text" name="likes_avg" class="form-control" placeholder="Enter Likes" value="{{$result['0']->likes_avg}}">
                            </div>

                            
                            
                            <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Meta Title</label>
                                @error('meta_title')<b class="text-center text-red">{{$message}}</b>@enderror
                                <input type="text" name="meta_title" class="form-control" placeholder="Enter SEO URL" value="{{$result['0']->meta_title}}">
                            </div>
                             <div class="form-group col-md-4">
                                <label for="exampleInputEmail1">Meta Desc</label>
                                @error('meta_desc')<b class="text-center text-red">{{$message}}</b>@enderror
                                <input type="text" name="meta_desc" class="form-control" placeholder="Enter SEO URL" value="{{$result['0']->meta_desc}}">
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