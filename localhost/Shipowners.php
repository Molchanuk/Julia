
<?php
require_once 'connection.php'; // подключаем скрипт
 
if(isset($_POST['idShipowners']) && isset($_POST['Email']) && isset($_POST['Company']) && isset($_POST['Country_idCountry'])){
 
    // подключаемся к серверу
    $link = mysqli_connect($host, $user, $password, $database) 
        or die("Ошибка " . mysqli_error($link)); 
     
    // экранирования символов для mysql
    $idShipowners = htmlentities(mysqli_real_escape_string($link, $_POST['idShipowners']));
    $Email = htmlentities(mysqli_real_escape_string($link, $_POST['Email']));
    $Company = htmlentities(mysqli_real_escape_string($link, $_POST['Company']));
    $Country_idCountry = htmlentities(mysqli_real_escape_string($link, $_POST['Country_idCountry']));
     
    // создание строки запроса
    $query ="INSERT INTO shipowners VALUES('$idShipowners','$Email', '$Company','$Country_idCountry')";
     
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
