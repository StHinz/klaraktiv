<html>
<head>

<!-- Responsive Boostrap -->
<meta name="viewport" content="width=device-width, initial-scale=1">

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


<!-- First Container - Logo -->
    <div class="container-fluid pt-3 my-3 w-50"> 
        <div class="d-flex justify-content-center">
            <div class="row d-flex justify-content-center flex-nowrap">
                <div class="col-md">
                    <img src="./img/logo_klaraktiv.jpg" class="img-fluid max-width: 100px" alt="Responsive image" max-width>
                </div>
            </div>
        </div>  
    </div>
<!-- END Second Container -->

<!-- Second Container - Login -->
    <div class="container-fluid pt-3 my-3 w-50"> 
        <div class="d-flex justify-content-center">
            <div class="row d-flex justify-content-center flex-nowrap">
                <div class="col-md">
                    <h1>Anmelden</h1>
                </div>
            </div>
        </div>

        <div class="row d-flex justify-content-center flex-nowrap">
            <div class="col-md">
                <form action="./controller/logincheck.php" method="post">  
                    <div class="form-group">
                            <label for="email"></label>
                                <input type="text" class="form-control" placeholder="Benutzername" name="username">
                        </div>
                        <div class="form-group">
                            <label for="pwd"></label>
                                <input type="password" class="form-control" placeholder="Passwort" name="password">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block color:red">Senden</button>
                    </form>
                </div>
            </div>
    </div>  

<!-- END Second Container -->


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
<!-- End Footer -->



</body>
</html>