@extends('layouts.app')
 
@section('css')
    @parent
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
@endsection

@section('head-scripts')
@parent
   
@endsection


 
@section('content')
     <section class="bg-image" style="background-image: url({{ asset('brand-assets/img/login.svg') }});">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100 pb-5 pt-5">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 8px;">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-primary text-center mb-4">Sign Up for Brands</h2>
                                <!-- <p class="text-center m4-5">Join InfluencerHai Today !</p> -->
                                 @if (Session::has('error'))
                                    <p class="text-center">
                                      <span class="error text-center" style="color: red;">{{ Session::get('error') }}</span>
                                    </p>
                                  @endif

                                <form method="POST" action="{{ route('brand.register.submit') }}" autocomplete="off">
                                    @csrf

                                    <div class="form-outline mb-4">
                                        <input type="text" id="form3Example1cg" class="form-control form-control-lg"
                                            placeholder="Full Name" name="name" value="{{ old('name') }}"  required />
                                        @if ($errors->has('name'))
                                          <span class="error" style="color: red;">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="text" id="form3Example3cg" class="form-control form-control-lg"
                                            placeholder="Designation" name="designation" value="{{ old('designation') }}"  required/>
                                        @if ($errors->has('designation'))
                                          <span class="error" style="color: red;">{{ $errors->first('designation') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="email" id="form3Example4cg" class="form-control form-control-lg"
                                            placeholder="Email Address" name="email" value="{{ old('email') }}"  required/>
                                        @if ($errors->has('email'))
                                          <span class="error" style="color: red;">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="text" id="form3Example4cg" class="form-control form-control-lg"
                                            placeholder="Mobile" name="mobile" value="{{ old('mobile') }}"  required/>
                                            @if ($errors->has('mobile'))
                                          <span class="error" style="color: red;">{{ $errors->first('mobile') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="text" id="form3Example4cg" class="form-control form-control-lg"
                                            placeholder="Company Name" name="company_name" value="{{ old('company_name') }}"  required/>
                                        @if ($errors->has('company_name'))
                                          <span class="error" style="color: red;">{{ $errors->first('company_name') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="text" id="form3Example4cg" class="form-control form-control-lg"
                                            placeholder="Company Website" name="company_url" value="{{ old('company_url') }}"  required/>
                                        @if ($errors->has('company_url'))
                                          <span class="error" style="color: red;">{{ $errors->first('company_url') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-outline mb-4" style="padding-bottom: 50px;">
                                        <select id="form3Example4cg" class="form-control form-control-lg" name="industry"  required>
                                           <!-- <option value="">Select</option> -->
                                           <option value="Advertising/Marketing/Branding/PR"> Advertising/Marketing/Branding/PR </option>
                                            <option value="Automobile"> Automobile </option>
                                            <option value="Banking"> Banking/Finance </option>
                                            <option value="Cosmetic"> Cosmetic/Personal Care </option>
                                            <option value="Events"> Events/Movies </option>
                                            <option value="Fashion"> Fashion </option>
                                            <option value="Financial Institution"> Financial Institution/Investment Bank </option>
                                            <option value="Fitness"> Fitness </option>
                                            <option value="FMCG"> FMCG </option>
                                            <option value="Food"> Food/Beverage </option>
                                            <option value="Gaming"> Gaming </option>
                                            <option value="Health"> Health (Vitamin/Mineral/Herb/Supplements) </option>
                                            <option value="IT"> IT </option>
                                            <option value="Manufacturer"> Manufacturer </option>
                                            <option value="Market Research"> Market Research </option>
                                            <option value="Mass Media"> Mass Media (Newspapers, TV, Radio, <option value="Magazines, etc.) </option>
                                            <option value="Natural Living/Home/Textile"> Natural Living/Home/Textile </option>
                                            <option value="Nutraceuticals"> Nutraceuticals </option>
                                            <option value="Online Fantasy Gaming"> Online Fantasy Gaming </option>
                                            <option value="Packaging"> Packaging/Design </option>
                                            <option value="Pharmaceuticals"> Pharmaceuticals </option>
                                            <option value="Retail"> Retail </option>
                                            <option value="School"> School/University </option>
                                            <option value="Services"> Services </option>
                                            <option value="Sports"> Sports </option>
                                        </select>
                                        @if ($errors->has('industry'))
                                          <span class="error" style="color: red;">{{ $errors->first('industry') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="password" id="form3Example4cg" class="form-control form-control-lg"
                                            placeholder="Passsword" name="password" value="{{ old('password') }}"  required/>
                                            @if ($errors->has('password'))
                                          <span class="error" style="color: red;">{{ $errors->first('password') }}</span>
                                        @endif

                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="password" id="form3Example4cg" class="form-control form-control-lg"
                                            placeholder="Confirm Passsword" name="password_confirmation" value="{{ old('password_confirmation') }}"  required/>
                                            @if ($errors->has('password_confirmation'))
                                              <span class="error" style="color: red;">{{ $errors->first('password_confirmation') }}</span>
                                          @endif
                                    </div>

                                   <!--  <div class="form-check d-flex  mb-5">
                                        <input class="form-check-input me-2" type="checkbox" value=""
                                            id="form2Example3cg" />
                                        <label class="form-check-label" for="form2Example3g">
                                            I agree to the<a href="#!" class="text-primary">Terms &
                                                    Conditions</a> and <a href="#!" class="text-primary">Privacy
                                                    Policy</a>
                                        </label>
                                    </div> -->

                                    <div class="d-flex justify-content-center">
                                        <button type="submit"
                                            class="btn btn-primary btn-block btn-lg gradient-custom-4 text-white">SIGN
                                            UP</button>
                                    </div>

                                    <p class="text-center text-muted mt-5 mb-0">Already have an account? <a href="{{ route('brand.login') }}"
                                            class="fw-bold text-primary">Login here</a></p>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
