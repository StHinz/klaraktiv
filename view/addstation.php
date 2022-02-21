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

<!-- Responsive Boostrap -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- bootstrap css -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>


</head>

<title>klaraktiv - Station hinzufügen</title>

<body>

<!-- First Container - Logo & Logout -->
<div class="container-fluid pt-3 my-3 w-50"> 
          <div class="d-flex justify-content-center">
              <div class="row d-flex justify-content-center flex-nowrap">
                  <div class="col-md">
                  <ul class="nav nav-pills nav-fill justify-content-center">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle btn-primary" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Menü</a>
                        <div class="dropdown-menu">
                        <a class="dropdown-item" href="./main.php">Hauptseite</a>
                        <a class="dropdown-item" href="../controller/logout.php">Logout</a>
                        </div>
                    </li>
                    </ul>
                      <img src="../img/logo_klaraktiv.jpg" class="img-fluid max-width: 100px" alt="Responsive image" max-width></br>
                  </div>
              </div>
          </div>  
  </div>
<!-- END First Container -->


<div class="container-fluid pt-3 my-3 w-50"> 
            <div class="d-flex justify-content-center">
                <div class="row d-flex justify-content-center flex-nowrap">
                    <div class="col-md justify-content-center">



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


<!-- add Inforamtions -->
<div class="form-group">
<label for="exampleFormControlTextarea1">Stationsinformationen</label>
    <textarea class="form-control" name="information" rows="5"></textarea>
  </div>



<!-- Buttons -->
  <div class='form-group'>
        <input class="btn btn-success btn-block" type="submit" value="Speichern"></br>
        <input class="btn btn-warning  btn-block" type="reset" value="Zurücksetzen"></br>
        <a href="./station.php" class="btn btn-block" style='background-color: #557BB2; color: #FFFFFF' role="button" aria-pressed="true">Abbrechen</a> 
  </div>

</form>

</div>
                </div>
            </div>
</div>
<!-- Footer -->
<?php
    include './_include/footer.php';
?>
</body>
</html>
