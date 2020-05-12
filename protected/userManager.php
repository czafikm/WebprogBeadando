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
	$query = "SELECT id, first_name, last_name, email, username FROM users WHERE username = :username AND password = :password";
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

function ChangeSkin($username, $skin) {
	$query = "SELECT id FROM users username = :username";
	$params = [ ':username' => $username ];

	require_once DATABASE_CONTROLLER;
	$query = "UPDATE users SET skin=:skin WHERE username=:username";
	$params = [
		':skin' => $skin,
		':username' => $username
	];

	if(executeDML($query, $params)) 
		header('Location: index.php?P=character');
	return false;
}
function Mission($username){
	$query = "SELECT username, level FROM users WHERE username = :username";
	$params = [':username' => $username];
	require_once DATABASE_CONTROLLER;
	$character = getRecord($query, $params);
	if ($character['level']>=18) {
		require_once DATABASE_CONTROLLER;
		$query = "UPDATE users SET cash=cash+50 WHERE username=:username";
		$params = [
			':username' => $username
		];

		if(executeDML($query, $params)) 
			header('Location: index.php?P=character');
	}
	else{
		require_once DATABASE_CONTROLLER;
		$query = "UPDATE users SET cash=cash+50,level=level+1 WHERE username=:username";
		$params = [
			':username' => $username
		];

		if(executeDML($query, $params)) 
			header('Location: index.php?P=character');
	}

}

?>