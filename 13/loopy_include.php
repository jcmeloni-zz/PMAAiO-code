<?php
for ($x = 1; $x<=3; $x++) {
	$incfile = "incfile".$x.".txt";
	echo "Attempting to include ".$incfile."<br/>";
	include $incfile;
	echo "<hr/>";
}
?>
