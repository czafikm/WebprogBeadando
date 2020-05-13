<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
	$postData = [
		'first_name' => $_POST['first_name'],
		'last_name' => $_POST['last_name'],
		'email' => $_POST['email'],
		'email1' => $_POST['email1'],
		'password' => $_POST['password'],
		'password1' => $_POST['password1'],
		'username' => $_POST['username']
	];

	if(empty($postData['first_name']) || empty($postData['username']) || empty($postData['last_name']) || empty($postData['email']) || empty($postData['email1']) || empty($postData['password']) || empty($postData['password1'])) {
		echo "Hiányzó adat(ok)!";
	} else if($postData['email'] != $postData['email1']) {
		echo "Az email címek nem egyeznek!";
	} else if(!filter_var($postData['email'], FILTER_VALIDATE_EMAIL)) {
		echo "Hibás email formátum!";
	} else if ($postData['password'] != $postData['password1']) {
		echo "A jelszavak nem egyeznek!";
	} else if(strlen($postData['password']) < 5 ) {
		echo "A jelszó túl rövid! Legalább 6 karakter hosszúnak kell lennie!";
	} else if(strlen($postData['username']) < 5 || strlen($postData['username']) > 25) {
		echo "A felhasználónév túl rövid, vagy túl hosszú! Legalább 6 karakter hosszúnak, illetve legfeljebb 24 karakter hosszúnak kell lennie!";
	} else if(!UserRegister($postData['email'], $postData['password'], $postData['first_name'], $postData['last_name'], $postData['username'])) {
		echo "Sikertelen regisztráció!";
	}

	$postData['password'] = $postData['password1'] = "";
}
?>

<form method="post" class="text-center">
	<div class="form-row">
		<div class="form-group col-md-12">
			<input placeholder="Username" type="text" class="form-control" id="registerUsername" name="username" value="<?=isset($postData) ? $postData['username'] : "";?>">
		</div>
	</div>
	<div class="form-row">
		<div class="form-group col-md-6">
			<input type="text" placeholder="First Name" class="form-control" id="registerFirstName" name="first_name" value="<?=isset($postData) ? $postData['first_name'] : "";?>">
		</div>
		<div class="form-group col-md-6">
			<input type="text" placeholder="Last Name" class="form-control" id="registerLastName" name="last_name" value="<?=isset($postData) ? $postData['last_name'] : "";?>">
		</div>
	</div>

	<div class="form-row">
		<div class="form-group col-md-6">
			<input type="email" placeholder="Email" class="form-control" id="registerEmail" name="email" value="<?=isset($postData) ? $postData['email'] : "";?>">
		</div>
		<div class="form-group col-md-6">
			<input type="email" placeholder="Confirm Email" class="form-control" id="registerEmail1" name="email1" value="<?=isset($postData) ? $postData['email1'] : "";?>">
		</div>
	</div>

	<div class="form-row">
		<div class="form-group col-md-6">
			<input type="password" placeholder="Password" class="form-control" id="registerPassword" name="password" value="">
		</div>
		<div class="form-group col-md-6">
			<input type="password" placeholder="Confirm Password" class="form-control" id="registerPassword1" name="password1" value="">
		</div>
	</div>

	<button type="submit" class="btn btn-primary btn btn-primary col-md-3" name="register">Register</button>
</form>