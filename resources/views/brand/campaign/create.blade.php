@extends('brand.layouts.app')
 

@section('css')
  @parent
    <!-- <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script> -->
  <link rel="stylesheet" href="{{ env('AWS_BASEURL_IMAGE').'brand-assets/modules/summernote/summernote-bs4.css' }}">
  <link rel="stylesheet" href="{{ env('AWS_BASEURL_IMAGE').'brand-assets/modules/codemirror/lib/codemirror.css' }}">
  <link rel="stylesheet" href="{{ env('AWS_BASEURL_IMAGE').'brand-assets/modules/codemirror/theme/duotone-dark.css' }}">
  <link rel="stylesheet" href="{{ env('AWS_BASEURL_IMAGE').'brand-assets/modules/jquery-selectric/selectric.css' }}">
  <!-- <link rel="stylesheet" href="{{ env('AWS_BASEURL_IMAGE').'brand-assets/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css' }}"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


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
                          <div class="wizard-step wizard-step-active">
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

                    <form class="wizard-content mt-2" method="POST" action="{{ route('brand.campaign.create2')}}">
                      @csrf
                      <div class="wizard-pane">
                        <div class="form-group row">
                          <label class="col-md-4 text-md-right text-left mt-2">Campaign Type</label>
                          <div class="col-lg-6 col-md-8">
                            <div class="selectgroup w-100">
                              <label class="selectgroup-item">
                                <input type="radio" name="campaign_type" value="drive_awareness" class="selectgroup-input" checked="checked">
                                <span class="selectgroup-button">Drive Awareness (Reach)</span>
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-4 text-md-right text-left mt-2">Payment Type</label>
                          <div class="col-lg-6 col-md-8">
                            <div class="selectgroup w-100">
                              <label class="selectgroup-item">
                                <input type="radio" name="payment_type" value="paid" class="selectgroup-input" checked="checked">
                                <span class="selectgroup-button">Paid</span>
                              </label>
                              <label class="selectgroup-item">
                                <input type="radio" name="payment_type" value="both" class="selectgroup-input">
                                <span class="selectgroup-button">Paid + Barter</span>
                              </label>
                              <label class="selectgroup-item">
                                <input type="radio" name="payment_type" value="barter" class="selectgroup-input">
                                <span class="selectgroup-button">Barter</span>
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row align-items-center">
                          <label class="col-md-4 text-md-right text-left">Title of the campaign*</label>
                          <div class="col-lg-6 col-md-8">
                            <input type="text" name="title" value="" class="form-control" required>
                          </div>
                        </div>
                        <div class="form-group row align-items-center">
                          <label class="col-md-4 text-md-right text-left">Add campaign hashtag</label>
                          <div class="col-lg-6 col-md-8">
                            <input type="text" name="hastags" value="" class="form-control">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-4 text-md-right text-left mt-2">Campaign Description*</label>
                          <div class="col-lg-6 col-md-8">
                            <textarea class="summernote-simple" name="description" required></textarea>
                          </div>
                              
                        </div>
                        <div class="form-group row align-items-center">
                          <label class="col-md-4 text-md-right text-left">Proposal Deadline*</label>
                          <div class="input-group col-lg-6 col-md-8">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <i class="fas fa-calendar"></i>
                                </div>
                              </div>
                              <input type="text" name="deadline" value="" class="form-control datepicker" required>
                          </div>
                          <!-- <div class="col-lg-6 col-md-8">
                            

                          </div> -->
                        </div>
                        <div class="form-group row align-items-center">
                          <label class="col-md-4 text-md-right text-left">Expected go live*</label>
                          <div class="input-group col-lg-6 col-md-8">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                  <i class="fas fa-calendar"></i>
                                </div>
                              </div>
                              <input type="text" name="live_date" value="" class="form-control datepicker" required>
                          </div>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    $(document).ready(function() {
      $('.datepicker').datepicker({
        autoclose: true,
        startDate: new Date(),
      });
    });

  </script>
@endsection

