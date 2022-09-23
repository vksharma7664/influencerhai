@extends('layouts.app')
 
@section('title', $title)

@section('css')
    @parent
    
@endsection
 
@section('content')
    <section class="blog-heading-text pt-20">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="blog-text">
                        <h1 class="h2 bg-light">{{ $category->name }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

   
    <!-- blog mesonry start here -->
    <div class="blog-mesonry-area section-bg-padding">
        <div class="container">
            <div class="row mesonry">
                @forelse($blogs as $blog)
                <div class="col-lg-4 col-sm-6 mesonry-item">
                    <a href="{{ route('blog.details', $blog->slug)}}">
                    <div class="single-mesonry single-blog radious-10 bg-white border-shadow">
                        <div class="single-blog-img radious-10">
                            <img src="{{env('AWS_BASEURL_IMAGE').$blog->image}}" alt="{{$blog->title}}">
                            <!-- <img src="{{asset(env('APP_FILE_URL').'uploads/blog/post/'.$blog->image)}}" alt="{{$blog->title}}"> -->
                        </div>
                        <div class="single-blog-content p-20 get-bottom animate">
                            <div class="blog-title">
                                <a href="{{ route('blog.details', $blog->slug)}}" class="pb-10 text-18"> {{$blog->title}}</a>
                            </div>
                            <p class="text-14">{{ date('d M Y', strtotime($blog->updated_at)) }}</p>
                        </div>
                    </div>
                    </a>
                </div>
                @empty
                <p>No Blogs !!!</p>
                @endforelse
            </div>
            <!-- add load more button here -->
            @include('front.include.load_more')
        </div>
    </div>
    <!-- blog mesonry end here -->
    <!-- {{$blogs->links()}} -->

    <!-- <div class="blog-navigation d-flex justify-content-center pb-50">
        <ul class="d-flex align-items-center get-bottom " style="opacity: 1; visibility: inherit; transform: translate(0px, 0px);">
            <li class="am-comon d-center"><i class="icofont-thin-right rotate-180 text-25 d-block"></i></li>
            <li class="am-comon d-center active">1</li>
            <li class="am-comon d-center">2</li>
            <li class="am-comon d-center">3</li>
            <li class="am-comon d-center">4</li>
            <li class="am-comon d-center"><i class="icofont-thin-right text-25"></i></li>
        </ul>
    </div> -->
@endsection

@section('scripts')
	@parent
	
@endsection