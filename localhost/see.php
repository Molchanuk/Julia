<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

 <style type="text/css">

  body { background-color: black; }
  table{ background-color: white; 
  border-collapse: collapse;}
   .block1 { 
    height: 28px; 
    width: 750px;   
    background: #4CAF50;
    padding: 5px;
    padding-right: 20px; 
    border: solid 1px #4CAF50; 
    float: left;
    color: white;
   }
    .block2 { 
    height: 28px; 
    width: 750px;   
    background: white;
    padding: 5px;
    padding-right: 20px; 
    border: solid 1px #4CAF50; 
    float: left;
   } 
    .registerbtn1 {
    background-color: #4CAF50;
    color: white;
    padding: 5px 10px;
    margin: 0px 30px;
    border: none;
    cursor: pointer;
  
    opacity: 0.9;
}  

         th, td{
               border-collapse:collapse;
                border: 1px solid black; 
                text-align:center;  
                vertical-align: top; 
   }

    th {

    background:white; /* Цвет фона */

   }
      
   </style>
</head>
<body>
<div class="block1"> 
<form method="post" action="see.php">
           <B>Фильтр:</B>  
          <label for="Field">Поле :</label>
           <select name="Field">
            <option> Rank </option>
            <option> Citizenship </option>
           <option> Date_of_medical_examination </option>
           <option> Drugs_and_Alcohol_test_date </option>
           <option> International_passport_valid </option>
           <option> Ready_to_fight </option>
           <option> In_fight </option>
    </select>    
        <label for="Value">Значение :</label>
    <input type="text" name="Value" size="30"> 
</div>
<div class="block2"> 
           <B>Сортировка:</B>  
          <label for="Field1">Поле :</label>
           <select name="Field1">
            <option> Rank </option>
            <option> Citizenship </option>
           <option> Date_of_medical_examination </option>
           <option> Drugs_and_Alcohol_test_date </option>
           <option> International_passport_valid </option>
           <option> Ready_to_fight </option>
           <option> In_fight </option>
    </select>    
        <label for="radio">Направление :</label>
        <input type="radio" name="Sort" value="up"> По возр. 
        <input type="radio" name="Sort" value="down"> По убыв.  

    <input  type="submit"  value="Найти" class="registerbtn1">
</form>
</div>
<?php
require_once 'connection.php'; // подключаем скрипт
 
$link = mysqli_connect($host, $user, $password, $database) 
    or die("Ошибка " . mysqli_error($link)); 
////////////////// Сортировка ///////////////////
 $Sort ="";
 if($_POST['Field1']!= "" && $_POST['Sort']!=""){
    if($_POST['Sort']=="up")
       $direction =" ASC";
     if($_POST['Sort']=="down")
       $direction =" DESC";   
    $Sort = " ORDER BY `".$_POST['Field1']."`".$direction;
 }
    
/////////////////   Фильтр //////////////////////////     
//$query ="SELECT * FROM Profile_sailor";
 if($_POST['Field']!= "" && $_POST['Value']!=""){
    // Задали условие фильтра....
   $query = "SELECT `Surname`, `Name`, `Patronymic`, `Photo`, `Rank`, `Home_address`, `Phone_home`, `Mobile_phone`, `Citizenship`, `Marital_Status`, `Date_of_medical_examination`, `Drugs_and_Alcohol_test_date` ,
`National_Passport№`, `International_passport№`,
  `International_passport_valid`, `Seaman_passport№`, `Seaman_passport_valid`,`Ready_to_fight`, `In_fight`
  FROM `profile_sailor` WHERE `".$_POST['Field']."`='".$_POST['Value']."'".$Sort.";";
  // $query;
 }
 else {
   // Фильтра нет, выводим все...
  $query = "SELECT 
  `Surname`, `Name`, `Patronymic`, `Photo`, `Rank`, `Home_address`, `Phone_home`, `Mobile_phone`, `Citizenship`, `Marital_Status`, `Date_of_medical_examination`, `Drugs_and_Alcohol_test_date` ,
`National_Passport№`, `International_passport№`,
  `International_passport_valid`, `Seaman_passport№`, `Seaman_passport_valid`,`Ready_to_fight`, `In_fight`
 FROM `profile_sailor` " . $Sort." ;";
 //echo $query; 
 }

 
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
if($result)
{
    $rows = mysqli_num_rows($result); // количество полученных строк
     
    echo "<table><tr>
    <!--<th>Код профиля моряка</th> -->
    <th>Фамилия</th>
    <th>Имя</th>
    <th>Отчество</th>
    <th>Фото</th>
    <th>Звание</th>
    <!--<th>День рождения</th>-->
    <!--<th>Место рождения</th>-->
<th>Домашний адрес</th>
<th>Домашний телефон</th>
<th>Мобильный телефон</th>
<th>Гражданство</th>
<th>Семейное положение</th>
<!--<th>Рост</th>-->
<!--<th>Вес</th>-->
<th>Дата мед-осмотра</th>
<th>Drug Test date</th>
<th>Номер нац. паспорта</th>
<!--<th>Дата выдачи нац. паспорта</th>-->
<th>Номер загран. паспорт</th>
<!--<th>Дата выдачи загран. паспорта</th>-->
<th>Действителен до(загран. паспорт)</th>
<th>Номер паспорта моряка</th>
<!--<th>Дата выдачи паспорта моряка</th>-->
<th>Действителен до(паспорт моряка)</th>
<th>Готов к рейсу</th>
<th>В рейсе или нет</th>


    </tr>";
    for ($i = 0 ; $i < $rows ; ++$i)
    {
        $row = mysqli_fetch_row($result);
        echo "<tr>";
            for ($j = 0 ; $j < 19 ; ++$j) {
               if($j==3){
                 if($row[$j]!= "" ){
                   echo "<td> <img src='".$row[$j]."' height=100></td>";
                 }
                 if($row[$j]== null ){
                   echo "<td> <img src='noimage.png' height=100></td>";
             
                 }
               }
               else{
                echo "<td>$row[$j]</td>";
               }
            }
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