<?php
require 'bootstrap.php';
// Instanciar Libreria de Telegram
$bot = new AlexR1712\Telegram();

// Actualizar total de miembros de cada canal en la Base de Datos
$statement = $db->prepare('SELECT * FROM canales');
$statement->execute();
$rows = $statement->fetchAll(\PDO::FETCH_ASSOC);
foreach ($rows as $channel) {
    $member_count = $bot->getChatMembersCount($channel['canal_id']);
    $statement = $db->prepare('UPDATE `canales` SET `cantidad_miembros` = ? WHERE `canales`.`canal_id` = ?;');
    $statement->execute([$member_count, $channel['canal_id']]);
    sleep(2);
}