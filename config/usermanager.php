<?php 
function IsUserLoggedIn() {
	return $_SESSION  != null && array_key_exists('uid', $_SESSION) && is_numeric($_SESSION['uid']);
}

function UserLogout() {
	session_unset();
	session_destroy();
	echo '<script>window.location="index.php"</script>';
}

function UserLogin($username, $password) {
	$query = "SELECT id, email, username, permission, cash, level, language FROM users WHERE username = :username AND password = :password";
	$params = [
		':username' => $username,
		':password' => sha1($password)
	]; 

	require_once DATABASE_CONTROLLER;
	$record = getRecord($query, $params);
	if(!empty($record)) {
		$_SESSION['uid'] = $record['id'];
		$_SESSION['email'] = $record['email'];
		$_SESSION['username'] = $record['username'];
		$_SESSION['permission'] = $record['permission'];
		$_SESSION['cash'] = $record['cash'];
		$_SESSION['level'] = $record['level'];
		$cookie_name = "language";
		$cookie_value = $record['language'];
		setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
		echo '<script>window.location="index.php"</script>';
	}
	return false;
}

function UserRegister($email, $password, $username) {
	$query = "SELECT id FROM users username = :username";
	$params = [ ':username' => $username ];

	require_once DATABASE_CONTROLLER;
	$record = getRecord($query, $params);
	if(empty($record)) {
		$query = "INSERT INTO users (email, password, username) VALUES ( :email, :password, :username)";
		$params = [
			':email' => $email,
			':username' => $username,
			':password' => sha1($password)
		];

		if(executeDML($query, $params)) 
				echo '<script>window.location="index.php"</script>';
	} 
	return false;
}
function ChangePassword($username, $password, $newpassword) {
	$query = "SELECT id FROM users WHERE username = :username AND password = :password";
	$params = [
		':username' => $username,
		':password' => sha1($password)
	]; 

	require_once DATABASE_CONTROLLER;
	$record = getRecord($query, $params);
	if(!empty($record)) {
		$query = "UPDATE users SET password=:password WHERE username=:username";
		$params = [
		':password' => sha1($newpassword),
		':username' => $username
		];
		if(executeDML($query, $params)) 
				echo '<script>window.location="index.php"</script>';
	}
	return false;
}

function ChangeEmail($username,$password, $email, $newemail) {
	$query = "SELECT id, username, permission, cash FROM users WHERE username = :username AND password = :password AND email = :email";
	$params = [
		':username' => $username,
		':email' => $email,
		':password' => sha1($password)
	]; 

	require_once DATABASE_CONTROLLER;
	$record = getRecord($query, $params);
	if(!empty($record)) {
		$query = "UPDATE users SET email=:email WHERE username=:username";
		$params = [
		':email' => $newemail,
		':username' => $username
		];
		if(executeDML($query, $params)) 
				echo '<script>window.location="index.php"</script>';
	}
	return false;
}

function ChangeSkin($username, $skin) {
	require_once DATABASE_CONTROLLER;
	$query = "UPDATE users SET skin=:skin WHERE username=:username";
	$params = [
		':skin' => $skin,
		':username' => $username
	];

	if(executeDML($query, $params)) {
				echo '<script>window.location="index.php?P=character"</script>';
	}
	return false;
}

function BuySkin($username, $skin) {
	require_once DATABASE_CONTROLLER;
	$query = "UPDATE users SET skin".$skin."_owned = 1, cash=cash-".$skin."00 WHERE username=:username";
	$params = [
		':username' => $username
	];

	if(executeDML($query, $params)) {
				echo '<script>window.location="index.php?P=character"</script>';
	}
	return false;
}


function DeleteUser($email, $password, $username) {
	$query = "SELECT email, username, password FROM users WHERE username = :username AND password = :password AND email = :email";
	$params = [
		':username' => $username,
		':email' => $email,
		':password' => sha1($password)
	]; 

	require_once DATABASE_CONTROLLER;
	$record = getRecord($query, $params);
	if(!empty($record)) {
		$query = "DELETE FROM users WHERE username=:username";
		$params = [
		':username' => $username
		];
		if(executeDML($query, $params)){
				session_unset();
				session_destroy();
				echo '<script>window.location="index.php"</script>';
		} 
	}
	return false;
}
function BugReport($username, $subject, $message, $bugDangerLevel) {
	$query = "SELECT username FROM users WHERE username = :username";
	$params = [
		':username' => $username,
	]; 

	require_once DATABASE_CONTROLLER;
	$record = getRecord($query, $params);
	if(!empty($record)) {
		$query = "INSERT INTO bug (username, subject, message, bugDangerLevel) VALUES ( :username, :subject, :message, :bugDangerLevel);";
		$params = [
		':username' => $username,
		':subject' => $subject,
		':message' => $message,
		':bugDangerLevel' => $bugDangerLevel
		];
		if(executeDML($query, $params)){
				echo '<script>window.location="index.php"</script>';
		} 
	}
	return false;
}

?>