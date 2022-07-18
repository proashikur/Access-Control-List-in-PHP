<?php 
session_start();
$con=mysqli_connect('localhost','root','','acl');

if(isset($_POST['login']))
{
	$username=mysqli_real_escape_string($con,$_POST['username']);
	$password=mysqli_real_escape_string($con,$_POST['password']);

	if(empty($username) && empty($password))
	{
		$error="Fields are mendatory";
	}

	else
	{
		$result=mysqli_query($con, "SELECT * FROM user WHERE username='$username' AND password='$password'");
		$row=mysqli_fetch_assoc($result);
		$count=mysqli_num_rows($result);

		if($count==1)
		{
			$_SESSION['user']=array(

			'username'=>$row['username'],
			'password'=>$row['password'],
			'role'=>$row['role']

			);

			$role=$_SESSION['user']['role'];

			switch($role)
			{
				case 'user':
				header('location: user.php');
				break;

				case 'moderator':
				header('location: moderator.php');
				break;

				case 'admin':
				header('location: admin.php');
				break;
			}

		}
		else
		{
		$error="Your username or password is not found!";
		}
	}
}



?>

<!DOCTYPE html>
<html>
<head>
	<title>Access Controlo List Example</title>
</head>
<body>

	<div align="center">
		
		<h2>Provide Your Credential by Your Role</h2>

		<form method="POST" action="">

			<table>
				<tr>
					<td>Username</td>
					<td>
						<input type="text" name="username">
					</td>
				</tr>
				<tr>
					<td>Password</td>
					<td>
						<input type="password" name="password">
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="submit" name="login" value="Login">
					</td>
				</tr>
			</table>
			
		</form>
		<?php if(isset($error))
		{

		echo $error;
	}
		 ?>
	</div>

</body>
</html>