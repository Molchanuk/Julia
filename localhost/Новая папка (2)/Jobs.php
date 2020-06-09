
<?php
require_once 'connection.php'; // подключаем скрипт
 
if(isset($_POST['idJobs']) && isset($_POST['Salary']) && isset($_POST['Estimated_date_of_taking_up_position'])
	&& isset($_POST['Application_for_job_idApplication_for_job'])){
 
    // подключаемся к серверу
    $link = mysqli_connect($host, $user, $password, $database) 
        or die("Ошибка " . mysqli_error($link)); 
     
    // экранирования символов для mysql
    $idJobs = htmlentities(mysqli_real_escape_string($link, $_POST['idJobs']));
    $Salary = htmlentities(mysqli_real_escape_string($link, $_POST['Salary']));
	$Estimated_date_of_taking_up_position = htmlentities(mysqli_real_escape_string($link, $_POST['Estimated_date_of_taking_up_position']));
    $Application_for_job_idApplication_for_job = htmlentities(mysqli_real_escape_string($link, $_POST['Application_for_job_idApplication_for_job']));
     
    // создание строки запроса
    $query ="INSERT INTO jobs VALUES('$idJobs', '$Salary', '$Estimated_date_of_taking_up_position', '$Application_for_job_idApplication_for_job')";
     
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
