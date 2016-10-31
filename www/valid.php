<?php
    header('Content-Type: text/html;  charset=utf-8');
    setlocale(LC_ALL,'ru_RU.65001','rus_RUS.65001','Russian_Russia.65001','russian');
    session_start();//  вся процедура работает на сессиях. Именно в ней хранятся данные  пользователя, пока он находится на сайте. Очень важно запустить их в  самом начале странички!!!
    $_SESSION['msg']='';
    if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
        if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
        //заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
    if (empty($login) or empty($password)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
        {
        $_SESSION['msg']="Вы ввели не всю информацию";
        header("Location:index.php");
        exit ("<body><div align='center'><br/><br/><br/><h3>Вы ввели не всю информацию, вернитесь назад и заполните все поля!" . "<a href='index.php'> <b>Назад</b> </a></h3></div></body>");
        }
    //если логин и пароль введены,то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
    //удаляем лишние пробелы
    $login = trim($login);
    $password = md5(trim($password));
	
     //Подключаемся к базе данных.
    $dbcon = mysql_connect("localhost", "root", ""); 
    mysql_select_db("usersdb");
    mysql_query('SET NAMES CP1251');
	
    //извлекаем из базы все данные о пользователе с введенным логином
    $query="SELECT * FROM users WHERE login='{$login}'";
    $result = mysql_query($query);
    $myrow = mysql_fetch_array($result);
    if (empty($myrow["password"]))
    {
    //если пользователя с введенным логином не существует
    $_SESSION['msg']="Извините, введённый вами login или пароль неверный.";
    header("Location:index.php");
    exit ("<body><div align='center'><br/><br/><br/>
	<h3>Извините, введённый вами login или пароль неверный." . "<a href='index.php'> <b>Назад</b> </a></h3></div></body>");
    }
    else {
    //если существует, то сверяем пароли
    if ($myrow["password"]==$password) {    
    //если пароли совпадают, то запускаем пользователю сессию
    $_SESSION['login']=$myrow["login"];
    $_SESSION['name']=$myrow["name"];
    header("Location:success.php"); 
    mysql_close($db);
   exit();
    }
 else {
    //если пароли не сошлись
$_SESSION['msg']="Извините, введённый вами login или пароль неверный.";
header("Location:index.php");
    exit ("<body><div align='center'><br/><br/><br/>
	<h3>Извините, введённый вами login или пароль неверный." . "<a href='index.php'> <b>Назад</b> </a></h3></div></body>");    
    }
    }
    mysql_close($dbcon);
    ?>