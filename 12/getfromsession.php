<?php
session_start();
?>
<p>Your chosen products are:</p>
<ul>
<li><?php echo $_SESSION['product1']; ?></li>
<li><?php echo $_SESSION['product2']; ?></li>
</ul>
