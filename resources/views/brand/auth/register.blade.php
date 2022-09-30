<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Brand Register &mdash; {{ env('APP_NAME') }}</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ env('AWS_BASEURL_IMAGE').'brand-assets/modules/bootstrap/css/bootstrap.min.css' }}">
  <link rel="stylesheet" href="{{ env('AWS_BASEURL_IMAGE').'brand-assets/modules/fontawesome/css/all.min.css' }}">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ env('AWS_BASEURL_IMAGE').'brand-assets/modules/bootstrap-social/bootstrap-social.css' }}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ env('AWS_BASEURL_IMAGE').'brand-assets/css/style.css' }}">
  <link rel="stylesheet" href="{{ env('AWS_BASEURL_IMAGE').'brand-assets/css/components.css' }}">

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
              <!-- <img src="{{ env('AWS_BASEURL_IMAGE').'img/stisla-fill.svg' }}" alt="logo" width="100" class="shadow-light rounded-circle"> -->
              <a href="{{ route('home')}}">
                <img src="{{ env('AWS_BASEURL_IMAGE').'front_assets/img/logo2.jpeg' }}" alt="logo" width="200"  class="shadow-light img-fluid" alt="Influencerhai.com's website logo.">
              </a>
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Register</h4></div>
              @if (Session::has('error'))
                  <span class="error text-center" style="color: red;">{{ Session::get('error') }}</span>
              @endif
              <div class="card-body">
                <form method="POST" action="{{ route('brand.register.submit') }}" autocomplete="off">
                   @csrf
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="name">Name</label>
                      <!-- @error('name')<b class="text-center text-red">{{$message}}</b>@enderror -->
                      @if ($errors->has('name'))
                          <span class="error" style="color: red;">{{ $errors->first('name') }}</span>
                      @endif
                      <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"  autofocus required>
                    </div>
                    <div class="form-group col-6">
                      <label for="designation">Designation</label>
                      @if ($errors->has('designation'))
                          <span class="error" style="color: red;">{{ $errors->first('designation') }}</span>
                      @endif
                      <input id="designation" type="text" class="form-control" value="{{ old('designation') }}" required name="designation">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="email">Company Email</label>
                       @if ($errors->has('email'))
                          <span class="error" style="color: red;">{{ $errors->first('email') }}</span>
                      @endif
                      <input id="email" type="email" value="{{ old('email') }}" required class="form-control" name="email">
                    </div>
                    <div class="form-group col-6">
                      <label for="mobile-id">Mobile</label>
                       @if ($errors->has('mobile'))
                          <span class="error" style="color: red;">{{ $errors->first('mobile') }}</span>
                      @endif
                      <input id="mobile-id" type="text" class="form-control" name="mobile" value="{{ old('mobile') }}" required>
                    </div>
                  </div>
                    
                  <div class="row">
                    <div class="form-group col-12">
                      <label for="company_name">Company Name</label>
                       @if ($errors->has('company_name'))
                          <span class="error" style="color: red;">{{ $errors->first('company_name') }}</span>
                      @endif
                      <input id="company_name" type="text" class="form-control" name="company_name" value="{{ old('company_name') }}" required>
                    </div>
                  </div>


                  <div class="row">
                    
                    
                    <div class="form-group col-6">
                      <label for="company_url">Company Website</label>
                       @if ($errors->has('company_url'))
                          <span class="error" style="color: red;">{{ $errors->first('company_url') }}</span>
                      @endif
                      <input id="company_url" type="company_url" value="{{ old('company_url') }}" required class="form-control" name="company_url" >
                    </div>

                    <div class="form-group col-6">
                      <label for="industry">Industry</label>
                       @if ($errors->has('industry'))
                          <span class="error" style="color: red;">{{ $errors->first('industry') }}</span>
                      @endif
                      <select id="industry" class="form-control" name="industry" autofocus>
                        <option value="">Select</option>
                        <option value="it">IT</option>
                        <option value="automobile">Automobile</option>
                        <option value="fashion">Fashion</option>
                      </select>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="password" class="d-block">Password</label>
                      @if ($errors->has('password'))
                          <span class="error" style="color: red;">{{ $errors->first('password') }}</span>
                      @endif
                      <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password">
                      <div id="pwindicator" class="pwindicator">
                        <div class="bar"></div>
                        <div class="label"></div>
                      </div>
                    </div>
                    <div class="form-group col-6">
                      @if ($errors->has('password_confirmation'))
                          <span class="error" style="color: red;">{{ $errors->first('password_confirmation') }}</span>
                      @endif
                      <label for="password2" class="d-block">Password Confirmation</label>
                      <input id="password2" type="password" class="form-control" name="password_confirmation">
                    </div>
                  </div>

                  <!-- <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                      <label class="custom-control-label" for="agree">I agree with the terms and conditions</label>
                    </div>
                  </div> -->

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Register
                    </button>
                  </div>
                </form>
              </div>
            </div>
           
          </div>
        </div>
      </div>
    </section>
  </div>

  

  <!-- General JS Scripts -->
  <script src="{{ env('AWS_BASEURL_IMAGE').'brand-assets/modules/jquery.min.js' }}"></script>
  <script src="{{ env('AWS_BASEURL_IMAGE').'brand-assets/modules/popper.js' }}"></script>
  <script src="{{ env('AWS_BASEURL_IMAGE').'brand-assets/modules/tooltip.js' }}"></script>
  <script src="{{ env('AWS_BASEURL_IMAGE').'brand-assets/modules/bootstrap/js/bootstrap.min.js' }}"></script>
  <script src="{{ env('AWS_BASEURL_IMAGE').'brand-assets/modules/nicescroll/jquery.nicescroll.min.js' }}"></script>
  <script src="{{ env('AWS_BASEURL_IMAGE').'brand-assets/modules/moment.min.js' }}"></script>
  <script src="{{ env('AWS_BASEURL_IMAGE').'brand-assets/js/stisla.js' }}"></script>
  
  <!-- JS Libraies -->

  <script>
    
    $(document).ready(function () {
      //called when key is pressed in textbox
      $("#mobile-id").keypress(function (e) {
         //if the letter is not digit then display error and don't type anything
         if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            //display error message
            // $("#errmsg").html("Digits Only").show().fadeOut("slow");
                   return false;
        }
       });
    });

  </script>

  <!-- Template JS File -->
  <script src="{{ env('AWS_BASEURL_IMAGE').'brand-assets/js/scripts.js' }}"></script>
  <script src="{{ env('AWS_BASEURL_IMAGE').'brand-assets/js/custom.js' }}"></script>
</body>
</html>