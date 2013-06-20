<?php
$file_handle = popen("/path/to/fakefile 2>&1", "r");
$read = fread($file_handle, 2096);
echo $read;
pclose($file_handle);
?>
