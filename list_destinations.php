<?php
 
	$conn = mysqli_connect("localhost", "root", "", "poze");

	$user_name = $_GET['name'];
	$result = mysqli_query($conn, "select * from countries where id in select * from user_to_countries where '$user_name'=user_name");
	$str = "";
	$count = 0;
	while($row = mysqli_fetch_assoc($result)) {
		$str .= '<div align="center"><button class="buttonList b1">'.$row['country'].'</button></div><p></p>';
		$count = $count + 1;
		$count = $count % 7;
	}
	echo $str;
	mysqli_close($conn);
?>

