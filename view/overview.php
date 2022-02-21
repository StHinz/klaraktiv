<?php 
require "../session.inc.php"; 
//require "../controller/overviewcontroller.php";
require "../controller/selectcontroller.php";

//$dataPointsclass = $data_points_class;
//$dataPointsstudents = $data_points_students;

$dataPoints = new selectcontroller();


?>

<html>
	<!-- automatisch aktualisieren -->
<meta http-equiv="refresh" content="30" />

<head>

<!-- Responsive Boostrap -->
<meta name="viewport" content="width=device-width, initial-scale=1">


<!-- include Boostrap -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    
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
		dataPoints: <?php echo json_encode(array_reverse($dataPoints->getBestClass()), JSON_NUMERIC_CHECK); ?>
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
		dataPoints: <?php echo json_encode(array_reverse($dataPoints->getBestStudent()), JSON_NUMERIC_CHECK); ?>
  }]
});	

chartclass.render();
chartstudents.render();	
}
</script>

</head>

<title>klaraktiv - Übersicht</title>

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
                  </div>
              </div>
          </div>  
  </div>
<!-- END First Container -->


<div id="chartContainerclass" style="height: 370px; width: 80%; margin-left: auto;
    margin-right: auto"></div>
<div id="chartContainerstudents" style="height: 370px; width: 80%; margin-left: auto;
    margin-right: auto; padding-top: 100px"></div>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>



</br></br></br>
</br></br></br>

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