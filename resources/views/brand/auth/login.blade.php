@extends('layouts.app')
 
@section('css')
    @parent
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
@endsection

@section('head-scripts')
@parent
   
@endsection


 
@section('content')
     <section class=" bg-image" style="background-image: url({{ asset('brand-assets/img/login.svg') }});">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3 ">
            <div class="container h-150 ">
                <div class="row d-flex justify-content-center align-items-center h-100 pb-5 pt-5">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6 ">
                        <div class="card" style="border-radius: 8px;">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-primary text-center mb-4">Sign in for Brands</h2>
                                <p class="text-center m4-5">Hello Again ! We were Missing You</p>
                                @if (Session::has('error'))
                                    <p class="text-center">
                                      <span class="error text-center" style="color: red;">{{ Session::get('error') }}</span>
                                    </p>
                                  @endif
                                @if ($errors->has('email'))
                                    <p class="text-center">
                                        <span class="error text-center" style="color: red;">{{ $errors->first('email') }}</span>
                                    </p>
                                @endif
                                @if ($errors->has('password'))
                                    <p class="text-center">
                                        <span class="error text-center" style="color: red;">{{ $errors->first('password') }}</span>
                                    </p>
                                @endif
                                <form method="POST" action="{{ route('login') }}" >
                                     @csrf
                                    <div class="form-outline mb-4">
                                        <input type="email" name="email" id="form3Example1cg" class="form-control form-control-lg"
                                            placeholder="Email" />
                                    </div>


                                    <div class="form-outline mb-4">
                                        <input type="password" id="form3Example4cg" class="form-control form-control-lg" name="password" 
                                            placeholder="Passsword" />

                                    </div>

                                    <div class="text text-primary ">
                                        <p> <a href="#!" class=" fw-bold text-primary"> Forgot Password ?</a></p>
                                        
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button type="submit"
                                            class="btn btn-primary btn-block btn-lg gradient-custom-4 text-white">Login
                                        </button>
                                    </div>

                                    <p class="text-center text-muted mt-5 mb-0">New on Our Platform ? <a href="{{ route('brand.register') }}"
                                            class="fw-bold text-primary">Sign Up</a></p>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
