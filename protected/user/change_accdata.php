<?php
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['changePass'])) {
	$postData = [
		'newpassword' => $_POST['newpassword'],
		'newpassword1' => $_POST['newpassword1'],
		'password' => $_POST['password']
	];

	if(empty($postData['password']) || empty($postData['newpassword']) || empty($postData['newpassword1'])) {
		echo "Hiányzó adat(ok)!";
	} else if ($postData['newpassword'] != $postData['newpassword1']) {
		echo "A jelszavak nem egyeznek!";
	} else if(strlen($postData['newpassword']) < 5 ) {
		echo "A jelszó túl rövid! Legalább 6 karakter hosszúnak kell lennie!";
	} else if(!ChangePassword( $_SESSION['username'], $postData['password'], $postData['newpassword'])) {
		echo "Sikertelen jelszócsere!";
	}

	$postData['newpassword'] = $postData['newpassword1'] = $postData['password'] = "";
}else if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['changeEmail'])) {
	$postData = [
		'password' => $_POST['password'],
		'newEmail' => $_POST['newEmail'],
		'newEmail1' => $_POST['newEmail1'],
		'email' => $_POST['email']
	];

	if(empty($postData['password']) || empty($postData['email']) || empty($postData['newEmail']) || empty($postData['newEmail1'])) {
		echo "Hiányzó adat(ok)!";
	} else if($postData['newEmail'] != $postData['newEmail1']) {
		echo "Az email címek nem egyeznek!";
	} else if(!filter_var($postData['email'], FILTER_VALIDATE_EMAIL)) {
		echo "Hibás email formátum!";
	} else if(!ChangeEmail( $_SESSION['username'],$postData['password'], $postData['email'], $postData['newEmail'])) {
		echo "Sikertelen E-Mail cím csere!";
	}

	$postData['password'] = "";
}
?>
<?php if(array_key_exists('d', $_GET) && !empty($_GET['d'])) :?>
			<?php if ($_GET['d']=="p") :?>
				
				<form method="post">
					<div class="form-row">
						<div class="form-group col-md-12">
							<input type="password" placeholder="Old password" class="form-control" id="changePassword" name="password" value="">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<input type="password" placeholder="New password" class="form-control" id="changePassword" name="newpassword" value="">
						</div>
						<div class="form-group col-md-6">
							<input type="password" placeholder="Confirm new password" class="form-control" id="changePassword1" name="newpassword1" value="">
						</div>
					</div>
					<div class="text-center">
						<button type="submit" class="btn btn-primary btn btn-primary col-md-3" name="changePass">Change Password</button>
					</div>
				</form>
			<?php else: ?>
				<form method="post">
					<div class="form-row">
						<div class="form-group col-md-12">
							<input type="email" placeholder="Old E-Mail" class="form-control" id="changeEmail" name="email" value="">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<input type="email" placeholder="New E-Mail" class="form-control" id="changeEmail" name="newEmail" value="">
						</div>
						<div class="form-group col-md-6">
							<input type="email" placeholder="Confirm new E-Mail" class="form-control" id="changeEmail" name="newEmail1" value="">
						</div>
						<div class="form-group col-md-12">
							<input type="password" placeholder="Password" class="form-control" id="password" name="password" value="">
						</div>
					</div>
					<div class="text-center">
						<button type="submit" class="btn btn-primary btn btn-primary col-md-3" name="changeEmail">Change E-Mail</button>
					</div>
				</form>
			<?php endif;?>
			<?php endif;?>
