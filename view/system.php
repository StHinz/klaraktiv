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

<!-- bootstrap css -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

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
<!-- Logo KOS -->
<div class="klaraktiv-container">

<div class="row">
    <div class="col-md-12 form-group">
    <img src="../img/logo_klaraktiv.jpg" alt="klaraoppenheimer" class="img-fluid">
    </div>
    <div class="btn-group-vertical col-md-12">
    <a href="./main.php" class="btn btn-info" role="button" aria-disabled="true">Hauptseite</a>
    </div>  
</div>
</div>


<!-- MAIN -->

<?php

require_once "../controller/selectcontroller.php";
$select = new selectcontroller();
$getClass = $select->getAllClass();
$getStations = $select->getAllStations();
$getStudents = $select->getAllAttendes();
$getStationStatus = $select->getStationStatus();

?>
<!-- Lock System -->
<div class="klaraktiv-system">

<div class="form-row">
<h3> Wettebwerb beenden</h3>
<div class="col-md-12 form-group">

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


<!-- Create PDF for Class -->
<div class="klaraktiv-system">
<form name="pdfclass" action="../controller/createpdf.php" method="post">

<h3> PDF für Klasse</h3>
<div class="form-row">
<div class="alert alert-info" role="alert">
 Hierbei wird ein Laufzettel für eine ganze Klasse erzeugt.
</div>
      </div>
<div class="form-row">
  <div class="form-group col-xl">
  <select id='class' class="form-control" name='class'>
  <option></option>
      <?php
        foreach ($getClass as $row){
          echo '<option>'.$row['classname'].'</option>';
        }
        ?>
  </select>
  </div>
  </div>
  <div class="form-row">
  <div class="form-group col-xl">
  <input class="btn btn-success btn-block" type="submit" value="PDF erzeugen"></br>
  </div>
  </div>
</form>
  </div>

  <!-- Create PDF for STudent -->
<div class="klaraktiv-system">
<form name="pdfstudent" action="../controller/createpdf.php" method="post">

<h3> PDF für Schüler</h3>
<div class="form-row">
<div class="alert alert-info" role="alert">
 Hierbei wird ein Laufzettel für einen einzelnen Schüler oder Schülerin erzeugt.
</div>
      </div>
<div class="form-row">
  <div class="form-group col-xl">
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
  <div class="form-group col-xl">
  <input class="btn btn-success btn-block" type="submit" value="PDF erzeugen"></br>
  </div>
  </div>
</form>
  </div>



<!-- Delete Class -->
<div class="klaraktiv-system">
<form name="deleteclass" action="../controller/deleteclasscontroller.php" method="post">

<h3> Klasse löschen </h3>
<div class="form-row">
<div class="alert alert-danger" role="alert">
 Durch die Löschung der Klasse werden auch alle Teilnehmer der Klasse und deren Punkte gelöscht!
</div>
</div>
<div class="form-row">
  <div class="form-group col-md-12">
  <select id='class' class="form-control" name='class'>
  <option></option>
      <?php
        foreach ($getClass as $row){
          echo '<option>'.$row['classname'].'</option>';
        }
        ?>
  </select>
  </div>
  </div>
  <div class="form-row">
  <div class="col-md-12 form-group">
  <input type="password" placeholder="Passwort" class="form-control" name="password">
  </div>
  <div class="form-group col-md-12">
  <input class="btn btn-danger btn-block" type="submit" value="löschen"></br>
  </div>
  </div>
</form>
  </div>

<!-- Delete Student with points -->

<div class="klaraktiv-system">
<form name="deletestudent" action="../controller/deletestudentcontroller.php" method="post">
<h3> Teilnehmer löschen </h3>
<div class="form-row">
<div class="alert alert-danger" role="alert">
 Durch die Löschung des Teilnehmers werden auch alle erworbenen Punkte des Teilnehmers gelöscht!
</div>
      </div>

<div class="form-row">
<div class="form-group col-md-12">
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
  <div class="col-md-12 form-group">
            <input type="password" placeholder="Passwort" class="form-control" name="password">
      </div>
      </div>
      <div class="form-row">
  <div class="form-group col-md-12">
  <input class="btn btn-danger btn-block" type="submit" value="löschen"></br>
  </div>
  
</div>
</form>
</div>

<!-- Delete whole System with verify Code  -->


<div class="klaraktiv-system">
<form name="deletestudent" action="../controller/resetcontroller.php" method="post">
<h3> System zurücksetzen</h3>
<div class="form-row">
<div class="alert alert-danger" role="alert">
 <b>Achtung! </b>Alle Stationen, Teilnehmer und erworbenen Punkte werden unwiderruflich gelöscht!
</div>
<div class="form-group col-md-12">
<input type="password" class="form-control" placeholder="Passwort" name='password'>
      </div>
  <div class="form-group col-md-12">
  <input class="btn btn-danger btn-block" type="submit" value="Reset"></br>
  </div>
  
</div>
</form>
</div>

<!-- Footer -->
<?php
    include './_include/footer.php';
?>


</body>
</html>
