@extends('admin/layout/layout')
@section('page_title','Show added Influencers')
@section('page_right_in','in')
@section('container')
<!-- begin PAGE TITLE ROW -->
<div class="row">
    <div class="col-lg-12">
        <div class="page-title">
            
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.custom.influencers.pages.show') }}" class="btn btn-primary">Back to List</a></li>
                
            </ol>
        </div>
    </div>
</div>
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
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                       <?php $sr=1; ?>
                                        @foreach($result->influencers as $list)
                                            <tr>
                                                <td width="5%">{{$sr}}</td>
                                                <td width="10%">
                                                    <!-- <img src="https://fantasypower11.com/blog/public/storage/post/{{$list->image}}" width="60"> -->
                                                    <img src="{{env('AWS_BASEURL_IMAGE')}}{{$list->image}}" width="60">
                                                </td>
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