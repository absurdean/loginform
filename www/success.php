<?php
    session_start();
    $name=$_SESSION['name'];
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
            <h2 style="display:inline-block;padding: 10px; text-align:center;" >
            ������������, <?php print $name;?>, �� ����� � ���� ������ �������</h2>
            <a href="index.php" style="float: right; padding:10px;">�����</a>
        </div>
    </body>
</html>