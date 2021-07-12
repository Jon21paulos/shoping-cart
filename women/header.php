<?php require ('../db/session.php'); ?>
<?php require ('../db/config.php'); ?>
<!DOCTYPE html>

<html>
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>MekelleShop.Com-Men's</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <script src="../bootstrap/js/jquery.min.js"></script>
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <style >
    body {
     font-family:comic sans Ms,serif;
      font: 400 15px/1.8 comic sans Ms,serif;
      color: #777;
      font-weight:600px;
      background-color:#d2d2d2;

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
      color: #f1f1f1;
      border-radius: 0;
      transition: .2s;
  }
  .btn:hover, .btn:focus {
      border: 1px solid #333;
      color: #000;
  }
  .modal-header, .close {
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
  #font{
    color: #ffffff !important;
  }
  .font a{
    color: #ffffff !important;
  }
  .font a:hover{
     color: #ffffff !important;
  }
  .font li.active a{
    color: #fff !important;
  }
  .navbar li a, .navbar .navbar-brand { 
    margin-top: 27px;
  }
  .navbar-nav li.active a {
      color: #fff !important;
      background-color: #29292c !important;
  }
  .navbar-default .navbar-toggle {
      border-color: transparent;
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
<?php if (!isset($no_visible_elements) || !$no_visible_elements) { ?>
  <?php
              $result= mysqli_query($conn,"select *  from member where mem_id='$id_session'") or die (mysqli_error());
              while ($row= mysqli_fetch_array ($result) ){
              $id=$row['mem_id'];
              ?>
    
 <body>
 <nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" id="font" href="../index2.php" >MekelleShop.com</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right" style="margin-right:80px;">
        <li>
          <style type="text/css">
            #keyword{border: #CCC 1px solid; border-radius: 4px; padding: 7px;background:url("demo-search-icon.png") no-repeat center right 7px;}
          </style>
     </li>
        <li class="font"><a href="../index2.php">HOME</a></li>
        <li class="font"><a href="#shop">SHOP</a></li>
        <li class="font"><a href="#contact">CONTACT</a></li>
        <li class="font"><a href="logout.php">Hi:<?php echo $row ['username']; ?></a></li>
        <li><a><img src="../profile/<?php echo $row ['profile'];?>" style="width:70px;height: 70px;margin-top: 0px;border-radius: 360px;margin-top: -30px;"></a></li>
        
       <li class="font"><a href="Deactivate.php">Deactivate</a></li>
      </ul>
    </div>
  </div>
</nav>
<br><br><br>
  <div class="txt-heading" style="text-align:left;color:#d5d5d5;"><a href="../index2.php" style="text-decoration:none;color:#33B6CB;margin-left:120px;">Home/</a> Products/ <a href="#" style="color:#33B6CB;text-decoration: none;">Profile</a></div>
  <?php }?>
  <?php }?>