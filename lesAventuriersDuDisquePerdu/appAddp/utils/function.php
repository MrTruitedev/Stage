<?php
    function cleanInput($input){
        return htmlspecialchars(strip_tags(trim($input)));
    }
	function getPath(){
		$qs = explode('&', explode('?', $_SERVER['REQUEST_URI'])[1]);
		return explode('=', $qs[0])[0];
	}
?>
