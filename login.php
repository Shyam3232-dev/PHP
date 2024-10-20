<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
	<div class="image">
		<img src="school.jpeg">
	</div>
<div>
	<form method="post" action="login.php">
		<h1>ADMIN LOGIN</h1><hr>
		USER:<input type="textbox" name="user" required=""><br>
		PASSWORD:<input type="password" name="pass" required=""><br>
		<input type="submit" name="sub">
		<input type="reset" name="re">
	</form>		
</div>
</body>
</html>
<?php
if (isset($_POST["sub"])) {
	if ("Admin"==$_POST["user"] && "admin"==$_POST["pass"]) {
		header("location:admin.php");
	}
	else{
		echo"<html><head><p style='color:red;'>WRONG USER NAME OR PASSWORD</p></head></html>";
	}
}
?>
