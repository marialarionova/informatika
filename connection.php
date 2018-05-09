<?php
$host = 'localhost';
$user = 'root';
$password = 'vertrigo';
$database = 'k3143_lmv';
$link = mysqli_connect($host, $user, $password, $database);
if (!$link) {
    die('Ошибка соединения: ' . mysql_error());
}
$link = mysqli_connect($host, $user, $password, $database) 
    or die ("Ошибка подключения к базе данных" . mysqli_error());
echo "Вы подключились!<br>";