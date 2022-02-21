<?php 

require "../session.inc.php"; 
require "../controller/selectcontroller.php"; 


?>
<html>
<head>

<!-- CSS klaraktiv -->
<link rel="stylesheet" href="../css/klaraktiv.css">

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

<title>klaraktiv - Nutzer bearbeiten</title>

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

<!-- Form -->
<?php 

$getUser = new selectcontroller();
$user = $getUser->getSingleUser($_POST['userid']);
$role = $getUser->getAllRoles();

?> 

<div class="container-fluid pt-3 my-3 w-50"> 
            <div class="d-flex justify-content-center">
                <div class="row d-flex justify-content-center flex-nowrap">
                    <div class="col-md justify-content-center">


<!-- Update Username -->
<form name="updateuser" action="../controller/updateusercontroller.php" method="post">

<input type="hidden" name="userid" value="<?php echo $user[0]['userid'];?>">

<div class="form-group">
    <label for="formGroupExampleInput">Nutzer</label>
    <input type="text" class="form-control" placeholder="Nutzername" name='username' value="<?php echo $user[0]['username'] ?>">
</div>

<!-- update passwort -->
<div class="form-group">
    <label for="formGroupExampleInput">Passwort</label>
    <input type="password" class="form-control" placeholder="Passwort eingeben" name='password' value='<?php echo $user[0]['userpassword'] ?>'>
</div>

<!-- Update role -->

<div class="form-group">
    <label for="formGroupExampleInput">Rolle</label>
    <select class="form-control" name='rolename'>
  
  <?php
      foreach($role as $rows) {
        
        if (($user[0]['rolename']) == ($rows['rolename'])) {
          echo '<option selected>'.$rows['rolename'].'</option>';
        } else {

          echo '<option>'.$rows['rolename'].'</option>';
      }
    }

    ?>
  </select>
</div>

<!-- Buttons -->
  <div class='form-group'>
        <input class="btn btn-success btn-block" type="submit" value="Speichern"></br>
        <input class="btn btn-warning  btn-block" type="reset" value="Zurücksetzen"></br>
        <a href="./user.php" class="btn btn-block" style='background-color: #557BB2; color: #FFFFFF' role="button" aria-pressed="true">Abbrechen</a> 
  </div>

</form>

</div>

</div>
            </div>
      </div>  
</div>


<!-- Footer -->
<div class="container-fluid"> 
            <div class="d-flex justify-content-center">
                <div class="row d-flex justify-content-center flex-nowrap">
                    <div class="col-md">
                    <footer class="bg-light text-center text-lg-start">
                        © Klara-Oppenheimer-Schule<br>  
                            <a class="text-dark" href="https://www.klara-oppenheimer-schule.de/index.php/impressum/">Impressum</a><br>
                            <a class="text-dark" href="https://www.klara-oppenheimer-schule.de/index.php/datenschutzerklaerung/">Datenschutzerklärung</a>
                    </footer>
                    </div>
                </div>
            </div>
		</div>
<!-- End Footer --> 


</body>
</html>
