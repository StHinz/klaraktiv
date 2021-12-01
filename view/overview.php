<?php 
require "../session.inc.php"; 
//require "../Controller/overviewcontroller.php";
require "../Controller/selectcontroller.php";

//$dataPointsclass = $data_points_class;
//$dataPointsstudents = $data_points_students;

$dataPoints = new selectcontroller();


?>

<html>
<head>

<!-- CSS klaraktiv -->
<link rel="stylesheet" href="../css/klaraktiv.css">

<!-- bootstrap css -->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Chart -->
<script>
window.onload = function() {
 

var chartclass = new CanvasJS.Chart("chartContainerclass", {
	animationEnabled: true,
	exportEnabled: false,
  	theme: "light2",
	title:{
		text: "Beste Klasse"
	},
	axisY: {
		title: "Durchschnittspunkte",
		includeZero: true,
		//prefix: "",
		//suffix:  ""
	},
	data: [{
		type: "bar",
		yValueFormatString: "#.## P",
		indexLabel: "{y}",
		indexLabelPlacement: "inside",
		indexLabelFontWeight: "bolder",
		indexLabelFontColor: "white",
		dataPoints: <?php echo json_encode($dataPoints->getBestClass(), JSON_NUMERIC_CHECK); ?>
  }]
});


var chartstudents = new CanvasJS.Chart("chartContainerstudents", {
	animationEnabled: true,
	exportEnabled: false,
  	theme: "light2",
	title:{
		text: "Beste Schülerinnen und Schüler"
	},
	axisY: {
		title: "Absolutpunkte",
		includeZero: true,
		//prefix: "",
		//suffix:  ""
	},
	data: [{
		type: "bar",
		yValueFormatString: "### P",
		indexLabel: "{y}",
		indexLabelPlacement: "inside",
		indexLabelFontWeight: "bolder",
		indexLabelFontColor: "white",
		dataPoints: <?php echo json_encode($dataPoints->getBestStudent(), JSON_NUMERIC_CHECK); ?>
  }]
});	

chartclass.render();
chartstudents.render();	
}
</script>

</head>

<title>klaraktiv - Übersicht</title>

<body>


<div class="klaraktiv-container">

<div class="row">
    <div class="col-md-12 form-group">
    <img src="../img/logo_klaraktiv.jpg" alt="klaraoppenheimer" class="img-fluid">
    </div>
    <div class="btn-group-vertical col-md-12">
    <a href="./main.php" class="btn btn-info" role="button" aria-disabled="true">Hauptseite</a></br>
    </div>  
</div>
</div>

<div id="chartContainerclass" style="height: 370px; width: 80%; margin-left: auto;
    margin-right: auto"></div>
<div id="chartContainerstudents" style="height: 370px; width: 80%; margin-left: auto;
    margin-right: auto; padding-top: 100px"></div>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>     