
<?php
require_once 'connection.php'; // подключаем скрипт
 
if(isset($_POST['Type_of_vessel']) && isset($_POST['Ship_name']) && isset($_POST['Shipowners_idShipowners']) && isset($_POST['Country_idCountry'])){
 
    // подключаемся к серверу
    $link = mysqli_connect($host, $user, $password, $database) 
        or die("Ошибка " . mysqli_error($link)); 
     
    // экранирования символов для mysql
    $Type_of_vessel = htmlentities(mysqli_real_escape_string($link, $_POST['Type_of_vessel']));
    $Ship_name = htmlentities(mysqli_real_escape_string($link, $_POST['Ship_name']));
	 $Shipowners_idShipowners = htmlentities(mysqli_real_escape_string($link, $_POST['Shipowners_idShipowners']));
    $Country_idCountry = htmlentities(mysqli_real_escape_string($link, $_POST['Country_idCountry']));
     
    // создание строки запроса
    $query ="INSERT INTO ship VALUES('$Type_of_vessel','$Ship_name','$Shipowners_idShipowners','$Country_idCountry')";
     
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
