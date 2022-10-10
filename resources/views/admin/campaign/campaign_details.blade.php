@extends('admin/layout/layout')
@section('page_title','Campaign Details')
@section('campaign_right_in','in')
@section('container')
<!-- begin PAGE TITLE ROW -->
<style>
    .label{
        color: #000 !important;
    }

</style>
<div class="row">
    <div class="col-lg-12">
        <div class="page-title">
            <h1>@yield('page_title')
            </h1>
            <ol class="breadcrumb">
                <li><i class="fa fa-home"></i>  <a href="">Home</a></li>
                <li class="">Campaigns</li>
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
                        <div class="portlet portlet-default">
                            <div class="portlet-heading">
                                <div class="portlet-title">
                                 <a class="btn btn-success" href="{{ route('campaign.show') }}">Back to List</a><h4> @yield('page_title')</h4>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="portlet-body">
                                <!-- <div class="table-responsive" style="overflow-y: auto !important;">  -->
                                    <div class="container section-body">
                                        <h2 class="section-title">{{ $campaign->title }}</h2>
                                        <h6>Description:</h6>
                                        <div class="row">
                                            <div class="col-10 col-md-10 col-lg-10">
                                                <p class="section-lead">
                                                  {!! $campaign->description !!}
                                                </p>
                                                </div>
                                            </div>

                                        <div class="row mt-sm-4">
                                          <div class="col-12 col-md-12 col-lg-4">
                                            <div class="card">
                                                <div class="card-header">
                                                  <h4><u>Influencer Details</u></h4>
                                                </div>
                                                <div class="card-body" style="padding-top: 0px;">
                                                    <div class="row">                               
                                                      <div class="form-group col-md-6 col-12">
                                                        <label class="label">Gender</label>
                                                        <ul class="no-bullets">
                                                            <li>{{ $campaign->influencer_gender}}</li>
                                                        </ul>
                                                      </div>
                                                    </div>

                                                    <div class="row">                               
                                                      <div class="form-group col-md-6 col-12">
                                                        <label class="label">Type</label>
                                                        <ul class="no-bullets">
                                                            @foreach($campaign->types as $type)
                                                            <li>{{ $type->type }}</li>
                                                            @endforeach
                                                        </ul>
                                                      </div>
                                                    </div>

                                                    <div class="row">                               
                                                      <div class="form-group col-md-6 col-12">
                                                        <label class="label">Category</label>
                                                        <ul class="no-bullets">
                                                            @foreach($campaign->categories as $cat)
                                                            <li>{{ $cat->category }}</li>
                                                            @endforeach
                                                        </ul>
                                                      </div>
                                                    </div>

                                                    <div class="row">                               
                                                      <div class="form-group col-md-6 col-12">
                                                        <label class="label">Location</label>
                                                        <ul class="no-bullets">
                                                            @foreach($campaign->locations as $loc)
                                                            <li>{{ $loc->location }}</li>
                                                            @endforeach
                                                        </ul>
                                                      </div>
                                                    </div>
                                                    
                                                </div>
                                                <!-- <div class="card-footer text-right">
                                                  <button class="btn btn-primary">Save Changes</button>
                                                </div> -->
                                            </div>
                                          </div>
                                            
                                          <div class="col-12 col-md-12 col-lg-4">
                                            <div class="card">
                                                <div class="card-header">
                                                  <h4><u>Platform Details</u></h4>
                                                </div>
                                                <div class="card-body" style="padding-top: 0px;">
                                                    <div class="row">                               
                                                      <div class="form-group col-md-6 col-12">
                                                        <label class=" label btn btn-outline-primary"><i class="far fa-bell"></i> &nbsp;{{ strtoupper($campaign->platform) }}</label>
                                                        
                                                      </div>
                                                    </div>

                                                    <div class="row">                               
                                                      <div class="form-group col-md-6 col-12">
                                                        <label class="label">Deliverable</label>
                                                        <ul class="no-bullets">
                                                          @if($campaign->platform == 'instagram')
                                                            @if($campaign->insta_reels_checkbox == 'on')
                                                            <li>Reel </li>
                                                            @endif
                                                             @if($campaign->insta_story_checkbox == 'on')
                                                            <li>Story</li>
                                                            @endif
                                                             @if($campaign->insta_bio_checkbox == 'on')
                                                            <li>Link in Bio</li>
                                                            @endif
                                                             @if($campaign->insta_video_self_checkbox == 'on')
                                                            <li>Video (Self Shot)</li>
                                                            @endif
                                                             @if($campaign->insta_video_brand_checkbox == 'on')
                                                            <li>Video (Brand Shot)</li>
                                                            @endif
                                                           
                                                          @else
                                                            @if($campaign->youtube_video_self_checkbox == 'on')
                                                            <li>Video (Self Shot)</li>
                                                            @endif
                                                             @if($campaign->youtube_video_brand_checkbox == 'on')
                                                            <li>Video (Brand Shot)</li>
                                                            @endif
                                                          @endif
                                                        </ul>
                                                      </div>
                                                    </div>

                                                </div>
                                                <!-- <div class="card-footer text-right">
                                                  <button class="btn btn-primary">Save Changes</button>
                                                </div> -->
                                            </div>
                                          </div>

                                          <div class="col-12 col-md-12 col-lg-4">
                                            <div class="card">
                                                <div class="card-header">
                                                  <h4><u>Campaign Details</u></h4>
                                                </div>
                                                <div class="card-body" style="padding-top: 0px;">
                                                    

                                                    <div class="row">                               
                                                      <div class="form-group col-md-12 col-12">
                                                        <label class="label">Payment Type</label>
                                                        <ul class="no-bullets">
                                                          <li>{{ strtoupper($campaign->payment_type) }}</li>
                                                        </ul>
                                                      </div>
                                                    </div>

                                                    <div class="row">                               
                                                      <div class="form-group col-md-12 col-12">
                                                        <label class="label">HashTags</label>
                                                        <ul class="no-bullets">
                                                          <li>{{ $campaign->hastags}}</li>
                                                        </ul>
                                                      </div>
                                                    </div>

                                                    <div class="row">                               
                                                      <div class="form-group col-md-12 col-12">
                                                        <label class="label">Proposal Deadline</label>
                                                        <ul class="no-bullets">
                                                          <li>{{ $campaign->deadline }}</li>
                                                        </ul>
                                                      </div>
                                                    </div>

                                                    <div class="row">                               
                                                      <div class="form-group col-md-12 col-12">
                                                        <label class="label">Campaign Live Date</label>
                                                        <ul class="no-bullets">
                                                          <li>{{ $campaign->live_date }}</li>
                                                        </ul>
                                                      </div>
                                                    </div>
                                                    
                                                </div>
                                                
                                            </div>
                                          </div>
                                         
                                        </div>
                                      </div>
                                       <div class=" text-right">
                                            <form method="POST" action="{{ route('admin.campaign.status.change', $campaign->unique_id) }}">
                                                @csrf
                                                <label>Change Status</label>
                                                <input type="hidden" name="unique_id" value="{{$campaign->unique_id}}">
                                                <select name="status">
                                                    <option value="save" {{ $campaign->status == 'save' ? "selected"  : "" }} >save</option>
                                                    <option value="post" {{ $campaign->status == 'post' ? "selected"  : "" }} >post</option>
                                                    <option value="ongoing" {{ $campaign->status == 'ongoing' ? "selected"  : "" }} >ongoing</option>
                                                    <option value="completed" {{ $campaign->status == 'completed' ? "selected"  : "" }} >completed</option>
                                                </select>
                                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                              </form>
                                            </div>
                                <!-- </div> -->
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.portlet-body -->
                        </div>
                        <!-- /.portlet -->

                    </div>
</div>





@endsection