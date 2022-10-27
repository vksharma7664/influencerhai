@extends('brand.layouts.app')
 

@section('css')
  @parent
    <!-- <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script> -->
  <!-- <link rel="stylesheet" href="{{ env('AWS_BASEURL_IMAGE').'brand-assets/modules/summernote/summernote-bs4.css' }}"> -->
  


@endsection


 
@section('content')
  <!-- Main Content -->
  <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>My Campaigns</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('brand.dashboard')}}">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="{{ route('brand.campaign.list')}}">Campaign</a></div>
              <div class="breadcrumb-item">List</div>
            </div>
          </div>

          <div class="section-body">
           <!--  <h2 class="section-title">Wizard</h2>
            <p class="section-lead">The wizard is a component to simplify a process with a step-by-step method.</p> -->

            <div class="row">
              <div class="col-12 col-sm-12 col-lg-12">
                <!-- <div class="card "> -->
<!--                   <div class="card-header">
                    <h4>Tab <code>.nav-pills</code></h4>
                  </div> -->
                  <!-- <div class="card-body"> -->
                    <ul class="nav nav-pills" id="myTab3" role="tablist">
                      <li class="nav-item mr-3">
                        <a class="nav-link {{ $active_tab == 'ongoing' ? 'active' : '' }}" id="ongoing-tab3" data-toggle="tab" href="#ongoing3" role="tab" aria-controls="ongoing" aria-selected="true">Outgoing @if($ongoing->count() > 0)<span class="badge badge-transparent">({{ $ongoing->count() }})</span> @endif</a>
                      </li>

                      <li class="nav-item  mr-3">
                        <a class="nav-link {{ $active_tab == 'live' ? 'active' : '' }}" id="live-tab3" data-toggle="tab" href="#live3" role="tab" aria-controls="live" aria-selected="true">Live Brief @if($live->count() > 0)<span class="badge badge-transparent">({{ $live->count() }})</span> @endif</a>
                      </li>
                      
                      <li class="nav-item  mr-3">
                        <a class="nav-link {{ $active_tab == 'review' ? 'active' : '' }}" id="review-tab3" data-toggle="tab" href="#review3" role="tab" aria-controls="review" aria-selected="false">Under Review @if($review->count() > 0)<span class="badge badge-transparent">({{ $review->count() }})</span> @endif</a>
                      </li>
                      <li class="nav-item  mr-3">
                        <a class="nav-link {{ $active_tab == 'draft' ? 'active' : '' }}" id="draft-tab3" data-toggle="tab" href="#draft3" role="tab" aria-controls="draft" aria-selected="false">Drafts @if($draft->count() > 0)<span class="badge badge-transparent">({{ $draft->count() }})</span> @endif</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link {{ $active_tab == 'completed' ? 'active' : '' }}" id="completed-tab3" data-toggle="tab" href="#completed3" role="tab" aria-controls="completed" aria-selected="false">Completed @if($completed->count() > 0)<span class="badge badge-transparent">({{ $completed->count() }})</span> @endif</a>
                      </li>
                    </ul>
                    <div class="tab-content" id="myTabContent2">
                      <div class="tab-pane fade {{ $active_tab == 'ongoing' ? 'show active' : '' }}" id="ongoing3" role="tabpanel" aria-labelledby="ongoing-tab3">
                        <!-- inner html -->
                        <!-- ongoing -->
                        @if($ongoing->orderBy('id','desc')->count() > 0)
                        <div class="table-responsive">
                          <table class="table table-striped">
                            <tr>
                              <th>Title</th>
                              <th>Deadline</th>
                              <th>Live Date</th>
                              <th>Platform</th>                              
                              <th>Created</th>
                              <th>Action</th>
                            </tr>
                            @foreach($ongoing->get() as $ongoing)
                            <tr>
                              <td>{{ ucwords($ongoing->title) }}</td>
                              <td class="align-middle">
                               
                                {{ $ongoing->deadline }}
                              </td>
                              <td>{{ $ongoing->live_date }}</td>
                               <td>{{ ucwords($ongoing->platform) }}</td>
                               <td>{{ readableDate($ongoing->created_at) }}</td>
                              <td>
                                <a href="#" class="btn btn-secondary">Edit</a>
                                <a href="#" class="btn btn-secondary">Detail</a>
                              </td>
                            </tr>
                            @endforeach
                          </table>
                        </div>
                        @else
                        <div class="text-center m">
                          <i class="fas fa-bars" style="font-size: 20px;"></i>
                          <p class="text-center">No Data</p>
                        </div>
                        @endif
                          
                      </div>
                      <div class="tab-pane fade {{ $active_tab == 'live' ? 'show active' : '' }}" id="live3" role="tabpanel" aria-labelledby="live-tab3">
                        <!-- inner html -->
                        <!-- live -->
                        @if($live->orderBy('id','desc')->count() > 0)
                        <div class="table-responsive">
                          <table class="table table-striped">
                            <tr>
                              <th>Title</th>
                              <th>Deadline</th>
                              <th>Live Date</th>
                              <th>Platform</th>                              
                              <th>Created</th>
                              <th>Action</th>
                            </tr>
                            @foreach($live->get() as $live)
                            <tr>
                              <td>{{ ucwords($live->title) }}</td>
                              <td class="align-middle">
                               
                                {{ $live->deadline }}
                              </td>
                              <td>{{ $live->live_date }}</td>
                               <td>{{ ucwords($live->platform) }}</td>
                               <td>{{ readableDate($live->created_at) }}</td>
                              <td>
                                <a href="#" class="btn btn-secondary">Show Details</a>
                                <!-- <a href="#" class="btn btn-secondary">Detail</a> -->
                              </td>
                            </tr>
                            @endforeach
                          </table>
                        </div>
                        @else
                        <div class="text-center m">
                          <i class="fas fa-bars" style="font-size: 20px;"></i>
                          <p class="text-center">No Data</p>
                        </div>
                        @endif
                          
                      </div>
                      <div class="tab-pane fade {{ $active_tab == 'review' ? 'show active' : '' }}" id="review3" role="tabpanel" aria-labelledby="review-tab3">
                       <!-- reviw -->
                      @if($review->orderBy('id','desc')->count() > 0)
                        <div class="table-responsive">
                          <table class="table table-striped">
                            <tr>
                              <th>Title</th>
                              <th>Deadline</th>
                              <th>Live Date</th>
                              <th>Platform</th>                              
                              <th>Created</th>
                              <th>Action</th>
                            </tr>
                            @foreach($review->get() as $review)
                            <tr>
                              <td>{{ ucwords($review->title) }}</td>
                              <td class="align-middle">
                               
                                {{ $review->deadline }}
                              </td>
                              <td>{{ $review->live_date }}</td>
                               <td>{{ ucwords($review->platform) }}</td>
                               <td>{{ readableDate($review->created_at) }}</td>
                              <td>
                                <!-- <button class="btn btn-sm btn-secondary">Under Review</button> -->
                                @if($review->sampleProvide()->count() > 0)
                                <a href="{{ route('brand.campaign.sample.influencer',$review->unique_id) }}" class="btn btn-sm btn-info">Show Influencers</a>

                                @else
                                -
                                @endif
                              </td>
                            </tr>
                            @endforeach
                          </table>
                        </div>
                        @else
                        <div class="text-center m">
                          <i class="fas fa-bars" style="font-size: 20px;"></i>
                          <p class="text-center">No Data</p>
                        </div>
                        @endif
                      </div>
                      <div class="tab-pane fade {{ $active_tab == 'draft' ? 'show active' : '' }}" id="draft3" role="tabpanel" aria-labelledby="draft-tab3">
                        <!-- darft -->
                         @if($draft->orderBy('id','desc')->count() > 0)
                        <div class="table-responsive">
                          <table class="table table-striped">
                            <tr>
                              <th>Title</th>
                              <th>Deadline</th>
                              <th>Live Date</th>
                              <th>Platform</th>                              
                              <th>Created</th>
                              <th>Action</th>
                            </tr>
                            @foreach($draft->get() as $draft)
                            <tr>
                              <td><a href="{{ route('brand.campaign.show', $draft->unique_id) }}"> {{ ucwords($draft->title) }}</a></td>
                              <td class="align-middle">
                               
                                {{ $draft->deadline }}
                              </td>
                              <td>{{ $draft->live_date }}</td>
                               <td>{{ ucwords($draft->platform) }}</td>
                               <td>{{ readableDate($draft->created_at) }}</td>
                              <td>
                                <a href="{{ route('brand.campaign.edit', $draft->unique_id) }}" class="btn btn-secondary">Edit</a>
                                <a href="{{ route('brand.campaign.post', $draft->unique_id) }}" class="btn btn-secondary">Post</a>
                              </td>
                            </tr>
                            @endforeach
                          </table>
                        </div>
                        @else
                        <div class="text-center m">
                          <i class="fas fa-bars" style="font-size: 20px;"></i>
                          <p class="text-center">No Data</p>
                        </div>
                        @endif
                      </div>
                      <div class="tab-pane fade {{ $active_tab == 'completed' ? 'show active' : '' }}" id="completed3" role="tabpanel" aria-labelledby="completed-tab3">
                        <!-- completed -->
                        @if($completed->orderBy('id','desc')->count() > 0)
                        <div class="table-responsive">
                          <table class="table table-striped">
                            <tr>
                              <th>Title</th>
                              <th>Deadline</th>
                              <th>Live Date</th>
                              <th>Platform</th>                              
                              <th>Created</th>
                              <th>Action</th>
                            </tr>
                            @foreach($completed->get() as $completed)
                            <tr>
                              <td>{{ ucwords($completed->title) }}</td>
                              <td class="align-middle">
                               
                                {{ $completed->deadline }}
                              </td>
                              <td>{{ $completed->live_date }}</td>
                               <td>{{ ucwords($completed->platform) }}</td>
                               <td>{{ readableDate($completed->created_at) }}</td>
                              <td>
                                <a href="#" class="btn btn-secondary">Edit</a>
                                <a href="#" class="btn btn-secondary">Detail</a>
                              </td>
                            </tr>
                            @endforeach
                          </table>
                        </div>
                        @else
                        <div class="text-center m">
                          <i class="fas fa-bars" style="font-size: 20px;"></i>
                          <p class="text-center">No Data</p>
                        </div>
                        @endif
                      </div>
                    </div>
                  <!-- </div> -->
                <!-- </div> -->
              </div>
              
            </div>
          </div>
        </section>
      </div>

@endsection

@section('scripts')
  @parent
  <script src="{{ env('AWS_BASEURL_IMAGE').'brand-assets/js/page/components-table.js' }}"></script>
  <script>
    $(document).ready(function() {
      
    });

  </script>
@endsection

