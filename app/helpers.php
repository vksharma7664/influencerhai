<?php

// if(!function_exists('makeUrl'){
	function makeUrl($url){
		$url = str_replace('http://','',$url);
		$url = str_replace('www.','',$url);
		return str_replace('https://','',$url);
	}
// }

	function makeSlugFree($string){
		return ucwords(str_replace('_',' ',$string));
	}

	function readableDate($date)
	{
		return date('j M Y h:i a', strtotime($date));
	}

	function campaignStatus($status)
	{
		$arr = [
			'save' 			=> 'Draft',
			'post' 			=> 'Under Review',
			'live' 			=> 'Live Brief',
			'ongoing' 		=> 'Ongoing',
			'completed' 	=> 'Completed'
		];

		return $arr[$status];
	}

	function getDeliverablesNames()
	{
		$arr = [
			'insta_reels_checkbox' 			=> 'Instagram Reels',
			'insta_story_checkbox' 			=> 'Instagram Story',
			'insta_bio_checkbox' 			=> 'Instagram Bio',
			'insta_video_self_checkbox' 	=> 'Instagram Video (Self)',
			'insta_video_brand_checkbox' 	=> 'Instagram Video (Brand)',
			'youtube_video_self_checkbox' 	=> 'Youtube Video (Self)',
			'youtube_video_brand_checkbox' 	=> 'Youtube Video (Brand)',
			'youtube_integrated_checkbox' 	=> 'Youtube Integrated Video',
			'youtube_dedicated_checkbox' 	=> 'Youtube Dedicated Video',
			'youtube_link_desc_checkbox' 	=> 'Youtube description Link',
			'youtube_pin_comment_checkbox' 	=> 'Youtube Pin Comment',
		];

		return $arr;
	}

	function getDeliverablesCount($val)
	{
		$arr = [
			'insta_reels_checkbox' 			=> 'reels_count',
			'insta_story_checkbox' 			=> 'story_count',
			'insta_bio_checkbox' 			=> '',
			'insta_video_self_checkbox' 	=> 'insta_video_self_count',
			'insta_video_brand_checkbox' 	=> 'insta_video_brand_count',
			'youtube_video_self_checkbox' 	=> 'youtube_video_self_count',
			'youtube_video_brand_checkbox' 	=> 'youtube_video_brand_count',
			'youtube_integrated_checkbox' 	=> '',
			'youtube_dedicated_checkbox' 	=> '',
			'youtube_link_desc_checkbox' 	=> '',
			'youtube_pin_comment_checkbox' 	=> '',
		];

		return $arr[$val];
	}

?>