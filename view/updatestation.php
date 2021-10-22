<?php 

require "../session.inc.php"; 
require "../controller/datacontroll.php"; 


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
    <img src="../img/logo.png" alt="klaraoppenheimer" height="100%" width="100%">
    </div>
    <div class="btn-group-vertical col-md-12">
    <a href="./main.php" class="btn btn-info" role="button" aria-disabled="true">Hauptseite</a></br>
    </div>  
</div>


<!-- Form -->
<?php 
$getStationID = $_POST['stationid'];
$getStationFromDB = $db->getRows("SELECT stationname FROM station WHERE stationid like '$getStationID'");
$getStationPoints = $db->getRows("SELECT points FROM station WHERE stationid like '$getStationID'");
?> 


<!-- Update Station -->
<form name="updatestation" action="../controller/updatestationcontroller.php" method="post">

<input type="hidden" name="stationid" value="<?php echo $getStationID;?>">

<div class="form-group">
    <label for="formGroupExampleInput">Station bearbeiten</label>
    <input type="text" class="form-control" placeholder="Bezeichnung" name='stationname' value="<?php echo $getStationFromDB[0]['stationname'] ?>">
</div>

<!-- Update points -->
  <div class="form-group">
    <label for="exampleFormControlSelect1">Punkte</label>
    <select class="form-control" name='points'>
      <?php
         for($i=1; $i <11; $i++) {
           if($i == $getStationPoints[0]['points']) {
             echo '<option selected>'.$getStationPoints[0]['points'].'</option>';
              } else {
                echo '<option>'.$i.'</option>';
             }
          }
        ?>
    </select>
  </div>

<!-- Buttons -->
  <div class='form-group'>
        <input class="btn btn-success btn-block" type="submit" value="Speichern"></br>
        <input class="btn btn-warning  btn-block" type="reset" value="Zurücksetzen"></br>
        <a href="./station.php" class="btn btn-block" style='background-color: #557BB2; color: #FFFFFF' role="button" aria-pressed="true">Abbrechen</a> 
  </div>

</form>

</div>

</body>
</html>
