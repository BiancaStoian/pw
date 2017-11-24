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
<title>TravelBucketList | About</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/style.css">
<script src="js/jquery-1.7.1.min.js"></script>
<script src="js/superfish.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/tms-0.4.1.js"></script>
<script src="js/slider.js"></script>
<script src="js/jquery.cycle.all.min.js"></script>
<script>
$(function(){
	$('.content-slider').cycle({
		fx: 'fade',
		prev: '.cs-prev',
		next: '.cs-next'
	}); 
})
</script>
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
    <section id="content">
	  <p class="title" align="center"> About me </p>
        <p class="text"> My name is Bianca and I am 21 year old student who fell deeply in love with traveling. Here are my top reasons why traveling is important:</p>
		<?php
			$conn = mysqli_connect("localhost", "root", "", "poze");
			$result = mysqli_query($conn, "select * from text");
			$str = "";
			$count = 1;
			while($row = mysqli_fetch_assoc($result)) {
				$str .= '<p align="middle" class="text';
				$str .= $count;
				$str .= '"> '.$row["text"].' </p>';
				$count = $count +  1;
			}
			echo $str;
			mysqli_close($conn);
		?>
		<p class="text"> But still, why did I create this website? 
		Because I like to be organised when it comes to traveling too: my bucket list must always be up to date.
		When I see a new location that interests me, I have to decide straight away its priority in my bucket list. 
		Enjoy discovering new places on the website, creating your own bucket list and then seeing them in person!</p>
	</section>
  </div>
</div>
</body>
</html>
