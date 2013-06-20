<?php
if ($_COOKIE['auth'] == "1") {
	$display_block = "<p>You are an authorized user.</p>";
} else {
	//redirect back to login form if not authorized
	header("Location: userlogin.html");
	exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Secret Page</title>
</head>
<body>
<?php echo $display_block; ?>
</body>
</html>
