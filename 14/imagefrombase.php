<?php
//use existing image as a canvas
$myImage = ImageCreateFromPNG ("baseimage.png");

//allocate the color white
$white = ImageColorAllocate ($myImage, 255, 255, 255);

//draw on the new canvas
ImageFilledEllipse($myImage, 100, 70, 20, 20, $white);
ImageFilledEllipse($myImage, 175, 70, 20, 20, $white);
ImageFilledEllipse($myImage, 250, 70, 20, 20, $white);

//output the image to the browser
header ("Content-type: image/png");
ImagePNG($myImage);

//clean up after yourself
ImageDestroy($myImage);
?>
