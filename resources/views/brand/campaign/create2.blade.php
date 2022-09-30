@extends('brand.layouts.app')
 

@section('css')
  @parent
    <!-- <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script> -->
  <link rel="stylesheet" href="{{ env('AWS_BASEURL_IMAGE').'brand-assets/modules/summernote/summernote-bs4.css' }}">
  <link rel="stylesheet" href="{{ env('AWS_BASEURL_IMAGE').'brand-assets/modules/codemirror/lib/codemirror.css' }}">
  <link rel="stylesheet" href="{{ env('AWS_BASEURL_IMAGE').'brand-assets/modules/codemirror/theme/duotone-dark.css' }}">
  <link rel="stylesheet" href="{{ env('AWS_BASEURL_IMAGE').'brand-assets/modules/jquery-selectric/selectric.css' }}">
  <!-- <link rel="stylesheet" href="{{ env('AWS_BASEURL_IMAGE').'brand-assets/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css' }}"> -->
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->


@endsection


 
@section('content')
  <!-- Main Content -->
  <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>New Campaign</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('brand.dashboard')}}">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="{{ route('brand.campaign.list')}}">Campaign</a></div>
              <div class="breadcrumb-item">New</div>
            </div>
          </div>

          <div class="section-body">
           <!--  <h2 class="section-title">Wizard</h2>
            <p class="section-lead">The wizard is a component to simplify a process with a step-by-step method.</p> -->

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Create New Campaign</h4>
                  </div>
                  <div class="card-body">
                    <div class="row mt-4">
                      <div class="col-12 col-lg-8 offset-lg-2">
                        <div class="wizard-steps">
                          <div class="wizard-step">
                            <div class="wizard-step-icon">
                              <i class="far fa-user"></i>
                            </div>
                            <div class="wizard-step-label">
                              Campaign Details
                            </div>
                          </div>
                          <div class="wizard-step wizard-step-active">
                            <div class="wizard-step-icon">
                              <i class="fas fa-box-open"></i>
                            </div>
                            <div class="wizard-step-label">
                              Platform Details
                            </div>
                          </div>
                          <div class="wizard-step">
                            <div class="wizard-step-icon">
                              <i class="fas fa-server"></i>
                            </div>
                            <div class="wizard-step-label">
                              Influencer Details
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <form class="wizard-content mt-2" method="POST" action="{{ route('brand.campaign.create3')}}">
                      @csrf
                      <div class="wizard-pane">
                        
                        <div class="form-group row">
                          <label class="col-md-4 text-md-right text-left mt-2">Platform</label>
                          <div class="col-lg-6 col-md-8">
                            <div class="selectgroup w-100">
                              <label class="selectgroup-item">
                                <input type="radio" name="platform" value="instagram" class="selectgroup-input" checked="checked" onchange="changePlatform('instagram')">
                                <span class="selectgroup-button">Instagram</span>
                              </label>
                              <label class="selectgroup-item">
                                <input type="radio" name="platform" value="youtube" class="selectgroup-input" onchange="changePlatform('youtube')">
                                <span class="selectgroup-button">Youtube</span>
                              </label>
                              
                            </div>
                          </div>
                        </div>
                        <div class="form-group row align-items-center" id="instagram-div" style="display: none;">
                          <label class="col-md-4 text-md-right text-left"></label>
                          <div class="col-lg-6 col-md-8">
                            <div class="control-label">Deliverables Per Influencer*</div>
                          </div>
                          <!--  toggle -->
                          <label class="col-md-4 text-md-right text-left"></label>
                          <div class="col-lg-3 col-md-4">
                            <!-- <div class="control-label">Toggle switch single</div> -->
                            <label class="custom-switch mt-2">
                              <input type="checkbox" name="insta_reels_checkbox" class="custom-switch-input" onchange=" toggleCheckbox('reels') " id="reels">
                              <span class="custom-switch-indicator"></span>
                              <span class="custom-switch-description">Reels</span>
                            </label>
                          </div>
                          <div class="col-lg-3 col-md-4 pt-2">
                            <!-- <label class="form-label">Size</label> -->
                            <div class="selectgroup w-50" style="display:none" id="reels-num">
                              <label class="selectgroup-item">
                                <!-- <input type="radio" name="value" value="50" class="selectgroup-input" > -->
                                <span class="selectgroup-button" onclick=" changeCounter('minus', 'reels')">-</span>
                              </label>
                              <label class="selectgroup-item">
                                <input type="text" name="reels_count" id="reels-counter" value="1" class="selectgroup-input">
                                <span class="selectgroup-button" id="reels-counter-show">1</span>
                              </label>
                              <label class="selectgroup-item">
                                <!-- <input type="radio" name="value" value="150" class="selectgroup-input"> -->
                                <span class="selectgroup-button" onclick=" changeCounter('add', 'reels')">+</span>
                              </label>
                              
                            </div>
                          </div>
                          <!--  toggle -->
                          <!--  toggle -->
                          <label class="col-md-4 text-md-right text-left"></label>
                          <div class="col-lg-3 col-md-4">
                            <!-- <div class="control-label">Toggle switch single</div> -->
                            <label class="custom-switch mt-2">
                              <input type="checkbox" name="insta_story_checkbox" class="custom-switch-input" onchange=" toggleCheckbox('story') " id="story">
                              <span class="custom-switch-indicator"></span>
                              <span class="custom-switch-description">Story</span>
                            </label>
                          </div>
                          <div class="col-lg-3 col-md-4 pt-2">
                            <!-- <label class="form-label">Size</label> -->
                            <div class="selectgroup w-50" style="display:none" id="story-num">
                              <label class="selectgroup-item">
                                <!-- <input type="radio" name="value" value="50" class="selectgroup-input" > -->
                                <span class="selectgroup-button" onclick=" changeCounter('minus', 'story')">-</span>
                              </label>
                              <label class="selectgroup-item">
                                <input type="text" name="story_count" id="story-counter" value="1" class="selectgroup-input">
                                <span class="selectgroup-button" id="story-counter-show">1</span>
                              </label>
                              <label class="selectgroup-item">
                                <!-- <input type="radio" name="value" value="150" class="selectgroup-input"> -->
                                <span class="selectgroup-button" onclick=" changeCounter('add', 'story')">+</span>
                              </label>
                              
                            </div>
                          </div>
                          <!--  toggle -->
                          <!--  toggle -->
                          <label class="col-md-4 text-md-right text-left"></label>
                          <div class="col-lg-6 col-md-8">
                            <!-- <div class="control-label">Toggle switch single</div> -->
                            <label class="custom-switch mt-2">
                              <input type="checkbox" name="insta_bio_checkbox" class="custom-switch-input" >
                              <span class="custom-switch-indicator"></span>
                              <span class="custom-switch-description">Link in Bio</span>
                            </label>
                          </div>
                          
                          <!--  toggle -->
                          <!-- first toggle -->
                          <label class="col-md-4 text-md-right text-left"></label>
                          <div class="col-lg-3 col-md-4">
                            <!-- <div class="control-label">Toggle switch single</div> -->
                            <label class="custom-switch mt-2">
                              <input type="checkbox" name="insta_video_self_checkbox" class="custom-switch-input" onchange=" toggleCheckbox('insta-video-self') " id="insta-video-self">
                              <span class="custom-switch-indicator"></span>
                              <span class="custom-switch-description">Video (Self Shot)</span>
                            </label>
                          </div>
                          <div class="col-lg-3 col-md-4 pt-2">
                            <!-- <label class="form-label">Size</label> -->
                            <div class="selectgroup w-50" style="display:none" id="insta-video-self-num">
                              <label class="selectgroup-item">
                                <!-- <input type="radio" name="value" value="50" class="selectgroup-input" > -->
                                <span class="selectgroup-button" onclick=" changeCounter('minus', 'insta-video-self')">-</span>
                              </label>
                              <label class="selectgroup-item">
                                <input type="text" name="insta_video_self_count" id="insta-video-self-counter" value="1" class="selectgroup-input">
                                <span class="selectgroup-button" id="insta-video-self-counter-show">1</span>
                              </label>
                              <label class="selectgroup-item">
                                <!-- <input type="radio" name="value" value="150" class="selectgroup-input"> -->
                                <span class="selectgroup-button" onclick=" changeCounter('add', 'insta-video-self')">+</span>
                              </label>
                              
                            </div>
                          </div>
                          <!-- first toggle -->
                          <!-- first toggle -->
                          <label class="col-md-4 text-md-right text-left"></label>
                          <div class="col-lg-3 col-md-4">
                            <!-- <div class="control-label">Toggle switch single</div> -->
                            <label class="custom-switch mt-2">
                              <input type="checkbox" name="insta_video_brand_checkbox" class="custom-switch-input" onchange=" toggleCheckbox('insta-video-brand') " id="insta-video-brand">
                              <span class="custom-switch-indicator"></span>
                              <span class="custom-switch-description">Video (Brand Produced)</span>
                            </label>
                          </div>
                          <div class="col-lg-3 col-md-4 pt-2">
                            <!-- <label class="form-label">Size</label> -->
                            <div class="selectgroup w-50" style="display:none" id="insta-video-brand-num">
                              <label class="selectgroup-item">
                                <!-- <input type="radio" name="value" value="50" class="selectgroup-input" > -->
                                <span class="selectgroup-button" onclick=" changeCounter('minus', 'insta-video-brand')">-</span>
                              </label>
                              <label class="selectgroup-item">
                                <input type="text" name="insta_video_brand_count" id="insta-video-brand-counter" value="1" class="selectgroup-input">
                                <span class="selectgroup-button" id="insta-video-brand-counter-show">1</span>
                              </label>
                              <label class="selectgroup-item">
                                <!-- <input type="radio" name="value" value="150" class="selectgroup-input"> -->
                                <span class="selectgroup-button" onclick=" changeCounter('add', 'insta-video-brand')">+</span>
                              </label>
                              
                            </div>
                          </div>
                          <!-- first toggle -->
                          
                        </div>

                        <div class="form-group row align-items-center" id="youtube-div" style="display: none;">
                          <label class="col-md-4 text-md-right text-left"></label>
                          <div class="col-lg-6 col-md-8">
                            <div class="control-label">Deliverables Per Influencer*</div>
                          </div>
                          <!-- first toggle -->
                          <label class="col-md-4 text-md-right text-left"></label>
                          <div class="col-lg-3 col-md-4">
                            <!-- <div class="control-label">Toggle switch single</div> -->
                            <label class="custom-switch mt-2">
                              <input type="checkbox" name="youtube_video_self_checkbox" class="custom-switch-input" onchange=" toggleCheckbox('youtube-video-self') " id="youtube-video-self">
                              <span class="custom-switch-indicator"></span>
                              <span class="custom-switch-description">Video (Self Shot)</span>
                            </label>
                          </div>
                          <div class="col-lg-3 col-md-4 pt-2">
                            <!-- <label class="form-label">Size</label> -->
                            <div class="selectgroup w-50" style="display:none" id="youtube-video-self-num">
                              <label class="selectgroup-item">
                                <!-- <input type="radio" name="value" value="50" class="selectgroup-input" > -->
                                <span class="selectgroup-button" onclick=" changeCounter('minus', 'youtube-video-self')">-</span>
                              </label>
                              <label class="selectgroup-item">
                                <input type="text" name="youtube_video_self_count" id="youtube-video-self-counter" value="1" class="selectgroup-input">
                                <span class="selectgroup-button" id="youtube-video-self-counter-show">1</span>
                              </label>
                              <label class="selectgroup-item">
                                <!-- <input type="radio" name="value" value="150" class="selectgroup-input"> -->
                                <span class="selectgroup-button" onclick=" changeCounter('add', 'youtube-video-self')">+</span>
                              </label>
                              
                            </div>
                          </div>
                          <!-- first toggle -->
                          <!-- first toggle -->
                          <label class="col-md-4 text-md-right text-left"></label>
                          <div class="col-lg-3 col-md-4">
                            <!-- <div class="control-label">Toggle switch single</div> -->
                            <label class="custom-switch mt-2">
                              <input type="checkbox" name="youtube_video_brand_checkbox" class="custom-switch-input" onchange=" toggleCheckbox('youtube-video-brand') " id="youtube-video-brand">
                              <span class="custom-switch-indicator"></span>
                              <span class="custom-switch-description">Video (Brand Produced)</span>
                            </label>
                          </div>
                          <div class="col-lg-3 col-md-4 pt-2">
                            <!-- <label class="form-label">Size</label> -->
                            <div class="selectgroup w-50" style="display:none" id="youtube-video-brand-num">
                              <label class="selectgroup-item">
                                <!-- <input type="radio" name="value" value="50" class="selectgroup-input" > -->
                                <span class="selectgroup-button" onclick=" changeCounter('minus', 'youtube-video-brand')">-</span>
                              </label>
                              <label class="selectgroup-item">
                                <input type="text" name="youtube_video_brand_count" id="youtube-video-brand-counter" value="1" class="selectgroup-input">
                                <span class="selectgroup-button" id="youtube-video-brand-counter-show">1</span>
                              </label>
                              <label class="selectgroup-item">
                                <!-- <input type="radio" name="value" value="150" class="selectgroup-input"> -->
                                <span class="selectgroup-button" onclick=" changeCounter('add', 'youtube-video-brand')">+</span>
                              </label>
                              
                            </div>
                          </div>
                          <!-- first toggle -->
                          
                        </div>
                        
                       
                       <!-- <div class="form-group row">
                          <div class="col-md-4"></div>
                          <div class="col-lg-4 col-md-6">
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                              <label class="custom-control-label" for="agree">I agree with the terms and conditions</label>
                            </div>
                          </div>
                        </div> -->
                        <div class="form-group row">
                          <div class="col-md-4"></div>
                          <div class="col-lg-4 col-md-6 text-right">
                            <button type="submit" class="btn btn-icon icon-right btn-primary">Next <i class="fas fa-arrow-right"></i></button>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>

@endsection

@section('scripts')
  @parent
  <script src="{{ env('AWS_BASEURL_IMAGE').'brand-assets/modules/summernote/summernote-bs4.js' }}"></script>
  <script src="{{ env('AWS_BASEURL_IMAGE').'brand-assets/modules/codemirror/lib/codemirror.js' }}"></script>
  <script src="{{ env('AWS_BASEURL_IMAGE').'brand-assets/modules/codemirror/mode/javascript/javascript.js' }}"></script>
  <script src="{{ env('AWS_BASEURL_IMAGE').'brand-assets/modules/jquery-selectric/jquery.selectric.min.js' }}"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
  <script>
    $(document).ready(function() {
      // $('.datepicker').datepicker({
      //   autoclose: true,
      //   startDate: new Date(),
      // });
      changePlatform($('input[name="platform"]:checked').val());
    });

    function toggleCheckbox(id) {
      if($("#"+id).prop('checked') == true){
          //do something
          $("#"+id+"-num").show();
      }else{
        $("#"+id+"-num").hide();
      }
      return;
    }

    function changeCounter(type, id) {
      // body...
      var counter = parseInt($("#"+id+"-counter").val());
      // alert(counter);

      if(type == 'add'){
        counter = counter+1;
        $("#"+id+"-counter").val(counter);
        $("#"+id+"-counter-show").html(counter);
      }else if(type == 'minus'){
        if(counter > 1){
          counter = counter-1;
          $("#"+id+"-counter").val(counter);
          $("#"+id+"-counter-show").html(counter);
        }
      }
      return;
    }

    function changePlatform(id) {
       if(id == 'instagram'){
          //do something
          $("#"+id+"-div").show();
          $("#youtube-div").hide();
      }else{
          $("#"+id+"-div").show();
          $("#instagram-div").hide();
      }
      return;
    }

  </script>
@endsection

