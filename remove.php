<?php
 
	$conn = mysqli_connect("localhost", "root", "", "poze");
	$name="";
	$country="";
	if(isset($_GET['name'])){
		$name = $_GET['name']; 
	}
	if(isset($_GET['country'])){
		$country = $_GET['country']; 
	}
	$sql = "DELETE FROM user_to_country where user_name='$name' AND country_id='$country'";
	if($conn->query($sql) === TRUE) {
		$added = "Country deleted from your list";
	}
	else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
		
	$conn->close();
	if (isset($_SERVER["HTTP_REFERER"])) {
		header("Location: " .$_SERVER["HTTP_REFERER"]);
	}
