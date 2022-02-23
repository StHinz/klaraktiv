<?php

// Includ session.inc.php on every site
session_start();

// Session timeout
$session_timeout = 900;

//if no login, abboard
if(empty($_SESSION['username']))
{
    session_destroy();
    die("
    
<html>
  <head>
    <!-- Responsive Boostrap -->
      <meta name=#viewport' content='width=device-width, initial-scale=1'>
    <!-- bootstrap css -->
        <link href='//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css' rel='stylesheet' id='bootstrap-css'>
        <script src='//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js'></script>
        <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    </head>
      <title>Warnung</title>
    <body>
    
    <div class='container-fluid pt-3 my-3 w-50'> 
    <div class='d-flex justify-content-center'>
        <div class='row d-flex justify-content-center flex-nowrap'>
            <div class='col-md'>
              <img src='../img/logo_klaraktiv.jpg' width='250' height='auto' alt='Responsive image' max-width></br>
            </div>
        </div>
      </div>
    </div>

    <div class='container-fluid pt-3 my-3 w-50'> 
      <div class='d-flex justify-content-center'>
        <div class='row d-flex justify-content-center flex-nowrap'>
            <div class='col-md'>       
              <div class='alert alert-danger' role='alert'>
              <strong>Warnung!</strong></br><a href='../index.php' class='alert-link'>Bitte melden Sie sich zunächst an!</a>
              </div>
            </div>
        </div>
    </div>  
</div>
    


   
   
      </body>
   </html>
  
  ");
} else {

  $role = $_SESSION['role'];
  $username = $_SESSION['username'];
}

?>