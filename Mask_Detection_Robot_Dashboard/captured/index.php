<?php

// If the captured images of people without a mask are transferred from the  Mask Detection Robot (Raspberry Pi):
if(!empty($_FILES["captured_image"]['name'])){
	// Image File:
	$captured_image_properties = array(
	    "name" => $_FILES["captured_image"]["name"],
	    "tmp_name" => $_FILES["captured_image"]["tmp_name"],
		"size" => $_FILES["captured_image"]["size"],
		"extension" => pathinfo($_FILES["captured_image"]["name"], PATHINFO_EXTENSION)
	);
	
    // Check whether the uploaded file extensions are in allowed formats.
	$allowed_formats = array('jpg', 'png');
	if(!in_array($captured_image_properties["extension"], $allowed_formats)){
		echo 'FILE => File Format Not Allowed!';
	}else{
		// Check whether the uploaded file sizes exceed the data limit - 5MB.
		if($captured_image_properties["size"] > 5000000){
			echo "FILE => File size cannot exceed 5MB!";
		}else{
			// Save the uploaded image.
			move_uploaded_file($captured_image_properties["tmp_name"], $captured_image_properties["name"]);
			echo "FILE => Saved Successfully!";
		}
	}
}

?>