<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
<?php
require_once 'connection.php'; // подключаем скрипт
// подключаемся к серверу
$link = mysqli_connect($host, $user, $password, $database) 
        or die("Ошибка " . mysqli_error($link)); 
     
// если запрос POST 
if(isset($_POST['idChildren']) && isset($_POST['Next_to_kin']) && isset($_POST['Address_of_nearest_relative']) && isset($_POST['Profile_sailor_idProfile_sailor'])){
 
    $Next_to_kin = htmlentities(mysqli_real_escape_string($link, $_POST['Next_to_kin']));
    $Address_of_nearest_relative = htmlentities(mysqli_real_escape_string($link, $_POST['Address_of_nearest_relative']));
    $Profile_sailor_idProfile_sailor = htmlentities(mysqli_real_escape_string($link, $_POST['Profile_sailor_idProfile_sailor']));
    $idChildren = htmlentities(mysqli_real_escape_string($link, $_POST['idChildren']));
     
    $query ="UPDATE Children SET Next_to_kin='$Next_to_kin', Address_of_nearest_relative='$Address_of_nearest_relative'  WHERE idChildren='$idChildren'";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
 
    if($result)
        echo "<span style='color:blue;'>Данные обновлены</span>";
}
 
// если запрос GET
if(isset($_GET['idChildren']))
{   
    $idChildren = htmlentities(mysqli_real_escape_string($link, $_GET['idChildren']));
     
    // создание строки запроса
    $query ="SELECT * FROM Children WHERE idChildren = '$idChildren'";
    // выполняем запрос
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    //если в запросе более нуля строк
    if($result && mysqli_num_rows($result)>0) 
    {
        $row = mysqli_fetch_row($result); // получаем первую строку
        $Next_to_kin = $row[1];
        $Address_of_nearest_relative = $row[2];
        $Profile_sailor_idProfile_sailor = $row[3];
         
        echo "<h2>Изменить модель</h2>
            <form method='POST'>
            <input type='hidden' name='idChildren' value='$idChildren' />
            <p>Введите модель:<br> 
            <input type='text' name='Next_to_kin' value='$Next_to_kin' /></p>
            <p>Производитель: <br> 
            <input type='text' name='Address_of_nearest_relative' value='$Address_of_nearest_relative' /></p>
            <p>Производитель: <br> 
            <input type='text' name='Profile_sailor_idProfile_sailor' value='$Profile_sailor_idProfile_sailor' /></p>
            <input type='submit' value='Сохранить'>
            </form>";
         
        mysqli_free_result($result);
    }
}
// закрываем подключение
mysqli_close($link);
?>
</body>
</html>