<!DOCTYPE html>
<html lang="en">
<head>
<title>Travel Bucket List | Gallery</title>
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
          <li class="current"> <a href="gallery.php">Gallery</a>
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
    <section id="content">
        <h3 align="center"> <span class="title">Continents</span> </h3>
		<p> </p>
		<?php
			$conn = mysqli_connect("localhost", "root", "", "poze");
			$result = mysqli_query($conn, "select * from continente");
			$str = "";
			while($row = mysqli_fetch_assoc($result)) {
				$str .= '<div class="container">
			<a href="continent.php?name='.$row['nume'].'&id='.$row['id_cont'].'"> <img src='.$row["poza"].' alt="Avatar" class="image" style="width:100%"> </a>
			<div class="middle">
				<div class="textOnImage">'.$row['nume'].'</div>
			</div>
		</div>
		<p> </p>';
			}
			echo $str;
			mysqli_close($conn);
		?>
		<!--<div class="container">
			<a href="europe.html"> <img src="images/france.jpg" alt="Avatar" class="image" style="width:100%"> </a>
			<div class="middle">
				<div class="textOnImage">Europe</div>
			</div>
		</div>
		<p> </p>
		<div class="container">
			<a href="namerica.html"> <img src="images/namerica.jpg" alt="Avatar" class="image" style="width:100%"> </a>
			<div class="middle">
				<div class="textOnImage">North America</div>
			</div>
		</div>
				<p> </p>
		<div class="container">
			<a href="samerica.html"> <img src="images/samerica.jpg" alt="Avatar" class="image" style="width:100%"> </a>
			<div class="middle">
				<div class="textOnImage">South America</div>
			</div>
		</div>
		
      </div>
	  -->
    </section>
  </div>
</div>
</body>
</html>
