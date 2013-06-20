<?php
exec("ls -al .", $output_array, $return_val);
echo "Returned ".$return_val."<br/><pre>";
foreach ($output_array as $o) {
	echo $o."\n";
}
echo "</pre>";
?>
