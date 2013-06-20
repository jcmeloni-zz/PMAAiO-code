<?php
//start building the mail string
$msg  = "<p><strong>Name:</strong>    ".$_POST['name']."</p>";
$msg .= "<p><strong>E-Mail:</strong>  ".$_POST['email']."</p>";
$msg .= "<p><strong>Message:</strong> ".$_POST['message']."</p>";

//set up the mail
$recipient = "you@yourdomain.com";
$subject = "Form Submission Results";
$mailheaders  = "MIME-Version: 1.0\r\n";
$mailheaders .= "Content-type: text/html; charset=ISO-8859-1\r\n";
$mailheaders .= "From: My Web Site <defaultaddress@yourdomain.com> \n";
$mailheaders .= "Reply-To: ".$_POST['email'];

//send the mail
mail($recipient, $subject, $msg, $mailheaders);
?>
<!DOCTYPE html>
<html>
<head>
<title>Sending the Simple Feedback Form - HTML Version</title>
</head>
<body>
<p>Thanks, <strong><?php echo $_POST['name']; ?></strong>, for your message.</p>
<p>Your e-mail address: <strong><?php echo $_POST['email']; ?></strong></p>
<p>Your message: <br/> <?php echo $_POST['message']; ?> </p>
</body>
</html>