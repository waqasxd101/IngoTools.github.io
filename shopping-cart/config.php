<?php
	$conn = new mysqli("localhost","root","","product_card");
	if($conn->connect_error){
		die("Connection Failed!".$conn->connect_error);
	}
?>
