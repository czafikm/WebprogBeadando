<?php 

if(!array_key_exists('P', $_GET) || empty($_GET['P']))
	$_GET['P'] = 'home';


switch ($_GET['P']) {
	case 'home': require_once PROTECTED_DIR.'normal/home.php'; break;
	case 'test': require_once PROTECTED_DIR.'normal/test.php'; break;

	case 'login': !IsUserLoggedIn() ? require_once PROTECTED_DIR.'user/login.php' : header('Location: index.php'); break;

	case 'register': !IsUserLoggedIn() ? require_once PROTECTED_DIR.'user/register.php' : header('Location: index.php'); break;

	case 'skins': IsUserLoggedIn() ? require_once PROTECTED_DIR.'user/skins.php' : header('Location: index.php'); break;

	case 'mission': IsUserLoggedIn() ? require_once PROTECTED_DIR.'user/mission.php' : header('Location: index.php'); break;

	case 'list_user': IsUserLoggedIn() ? require_once PROTECTED_DIR.'user/user_list.php' : header('Location: index.php'); break;

	case 'edit_user': IsUserLoggedIn() ? require_once PROTECTED_DIR.'user/edit.php' : header('Location: index.php'); break;

	case 'account': IsUserLoggedIn() ? require_once PROTECTED_DIR.'user/account.php' : header('Location: index.php'); break;

	case 'change_accdata': IsUserLoggedIn() ? require_once PROTECTED_DIR.'user/change_accdata.php' : header('Location: index.php'); break;

	case 'toplist': IsUserLoggedIn() ? require_once PROTECTED_DIR.'user/toplist.php' : header('Location: index.php'); break;

	case 'logout': IsUserLoggedIn() ? UserLogout() : header('Location: index.php'); break;

	case 'character': IsUserLoggedIn() ? require_once PROTECTED_DIR.'user/character.php' : header('Location: index.php'); break;

	case 'users': IsUserLoggedIn() ? require_once PROTECTED_DIR.'user/user_list.php' : header('Location: index.php'); break;

	default: require_once PROTECTED_DIR.'normal/404.php'; break;
}

?>