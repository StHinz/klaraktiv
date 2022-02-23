<?php require "../session.inc.php"; 

if( ($_SESSION['role']) == 'Lehrer' || ($_SESSION['role']) == 'Schueler' || ($_SESSION['role']) == 'Admin') {

  //Back to Page Show All
header("location:../index.php");
} 

if(isset($_GET['password']))
{
 echo "
 <div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <strong>Achtung!</strong> Das Passwort ist falsch! 
</div>";
}

if(isset($_GET['empty']))
{
 echo "
 <div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <strong>Achtung!</strong> Klasse / Teilnehmer und Passwort dürfen nicht leer sein!
</div>";
}

if(isset($_GET['success']))
{
 echo "
 <div class='alert alert-success alert-dismissible fade show' role='alert'>
  Die Löschung wurde vorgenommen und ist unwiderruflich!
</div>";
}

if(isset($_GET['deleteall']))
{
 echo "
 <div class='alert alert-success alert-dismissible fade show' role='alert'>
 Das System wurde komplett zurückgesetzt!
</div>";
}

if(isset($_GET['abgewiesen']))
{
 echo "
 <div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <b>Die Löschung war nicht erfolgreich!</br> Ein Fehler ist aufgetreten. Wenden Sie sich an den Administrator!
</div>";
}

?>

<html>
<head>



<!-- CSS klaraktiv -->
<link rel="stylesheet" href="../css/klaraktiv.css">

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

<!-- Datatables -->

<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"/>
<link href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.bootstrap.min.js"></script>



<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.7/js/dataTables.fixedHeader.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.5/js/responsive.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.colVis.min.js"></script>




</head>

<title>klaraktiv - Systemeinstellungen</title>

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
                    <img src="../img/logo_klaraktiv.jpg" width="250" height="auto" alt="Responsive image" max-width></br>
                  </div>
              </div>
          </div>  
  </div>
<!-- END First Container -->

<!-- MAIN -->

<?php

require_once "../controller/selectcontroller.php";
$select = new selectcontroller();
$getClass = $select->getAllClass();
$getStations = $select->getAllStations();
$getStudents = $select->getAllAttendes();
$getStationStatus = $select->getStationStatus();

?>

<!-- Second Container - System Grid -->
  <div class="container-fluid"> 
        <div class="d-flex justify-content-center">
            <div class="row d-flex justify-content-center flex-nowrap">
                <div class="col-md">

            <!-- Card Collapse -->

                    <div id="accordion md-accordion" role="tablist">

                    <!-- Lock System -->

                        <div class="card">
                            <div class="card-header" role="tab" id="headingOne">
                                <h5 class="mb-0"><a class="collapsed" data-toggle="collapse" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">Wettebwerb beenden</a></h5>
                            </div>
                            <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md">
                                            <?php
                                                if($getStationStatus[0]['stationstatus'] == 0) {
                                                echo '
                                                <a href="../controller/stationstatuscontroller.php" class="btn btn-success btn-block" role="button" aria-disabled="true">Stationen aktivieren</a>';
                                                } else {
                                                echo '
                                                <a href="../controller/stationstatuscontroller.php" class="btn btn-danger btn-block" role="button" aria-disabled="true">Stationen deaktivieren</a>';
                                                } 
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- End Lock System -->

                    <!-- Create PDF for Class -->

                     <div class="card">
                            <div class="card-header" role="tab" id="headingOne">
                                <h5 class="mb-0"><a class="collapsed" data-toggle="collapse" href="#CollapseTwo" aria-expanded="false" aria-controls="CollapseTwo">PDF für Klasse</a></h5>
                            </div>
                            <div id="CollapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                                <div class="card-body">
                                <div class="alert alert-info" role="alert">Hierbei wird ein Laufzettel für eine ganze Klasse erzeugt.</div>
                                    
                                     <form name="pdfclass" action="../controller/createpdf.php" method="post">
                                       <div class="form-row">
                                            <div class="form-group col-md">
                                                <select id='class' class="form-control" name='class'>
                                                    <option></option>
                                                        <?php foreach ($getClass as $row){
                                                            echo '<option>'.$row['classname'].'</option>';
                                                            }
                                                            ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md">
                                                <input class="btn btn-success btn-block" type="submit" value="PDF erzeugen"></br>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <!-- End Create PDF for Class -->

                    <!-- Create PDF for Student -->

                        <div class="card">
                            <div class="card-header" role="tab" id="headingOne">
                                <h5 class="mb-0"><a class="collapsed" data-toggle="collapse" href="#CollapseThree" aria-expanded="false" aria-controls="CollapseThree">PDF für Teilnehmer</a></h5>
                            </div>
                            <div id="CollapseThree" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                                <div class="card-body">
                                <div class="alert alert-info" role="alert">Hierbei wird ein Laufzettel für einen einzelnen Schüler oder Schülerin erzeugt.</div>
                                    
                                    <form name="pdfstudent" action="../controller/createpdf.php" method="post">
                                       <div class="form-row">
                                            <div class="form-group col-md">
                                                <select id="inputstudent" class="form-control" name="student">
                                                    <option></option>
                                                        <?php
                                                            foreach ($getStudents as $row){
                                                            echo '<option>'.$row['studentnumber'].'</option>';
                                                            }
                                                            ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md">
                                                <input class="btn btn-success btn-block" type="submit" value="PDF erzeugen"></br>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <!-- End Create PDF for Student -->                                       
                    
                    <!-- Delete Class -->

                        <div class="card">
                            <div class="card-header" role="tab" id="headingOne">
                                <h5 class="mb-0"><a class="collapsed" data-toggle="collapse" href="#CollapseFour" aria-expanded="false" aria-controls="CollapseFour">Klasse löschen</a></h5>
                            </div>
                            <div id="CollapseFour" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                                <div class="card-body">
                                    <div class="alert alert-danger" role="alert">Durch die Löschung der Klasse werden auch alle Teilnehmer der Klasse und deren Punkte gelöscht!</div>
                                    
                                    <form name="deleteclass" action="../controller/deleteclasscontroller.php" method="post">
                                       <div class="form-row">
                                            <div class="form-group col-md">
                                                <select id='class' class="form-control" name='class'>
                                                    <option></option>
                                                        <?php foreach ($getClass as $row){
                                                            echo '<option>'.$row['classname'].'</option>';
                                                            }
                                                            ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md">
                                                <input type="password" placeholder="Passwort" class="form-control" name="password">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md">
                                            <input class="btn btn-danger btn-block" type="submit" value="löschen"></br>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <!-- End Delete Class -->
                    
                    <!-- Delete Student with Points -->

                        <div class="card">
                            <div class="card-header" role="tab" id="headingOne">
                                <h5 class="mb-0"><a class="collapsed" data-toggle="collapse" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">Teilnehmer löschen</a></h5>
                            </div>
                            <div id="collapseFive" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                                <div class="card-body">
                                    <div class="alert alert-danger" role="alert"> Durch die Löschung des Teilnehmers werden auch alle erworbenen Punkte des Teilnehmers gelöscht!</div>
                                    
                                    <form name="deletestudent" action="../controller/deletestudentcontroller.php" method="post">
                                       <div class="form-row">
                                            <div class="form-group col-md">
                                                <select id='class' class="form-control" name='student'>
                                                    <option></option>
                                                    <?php
                                                        foreach ($getStudents as $row){
                                                        echo '<option>'.$row['studentnumber'].'</option>';
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md">
                                                <input type="password" placeholder="Passwort" class="form-control" name="password">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md">
                                            <input class="btn btn-danger btn-block" type="submit" value="löschen"></br>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <!-- Delete Student with Points -->
                    
                    <!-- Delete whole System with verify Code  -->

                        <div class="card">
                            <div class="card-header" role="tab" id="headingOne">
                                <h5 class="mb-0"><a class="collapsed" data-toggle="collapse" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">System zurücksetzen</a></h5>
                            </div>
                            <div id="collapseSix" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                                <div class="card-body">
                                    <div class="alert alert-danger" role="alert"> <b>Achtung! </b>Alle Stationen, Teilnehmer und erworbenen Punkte werden unwiderruflich gelöscht!</div>
                                    
                                    <form name="deletestudent" action="../controller/resetcontroller.php" method="post">
                                        <div class="form-row">
                                            <div class="form-group col-md">
                                                <input type="password" placeholder="Passwort" class="form-control" name="password">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md">
                                            <input class="btn btn-danger btn-block" type="submit" value="löschen"></br>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>        </br>
                    <!-- Delete Delete whole System with verify Code  -->
                    
                                             
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
<!-- End Footer --> 

</body>
</html>
