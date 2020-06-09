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
	
	
$In_fight= trim($_REQUEST['In_fight']);



$sql_select = "SELECT * FROM profile_sailor WHERE In_fight='$In_fight'";
$result = mysqli_query($link, $sql_select);


while ($row = mysqli_fetch_assoc($result))
{
	printf("<p><b>Пользователь:</b> " .$row['Surname'] . " " .$row['Name'] ."</p> 	
	<p><b>Отчество: </b>" .$row['Patronymic'] . "</p>
	

	<p><b>В рейсе или нет: </b>" .$row['In_fight'] ."</p>
	
	---------<br/>"
	);
}




?>
</body>
</html>