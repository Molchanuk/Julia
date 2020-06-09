
<?php
require_once 'connection.php'; // подключаем скрипт
 
if(isset($_POST['idLogistics']) && isset($_POST['Rank']) 
	&& isset($_POST['Profile_sailor_idProfile_sailor']) && isset($_POST['Ship_Type_of_vessel'])
 && isset($_POST['Ship_Shipowners_idShipowners'])  && isset($_POST['Ship_Country_idCountry'])){
 
    // подключаемся к серверу
    $link = mysqli_connect($host, $user, $password, $database) 
        or die("Ошибка " . mysqli_error($link)); 
     
    // экранирования символов для mysql
    $idLogistics = htmlentities(mysqli_real_escape_string($link, $_POST['idLogistics']));
    $Rank = htmlentities(mysqli_real_escape_string($link, $_POST['Rank']));
	$Profile_sailor_idProfile_sailor = htmlentities(mysqli_real_escape_string($link, $_POST['Profile_sailor_idProfile_sailor']));
	$Ship_Type_of_vessel = htmlentities(mysqli_real_escape_string($link, $_POST['Ship_Type_of_vessel']));
	$Ship_Shipowners_idShipowners = htmlentities(mysqli_real_escape_string($link, $_POST['Ship_Shipowners_idShipowners']));
	$Ship_Country_idCountry = htmlentities(mysqli_real_escape_string($link, $_POST['Ship_Country_idCountry']));
     
    // создание строки запроса
    $query ="INSERT INTO Logistics VALUES('$idLogistics', '$Rank', '$Profile_sailor_idProfile_sailor', 
	'$Ship_Type_of_vessel', '$Ship_Shipowners_idShipowners', 
	'$Ship_Country_idCountry')";
     
    // выполняем запрос
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    if($result)
    {
        echo "<span style='color:blue;'>Данные добавлены</span>";
    }
    // закрываем подключение
    mysqli_close($link);
}
?>
