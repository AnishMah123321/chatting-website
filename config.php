<?php
	define ('TITLE','WAFP');

	define ('FILES','files/');

	define ('IMAGES',FILES.'images/');

	define ('CLASSES',FILES.'operators/');

	define ('PHPS',FILES.'phpscripts/');

	define ('SESSIONSPATH', FILES.'SESSIONS/');

	define ('BOOTSTRAP',FILES.'bootstrap/');

	define ('SQL_HOST','Localhost');

	define ('SQL_DATABASE','chat');

	define ('SQL_USERNAME','root');

	define ('SQL_PASSWORD','');

if (!ini_get('register_globals')) {
    $superglobals = array($_SERVER, $_ENV,
        $_FILES, $_COOKIE, $_POST, $_GET);
    if (isset($_SESSION)) {
        array_unshift($superglobals, $_SESSION);
    }
    foreach ($superglobals as $superglobal) {
        extract($superglobal, EXTR_SKIP);
    }
}
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
	ini_set('session.save_path',SESSIONSPATH);

	session_start();

?>