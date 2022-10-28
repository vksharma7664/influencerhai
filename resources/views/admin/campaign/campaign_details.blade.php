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
    <p class="text-center text-green">{{session('msg')}}</p>
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

                                    @if($campaign->types()->count() > 0)
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
                                    @endif

                                    
                                    @if($campaign->categories()->count() > 0)
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
                                    @endif

                                    @if($campaign->locations()->count() > 0)
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
                                    @endif


                                    @if($campaign->referenceLinks()->count() > 0)
                                    <div class="row">                               
                                      <div class="form-group col-md-6 col-12">
                                        <label class="label">Reference Links</label>
                                        <ul class="no-bullets">
                                          @foreach($campaign->referenceLinks as $link)
                                          <li><a href="{{$link->link}}" target="_blank">{{ $link->link }}</a></li>
                                          @endforeach
                                        </ul>
                                      </div>
                                    </div>
                                    @endif
                                    
                                    @if($campaign->file != null)
                                    <div class="row">                               
                                      <div class="form-group col-md-6 col-12">
                                        <label class="label">Reference file</label>
                                        <a href="{{env('AWS_BASEURL_IMAGE')}}{{$campaign->file}}" target="_blank" class=" btn btn-info">Download</a>
                                      </div>
                                    </div>
                                    @endif
                                  
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
                                    <div class="form-group col-md-12 col-12">
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
                                            @if($campaign->youtube_integrated_checkbox == 'on')
                                          <li>Integrated Video</li>
                                          @endif
                                            @if($campaign->youtube_dedicated_checkbox == 'on')
                                          <li>Dedicated Video</li>
                                          @endif
                                            @if($campaign->youtube_link_desc_checkbox == 'on')
                                          <li>Link in Description</li>
                                          @endif
                                            @if($campaign->youtube_pin_comment_checkbox == 'on')
                                          <li>Pin Comment</li>
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
                                  <option value="save" {{ $campaign->status == 'save' ? "selected"  : "" }} >{{ campaignStatus('save') }}</option>
                                  <option value="post" {{ $campaign->status == 'post' ? "selected"  : "" }} >{{ campaignStatus('post') }}</option>
                                  <option value="live" {{ $campaign->status == 'live' ? "selected"  : "" }} >{{ campaignStatus('live') }}</option>
                                  <option value="ongoing" {{ $campaign->status == 'ongoing' ? "selected"  : "" }} >{{ campaignStatus('ongoing') }}</option>
                                  <option value="completed" {{ $campaign->status == 'completed' ? "selected"  : "" }} >{{ campaignStatus('completed') }}</option>
                              </select>
                                  <button type="submit" class="btn btn-primary">Save Changes</button>
                            </form>
                          </div>
              <!-- </div> -->
              <!-- /.table-responsive -->
          </div>
          <hr>
        @if($campaign->status == 'post')  
          <!-- /.portlet-body -->
          <div class=" row">
            <div class="col-md-12">
              <div class="portlet-body">
                <form method="POST" action="{{ route('admin.campaign.sample.upload', $campaign->unique_id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6">
                      <label>Share Sample File</label>
                      <input type="hidden" name="id" value="{{$campaign->id}}">
                      
                      <input type="file" name="excel" class="form-control">
                    </div>
                    <div class="col-md-5" style="padding-top: 25px;">
                      <label> </label>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                </div>
            </div>
          </div>
          <hr>
          @if($campaign->sampleProvide()->count() > 0)
            <div class="row">
              <div class="col-md-12">
                <div class="portlet-body">
                  <form method="POST" action="{{ route('admin.campaign.sample.changes', $campaign->unique_id) }}" enctype="multipart/form-data">
                    <input type="hidden" value="{{ $campaign->id }}" name="campaign_id">
                      @csrf
                      <div class="card-body">
                        <div class="section-title mt-0"><b>Shared Influencers List for Campaign</b></div>
                        <hr>
                        <div class="table-responsive" style="overflow-y: auto !important;">
                          <table class="table table-bordered" style="overflow-y:auto !important;">
                            <thead>
                              <tr>
                                <th scope="col" style="background-color: grey;">Select</th>
                                <th scope="col" style="background-color: grey;">Client Remark</th>
                                <th scope="col" style="background-color: grey;">Admin Remark</th>
                                @foreach($headings as $one)
                                <th scope="col">{{makeSlugFree($one)}}</th>
                                @endforeach
                              </tr>
                            </thead>
                            <tbody>
                              
                                @foreach($influencer_list as $list)
                                @php
                                $data = json_decode($list->other_data,true);
                                @endphp
                                <tr>
                                  <td scope="row">
                                    <div class="form-check">
                                      <!-- <input type="radio" name="select_{{$list->id}}" class="form-check-input" @if($list->selected) checked @endif ></div> -->
                                      @if($list->selected)<h5 style="color:green;"> Selected </h5> @else - @endif
                                  </td>
                                  <td scope="col"> <div class="form-group">
                                    {{ $list->remark != null ? $list->remark : '' }}
                                  </div></td>
                                  <td scope="col" > <div class="form-group">
                                    <input type="text"  name="admin_remark_{{$list->id}}" value="{{ $list->admin_remark != null ? $list->admin_remark : '' }}">
                                  </div></td>
                                    @foreach($headings as $one)
                                    <td scope="col"><input  type="text" name="{{$one}}_{{$list->id}}" value=" {{ $data[$one] }}">
                                    
                                    </td>
                                    @endforeach
                                </tr>
                                @endforeach

                              
                              
                            </tbody>
                          </table>
                        </div>
                          
                        <div class="row">
                          <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                        </div>
                      </div>
                    </form>
                  </div>
              </div>
            </div>
          @endif
        @endif

        @if(!in_array($campaign->status, ['save','post'])) 
        <div class="row">
              <div class="col-md-12">
                <div class="portlet-body">
                      <div class="card-body">
                        <div class="section-title mt-0"><b>Selected Influencers List for Campaign</b></div>
                        <hr>
                        <div class="table-responsive" style="overflow-y: auto !important;">
                          <table class="table table-bordered" style="overflow-y:auto !important;">
                            <thead>
                              <tr>
                                <th scope="col" style="background-color: grey;">Select</th>
                                <th scope="col" style="background-color: grey;">Client Remark</th>
                                <th scope="col" style="background-color: grey;">Admin Remark</th>
                                @foreach($headings as $one)
                                <th scope="col">{{makeSlugFree($one)}}</th>
                                @endforeach
                              </tr>
                            </thead>
                            <tbody>
                              
                                @foreach($influencer_list as $list)
                                @php
                                if($list->selected != 1){
                                  continue;
                                }

                                $data = json_decode($list->other_data,true);
                                @endphp
                                <tr>
                                  <td scope="row">
                                    <div class="form-check">
                                     
                                      @if($list->selected)<h5 style="color:green;"> Selected </h5> @else - @endif
                                  </td>
                                  <td scope="col"> <div class="form-group">
                                    {{ $list->remark != null ? $list->remark : '' }}
                                  </div></td>
                                  <td scope="col" > <div class="form-group">
                                    {{ $list->admin_remark != null ? $list->admin_remark : '' }}
                                  </div></td>
                                    @foreach($headings as $one)
                                    <td scope="col">@if(str_contains($data[$one], 'http')) <a href="{{ $data[$one] }}" target="_blank" > {{ $data[$one] }} </a> @else {{ $data[$one] }} @endif
                                    
                                    </td>
                                    @endforeach
                                </tr>
                                @endforeach

                              
                              
                            </tbody>
                          </table>
                        </div>
                          
                        </div>
                      </div>
                  </div>
              </div>
            </div>
        @endif
      </div>
      <!-- /.portlet -->

    </div>
</div>





@endsection