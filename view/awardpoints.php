<?php 

require "../session.inc.php"; 
require "../controller/datacontroll.php"; 

if(isset($_GET['abgewiesen']))
{
 echo "
 <div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <strong>Achtung!</strong> Schülernummer falsch! Versuchen Sie es erneut!
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

<title>klaraktiv - Punkte vergeben</title>

<body>
<!-- Logo KOS -->
<div class="klaraktiv-container">

<div class="row">
    <div class="col-md-12 form-group">
    <img src="../img/logo.png" alt="klaraoppenheimer" height="100%" width="100%">
    </div>
    <div class="btn-group-vertical col-md-12">
    <a href="./main.php" class="btn btn-info" role="button" aria-disabled="true">Hauptseite</a></br>
    </div>  
</div>

<!-- Form -->
<!-- add student -->
<form name="addpoints" action="../controller/addpointscontroller.php" method="post">
  <div class="form-group">
    <label for="formGroupExampleInput">Schülernummer</label>
    <input type="text" class="form-control" placeholder="Schülernummer" name='student'>
  </div>

<!-- add station -->
<div class="form-group">	
<label class="my-1 mr-2" for="inlineFormCustomSelectPref">Station</label>
  <select class="form-control" name='station'>
    <option></option>
    <?php
      foreach($getAllstations as $rows) {
        echo '<option>'.$rows['stationname'].'</option>';
      }
    ?>
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
