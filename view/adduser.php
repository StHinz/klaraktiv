<?php 

require "../session.inc.php"; 
require "../controller/selectcontroller.php"; 

if(isset($_GET['abgewiesen']))
{
 echo "
 <div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <strong>Achtung!</strong> Nutzer existiert bereits! Geben Sie einen anderen Nutzernamen an.
</div>";
}

if(isset($_GET['empty']))
{
 echo "
 <div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <b>Achtung!</b> Es muss ein Nutzername, Password und Rolle angegeben werden! Versuchen Sie es erneut! 
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

<title>klaraktiv - Nutzer hinzufügen</title>

<body>
<!-- Logo KOS -->
<div class="klaraktiv-container">

<div class="row">
    <div class="col-md-12 form-group">
    <img src="../img/logo_klaraktiv.jpg" alt="klaraoppenheimer" class="img-fluid">
    </div>
    <div class="btn-group-vertical col-md-12">
    <a href="./main.php" class="btn btn-info" role="button" aria-disabled="true">Hauptseite</a></br>
    </div>  
</div>


<!-- Form -->
<!-- Add Username -->
<form name="adduser" action="../controller/addusercontroller.php" method="post">
  
<div class="form-group">
    <label for="formGroupExampleInput">Nutzer</label>
    <input type="text" class="form-control" placeholder="Nutzername" name='username'>
</div>

<!-- add passwort -->

<div class="form-group">
    <label for="formGroupExampleInput">Passwort</label>
    <input type="password" class="form-control" placeholder="Passwort eingeben" name='password'>
</div>

<!-- add role -->

<div class="form-group">
    <label for="exampleFormControlSelect1">Rolle</label>
    <select class="form-control" name='rolename'>
      <option></option>
      <option>Admin</option>
      <option>Lehrer</option>
  </select>
  </div>


<!-- Buttons -->
  <div class='form-group'>
        <input class="btn btn-success btn-block" type="submit" value="Speichern"></br>
        <input class="btn btn-warning  btn-block" type="reset" value="Zurücksetzen"></br>
        <a href="./main.php" class="btn btn-block" style='background-color: #557BB2; color: #FFFFFF' role="button" aria-pressed="true">Abbrechen</a> 
  </div>

</form>

</div>

</body>
</html>
