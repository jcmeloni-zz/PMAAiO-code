<?php
function outputFileTestInfo($f) {
	if (!file_exists($f)) {
		echo "<p>$f does not exist</p>";
		return;
	}
	echo "<p>$f is ".(is_file($f) ? "" : "not ")."a file</p>";
	echo "<p>$f is ".(is_dir($f) ? "" : "not ")."a directory</p>";
	echo "<p>$f is ".(is_readable($f) ? "": "not ")."readable</p>";
	echo "<p>$f is ".(is_writable($f) ? "": "not ")."writable</p>";
	echo "<p>$f is ".(is_executable($f) ? "": "not ")."executable</p>";
	echo "<p>$f is ".(filesize($f))." bytes</p>";
	echo "<p>$f was accessed on ".date( "D d M Y g:i A",fileatime($f))."</p>";
	echo "<p>$f was modified on ".date( "D d M Y g:i A",filemtime($f))."</p>";
	echo "<p>$f was changed on ".date( "D d M Y g:i A",filectime($f) )."</p>";
}
$file = "test.txt";
outputFileTestInfo($file);
?>
