<?php
$products = array("Green armchair" => "222.4",
"Candlestick"=> "4",
"Coffee table"=> "80.6");
echo "<pre>";
printf("%-20s%20s\n", "Name", "Price");
printf("%'-40s\n", "");
foreach ($products as $key=>$val) {
   printf( "%-20s%20.2f\n", $key, $val );
}
echo "</pre>";
?>
