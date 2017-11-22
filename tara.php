<?php 
	session_start(); 
	
	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: index.php");
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Travel Bucket List | <?php echo $_GET['nume']?></title>
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
	<h3 align="center"> <span class="title"><?php echo $_GET['nume']?></span> </h3>
	<div class="text"> <?php echo $_GET['desc']?></div>
	<div class="container">
		<div class="gallery cf">
		<?php
			$conn = mysqli_connect("localhost", "root", "", "poze");
			$id = $_GET['id'];
			$result = mysqli_query($conn, "select * from poza where id_country = '$id' ");
			$str = "";
			while($row = mysqli_fetch_assoc($result)) {
				$str .= '<div> <img src='.$row["path"].' class="myPic" > </div>';
			}
			echo $str;
			mysqli_close($conn);
		?>
		</div>
	</div>
	<?php  if (isset($_SESSION['username'])) : ?>
		<div align="center">
			<button onClick="add.php?name=$_SESSION['username']&country=$_GET['id']" class="addButton">Add to bucket list</button>
		</div>
	<?php endif ?>
	<pre> </pre>
	<pre> </pre>
	<!-- Footer -->
    <footer>
      <div class="copyright"> Website created by Bianca-Elena Stoian</div>
    </footer>
  </div>
</div>
</body>
</html>