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
<title>Travel Bucket List | Contacts</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/forms.css">
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
          <li class="current"><a href="contacts.php">Contact us</a></li>
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
		<h3 align="center"> <span class="title">Contact us</span> </h3>
		<div class="text"> Any complaints? Any suggestions? Don't hesitate to contact us. We try our best to satisfy all our travel buddies.</div>
        <article class="a2">
          <div class="wrapper">
            <div class="col-11">
              <div class="text" align="center">Postal Address</div>
              <div align="center" class="map_container">
				<script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyB6ud8tZ3FdK_NCjgJrdeFA1GcVqLrZyCQ'></script><div style='overflow:hidden;height:370px;width:520px;'><div id='gmap_canvas' style='height:370px;width:520px;'></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><script type='text/javascript'>function init_map(){var myOptions = {zoom:16,center:new google.maps.LatLng(45.737666,21.236621000000013),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(45.737666,21.236621000000013)});infowindow = new google.maps.InfoWindow({content:'<strong>Travel Bucket List</strong><br>132, Liviu Rebreanu<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
			  </div>
              <div class="adress">
                <div class="dt"> 132 Bv. Liviu Rebreanu, Timisoara </div>
                <div class="extra-wrap">
                  <div class="dd">Telephone: +41254256</div>
                  <div class="dd">E-mail: <a href="#">contact@tblist.com</a></div>
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="text" align="center">Feedback</div>
              <form id="contact-form" action="feedback.php" method="post">
                <fieldset>
                  <label class="email">
                    <input type="email" id="email" name="email" value="Email" onFocus="if(this.value=='Email'){this.value=''}" onBlur="if(this.value==''){this.value='Email'}">
                  </label>
                  <label class="message">
                    <textarea id="comment" name="comment" onFocus="if(this.value=='Message'){this.value=''}" onBlur="if(this.value==''){this.value='Message'}">Message</textarea>
                  </label>
				    <div class="btns">
						<button class="sendbtn">Send</button>
					</div>
                </fieldset>
              </form>
            </div>
          </div>
        </article>
    </section>
    <!-- Footer -->
    <footer>
      <div class="copyright"> Website created by Bianca-Elena Stoian</div>
    </footer>
  </div>
</div>
</body>
</html>
