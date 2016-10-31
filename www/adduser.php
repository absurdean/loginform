<?php
session_start();
Header ('Location: index.php');
$name=$_POST['addname'];
$surname=$_POST['addsurname'];
$gender=$_POST['gender'];
$date=$_POST['birthday'];
$email=$_POST['email'];
$login=$_POST['addlogin'];
$password=md5($_POST['addpassword']);
//соединение с БД
$db = mysql_connect("localhost", "root","");
	mysql_select_db("usersdb");
	mysql_query('SET NAMES CP1251');
//запрос для проверки логина на совпадение
$validQuery="SELECT * FROM users WHERE login='{$login}'";
$validResult=mysql_query($validQuery);
if (mysql_num_rows($validResult) > 0) {
    //если такой логин уже существует в бд
    $_SESSION['regMsg']="Пользователь с таким логином уже существует, попробуйте другое имя";
    mysql_close($db);
    exit();	
    }
else{
    //запрос в БД на добавление пользователя по полученным данным из полей
	$query = "INSERT INTO users
			VALUES ('{$name}','{$surname}','{$gender}','{$date}','{$email}','{$login}','{$password}')";
	$result = mysql_query($query);
	mysql_close($db);
	exit();   
}
?>
