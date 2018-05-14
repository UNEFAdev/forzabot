<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>FORZA - Iniciar Sesion</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
  <!-- Bulma Version 0.6.0 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.0/css/bulma.min.css" integrity="sha256-HEtF7HLJZSC3Le1HcsWbz1hDYFPZCqDhZa9QsCgVUdw=" crossorigin="anonymous" />
  <link rel="stylesheet" type="text/css" href="../css/login.css">
</head>
<body>
  <section class="hero is-success is-fullheight">
    <div class="hero-body">
      <div class="container has-text-centered">
        <div class="column is-4 is-offset-4">
          <h3 class="title has-text-grey">Ingresar</h3>
          <p class="subtitle has-text-grey">Inicia sesion y administra FORZA</p>
          <div class="box">
            <figure class="avatar">
              <img src="/images/login_tg.png" style="width: 110px;">
            </figure>
            <!-- Error -->
            <?php if (isset($_GET['error'])) : ?>
            <article class="message is-danger">
              <div class="message-header">
                <p>Error</p>
              </div>
              <div class="message-body">
                Usted no tiene permiso de acceder a esta pagina, su usuario no esta activo o su rol no se lo permite.
              </div>
            </article>          
            <?php endif; ?>            

            <form>
              <div class="field">
                <div class="control">
                  <script async src="https://telegram.org/js/telegram-widget.js?2" data-telegram-login="<?php echo $bot_username; ?>" data-size="large" data-auth-url="/telegram/check_authorization.php"></script>
                </div>
              </div>
            </form>
          </div>
          <p class="has-text-grey">
              Forza System
          </p>
        </div>
      </div>
    </div>
  </section>
  <script async type="text/javascript" src="../js/bulma.js"></script>
</body>
</html>
