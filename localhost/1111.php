<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
<?php
require_once 'connection.php'; // подключаем скрипт
 
$link = mysqli_connect($host, $user, $password, $database) 
    or die("Ошибка " . mysqli_error($link)); 
     
$query ="SELECT * FROM Profile_sailor";
 
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
if($result)
{
    $rows = mysqli_num_rows($result); // количество полученных строк
     
    echo "<table><tr><th>Код профиля моряка</th><th>Фамилия</th><th>Имя</th><th>Отчество</th><th>День рождения</th>
<th>Место рождения</th>
<th>Домашний адрес</th>
<th>Домашний телефон</th>
<th>Мобильный телефон</th>
<th>Гражданстов</th>
<th>Семейное положение</th>
<th>Рост</th>
<th>Вес</th>
<th>Дата мед-осмотра</th>
<th>Дата теста на алкоголь и наркотики</th>
<th>Номер нац. паспорта</th>
<th>Дата выдачи нац. паспорта</th>
<th>Номер загран. паспорт</th>
<th>Дата выдачи загран. паспорта</th>
<th>Действителен до(загран. паспорт)</th>
<th>Номер паспорта моряка</th>
<th>Дата выдачи паспорта моряка</th>
<th>Действителен до(паспорт моряка)</th>
<th>Готов к рейсу</th>
<th>В рейсе или нет</th>
<th>Звание</th>
<th>Фото</th>
    </tr>";
    for ($i = 0 ; $i < $rows ; ++$i)
    {
        $row = mysqli_fetch_row($result);
        echo "<tr>";
            for ($j = 0 ; $j < 27 ; ++$j) echo "<td>$row[$j]</td>";
        echo "</tr>";
    }
    echo "</table>";
     
    // очищаем результат
    mysqli_free_result($result);
}
 
mysqli_close($link);
?>
</body>
</html>