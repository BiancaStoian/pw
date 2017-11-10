<!DOCTYPE html>
<html lang="en">
<head>
<title>Travel Bucket List</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/style.css">
<script src="js/jquery-1.7.1.min.js"></script>
<script src="js/superfish.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/tms-0.4.1.js"></script>
<script src="js/slider.js"></script>
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
          <li> <a href="gallery.html">Gallery</a>
            <ul>
              <li class="current"><a href="europe.html">Europe</a></li>
              <li> <a href="#">America</a>
                <ul>
                  <li><a href="namerica.html">North America</a></li>
				  <li><a href="samerica.html">South America</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li><a href="bucketList.html">My Bucket List</a></li>
          <li><a href="contacts.html">Contact us</a></li>
		  <li><a onclick="document.getElementById('id01').style.display='block'"> Login </a></li>
        </ul>
      </nav>
      <div class="clear"></div>
    </header>
    <!-- Content -->
    <section id="content">
		<h3 align="center"> <span class="title">Romania</span> </h3>
		<div class="text">Rugged stone churches and dazzling monasteries dot a pristine landscape of rocky mountains and rolling hills. Transylvanian towns have stepped out of time, while vibrant Bucharest is all energy.</div>
		<div class="gallery cf">
		<?php
			$conn = mysqli_connect("localhost", "root", "", "poze");
			$result = mysqli_query($conn, "select * from romania");
			$str = "";
			while($row = mysqli_fetch_assoc($result)) {
				$str .= '<div> <img src='.$row["poza"].' class="myPic" > </div>';
			}
			echo $str;
			mysqli_close($conn);
		?>
		</div>
	</section>
  </div>
</div>
</body>
</html>