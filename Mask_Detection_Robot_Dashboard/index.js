$(".controls").on("input", ".submit", function(){
	// Get the recent command.
	var direction = document.querySelector('input[name="direction"]:checked').value;
	var speed = document.querySelector('select[name="speed"]').value;
	// Send the recent command to the page to execute related Python script.
	$.ajax({
		url: "?direction=" + direction + "&speed=" + speed,
	    type: "GET",
	    //success: () => {alert("D: " + direction + "\nS: " + speed);}
	});
});