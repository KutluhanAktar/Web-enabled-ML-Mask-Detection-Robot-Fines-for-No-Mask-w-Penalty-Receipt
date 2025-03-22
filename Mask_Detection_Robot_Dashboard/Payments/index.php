<!DOCTYPE html>
<html>
<head>
 <title>Payments</title>
 
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
 <!--link to favicon-->
 <link rel="icon" type="image/png" sizes="36x36" href="../icon.png">
 
 <style>
     html{background-color:#2E3033;}
	 h2{color:#F3D060;text-align:center;}
	 img{display:block;width:80%;height:auto;margin:auto;border:2px solid #F3D060;}
	 button{display:block;margin:auto;width:50%;background-color:#A5282C;color:white;border-radius:20px;border:3px solid white;cursor:pointer;font-weight:bold;font-size:20px;margin-bottom:20px;}
	 button:hover{background-color:#EE7762;}
 </style>

</head>
<body> 

<?php

// If the receipt number is correct, display the captured image, the penalty, and payment options.
if(isset($_GET["q"]) && !empty($_GET["q"])){
	if(file_exists("../captured/".$_GET["q"].".jpg")){
		echo '
		       <h2>Receipt No: '.$_GET["q"].'</h2>
			   <h2>Amount: $50</h2>
			   <button>PayPal</button>
			   <button>Bank Transfer</button>
			   <img src="../captured/'.$_GET["q"].'.jpg" />
	    ';
	}else{
		echo "<h2>Receipt No: Not Found!</h2>";
	}
}

?>

</body>
</html>