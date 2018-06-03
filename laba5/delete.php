<?php
// delete records
$host = 'localhost'; 
$user = 'root'; 
$password = 'vertrigo'; 
$database = 'k3143_lmv'; 


$link = mysqli_connect($host, $user, $password, $database) 
or die ("Ошибка подключения к базе данных" . mysqli_error()); 

$id_student = $_GET['id_student'];

$query = "SET foreign_key_checks = 0;";

$result = mysqli_query($link, $query);


$query = "DELETE FROM student
	WHERE id_student ='" . $id_student . "'";

$result = mysqli_query($link, $query);


// redirect
header('location: ./list.php');