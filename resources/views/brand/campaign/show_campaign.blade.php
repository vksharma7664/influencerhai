@extends('brand.layouts.app')
 

@section('css')
  @parent
  <style>

  	.label{
  		margin-bottom: 0rem
  	}
  	
  	.no-bullets {
	  list-style-type: none; /* Remove bullets */
	}

	.no-bullets>li {
	  margin-bottom: none; /* Remove bullets */
	}

  </style>

@endsection


 
@section('content')
 <div class="main-content">
        <section class="section">
           <div class="section-header">
            <h1>{{ ucwords(auth::user()->company_name) }}</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('brand.dashboard')}}">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="{{ route('brand.campaign.list')}}">Campaign</a></div>
              <div class="breadcrumb-item">List</div>
            </div>
          </div>
          <div class="section-body">
            <h2 class="section-title">{{ $campaign->title }}</h2>
            <h6>Description:</h6>
            <div class="row">
              	<div class="col-10 col-md-10 col-lg-10">
		            <p class="section-lead">
		              {!! $campaign->description !!}
		            </p>
		        </div>
		    </div>

            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-5">
                <div class="card">
                    <div class="card-header">
                      <h4><u>Influencer Details</u></h4>
                    </div>
                    <div class="card-body" style="padding-top: 0px;">
                        <div class="row">                               
                          <div class="form-group col-md-6 col-12">
                            <label class="label">Gender</label>
                            <ul class="no-bullets">
                            	<li>{{ $campaign->influencer_gender}}</li>
                            </ul>
                          </div>
                        </div>

                        <div class="row">                               
                          <div class="form-group col-md-6 col-12">
                            <label class="label">Type</label>
                            <ul class="no-bullets">
                            	@foreach($campaign->types as $type)
                            	<li>{{ $type->type }}</li>
                            	@endforeach
                            </ul>
                          </div>
                        </div>

                        <div class="row">                               
                          <div class="form-group col-md-6 col-12">
                            <label class="label">Category</label>
                            <ul class="no-bullets">
                            	@foreach($campaign->categories as $cat)
                            	<li>{{ $cat->category }}</li>
                            	@endforeach
                            </ul>
                          </div>
                        </div>

                        <div class="row">                               
                          <div class="form-group col-md-6 col-12">
                            <label class="label">Location</label>
                            <ul class="no-bullets">
                            	@foreach($campaign->locations as $loc)
                            	<li>{{ $loc->location }}</li>
                            	@endforeach
                            </ul>
                          </div>
                        </div>
                        
                    </div>
                    <!-- <div class="card-footer text-right">
                      <button class="btn btn-primary">Save Changes</button>
                    </div> -->
                </div>
              </div>
              <div class="col-12 col-md-12 col-lg-7">
                <div class="card">
                  <form method="post" class="needs-validation" novalidate="">
                    <div class="card-header">
                      <h4>Edit Profile</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">                               
                          <div class="form-group col-md-6 col-12">
                            <label>First Name</label>
                            <input type="text" class="form-control" value="Ujang" required="">
                            <div class="invalid-feedback">
                              Please fill in the first name
                            </div>
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label>Last Name</label>
                            <input type="text" class="form-control" value="Maman" required="">
                            <div class="invalid-feedback">
                              Please fill in the last name
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-7 col-12">
                            <label>Email</label>
                            <input type="email" class="form-control" value="ujang@maman.com" required="">
                            <div class="invalid-feedback">
                              Please fill in the email
                            </div>
                          </div>
                          <div class="form-group col-md-5 col-12">
                            <label>Phone</label>
                            <input type="tel" class="form-control" value="">
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-12">
                            <label>Bio</label>
                            <textarea class="form-control summernote-simple">Ujang maman is a superhero name in <b>Indonesia</b>, especially in my family. He is not a fictional character but an original hero in my family, a hero for his children and for his wife. So, I use the name as a user in this template. Not a tribute, I'm just bored with <b>'John Doe'</b>.</textarea>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group mb-0 col-12">
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" name="remember" class="custom-control-input" id="newsletter">
                              <label class="custom-control-label" for="newsletter">Subscribe to newsletter</label>
                              <div class="text-muted form-text">
                                You will get new information about products, offers and promotions
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                      <button class="btn btn-primary">Save Changes</button>
                    </div>
                  </form>
                </div>
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

