<?php
session_start();
?>
<html>
	<head>
		<title>Company N</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/> 
		<meta charset="windows-1251"/>
		<link href="css/style.css" rel="stylesheet"/>
	</head>
<body>
<div class="content">
<div class="login">
    <h2>Вход в систему</h2>
        <form action="valid.php" method="post">
        <div class="formfield">
            <div class="field">
                <label>логин</label>
                <input name="login" type="text" size="15" maxlength="15"/><br/>
            </div>
            <div class="field">
              <label>пароль</label>
              <input name="password" type="password" size="15" maxlength="15"/><br/><br/> 
            </div> 
            <input class="btn" type="submit" value="войти"/><br/><br/></div>  
        </form>
        <p><?php print $_SESSION['msg']; ?></p>
</div>

<div class="register">
    <h3>Если вы еще не зарегистрированы, заполните форму ниже</h3>
        <form action="adduser.php" method="post">
        <div class="formfield">
        <div class="field">
            <label>имя*</label>
            <input name="addname" type="text" size="20" maxlength="20" required=""/><br/>
        </div>
        <div class="field">
            <label>фамилия</label>
            <input name="addsurname" type="text" size="20" maxlength="20"/><br/>
        </div>
        <div class="field">
        <label>пол</label>
          <input name="gender" type="radio" size="20" maxlength="20"  value="male"/>мужской
          <input name="gender" type="radio" size="20" maxlength="20"  value="female"/>женский<br/>
        </div>
        <div class="field">
            <label>дата рождения</label>
            <input name="birthday" type="date" size="20" maxlength="20"/><br/>
        </div>
        <div class="field">
            <label>email*</label>
            <input name="email" type="text" size="20" maxlength="20" required="" pattern="\S+@[a-z]+.[a-z]+"/><br/>
        </div>
        <div class="field">
            <label>логин*</label>
            <input name="addlogin" type="text" size="20" maxlength="20" title="Логин должен содержать больше 3 символов" required="" pattern="[A-Za-z0-9_-]{3,}"/><br/>
        </div>
        <div class="field">
            <label>пароль*</label>
            <input name="addpassword" type="text" size="20" maxlength="20" title="Пароль должен содержать больше 6 символов" required="" pattern="[A-Za-z0-9_-]{6,}"/><br/><br/>
        </div>
        <input class="btn" type="submit" value="зарегистрироваться"/><br/><br/>
        </div>
        </form>
        <p><?php print $_SESSION['regMsg']; ?></p>
        <p style="color:#000;">Поля обозначенные символом * обязательны для заполнения</p>
</div>
</div>
</body>
</html>
<?php
session_destroy();
?>