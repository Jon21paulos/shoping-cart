<?php 


define('INCLUDE_CHECK',true);

require "db/conn.php";

if (isset($_POST['register'])) {

  $connection=new Database;

  $saved=$connection->InsertData($_POST['firstname'],$_POST['lastname'],$_POST['username'],$_POST['email'],$_POST['password'],$_POST['profile']);
  if ($saved) {
    header('location:signup.php?status=error&msg= succsoss full registerd');
  }
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>mekelleshope-Registration-Form</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">

  <script src="bootstrap/js/jquery.min.js"></script>
</head>
<body>
<div class="container-fluid" >
  <div class="text-center">
  </div>
  <div class="row" style="max-height: 700px;">
    <div class="col-sm-5" style="float:left;margin-top:0px; margin-left: 100px;">
      <div class="panel panel-default text-center">
        <div class="panel-heading">
          <a href="../index.php"><h3 style="color: #fff;">Mekelleshop.com</h3></a>
          <h4>Registration Form</h4>
        </div>
        <div class="panel-body">
        <form method="post" action="" name="myForm" onsubmit="return validateForm()">
          <?php 

                        if (isset($_GET['status'])) {
                            $id=$_GET['status'];
                            $msg=$_GET['msg'];
                            ?>
                            <div id="$id" class="alert alert-danger">
                                <strong></strong><h4 style=";"> &nbsp; <?php echo $msg; ?>! <a href="index.php" style="color: ;">click here</a></h4>
                            </div>
                            <?php
                        }

                        ?>
      
        <div class="form-group">
           <label for="usr" class="text">First Name:-</label>
           <input type="text" class="form-control" placeholder="first Name" id="usr" name="firstname" required="" />

            </div><br><br><br>
             <div class="form-group">
           <label for="usr" class="text">Last Name:-</label>
          <input type="text" class="form-control" placeholder="Last Name" id="usr" name="lastname" required="" />
            </div><br><br>
             <div class="form-group">
           <label for="usr" class="text">User Name:-</label>
            <input type="text" class="form-control" id="usr"  placeholder="user name" name="username" required=""> 
            </div><br><br>
          <div class="form-group">
           <label for="E-mail" class="text">E-mail:-</label>
             <input type="email" class="form-control" id="usr"  placeholder="E-mail" name="email" required="">
              </div><br><br>
          <div class="form-group">
             <label for="pass" class="text">Password:-</label>
             <input  type="password" class="form-control" id="usr" minlength="6" placeholder="password" name="password" required="">
               </div><br><br>
               <div class="form-group" style="display: none;">
             <label for="pass" class="text">profilepic:-</label>
             <input  type="text" value="default.jpg" class="form-control" id="usr" name="profile" required="">
               </div><br><br>
               
               
       <label><input type="checkbox" value="" checked >By Clicking Register You Are Agree To All <a href="terms.text" style="text-decoration: underline;">Terms & Cocies</a></label><br><br>

               <div class="form-group">
                  <input type="submit" value="Register" class="btn btn-danger" id="usr" name="register" style="width: 100%; height: 50px; border-radius:360px; background:#000;border: none; ">
                </div>
                <label><a href="index.php" style="color: red; text-decoration: underline;">alredy have an account Login</a></label>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>