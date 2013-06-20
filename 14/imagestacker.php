<?php
//select an image to start with
$baseimage = ImageCreateFromPNG("img1.png");

//loop through images #2 through the end
for($i=2; $i <5; $i++) {
	//allocate the transparent color, and stack
	$myImage = ImageCreateFromPNG("img".$i.".png");
	$gray = ImageColorAllocate($myImage, 185, 185, 185);
	ImageColorTransparent($myImage, $gray);
	ImageCopyMerge($baseimage,$myImage,0,0,0,0,150,150,100);
}

//output the image to the browser
header ("Content-type: image/png");
ImagePNG($baseimage);

//clean up after yourself
ImageDestroy($baseimage);
?>

