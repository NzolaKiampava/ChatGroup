<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="signup.css">
	<title>Welcome to MYCHATAPP</title>
</head>
<body>
	<center>
	<div id="Signup Div">
		<form id="form2" method="post" action="Insert User.php">
			<h2>SignUp Form</h2>
			<table>
				<tr>
					<td><input type="text" name="UserName" placeholder="Enter Your Name" required></td>
				</tr>
				<tr>
					<td><input type="email" name="UserMail" placeholder="Enter Your Email" required>
					</td>
				</tr>
				<tr>
					<td><input type="password" name="UserPassword" placeholder="Enter Your Password" required>
					</td>
				</tr>
				<tr>
					<td><input id="btn2" type="submit" value="Signup"></td>
				</tr>
				<?php
					if (isset($_GET['success'])) {
				?>
				<tr>
					<td><span style="color: green;"></span>UserInserted</td>
				</tr>    
				<?php
					}
				?>
			</table>
			<h4><a href="index.php" style="color: red; font-size: 18px;">Already Have an Account!</a></h4>
		</form>
	</div>
	</center>
</body>
</html>