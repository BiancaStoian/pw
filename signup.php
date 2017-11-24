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
<script>

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
		  <li class="current"><a href="login.php"> Login </a></li>
        </ul>
      </nav>
      <div class="clear"></div>
    </header>
    <!-- Content -->

  
<!-- The Modal (contains the Sign Up form) -->
   <?php include('register.php'); ?>
  <h3 align="center" class="title">Sign up </h3>
  <form class="modal-content modal-signup" method="post" action="signup.php">
    <div class="containerlog" >
	  <?php include('errors.php'); ?>
	  <label class="formtext">Username</label>
	  <input type="text" placeholder="Enter Username" name="username">
		
      <label class="formtext">Email</label>
      <input type="text" placeholder="Enter Email" name="email">

      <label class="formtext">Password</label>
      <input type="password" placeholder="Enter Password" name="password1">

      <label class="formtext">Repeat Password</label>
      <input type="password" placeholder="Repeat Password" name="password2">
      <div class="clearfix">
	    <button type="submit" name="register" class="signupbtn">Sign Up</button>
      </div>
    </div>
  </form>
  <!-- Footer -->
  <footer>
    <div class="copyright"> Website created by Bianca-Elena Stoian</div>
  </footer>
  </div>
</div>
</body>
</html>
