@extends('layouts.app')
 
@section('title', $title)

@section('css')
    @parent
    
@endsection
 
@section('content')
<section class="blog-list-area section-bg-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog-single-content get-bottom animate">
                        <div class="animate">
                            <span ><h1 class="animate">{{ $blog->title}}</h1></span>
                            <img src="{{env('AWS_BASEURL_IMAGE').$blog->image}}" alt="{{$blog->title}}">
                            
                        </div>
                        <ul class="inline-with-icon get-bottom animate">
                            <li class="animate"><a href="#"><span><i class="icofont-calendar"></i></span>{{ date('F d, Y', strtotime($blog->updated_at)) }}</a></li>
                        </ul>
                        
                        {!! $blog->long_desc  !!}
                    </div>
                   
                    
                </div>
                <div class="col-lg-4 mt-md-50">
                    <div class="blog-list-sidebar">
                        
                        <div class="recent-post px-30 py-35 bdr-10 mb-50 mb-md-30 get-bottom animate">
                            <div class="card-title animate">
                                <h3 class="pb-20">Recent post</h3>
                            </div>
                            @foreach($recent_blogs as $one)
                            <div class="resent-post-single d-flex align-items-center animate">
                                <a href="{{ route('blog.details', $one->slug)}}" class="recent-post-img">
                                    <img class="bdr-6" src="{{env('AWS_BASEURL_IMAGE').$one->image}}" alt="{{$one->title}}" >
                                    <!-- <img class="bdr-6" src="{{asset(env('APP_FILE_URL').'uploads/blog/post/'.$one->image)}}" alt=""> -->
                                </a>
                                
                            </div>
                            <div class="recent-post-cont pb-25 post-title ">
                                    <h4><a href="{{ route('blog.details', $one->slug)}}">{{ substr($one->title,0,70) }}...</a></h4>
                            </div>
                            @endforeach
                            
                        </div> 
                        <div class="sbar-category-area px-30 py-35 bdr-10 mb-50 mb-md-30 get-bottom animate">
                            <div class="card-title animate">
                                <h3 class="pb-30">Category</h3>
                            </div>
                            <ul class="get-bottom animate">
                                @foreach($categories as $cat)
                                <li class="animate"><a href="{{ route('blog.category', $cat->slug) }}">{{$cat->name}}</a></li>
                                @endforeach
                              
                            </ul>
                        </div>                 
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
	@parent
	
@endsection