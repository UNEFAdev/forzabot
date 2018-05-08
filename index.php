<?php

require 'bootstrap.php';
require 'telegram/helper.php';

$bot_username = $config['BOT_USERNAME'];

if (getTelegramUserData() === false) {
    require 'templates/login.php';
    die();
}

if (!isset($_GET['page']) || empty($_GET['page'])) {
    $username = getTelegramUserData()['first_name'];
    require 'templates/admin.php';
    die();
}
