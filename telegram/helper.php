<?php
session_start();
function getTelegramUserData() {
    if (isset($_SESSION['tg_user'])) {
        $auth_data_json = urldecode($_SESSION['tg_user']);
        $auth_data = json_decode($auth_data_json, true);
        return $auth_data;
    }
    return false;
}