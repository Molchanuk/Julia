<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<style>
	i { 
	color:#4CAF50;
		
}
a{ 
	color:#4CAF50;
		
}

        </style>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link rel="stylesheet" type="text/css" href="style.css">
<title>Selected User</title>
</head>

<body>
<?php
require_once 'connection.php';

$link = mysqli_connect($host, $user, $password, $database) 
    or die("Ошибка " . mysqli_error($link)); 
	
	
$Surname= trim($_REQUEST['Surname']);
$Name = trim($_REQUEST['Name']);


$sql_select = "SELECT * FROM profile_sailor WHERE Surname='$Surname' && Name='$Name'";
$result = mysqli_query($link, $sql_select);
$row = mysqli_fetch_array($result);

if($row)
{
	printf("<p><b>Пользователь:</b> " .$row['Surname'] . " " .$row['Name'] ."</p> 	
	<p><b>Отчество: </b>" .$row['Patronymic'] . "</p>
	<p><b>День рождения: </b>" .$row['Date_of_birth'] ."</p>
	<p><i>Контактные данные</i></p>
	<p><b>Домашний адресс: </b>" .$row['Home_address'] ."</p>
	<p><b>Домашний телефон: </b>" .$row['Phone_home'] ."</p>
	<p><b>Мобильный телефон: </b>" .$row['Mobile_phone'] ."</p>
	<p><i>Личные данные</i></p>
	<p><b>Национальность: </b>" .$row['Citizenship'] ."</p>
	<p><b>Семейное положение:</b> " .$row['Marital_Status'] ."</p>
	<p><b>Рост: </b>" .$row['Height'] ."</p>
	<p><b>Вес: </b>" .$row['Weight'] ."</p>
	<p><i>Мед-осмотр</i></p>
	<p><b>Дата мед-осмотра:</b> " .$row['Date_of_medical_examination'] ."</p>
	<p><b>Дата теста на алкоголь и наркотики: </b>" .$row['Drugs_and_Alcohol_test_date'] ."</p>
	<p><i>Паспорт</i></p>
	<p><b>Номер нац. паспорта: </b>" .$row['National_passport№'] ."</p>
	<p><b>Дата выдачи нац. паспорта: </b>" .$row['National_passport_issued'] ."</p>
	<p><i>Загран. паспорт</i></p>
	<p><b>Номер загран. паспорт: </b>" .$row['International_passport№'] ."</p>
	<p><b>Дата выдачи загран. паспорта: </b>" .$row['International_passport_issued'] ."</p>
	<p><b>Действителен до(загран. паспорт):</b> " .$row['International_passport_valid'] ."</p>
	<p><i>Паспорт моряка</i></p>
	<p><b>Номер паспорта моряка: </b>" .$row['Seaman_passport№'] ."</p>
	<p><b>Дата выдачи паспорта моряка: </b>" .$row['Seaman_passport_issued'] ."</p>
	<p><b>Действителен до(паспорт моряка): </b>" .$row['Seaman_passport_valid'] ."</p>
	<p><i>Данные для рейса</i></p>
	<p><b>Готов к рейсу: </b>" .$row['Ready_to_fight'] ."</p>
	<p><b>В рейсе или нет: </b>" .$row['In_fight'] ."</p>
	<p><b>Звание: </b>" .$row['Rank'] ."</p>
	<p><b>Фото: </b>" .$row['Photo'] ."</p>
	---------<br/>"
	);
}
else{echo ("Пользователя с таким именем в базе нет<br/><br/>");}


?>
<a href="POISK.html">Вернуться к поиску</a><br/><br/>
<a href="for_sailor.html">Добавить пользователя</a>
</body>
</html>