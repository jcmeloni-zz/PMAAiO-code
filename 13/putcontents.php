<?php
$filename = "test.txt";
echo "<p>Writing to ".$filename." ... </p>";
file_put_contents ($filename, "Hello world\n");
echo "<p>Appending to ".$filename." ...</p>";
file_put_contents ($filename, "And another thing\n", FILE_APPEND);
?>


