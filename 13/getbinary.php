<?php
if ((isset($_GET['imagename'])) && (file_exists($_GET['imagename']))) {
	header("Content-type: image/gif");
	passthru("giftopnm ".$_GET['imagename']." | pnmscale -xscale .5 -yscale .5 | ppmtogif");
} else {
	echo "The image ".$_GET['imagename']." could not be found";
}
?>
