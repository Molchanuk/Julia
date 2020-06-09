
<?php
require_once 'connection.php'; // подключаем скрипт
 
if( isset($_POST['Arrival_date']) && isset($_POST['Logistics_idLogistics'])){
 
    // подключаемся к серверу
    $link = mysqli_connect($host, $user, $password, $database) 
        or die("Ошибка " . mysqli_error($link)); 
     
    // экранирования символов для mysql
   // $idArrival = htmlentities(mysqli_real_escape_string($link, $_POST['idArrival']));
    $Arrival_date = htmlentities(mysqli_real_escape_string($link, $_POST['Arrival_date']));
    $Logistics_idLogistics = htmlentities(mysqli_real_escape_string($link, $_POST['Logistics_idLogistics']));
     
    // создание строки запроса
    $query ="INSERT INTO Arrival (Arrival_date, Logistics_idLogistics)VALUES('$Arrival_date', '$Logistics_idLogistics')";
     
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
