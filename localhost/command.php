
<?php
require_once 'connection.php'; // подключаем скрипт
 
if( isset($_POST['Salary']) && isset($_POST['Contract_for_ship_idContract_for_ship']) && isset($_POST['Rank_idRank']) ){
 
    // подключаемся к серверу
    $link = mysqli_connect($host, $user, $password, $database) 
        or die("Ошибка " . mysqli_error($link)); 
     
    // экранирования символов для mysql
   // $idCommand = htmlentities(mysqli_real_escape_string($link, $_POST['idCommand']));
    $Salary = htmlentities(mysqli_real_escape_string($link, $_POST['Salary']));
	 $Contract_for_ship_idContract_for_ship = htmlentities(mysqli_real_escape_string($link, $_POST['Contract_for_ship_idContract_for_ship']));
	  $Rank_idRank = htmlentities(mysqli_real_escape_string($link, $_POST['Rank_idRank']));
     
    // создание строки запроса
    $query ="INSERT INTO command (Salary, Contract_for_ship_idContract_for_ship, Rank_idRank)VALUES('$Salary', '$Contract_for_ship_idContract_for_ship', '$Rank_idRank')";
     
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
