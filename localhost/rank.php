
<?php
require_once 'connection.php'; // подключаем скрипт
 
if(isset($_POST['idRank']) && ($_POST['Availability_of_the_license_office']) 
 && isset($_POST['Confirmation_of_the_license']) 
 && isset($_POST['Confirmation_code']) && isset($_POST['Code_diploma']) 
 && isset($_POST['Type_of_diploma']) && isset($_POST['Jobs_idJobs'])){
 
    // подключаемся к серверу
    $link = mysqli_connect($host, $user, $password, $database) 
        or die("Ошибка " . mysqli_error($link)); 
     
    // экранирования символов для mysql
	$idRank = htmlentities(mysqli_real_escape_string($link, $_POST['idRank']));
	$Availability_of_the_license_office = htmlentities(mysqli_real_escape_string($link, $_POST['Availability_of_the_license_office']));
    $Confirmation_of_the_license = htmlentities(mysqli_real_escape_string($link, $_POST['Confirmation_of_the_license']));
    $Confirmation_code = htmlentities(mysqli_real_escape_string($link, $_POST['Confirmation_code']));
    $Code_diploma = htmlentities(mysqli_real_escape_string($link, $_POST['Code_diploma']));
	$Type_of_diploma = htmlentities(mysqli_real_escape_string($link, $_POST['Type_of_diploma']));
    $Jobs_idJobs = htmlentities(mysqli_real_escape_string($link, $_POST['Jobs_idJobs']));
	
    // создание строки запроса
    $query ="INSERT INTO rank_1 VALUES('$idRank', '$Availability_of_the_license_office',
	 '$Confirmation_of_the_license', '$Confirmation_code', '$Code_diploma',
	 '$Type_of_diploma', '$Jobs_idJobs')";
     
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
