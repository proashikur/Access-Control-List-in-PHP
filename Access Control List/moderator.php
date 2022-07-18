<?php 
session_start();
if(empty($_SESSION['user']))
{
	header('location: index.php');
}

if($_SESSION['user']['role']=='user')
{
	header('location: user.php');
}

if($_SESSION['user']['role']=='admin')
{
	header('location: admin.php');
}
?>

<h1>Welcome to <?php echo $_SESSION['user']['username']; ?>Page!</h1>
<div>
	<h2>User Name is:<?php echo $_SESSION['user']['username']; ?>and your role is: <?php echo $_SESSION['user']['role']; ?></h2>
		<div>
		<a href="logout.php">Click to Logout</a>
		</div>
</div>

