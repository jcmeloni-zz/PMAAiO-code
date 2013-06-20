<?php
$theData = file_get_contents("http://ajax.googleapis.com/ajax/services/search/web?v=1.0&q=PHP");
echo "<pre>";
print_r(json_decode($theData));
echo "</pre>";
?>