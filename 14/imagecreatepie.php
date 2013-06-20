<?php
//create the canvas
$myImage = ImageCreate(300,300);

//set up some colors for use on the canvas
$white = ImageColorAllocate ($myImage, 255, 255, 255);
$red  = ImageColorAllocate ($myImage, 255, 0, 0);
$green = ImageColorAllocate ($myImage, 0, 255, 0);
$blue = ImageColorAllocate ($myImage, 0, 0, 255);

//draw a pie
ImageFilledArc($myImage, 100, 100, 200, 150, 0, 90, $red, IMG_ARC_PIE);
ImageFilledArc($myImage, 100, 100, 200, 150, 90, 180 , $green, IMG_ARC_PIE);
ImageFilledArc($myImage, 100, 100, 200, 150, 180, 360 , $blue, IMG_ARC_PIE);

//output the image to the browser
header ("Content-type: image/png");
ImagePNG($myImage);

//clean up after yourself
ImageDestroy($myImage);
?>