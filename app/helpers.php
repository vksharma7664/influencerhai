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

?>