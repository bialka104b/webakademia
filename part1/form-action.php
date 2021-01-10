<?php
echo (date("H:i:s"));
var_dump($_POST);
echo "<pre>";
print_r($_POST);
echo "</pre>";
echo "<pre>";
print_r($_REQUEST);
echo "</pre>";
echo "<pre>";
print_r($_FILES);
echo "</pre>";
//przeniesienie pliku w inne miejsce
//move_uploaded_file
$tmp_name = $_FILES["plik"]["tmp_name"];
$name = $_FILES["plik"]["name"];
move_uploaded_file($tmp_name, "upload".DIRECTORY_SEPARATOR.$name);
