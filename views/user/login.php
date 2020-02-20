<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
</head>
<body>
	<h2><a href="index.php?controller=User&action=login&id="></a></h2>
	<div align="center" style="margin-top: 10%;">
		<div><h2 style="text-transform: uppercase;letter-spacing: 2px;">Login</h2></div>
		<div>
			<form action="<?php echo htmlspecialchars('') ?>" method= "POST">
				<table>
					<tr>
						<td style="text-align: right">Username: </td>
						<td style="text-align: left"><input type="text" name="username" placeholder="username"></td>
					</tr>
					<tr>
						<td style="text-align: right">Password:</td>
						<td style="text-align: left"><input type="password" name="password" placeholder="password"></td>
					<tr>
						<td style="text-align: right;"></td>
						<td style="text-align: left;"><?php echo $err; ?></td>
					</tr>
					<tr>
						<td style="text-align: right;"><input type="checkbox" name="remember"></td>
						<td style="text-align: left;">Remember me</td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" name="login" value="Log in"></td>
					</tr>
				</table>
			</form>
		</div>
	</div>
</body>
</html>