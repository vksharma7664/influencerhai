<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Brand Login &mdash; {{ env('APP_NAME') }}</title>

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
      <div class="container mt-1">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <!-- <img src="{{ env('AWS_BASEURL_IMAGE').'brand-assets/img/stisla-fill.svg' }}" alt="logo" width="100" class="shadow-light rounded-circle"> -->
              <a href="{{ route('home')}}">
              <img src="{{ env('AWS_BASEURL_IMAGE').'front_assets/img/logo2.jpeg' }}" alt="logo" width="200"  class="shadow-light img-fluid" alt="Influencerhai.com's website logo.">
              </a>
              
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Login</h4></div>
                @if ($errors->has('email'))
                    <span class="error text-center" style="color: red;">{{ $errors->first('email') }}</span>
                @endif
               @if ($errors->has('password'))
                  <span class="error text-center" style="color: red;">{{ $errors->first('password') }}</span>
                @endif
              <div class="card-body">
                <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="">
                  @csrf
                  <div class="form-group">
                    <label for="email">Email</label>
                    
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required >
                    <div class="invalid-feedback">
                      Please fill in your email
                    </div>

                  </div>

                  <div class="form-group">
                    <div class="d-block">
                    	<label for="password" class="control-label">Password</label>
                     
                      <div class="float-right">
                        <a href="auth-forgot-password.html" class="text-small">
                          Forgot Password?
                        </a>
                      </div>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                      please fill in your password
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                      <label class="custom-control-label" for="remember-me">Remember Me</label>
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>
                <!-- <div class="text-center mt-4 mb-3">
                  <div class="text-job text-muted">Login With Social</div>
                </div>
                <div class="row sm-gutters">
                  <div class="col-6">
                    <a class="btn btn-block btn-social btn-facebook">
                      <span class="fab fa-facebook"></span> Facebook
                    </a>
                  </div>
                  <div class="col-6">
                    <a class="btn btn-block btn-social btn-twitter">
                      <span class="fab fa-twitter"></span> Twitter
                    </a>                                
                  </div>
                </div> -->

              </div>
            </div>
            <div class="mt-2 text-muted text-center">
              Don't have an account? <a href="{{ route('brand.register')}}">Register</a>
            </div>
            <div class="simple-footer">
              <!-- Copyright &copy; Stisla 2018 -->
              COPYRIGHT &copy; 2022 | ALL RIGHTS RESERVED BY TECHISTIC ONLINE PLATFORM PVT LTD 
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

  <!-- Template JS File -->
  <script src="{{ env('AWS_BASEURL_IMAGE').'brand-assets/js/scripts.js' }}"></script>
  <script src="{{ env('AWS_BASEURL_IMAGE').'brand-assets/js/custom.js' }}"></script>
</body>
</html>