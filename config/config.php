<?php 
define('LOG_DIR', '/Yasuo/Logs/');
define('IMAGE_DIR', '/Yasuo/Images/');
define('BASE_DIR', './');
define('PUBLIC_DIR', BASE_DIR.'public/');
define('PROTECTED_DIR', BASE_DIR.'protected/');

define('DATABASE_CONTROLLER', $_SERVER["DOCUMENT_ROOT"] . '/Yasuo/config/database.php');
define('USER_MANAGER', $_SERVER["DOCUMENT_ROOT"] . '/Yasuo/config/usermanager.php');

define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'yasuo');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8');
?>