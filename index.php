<html>
<head>

<!-- CSS klaraktiv -->
<link rel="stylesheet" href="./css/klaraktiv.css">

<!-- bootstrap css -->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<title>klaraktiv</title>

<body>

<!-- failed login -->

<?php
if(isset($_GET['abgewiesen']))
{
 echo "
  <div class='alert alert-danger' role='alert'>
  <strong>Achtung!</strong> Anmeldung fehlgeschlagen! Versuchen Sie es erneut!
</div>";
}
?>

<!-- Login -->
<div class="klaraktiv-container">

<div class="row">
    <div class="col-md-12 form-group">
    <img src="./img/logo_klaraktiv.jpg" alt="klaraoppenheimer" class="img-fluid">
    </div>
</div>
<h1>Klaraktiv-Tag</h1>
    <h2>Anmelden</h2>
    <form action="./controller/logincheck.php" method="post">
    <div class="row">
        <div class="col-md-12 form-group">
            <input type="text" class="form-control" placeholder="Benutzername" name="username">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 form-group">
            <input type="password" placeholder="Passwort" class="form-control" name="password">
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 form-group">
            <input type="submit" class="btn btn-block btn-klaraktiv">
        </div>
    </div>
    </form>
</div>

</body>
</html>