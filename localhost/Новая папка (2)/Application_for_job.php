
<?php
require_once 'connection.php'; // подключаем скрипт
 
if(isset($_POST['idApplication_for_job']) && isset($_POST['Application_number']) 
	&& isset($_POST['Application_date']) && isset($_POST['Ship_Type_of_vessel']) 
&& isset($_POST['Ship_Shipowners_idShipowners']) && isset($_POST['Ship_Country_idCountry'])){
 
    // подключаемся к серверу
    $link = mysqli_connect($host, $user, $password, $database) 
        or die("Ошибка " . mysqli_error($link)); 
     
    // экранирования символов для mysql
    $idApplication_for_job = htmlentities(mysqli_real_escape_string($link, $_POST['idApplication_for_job']));
    $Application_number = htmlentities(mysqli_real_escape_string($link, $_POST['Application_number']));
	$Application_date = htmlentities(mysqli_real_escape_string($link, $_POST['Application_date']));
    $Ship_Type_of_vessel = htmlentities(mysqli_real_escape_string($link, $_POST['Ship_Type_of_vessel']));
	$Ship_Shipowners_idShipowners = htmlentities(mysqli_real_escape_string($link, $_POST['Ship_Shipowners_idShipowners']));
    $Ship_Country_idCountry = htmlentities(mysqli_real_escape_string($link, $_POST['Ship_Country_idCountry']));
     
    // создание строки запроса
    $query ="INSERT INTO Application_for_job VALUES('$idApplication_for_job','$Application_number',
	'$Application_date', '$Ship_Type_of_vessel', '$Ship_Shipowners_idShipowners', '$Ship_Country_idCountry')";
     
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
