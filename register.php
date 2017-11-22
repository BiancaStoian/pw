<?php

  if(!isset($_SESSION)) 
    { 
        session_start(); 
    }	
	
  $conn = mysqli_connect("localhost", "root", "", "poze");

$errors = array(); 

//register (sign up)
  if(isset($_POST['register'])){
	$username = mysqli_real_escape_string($conn,$_POST['username']);
	$mail = mysqli_real_escape_string($conn,$_POST['email']);
	$pass1 = mysqli_real_escape_string($conn,$_POST['password1']);
	$pass2 = mysqli_real_escape_string($conn,$_POST['password2']);
	
	// form validation: ensure that the form is correctly filled
	if (empty($username)) { array_push($errors, "Username is required"); }
	if (empty($mail)) { array_push($errors, "Email is required"); }
	if (empty($pass1)) { array_push($errors, "Password is required"); }
	if (empty($pass2)) { array_push($errors, "Password confirmation is required"); }
	
	if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
		array_push($errors, "Problema email");
	}
	
	if ($pass1 != $pass2) {
			array_push($errors, "The two passwords do not match");
    }
	
	if (count($errors) == 0) {
		$passwd=md5($pass1); //encrypt the password before saving in the database
		$sql = "INSERT INTO user (username, email, password) VALUES ('$username','$mail','$passwd')";
		mysqli_query($conn,$sql);
		
		$_SESSION['username'] = $usern;
		$_SESSION['success'] = "You are now logged in";
		header('location: index.php');
    }
  }
  
  //login
  if (isset($_POST['login'])) {
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);

	if (empty($email)) {
		array_push($errors, "Username is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}
	
	if (count($errors) == 0) {
		$password = md5($password);
		$query = "SELECT u.username FROM user u WHERE email='$email' AND password='$password'";
		$results = mysqli_query($conn, $query);
		$username = '';
		while ($row = mysqli_fetch_assoc($results)) {
			$username = $row['username'];
		}
		
		if (mysqli_num_rows($results) == 1) {
			$_SESSION['username'] = $username;
			header('location: index.php');
			
		}else {
			array_push($errors, "Wrong username/password combination");
		}
	}
  }
  
  //logout
	if (isset ($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['uname']);
		header('location: index.php');
	}
  $conn->close();
  
