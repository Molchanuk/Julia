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

	<p><b>id:</b>" .$row['idProfile_sailor'] . "</p>
	
	---------<br/>"
	);
}
else{echo ("Пользователя с таким именем в базе нет<br/><br/>");}


?>


<form action="position1.php" form method="POST">
<p><b>Введите пожалуйста полученный id в строку поиска:</b><br></p>
<p><input align="center" type="text1" name="Surname" size="30"><br/></p>

<p><input  type="submit"  value="Найти и вывести" class="registerbtn1"><br/></p>
</form>

<a href="POISK.html">Вернуться к поиску</a><br/><br/>
<a href="for_sailor.html">Добавить пользователя</a>
</body>
</html>