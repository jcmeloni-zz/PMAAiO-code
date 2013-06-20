<?php
session_start();
include 'define_lang.php';
include 'lang_strings.php';
defineStrings();
?>
<!DOCTYPE html>
<html lang="<?php echo LANGCODE; ?>">
<title><?php echo WELCOME_TXT; ?></title>
<meta charset="<?php echo CHARSET; ?>" />
<body>
<h1 style="text-align: center;"><?php echo WELCOME_TXT; ?></h1>
<p style="text-align: center; font-weight: bold;"><?php echo CHOOSE_TXT; ?><br/><br/>
<a href="<?php echo $_SERVER['PHP_SELF']."?lang=en"; ?>"><img src="en_flag.gif" alt="English" /></a>
<a href="<?php echo $_SERVER['PHP_SELF']."?lang=de"; ?>"><img src="de_flag.gif" alt="German" /></a>
<a href="<?php echo $_SERVER['PHP_SELF']."?lang=ja"; ?>"><img src="ja_flag.gif" alt="Japanese" /></a>
</p>
</body>
</html>
