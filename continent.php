<?php 
	session_start(); 
	
	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Travel Bucket List | <?php echo $_GET['name']?></title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/prettyPhoto.css">
<script src="js/jquery-1.7.1.min.js"></script>
<script src="js/superfish.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/tms-0.4.1.js"></script>
<script src="js/slider.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<!--[if lt IE 9]>
<script src="js/html5.js"></script>
<link rel="stylesheet" href="css/ie.css"> 
<![endif]-->
</head>
<body>
<div class="main-indents">
  <div class="main">
    <!-- Header -->
    <header>
      <h1 class="logo"><a href="index.php">Travel Bucket List</a></h1>
      <nav>
        <ul class="sf-menu">
          <li><a href="index.php">home</a></li>
          <li><a href="about.php">About</a></li>
          <li> <a href="gallery.php">Gallery</a>
            <ul>
              <li><a href="continent.php?name=Europe&id=1"> Europe</a></li>
              <li> <a href="#">America</a>
                <ul>
                  <li><a href="continent.php?name=North America&id=2">North America</a></li>
				  <li><a href="continent.php?name=South America&id=3">South America</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li><a href="bucketlist.php">My Bucket List</a></li>
          <li><a href="contacts.php">Contact us</a></li>
		  <li> <?php  if (isset($_SESSION['username'])) : ?>
			<a>Welcome <strong class="user"><?php echo $_SESSION['username']; ?></strong></a>
			<p> <a href="index.php?logout='1'" class = "logout" >logout</a> </p>
			<?php else : ?>
				<li><a href="login.php"> Login </a></li>
			<?php endif ?>
		  </li>
        </ul>
      </nav>
      <div class="clear"></div>
    </header>

    <!-- Content -->
	<p></p>
	<h3 align="center"> <span class="title"><?php echo $_GET['name']?></span> </h3>
	<?php
			$conn = mysqli_connect("localhost", "root", "", "poze");
			$id_cont = $_GET['id'];
			$result = mysqli_query($conn, "select * from countries where '$id_cont'=id_cont");
			$str = "";
			while($row = mysqli_fetch_assoc($result)) {
				$str .= '<p></p>
					<div class="container">
						<a href="tara.php?nume='.$row['country'].'&id='.$row['id'].'&desc='.$row['desc'].'"> <img src='.$row["poza"].' alt="Avatar" class="image" style="width:100%"> </a>
						<div class="middle">
							<div class="textOnImage">'.$row["country"].'</div>
						</div>
					</div>';
			}
			echo $str;
			mysqli_close($conn);
	?>
	<p></p>
  </div>
</div>
</body>
</html>