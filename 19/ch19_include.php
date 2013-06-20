<?php
// function to connect to database
function doDB() {
	global $mysqli;

	//connect to server and select database
	$mysqli = mysqli_connect("localhost", "joeuser", "somepass", "testDB");

	//if connection fails, stop script execution
	if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
}
// function to check e-mail address
function emailChecker($email) {
	global $mysqli, $safe_email, $check_res;

	//check that email is not already in list
	$safe_email = mysqli_real_escape_string($mysqli, $email);
	$check_sql = "SELECT id FROM subscribers WHERE email = '".$safe_email."'";
	$check_res = mysqli_query($mysqli, $check_sql) or die(mysqli_error($mysqli));
}
?>