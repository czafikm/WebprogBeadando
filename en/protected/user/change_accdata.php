<script type="text/javascript">document.title = "Yasu - Account"</script>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['changePass'])) {
	$postData = [
		'newpassword' => $_POST['newpassword'],
		'newpassword1' => $_POST['newpassword1'],
		'password' => $_POST['password']
	];

	if(empty($postData['password']) || empty($postData['newpassword']) || empty($postData['newpassword1'])) {
		echo "<div class='text-center' style='font-weight:bold;color:red;'>Missing data(s)!</div>";
	} else if ($postData['newpassword'] != $postData['newpassword1']) {
		echo "<div class='text-center' style='font-weight:bold;color:red;'>Passwords do not match!</div>";
	} else if(strlen($postData['newpassword']) < 5 ) {
		echo "<div class='text-center' style='font-weight:bold;color:red;'>The password is too short! Min. 6 chars!</div>";
	} else if(!ChangePassword( $_SESSION['username'], $postData['password'], $postData['newpassword'])) {
		echo "<div class='text-center' style='font-weight:bold;color:red;'>Failed to change the password!</div>";
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
		echo "<div class='text-center' style='font-weight:bold;color:red;'>Missing data(s)!</div>";
	} else if($postData['newEmail'] != $postData['newEmail1']) {
		echo "<div class='text-center' style='font-weight:bold;color:red;'>Emails do not match!</div>";
	} else if(!filter_var($postData['email'], FILTER_VALIDATE_EMAIL)) {
		echo "<div class='text-center' style='font-weight:bold;color:red;'>Wrong email format!</div>";
	} else if(!ChangeEmail( $_SESSION['username'],$postData['password'], $postData['email'], $postData['newEmail'])) {
		echo "<div class='text-center' style='font-weight:bold;color:red;'>Failed to change the E-Mail!</div>";
	}

	$postData['password'] = "";
}else if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['deleteProfile'])) {
	$postData = [
		'password' => $_POST['passwordDel'],
		'email' => $_POST['emailDel'],
	];

	if(empty($postData['password']) || empty($postData['email'])) {
		echo "<div class='text-center' style='font-weight:bold;color:red;'>Missing data(s)!</div>";
	}else if(!DeleteUser($postData['email'], $postData['password'], $_SESSION['username'])) {
    	echo "<div class='text-center' style='font-weight:bold;color:red;'>Wrong E-Mail or password!</div>";
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
						<button type="submit" class="btn btn-primary btn btn-primary col-md-3" name="changePass">Submit</button>
					</div>
				</form>
			<?php elseif ($_GET['d']=="e"): ?>
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
						<button type="submit" class="btn btn-primary btn btn-primary col-md-3" name="changeEmail">Submit</button>
					</div>
				</form>
			<?php elseif ($_GET['d']=="d"): ?>
				<form method="post" autocomplete="new-password">
					


					<div class="container  col-md-5">
						<table class="table table-striped">
							<thead class="thead-dark"  style="font-weight: bold;">
								<tr>
									<th scope="col"  style="font-weight: bold; font-size: 100%;">Username</th>
									<th scope="col"  style="font-weight: bold; font-size: 100%;">Level</th>
									<th scope="col"  style="font-weight: bold; font-size: 100%;">Gold</th>
								</tr>
							</thead>
							<tbody>
									<tr>
										<td><?=$_SESSION['username'] ?></td>
										<td><?=$_SESSION['level'] ?></td>
										<td><?=$_SESSION['cash'] ?></td>
									</tr>
							</tbody>
						</table>
					</div>

					<div class="container col-md-4">
						  	<input id="username" style="display:none" type="username" name="fakeusernameremembered">
  							<input id="password" style="display:none" type="password" name="fakepasswordremembered">
						<div class="form-group">
							<input  autocomplete="new-password" type="email" placeholder="E-Mail" class="form-control" id="email" name="emailDel" value="">
						</div>
					<div class="form-group">
						<input  type="password" autocomplete="new-password" placeholder="Password" class="form-control" id="password" name="passwordDel" value="">
						</div>
					</div>

					<div class="text-center">
						<button type="submit" class="btn btn-primary btn btn-primary col-md-3" name="deleteProfile" onclick="return confirm('Are you sure you want to delete your profile? \nAfter deleting, all your results will be lost!')">Delete</button>
					</div>
				</form>
			<?php endif;?>
			<?php endif;?>
