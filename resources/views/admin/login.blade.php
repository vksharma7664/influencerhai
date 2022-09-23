<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Welcome To Influencer Hai Secure Login</title>

    <!-- GLOBAL STYLES -->
    <link href="{{ asset('admin-asset/css/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700,300italic,400italic,500italic,700italic' rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel="stylesheet" type="text/css">
    <link href="{{ asset('admin-asset/icons/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

    <!-- PAGE LEVEL PLUGIN STYLES -->

    <!-- THEME STYLES -->
    <link href="{{ asset('admin-asset/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-asset/css/plugins.css') }}" rel="stylesheet">

    <!-- THEME DEMO STYLES -->
    <link href="{{ asset('admin-asset/css/demo.css') }}" rel="stylesheet">

</head>

<body class="login">

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="login-banner text-center">
                    <h1>Influencer Hai </h1>
                </div>
                <div class="portlet portlet-green">
                    <div class="portlet-heading login-heading">
                        <div class="portlet-title">
                            <h4><strong>Login to Influencer Hai  Admin!</strong>
                            </h4>
                        </div>
                        
                        <div class="clearfix"></div>
                    </div>
                    <div class="portlet-body">
                        <!-- <form action="{{env('WEB_SITE_ADMIN_BASE_url')}}login_submit" method="post" accept-charset="UTF-8" role="form">
                            {{@csrf_field()}}
                            <fieldset>
                               <p class='text-center text-red'> {{session('msg')}}</p>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="text" requried>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" requried>
                                </div>
                                <div class="form-group text-center">
                                    <input type="submit" name="btn_user_login" value="Submit"  class="btn btn-green">
                                </div>
                            </fieldset>
                        </form> -->

                        <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <br>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                      
                        <div class="row mb-0">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- GLOBAL SCRIPTS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js') }}') }}"></script>
    <script src="{{ asset('admin-asset/js/plugins/bootstrap/bootstrap.min.js') }}') }}"></script>
    <script src="{{ asset('admin-asset/js/plugins/slimscroll/jquery.slimscroll.min.js') }}') }}"></script>
    <!-- HISRC Retina Images -->
    <script src="{{ asset('admin-asset/js/plugins/hisrc/hisrc.js') }}') }}"></script>

    <!-- PAGE LEVEL PLUGIN SCRIPTS -->

    <!-- THEME SCRIPTS -->
    <script src="{{ asset('admin-asset/js/flex.js') }}') }}"></script>

</body>

</html>
