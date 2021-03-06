<?php 
require "../session.inc.php"; 
require "../controller/selectcontroller.php";

if( ($_SESSION['role']) == 'Lehrer' || ($_SESSION['role']) == 'Schueler') {

  //Back to Page Show All
header("location:../index.php");
} 

//
if(isset($_GET['abgewiesen']))
{
 echo "
 <div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <strong>Achtung!</strong> Schüler kann nicht gelöscht werden, da er/sie bereits Punkte erworben hat!
</div>";
}

if(isset($_GET['delete']))
{
 echo "
 <div class='alert alert-success alert-dismissible fade show' role='alert'>
  Schüler*In wurde gelöscht!
</div>";
}

if(isset($_GET['success']))
{
 echo "
 <div class='alert alert-success alert-dismissible fade show' role='alert'>
  Schüler*In wurden hinzugefügt!
</div>";
}

$attendees = new selectcontroller();
$getAllattendees = $attendees->getAllAttendes();
?>


<html>
<head>

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

  

<script>
$(document).ready( function () {
    $('#attendeestable').DataTable( {
        "language": {
          "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/German.json"
            }, 

     
        responsive: true,

        select: true,    	
    
       dom: '<Bf<t>lp>', 
       

        lengthMenu: [ [5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100,"Alle"] ] ,

        buttons: [
          {
            extend: 'copy',
            text: '<i class="fas fa-copy"></i>',
            exportOptions: {
                    columns: [ 0, 1, 2, 3]
                }
        },
          {
            extend: 'excelHtml5',
            text: '<i class="fas fa-file-excel"></i>',
            autoFilter: true,
            sheetName: 'Teilnehmer KlarAktiv-Tag',
            exportOptions: {
                    columns: [  0, 1, 2, 3 ]
                }
        },
          {
            extend: 'pdfHtml5',
            text: '<i class="fas fa-file-pdf"></i>',
            sheetName: 'Teilnehmer KlarAktiv-Tag',
            orientation: 'portrait',
            pageSize: 'EXECUTIVE',
            exportOptions: {
                    columns: [ 0, 1, 2, 3 ]
                }
          }
    
           
        ] 
  } );

    new $.fn.dataTable.FixedHeader( table );

} );
</script>

</head>

<title>klaraktiv - Teilnehmer</title>

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
                        <a class="dropdown-item" href="./attendees.php">Teilnehmer</a>
                        <a class="dropdown-item" href="./classes.php">Klassen</a>
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

<!-- Add User Button -->
<div class="container-fluid pt-3 my-3 w-80"> 
  <div class="d-flex justify-content-center">
      <div class="row d-flex justify-content-center flex-nowrap">
        <div class="col-md">

<a class="btn btn-success" href="./addclass.php" role="button">Teilnehmer hinzufügen</a>

        </div>
      </div>
    </div>
  </div>
<!-- End Button -->

<!-- table -->

<div class="container-fluid pt-3 my-3 w-80"> 
  <div class="d-flex justify-content-center">
      <div class="row d-flex justify-content-center flex-nowrap">
        <div class="col-md">





<?php

echo "

<div class='table-responsive'>
<table id='attendeestable' class='table'>
<thead>
<tr>
<th>ID</th>
<th>Schülernr.</th>
<th>Klasse</th>
<th>Punkte</th>
<th>Stationen</th>
<th>Status</th>
<th>Option</th>
</tr>
</thead>";

foreach ($getAllattendees as $row) {
    echo "<tr>";
    echo "<td>".$row['studentid']."</td>";
    echo "<td>".$row['studentnumber']."</td>";
    echo "<td>".$row['classname']."</td>";
    echo "<td>".$row['points']."</td>"; 
    echo "<td>".$row['stations']."</td>";
    if($row['studentstatus'] == 1) {
        echo "<td><i class='fas fa-check-circle' style='color:green'></i></td>";

    } else {
        echo "<td><i class='fas fa-times-circle' style='color:red'></i></td>";
    }

    if($row['studentstatus'] == 1) {
        echo "<td>
        <form action='../controller/attendeesdeactivatecontroller.php' method='POST'><input type='hidden' name='studentid' value=".$row['studentid'].">
        <button class='btn btn-sm btn-block btn-warning'>deaktiviern</button>
        </form>
    <form action='../controller/deleteattendees.php' method='POST'><input type='hidden' name='studentid' value=".$row['studentid'].">
    <button class='btn btn-sm btn-block btn-danger'>löschen</button></form>
   </td></tr>";

    } else {
        echo "<td>
        <form action='../controller/attendeesdeactivatecontroller.php' method='POST'><input type='hidden' name='studentid' value=".$row['studentid'].">
        <button class='btn btn-sm btn-block btn-success'>aktivieren</button>
        </form>
        <form action='../controller/deleteattendees.php' method='POST'><input type='hidden' name='studentid' value=".$row['studentid'].">
        <button class='btn btn-sm btn-block btn-danger'>löschen</button></form>
        </td></tr>";
    }

   

}

echo "</table></div>";



?>
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
<!-- End Footer --> 

</body>
</html>


