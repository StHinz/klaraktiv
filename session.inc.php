<?php

// Includ session.inc.php on every site
session_start();

// Session timeout
$session_timeout = 900;

//if no login, abboard
if(empty($_SESSION['username']))
{
    session_destroy();
    die("<div class='alert alert-danger' role='alert'>
    <strong>Warnung!</strong><a href='../index.php' class='alert-link'>Bitte melden Sie sich zunächst an!</a>
  </div>");
} else {

  $role = $_SESSION['role'];
  $username = $_SESSION['username'];
}

?>