<?php
    header('Content-Type: text/html;  charset=utf-8');
    setlocale(LC_ALL,'ru_RU.65001','rus_RUS.65001','Russian_Russia.65001','russian');
    session_start();//  ��� ��������� �������� �� �������. ������ � ��� �������� ������  ������������, ���� �� ��������� �� �����. ����� ����� ��������� �� �  ����� ������ ���������!!!
    $_SESSION['msg']='';
    if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } //������� ��������� ������������� ����� � ���������� $login, ���� �� ������, �� ���������� ����������
        if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
        //������� ��������� ������������� ������ � ���������� $password, ���� �� ������, �� ���������� ����������
    if (empty($login) or empty($password)) //���� ������������ �� ���� ����� ��� ������, �� ������ ������ � ������������� ������
        {
        $_SESSION['msg']="�� ����� �� ��� ����������";
        header("Location:index.php");
        exit ("<body><div align='center'><br/><br/><br/><h3>�� ����� �� ��� ����������, ��������� ����� � ��������� ��� ����!" . "<a href='index.php'> <b>�����</b> </a></h3></div></body>");
        }
    //���� ����� � ������ �������,�� ������������ ��, ����� ���� � ������� �� ��������, ���� �� ��� ���� ����� ������
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
    //������� ������ �������
    $login = trim($login);
    $password = md5(trim($password));
	
     //������������ � ���� ������.
    $dbcon = mysql_connect("localhost", "root", ""); 
    mysql_select_db("usersdb");
    mysql_query('SET NAMES CP1251');
	
    //��������� �� ���� ��� ������ � ������������ � ��������� �������
    $query="SELECT * FROM users WHERE login='{$login}'";
    $result = mysql_query($query);
    $myrow = mysql_fetch_array($result);
    if (empty($myrow["password"]))
    {
    //���� ������������ � ��������� ������� �� ����������
    $_SESSION['msg']="��������, �������� ���� login ��� ������ ��������.";
    header("Location:index.php");
    exit ("<body><div align='center'><br/><br/><br/>
	<h3>��������, �������� ���� login ��� ������ ��������." . "<a href='index.php'> <b>�����</b> </a></h3></div></body>");
    }
    else {
    //���� ����������, �� ������� ������
    if ($myrow["password"]==$password) {    
    //���� ������ ���������, �� ��������� ������������ ������
    $_SESSION['login']=$myrow["login"];
    $_SESSION['name']=$myrow["name"];
    header("Location:success.php"); 
    mysql_close($db);
   exit();
    }
 else {
    //���� ������ �� �������
$_SESSION['msg']="��������, �������� ���� login ��� ������ ��������.";
header("Location:index.php");
    exit ("<body><div align='center'><br/><br/><br/>
	<h3>��������, �������� ���� login ��� ������ ��������." . "<a href='index.php'> <b>�����</b> </a></h3></div></body>");    
    }
    }
    mysql_close($dbcon);
    ?>