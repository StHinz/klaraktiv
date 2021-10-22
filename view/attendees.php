<?php 
require "../session.inc.php"; 
require "../controller/datacontroll.php";

//
if(isset($_GET['abgewiesen']))
{
 echo "
 <div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <strong>Achtung!</strong> Schüler kann nicht gelöscht werden, da er bereits Punkte erworben hat!
</div>";
}

if(isset($_GET['delete']))
{
 echo "
 <div class='alert alert-success alert-dismissible fade show' role='alert'>
  Schüler wurde gelöscht!
</div>";
}

if(isset($_GET['success']))
{
 echo "
 <div class='alert alert-success alert-dismissible fade show' role='alert'>
  Schüler wurden hinzugefügt!
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
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready( function () {
    $('#attendeestable').DataTable( {
        "language": {
          "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/German.json"
            }, 

      responsive: true,
        select: true,    	
    
        dom: '<Blf<t>ip>',

        lengthMenu: [ [10, 25, 50, 100, -1], [10, 25, 50,100,"Alle"] ] ,

        buttons: [
          {
            extend: 'print',
            text: '<i class="fa fa-print"></i>',
  
          },
          {
            extend: 'copy',
            text: '<i class="fa fa-files-o"></i>',
            
          },
          {
            extend: 'excelHtml5',
            text: '<i class="fa fa-file-excel-o"></i>',
            autoFilter: true,
            sheetName: 'Notenarchiv'
        },
          {
            extend: 'pdfHtml5',
            text: '<i class="fa fa-file-pdf-o"></i>',
            orientation: 'landscape',
            pageSize: 'EXECUTIVE'
          },
           
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
    <a href="./class.php" class="btn btn-success" role="button" aria-disabled="true">Klasse hinzufügen</a>
    <a href="./main.php" class="btn btn-info" role="button" aria-disabled="true">Hauptseite</a>
</div>
</div>


<!-- table -->
<div class="row">
<div class="col-md-16 form-group">

<?php

echo "<div class='table-responsive table-xl'>
<table id='attendeestable' class ='table table-hover' width='100%'>
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

</body>
</html>


