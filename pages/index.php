<!DOCTYPE html>
<html>
<head>
	<title>Welcome to MYCHATAPP</title>
</head>
<body>
	<center>
	<div id="LoginDiv">
		<form id="form1" method="post" action="UserLogin.php">
			<link rel="stylesheet" type="text/css" href="login.css">
			<h2>Login Form</h2>
			<table>
				<tr>
					<td><input type="Email" name="UserMailLogin" placeholder="Enter Your Email" required></td>
				</tr>
				<tr>
					<td><input type="password" name="UserPasswordLogin" placeholder="Enter Your Password" required></td>
				</tr> 
				<tr>
					<td><input id="btn1" type="submit" value="Login"></td>
				</tr>
				<?php
					if (isset($_GET['error'])) {
				?>
				<tr>
					<td><span style="color: red;">Check Your Email or Password</span></td>
				</tr>
				<?php
					}
				?>
			</table>
			<h4><a href="signup.php" style="color: red; font-size: 18px;">Create Account!</a></h4>
		</form>
	</div>
	</center>
</body>
</html>