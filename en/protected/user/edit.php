<script type="text/javascript">document.title = "Yasu - Edit"</script>
<?php
if(!array_key_exists('u', $_GET) || empty($_GET['u'])) : 
	echo '<script>window.location="index.php"</script>';
else: 
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['editUser'])) {
	$postData = [
		'id' => $_POST['userId'],
		'username' => $_POST['username'],
		'email' => $_POST['email'],
		'cash' => $_POST['cash'],
		'permission' => $_POST['permission'],
		'level' => $_POST['level']
	];
	if($postData['id'] != $_GET['u']) {
		echo "<div class='text-center' style='font-weight:bold;color:red;'>Hiba a felhasználó azonosítása során!</div>";
	} else {
			$query = "SELECT id, email, level, cash, username, permission FROM users WHERE id = :id";
			$params = [':id' => $_GET['u']];
			require_once DATABASE_CONTROLLER;
			$user = getRecord($query, $params);
		if( empty($postData['permission']) || empty($postData['email']) || empty($postData['username']) || empty($postData['level']))  {
			echo "<div class='text-center' style='font-weight:bold;color:red;'>Missing data(s)!</div>";
		} else if(!filter_var($postData['email'], FILTER_VALIDATE_EMAIL)) {
			echo "<div class='text-center' style='font-weight:bold;color:red;'>Wrong E-Mail format!</div>";
		}else {
			$query = "UPDATE users SET permission=:permission, username=:username, email = :email, level = :level, cash = :cash WHERE id = :id";
			$params = [
				':email' => $postData['email'],
				':cash' => $postData['cash'],
				':level' => $postData['level'],
				':username' => $postData['username'],
				':permission' => $postData['permission'],
				':id' => $postData['id']
			];
			require_once DATABASE_CONTROLLER;
			if(!executeDML($query, $params)) {
				echo "<div class='text-center' style='font-weight:bold;color:red;'>Error!</div>";
			}
			else{
			//Logging
			$myfile = fopen(PROTECTED_DIR."logs/user_edit_logs.txt", "a") or die("Unable to open file!");
			$txt = "Edited by: ".$_SESSION['username']."\r\n".
			"Username: ".$user['username']." -> ".$postData['username']."\r\n".
			"Level: ".$user['level']." -> ".$postData['level']."\r\n".
			"Money: ".$user['cash']." -> ".$postData['cash']."\r\n".
			"E-Mail: ".$user['email']." -> ".$postData['email']."\r\n".
			"Permission: ".$user['permission']." -> ".$postData['permission']."\r\n"."-------------------------"."\r\n";
			fwrite($myfile, $txt);
			fclose($myfile);
			echo '<script>window.location="index.php"</script>';
			}

		}
	}
}
$query = "SELECT id, email, level, cash, username, permission FROM users WHERE id = :id";
$params = [':id' => $_GET['u']];
require_once DATABASE_CONTROLLER;
$user = getRecord($query, $params);
$disabled = "disabled";
if(isset($_SESSION['permission']) && $_SESSION['permission'] == 3){
	$disabled="";
}
?>
	<?php if(empty($user)) :
		echo '<script>window.location="index.php"</script>';
		else : ?>
			<form method="post">
				<input type="hidden" name="userId" value="<?=$user['id'] ?>">
				<div class="container text-center">
				<div class="form-row">
					<div class="form-group col-md-12">
						<label for="userEmail">Username</label>
						<input type="text" class="form-control" id="userEmail" name="username" value="<?=$user['username'] ?>" <?=$disabled?>>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="userLevel">Level</label>
						<input type="text" class="form-control" id="userLevel" name="level" value="<?=$user['level'] ?>">
					</div>
					<div class="form-group col-md-6">
						<label for="userMoney">Gold</label>
						<input type="text" class="form-control" id="userMoney" name="cash" value="<?=$user['cash'] ?>">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-12">
						<label for="userEmail">E-Mail</label>
						<input type="email" class="form-control" id="userEmail" name="email" value="<?=$user['email'] ?>" <?=$disabled?>>
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-12">
						<label for="userPermission">Permission</label>
						<input type="text" class="form-control" id="userPermission" name="permission" value="<?=$user['permission'] ?>" <?=$disabled?>>
					</div>
				</div>
				<div class="col text-center">
					<button type="submit" class="btn btn-primary col-md-3" name="editUser" >Save</button>
				</div>
			</div>
			</form>
	<?php endif;
endif;
?>
