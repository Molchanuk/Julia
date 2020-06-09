
<?php
require_once 'connection.php'; // подключаем скрипт
//if(isset($_POST['idChildren']) && isset($_POST['Next_to_kin']) && 
if(  isset($_POST['Next_to_kin']) &&
isset($_POST['Address_of_nearest_relative'])
    && isset($_POST['Profile_sailor_idProfile_sailor'])){
    // подключаемся к серверу
    $link = mysqli_connect($host, $user, $password, $database) 
        or die("Ошибка " . mysqli_error($link)); 
     
    // экранирования символов для mysql
  // $idChildren = htmlentities(mysqli_real_escape_string($link, $_POST['idChildren']));
    $Next_to_kin = htmlentities(mysqli_real_escape_string($link, $_POST['Next_to_kin']));
    $Address_of_nearest_relative = htmlentities(mysqli_real_escape_string($link, $_POST['Address_of_nearest_relative']));
    $Profile_sailor_idProfile_sailor = htmlentities(mysqli_real_escape_string($link, $_POST['Profile_sailor_idProfile_sailor']));
     
    // создание строки запроса
  //  $query ="INSERT INTO Children VALUES('$idChildren', '$Next_to_kin', '$Address_of_nearest_relative',
$query ="INSERT INTO Children (Next_to_kin, Address_of_nearest_relative, Profile_sailor_idProfile_sailor) VALUES( '$Next_to_kin', '$Address_of_nearest_relative',
  '$Profile_sailor_idProfile_sailor')";
     
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
