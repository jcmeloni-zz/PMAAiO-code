<?php
$filename = "test.txt";
$fp = fopen($filename, "r") or die("Couldn't open $filename");
while (!feof($fp)) {
	$char = fgetc($fp);
	echo $char."<br/>";
}
?>
