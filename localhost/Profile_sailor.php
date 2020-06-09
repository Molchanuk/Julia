
<?php
require_once 'connection.php'; // подключаем скрипт
 
if(isset($_POST['idProfile_sailor']) && isset($_POST['Surname']) && isset($_POST['Name'])
 && isset($_POST['Patronymic']) && isset($_POST['Date_of_birth']) && isset($_POST['Place_of_birth'])
 && isset($_POST['Home_address']) && isset($_POST['Phone_home']) && isset($_POST['Mobile_phone'])
 && isset($_POST['Citizenship']) && isset($_POST['Marital_Status']) && isset($_POST['Height'])
 && isset($_POST['Weight']) && isset($_POST['Date_of_medical_examination'])
 && isset($_POST['Drugs_and_Alcohol_test_date'])
 && isset($_POST['National_passport№']) && isset($_POST['National_passport_issued'])
 && isset($_POST['International_passport№'])
 && isset($_POST['International_passport_issued']) && isset($_POST['International_passport_valid']) 
 && isset($_POST['Seaman_passport№'])
 && isset($_POST['Seaman_passport_issued']) && isset($_POST['Seaman_passport_valid'])
 && isset($_POST['Ready_to_fight'])
 && isset($_POST['In_fight']) && isset($_POST['Rank']) && isset($_POST['Photo'])){
 
    // подключаемся к серверу
    $link = mysqli_connect($host, $user, $password, $database) 
        or die("Ошибка " . mysqli_error($link)); 
     
    // экранирования символов для mysql
    $idProfile_sailor = htmlentities(mysqli_real_escape_string($link, $_POST['idProfile_sailor']));
    $Surname = htmlentities(mysqli_real_escape_string($link, $_POST['Surname']));
	$Name = htmlentities(mysqli_real_escape_string($link, $_POST['Name']));
    $Patronymic = htmlentities(mysqli_real_escape_string($link, $_POST['Patronymic']));
	$Date_of_birth = htmlentities(mysqli_real_escape_string($link, $_POST['Date_of_birth']));
    $Place_of_birth = htmlentities(mysqli_real_escape_string($link, $_POST['Place_of_birth']));
	$Home_address = htmlentities(mysqli_real_escape_string($link, $_POST['Home_address']));
    $Phone_home = htmlentities(mysqli_real_escape_string($link, $_POST['Phone_home']));
	$Mobile_phone = htmlentities(mysqli_real_escape_string($link, $_POST['Mobile_phone']));
	$Citizenship = htmlentities(mysqli_real_escape_string($link, $_POST['Citizenship']));
	$Marital_Status = htmlentities(mysqli_real_escape_string($link, $_POST['Marital_Status']));
	$Height = htmlentities(mysqli_real_escape_string($link, $_POST['Height']));
	$Weight = htmlentities(mysqli_real_escape_string($link, $_POST['Weight']));
	$Date_of_medical_examination = htmlentities(mysqli_real_escape_string($link, $_POST['Date_of_medical_examination']));
	$Drugs_and_Alcohol_test_date = htmlentities(mysqli_real_escape_string($link, $_POST['Drugs_and_Alcohol_test_date']));
	$National_passport№ = htmlentities(mysqli_real_escape_string($link, $_POST['National_passport№']));
	$National_passport_issued = htmlentities(mysqli_real_escape_string($link, $_POST['National_passport_issued']));
	$International_passport№ = htmlentities(mysqli_real_escape_string($link, $_POST['International_passport№']));
	$International_passport_issued = htmlentities(mysqli_real_escape_string($link, $_POST['International_passport_issued']));
	$International_passport_valid = htmlentities(mysqli_real_escape_string($link, $_POST['International_passport_valid']));
	$Seaman_passport№ = htmlentities(mysqli_real_escape_string($link, $_POST['Seaman_passport№']));
	$Seaman_passport_issued = htmlentities(mysqli_real_escape_string($link, $_POST['Seaman_passport_issued']));
	$Seaman_passport_valid = htmlentities(mysqli_real_escape_string($link, $_POST['Seaman_passport_valid']));
	$Ready_to_fight = htmlentities(mysqli_real_escape_string($link, $_POST['Ready_to_fight']));
	$In_fight = htmlentities(mysqli_real_escape_string($link, $_POST['In_fight']));
	$Rank = htmlentities(mysqli_real_escape_string($link, $_POST['Rank']));
	$Photo = htmlentities(mysqli_real_escape_string($link, $_POST['Photo']));
     
    // создание строки запроса
    $query ="INSERT INTO profile_sailor VALUES('$idProfile_sailor', '$Surname', '$Name', '$Patronymic',
	'$Date_of_birth', '$Place_of_birth', '$Home_address', '$Phone_home', '$Mobile_phone', '$Citizenship',
	'$Marital_Status', '$Height', '$Weight', '$Date_of_medical_examination',  
	'$Drugs_and_Alcohol_test_date',	'$National_passport№', '$National_passport_issued', '$International_passport№',
	'$International_passport_issued', '$International_passport_valid', '$Seaman_passport№', 
	'$Seaman_passport_issued', '$Seaman_passport_valid', '$Ready_to_fight', 
	'$In_fight', '$Rank', '$Photo')";
     
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
