@foreach($blogs as $blog)
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