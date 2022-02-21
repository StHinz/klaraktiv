<?php 

require "../session.inc.php"; 
require "../controller/selectcontroller.php";

if(isset($_GET['abgewiesen']))
{
 echo "
 <div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <strong>Achtung!</strong> Schülernummer falsch! Versuchen Sie es erneut!
</div>";
}

if(isset($_GET['stationstatus']))
{
 echo "
 <div class='alert alert-danger alert-dismissible fade show' role='alert'>
  Der Wettbewerb ist beendet! Es werden keine Punkte mehr angenommen!
</div>";
}

if(isset($_GET['status']))
{
 echo "
 <div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <strong>Achtung!</strong> Schüler wurde vom Admin deaktiviert!
</div>";
}

if(isset($_GET['success']))
{
 echo "
 <div class='alert alert-success alert-dismissible fade show' role='alert'>
  Punkte wurden vergeben!
</div>";
}

if(isset($_GET['empty']))
{
 echo "
 <div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <b>Achtung!</b> Es muss eine Schülernummer angegeben werden! Versuchen Sie es erneut! 
</div>";
}

$getAllstations = new selectcontroller();
$stations = $getAllstations->getAllStations();
$userStation =$getAllstations->getStationfromUser($_SESSION['username']);
$user= $_SESSION['username'];

?>
<html>
<head>

<!-- Responsive Boostrap -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- bootstrap css -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

</head>

<title>klaraktiv - Punkte vergeben</title>

<body>

<!-- First Container - Logo & Logout -->
<div class="container-fluid pt-3 my-3 w-50"> 
          <div class="d-flex justify-content-center">
              <div class="row d-flex justify-content-center flex-nowrap">
                  <div class="col-md">
                  <ul class="nav nav-pills nav-fill justify-content-center">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle btn-primary" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Menü</a>
                        <div class="dropdown-menu">
                        <a class="dropdown-item" href="./main.php">Hauptseite</a>
                        <a class="dropdown-item" href="../controller/logout.php">Logout</a>
                        </div>
                    </li>
                    </ul>
                      <img src="../img/logo_klaraktiv.jpg" class="img-fluid max-width: 100px" alt="Responsive image" max-width></br>
                  </div>
              </div>
          </div>  
  </div>
<!-- END First Container -->

<!-- Logo Container -->
  <div class="container-fluid pt-3 my-3 w-50"> 
            <div class="d-flex justify-content-center">
                <div class="row d-flex justify-content-center flex-nowrap">
                    <div class="col-md justify-content-center">

                            <button type="button" class="btn btn-block btn-info" data-toggle="collapse" data-target="#info">Meine Station Info</button>
                              <div id="info" class="collapse in">
                                <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                                    <?php 
                                    if (empty($userStation[0]['stationid'])) {
                                    echo "Der Nutzer ist keiner Station zugewiesen und erhält daher keinen spezifischen Informationen.";
                                    } else {
                                    echo "<b>".$userStation[0]['stationname']."</b><br>";
                                    echo $userStation[0]['information'];}
                                    ?>
                                  </div>
                              </div>
                      
                    </div>
                </div>
            </div>  
    </div>
<!-- END First Container -->



<!-- Second Container - Button Grid -->
  <div class="container-fluid"> 
        <div class="d-flex justify-content-center">
            <div class="row d-flex justify-content-center flex-nowrap">
                <div class="col-md">
                  
                  <form name="addpoints" action="../controller/addpointscontroller.php" method="post">
                      
                  <!-- add student -->
                      <div class="form-group">
                        <label for="student">Schülernummer</label>
                        <input type="text" class="form-control" placeholder="Schülernummer" name='student'>
                      </div>

                  <!-- add station -->
                  <div class="form-group">	
                  <label for="station">Station</label>
                    <select class="form-control" name='station'>
                      <?php
                        foreach($stations as $rows) {
                          if(($userStation[0]['stationname'])==($rows['stationname'])){
                            echo '<option selected>'.$rows['stationname'].'</option>';
                          } else {
                          echo '<option>'.$rows['stationname'].'</option>';
                        }
                      }
                      ?>
                    </select>
                  </div>

                  <!-- Buttons -->
                  <div class='form-group'>
                    <button type="submit" class="btn btn-primary btn-block">Speichern</button>
                    <button type="reset" class="btn btn-warning  btn-block">Zurücksetzen</button> 
                  </div>

                </form>
                </div>
            </div>
        </div>
  </div>


<!-- Footer -->
  <div class="container-fluid"> 
              <div class="d-flex justify-content-center">
                  <div class="row d-flex justify-content-center flex-nowrap">
                      <div class="col-md">
                      <footer class="bg-light text-center text-lg-start">
                          © Klara-Oppenheimer-Schule<br>  
                              <a class="text-dark" href="https://www.klara-oppenheimer-schule.de/index.php/impressum/">Impressum</a><br>
                              <a class="text-dark" href="https://www.klara-oppenheimer-schule.de/index.php/datenschutzerklaerung/">Datenschutzerklärung</a>
                      </footer>
                      </div>
                  </div>
              </div>
      </div>
<!-- End Footer --> 

</body>
</html>
