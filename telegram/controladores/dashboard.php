<?php 

	if (!canLogin(getTelegramUserData()['id'])) {
		// usuario no se permite acceder al panel
	    $_SESSION = array();
    	session_destroy();
		header('Location: /index.php?logout=1&error=forbidden');
	}

    $username = getTelegramUserData()['first_name'];

    $audiencia = getAudienciaCount();

    $canales = getCanalesCount();

    $usuarios = getUsuariosCount();