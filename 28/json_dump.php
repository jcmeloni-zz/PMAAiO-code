<?php
$theData = file_get_contents("books.txt");
echo "<pre>";
print_r(json_decode($theData));
echo "</pre>";
?>