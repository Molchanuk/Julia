
<?php
require_once 'connection.php'; // подключаем скрипт
 
if(isset($_POST['idThe_country_issued_visa']) && isset($_POST['Country_idCountry'])){
 
    // подключаемся к серверу
    $link = mysqli_connect($host, $user, $password, $database) 
        or die("Ошибка " . mysqli_error($link)); 
     
    // экранирования символов для mysql
    $idThe_country_issued_visa = htmlentities(mysqli_real_escape_string($link, $_POST['idThe_country_issued_visa']));
    $Country_idCountry = htmlentities(mysqli_real_escape_string($link, $_POST['Country_idCountry']));
     
    // создание строки запроса
    $query ="INSERT INTO the_country_issued_visa VALUES('$idThe_country_issued_visa','$Country_idCountry')";
     
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
