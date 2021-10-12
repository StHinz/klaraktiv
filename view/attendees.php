<?php 
require "../session.inc.php"; 
require "../controller/datacontroll.php";

if(isset($_GET['abgewiesen']))
{
 echo "
 <div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <strong>Achtung!</strong> Schüler kann nicht gelöscht werden, da er bereits Punkte erworben hat!
</div>";
}
?>


<html>
<head>

<!-- Datatables -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>


<!-- CSS klaraktiv -->
<link rel="stylesheet" href="../css/klaraktiv.css">

<!-- bootstrap css -->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>
$(document).ready(function() {
    $('#attendeestable').DataTable();
} );
</script>

</head>

<title>klaraktiv - Teilnehmerverwaltung</title>

<body>
<!-- Logo KOS -->
<div class="klaraktiv-container">

<div class="row">
    <div class="col-md-12 form-group">
    <img src="../img/logo.png" alt="klaraoppenheimer" height="100%" width="100%">
    </div>
    <div class="btn-group-vertical col-md-12">
    <a href="./class.php" class="btn btn-success" role="button" aria-disabled="true">Klasse hinzufügen</a></br>
    <a href="./main.php" class="btn btn-info" role="button" aria-disabled="true">Hauptseite</a></br>
    </div>  
</div>

<!-- table -->
<div class="row">
<div class="col-md-22 form-group">
<?php
echo "<div class='table-responsive table-xl'>
<table id='attendeestable' class ='table table-hover' width='100%'>
<tr>
<th>ID</th>
<th>Schülernr.</th>
<th>Klasse</th>
<th>Punkte</th>
<th>Option</th>
</tr>
</thead>";

foreach ($getAllattendees as $row) {
    echo "<tr>";
    echo "<td>".$row['studentid']."</td>";
    echo "<td>".$row['studentnumber']."</td>";
    echo "<td>".$row['classname']."</td>";
    echo "<td>".$row['points']."</td>";
    echo "<td>
    <form action='../Controller/deleteattendees.php' method='POST'><input type='hidden' name='studentid' value=".$row['studentid'].">
    <button class='btn btn-sm btn-block btn-danger'>löschen</button>
    </form>
    
    </td>";
}

 echo "</table></div>";
?>
</div>
</div>
</body>
</html>

