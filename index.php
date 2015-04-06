<!DOCTYPE html>
<html>
<head>
    <title>VALCEX Visualization</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
<!-- STYLESHEETS -->

    <link rel="stylesheet" href="thesis.css" type="text/css" />
    
<!-- SCRIPTS -->

    <!-- WEBGL -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script type="text/javascript" src="js/three.js"></script>
    
    <script>
	var stations = {};
	var settings = {};
	var nuData;
	
	var intervalID;

    </script>
    
</head>

<body>
    
    <div id="wrapper">
        <div id="header">
	    <h1>Welcome to the Valley Circulation Experiment Visualization Tool</h1>
	    <a href="../">Go Back</a>
	</div>
	
        <div id="top-wrapper">
            <div id="scene"></div>
	    
            <div id="sidebar">
		<h2>Log</h2>
		<div id="console"></div>
	    </div>
        </div>
	
        <div id="bottom-wrapper">
	    
	    <script type="text/javascript" src="js/globals.js"></script>
	    <script type="text/javascript" src="js/TrackballControls.js"></script> 
	    <script type="text/javascript" src="js/TerrainLoader.js"></script>
	    <script type="text/javascript" src="js/callbacks.js"></script>
	    <script type="text/javascript" src="js/main.js"></script>
	    
            <div id="controls-1">
		<h2>Toggles</h2>
		<button id="resetButton" type="button" onclick="resetScene()">Reset Scene</button>
		<br/>
		<button id="contourToggle" type="button" onclick="toggleContours()">Toggle Contours</button>
		<br/>
<!--		<button id="axesToggle" type="button" onclick="toggleAxes()">Toggle Axes</button>
		<br/>-->
		<button id="visButton" type="button" onclick="resetVis()">Start From Beginning</button>
		<br/>
		<button id="stepButton" type="button" onclick="stepVectors()">Next Time Step</button>
		<br/>
		<button id="animateButton" type="button" onclick="startAnimation()">Animate</button>
	    </div>
	    
            <div id="controls-2">
		<h2>Controls</h2>
		<form>
		    Vector Length:
		    <br/>
		    x1<input id="scaleLength" type="range" min="1" max="10" step="1" value="0" onchange="updateSpeedScale(this.value)">x10
		</form>
		<br/>
		<form>
		    Vector Height:
		    <br/>
		    x0.5<input id="scaleHeight" type="range" min="0.5" max="2" step="0.1" value="0" onchange="updateHeightScale(this.value)">x2
		</form>
		<br/>	
		<form>
		    Vector Color:
		    <br/>
		    <input id="colorPicker" type="color" value="#000000" onchange="updateColor(this.value)">
		</form>
	    </div>
	    
            <div id="controls-3">
		<h2>Available Stations</h2>
		<div id="station-list"></div>
		<button id="addStationButton" type="button" onclick="createNewStations()">Add Station</button>
		<br/>
		<h2>Available Files</h2>
		    <?php include("php/fileLoader.php"); ?>
	    </div>
        </div>
    </div>
    
    <div id="footer"></div>
    
    <script>
	    
    var controls = new THREE.TrackballControls(camera, document.getElementById('scene'));
    
    function onWindowResize()
    {
	
	WIDTH = $("#scene").width();
	HEIGHT = $("#scene").height();
	
	camera.aspect = WIDTH/HEIGHT;
	camera.updateProjectionMatrix();

	renderer.setSize(WIDTH, HEIGHT);

	controls.handleResize();
	render();
    }
    
    window.addEventListener( 'resize', onWindowResize, false );
    
    document.getElementById('scene').appendChild(renderer.domElement);
    render();
    
    loadSettings(updateSettings);
    
    </script>
	
</body>

</html>
