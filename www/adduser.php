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
//���������� � ��
$db = mysql_connect("localhost", "root","");
	mysql_select_db("usersdb");
	mysql_query('SET NAMES CP1251');
//������ ��� �������� ������ �� ����������
$validQuery="SELECT * FROM users WHERE login='{$login}'";
$validResult=mysql_query($validQuery);
if (mysql_num_rows($validResult) > 0) {
    //���� ����� ����� ��� ���������� � ��
    $_SESSION['regMsg']="������������ � ����� ������� ��� ����������, ���������� ������ ���";
    mysql_close($db);
    exit();	
    }
else{
    //������ � �� �� ���������� ������������ �� ���������� ������ �� �����
	$query = "INSERT INTO users
			VALUES ('{$name}','{$surname}','{$gender}','{$date}','{$email}','{$login}','{$password}')";
	$result = mysql_query($query);
	mysql_close($db);
	exit();   
}
?>
