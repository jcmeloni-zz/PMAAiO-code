<?php
$filename = "test.txt";
$fp = fopen($filename, "r") or die("Couldn't open $filename");
$fsize = filesize($filename);
$halfway = (int)($fsize / 2);
echo "Halfway point: ".$halfway."<br/>\n";
fseek($fp, $halfway);
$chunk = fread($fp, ($fsize - $halfway));
echo $chunk;
?>
