<script type="text/javascript">document.title = "Yasu - Register"</script>
<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
	$postData = [
		'email' => $_POST['emailYas'],
		'email1' => $_POST['email1Yas'],
		'password' => $_POST['passwordYas'],
		'password1' => $_POST['password1Yas'],
		'username' => $_POST['usernameYas']
	];

	if( empty($postData['username']) || empty($postData['email']) || empty($postData['email1']) || empty($postData['password']) || empty($postData['password1'])) {
		echo "<div class='text-center' style='font-weight:bold;color:red;'>Missing data(s)</div>";
	} else if($postData['email'] != $postData['email1']) {
		echo "<div class='text-center' style='font-weight:bold;color:red;'>The E-Mails does not match!</div>";
	} else if(!filter_var($postData['email'], FILTER_VALIDATE_EMAIL)) {
		echo "<div class='text-center' style='font-weight:bold;color:red;'>Wrong E-Mail format!</div>";
	} else if ($postData['password'] != $postData['password1']) {
		echo "<div class='text-center' style='font-weight:bold;color:red;'>The passwords does not match!</div>";
	} else if(strlen($postData['password']) < 5 ) {
		echo "<div class='text-center' style='font-weight:bold;color:red;'>The password is too short. Min. 6 chars!</div>";
	} else if(strlen($postData['username']) < 5 || strlen($postData['username']) > 25) {
		echo "<div class='text-center' style='font-weight:bold;color:red;'>Username too short or long. Min. 6 chars, max. 24 chars!</div>";
	} else if(!UserRegister($postData['email'], $postData['password'], $postData['username'])) {
		echo "<div class='text-center' style='font-weight:bold;color:red;'>Failed to register!</div>";
	}

	$postData['password'] = $postData['password1'] = "";
}
?>

<form method="post" class="text-center" style="margin-top: 20px;">
	<div class="form-row">
		<div class="form-group col-md-12">
			<input placeholder="Username" type="text" class="form-control" id="registerUsername" name="usernameYas" value="<?=isset($postData) ? $postData['username'] : "";?>">
		</div>
	</div>

	<div class="form-row">
		<div class="form-group col-md-6">
			<input type="email" placeholder="E-Mail address" class="form-control" id="registerEmail" name="emailYas" value="<?=isset($postData) ? $postData['email'] : "";?>">
		</div>
		<div class="form-group col-md-6">
			<input type="email" placeholder="Confirm E-Mail address" class="form-control" id="registerEmail1" name="email1Yas" value="<?=isset($postData) ? $postData['email1'] : "";?>">
		</div>
	</div>

	<div class="form-row">
		<div class="form-group col-md-6">
			<input type="password" placeholder="Password" autocomplete="new-password" class="form-control" id="registerPassword" name="passwordYas" value="">
		</div>
		<div class="form-group col-md-6">
			<input type="password" placeholder="Confirm Password" autocomplete="new-password" class="form-control" id="registerPassword1" name="password1Yas" value="">
		</div>
	</div>

	<button type="submit" class="btn btn-primary btn btn-primary col-md-3" name="register">Register</button>
</form>
