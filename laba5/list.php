<?php 

$host = 'localhost'; 
$user = 'root'; 
$password = 'password'; 
$database = 'k3143_lmv'; 


$link = mysqli_connect($host, $user, $password, $database) 
or die ("Ошибка подключения к базе данных" . mysqli_error()); 

$query = "SELECT student.id_student, student.fio_student, timetable.lesson FROM student 
JOIN timetable ON timetable.id_gruppa=student.id_gruppa";

$res = mysqli_query($link, $query); 

echo "<table border=1 align=center> 
<tr> 
<td>ФИО</td><td>Урок</td><td colspan = '2'>Редактировать</td> 
</tr>"; 

while($row = mysqli_fetch_assoc($res)) 
{ 
echo "<tr> 
<td>". $row['fio_student']."</td><td>". $row['lesson']."</td>
<td><a href = './edit.php?id_student=" . $row['id_student'] . "&input_1=" . $row['fio_student'] . "&input_2=" . $row['lesson'] . "'>Редактировать</a></td>
<td><a href = './delete.php?id_student=". $row['id_student'] . "'>Удалить</a></td> 
</tr>"; 
} 
echo "</table>"; 

mysqli_close($link); 
?>