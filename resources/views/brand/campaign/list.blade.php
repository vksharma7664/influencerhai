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
                      <li class="nav-item">
                        <a class="nav-link {{ $active_tab == 'ongoing' ? 'active' : '' }}" id="ongoing-tab3" data-toggle="tab" href="#ongoing3" role="tab" aria-controls="ongoing" aria-selected="true">Outgoing Campaigns @if($ongoing->count() > 0)<span class="badge badge-transparent">({{ $ongoing->count() }})</span> @endif</a>
                      </li>
                      
                      <li class="nav-item">
                        <a class="nav-link {{ $active_tab == 'review' ? 'active' : '' }}" id="review-tab3" data-toggle="tab" href="#review3" role="tab" aria-controls="review" aria-selected="false">Under Review @if($review->count() > 0)<span class="badge badge-transparent">({{ $review->count() }})</span> @endif</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link {{ $active_tab == 'draft' ? 'active' : '' }}" id="draft-tab3" data-toggle="tab" href="#draft3" role="tab" aria-controls="draft" aria-selected="false">Drafts @if($draft->count() > 0)<span class="badge badge-transparent">({{ $draft->count() }})</span> @endif</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link {{ $active_tab == 'completed' ? 'active' : '' }}" id="completed-tab3" data-toggle="tab" href="#completed3" role="tab" aria-controls="completed" aria-selected="false">Completed @if($completed->count() > 0)<span class="badge badge-transparent">({{ $completed->count() }})</span> @endif</a>
                      </li>
                    </ul>
                    <div class="tab-content" id="myTabContent2">
                      <div class="tab-pane fade {{ $active_tab == 'ongoing' ? 'show active' : '' }}" id="ongoing3" role="tabpanel" aria-labelledby="ongoing-tab3">
                        <!-- inner html -->
                        ongoing
                        <div class="text-center m">
                          <i class="fas fa-bars" style="font-size: 60px;"></i>
                          <p class="text-center">No Data</p>
                        </div>
                          
                      </div>
                      <div class="tab-pane fade {{ $active_tab == 'review' ? 'show active' : '' }}" id="review3" role="tabpanel" aria-labelledby="review-tab3">
                       reviw
                      </div>
                      <div class="tab-pane fade {{ $active_tab == 'draft' ? 'show active' : '' }}" id="draft3" role="tabpanel" aria-labelledby="draft-tab3">
                        darft
                      </div>
                      <div class="tab-pane fade {{ $active_tab == 'completed' ? 'show active' : '' }}" id="completed3" role="tabpanel" aria-labelledby="completed-tab3">
                        completed
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
  
  <script>
    $(document).ready(function() {
      
    });

  </script>
@endsection

