<?php

require 'bootstrap.php';
require 'telegram/helper.php';

$bot_username = $config['BOT_USERNAME'];

// Mostrar login
if (getTelegramUserData() === false) {
    require 'templates/login.php';
    die();
}

// Mostrar Dashboard
if (!isset($_GET['page']) || empty($_GET['page'])) {
	// Dashboard
	require 'telegram/controladores/dashboard.php';
    require 'templates/dashboard.php';

    die();
}

if (isset($_GET['page']) && $_GET['page'] == 'canales') {
	// Canales
	require 'telegram/controladores/canales.php';
    require 'templates/canales.php';

    die();
}
