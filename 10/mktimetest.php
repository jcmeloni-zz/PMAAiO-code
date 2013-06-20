<?php
// make a timestamp for Jan 17 2012 at 9:34 pm
$ts = mktime(21, 34, 0, 1, 17, 2012);
echo date("m/d/y G:i:s e", $ts);
echo "<br/>";
echo "The date is ";
echo date("jS \of F Y, \a\\t g:ia \i\\n e", $ts );
?>
