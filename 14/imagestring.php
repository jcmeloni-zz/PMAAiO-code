<?php
if (!$_POST) {
//show form
?>
<!DOCTYPE html>
<html>
<head>
<title>Image Creation Form</title>

<style type="text/css">
fieldset{border: 0; padding: 0px 0px 12px 0px;}
fieldset label  {margin-left: 24px;}
legend, label   {font-weight:bold;}
</style>

</head>
<body>
<h1>Create an Image</h1>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<fieldset>
<legend>Image Size:</legend><br/>
<label for="w">W:</label>
<input type="text" id="w" name="w" size="5" maxlength="5" />
<label for="h">H:</label>
<input type="text" id="h" name="h" size="5" maxlength="5" />
</fieldset>

<fieldset>
<legend>Background Color:</legend><br/>
<label for="b_r">R:</label>
<input type="text" id="b_r" name="b_r" size="3" maxlength="3" />
<label for="b_g">G:</label>
<input type="text" id="b_g" name="b_g" size="3" maxlength="3" />
<label for="b_b">B:</label>
<input type="text" id="b_b" name="b_b" size="3" maxlength="3" />
</fieldset>

<fieldset>
<legend>Text Color:</legend><br/>
<label for="t_r">R:</label>
<input type="text" id="t_r" name="t_r" size="3" maxlength="3" />
<label for="t_g">G:</label>
<input type="text" id="t_g" name="t_g" size="3" maxlength="3" />
<label for="t_b">B:</label>
<input type="text" id="t_b" name="t_b" size="3" maxlength="3" />
</fieldset>

<p><label for="string">Text String:</label>
<input type="text" id="string" name="string" size="35" /></p>

<p><label for="font_size">Font Size:</label>
<select id="font_size" name="font_size">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
</select></p>

<fieldset>
<legend>Text Starting Position:</legend><br/>
<label for="x">X:</label>
<input type="text" id="x" name="x" size="3" maxlength="3" />
<label for="y">Y:</label>
<input type="text" id="y" name="y" size="3" maxlength="3" />
</fieldset>

<button type="submit" name="submit" value="create">Create Image</button>
</form>
</body>
</html>

<?php
} else {
//create image
//create the canvas
$myImage = ImageCreate($_POST['w'], $_POST['h']);

//set up some colors
$background = ImageColorAllocate ($myImage, $_POST['b_r'], $_POST['b_g'], $_POST['b_b']);
$text = ImageColorAllocate ($myImage, $_POST['t_r'], $_POST['t_g'], $_POST['t_b']);

// write the string at the top left
ImageString($myImage, $_POST['font_size'], $_POST['x'], $_POST['y'], $_POST['string'], $text);

//output the image to the browser
header ("Content-type: image/png");
ImagePNG($myImage);

//clean up after yourself
ImageDestroy($myImage);
}
?>