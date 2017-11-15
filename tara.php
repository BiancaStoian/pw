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
      <h1 class="logo"><a href="index.html">Travel Bucket List</a></h1>
      <nav>
        <ul class="sf-menu">
          <li><a href="index.html">home</a></li>
          <li><a href="about.html">About</a></li>
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
          <li><a href="contacts.html">Contact us</a></li>
		  <li><a onclick="document.getElementById('id01').style.display='block'"> Login </a></li>
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
	<div align="center"><button class="addButton">Add to bucket list</button></div>
	<pre> </pre>
	<pre> </pre>
	<!-- Footer -->
    <footer>
      <div class="copyright"> Website created by Bianca-Elena Stoian</div>
      <ul class="social-list">
        <li><a href="#"><img src="images/soc-icon-1.png" alt=""></a></li>
        <li><a href="#"><img src="images/soc-icon-2.png" alt=""></a></li>
        <li><a href="#"><img src="images/soc-icon-3.png" alt=""></a></li>
      </ul>
    </footer>
  </div>
</div>
</body>
</html>