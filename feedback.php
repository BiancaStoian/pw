<?php
 
$conn = mysqli_connect("localhost", "root", "", "poze");

$email = $_POST['email'];
$comment = $_POST['comment'];

if(empty($email)) {
	echo "Introduce?i email-ul!";
	die();
}

if(empty($comment)) {
	echo "Adaugati o recenzie!";
	die();
}

$sql = "INSERT INTO feedback (Email, Feedback)
	VALUES ('$email', '$comment')";
	
if($conn->query($sql) === TRUE) {
	echo "Mesaj receptionat!";
}		else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

if (isset($_SERVER["HTTP_REFERER"])) {
	header("Location: " .$_SERVER["HTTP_REFERER"]);
}
?>
