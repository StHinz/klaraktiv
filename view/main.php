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

<title>klaraktiv - Übersicht</title>

<body>


<div class="klaraktiv-container">

<!-- Logo -->
<div class="row">
    <div class="col-md-12 form-group">
    <img src="../img/logo.png" alt="klaraoppenheimer" class="img-fluid">
    </div>
</div>
<h1>KlarAktiv-Tag</h1>

<!-- Button -->
<div class="btn-group-vertical col-md-12">
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
if($role == 'Superadmin') {
    echo "   
    <a href='./system.php' class='btn btn-warning btn-lg btn-block' role='button' aria-disabled='true'>System</a></br>
   ";
   }
?>
<a href='../controller/logout.php' class='btn btn-danger btn-lg btn-block' role='button' aria-disabled='true'>Logout</a>
</div>



</div>

</body>
</html>