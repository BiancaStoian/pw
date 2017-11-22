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
<title>Travel Bucket List | My List</title>
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
          <li class="current"><a href="bucketlist.php">My Bucket List</a></li>
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
		<h3 align="center"> <span class="title">My Bucket List</span> </h3><p></p>
		<p></p>
		<?php if (isset($_SESSION['username'])) : 
 
			$conn = mysqli_connect("localhost", "root", "", "poze");
			$user_name = $_SESSION['username'];
			$result = mysqli_query($conn, "select * from countries where id in (select country_id from user_to_country where '$user_name'=user_name)");

			$str = "";
			$count = 0;
			while($row = mysqli_fetch_assoc($result)) {
				$count = $count + 1;
				$str .= '<div align="center"><a href="tara.php?nume='.$row['country'].'&id='.$row['id'].'&desc='.$row['desc'].'" class="buttonList b';
				$str .= $count;
				$str .= '">'.$row['country'].'</a></div><p></p>';
				$count = $count % 7;
			}
			echo $str;
			mysqli_close($conn);
			else:
				echo "<div class='text'>In order to create your own bucket list, you must <a href='login.php'>login</a>
					(or <a href='signup.php'>sign up</a>) first. Thank you!</div><p></p>
					<div align='center'><img src='images/page1-img1.jpg'></div>";
			endif;
		?>			
	</section>
	
    <!-- Footer -->
    <footer>
      <div class="copyright"> Website created by Bianca-Elena Stoian</div>
    </footer>
  </div>
</div>
</body>
</html>