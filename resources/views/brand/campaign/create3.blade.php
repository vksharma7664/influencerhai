@extends('brand.layouts.app')
 

@section('css')
  @parent
    <!-- <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script> -->
  <link rel="stylesheet" href="{{ env('AWS_BASEURL_IMAGE').'brand-assets/modules/summernote/summernote-bs4.css' }}">
  <link rel="stylesheet" href="{{ env('AWS_BASEURL_IMAGE').'brand-assets/modules/codemirror/lib/codemirror.css' }}">
  <link rel="stylesheet" href="{{ env('AWS_BASEURL_IMAGE').'brand-assets/modules/codemirror/theme/duotone-dark.css' }}">
  <!-- <link rel="stylesheet" href="{{ env('AWS_BASEURL_IMAGE').'brand-assets/modules/jquery-selectric/selectric.css' }}"> -->
  <link rel="stylesheet" href="{{ env('AWS_BASEURL_IMAGE').'brand-assets/modules/select2/dist/css/select2.min.css' }}">
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
                          <div class="wizard-step ">
                            <div class="wizard-step-icon">
                              <i class="far fa-user"></i>
                            </div>
                            <div class="wizard-step-label">
                              Campaign Details
                            </div>
                          </div>
                          <div class="wizard-step">
                            <div class="wizard-step-icon">
                              <i class="fas fa-box-open"></i>
                            </div>
                            <div class="wizard-step-label">
                              Platform Details
                            </div>
                          </div>
                          <div class="wizard-step wizard-step-active">
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

                    <form class="wizard-content mt-2" method="POST" action="{{ route('brand.campaign.finalcreate')}}" id="form">
                      @csrf
                      <div class="wizard-pane">
                        <div class="form-group row">
                          <label class="col-md-4 text-md-right text-left mt-2">Category*</label>
                          <div class="col-lg-6 col-md-8">
                            <div class="selectgroup w-100">
                              <label class="selectgroup-item">
                                <div class="form-group">
                                  <!-- <label>jQuery Selectric Multiple</label> -->
                                  <select class="form-control select2"
                                  multiple="" name="influencer_categories[]">
                                    @foreach($categories as $cat)
                                    <option value="{{$cat->name}}">{{$cat->name}}</option>
                                    @endforeach
                                  </select>
                                </div>
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-4 text-md-right text-left mt-2">Location*</label>
                          <div class="col-lg-6 col-md-8">
                            <div class="selectgroup w-100">
                              <label class="selectgroup-item">
                                <div class="form-group">
                                    <!-- <label>jQuery Selectric Multiple</label> -->
                                    <select class="form-control select2" multiple="" name="influencer_locations[]">
                                      <option value="noida">Noida</option>
                                      <option value="delhi">Delhi</option>
                                      
                                    </select>
                                </div>
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-4 text-md-right text-left mt-2">Influencer Gender*</label>
                          <div class="col-lg-6 col-md-8">
                            <div class="selectgroup w-100">
                              <label class="selectgroup-item">
                                <input type="radio" name="influencer_gender" value="female" class="selectgroup-input" >
                                <span class="selectgroup-button">Female</span>
                              </label>
                              <label class="selectgroup-item">
                                <input type="radio" name="influencer_gender" value="male" class="selectgroup-input">
                                <span class="selectgroup-button">Male</span>
                              </label>
                              <label class="selectgroup-item">
                                <input type="radio" name="influencer_gender" value="any" class="selectgroup-input" checked="checked">
                                <span class="selectgroup-button">Any</span>
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-4 text-md-right text-left mt-2">Type of influencers*</label>
                          <div class="col-lg-6 col-md-8">
                            <div class="selectgroup w-100">
                              <label class="selectgroup-item">
                                <input type="checkbox" name="influencer_type[]" value="nano" class="selectgroup-input" checked="checked">
                                <span class="selectgroup-button">Nano (2K - 10K)</span>
                              </label>
                              <label class="selectgroup-item">
                                <input type="checkbox" name="influencer_type[]" value="micro" class="selectgroup-input">
                                <span class="selectgroup-button">Micro (10K - 50K)</span>
                              </label>
                              <label class="selectgroup-item">
                                <input type="checkbox" name="influencer_type[]" value="macro" class="selectgroup-input">
                                <span class="selectgroup-button">Macro (50K - 500K)</span>
                              </label>
                              </div>
                          </div>
                          <label class="col-md-4 text-md-right text-left mt-2"></label>
                          <div class="col-lg-6 col-md-8">
                            <div class="selectgroup w-100">
                              <label class="selectgroup-item">
                                <input type="checkbox" name="influencer_type[]" value="mega" class="selectgroup-input">
                                <span class="selectgroup-button">Mega (500K - 1M)</span>
                              </label>
                              <label class="selectgroup-item">
                                <input type="checkbox" name="influencer_type[]" value="celeb" class="selectgroup-input">
                                <span class="selectgroup-button">Celeb (1M+)</span>
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row align-items-center" id="link-html">
                          <label class="col-md-4 text-md-right text-left">Reference links</label>
                          <div class="col-lg-6 col-md-8">
                            <input type="text" name="reference_links[]" value="" class="form-control">
                            <input type="hidden" name="status" id="form-status" value="">
                          </div>
                          
                        </div>
                        <div class="form-group row align-items-center">
                          <label class="col-md-4 text-md-right text-left"><button onclick="addLink()" type="button" class="btn btn-xs">Add link</button></label>
                          <!-- <div class="col-lg-6 col-md-8 mt-2"> -->
                            <!-- <button class="btn btn-xs">Add link</button> -->
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
                        <div class="form-group row" id="buttons">
                          <div class="col-md-4"></div>
                          <div class="col-lg-4 col-md-6 text-right">
                            
                            <button type="button" value="save" class="btn btn-icon icon-right btn-primary" onclick="formSubmit('save')">Save <i class="fas fa-save"></i></button>
                            <button type="button" value="post" class="btn btn-icon icon-right btn-primary" onclick="formSubmit('post')">Post <i class="fas fa-envelope"></i></button>
                          </div>
                        </div>
                        <div class="form-group row" id="loading" style="display:none;" >
                          <div class="col-md-4"></div>
                          <div class="col-lg-4 col-md-6 text-right">
                            <div class="progress">
                              <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                            </div>
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
  <!-- <script src="{{ env('AWS_BASEURL_IMAGE').'brand-assets/modules/jquery-selectric/jquery.selectric.min.js' }}"></script> -->
  <script src="{{ env('AWS_BASEURL_IMAGE').'brand-assets/modules/select2/dist/js/select2.full.min.js' }}"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
  <script>
    $(document).ready(function() {
      // $('.datepicker').datepicker({
      //   autoclose: true,
      //   startDate: new Date(),
      // });
    });
    function addLink(){
      html = '<label class="col-md-4 text-md-right text-left mt-1"></label><div class="col-lg-6 col-md-8 mt-1">\
              <input type="text" name="reference_links[]" value="" class="form-control">\
            </div>';
      $("#link-html").append(html);
      return;
    }

    function formSubmit(status) {
      $("#form-status").val(status);
      $("#buttons").hide();
      $("#loading").show();
      $("#form").submit();
    }

  </script>
@endsection

