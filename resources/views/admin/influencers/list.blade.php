@extends('admin/layout/layout')
@section('page_title','Show All Influencers')
@section('influencer_right_in','in')
@section('container')
<!-- begin PAGE TITLE ROW -->
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
<!-- /.row -->
<!-- end PAGE TITLE ROW -->
<div class="row">
    <div class="col-lg-12">
    <p class="text-center text-red">{{session('msg')}}</p>
                        <div class="portlet portlet-default" >
                            <div class="portlet-heading">
                                <div class="portlet-title">
                                    <h4> @yield('page_title')</h4>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="portlet-body">
                                <div class="table-responsive" style="overflow-y: auto !important;">
                                    <table id="example-table" class="table table-striped table-bordered table-hover table-green" >
                                        <thead>
                                            <tr>
                                                <th>SR. No.</th>
                                                <th>Image</th>                                                
                                                <th> Type</th>
                                                <th> Username</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Number</th>
                                                <th>City</th>
                                                <th>State</th>
                                                <th>Gender</th>
                                                <th>Followers</th>
                                                <th>Subscribers</th>
                                                <th>Avg Likes</th>
                                                @foreach($platforms as $plat)
                                                <th>{{ucwords($plat->name)}}</th>
                                                @endforeach
                                                <th>Categories</th>
                                                <th>Meta Title</th>
                                                <th>Meta Desc</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                       <?php $sr=1; ?>
                                        @foreach($influencers as $list)
                                        @php
                                        $influ_plat = DB::table('influencers_platforms')->join('platforms', 'platforms.id', '=', 'influencers_platforms.platform_id')->select('influencers_platforms.*','platforms.name')->where('influencers_platforms.influencer_id',$list->id)->get();

                                        $influ_cat = DB::table('influencers_categories')->join('categories', 'categories.id', '=', 'influencers_categories.category_id')->select('influencers_categories.*','categories.name')->where('influencers_categories.influencer_id',$list->id)->get()

                                        @endphp
                                            <tr>
                                                <td width="5%">{{$sr}}</td>
                                                <td width="10%">
                                                    <!-- <img src="https://fantasypower11.com/blog/public/storage/post/{{$list->image}}" width="60"> -->
                                                    <img src="{{env('AWS_BASEURL_IMAGE')}}{{$list->image}}" width="60">
                                                </td>
                                                <td>{{$list->type_category->name}}</td>
                                                <td>{{$list->username}}</td>
                                                <td>{{$list->name}}</td>
                                                <td>{{$list->email}}</td>
                                                <td>{{$list->number}}</td>
                                                <td>{{$list->city}}</td>
                                                <td>{{$list->state}}</td>
                                                <td>{{$list->gender}}</td>
                                                <td>{{$list->followers}}</td>
                                                <td>{{$list->subscribers}}</td>
                                                <td>{{$list->likes_avg}}</td>
                                                @foreach($influ_plat as $val)
                                                <td>{{$val->channel_link}}</td>
                                                @endforeach
                                                <td>
                                                     @foreach($influ_cat as $val1)
                                                     {{ $val1->name}},
                                                     @endforeach
                                                </td>
                                                <td>{{$list->meta_title}}</td>
                                                <td>{{$list->meta_desc}}</td>

                                                <td width="10%">
                                                    <a class="btn btn-warning btn-xs" href="{{route('influencer.edit',$list->id) }}">Edit</a> | 
                                                    <a class="btn btn-danger btn-xs" href="{{route('influencer.edit',$list->id) }}">Delete</a>
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