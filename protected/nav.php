<hr>

<a href="index.php">Home</a>
<?php if(!IsUserLoggedIn()) : ?>
	<span> &nbsp; | &nbsp; </span>
	<a href="index.php?P=login">Login</a>
	<span> &nbsp; | &nbsp; </span>
	<a href="index.php?P=register">Register</a>
<?php else : ?>
	<span> &nbsp; | &nbsp; </span>
	<a href="index.php?P=character">Karakter</a>
	<span> &nbsp; | &nbsp; </span>
	<a href="index.php?P=skins">Skin választás</a>
	<span> &nbsp; | &nbsp; </span>
	<a href="index.php?P=logout">Logout</a>
<?php endif; ?>

<hr>