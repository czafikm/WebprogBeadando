<?php 
function IsUserLoggedIn() {
	return $_SESSION  != null && array_key_exists('uid', $_SESSION) && is_numeric($_SESSION['uid']);
}

function UserLogout() {
	session_unset();
	session_destroy();
	header('Location: index.php');
}

function UserLogin($username, $password) {
	$query = "SELECT id, first_name, last_name, email, username, permission, cash FROM users WHERE username = :username AND password = :password";
	$params = [
		':username' => $username,
		':password' => sha1($password)
	]; 

	require_once DATABASE_CONTROLLER;
	$record = getRecord($query, $params);
	if(!empty($record)) {
		$_SESSION['uid'] = $record['id'];
		$_SESSION['fname'] = $record['first_name'];
		$_SESSION['lname'] = $record['last_name'];
		$_SESSION['email'] = $record['email'];
		$_SESSION['username'] = $record['username'];
		$_SESSION['permission'] = $record['permission'];
		$_SESSION['cash'] = $record['cash'];
		header('Location: index.php');
	}
	return false;
}

function UserRegister($email, $password, $fname, $lname, $username) {
	$query = "SELECT id FROM users username = :username";
	$params = [ ':username' => $username ];

	require_once DATABASE_CONTROLLER;
	$record = getRecord($query, $params);
	if(empty($record)) {
		$query = "INSERT INTO users (first_name, last_name, email, password, username) VALUES (:first_name, :last_name, :email, :password, :username)";
		$params = [
			':first_name' => $fname,
			':last_name' => $lname,
			':email' => $email,
			':username' => $username,
			':password' => sha1($password)
		];

		if(executeDML($query, $params)) 
			header('Location: index.php');
	} 
	return false;
}
function ChangePassword($username, $password, $newpassword) {
	$query = "SELECT id, first_name, last_name, email, username, permission, cash FROM users WHERE username = :username AND password = :password";
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
			header('Location: index.php');
	}
	return false;
}

function ChangeEmail($username,$password, $email, $newemail) {
	$query = "SELECT id, first_name, last_name, email, username, permission, cash FROM users WHERE username = :username AND password = :password AND email = :email";
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
			header('Location: index.php');
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
		header('Location: index.php?P=character');
	}
	return false;
}

function BuySkin($username, $skin) {
	$query = "SELECT id FROM users username = :username";
	$params = [ ':username' => $username ];

	require_once DATABASE_CONTROLLER;
	$query = "UPDATE users SET skin=:skin, skin".$skin."_owned = 1, cash=cash-".$skin."00 WHERE username=:username";
	$params = [
		':skin' => $skin,
		':username' => $username
	];

	if(executeDML($query, $params)) {
		header('Location: index.php?P=character');
	}
	return false;
}

function Mission($username){
	$query = "SELECT username, level FROM users WHERE username = :username";
	$params = [':username' => $username];
	require_once DATABASE_CONTROLLER;
	$character = getRecord($query, $params);
	if ($character['level']>=18) {
		$query = "UPDATE users SET cash=cash+50 WHERE username=:username";
		$params = [
			':username' => $username
		];

		if(executeDML($query, $params)) 
			header('Location: index.php?P=character');
	}
	else{
		$query = "UPDATE users SET cash=cash+50,level=level+1 WHERE username=:username";
		$params = [
			':username' => $username
		];

		if(executeDML($query, $params)) 
			header('Location: index.php?P=character');
	}
	return false;

}

?>