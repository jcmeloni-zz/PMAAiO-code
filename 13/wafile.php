<?php
$filename = "test.txt";
echo "<p>Writing to ".$filename." ... </p>";
$fp = fopen($filename, "w") or die("Couldn't open $filename");
fwrite($fp, "Hello world\n");
fclose($fp);
echo "<p>Appending to ".$filename." ...</p>";
$fp = fopen($filename, "a") or die("Couldn't open $filename");
fputs($fp, "And another thing\n");
fclose($fp);
?>
