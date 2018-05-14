<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Forza System - Admin</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
   <!-- Bulma Version 0.6.2-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.2/css/bulma.min.css" integrity="sha256-2k1KVsNPRXxZOsXQ8aqcZ9GOOwmJTMoOB5o5Qp1d6/s=" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="../css/bulma.min.css">
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
    <script src='https://cdn.jsdelivr.net/lodash/4.17.2/lodash.min.js'></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.src.js"></script>
</head>
<body>

  <!-- START NAV -->
    <?php require 'nav.php'; ?>
  <!-- END NAV -->
  <div class="container">
    <div class="columns">
      <div class="column is-3">
        <?php require 'aside.php'; ?>
      </div>
      <div class="column is-9">
        <nav class="breadcrumb" aria-label="breadcrumbs">
          <ul>
            <li><a href="/">Dashboard</a></li>
            <li class="is-active"><a href="#" aria-current="page">Canales</a></li>
            
          </ul>
        </nav>
        <section class="hero is-info welcome is-small">
          <div class="hero-body">
            <div class="container">
              <h1 class="title">
                Hola, <?php echo htmlspecialchars($username); ?>.
              </h1>
              <h2 class="subtitle">
                  ¡Espero que estes teniendo un gran dia!
              </h2>
            </div>
          </div>
        </section>
        <section class="info-tiles">
          <div class="tile is-ancestor has-text-centered">
            <div class="tile is-parent">
              <article class="tile is-child box">
                <p class="title">
                  <?php echo $audiencia; ?>
                </p>
                <p class="subtitle">Audiencia</p>
              </article>
            </div>
            <div class="tile is-parent">
              <article class="tile is-child box">
                <p class="title">
                  <?php echo $canalesc; ?>
                </p>
                <p class="subtitle">Canales</p>
              </article>
            </div>
            <div class="tile is-parent">
              <article class="tile is-child box">
                <p class="title">3.4k</p>
                <p class="subtitle">Notificaciones Enviadas</p>
              </article>
            </div>
            <div class="tile is-parent">
              <article class="tile is-child box">
                <p class="title">
                  <?php echo $usuarios; ?>
                </p>
                <p class="subtitle">Usuarios en Forza</p>
              </article>
            </div>
          </div>
        </section>
        <div class="columns">
          <div class="column is-12">
            
          <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Alias</th>
                    <th>Miembros</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>

                  <?php 
                  $count = 0;
                  foreach ($canales as $key => $value): 
                    $count += $value['cantidad_miembros'];
                  ?>
                  
                  <tr>
                    <td><?=++$key?></td>
                    <td><?=$value['nombre']?></td>
                    <td><a href="https://t.me/<?=$value['alias']?>"><?=$value['alias']?></a></td>
                    <td><?=$value['cantidad_miembros']?></td>
                    <td>
                      <button 
                        data-action="edit" 
                        data-id="<?=$value['canal_id']?>" 
                        data-target="modal-ter" 
                        aria-haspopup="true" 
                        class="modal-button button is-primary is-small">Editar</button>

                      <button 
                        data-action="stats" 
                        data-id="<?=$value['canal_id']?>" 
                        data-target="modal-ter" 
                        aria-haspopup="true" 
                        class="modal-button button is-link is-small">Estadistica</button>

                      <button 
                        data-action="delete" 
                        data-id="<?=$value['canal_id']?>" 
                        data-target="modal-ter" 
                        aria-haspopup="true" 
                        class="modal-button button is-danger is-small">Borrar</button>

                    </td>
                  </tr>
                <?php endforeach; ?>

                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><strong>Total:</strong> <?=$count?></td>
                  </tr>

                </tbody>
              </table>


          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal" id="modal-ter" >
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title"></p>
      <button class="delete" aria-label="close"></button>
    </header>
    <section class="modal-card-body">
      <!-- Content ... -->
    </section>
    <footer class="modal-card-foot">
      <button class="button is-success">Save changes</button>
      <button class="button">Cancel</button>
    </footer>
  </div>
</div>

  <script async type="text/javascript" src="../js/bulma.js"></script>

  <script type="text/javascript" src="js/pages/canales.js"></script>

</body>
</html>
