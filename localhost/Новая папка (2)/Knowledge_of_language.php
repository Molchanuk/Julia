
<?php
require_once 'connection.php'; // подключаем скрипт
 
if(isset($_POST['idKnowledge_of_language']) && isset($_POST['Language']) && isset($_POST['Proficiency'])
	&& isset($_POST['Mark']) && isset($_POST['Profile_sailor_idProfile_sailor'])){
 
    // подключаемся к серверу
    $link = mysqli_connect($host, $user, $password, $database) 
        or die("Ошибка " . mysqli_error($link)); 
     
    // экранирования символов для mysql
    $idKnowledge_of_language = htmlentities(mysqli_real_escape_string($link, $_POST['idKnowledge_of_language']));
    $Language = htmlentities(mysqli_real_escape_string($link, $_POST['Language']));
	$Proficiency = htmlentities(mysqli_real_escape_string($link, $_POST['Proficiency']));
    $Mark = htmlentities(mysqli_real_escape_string($link, $_POST['Mark']));
	$Profile_sailor_idProfile_sailor = htmlentities(mysqli_real_escape_string($link, $_POST['Profile_sailor_idProfile_sailor']));
     
    // создание строки запроса
    $query ="INSERT INTO Knowledge_of_language VALUES('$idKnowledge_of_language', '$Language', '$Proficiency', '$Mark' , '$Profile_sailor_idProfile_sailor')";
     
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
