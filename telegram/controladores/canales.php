<?php 

	if (!canLogin(getTelegramUserData()['id'])) {
		// usuario no se permite acceder al panel
	    $_SESSION = array();
    	session_destroy();
		header('Location: /index.php?logout=1&error=forbidden');
	}
    $audiencia = getAudienciaCount();

    $canalesc = getCanalesCount();

    $canales = getCanales();

    $usuarios = getUsuariosCount();

    $username = getTelegramUserData()['first_name'];