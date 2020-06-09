<?php
$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = '14121998';
$dbName = 'molchanuk';

$con = mysqli_connect($dbHost, $dbUser,$dbPass) or die(mysqli_error());
$db_selected = mysqli_select_db($con, $dbName);

$CountryID = $_POST['CountryID'];
$CountryName = $_POST['CountryName'];
$query ="INSERT INTO molchanuk.country ('idCountry', 'Name') VALUES ('$CountryID',  '$CountryName');";
$result = mysqli_query ($con, $query);
echo ' Данные в таблицу COUNTRY добавлены ... <br>';
?>








<form class="login_form" method="POST">
	<p>Код страны</p>
	<input type="text" name="idCountry">
	<br>
	<p>Название страны</p>
	<input type="text" name="CountryName">
	<br>
	<button type="submit" class="button">submit</button>
	<br>
</form>
				