<!DOCTYPE html>
<html>
<head>
<title>Reading checkboxes</title>
</head>
<body>
<p>Welcome, <strong><?php echo $_POST['user']; ?></strong>!</p>
<p>Your product choices are:
<?php
if (!empty($_POST['products'])) {
	echo "<ul>";
	foreach ($_POST['products'] as $value) {
		echo "<li>$value</li>";
	}
	echo "</ul>";
} else {
	echo "None";
}
?>
</body>
</html>
