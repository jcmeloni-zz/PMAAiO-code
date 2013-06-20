<?php
//create the canvas
$myImage = ImageCreate(300,300);

//set up some colors for use on the canvas
$black = ImageColorAllocate ($myImage, 0, 0, 0);
$white = ImageColorAllocate ($myImage, 255, 255, 255);
$red  = ImageColorAllocate ($myImage, 255, 0, 0);
$green = ImageColorAllocate ($myImage, 0, 255, 0);
$blue = ImageColorAllocate ($myImage, 0, 0, 255);

//draw some rectangles
ImageRectangle($myImage, 15, 15, 95, 155, $red);
ImageRectangle($myImage, 95, 155, 175, 295, $white);
ImageRectangle($myImage, 175, 15, 255, 155, $red);

//output the image to the browser
header ("Content-type: image/png");
ImagePNG($myImage);

//clean up after yourself
ImageDestroy($myImage);
?>