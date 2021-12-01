<?php 

require "../session.inc.php";
require "../controller/selectcontroller.php"; 

if( ($_SESSION['role']) == 'Lehrer' || ($_SESSION['role']) == 'Schueler') {

  //Back to Page Show All
header("location:../index.php");
} 
 

if(isset($_GET['abgewiesen']))
{
 echo "
 <div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <strong>Achtung!</strong> Station existiert bereits!
</div>";
}

if(isset($_GET['empty']))
{
 echo "
 <div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <b>Achtung!</b> Es muss ein Stationsname angegeben und ein Verantwortlicher benannt werden! Versuchen Sie es erneut! 
</div>";
}

$getUserTeacher = new selectcontroller();
$userTeacher = $getUserTeacher->getUserTeacher();

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

<title>klaraktiv - Station hinzufügen</title>

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
<!-- Add Station -->
<form name="addclass" action="../controller/addstationcontroller.php" method="post">
  
<div class="form-group">
    <label for="formGroupExampleInput">Station</label>
    <input type="text" class="form-control" placeholder="Bezeichnung" name='station'>
</div>

<div class="form-group">
    <label for="formGroupExampleInput">Ort</label>
    <input type="text" class="form-control" placeholder="Ort" name='adress'>
</div>

<!-- add points -->
  <div class="form-group">
    <label for="exampleFormControlSelect1">Punkte</label>
    <select class="form-control" name='points'>
      <?php
         for($i=1; $i <11; $i++) {
        echo '<option>'.$i.'</option>';
        }
        ?>
    </select>
  </div>

<!-- add user -->
<div class="form-group">
    <label for="exampleFormControlSelect1">Verantwortlicher</label>
    <select class="form-control" name='user'>
      <option></option>
      <?php
        foreach ($userTeacher as $row){
          echo '<option>'.$row['username'].'</option>';
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
