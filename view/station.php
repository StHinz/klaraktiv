<?php require "../session.inc.php"; 
if(isset($_GET['abgewiesen']))
{
 echo "
 <div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <strong>Achtung!</strong> Station kann nicht gelöscht werden, da an ihr bereits Punkte erworben wurden!
</div>";
}

?>

<html>
<head>

<!-- CSS klaraktiv -->
<link rel="stylesheet" href="../css/klaraktiv.css">

<!-- bootstrap css -->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>

<title>klaraktiv - Stationsverwaltung</title>

<body>
<!-- Logo KOS -->
<div class="klaraktiv-container">

<div class="row">
    <div class="col-md-12 form-group">
    <img src="../img/logo.png" alt="klaraoppenheimer" height="100%" width="100%">
    </div>
    <div class="btn-group-vertical col-md-12">
    <a href="./addstation.php" class="btn btn-success" role="button" aria-disabled="true">Station hinzufügen</a></br>
    <a href="./main.php" class="btn btn-info" role="button" aria-disabled="true">Hauptseite</a></br>
    </div>  
</div>

<!-- table -->
<div class="row">
<div class="col-md-22 form-group">
<?php
require "../controller/datacontroll.php";

echo "<div class='table-responsive table-xl'>
<table id='stationtable' class ='table table-hover' width='100%'>
<tr>
<th>ID</th>
<th>Station</th>
<th>Punkte</th>
<th>Option</th>
</tr>
</thead>";

foreach ($getAllstations as $row) {
    echo "<tr>";
    echo "<td>".$row['stationid']."</td>";
    echo "<td>".$row['stationname']."</td>";
    echo "<td>".$row['points']."</td>";
    echo "<td>
    <form action='../controller/deletestation.php' method='POST'><input type='hidden' name='stationid' value=".$row['stationid'].">
    <button class='btn btn-sm btn-block btn-danger'>löschen</button></br>
    <form action='#' method='POST'><input type='hidden' name='stationid' value=".$row['stationid'].">
    <button class='btn btn-sm btn-block btn-success'>bearbeiten</button>
    </td>";

}

 echo "</table></div>";
?>

</div>
</div>
</body>
</html>
