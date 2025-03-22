<?php

// Check if there is a new command.
if(isset($_GET["direction"]) && !empty($_GET["direction"])){
	$direction = $_GET["direction"];
	// If transferred, get the optional speed value.
	$speed = (isset($_GET["speed"])) ? $_GET["speed"] : "low";
	// Execute the requested Python file with arguments as the recent commands - direction and speed.
	exec("python /home/pi/Autonomous_Mask_Detection_Robot/chassis_controls.py --direction='".$direction."' --speed='".$speed."'");
	echo "Commands =><br><br>Direction: $direction <br><br>Speed: $speed";
	// Close
	exit();
}

?>

<!DOCTYPE html>
<html>
<head>
 <title>Mask Detection Robot Dashboard</title>
 
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
 <!--link to favicon-->
 <link rel="icon" type="image/png" sizes="36x36" href="icon.png">

 <link rel="stylesheet" type="text/css" href="index.css"></link>
 
 <link rel="preconnect" href="https://fonts.gstatic.com">
 <link href="https://fonts.googleapis.com/css2?family=Stalinist+One&display=swap" rel="stylesheet">

 <!-- link to FontAwesome-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css">
 
 <!--link to jQuery script-->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>
<body>
<?php ini_set('display_errors',1);?> 
<h1><i class="fas fa-head-side-mask"></i> Mask Detection Robot Dashboard</h1>
<div class="container">
<div class="stream">
<h2>Stream</h2>
<!-- Change the address with your Raspberry Pi IP Address. -->
<iframe src="http://192.168.1.24:8081" title="Mask Detection Robot Live Stream"></iframe>
</div>

<div class="controls">
<form class="submit">
<fieldset>
<legend>Controls</legend>
<br>
<section>
<label><input type="radio" name="direction" value="forward" /><span class="mark"></span> F</label>
<label><input type="radio" name="direction" value="right" /><span class="mark"></span> R</label>
<label><input type="radio" name="direction" value="left" /><span class="mark"></span> L</label>
<label><input type="radio" name="direction" value="backward" /><span class="mark"></span> B</label>
<br><br>
</section>
<br><br>
<select name="speed">
<option value="low">LOW</option>
<option value="moderate">MODERATE</option>
<option value="high">HIGH</option>
</select>
<option>
</fieldset>
</form>
</div>

</div>
<br><br>

<script src="index.js" type="text/javascript"></script>

</body>
</html>