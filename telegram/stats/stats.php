<?php 

require '../../bootstrap.php';
require '../helper.php';

session_start();
header('Content-Type: application/json');

if (!canLogin(getTelegramUserData()['id'])) {
		// usuario no se permite acceder al panel
	    $_SESSION = array();
    	session_destroy();
		die(json_encode([
			'ok' => false,
			'message' => 'You not are logged'
		]));
}


if (isset($_GET['general'])) {

	echo getCanalesStats();

	die();

}

