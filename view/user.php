<?php require "../session.inc.php"; 
if(isset($_GET['exists']))
{
 echo "
 <div class='alert alert-danger alert-dismissible fade show' role='alert'>
  <strong>Achtung!</strong> Nutzername existiert bereits. Vergeben Sie einen anderen Nutzernamen.
</div>";
}

if(isset($_GET['success']))
{
 echo "
 <div class='alert alert-success alert-dismissible fade show' role='alert'>
  Nutzer wurde hinzugefügt bzw. geändert!
</div>";
}

if(isset($_GET['delete']))
{
 echo "
 <div class='alert alert-success alert-dismissible fade show' role='alert'>
  Nutzer wurde gelöscht!
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

<title>klaraktiv - Nutzerverwaltung</title>

<body>
<!-- Logo KOS -->
<div class="klaraktiv-container">

<div class="row">
    <div class="col-md-12 form-group">
    <img src="../img/logo.png" alt="klaraoppenheimer" height="100%" width="100%">
    </div>
    <div class="btn-group-vertical col-md-12">
    <a href="./adduser.php" class="btn btn-success" role="button" aria-disabled="true">Nutzer hinzufügen</a></br>
    <a href="./main.php" class="btn btn-info" role="button" aria-disabled="true">Hauptseite</a></br>
    </div>  
</div>

<!-- table -->
<div class="row">
<div class="col-md-22 form-group">
<?php

require "../controller/selectcontroller.php";

$user = new selectcontroller();
$getAllUsers = $user->getAllUsers();


echo "<div class='table-responsive table-xl'>
<table id='stationtable' class ='table table-hover' width='100%'>
<tr>
<th>ID</th>
<th>Nutzer</th>
<th>Rolle</th>
<th>Option</th>
</tr>
</thead>";

foreach ($getAllUsers as $row) {
    echo "<tr>";
    echo "<td>".$row['userid']."</td>";
    echo "<td>".$row['username']."</td>";
    echo "<td>".$row['rolename']."</td>";
    echo "<td>
    <form action='../controller/deleteusercontroller.php' method='POST'><input type='hidden' name='userid' value=".$row['userid'].">
    <button class='btn btn-sm btn-block btn-danger'>löschen</button></form>
    <form action='./updateuser.php' method='POST'><input type='hidden' name='userid' value=".$row['userid'].">
    <button class='btn btn-sm btn-block btn-success'>bearbeiten</button></form>
    </td>";

}

 echo "</table></div>";
?>

</div>
</div>
</body>
</html>
