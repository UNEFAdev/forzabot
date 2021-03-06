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
            <!-- <li><a href="../">Bulma</a></li>
            <li><a href="../">Templates</a></li>
            <li><a href="../">Examples</a></li> -->
            <li class="is-active"><a href="#" aria-current="page">Dashboard</a></li>
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
                  <?php echo $canales; ?>
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
            <div class="card events-card" id="container">
              <header class="card-header">
                <p class="card-header-title">
                  Events
                </p>
                <a href="#" class="card-header-icon" aria-label="more options">
                  <span class="icon">
                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                  </span>
                </a>
              </header>
              <div class="card-table">
                <div class="content">
                  <!-- 
                  <table class="table is-fullwidth is-striped">
                    <tbody>
                      <tr>
                        <td width="5%"><i class="fa fa-bell-o"></i></td>
                        <td>Lorum ipsum dolem aire</td>
                        <td><a class="button is-small is-primary" href="#">Action</a></td>
                      </tr>
                      <tr>
                        <td width="5%"><i class="fa fa-bell-o"></i></td>
                        <td>Lorum ipsum dolem aire</td>
                        <td><a class="button is-small is-primary" href="#">Action</a></td>
                      </tr>
                      <tr>
                        <td width="5%"><i class="fa fa-bell-o"></i></td>
                        <td>Lorum ipsum dolem aire</td>
                        <td><a class="button is-small is-primary" href="#">Action</a></td>
                      </tr>
                      <tr>
                        <td width="5%"><i class="fa fa-bell-o"></i></td>
                        <td>Lorum ipsum dolem aire</td>
                        <td><a class="button is-small is-primary" href="#">Action</a></td>
                      </tr>
                      <tr>
                        <td width="5%"><i class="fa fa-bell-o"></i></td>
                        <td>Lorum ipsum dolem aire</td>
                        <td><a class="button is-small is-primary" href="#">Action</a></td>
                      </tr>
                      <tr>
                        <td width="5%"><i class="fa fa-bell-o"></i></td>
                        <td>Lorum ipsum dolem aire</td>
                        <td><a class="button is-small is-primary" href="#">Action</a></td>
                      </tr>
                      <tr>
                        <td width="5%"><i class="fa fa-bell-o"></i></td>
                        <td>Lorum ipsum dolem aire</td>
                        <td><a class="button is-small is-primary" href="#">Action</a></td>
                      </tr>
                      <tr>
                        <td width="5%"><i class="fa fa-bell-o"></i></td>
                        <td>Lorum ipsum dolem aire</td>
                        <td><a class="button is-small is-primary" href="#">Action</a></td>
                      </tr>
                      <tr>
                        <td width="5%"><i class="fa fa-bell-o"></i></td>
                        <td>Lorum ipsum dolem aire</td>
                        <td><a class="button is-small is-primary" href="#">Action</a></td>
                      </tr>
                    </tbody>
                  </table> -->
                </div>
              </div>
              <footer class="card-footer">
                <a href="#" class="card-footer-item">View All</a>
              </footer>
            </div>        
          </div>
        </div>
      </div>
    </div>
  </div>
  <script async type="text/javascript" src="../js/bulma.js"></script>

  <script type="text/javascript" src="js/pages/dashboard.js"></script>

</body>
</html>
