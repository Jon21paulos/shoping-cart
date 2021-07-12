<?php require ('../db/config.php'); ?>
<?php require ('db/session.php'); ?>
<?php if (!isset($no_visible_elements) || !$no_visible_elements) { ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>MekelleShop.Com-Index</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../bootstrap/style.css">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <script src="../bootstrap/js/jquery.min.js"></script>
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <style>
  body {
      font: 400 15px/1.8 comic sans Ms,serif;
      color: #777;
      font-weight:600px;
      background-color:#d2d2d2;
  }
  h4 {
      margin: 10px 0 30px 0;
      letter-spacing: 10px;      
      font-size: 20px;
      color: #111;
  }
  .nav-tabs li a {
      color: #777;
  }
  .navbar {
      font-family:comic sans Ms,serif;
      height: 90px;
      margin-bottom: 0;
      background-color: #2d2d30;
      border: 0;
      font-size: 14px !important;
      letter-spacing: 3px;
      opacity: 0.9;
  }
  .navbar li a, .navbar .navbar-brand { 
    margin-top: 27px;
      color: #d5d5d5 !important;
  }
  .navbar-nav li a:hover {
      color: #fff !important;
  }
  .navbar-nav li.active a {
      color: #fff !important;
      background-color: #29292c !important;
  }
  .navbar-default .navbar-toggle {
      border-color: transparent;
  }
  .open .dropdown-toggle {
      color: #fff;
      background-color: #555 !important;
  }
  .dropdown-menu li a {
      color: #000 !important;
  }
  .dropdown-menu li a:hover {
      background-color: #000 !important;
  }
  footer {
      background-color: #2d2d30;
      color: #f5f5f5;
      padding: 32px;
  }
  footer a {
      color: #f5f5f5;
  }
  footer a:hover {
      color: #777;
      text-decoration: none;
  }  
  .form-control {
      border-radius: 0;
  }
  textarea {
      resize: none;
  }
  </style>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#myPage">MekelleShop.com</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right" style="margin-right:80px;">
        <li><a href="#myPage">AdminPage</a></li>
        <?php
  $user_query=mysqli_query($conn,"select *  from admin where id='$id_session'")or die(mysqli_error());
  $row=mysqli_fetch_array($user_query); {
?>
<li><a role="menuitem" href="logout.php" class="glyphicon glyphicon-log-out" style="color: red;">LogOut</a></li>
<?php } ?>
<?php } ?>
      </ul>

    </div>
  </div>
</nav>
<br><br><br>
<div style="background: #000;max-width: 100%;"><p style="margin-left: 100px;font-weight: bolder;">Admin/<a href="" style="text-decoration: none;color: #428bca"> Home</a></p></div>
 <div class="container-fluid" style="max-width: 95%;">
  <div class="row">
    <div class="col-sm-2" style="background-color:#e3e3e3;">
      <p style="color: #428bca;font-weight: bolder;margin-left: 30px;">Wellcom:<?php echo $row ['username']; ?></p>
      <p><img src="profile/<?php echo $row ['profile'];?>" style="height: 200px;width: 200px;border-radius: 360px;"></p>
      <div>
        <form method="post" action="" style="border-style: double;border: solid #000;">
          <p style="color: #428bca;font-weight: bolder;text-align: center;">Update form</p>
          <div class="form-group">
            <label for="usr" style="color: #428bca;font-weight: bolder;">User Name</label>
            <input id="usr" class="form-control" type="text" name="username" value="<?php echo $row ['username'];?>">

          </div>
          <div class="form-group">
            <label for="usr" style="color: #428bca;font-weight: bolder;">E-mail</label>
            <input class="form-control" id="usr" type="email" name="email" value="<?php echo $row ['email'];?>">
          </div>
          <div class="form-group">
            <label for="usr" style="color: #428bca;font-weight: bolder;">Password</label>
            <input class="form-control" id="pwd" type="password" name="password" value="<?php echo $row ['password'];?>">
          </div>
          <div class="form-group" ">
            <input type="submit" name="update" value="Update" class="btn btn-danger" style="width: 100%;border-radius: 360px;">
          </div>
        </form>
      </div>
    </div>
    <div class="col-sm-9" style="background-color:#e3e3e3;margin-left:10px;">
      <p>Controls...</p>
      <div class="container" style="max-width: 100%;">
        <div class="row">
          <div class="col-sm-2">
            <div style="background: #c1c1c1; width: 150px;text-align: center;font-weight: bolder;text-decoration: none;border-radius: 10px;">
      <a  href="user.php">
            <i style="font-size: 30px;" class="glyphicon glyphicon-user "></i>
              <?php
              $result = mysqli_query($conn,"SELECT * FROM member");
              $num_rows = mysqli_num_rows($result);
              ?>
            <div>Total Users</div>
            <div><?php echo $num_rows; ?></div>
        </a>
      </div><br>

            <div style="background: #c1c1c1; width: 150px;text-align: center;font-weight: bolder;text-decoration: none;border-radius: 10px;">
      <a  href="girlsproduct.php">
            <i style="font-size: 30px;" class="glyphicon glyphicon-shopping-cart"></i>
              <?php
              $result = mysqli_query($conn,"SELECT * FROM productgirl");
              $num_rows = mysqli_num_rows($result);
              ?>
            <div>Girl's Products</div>
            <div><?php echo $num_rows; ?></div>
        </a>
      </div>
          </div>
          <div class="col-sm-2">
            <div style="background: #c1c1c1; width: 150px;text-align: center;font-weight: bolder;text-decoration: none;border-radius: 10px;">
      <a  href="mensproduct.php">
            <i style="font-size: 30px;" class="glyphicon glyphicon-shopping-cart"></i>
              <?php
              $result = mysqli_query($conn,"SELECT * FROM productmen");
              $num_rows = mysqli_num_rows($result);
              ?>
            <div>Men's Products</div>
            <div><?php echo $num_rows; ?></div>
        </a>
      </div><br>
      <div style="background: #c1c1c1; width: 150px;text-align: center;font-weight: bolder;text-decoration: none;border-radius: 10px;">
      <a  href="userproduct.php">
            <i style="font-size: 30px;" class="glyphicon glyphicon-shopping-cart"></i>
              <?php
              $result = mysqli_query($conn,"SELECT * FROM userproduct");
              $num_rows = mysqli_num_rows($result);
              ?>
            <div>products From users</div>
            <div><?php echo $num_rows; ?></div>
        </a>
      </div><br>
      <div style="background: #c1c1c1; width: 150px;text-align: center;font-weight: bolder;text-decoration: none;border-radius: 10px;">
      <a  href="userproduct.php">
            <i style="font-size: 30px;" class="glyphicon glyphicon-shopping-cart"></i>
            <div><a href="uploadf.php"> Upload Product To Women's</a></div>
            <div></div>
        </a>
      </div>

          </div>
          <div class="col-sm-2">
            <div style="background: #c1c1c1; width: 150px;text-align: center;font-weight: bolder;text-decoration: none;border-radius: 10px;">
      <a  href="accessesoris.php">
            <i style="font-size: 30px;" class="glyphicon glyphicon-shopping-cart"></i>
              <?php
              $result = mysqli_query($conn,"SELECT * FROM accessesoris");
              $num_rows = mysqli_num_rows($result);
              ?>
            <div>Accessesoris</div>
            <div><?php echo $num_rows; ?></div>
        </a>
      </div><br>
      <div style="background: #c1c1c1; width: 150px;text-align: center;font-weight: bolder;text-decoration: none;border-radius: 10px;">
      <a  href="userproduct.php">
            <i style="font-size: 30px;" class="glyphicon glyphicon-shopping-cart"></i>
            <div><a href="uploadm.php">  Upload Product To Men's</a></div>
            <div></div>
        </a>
      </div><br>
      <div style="background: #c1c1c1; width: 150px;text-align: center;font-weight: bolder;text-decoration: none;border-radius: 10px;">
      <a  href="userproduct.php">
            <i style="font-size: 30px;" class="glyphicon glyphicon-shopping-cart"></i>
            <div><a href="uploada.php">Upload To Accessesoris</a></div>
            <div></div>
        </a>
      </div>
          </div>
        </div>
      </div>
      
       
    </div>
  </div>
</div>
 
<!-- Footer -->
<footer class="text-center">
  <a class="up-arrow" href="#myPage" data-toggle="tooltip" title="TO TOP">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a><br><br>
  <p>

 © 2010 AllRight Reserved MekelleShop.com
</p> 
</footer>

<script>
$(document).ready(function(){
  // Initialize Tooltip
  $('[data-toggle="tooltip"]').tooltip(); 
  
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {

      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
})
</script>

</body>
</html>
