<?php
require_once('header.php');

echo <<<_END
<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="js/canvasjs.min.js"></script>
<script type="text/javascript">
    window.onload = function() {
        var dataPoints = [];

        function getDataPointsFromCSV1(csv) {
            var dataPoints = csvLines = points = [];
            csvLines = csv.split(/[\r?\n|\r|\n]+/);

            for (var i = 0; i < csvLines.length; i++)
                if (csvLines[i].length > 0) {
                    points = csvLines[i].split(",");
                    dataPoints.push({
                        x: new Date(points[0]),
                        y: parseFloat(points[1])
                    });
                }
            return dataPoints;
        }

	//$.get("https://www.quandl.com/api/v3/datasets/BSE/SENSEX.csv?api_key=ETv6cCHC9EV16uscmBRK&start_date=2019-03-20", function(data) {
		$.get("./sql/BSE-SENSEX.csv", function(data) {
	    var chart1 = new CanvasJS.Chart("chartContainer1", {
	    	animationEnabled: true,
		    title: {
		         text: "BSE INDEX",
		    },
		axisX:{
			title : "Date",
			valueFormatString: "DD MMM",
			crosshair: {
				enabled: true,
				snapToDataPoint: true
		}
	},
      axisY:{
        title: "BSE Index",
       minimum: 35000,
       //maximum: 610
     },
		    data: [{
		         type: "line",
		         dataPoints: getDataPointsFromCSV1(data)
		      }]
	     });

	      chart1.render();

	});
        var dataPoints = [];

        function getDataPointsFromCSV(csv) {
            var dataPoints = csvLines = points = [];
            csvLines = csv.split(/[\r?\n|\r|\n]+/);

            for (var i = 0; i < csvLines.length; i++)
                if (csvLines[i].length > 0) {
                    points = csvLines[i].split(",");
                    var t = points[1].replace(/\s+/g,'');
                    var t= t.replace(/['"]+/g, '');
                    var s = points[0].replace(/\s+/g,'');
                    var s = s.replace(/['"]+/g, '');
                    console.log(new Date(s),parseFloat(t));
                    dataPoints.push({
                        x : new Date(s),
                        y : parseFloat(t)
                    });
                }
            return dataPoints;
        }

	//$.get("https://www.quandl.com/api/v3/datasets/BSE/SENSEX.csv?api_key=ETv6cCHC9EV16uscmBRK&start_date=2019-03-20", function(data) {
		$.get("./sql/data.csv", function(data) {
	    var chart = new CanvasJS.Chart("chartContainer", {
	    	animationEnabled: true,
		    title: {
		         text: "NIFTY 50 ",
		    },
        axisX:{
    			title : "Date",
    			valueFormatString: "DD MMM",
    			crosshair: {
    				enabled: true,
    				snapToDataPoint: true
    		}
    	},
      axisY:{
        title: "Nifty 50",
       minimum: 9000,
       //maximum: 610
     },
      data: [{
           type: "line",
           dataPoints: getDataPointsFromCSV(data)
        }]
	     });

	      chart.render();

	});
  }
</script>
</head>
<body>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
		<a href="index.php"class "logo"><img src="image/logo.png"></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarCollapse">
			<ul class="navbar-nav mr-auto">
				<ul>
							<li><a href="index.html">Home</a></li>
							<li><a href="login.php">Login</a></li>
							<li><a href="signup.php">Signup</a></li>
							<li><a href="#">News</a></li>

					</ul>
			</ul>
			<form class="form-inline mt-2 mt-md-0">
				<input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
				<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
			</form>
		</div>
	</nav>
	<div id="chartContainer1" style="width:60%; height:300px;"></div>
	<div id="chartContainer" style="width:60%; height:300px;"></div>

_END;


?>
