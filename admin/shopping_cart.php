<?php
session_start();
require_once("db/dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
	switch($_GET["action"]) {
		case "remove":
			if(!empty($_SESSION["cart_item"])) {
				foreach($_SESSION["cart_item"] as $k => $v) {
						if($_GET["code"] == $k)
							unset($_SESSION["cart_item"][$k]);				
						if(empty($_SESSION["cart_item"]))
							unset($_SESSION["cart_item"]);
				}
			}
		break;
		case "empty":
			unset($_SESSION["cart_item"]);
		break;	
		case "edit":
			$total_price = 0;
			foreach ($_SESSION['cart_item'] as $k => $v) {
			  if($_POST["code"] == $k) {
				  if($_POST["quantity"] == '0') {
					  unset($_SESSION["cart_item"][$k]);
				  } else {
					$_SESSION['cart_item'][$k]["quantity"] = $_POST["quantity"];
				  }
			  }
			  $total_price += $_SESSION['cart_item'][$k]["price"] * $_SESSION['cart_item'][$k]["quantity"];	
				  
			}
			if($total_price!=0 && is_numeric($total_price)) {
				print "$" . number_format($total_price,2);
				exit;
			}
		break;	
	}
}
?>
<html>
<head>
<title>Simple PHP Shopping Cart</title>
<link href="style.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
</head>
<body style="background:#d1d1d1;font-family:comic sans Ms,sarif;">
<nav class="navbar navbar-default navbar-fixed-top" style="background:#000;">
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
        <li class="font"><a href="../index2.php">HOME</a></li>
        <li class="font"><a href="#shop">SHOP</a></li>
        <li class="font"><a href="#contact">CONTACT</a></li>
        <li class="font"><a href=""class="glyphicon glyphicon-shopping-cart"></a></li> 
      </ul>
    </div>
  </div>
</nav><br><br><br><br>
<div class="txt-heading" style="height:40px;"><span style="margin-left:100px;"><a href="../index2.php" style="color:#33B6CB;text-decoration:none;">Home/</a> Product/<a href="mens.php" style="color:#33B6CB;text-decoration:none;">Men/</a> AddToCart</span></div>

 <div class="container-fluid" style="max-width:95%;">
  <div class="row">
    <div class="col-sm-2">
    </div>
    <div class="col-sm-9" style="background-color:#e3e3e3">
      <div id="shopping-cart" >
<form name="frmCartEdit" id="frmCartEdit">
<?php
$total_price = 0.00;
if(isset($_SESSION["cart_item"])){
?>	
<?php foreach ($_SESSION["cart_item"] as $item) { 
		$product_info = $db_handle->runQuery("SELECT * FROM productmen WHERE code = '" . $item["code"] . "'");
		$total_price += $item["price"] * $item["quantity"];	
?>
	<div style="background:#fff;" class="product-item" onMouseOver="document.getElementById('remove<?php echo $item["code"]; ?>').style.display='block';"  onMouseOut="document.getElementById('remove<?php echo $item["code"]; ?>').style.display='';" >
		<div class="product-image"><img src="<?php echo $product_info[0]["image"]; ?>"></div>
		<div><strong><?php echo $item["name"]; ?></strong></div>
		<div class="product-price"><?php echo $item["price"]."Birr"; ?></div>
		<div>Quantity: <input type="text" name="quantity" id="<?php echo $item["code"]; ?>" value="<?php echo $item["quantity"]; ?>" size="2" onBlur="saveCart(this);" /></div>
		<div class="btnRemoveAction" id="remove<?php echo $item["code"]; ?>"><a href="shopping_cart.php?action=remove&code=<?php echo $item["code"]; ?>" title="Remove from Cart">x</a></div>
	</div>
<?php
	}
}
?>
</form>
<span class="label label-danger" style="margin-left:300px;font-size:20px;">Your Total Price Is: <span id="total_price"><?php echo  number_format($total_price,2). "Birr "; ?></span></span>
<div class="cart_footer_link" style="margin-top:30px;margin-left:200px;">
<a href="shopping_cart.php?action=empty" class="btn btn-danger" style="border-radius:360px;width:150px;">Clear Cart</a>
<a href="mens.php" title="Cart" class="btn btn-primary" style="border-radius:360px;width:180px;">Continue Shopping</a>
<a href="#" class="btn btn-primary" style="border-radius:360px;width:180px;">Go To Puyment</a>
</div> 
</div>
    </div>
  </div>
</div>

<script src="../bootstrap/js/jquery.min.js"></script>
<script>
function saveCart(obj) {
	var quantity = $(obj).val();
	var code = $(obj).attr("id");
	$.ajax({
		url: "?action=edit",
		type: "POST",
		data: 'code='+code+'&quantity='+quantity,
		success: function(data, status){$("#total_price").html(data)},
		error: function () {alert("Problen in sending reply!")}
	});
}
</script>
</body>
</html>