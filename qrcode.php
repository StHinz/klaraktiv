<?php

include './phpqrcode/qrlib.php';

$path = 'img/';
$file = $path."png";

$text = 'asdasd';

QRcode::png($text,$file,'l',10);
  
echo "<img src='".$file."'>";

?>