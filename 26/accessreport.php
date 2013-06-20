<?php
//connect to server and select database
$mysqli = mysqli_connect("localhost", "joeuser", "somepass", "testDB")
          or die(mysql_error());

//issue query and select results for counts
$count_sql = "SELECT count(page_title) AS p_count FROM access_tracker";
$count_res = mysqli_query($mysqli, $count_sql) or die(mysqli_error($mysqli));

while ($count_info = mysqli_fetch_array($count_res)) {
	$all_count = $count_info['p_count'];
}

//issue query and select results for user agents
$user_agent_sql = "SELECT DISTINCT user_agent, count(user_agent) AS ua_count FROM access_tracker GROUP BY user_agent ORDER BY ua_count desc";
$user_agent_res = mysqli_query($mysqli, $user_agent_sql) or die(mysqli_error($mysqli));

//start user agent display block
$user_agent_block = "<ul>";

//loop through user agent results
while ($row_ua = mysqli_fetch_array($user_agent_res)) {
   $user_agent = $row_ua['user_agent'];
   $user_agent_count = $row_ua['ua_count'];
   $user_agent_block .= "
   <li>".$user_agent."
      <ul>
      <li><em>accesses per browser: ".$user_agent_count."</em>
      </ul>
   </li>";
}

//finish up the user agent block
$user_agent_block .= "</ul>";

//issue query and select results for pages
$page_title_sql = "SELECT DISTINCT page_title, count(page_title) AS pt_count FROM access_tracker GROUP BY page_title ORDER BY pt_count desc";
$page_title_res = mysqli_query($mysqli, $page_title_sql) or die(mysqli_error($mysqli));

//start page title display block
$page_title_block = "<ul>";

//loop through results
while ($row_pt = mysqli_fetch_array($page_title_res)) {
   $page_title = $row_pt['page_title'];
   $page_count = $row_pt['pt_count'];
   $page_title_block .= "
   <li>".$page_title."
      <ul>
      <li><em>accesses per page: ".$page_count."</em>
      </ul>
   </li>";
}

//finish up the page title block
$page_title_block .= "</ul>";

//close connection to MySQL
mysqli_close($mysqli);
?>
<!DOCTYPE html>
<html>
<head>
<title>Access Report</title>
</head>
<body>
<h1>Access Report</h1>
<p><strong>Total Accesses Tracked:</strong> <?php echo "$all_count"; ?></p>
<p><strong>Web Browsers Used:</strong> <?php echo "$user_agent_block"; ?></p>
<p><strong>Individual Pages:</strong>
<?php echo "$page_title_block"; ?></p>
</body>
</html>
