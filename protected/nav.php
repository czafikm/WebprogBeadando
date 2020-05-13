<hr style="height: 0px;">
<div id="navbar" >
	<a href="index.php">Home</a>
<?php if(!IsUserLoggedIn()) : ?>
	<span> &nbsp; | &nbsp; </span>
	<a href="index.php?P=login">Login</a>
	<span> &nbsp; | &nbsp; </span>
	<a href="index.php?P=register">Register</a>
<?php else : ?>
	<?php if(isset($_SESSION['permission']) && $_SESSION['permission'] == 2) : ?>
		<span> &nbsp; | &nbsp; </span>
		<a href="index.php?P=users">User list (admin)</a>
	<?php endif; ?>
	<span> &nbsp; | &nbsp; </span>
	<a href="index.php?P=character">Profile</a>
	<span> &nbsp; | &nbsp; </span>
	<a href="index.php?P=skins">Skins</a>
	<span> &nbsp; | &nbsp; </span>
	<a href="index.php?P=mission">Mission</a>
	<span> &nbsp; | &nbsp; </span>
	<a href="index.php?P=toplist">Toplist</a>
	<span> &nbsp; | &nbsp; </span>
	<a href="index.php?P=account">Account</a>
	<span> &nbsp; | &nbsp; </span>
	<a href="index.php?P=logout">Logout</a>
<?php endif; ?>
</div>


<hr>