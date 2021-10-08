<?php require "../session.inc.php"; ?>

<html>
<head>

<!-- CSS klaraktiv -->
<link rel="stylesheet" href="../css/klaraktiv.css">

<!-- bootstrap css -->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

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
    <button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-success">Klassen hinzufügen</button></br>
    <a href="./main.php" class="btn btn-klaraktiv" role="button" aria-disabled="true">Hauptseite</a></br>
    </div>  
</div>

<!-- table -->
<div class="row">
<div class="col-md-22 form-group">
<?php
require "../controller/attendeescontroller.php";

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

foreach ($getallRows as $row) {
    echo "<tr>";
    echo "<td>".$row['studentid']."</td>";
    echo "<td>".$row['studentnumber']."</td>";
    echo "<td>".$row['classname']."</td>";
    echo "<td>".$row['points']."</td>";
    echo "<td></td>";

}

 echo "</table></div>";
?>
</div>
</div>
</body>
</html>
