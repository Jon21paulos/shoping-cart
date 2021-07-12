<?php require ('../db/session.php'); ?>

<?php
require_once("db/dbcontroller.php");
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
        <li>
          <style type="text/css">
            #keyword{border: #CCC 1px solid; border-radius: 4px; padding: 7px;background:url("demo-search-icon.png") no-repeat center right 7px;}
          </style>
        <form name="frmSearch" action="" method="post">
         <li style='text-align:right;margin:20px 0px;'><input type='text' name='search[keyword]' value="" id='keyword' maxlength='25'></li>
       </form>
     </li>
        <li class="font"><a href="../index2.php">HOME</a></li>
        <li class="font"><a href="#shop">SHOP</a></li>
        <li class="font"><a href="#contact">CONTACT</a></li>
        <li class="font"><a href=""class="glyphicon glyphicon-shopping-cart"></a></li>
        <li class="font"><a href="shopping_cart.php" style="background:red;border-radius:360px;margin-top:15px;margin-right:10px;"><?php echo $session_items; ?></a></li>
      </ul>
    </div>
  </div>
</nav>
<br><br><br>
  <div class="txt-heading" style="text-align:left;color:#d5d5d5;"><a href="../index2.php" style="text-decoration:none;color:#33B6CB;margin-left:120px;">Home/</a> Products/ <a href="mens.php" style="color:#33B6CB;text-decoration: none;">Men's</a></div>

 <div class="container-fluid" style="width:90%;">
  <div class="row">
    <div class="col-sm-2" style="background-color:#e3e3e3;color:#428bca;">

      <?php require ('../db/config.php'); ?>
<?php if (!isset($no_visible_elements) || !$no_visible_elements) { ?>
  <?php
  $user_query=mysqli_query($conn,"select *  from member where mem_id='$id_session'")or die(mysqli_error());
  $row=mysqli_fetch_array($user_query); {
?>
              <p style="color:#000;font-weight:bolder;text-align: center;">Hi: <?php echo $row['username']; ?></p>
              <span><img title="You can Change By Clicking" src="profile/<?php echo $row['profile']; ?>" style="max-width:100%;max-height: 250px;border-radius: 360px;border-color:#000;border-width: 5px;border-style: dotted;"></span>
              <ul>
              <li><a href="uploadf.php" style="color:#000;font-weight: bolder;">Upload Product</a></li>
              <li><a href="logout.php" style="color:#000;font-weight: bolder;">Log Out</a></li>
              </ul>

              <form method="post" action="" style="border-style: double; border-color:#000;" >
                <label style="margin-left:10px;color:#000;" >Update Information</label><br>
                 <span style="color: #428bca;text-align: center;margin-left:30px;">UserName:-
                <input type="text" name="username" value="<?php echo $row['username'];?>" style="border-radius: 360px;" class="form-control">
              </span>
              <span style="color: #428bca;text-align: center;margin-left:30px;">FirstName:-
                <input type="text" name="firstname" value="<?php echo $row['firstname'];?>" style="border-radius: 360px;" class="form-control">
              </span>
              <span style="margin-left: 30px;">Last-Name:-
                <input type="text" name="lastname" value="<?php echo $row['lastname'];?>" style="max-width:;border-radius: 360px;" class="form-control"></span>
               
            <span style="margin-left:30px;">Password:-<input class="form-control" style="max-width:;border-radius: 360px;" type="password" name="password" value="<?php echo $row['password']; ?>"></span>
            <span style="margin-left:30px;">profile Pic:-<input class="form-control" type="file" name="profile" value="<?php echo $row['profile']; ?>"></span><br>
            <span><input style="width: 100%;border-radius: 100px;" type="submit" name="update" class="btn btn-primary" value="update"></span>

          </form><br>
          <?php
if (isset($_POST['update'])) {

            $firstname=$_POST['firstname'];
            $lastname=$_POST['lastname'];
            $username=$_POST['username'];
            $password=$_POST['password'];
            $profile=$_POST['profile'];

$history_record=mysqli_query($conn,"select * from member where mem_id=$id_session");
$row=mysqli_fetch_array($history_record);
$user=$row['firstname']." ".$row['lastname'];

{
mysqli_query($conn," UPDATE member SET firstname='$firstname', middlename='$middlename', lastname='$lastname', username='$username', profile='$profile',
password='$password' WHERE user_id = '$id' ")or die(mysqli_error());
echo "<script>alert('Successfully Updated User Info!'); window.location='mens.php'</script>";
}

}

?>
            <?php }?>
          <?php }?>
         <span><a href="deactivate.php"> <input style="width: 100%;border-radius: 360px;" type="submit" name="delete_id" value="Deactivet" class="btn btn-danger"></a></span>

    </div>
    <div class="col-sm-9" style="background-color:#e3e3e3;margin-left: 10px;">
      <div id="product-grid">
  <?php
  $product_array = $db_handle->runQuery("SELECT * FROM productmen ORDER BY id ASC");
  if (!empty($product_array)) { 
    foreach($product_array as $key=>$value){
  ?>
    <div class="product-item" style="background:#fff;">
      <form method="post" action="mens.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
      <div class="product-image"><img src="mensproduct/<?php echo $product_array[$key]["image"]; ?>"></div>
      <div><strong>TYPE:<?php echo $product_array[$key]["name"]; ?></strong></div>
      <div><strong>MADE IN:<?php echo $product_array[$key]["madein"]; ?></strong></div>

      <div class="product-price"><?php echo $product_array[$key]["price"]. "Birr"; ?></div>
      <div><input class="form-control" style="float:left;max-width:25%;border-radius:360px;" type="text" name="quantity" value="1" size="2" /><input type="submit" value="Add to cart" class="btn btn-primary" style="float:right;width:70%;border-radius:360px;" /></div>
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
  <footer class="text-center">
  <a class="up-arrow" href="#myPage" data-toggle="tooltip" title="TO TOP">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a><br><br>
  <p>© 2010 AllRight Reserved MekelleShop.com</p> 
</footer>

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