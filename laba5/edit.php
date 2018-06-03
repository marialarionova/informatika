<?php

$id = $_GET['id_student'];
$fio = $_GET['input_1'];
$less = $_GET['input_2'];

$host = 'localhost'; 
$user = 'root'; 
$password = 'password'; 
$database = 'k3143_lmv'; 


$link = mysqli_connect($host, $user, $password, $database) 
or die ("Ошибка подключения к базе данных" . mysqli_error()); 

$query = "SELECT student.id_student, student.fio_student, timetable.lesson FROM student 
JOIN timetable ON timetable.id_gruppa=student.id_gruppa";

$res = mysqli_query($link, $query); 

if(isset($_GET['button']))
{
	$input_1 = $_GET['input_1'];
	$input_2 = $_GET['input_2'];
	$id_student = $_GET['id_student'];
	
	$query = "UPDATE student
		SET fio_student ='" . $input_1 . "'
		WHERE id_student =' " . $id_student . " '; ";
			
	$result = mysqli_query($link, $query);
			
	$query = "UPDATE timetable
		JOIN student ON timetable.id_gruppa = student.id_gruppa
		SET lesson ='" . $input_2 . "'
		WHERE student.id_student = '$id_student';";
			
	$result = mysqli_query($link, $query);
	// redirect
	header('location: ./list.php'); 
}
?>

<html>
<body>
	<form action = 'edit.php' method = 'get'>
	<table align = 'center'>
	<tr><th><i>Редактировать значения:</i></th></tr>
	<tr hidden><td>ID студента: <input name = 'id_student' type = 'text' value='<?=@$_GET['id_student']?>'></td></tr>
	<tr><td>Имя студента: <input name = 'input_1' type = 'text' value='<?=@$_GET['input_1']?>'></td></tr>
	<tr><td>Урок: <input name = 'input_2' type = 'text' value='<?=@$_GET['input_2']?>'></td></tr>
	</table>
	<br/>
	<input type = 'submit' name = 'button'>
	</form>
</body>
</html>
 