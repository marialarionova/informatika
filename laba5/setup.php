<?php
include 'connection.php'; 
$query ="create table if not exists teacher (
fio_teacher varchar (60) NOT NULL,
id_predmet int NOT NULL,
PRIMARY KEY (fio_teacher)
);";

$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
if($result)
{
echo "Выполнение запроса прошло успешно <br>";
}

$sql = "INSERT INTO teacher (fio_teacher, id_predmet) VALUES 
('Demidov Petr Ivanovich', '11'),
('Osokina Margarita Vladimirovna', '11'),
('Arkadyev Yurij Viktorovich', '22'),
('Vostrov Igor Mihajlovich', '22'),
('Veselova Darya Alekseevna', '33'),
('Stezhkin Aleksandr Petrovich', '44'),
('Zarina Elena Stanislavovna', '55')";

if (mysqli_query($link, $sql)) {
echo "Created successfully<br>";
} else {
echo "Error creating <br>" . mysqli_error($link);
}

$query ="create table predmet (
id_predmet int(10) AUTO_INCREMENT,
name_predmet varchar(30) NOT NULL,
PRIMARY KEY (id_predmet)
);";

$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
if($result)
{
echo "Выполнение запроса прошло успешно";
}

$sql = "INSERT INTO predmet (id_predmet, name_predmet) VALUES 
('11', 'Russkij'),
('22', 'Matematika'),
('33', 'Literatura'),
('44', 'Ispanskij'),
('55', 'Istoriya');";
if (mysqli_query($link, $sql)) {
echo "Created successfully<br>";
} else {
echo "Error creating <br>" . mysqli_error($link);
}

$query ="create table cabinet (
id_cabinet int(10) AUTO_INCREMENT,
fio_teacher varchar(60) NOT NULL,
PRIMARY KEY (id_cabinet),
FOREIGN KEY (fio_teacher) REFERENCES teacher (fio_teacher)
);";

$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
if($result)
{
echo "Выполнение запроса прошло успешно";
}

$sql = "INSERT INTO cabinet (id_cabinet, fio_teacher) VALUES 
('101', 'Demidov Petr Ivanovich'),
('202', 'Arkadyev Yurij Viktorovich'),
('303', 'Veselova Darya Alekseevna'),
('404', 'Stezhkin Aleksandr Petrovich'),
('505', 'Zarina Elena Stanislavovna');";
if (mysqli_query($link, $sql)) {
echo "Created successfully<br>";
} else {
echo "Error creating <br>" . mysqli_error($link);
}

$query ="create table gruppa (
id_gruppa int(10) AUTO_INCREMENT,
PRIMARY KEY (id_gruppa)
);";

$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
if($result)
{
echo "Выполнение запроса прошло успешно";
}

$sql = "INSERT INTO gruppa (id_gruppa) VALUES
('1'),
('2'),
('3'),
('4'),
('5');";
if (mysqli_query($link, $sql)) {
echo "Created successfully<br>";
} else {
echo "Error creating <br>" . mysqli_error($link);
}

$query ="create table student (
id_student int(10) AUTO_INCREMENT,
fio_student varchar(60) NOT NULL,
id_gruppa int(10),
PRIMARY KEY (id_student),
FOREIGN KEY (id_gruppa) REFERENCES gruppa (id_gruppa)
);";

$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
if($result)
{
echo "Выполнение запроса прошло успешно";
}

$sql = "INSERT INTO student (id_student, fio_student, id_gruppa) VALUES 
('111', 'Delina Mariya Viktorovna', '1'),
('222', 'Maryanova Alisa Dmitrievna', '2'),
('333', 'Krylov Aleksej Gennadyevich', '3'),
('444', 'Denisov Anatolij Stepanovich', '4'),
('555', 'Lakin Sergej Aleksandrovich', '5'),
('666', 'Bystrov Arkadij Yuryevich', '1'),
('777', 'Vireva Yuliya Pavlovna', '2'),
('888', 'Obuhov Sergej Aleksandrovich', '3'),
('999', 'Lastochkina Marina Alekseevna', '4');";
if (mysqli_query($link, $sql)) {
echo "Created successfully<br>";
} else {
echo "Error creating <br>" . mysqli_error($link);
}

$query ="create table mark (
id_student int(10),
id_predmet int(10),
id_gruppa int(10),
fio_teacher varchar(60),
mark int,
FOREIGN KEY (id_student) REFERENCES student (id_student),
FOREIGN KEY (id_predmet) REFERENCES predmet (id_predmet),
FOREIGN KEY (id_gruppa) REFERENCES gruppa (id_gruppa),
FOREIGN KEY (fio_teacher) REFERENCES teacher (fio_teacher)
);";

$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
if($result)
{
echo "Выполнение запроса прошло успешно";
}

$sql = "INSERT INTO mark (id_student, id_predmet, id_gruppa,
fio_teacher, mark) VALUES 
('111', '33', '1', 'Veselova Darya Alekseevna', '5'),
('111', '11', '1', 'Demidov Petr Ivanovich', '5'),
('222', '11', '2', 'Demidov Petr Ivanovich', '5'),
('222', '22', '2', 'Arkadyev Yurij Viktorovich', '4'),
('333', '55', '3', 'Zarina Elena Stanislavovna', '4'),
('333', '33', '3', 'Veselova Darya Alekseevna', '3'),
('444', '55', '4', 'Zarina Elena Stanislavovna', '5'),
('444', '44', '4', 'Stezhkin Aleksandr Petrovich', '5'),
('555', '11', '5', 'Osokina Margarita Vladimirovna', '4'),
('555', '55', '5', 'Zarina Elena Stanislavovna', '4'),
('666', '11', '1', 'Demidov Petr Ivanovich', '3'),
('666', '33', '1', 'Veselova Darya Alekseevna', '3'),
('777', '11', '2', 'Demidov Petr Ivanovich', '3'),
('777', '22', '2', 'Arkadyev Yurij Viktorovich', '4'),
('888', '33', '3', 'Veselova Darya Alekseevna', '4'),
('888', '55', '3', 'Zarina Elena Stanislavovna', '5'),
('999', '44', '4', 'Stezhkin Aleksandr Petrovich', '4'),
('999', '55', '4', 'Zarina Elena Stanislavovna', '3');";
if (mysqli_query($link, $sql)) {
echo "Created successfully<br>";
} else {
echo "Error creating <br>" . mysqli_error($link);
}

$query ="create table timetable (
id_gruppa int(10),
id_predmet int(10),
id_cabinet int(10),
fio_teacher varchar(60),
day varchar(10),
lesson int(1),
FOREIGN KEY (id_gruppa) REFERENCES gruppa (id_gruppa),
FOREIGN KEY (id_predmet) REFERENCES predmet (id_predmet),
FOREIGN KEY (id_cabinet) REFERENCES cabinet (id_cabinet),
FOREIGN KEY (fio_teacher) REFERENCES teacher (fio_teacher)
);";

$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
if($result)
{
echo "Выполнение запроса прошло успешно";
}

$sql = "INSERT INTO timetable (id_gruppa, id_predmet, id_cabinet,
fio_teacher, day, lesson) VALUES 
('1', '11', '101', 'Demidov Petr Ivanovich', 'Пн', '1'),
('1', '33', '303', 'Veselova Darya Alekseevna', 'Чт', '3'),
('2', '11', '101', 'Demidov Petr Ivanovich', 'Пн', '3'),
('2', '22', '202', 'Arkadyev Yurij Viktorovich', 'Вт', '2'),
('3', '33', '303', 'Veselova Darya Alekseevna', 'Вт', '3'),
('3', '55', '505', 'Zarina Elena Stanislavovna', 'Чт', '3'),
('4', '44', '404', 'Stezhkin Aleksandr Petrovich', 'Ср', '3'),
('4', '44', '505', 'Stezhkin Aleksandr Petrovich', 'Чт', '2'),
('4', '55', '202', 'Zarina Elena Stanislavovna', 'Сб', '1'),
('5', '11', '101', 'Osokina Margarita Vladimirovna', 'Пн', '2'),
('5', '11', '303', 'Osokina Margarita Vladimirovna', 'Пн', '3'),
('5', '55', '505', 'Zarina Elena Stanislavovna', 'Чт', '1'),
('5', '55', '404', 'Zarina Elena Stanislavovna', 'Пт', '2');";
if (mysqli_query($link, $sql)) {
  echo "<p>Created successfully<br>";
} else {
  echo "<p>Error creating <br>" . mysqli_error($link);
}
mysqli_close($link);