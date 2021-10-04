<?php

// Includ session.inc.php on every site
session_start();

//if no login, abboard
if(empty($_SESSION['username']))
{
    session_destroy();
    die("Bitte melden Sie sich zunächst an.");
}
?>