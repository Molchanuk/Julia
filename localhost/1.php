
<?php
require_once 'connection.php'; // подключаем скрипт
 
if(isset($_POST['idCountry']) && isset($_POST['Name'])){
 
    // подключаемся к серверу
    $link = mysqli_connect($host, $user, $password, $database) 
        or die("Ошибка " . mysqli_error($link)); 
     
    // экранирования символов для mysql
    $idCountry = htmlentities(mysqli_real_escape_string($link, $_POST['idCountry']));
    $Name = htmlentities(mysqli_real_escape_string($link, $_POST['Name']));
     
    // создание строки запроса
    $query ="INSERT INTO country VALUES('$idCountry','$Name')";
     
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
