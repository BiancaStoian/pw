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
	
	$sql = "SELECT * from user_to_country where user_name='$name' AND country_id='$country'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows == 0){
		$sql = "INSERT INTO user_to_country (user_name, country_id) VALUES ('$name', '$country')";
		if($conn->query($sql) === TRUE) {
			$added = "Country added to your list";
		}
		else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
		
	}
	$conn->close();
	if (isset($_SERVER["HTTP_REFERER"])) {
			header("Location: " .$_SERVER["HTTP_REFERER"]);
		}
