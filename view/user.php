<?php require "../session.inc.php"; 

if( ($_SESSION['role']) == 'Lehrer' || ($_SESSION['role']) == 'Schueler') {

  //Back to Page Show All
header("location:../index.php");
} 

if(isset($_GET['exists']))
{
 echo "
 <div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <strong>Achtung!</strong> Nutzername existiert bereits. Vergeben Sie einen anderen Nutzernamen.
</div>";
}

if(isset($_GET['success']))
{
 echo "
 <div class='alert alert-success alert-dismissible fade show' role='alert'>
  Nutzer wurde hinzugefügt bzw. geändert!
</div>";
}

if(isset($_GET['delete']))
{
 echo "
 <div class='alert alert-success alert-dismissible fade show' role='alert'>
  Nutzer wurde gelöscht!
</div>";
}

if(isset($_GET['abgewiesen']))
{
 echo "
 <div class='alert alert-danger alert-dismissible fade show' role='alert'>
  Nutzer kann nicht gelöscht werden, da er eine Station betreut!
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

  

<script>
$(document).ready( function () {
    $('#usertable').DataTable( {
        "language": {
          "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/German.json"
            }, 

     
        responsive: true,

        select: true,    	
    
       dom: '<f<t>lp>', 
       

        lengthMenu: [ [5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100,"Alle"] ]

  
  } );

    new $.fn.dataTable.FixedHeader( table );

} );
</script>

</head>

<title>klaraktiv - Nutzerverwaltung</title>

<body>
<!-- Logo KOS -->
<div class="klaraktiv-container">

<div class="row">
    <div class="col-md-12 form-group">
    <img src="../img/logo.png" alt="klaraoppenheimer" class="img-fluid">
    </div>
    <div class="btn-group-vertical col-md-12">
    <a href="./adduser.php" class="btn btn-success" role="button" aria-disabled="true">Nutzer hinzufügen</a></br>
    <a href="./main.php" class="btn btn-info" role="button" aria-disabled="true">Hauptseite</a></br>
    </div>  
</div>
</div>

<!-- table -->
<div class='klaraktiv-table'>

<?php

require "../controller/selectcontroller.php";

$user = new selectcontroller();
$getAllUsers = $user->getAllUsers();
$selfUser = $_SESSION['userid'];

echo "
<table id='usertable' class ='table'>
<thead>
<tr>
<th>Nutzer</th>
<th>Rolle</th>
<th>Station</th>
<th>Option</th>
</tr>
</thead>";

foreach ($getAllUsers as $row) {
    echo "<tr>";
    echo "<td>".$row['username']."</td>";
    echo "<td>".$row['rolename']."</td>";
    echo "<td>".$row['stationname']."</td>";
    echo "<td>";
    if($selfUser != ($row['userid'])) {
    echo "<form action='../controller/deleteusercontroller.php' method='POST'><input type='hidden' name='userid' value=".$row['userid'].">
    <button class='btn btn-sm btn-block btn-danger'>löschen</button></form>";
    }
    echo"
    <form action='./updateuser.php' method='POST'><input type='hidden' name='userid' value=".$row['userid'].">
    <button class='btn btn-sm btn-block btn-success'>bearbeiten</button></form>
    </td>";

}

 echo "</table>";
?>

</div>

</body>
</html>
