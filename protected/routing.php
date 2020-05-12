<?php 

if(!array_key_exists('P', $_GET) || empty($_GET['P']))
	$_GET['P'] = 'home';


switch ($_GET['P']) {
	case 'home': require_once PROTECTED_DIR.'normal/home.php'; break;
	case 'test': require_once PROTECTED_DIR.'normal/test.php'; break;

	case 'skin0': ChangeSkin($_SESSION['username'],0); break;
	case 'skin1': ChangeSkin($_SESSION['username'],1); break;
	case 'skin2': ChangeSkin($_SESSION['username'],2); break;
	case 'skin3': ChangeSkin($_SESSION['username'],3); break;
	case 'skin4': ChangeSkin($_SESSION['username'],4); break;


	case 'login': !IsUserLoggedIn() ? require_once PROTECTED_DIR.'user/login.php' : header('Location: index.php'); break;

	case 'register': !IsUserLoggedIn() ? require_once PROTECTED_DIR.'user/register.php' : header('Location: index.php'); break;

	case 'skins': IsUserLoggedIn() ? require_once PROTECTED_DIR.'user/skins.php' : header('Location: index.php'); break;

	case 'mission': IsUserLoggedIn() ? require_once PROTECTED_DIR.'user/mission.php' : header('Location: index.php'); break;

	case 'missionDone': if (IsUserLoggedIn()) {
		require_once PROTECTED_DIR.'user/character.php';
		Mission($_SESSION['username']);
	}else header('Location: index.php');
	break;

	case 'logout': IsUserLoggedIn() ? UserLogout() : header('Location: index.php'); break;

	case 'character': IsUserLoggedIn() ? require_once PROTECTED_DIR.'user/character.php' : header('Location: index.php'); break;

	default: require_once PROTECTED_DIR.'normal/404.php'; break;
}

?>