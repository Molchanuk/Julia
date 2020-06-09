
<?php
require_once 'connection.php'; // подключаем скрипт
 
if( isset($_POST['Date_of_issue']) && isset($_POST['Date_of']) 
	&& isset($_POST['The_type_of_visa']) && isset($_POST['Profile_sailor_idProfile_sailor']) 
 && isset($_POST['The_country_issued_visa_idThe_country_issued_visa'])){
 
    // подключаемся к серверу
    $link = mysqli_connect($host, $user, $password, $database) 
        or die("Ошибка " . mysqli_error($link)); 
     
    // экранирования символов для mysql
   // $idVisas = htmlentities(mysqli_real_escape_string($link, $_POST['idVisas']));
    $Date_of_issue = htmlentities(mysqli_real_escape_string($link, $_POST['Date_of_issue']));
	$Date_of = htmlentities(mysqli_real_escape_string($link, $_POST['Date_of']));
    $The_type_of_visa = htmlentities(mysqli_real_escape_string($link, $_POST['The_type_of_visa']));
	$Profile_sailor_idProfile_sailor = htmlentities(mysqli_real_escape_string($link, $_POST['Profile_sailor_idProfile_sailor']));
    $The_country_issued_visa_idThe_country_issued_visa = htmlentities(mysqli_real_escape_string($link, $_POST['The_country_issued_visa_idThe_country_issued_visa']));
     
    // создание строки запроса
    $query ="INSERT INTO Visas (Date_of_issue, Date_of, The_type_of_visa, 
    Profile_sailor_idProfile_sailor, The_country_issued_visa_idThe_country_issued_visa) VALUES('$Date_of_issue','$Date_of','$The_type_of_visa', 
	'$Profile_sailor_idProfile_sailor', '$The_country_issued_visa_idThe_country_issued_visa')";
     
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
