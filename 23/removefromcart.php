<?php
session_start();

if (isset($_GET['id'])) {

    //connect to database
    $mysqli = mysqli_connect("localhost", "joeuser", "somepass", "testDB");

    //create safe values for use
    $safe_id = mysqli_real_escape_string($mysqli, $_GET['id']);

    $delete_item_sql = "DELETE FROM store_shoppertrack WHERE id = '".$safe_id."' and session_id = '".$_COOKIE['PHPSESSID']."'";
    $delete_item_res = mysqli_query($mysqli, $delete_item_sql) or die(mysqli_error($mysqli));

	//close connection to MySQL
	mysqli_close($mysqli);

    //redirect to showcart page
    header("Location: showcart.php");
    exit;

} else {
    //send them somewhere else
    header("Location: seestore.php");
    exit;
}
?>