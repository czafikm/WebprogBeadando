<?php
if(!array_key_exists('u', $_GET) || empty($_GET['u'])) : 
	header('Location: index.php');
else: 
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['editUser'])) {
	$postData = [
		'id' => $_POST['userId'],
		'username' => $_POST['username'],
		'first_name' => $_POST['first_name'],
		'last_name' => $_POST['last_name'],
		'email' => $_POST['email'],
		'cash' => $_POST['cash'],
		'permission' => $_POST['permission'],
		'level' => $_POST['level']
	];
	if($postData['id'] != $_GET['u']) {
		echo "Hiba a dolgozó azonosítása során!";
	} else {
		if(empty($postData['first_name']) || empty($postData['last_name']) || empty($postData['permission']) || empty($postData['email']) || empty($postData['username']) || empty($postData['level']) || empty($postData['cash'])) {
			echo "Hiányzó adat(ok)!";
		} else if($postData['level']<1 || $postData['level']>18) {
			echo "A maximális szint 18!";
		} else if(!filter_var($postData['email'], FILTER_VALIDATE_EMAIL)) {
			echo "Hibás email formátum!";
		}else {
			$query = "UPDATE users SET permission=:permission, username=:username, first_name = :first_name, last_name = :last_name, email = :email, level = :level, cash = :cash WHERE id = :id";
			$params = [
				':first_name' => $postData['first_name'],
				':last_name' => $postData['last_name'],
				':email' => $postData['email'],
				':cash' => $postData['cash'],
				':level' => $postData['level'],
				':username' => $postData['username'],
				':permission' => $postData['permission'],
				':id' => $postData['id']
			];
			require_once DATABASE_CONTROLLER;
			if(!executeDML($query, $params)) {
				echo "Hiba az adatbevitel során!";
			} header('Location: ?P=list_user');
		}
	}
}
$query = "SELECT id, first_name, last_name, email, level, cash, username, permission FROM users WHERE id = :id";
$params = [':id' => $_GET['u']];
require_once DATABASE_CONTROLLER;
$user = getRecord($query, $params);
?>
	<?php if(empty($user)) :
		header('Location: index.php');
		else : ?>
			<form method="post">
				<input type="hidden" name="userId" value="<?=$user['id'] ?>">
				<div class="form-row">
					<div class="form-group col-md-12">
						<label for="userEmail">Username</label>
						<input type="text" class="form-control" id="userEmail" name="username" value="<?=$user['username'] ?>">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="userFirstName">First Name</label>
						<input type="text" class="form-control" id="userFirstName" name="first_name" value="<?=$user['first_name'] ?>">
					</div>
					<div class="form-group col-md-6">
						<label for="userLastName">Last Name</label>
						<input type="text" class="form-control" id="userLastName" name="last_name" value="<?=$user['last_name'] ?>">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="userLevel">Level</label>
						<input type="text" class="form-control" id="userLevel" name="level" value="<?=$user['level'] ?>">
					</div>
					<div class="form-group col-md-6">
						<label for="userMoney">Money</label>
						<input type="text" class="form-control" id="userMoney" name="cash" value="<?=$user['cash'] ?>">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-12">
						<label for="userEmail">Email</label>
						<input type="email" class="form-control" id="userEmail" name="email" value="<?=$user['email'] ?>">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-12">
						<label for="userPermission">Permission</label>
						<input type="text" class="form-control" id="userPermission" name="permission" value="<?=$user['permission'] ?>">
					</div>
				</div>
				<div class="col text-center">
					<button type="submit" class="btn btn-primary col-md-3" name="editUser">Save User</button>
				</div>
			</form>
	<?php endif;
endif;
?>