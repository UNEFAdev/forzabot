<?php
require 'bootstrap.php';
// Instanciar Libreria de Telegram
$bot = new AlexR1712\Telegram();

// Actualizar total de miembros de cada canal en la Base de Datos
$statement = $db->prepare('SELECT * FROM canales');
$statement->execute();
$rows = $statement->fetchAll(\PDO::FETCH_ASSOC);
foreach ($rows as $channel) {
    // Update Total Members in Main Table
    $member_count = $bot->getChatMembersCount($channel['canal_id']);
    $statement = $db->prepare('UPDATE `canales` SET `cantidad_miembros` = ? WHERE `canales`.`canal_id` = ?;');
    $statement->execute([$member_count, $channel['canal_id']]);

    // Set stats for current day total users
    $statement = $db->prepare("INSERT INTO canales_stats(canal_id, cant_miembros) VALUES(:channel_id, :cant_miembros)");
    $statement->execute([
        'channel_id' => $channel['canal_id'],
        'cant_miembros' => $member_count
    ]);

    // Delete logs where datetime is older than 31 days
    $sql = 'DELETE FROM canales_stats WHERE DATEDIFF(NOW(),fecha) > 31';
    $statement = $db->prepare($sql);
    $statement->execute();
}

