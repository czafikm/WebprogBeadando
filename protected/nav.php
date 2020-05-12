<hr>

<a href="index.php">Home</a>
<?php if(!IsUserLoggedIn()) : ?>
	<span> &nbsp; | &nbsp; </span>
	<a href="index.php?P=login">Login</a>
	<span> &nbsp; | &nbsp; </span>
	<a href="index.php?P=register">Register</a>
<?php else : ?>
	<?php if(isset($_SESSION['permission']) && $_SESSION['permission'] = 2) : ?>
		<span> &nbsp; || &nbsp; </span>
		<a href="index.php?P=users">User list</a>
		<span> &nbsp; | &nbsp; </span>
		<a href="index.php?P=list_worker">List workers</a>
		<span> &nbsp; | &nbsp; </span>
		<a href="index.php?P=add_worker">Add worker</a>
		<span> &nbsp; || &nbsp; </span>
	<?php else : ?>
	<span> &nbsp; | &nbsp; </span>
	<a href="index.php?P=character">Karakter</a>
	<span> &nbsp; | &nbsp; </span>
	<a href="index.php?P=skins">Skin választás</a>
	<span> &nbsp; | &nbsp; </span>
	<a href="index.php?P=mission">Küldetés</a>
	<span> &nbsp; | &nbsp; </span>
	<a href="index.php?P=logout">Logout</a>
<?php endif; ?>

<hr>