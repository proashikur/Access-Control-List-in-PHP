<?php 
session_start();
if(empty($_SESSION['user']))
{
	header('location: index.php');
}

if($_SESSION['user']['role']=='admin')
{
	header('location: admin.php');
}

if($_SESSION['user']['role']=='moderator')
{
	header('location: moderator.php');
}
?>

<h1>Welcome to <?php echo $_SESSION['user']['username']; ?>Page</h1>
<div>
	<h2>User name is: <?php  echo $_SESSION['user']['username'];?>and your role is: <?php echo $_SESSION['user']['role']; ?></h2>
	<div>
	<a href="logout.php">Click to Logout</a>
	</div>
</div>