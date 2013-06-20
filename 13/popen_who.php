<?php
$handle = popen("who", "r");
while (!feof($handle)) {
	$line = fgets($handle,1024);
	if (strlen($line) >= 1) {
		 echo $line."<br/>";
	}
}
pclose($handle);
?>
