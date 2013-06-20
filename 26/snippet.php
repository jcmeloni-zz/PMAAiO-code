<?php
//set up static variables
$page_title = "sample page A";
$user_agent = getenv('HTTP_USER_AGENT');

//connect to server and select database
$mysqli = mysqli_connect("localhost", "joeuser", "somepass", "testDB")
          or die(mysql_error());

//create and issue query
$sql = "INSERT INTO access_tracker (page_title,user_agent,date_accessed)
        VALUES ('$page_title', '$user_agent', now())";
$result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

//close connection to MySQL
mysqli_close($mysqli);
?>

