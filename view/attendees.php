<?php 
require "../session.inc.php"; 
require "../controller/selectcontroller.php";

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>


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
                    columns: [ 1, 2 ]
                }
        },
          {
            extend: 'excelHtml5',
            text: '<i class="fas fa-file-excel"></i>',
            autoFilter: true,
            sheetName: 'Teilnehmer KlarAktiv-Tag',
            exportOptions: {
                    columns: [ 1, 2 ]
                }
        },
          {
            extend: 'pdfHtml5',
            text: '<i class="fas fa-file-pdf"></i>',
            orientation: 'landscape',
            pageSize: 'EXECUTIVE',
            exportOptions: {
                    columns: [ 1, 2 ]
                }
          }
    
           
        ] 
  } );

    new $.fn.dataTable.FixedHeader( table );

} );
</script>

</head>

<title>klaraktiv - Teilnehmerverwaltung</title>

<body>

<!-- Container Klaraktiv -->
<div class="klaraktiv-container" >

<!-- Logo KOS -->
<div class="row">
    <div class="col-md-16">
    <img src="../img/logo.png" alt="klaraoppenheimer" height="100%" width="100%">
    </div>
</div>

<!-- Button -->
<div class = "btn btn-group">
<div class="col-md-12 from-group">
    <a href="./addclass.php" class="btn btn-success" role="button">Teilnehmer hinzufügen</a>
    <a href="./main.php" class="btn btn-info" role="button" aria-disabled="true">Hauptseite</a>
</div>
</div>



<!-- table -->

<div class="row">
<div class="col-lg-48">
<?php

echo "<div class='table-responsive table-xl'>
<table id='attendeestable' class ='table table-hover' width='auto'>
<thead>
<tr>
<th>ID</th>
<th>Schülernr.</th>
<th>Klasse</th>
<th>Punkte</th>
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
    if($row['studentstatus'] == 1) {
        echo "<td><i class='fas fa-check-circle' style='color:green'></i></td>";

    } else {
        echo "<td><i class='fas fa-times-circle' style='color:red'></i></td>";
    }

    if($row['studentstatus'] == 1) {
        echo "<td>
        <form action='../Controller/attendeesdeactivatecontroller.php' method='POST'><input type='hidden' name='studentid' value=".$row['studentid'].">
        <button class='btn btn-sm btn-block btn-warning'>deaktiviern</button>
        </form>
    <form action='../Controller/deleteattendees.php' method='POST'><input type='hidden' name='studentid' value=".$row['studentid'].">
    <button class='btn btn-sm btn-block btn-danger'>löschen</button></form>
   </td>";

    } else {
        echo "<td>
        <form action='../Controller/attendeesdeactivatecontroller.php' method='POST'><input type='hidden' name='studentid' value=".$row['studentid'].">
        <button class='btn btn-sm btn-block btn-success'>aktivieren</button>
        </form>
        <form action='../Controller/deleteattendees.php' method='POST'><input type='hidden' name='studentid' value=".$row['studentid'].">
        <button class='btn btn-sm btn-block btn-danger'>löschen</button></form>
        </td>";
    }

   

}

echo "</tr></table></div>";


?>

</div>
</div>
</div>

</body>
</html>


