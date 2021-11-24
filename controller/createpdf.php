<?php
require "../session.inc.php"; 
require '../controller/selectcontroller.php';
require '../tcpdf/tcpdf.php';

// get Data from Form
$classname = $_POST['class'];
$studentnumber = $_POST['student'];

$query = new selectcontroller();
// get all Stations
$stations = $query->getAllStations();


if(empty($studentnumber)) {
//get stundents from Class
$dataquery = $query->getStudentsfromClass($classname);
} else {

//get single Student
$dataquery = $query->getSingleStudent($studentnumber);
};

// Table
$stationtable='';

foreach($dataquery as $row) {
  
   $stationtable .= '
   <div style="page-break-before:always">
<table cellpadding="5" cellspacing="0" style="width: 100%; ">
 
 <tr>
 <td style="font-size:1.3em; font-weight: bold;">
Laufzettel<br>
 </td>
 </tr>

 <tr>
<td style="text-align: left">
Schülernummer: '.$row['studentnumber'].'<br>
Klasse: '.$row['classname'].' <br>
 </td>
 <td>
 </td>
</tr>
</table>

</br></br></br> ';



// Overview Table Stations for each attendee
$stationtable .= '

<table cellpadding="5" cellspacing="0" style="width: 100%;" border="1">
 <tr style="background-color: #cccccc; padding:5px;">
 <td style="padding:5px;"><b>Station</b></td>
 <td style="text-align: center;"><b>Ort</b></td>
 <td style="text-align: center;"><b>Punkte</b></td>
 <td style="text-align: center;"><b>Vermerk</b></td>
 </tr> ';

 // stations 
 foreach ($stations as $row) {
    
    $stationtable .='<tr>
    <td style="text-align: left;">'.$row['stationname'].'</td>
    <td style="text-align: center;">'.$row['stationadress'].'</td>
    <td style="text-align: center;">'.$row['points'].'</td>
    <td style="text-align: center;"></td>
    </tr>';

    // Neue Seite


 };
 

$stationtable .='</table> 
</div>
';
// End 

}

// Erstellung des PDF Dokuments
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
 
// Dokumenteninformationen
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Klara-Oppenheimer-Schule');
$pdf->SetTitle('Title');
$pdf->SetSubject('Thema');
 
 
// Header und Footer Informationen
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
 
// Auswahl des Font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
 
// Auswahl der MArgins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
 
// Automatisches Autobreak der Seiten
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
 
// Image Scale 
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
 
// Schriftart
//$pdf->SetFont('arial', '', 10);
 
// Neue Seite
//$pdf->AddPage();
 
// Fügt den HTML Code in das PDF Dokument ein
$pdf->writeHTML($stationtable, true, false, true, false, '');

//$pdf->AddPage();
 
 
//Ausgabe der PDF
 
//Variante 1: PDF direkt an den Benutzer senden:
ob_end_clean();
$pdf->Output('KlarAktiv-2022.pdf', 'D');
 

//Variante 2: PDF im Verzeichnis abspeichern:
//$pdf->Output(dirname(__FILE__).'/Test.pdf', 'F');
//echo 'PDF herunterladen: <a href="Test">Test</a>';


?>