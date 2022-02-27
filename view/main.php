<?php require "../session.inc.php"; ?>

<html>
<head>

<!-- Responsive Boostrap -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSS klaraktiv -->
<link rel="stylesheet" href="../css/klaraktiv.css">

<!-- bootstrap css -->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>



</head>

<title>klaraktiv - Übersicht</title>

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
                        <a class="dropdown-item" href="../controller/logout.php">Logout</a>
                        </div>
                    </li>
                    </ul>
                      <img src="../img/logo_klaraktiv.jpg" width="250" height="auto" alt="Responsive image" max-width></br>
                  </div>
              </div>
          </div>  
  </div>
<!-- END First Container -->






<!-- Second Container - Button Grid -->
    <div class="container-fluid pt-3 my-3 w-50"> 
        <div class="d-flex justify-content-center">
            <div class="row d-flex justify-content-center flex-nowrap">
                <div class="col-md">
                    <div class="btn-group-vertical">
                        <a href="./overview.php" class="btn btn-info btn-lg btn-block" role="button" aria-disabled="true">Übersicht</a></br>
                        <a href="./awardpoints.php" class="btn btn-success btn-lg btn-block" role="button" aria-disabled="true">Punkte vergeben</a></br>
                            <?php 
                            if($role ==  'Admin' || $role == 'Superadmin') {
                                echo "
                                    <a href='./attendees.php' class='btn btn-warning btn-lg btn-block' role='button' aria-disabled='true'>Teilnehmerverwaltung</a></br>
                                    <a href='./station.php' class='btn btn-warning btn-lg btn-block' role='button' aria-disabled='true'>Stationsverwaltung</a></br>";
                            }
                            if($role == 'Superadmin' || $role == 'Admin') {
                            echo "   
                                    <a href='./user.php' class='btn btn-warning btn-lg btn-block' role='button' aria-disabled='true'>Nutzerverwaltung</a></br>
                            ";
                            }
                            if($role == 'Superadmin' || $role == 'Admin') {
                                echo "   
                                     <a href='./system.php' class='btn btn-warning btn-lg btn-block' role='button' aria-disabled='true'>System</a></br>
                            ";
                            }
                            ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- END Second Container -->

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