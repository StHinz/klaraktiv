<?php 

require "../session.inc.php"; 
require "../controller/selectcontroller.php"; 


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

<title>klaraktiv - Nutzer bearbeiten</title>

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
<?php 

$getUser = new selectcontroller();
$user = $getUser->getSingleUser($_POST['userid']);
$role = $getUser->getAllRoles();

?> 


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

</body>
</html>
