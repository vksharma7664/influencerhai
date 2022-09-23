@extends('layouts.app')
 
@section('title', $title)

@section('css')
    @parent
    

@endsection
 
@section('content')
   <!-- Features Start -->
    <div class="section features-section-3 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center mt-5">
                    <div class="career-heading content-spac mt-5">
                        <h1 class="h1 bg-light">Job Opportunity</h1>
                        <br />
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="career-heading mt-5">
                        <h2 class="h2">Applying For :&nbsp;{{ ucfirst(strtolower($job->title)) }}.</h2>
                        <!--<h2 class="h2">{{ ucfirst($job->title) }}</h2>-->
                        <p class="mt-3 content-spac">{{ $job->short_desc}}</p>
                    </div>
                    
                </div>
                <div class="col-md-12">
                    <div class="career-heading content-spac text-center mt-5 mb-5">
                        <h2 class ="h2">Please fill your details...</h2>

                    </div>
                </div>
            </div>

            <form action="{{ route('careers.apply.store',$job->id) }}" method="post" class="wpcf7-form init box-wrap-form" novalidate="novalidate" enctype="multipart/form-data">
                 @csrf 
                <div class="row">
                    <div class="form-data col-md-12">
                        

                            <div class="row">
                                <div class="col-md-6 form-sec">
                                    <span class="field-text text-left">Full Name*</span>@error('name')<span class="text-center text-red" style="color:red !important;">{{$message}}</span>@enderror<br>
                                    <span class="form-control-wrap" data-name="name"><input type="text" name="name" value="" size="40" class="input-contorls" aria-required="true" aria-invalid="false"></span>
                                </div>
                                <div class="col-md-6 form-sec col-last">
                                    <span class="field-text">Email Id*</span> @error('email')<span class="text-center text-red" style="color:red !important;">{{$message}}</span>@enderror<br>
                                    <span class="form-control-wrap" data-name="email"><input type="email" name="email" value="" size="40" class="input-contorls" aria-required="true" aria-invalid="false"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-sec">
                                    <span class="field-text">Contact Number*</span>@error('number')<span class="text-center text-red" style="color:red !important;">{{$message}}</span>@enderror<br>
                                    <span class="form-control-wrap" data-name="number"><input type="number" name="number" value="" size="40" class="input-contorls" aria-required="true" aria-invalid="false"></span>
                                </div>
                                <div class="col-md-6 form-sec col-last form-sec">
                                    <span class="field-text">Education Qualification*</span>@error('qualification')<span class="text-center text-red" style="color:red !important;">{{$message}}</span>@enderror<br>
                                    <span class="form-control-wrap" data-name="qualification"><input type="text" name="qualification" value="" size="40" class="input-contorls" aria-required="true" aria-invalid="false"></span>
                                </div>
                            </div>


                            <div class="row form-sec">
                                <div class="col-md-6 form-sec">
                                    <span class="field-text">Experience if Any</span><br>
                                    <span class="form-control-wrap" data-name="experience"><input type="text" name="experience" value="" size="40" class="input-contorls" id="insta-name" placeholder="1-2 years" aria-invalid="false"></span>
                                </div>
                                <div class="col-md-6 form-sec">
                                    <span class="field-text">The Position you are Applying for*</span>@error('position')<span class="text-center text-red" style="color:red !important;">{{$message}}</span>@enderror<br>
                                    <span class="form-control-wrap" data-name="position">
                                        <select name="position" class="input-contorls" aria-required="true" aria-invalid="false">
                                            
                                            <option value="Select Position">Select Position</option><option value="Influencer Marketing intern">Influencer Marketing intern</option><option value="Social Media Marketing intern">Social Media Marketing intern</option><option value="Influencer Marketing Executive">Influencer Marketing Executive</option><option value="Business Development intern">Business Development intern</option><option value="Business Development Executive">Business Development Executive</option><option value="Data intern">Data intern</option><option value="Celebrity and PR Manager">Celebrity and PR Manager</option><option value="HR intern">HR intern</option><option value="HR Executive">HR Executive</option><option value="Content Writer">Content Writer</option>
                                        </select>
                                    </span>
                                </div>
                            </div>

                            <div class="row mt-3" id="instagram" >

                                <div class="col-md-6 mob-space">
                                    <span class="field-text">Resume* (Doc,Pdf)</span>
                                    @error('resume')<span class="text-center text-red" style="color:red !important;">{{$message}}</span>@enderror<br>
                                    <span class="form-control-wrap" data-name="resume">
                                     <input type="file" name="resume" class="input-contorl">
                                    </span>
                                </div>
                                

                            </div>


                            <div class="row">
                                <div class="col-md-12 form-sec">
                                    <span class="field-text">Why should we hire you ?*</span>
                                    @error('reason_to_hire')<span class="text-center text-red" style="color:red !important;">{{$message}}</span>@enderror<br>
                                    <span class="form-control-wrap" >
                                     <textarea class="input-contorl001" name="reason_to_hire" id="" cols="30" rows="10"></textarea>
                                 </span>
                                </div>
                            </div>

                    </div>
                </div>
                <div class="btn-section bottom-space">
                    <input type="submit" value="Submit" class="btn btn-sm btn-light-red br-6 btn-shatter-white btn-animate"><span class="wpcf7-spinner"></span>
                </div>
                
            </form>
        </div> 
    </div>
@endsection

@section('scripts')
	@parent
	
@endsection