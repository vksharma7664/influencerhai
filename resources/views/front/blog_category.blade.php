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

   
    <div class="container siderbar-search mt-30 get-bottom animate">
        <form method="GET" action="{{ route('blog.category', $category->slug) }}">
            <div class="subscribe-input d-flex align-items-center justify-content-between btn-radious">
                <div class="animation-form include-btn">
                    <span></span>
                    <input name="search" type="text" class="form-control" placeholder="enter your keywords" value="{{ $search }}">
                </div>
                <button type="submit" class="search-icon">
                    <i class="icofont-search"></i>
                </button>
            </div>
        </form>
    </div>

   
    <!-- blog mesonry start here -->
    <div class="blog-mesonry-area section-bg-padding" style="overflow-x: auto !important;">
        <div class="container">
            <div class="row mesonry">
                @php $i=0; @endphp
                @foreach($blogs as $blog)
                 @php $i=$i+1; @endphp
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
                @endforeach

            </div>
            <div class="row mesonry" id="data-wrapper">
            </div>
            <!-- add load more button here -->
            
        </div>
    </div>
    @if($i != 0)
  
    {{ $blogs->links() }}
    @else
    <div class="text-center">
        We don't have more data to display :(
    </div>
    @endif
@endsection

@section('scripts')
	@parent
	
@endsection