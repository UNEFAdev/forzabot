<?php
session_start();
define('BOT_USERNAME', 'unefabot'); // place username of your bot here
require 'helper.php';

if ($_GET['logout']) {
    // Destruir todas las variables de sesión.
    $_SESSION = array();
// Finalmente, destruir la sesión.
    session_destroy();
    header('Location: /index.php');
}

$tg_user = getTelegramUserData();
if ($tg_user !== false) {
    header('Location: /index.php');
    $first_name = htmlspecialchars($tg_user['first_name']);
    $last_name = htmlspecialchars($tg_user['last_name']);
    if (isset($tg_user['username'])) {
        $username = htmlspecialchars($tg_user['username']);
        $html = "<h1>Hello, <a href=\"https://t.me/{$username}\">{$first_name} {$last_name}</a>!</h1>";
    } else {
        $html = "<h1>Hello, {$first_name} {$last_name}!</h1>";
    }
    if (isset($tg_user['photo_url'])) {
        $photo_url = htmlspecialchars($tg_user['photo_url']);
        $html .= "<img src=\"{$photo_url}\">";
    }
    $html .= "<p><a href=\"?logout=1\">Cerrar Sesion</a></p>";
} else {
    $bot_username = BOT_USERNAME;
    $html = <<<HTML
<h1>Hello, anonymous!</h1>
<script async src="https://telegram.org/js/telegram-widget.js?2" data-telegram-login="{$bot_username}" data-size="large" data-auth-url="/telegram/check_authorization.php"></script>
HTML;
}


  echo <<<HTML
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login Widget Example</title>
  </head>
  <body><center>{$html}</center></body>
</html>
HTML;

?>