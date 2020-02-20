<?php 
	session_set_cookie_params(0,'/','localhost',true,true);
	session_start();
	if (!isset($_SESSION['user'])) {
		header("location: index.php?controller=User&action=login");
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Product</title>
	<meta charset="utf-8">
</head>
<body>
	<div>
		<div style="font-size: 20px;">Hello, <span style="font-style: italic;"><?php echo $_SESSION['user'] ?></span></div>
		<div><a href="index.php?controller=User&action=logout"><button>Log out</button></a></div>
	</div>
	<div align="center">
		<div style="margin-top: 50px;"><h2 style="text-transform: uppercase;letter-spacing: 2px;">Edit product</h2></div>
		<div style="margin-top: 50px;">
			<form method="POST" action="<?php echo htmlspecialchars("");?>">
				<table>
					<tr>
						<td style="text-align: right;">ID:</td>
						<td style="text-align: left"><?php echo $prodEdit['p_id']; ?></td>
					</tr>
					<tr>
						<td style="text-align: right;">Name:</td>
						<td style="text-align: left"><input type="text" name="name" value="<?php echo $prodEdit['p_name']; ?>"></td>
						<td><?php echo $nameErr; ?></td>
					</tr>
					<tr>
						<td style="text-align: right">Category:</td>
						<td style="text-align: left"><input type="text" name="category" value="<?php echo $prodEdit['p_category']; ?>"></td>
						<td><?php echo $cateErr; ?></td>
					</tr>
					<tr>
						<td style="text-align: right">Producer:</td>
						<td style="text-align: left"><input type="text" name="producer" value="<?php echo $prodEdit['p_producer']; ?>"></td>
						<td><?php echo $prodErr; ?></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" name="edit" value="Confirm" ></td>		
					</tr>
				</table>
			</form>
			<div style="margin-right: 70px;">
				<a href="index.php"><button>Home</button></a>
			</div>
		</div>

	</div>
</body>
</html>