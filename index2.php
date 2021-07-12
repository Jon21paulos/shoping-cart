<?php require ('db/config.php'); ?>
<?php require ('db/session.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>MekelleShop.Com-Index</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap/style.css">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <script src="bootstrap/js/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
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
  .person {
      border: 10px solid transparent;
      margin-bottom: 25px;
      width: 80%;
      height: 80%;
      opacity: 0.7;
  }
  .person:hover {
      border-color: #000;
  }
  .carousel-indicators{
    color: red;
  }
 .glyphicon-chevron-right{
  color: #000;
  font-size: 24px;
 }
  .glyphicon-chevron-left{
  color: #000;
  font-size: 24px;
 }
  .carousel-inner img {
      -webkit-filter: grayscale(90%);
      width: 100%;
      margin: auto;
  }
  .carousel-caption h3 {
      color: #000 !important;
  }
  @media (max-width: 600px) {
    .carousel-caption {
      display: none; 
    }
  }
  .bg-1 {
      background: #2d2d30;
      color: #bdbdbd;
  }
  .bg-1 h3 {color: #fff;}
  .bg-1 p {font-style: italic;}
  .list-group-item:first-child {
      border-top-right-radius: 0;
      border-top-left-radius: 0;
  }
  .list-group-item:last-child {
      border-bottom-right-radius: 0;
      border-bottom-left-radius: 0;
  }
  .thumbnail {
      padding: 0 0 15px 0;
      border: none;
      border-radius: 0;
  }
  .thumbnail p {
      margin-top: 15px;
      color: #555;
  }
  .btn {
      padding: 10px 20px;
      background-color: #000;
      color: #f1f1f1;
      border-radius: 0;
      transition: .2s;
  }
  .btn:hover, .btn:focus {
      border: 1px solid #333;
      background-color: #fff;
      color: #000;
  }
  .modal-header, h4, .close {
      background-color: #333;
      color: #fff !important;
      text-align: center;
      font-size: 30px;
  }
  .modal-header, .modal-body {
      padding: 40px 50px;
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
      background: no-repeat;
  }
  .dropdown-menu li a:hover {
      background-color: #d1d1d1 !important;
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
        <li><a href="#myPage">HOME</a></li>
        <li><a href="#shop">SHOP</a></li>
        <li><a href="#tour">ABOUT US</a></li>
        <li><a href="#contact">CONTACT US</a></li>
      <?php
              $result= mysqli_query($conn,"select *  from member where mem_id='$id_session'") or die (mysqli_error());
              while ($row= mysqli_fetch_array ($result) ){
              $id=$row['mem_id'];
              ?>
<li><a href="" style="color: #ffffff;">Hi:<?php echo $row ['username']; ?></a></li>
      <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="background-color:#333;height: 50px;"><img src="profile/<?php echo $row ['profile'];?>" style="width:70px;height: 70px;margin-top: 0px;border-radius: 360px;margin-top: -30px;">
          <span class="caret" style="color: #ffffff;"></span></a>
          <ul class="dropdown-menu" style="background: #e3e3e3; border-radius: 5px;font-weight: bolder;">
            <li><a href="men/profile.php<?php echo '?mem_id='.$id; ?>">EditProfile</a></li>
            <li><a href="men/logout.php">LogOut</a></li>
          </ul>
        </li>
<?php } ?>
      </ul>

    </div>
  </div>
</nav>
<br><br><br>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">

      <li data-target="#myCarousel" data-slide-to="0" class="active" style="border-color:#000;background-color:#000;"></li>
      <li data-target="#myCarousel" data-slide-to="1" style="border-color:#000;background-color:#000;"></li>
      <li data-target="#myCarousel" data-slide-to="2" style="border-color:#000;background-color:#000;"></li>
      <li data-target="#myCarousel" data-slide-to="3"  style="border-color:#000;background-color:#000;"></li>
      <li data-target="#myCarousel" data-slide-to="4" style="border-color:#000;background-color:#000;"></li>
    </ol>
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="slider.jpg" alt="New York" width="1200" height="700" style="min-height:577px;max-height:577px;">      
      </div>

      <div class="item">
        <img src="slider2.png" alt="Chicago" width="1200" height="700" style="min-height:577px;max-height:577px;">     
      </div>
    
      <div class="item">
        <img src="slider.jpg" alt="Los Angeles" width="1200" height="700" style="min-height:577px;max-height:577px;">     
      </div>

      <div class="item">
        <img src="slider2.png" alt="Los Angeles" width="1200" height="700" style="min-height:577px;max-height:577px;">   
      </div>

      <div class="item">
        <img src="slider.jpg" alt="Los Angeles" width="1200" height="700" style="min-height:577px;max-height:577px;">     
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>
<div id="shop" class="container text-center">
  <h2 style="color:#000;">For Shope</h2>
  <p><em></em></p>
  <p></p>
  <br>
  <div class="row">
    <div class="col-sm-4" style="float:right;right:-60px;">
      <?php
      $result = mysqli_query($conn,"SELECT * FROM productgirl");
      $num_rows = mysqli_num_rows($result);
      ?>
      
      <p class="text-center"><strong class="btn btn-success" style="border-radius:5px; border-color:none;background:#000;color:#ffffff;">WOMEN'S <span style="background: red;border-radius: 5px;"> <?php echo $num_rows; ?> </span> </strong></p><br>
      <a href="women/women.php">
        <img src="bandmember.jpg" class="img-circle person" alt="Random Name" width="255" style="min-height:355px;min-width:200px; " >
      </a>
    </div>
  <?php 
  $result = mysqli_query($conn,"SELECT * FROM productmen");
  $num_rows = mysqli_num_rows($result);
  ?>
                          
    <div class="col-sm-4" style="float:right;right:-60px;">
      <p class="text-center"><strong class="btn btn-success" style="border-radius:5px;background:#000;color:#ffffff;">MEN'S <span style="background: red;border-radius: 5px; min-width: 100px;"><?php echo $num_rows; ?></span></strong></p><br>
      <a href="men/mens.php">
        <img src="mensprofile.jpg" class="img-circle person" alt="Random Name" width="255" height="255" style="min-height:355px;min-width:200px;float:right;">
      </a>
    </div>
    <div class="col-sm-4" style="float:right;right:-60px;">
     <?php
     $result = mysqli_query($conn,"SELECT * FROM accessesoris");
     $num_rows = mysqli_num_rows($result);
     ?>
      <p class="text-center"><strong class="btn btn-success" style="border-radius:5px;background:#000;color:#ffffff;">ACCESSESORIE'S <span style="background: red;border-radius: 5px;"><?php echo $num_rows;?></span></strong></p><br>
      <a href="accessesoris/accessesoris.php">
        <img src="accessoris.jpg" class="img-circle person" alt="Random Name" width="255" height="255"style="min-height:355px;min-width:200px;float:right;">
      </a>
    </div>
  </div>
</div>

<!-- Container (TOUR Section) -->
<div id="tour" class="bg-1">
  <div class="container">
    <h3 class="text-center">ABOUT US</h3>
    <p class="text-center">Mekelleshope .<br>
    is a shoping site that helps  cumstemers to buy and to sell product an esay way and <br>
     Remember How To Get Free Shiping!</p>
    <ul class="list-group">
      <li class="list-group-item">Free Shiping <span class="label label-danger">Subscrib And Get Free shiping</span></li>  <br>
      <form accept="" method="post">
        <input class="form-control" required="" placeholder="email" type="email" name="email" style="max-width: 30%;">
          <input  type="submit" class="btn btn-success" name="email" value="Subscrib" style="border-radius: 5px;">
      </form>     
    </ul>
    
  </div>
  </div>

<!-- Container (Contact Section) -->
<div id="contact" class="container">
  <h3 class="text-center">Contact Us</h3>
  <p class="text-center"><em></em></p>

  <div class="row">
    <div class="col-md-4">
      <p>Contact us for more .</p>
      <p><span class="glyphicon glyphicon-map-marker"></span>Mekelle, Ethiopia</p>
      <p><span class="glyphicon glyphicon-phone"></span>Phone: +251 914546801/0914546801</p>
      <p><span class="glyphicon glyphicon-envelope"></span>Email: contact@mekelleshop.com</p>
    </div>
    <div class="col-md-8">
      <div class="row">
        <div class="col-sm-6 form-group">
          <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
        </div>
        <div class="col-sm-6 form-group">
          <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
        </div>
      </div>
      <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea>
      <br>
      <div class="row">
        <div class="col-md-12 form-group">
          <button class="btn pull-right" type="submit" style="background-color:#000;color:#ffffff;width:100%;height:50px;border-radius:5px;">Send</button>
        </div>
      </div>
    </div>
  </div>
  <br>
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
