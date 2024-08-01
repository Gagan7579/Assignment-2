<?php
$host = 'localhost';
$db = 'turban_store';
$user = 'root'; // default XAMPP username
$pass = ''; // default XAMPP password

$mysqli = new mysqli($host, $user, $pass, $db);

if ($mysqli->connect_error) {
    die('Connection Failed: ' . $mysqli->connect_error);
}
?>
