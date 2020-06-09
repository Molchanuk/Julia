<!DOCTYPE html>
<html lang="ru">
<head >
<META content="text/html; charset=windows-1251" http-equiv=Content-Type>
  <title>Кадровый учет крюингово агенства</title>
  <link href="style6.css" rel="stylesheet" type="text/css"/>
<?php
  //phpinfo();
  require_once 'connection.php'; // подключаем скрипт

  $link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link)); 

  // Запрос типы судна, название, флаг , компания-влвделец
$query = "SELECT `Type_of_vessel` as `Type`, `Ship_name` as `Ship`, `country.Name` as `Flag`, `Company` as `Company`  FROM   `ship`, `shipowners`, `country`
  WHERE `ship.Shipowners_idShipowners` = `shipowners.idShipowners` and
   `country.idCountry`  =  `ship.Country_idCountry`";


   
 $query = mysqli_query($link, $query);
 $Ship = array (
    "ShipName"  => array(),
    "ShipFlag"  => array(),
    "ShipOwner" => array()
); 
 $kol =0;
   while ($row = mysqli_fetch_assoc($query)) {
     array_push($Ship['ShipName'],$row['Ship']);
   array_push($Ship['ShipFlag'],$row['Flag']);
   array_push($Ship['ShipOwner'],$row['Company']);
   $kol++;
   }
//////////////////
 $query1 = "SELECT 
  Surname, Name, Patronymic, Rank, In_fight
  FROM `profile_sailor` WHERE In_fight=1 AND Rank='".$_POST["rank1"]."'";
  $query1 = mysqli_query($link, $query1);

 $query2 = "SELECT 
  Surname, Name, Patronymic, Rank, In_fight
  FROM `profile_sailor` WHERE In_fight=1 AND Rank='".$_POST["rank2"]."'";
  $query2 = mysqli_query($link, $query2);
  
/////////////////////////////////  
 ?>
</head> 
<body>
    <form action="Employment.php" method="POST">
     <!--  Это выпадающий список, заполненный должностями моряка из БД  -->
 
<TABLE border=1 width="100%">
<TR>
<TD colspan=2>
<label for="SelectShip">Судно: </label>    
  <select id="SelectShip" name="Ship">
    <?php
  for ($i=0; $i<$kol;$i++){
  $a = "<option value='" .$Ship['ShipName'][$i]. "'>".$Ship['ShipName'][$i]."</option>";
   echo $a;
  }
  
  ?> 
    </select>
   <input type= "submit" value="Уточнить сведения"> 
</TD>
</TR>
 <TR>
<TD> 
   <label for="ShipFlag"> Флаг: </label>  
   <input type="text" id="ShipFlag"
 <?php
 
 if(isset($_POST["Ship"])) {
    for ($i=0; $i<$kol;$i++){
    if($Ship['ShipName'][$i]== $_POST["Ship"]){
        echo "value=".$Ships['ShipFlag'][$i];
    }

 }
 }
?> 
> 
</TD>
<TD>  
   <label for="ShipOwner"> Компания: </label> 
   <input type="text" id="ShipOwner"
 <?php
 
 if(isset($_POST["Ship"])) {
    for ($i=0; $i<$kol;$i++){
    if($Ships['ShipName'][$i]== $_POST["Ship"]){
        echo "value=".$Ships['ShipOwner'][$i];
    }
  }
 }
?> 
>    
</TD>
</TR>
</TABLE>
<TABLE border =1 width=100%>
   <TR>
      <TD> Моряк   </TD>  
      <TD> Должность   </TD>    
     <TD> Дата начала контракта   </TD>     
     <TD> Дата окончания контракта   </TD>    
   </TR> 
   <TR>
      <TD><select id="seaman1" name="seaman1">
    <?php
  if(isset($_POST["rank1"])) {
  while ($row = mysqli_fetch_assoc($query1)) {
      $a = "<option value='" .$row['Surname']."'>".$row['Surname']." ".$row['Name']."  ".$row['Patronymic']."</option>";
   echo $a;
   }
  }
  ?> 
    </select>  </TD>  
      <TD>
    
    <input type="text" name="rank1" value='Master'
<?php
  if(isset($_POST["rank1"])) {
     echo " value='". $_POST["rank1"]."'";
   }
    ?>    
    >  
      </TD>   
     <TD>
   <input type="date" name="from1">
      </TD>     
     <TD> <input type="date" name="to1"></TD>   
   </TR> 
  

   <TR>
      <TD><select id="seaman2" name="seaman2">
    <?php
  if(isset($_POST["rank2"])) {
  while ($row = mysqli_fetch_assoc($query2)) {
      $a = "<option value='" .$row['Surname']."'>".$row['Surname']." ".$row['Name']."  ".$row['Patronymic']."</option>";
   echo $a;
   }
  }
  ?> 
    </select>  </TD>  
      <TD>
    
    <input type="text" name="rank2" value='Master'
<?php
  if(isset($_POST["rank2"])) {
     echo " value='". $_POST["rank2"]."'";
   }
    ?>    
    >  
      </TD>   
     <TD>
   <input type="date" name="from2">
      </TD>     
     <TD> <input type="date" name="to2"></TD>   
   </TR> 
   
</TABLE> 
   </form>
</body>
</html>