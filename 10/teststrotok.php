<?php
$test  = "http://www.google.com/search?";
$test .= "hl=en&ie=UTF-8&q=php+development+books&btnG=Google+Search";
$delims = "?&";
$word = strtok($test, $delims);
while (is_string($word)) {
	if ($word) {
		echo $word."<br/>";
	}
	$word = strtok($delims);
}
?>
