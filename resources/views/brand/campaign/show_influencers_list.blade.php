@extends('brand.layouts.app')
 

@section('css')
  @parent
  <style>

  	.label{
  		margin-bottom: 0rem
  	}
  	
  	.no-bullets {
	  list-style-type: none; /* Remove bullets */
	}

	.no-bullets>li {
	  margin-bottom: none; /* Remove bullets */
	}

  </style>

@endsection


 
@section('content')
 <div class="main-content">
        <section class="section">
           <div class="section-header">
            <h1>{{ ucwords(auth::user()->company_name) }}</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('brand.dashboard')}}">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="{{ route('brand.campaign.list')}}">Campaign</a></div>
              <div class="breadcrumb-item">List</div>
            </div>
          </div>
          <div class="section-body">
            <h2 class="section-title">{{ $campaign->title }}</h2>
            <!-- <h6>Description:</h6>
            <div class="row">
              	<div class="col-10 col-md-10 col-lg-10">
		            <p class="section-lead">
		              {!! $campaign->description !!}
		            </p>
		        </div> -->
		    </div>

            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                      <a href="{{ route('brand.campaign.list')}}" class="btn btn-light"> Back </a>
                      <h4><u>Influencers Details</u></h4>
                    </div>
                    <div class="card-body" style="padding-top: 0px;">
                      <div class="text-center text-green">{{session('msg')}}</div>
                        <div class="row">                               
                          <div class="form-group col-md-12 col-12">
                            <form method="POST" action="{{ route('brand.campaign.sample.influencer.selected') }}">
                              @csrf
                              <input type="hidden" name="campaign_id" value="{{$campaign->id}}">
                            <div class="card">
                              <div class="card-body">
                                <div class="section-title mt-0">Select Influencers for Campaign</div>
                                <table class="table table-bordered" style="overflow-y:auto !important;">
                                  <thead>
                                    <tr>
                                      <th scope="col">Select</th>
                                      <th scope="col" style="width: 50%">Remark</th>
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
                                        <td scope="row"><div class="form-check"><input type="radio" name="select_{{$list->id}}" class="form-check-input" @if($list->selected) checked @endif ></div></td>
                                        <td scope="row" style="width: 50%"> <div class="form-group">
                                          <input type="text" class="form-control form-control-sm" name="remark_{{$list->id}}" value="{{ $list->remark != null ? $list->remark : '' }}">
                                        </div></td>
                                         @foreach($headings as $one)
                                          <td scope="col">@if(str_contains($data[$one], 'http')) <a href="{{ $data[$one] }}" target="_blank" > {{ $data[$one] }} </a> @else {{ $data[$one] }} @endif </td>
                                          @endforeach
                                      </tr>
                                      @endforeach

                                   
                                    
                                  </tbody>
                                </table>
                                 
                                <div class="row">
                                  <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                                </div>
                              </div>
                              </form>
                            </div>
                          </div>
                        </div>
                        

                    </div>
                    <!-- <div class="card-footer text-right">
                      <button class="btn btn-primary">Save Changes</button>
                    </div> -->
                </div>
              </div>
                
              
            </div>
          </div>
        </section>
      </div>

@endsection

@section('scripts')
  @parent
  <script>
    $(document).ready(function() {
      
    });

  </script>
@endsection

