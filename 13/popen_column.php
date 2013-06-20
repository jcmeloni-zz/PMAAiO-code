<?php
$products = array(
			array("HAL 2000", 2, "red"),
			array("Tricorder", 3, "blue"),
			array("ORAC AI", 1, "pink"),
			array("Sonic Screwdriver", 1, "orange")
			);

$handle = popen("column -tc 3 -s / > /somepath/purchases.txt", "w");
foreach ($products as $p) {
	fputs($handle, join('/',$p)."\n");
}
pclose($handle);
echo "done";
?>
