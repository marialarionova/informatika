<html> 
<body> 
<form action = 'search.php' method = 'get'> 
Введите данные для поиска: 
<br> 
Имя студента: <input name = 'name' type = 'text' value='<?=@$_GET['name']?>'> 
<br> 
Урок: <input name = 'lesson' type = 'text' value='<?=@$_GET['lesson']?>'> 
<br> 
<input type = 'submit' name = 'button'> 
</form> 
</body> 
</html> 

<?php 

include 'connection.php'; 

if(isset($_GET['button'])) 
{ 
$name = strtr(trim($_GET['name']), '*', '%'); 
$lesson = strtr(trim($_GET['lesson']), '*', '%'); 

$query = "SELECT * FROM student 
JOIN timetable ON timetable.id_gruppa=student.id_gruppa 
WHERE (fio_student IN 
(SELECT fio_student FROM student WHERE (fio_student LIKE '%$name%')))"; 

if (!empty($lesson)) { 
$query .= " AND (timetable.lesson LIKE '%$lesson%')"; 
} 

$result = mysqli_query($link, $query); 

echo "<table border = 1 align=center><tr><td>Имя</td><td>Урок</td></tr>"; 

while($row = mysqli_fetch_array($result)) { 
echo "<tr><td>" . $row['fio_student'] . "</td><td>" . $row['lesson'] . "</td></tr>"; 
} 

echo "</table>"; 

mysqli_close($link); 
}