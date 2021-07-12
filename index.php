
<?php
require_once("men/db/dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
  case "add":
    if(!empty($_POST["quantity"])) {
      $productByCode = $db_handle->runQuery("SELECT * FROM productmen WHERE code='" . $_GET["code"] . "'");
      $itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"]));
      
      if(!empty($_SESSION["cart_item"])) {
        if(in_array($productByCode[0]["code"],$_SESSION["cart_item"])) {
          foreach($_SESSION["cart_item"] as $k => $v) {
              if($productByCode[0]["code"] == $k)
                $_SESSION["cart_item"][$k]["quantity"] = $_POST["quantity"];
          }
        } else {
          $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
        }
      } else {
        $_SESSION["cart_item"] = $itemArray;
      }
    }
  break;
}
}
?>
<!DOCTYPE html>

<html>
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>MekelleShop.Com-Men's</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="style2.css">
  <script src="bootstrap/js/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
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
 <body>
 <?php
$session_items = 0;
if(!empty($_SESSION["cart_item"])){
  $session_items = count($_SESSION["cart_item"]);
} 
?>
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
        <li class="font"><a>To Buy Products</a></li>
  
        <li class="font"><a href="login.php">Login</a></li>
        <li class="font"><a href="">or</a></li>
        <li class="font"><a href="signup.php">Register</a></li>
        
      </ul>
    </div>
  </div>
</nav>
<br><br><br>
 <div class="container-fluid" style="width:90%;">
  <div class="row">
    <div class="col-sm-11" style="max-width:98%;background-color:#e3e3e3;margin-left: 20%;">
      <div id="product-grid">
        <h4 style="color: #000;font-family: cominc suns ms,sarif;font-weight: bolder;">Products For Mne's</h4>
  <?php
  $product_array = $db_handle->runQuery("SELECT * FROM productmen ORDER BY id ASC");
  if (!empty($product_array)) { 
    foreach($product_array as $key=>$value){
  ?>
    <div class="product-item" style="background:#fff;">
      <form method="post" action="mens.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
      <div class="product-image"><img style="max-height: 250px;max-width: 250px;" src="men/mensproduct/<?php echo $product_array[$key]["image"]; ?>"></div>
      <div><strong>TYPE:<?php echo $product_array[$key]["name"]; ?></strong></div>
      <div><strong>MADE IN:<?php echo $product_array[$key]["madein"]; ?></strong></div>

      <div class="product-price"><?php echo $product_array[$key]["price"]. "Birr"; ?></div>
      </form>
    </div>
  <?php
      }
  }
  ?>
  <div id="product-grid">
        <h3 style="color: #000;font-family: cominc suns ms,sarif;font-weight: bolder;">Products Of Accessesoris</h3>
  <?php
  $product_array = $db_handle->runQuery("SELECT * FROM accessesoris ORDER BY id ASC");
  if (!empty($product_array)) { 
    foreach($product_array as $key=>$value){
  ?>
    <div class="product-item" style="background:#fff;">
      <form method="post" action="mens.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
      <div class="product-image"><img style="max-height: 250px;max-width: 250px;" src="accessesoris/product/<?php echo $product_array[$key]["image"]; ?>"></div>
      <div><strong>TYPE:<?php echo $product_array[$key]["name"]; ?></strong></div>
      <div><strong>MADE IN:<?php echo $product_array[$key]["madein"]; ?></strong></div>

      <div class="product-price"><?php echo $product_array[$key]["price"]. "Birr"; ?></div>
      </form>
    </div>
  <?php
      }
  }
  ?>
  <div id="product-grid">
        <h4 style="color: #000;font-family: cominc suns ms,sarif;font-weight: bolder;">Products For Women's</h4>
  <?php
  $product_array = $db_handle->runQuery("SELECT * FROM productgirl ORDER BY id ASC");
  if (!empty($product_array)) { 
    foreach($product_array as $key=>$value){
  ?>
    <div class="product-item" style="background:#fff;">
      <form method="post" action="mens.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
      <div class="product-image"><img style="max-height: 250px;max-width: 250px;" src="women/girlsproduct/<?php echo $product_array[$key]["image"]; ?>"></div>
      <div><strong>TYPE:<?php echo $product_array[$key]["name"]; ?></strong></div>
      <div><strong>MADE IN:<?php echo $product_array[$key]["madein"]; ?></strong></div>

      <div class="product-price"><?php echo $product_array[$key]["price"]. "Birr"; ?></div>
      </form>
    </div>
  <?php
      }
  }
  ?>
    </div>
  </div>
</div>
</div>
 
      
  
<!-- footer -->
 
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip(); 
  
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

    if (this.hash !== "") {

      event.preventDefault();

      
      var hash = this.hash;

      
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        window.location.hash = hash;
      });
    } 
  });
})
</script>
 </body>
 </html>