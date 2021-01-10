<?php

session_start();

$_SESSION['user'] = 'gk';
$_SESSION['id'] = '923389734';

echo "<br> Zalogowany ".$_SESSION['user']."<br> ";
// $_SESSION['user']['name'] = 'gk';
// $_SESSION['user']['id'] = 'id';
?>
<a href="index.php">index</a>
<a href="logout.php">wyloguj</a>