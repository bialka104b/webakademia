<?php
session_start();
unset($_SESSION['user']);
echo "<br> Zalogowany ".$_SESSION['user']."<br> ";
?>
<a href="login.php">zaloguj</a>
<a href="logout.php">wyloguj</a>
