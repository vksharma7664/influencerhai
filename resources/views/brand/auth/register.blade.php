<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Register &mdash; Stisla</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ env('AWS_BASEURL_IMAGE').modules/bootstrap/css/bootstrap.min.css' }}">
  <link rel="stylesheet" href="{{ env('AWS_BASEURL_IMAGE').modules/fontawesome/css/all.min.css' }}">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ env('AWS_BASEURL_IMAGE').modules/jquery-selectric/selectric.css' }}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ env('AWS_BASEURL_IMAGE').css/style.css' }}">
  <link rel="stylesheet" href="{{ env('AWS_BASEURL_IMAGE').css/components.css' }}">


<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
              <!-- <img src="{{ env('AWS_BASEURL_IMAGE').img/stisla-fill.svg' }}" alt="logo" width="100" class="shadow-light rounded-circle"> -->
              <img src="{{ env('AWS_BASEURL_IMAGE').'front_assets/img/logo2.jpeg' }}" class="img-fluid" alt="Influencerhai.com's website logo.">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Register</h4></div>

              <div class="card-body">
                <form method="POST">
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="frist_name">First Name</label>
                      <input id="frist_name" type="text" class="form-control" name="frist_name" autofocus>
                    </div>
                    <div class="form-group col-6">
                      <label for="last_name">Last Name</label>
                      <input id="last_name" type="text" class="form-control" name="last_name">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email">
                    <div class="invalid-feedback">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="password" class="d-block">Password</label>
                      <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password">
                      <div id="pwindicator" class="pwindicator">
                        <div class="bar"></div>
                        <div class="label"></div>
                      </div>
                    </div>
                    <div class="form-group col-6">
                      <label for="password2" class="d-block">Password Confirmation</label>
                      <input id="password2" type="password" class="form-control" name="password-confirm">
                    </div>
                  </div>

                  <div class="form-divider">
                    Your Home
                  </div>
                  <div class="row">
                    <div class="form-group col-6">
                      <label>Country</label>
                      <select class="form-control selectric">
                        <option>Indonesia</option>
                        <option>Palestine</option>
                        <option>Syria</option>
                        <option>Malaysia</option>
                        <option>Thailand</option>
                      </select>
                    </div>
                    <div class="form-group col-6">
                      <label>Province</label>
                      <select class="form-control selectric">
                        <option>West Java</option>
                        <option>East Java</option>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-6">
                      <label>City</label>
                      <input type="text" class="form-control">
                    </div>
                    <div class="form-group col-6">
                      <label>Postal Code</label>
                      <input type="text" class="form-control">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                      <label class="custom-control-label" for="agree">I agree with the terms and conditions</label>
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Register
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="simple-footer">
              Copyright &copy; Stisla 2018
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="{{ env('AWS_BASEURL_IMAGE').modules/jquery.min.js' }}"></script>
  <script src="{{ env('AWS_BASEURL_IMAGE').modules/popper.js' }}"></script>
  <script src="{{ env('AWS_BASEURL_IMAGE').modules/tooltip.js' }}"></script>
  <script src="{{ env('AWS_BASEURL_IMAGE').modules/bootstrap/js/bootstrap.min.js' }}"></script>
  <script src="{{ env('AWS_BASEURL_IMAGE').modules/nicescroll/jquery.nicescroll.min.js' }}"></script>
  <script src="{{ env('AWS_BASEURL_IMAGE').modules/moment.min.js' }}"></script>
  <script src="{{ env('AWS_BASEURL_IMAGE').js/stisla.js' }}"></script>
  
  <!-- JS Libraies -->
  <script src="{{ env('AWS_BASEURL_IMAGE').modules/jquery-pwstrength/jquery.pwstrength.min.js' }}"></script>
  <script src="{{ env('AWS_BASEURL_IMAGE').modules/jquery-selectric/jquery.selectric.min.js' }}"></script>

  <!-- Page Specific JS File -->
  <script src="{{ env('AWS_BASEURL_IMAGE').js/page/auth-register.js' }}"></script>
  
  <!-- Template JS File -->
  <scr