<!DOCTYPE html>
<html> 
<head>
<META content="text/html; charset=windows-1251" http-equiv=Content-Type>
<?php
require_once 'connection.php';

$link = mysqli_connect($host, $user, $password, $database) 
    or die("Ошибка " . mysqli_error($link)); 
// Я сделал еще одну таблицу sailorposition, в которой описываются возможные должности моряков...
$query1 = "SELECT sailorPosition from sailorposition";
$query1 = mysqli_query($mysqli, $query);
$mysqli->close(); // Не забывайте закрывать соединения!!!!!
/////////////////////////////////////////////
?>
</head> 
<body>

<form action="upload.php" method="post" enctype="multipart/form-data">
    <table border=0>
      <tr>
        <td>	  
   фамилия:  
        </td>
        <td>	  
  <input type="text" name="sailorFamily" id="family">
        </td>	
     <td rowspan=2> 
         <IMG src = "noimage.png"> <br>
	Select image to upload: <input type="file" name="fileToUpload" id="fileToUpload">  	 
    </td>			
     </tr>
         <tr>
        <td>	 	 
   должность: 
      </td>
        <td>	 	 
  <!--  Это выпадающий список, заполненный должностями моряка из БД  -->		
  <select name="sailorPosition" >
    <?php
   while ($row = mysqli_fetch_assoc($query1)) {
     $a = "<option value='" .$row['sailorPosition']. "'>".$row['sailorPosition']."</option>";
	 echo $a;
   }
  ?> 
    </select>      </td>	 
      </tr>	  
   <tr>
   <td colspan=3 align="center">
  <input type="submit" value="Upload Image" name="submit">
   </td>
   </tr>
  </table>
</form>

</body>
</html>
