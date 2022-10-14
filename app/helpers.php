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

?>