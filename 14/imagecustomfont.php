<?php
//create the canvas
$myImage = ImageCreate(150,25);

//set up some colors for use on the canvas
$white = ImageColorAllocate ($myImage, 255, 255, 255);
$black = ImageColorAllocate ($myImage, 0, 0, 0);

//load a font
$font = imageloadfont("hootie.gdf");

// write the string
ImageString($myImage, $font, 0, 0, "CAPTCHA!", $black);

//output the image to the browser
header ("Content-type: image/png");
ImagePNG($myImage);

//clean up after yourself
ImageDestroy($myImage);
?>