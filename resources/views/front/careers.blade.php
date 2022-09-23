<?php $title="India's Best Emerging Influencer Marketing Agency";?>

@extends('layouts.app')
 
@section('title', $title)

@section('css')
    @parent
    

@endsection
 
@section('content')
   <section class="career-list">
        <div class="container">
            <div class="row">
                <div class="col-md-12 pt-30 pb-50"> 
                    <div class="career-list-text text-center">
                        <h1 class="h2  bg-light">Career - Job Opportunities In India's Emerging Influencer Marketing Agency</h1>
                    </div>
                </div>
            </div>
            <div class="row pb-100 pt-50 mobile-respo">
                @forelse ($career_jobs as $job)
                <div class="col-md-6 space-mobile-devic">
                    <div class="content-career-box">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="{{ env('AWS_BASEURL_IMAGE').$job->image }}" class="img-fluid" alt="">
                            </div>
                            <div class="col-md-6">
                                <div class="career-all-content">
                                <div class="content-box-caree pt-2">
                                    <h6>{{ strtoupper($job->title) }}</h6>
                                    <p>{{ substr($job->short_desc, 0, 50)  }}...</p>
                                </div>
                                 <div class="exprence-text  pt-3">
                                    <h6>Experience:  <span class="year-span">{{ $job->experience }}</span></h6>
                                 </div>
                                 <div class="exprence-text  pt-3">
                                    <h6>Location:  <span class="year-span">{{ $job->location }}</span></h6>
                                 </div>

                                 <div class="btn-carrer-devel text-center pt-4">
                                    <a href="{{ route('careers.apply', [\Illuminate\Support\Str::slug(strtolower($job->title) , '-'),$job->id]) }}" class="btn btn-sm btn-light-red br-6 btn-shatter-white btn-animate">Apply Now</a>
                                 </div>
                                 </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                NO JOBS AVAILABLE
                @endforelse
               
            </div>
        </div>
    </section>

<!-- add team here -->
@include('front.include.team')

@endsection

@section('scripts')
	@parent
	
@endsection