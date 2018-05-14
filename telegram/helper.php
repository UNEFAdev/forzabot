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


function canLogin($tg_id) {
	global $db;
	$statement = $db->prepare('SELECT * FROM usuarios WHERE telegram_id = ? AND rol IN("USUARIO", "ADMIN")');
	$statement->execute([$tg_id]);
	
	return ($statement->rowCount() > 0) ? true : false;

}


function getAudienciaCount() {
	global $db;
	$sql = 'SELECT SUM(cant_miembros) FROM (
SELECT DISTINCT canal_id, cant_miembros, DATE(fecha) as fecha FROM `canales_stats`
WHERE DATE(fecha) = (SELECT MAX(DATE(fecha)) FROM canales_stats)
ORDER BY fecha DESC) t';
	$statement = $db->prepare($sql);
	$statement->execute();
	
	return $statement->fetchColumn();

}


function getCanalesCount() {
	global $db;
	$statement = $db->prepare('SELECT count(*) FROM `canales`');
	$statement->execute();
	
	return $statement->fetchColumn();

}

function getUsuariosCount() {
	global $db;
	$statement = $db->prepare('SELECT count(*) FROM `usuarios`');
	$statement->execute();
	
	return $statement->fetchColumn();

}


function getCanalesStats() {
	global $db;
	$statement = $db->prepare('SELECT canales.nombre as name, canales.canal_id, canales_stats.cant_miembros as y, DATE(canales_stats.fecha) as x FROM canales_stats INNER JOIN canales ON canales_stats.canal_id = canales.canal_id GROUP BY x, canales.canal_id, y ORDER BY x ASC');
	$statement->execute();
	$data = $statement->fetchAll(\PDO::FETCH_ASSOC);
	foreach ($data as $key => $value) {
		$data[$key]['y'] = (int) $value['y'];
	}

	return json_encode($data);

}


function getCanales() {
	global $db;
	$query = "SELECT c.canal_id, c.nombre, c.alias, estados.estado, ciudades.ciudad,municipios.municipio,  parroquias.parroquia,
(SELECT cant_miembros FROM canales_stats WHERE canales_stats.canal_id = c.canal_id ORDER BY canales_stats.fecha DESC LIMIT 1) as cantidad_miembros
FROM `canales` c
INNER JOIN estados ON c.estado_id = estados.id_estado
INNER JOIN ciudades ON c.ciudad_id = ciudades.id_ciudad
INNER JOIN parroquias ON c.parroquia_id = parroquias.id_parroquia
INNER JOIN municipios ON c.municipio_id = municipios.id_municipio";

	$statement = $db->prepare($query);
	$statement->execute();

	return $statement->fetchAll(\PDO::FETCH_ASSOC);
	

}