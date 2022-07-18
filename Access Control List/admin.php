<?php 
session_start();
if(empty($_SESSION['user']))
{
	header('location: index.php');
}

//Restrict user or moderator to access admin page

if($_SESSION['user']['role']=='moderator')
{
	header('location: moderator.php');
}

if($_SESSION['user']['role']=='user')
{
	header('location: user.php');
}
?>

<h1>Welcome to <?php echo $_SESSION['user']['username']; ?> and your Role is: <?php echo $_SESSION['user']['role']; ?></h1>

<div>
	<a href="logout.php">Click to Logout</a>
</div>