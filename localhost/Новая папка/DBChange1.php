
 <?php
3 $dbHost = 'localhost';
4 $dbUser = 'root';
5 $dbPass = '14121998';
6 $dbName = 'molchanuk';
7 $password = $_POST['password'];

8 $con = mysqli_connect($dbHost, $dbUser,$dbPass) or die(mysqli_error());
9 $db_selected = mysqli_select_db($con, $dbName);
10
11 $CountryID = $REQUEST['CountryID'];
12 $CountryName = $REQUEST['CountryName'];
13
14 $query ="INSERT INTO 'molchanuk'’.'country' ('idCountry', 'Name') VALUES (' . $CountryID . ',  ' . $CountryName.    ');"; // Тут на картинке нет окончания запроса
15
16 $result = mysqli_query ($con, $query);
17 echo ' Данные в таблицу COUNTRY добавлены ... <br>';
18 ?>








<form class="login_form" method="POST">
						<h1 style="text-align: center;">Авторизация</h1>
						<br>
						<input type="password" name="password" class="input-field" placeholder="Пароль" required autofocus>
						<br><br>
						<button type="submit" class="button">Войти</button>
						<br><br>
					</form>
					
<?php
				if (isset($_POST['password'])) {
				    $password = $_POST['password'];

					$result = mysqli_query($connection, "SELECT username FROM users WHERE password='$password'") or die(mysqli_error($connection));
					$count = mysqli_num_rows($result);
					$row = mysqli_fetch_array($result);
					$username = $row['root'];
					
					if ($count == 1) {
						$_SESSION['root'] = $username;
					}else {
						echo "Неверно введён пароль";
					}
				}

				if (isset($_SESSION['root'])) {
					echo "Авторизация успешна, " . $_SESSION['username']. ". <br><br>";
					echo " <a href='userinfo.php'>Личный кабинет</a>.<br><br>";
					echo "<a href='logout.php'>Выйти</a>.";
				}
?>					