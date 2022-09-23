@foreach($influencers as $influ)
<div class="col-lg-3 col-md-6 col-sm-12 pt-30">
	<div class="photographic-box-card">
		<div class="row photography-card d-flex">
            <div class="col-md-2 col-4 small-photography-image">
            @foreach($influ->platforms as $platform)
           @php
           $channel_link = $platform->pivot->channel_link ?? '';
           @endphp
            @if( $channel_link != '')
            
			
                <a href="{{$channel_link}}" target="_blank">
					<img src="{{env('AWS_BASEURL_IMAGE').$platform->image}}" alt="{{$platform->name}} Logo" class="img-fluid instagram-photo" >
                </a>
			
            
            @endif
            @endforeach
            </div>
			<div class="col-md-8 col-4 big-photography-image text-center">
                 <img  src="{{env('AWS_BASEURL_IMAGE').$influ->image}}" alt="{{$influ->name}} Logo" style="width:100% !important;height:150px !important; object-fit: contain !important;" >
            </div>
			<!-- <div class="col-md-2 col-4 three-dout">
				<img src="{{ asset('front_assets/img/social-icon-image/dots.png') }}" class="img-fluid three-dot" alt="">
			</div> -->
		</div>
		<div class="col-md-12 photo-content-text">
			<div class="photography-text text-center">
				<h6>{{ $influ->username}}</h6>
			</div>
            @if($influ->verified == 'Y')
			<div class="check-circles text-center">
				<img src="{{ asset('front_assets/img/social-icon-image/g-check.jpg') }}" class="img-fluid check-cir" alt="">
			</div>
            @endif
		</div>
		<div class="col-md-12 photo-button d-flex">
            @foreach($influ->categories->take(3) as $cat)
			<div class="btn-photo mr-2">
				<a @if($cat->long_desc != null) href="{{route('influencers.list',$cat->slug)}}" @endif style="background-color: #39b0d4;border-radius: 4px;" class="btn-instr">{{explode(' ',$cat->name)[0]}} </a>
			</div>
            @endforeach
			<!-- <div class="btn-photo">
				<a href="#" class="btn-instr-s">Photography</a>
			</div> -->

		</div>
		<!-- <div class="col-md-12 btn-photo-l">
			<a href="#" class="btn-instr">Travel</a>
		</div> -->
		<hr>
		<div class="row">

			<div class="col-4">
				<div class="footer-box-cont">
					<h5>{{$influ->followers ?? '-'}}</h5>
					<p>Followers</p>
				</div>
			</div>
			<div class="col-4">
				<div class="footer-box-cont-1">
					<h5>{{$influ->subscribers ?? '-'}}</h5>
					<p>Subscribers</p>
				</div>
			</div>
			<div class="col-4">
				<div class="footer-box-cont-3">
					<h5>{{$influ->likes_avg ?? '-'}}</h5>
					<p>Eng</p>
				</div>
			</div>

		</div>
	</div>
</div>
@endforeach