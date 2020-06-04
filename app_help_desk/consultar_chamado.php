<?php require_once('./validity_acess.php');?>
<?php
  $calleds = array();
  $file = fopen('../private_app_help_desk/file.hd','r');
  while(!feof($file)) {
    $str_aux =  explode('#',fgets($file));
    if( !empty($str_aux[0]) && !empty($str_aux[1] && !empty($str_aux[2]) && !empty($str_aux[3]))){
      if($_SESSION['PERFIL_ID'] == 2 &&  $_SESSION['ID'] == $str_aux[0]){
        $calleds[] = $str_aux;
        continue;
      } elseif($_SESSION['PERFIL_ID'] == 1) {
        $calleds[] = $str_aux;
      }
    }
  }
  fclose($file);
?>
<html>
  <head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
      .card-consultar-chamado {
        padding: 30px 0 0 0;
        width: 100%;
        margin: 0 auto;
      }
    </style>
  </head>

  <body>

    <nav class="navbar navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        App Help Desk
      </a>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="logoff.php">SAIR</a>
        </li>
      </ul>
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">
              <?php array_map(function($called){ ?>
                <div class="card mb-3 bg-light">
                  <div class="card-body">
                    <h4 class="card-title"><?php echo $called[1]; ?></h4>
                    <h5 class="card-subtitle float-right"> Requerente: <?php echo $called[4];?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"> Tipo: <?php echo $called[2];?></h6>
                    <p class="card-text"><?php echo $called[3]; ?></p>

                  </div>
                </div>
                <?php },$calleds); ?>
              <div class="row mt-5">
                <div class="col-6">
                  <a class="btn btn-lg btn-warning btn-block" href="home.php">Voltar</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>