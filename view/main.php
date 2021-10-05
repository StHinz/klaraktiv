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

<div class="row">
    <div class="col-md-12 form-group">
    <img src="../img/logo.png" alt="klaraoppenheimer" height="100%" width="100%">
    </div>
</div>
<h1>Klaraktiv-Tag</h1>
<div class="btn-group-vertical col-md-12">
<a href="#" class="btn btn-klaraktiv" role="button" aria-disabled="true">Übersicht</a></br>
<a href="#" class="btn btn-klaraktiv" role="button" aria-disabled="true">Punkte vergeben</a></br>
<?php 
if($role ==  'admin') {
    echo "
<a href='#' class='btn btn-klaraktiv' role='button' aria-disabled='true'>Teilnehmerverwaltung</a></br>
<a href='#' class='btn btn-klaraktiv' role='button' aria-disabled='true'>Stationsverwaltung</a></br>";
}
?>
<a href='../controller/logout.php' class='btn btn-klaraktiv' role='button' aria-disabled='true'>Logout</a>
</div>

</div>

</body>
</html>