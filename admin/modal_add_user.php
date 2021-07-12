<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-plus"></i> Add User</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!---<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>-->
        <h4 class="modal-title" id="myModalLabel">Add User</h4>
      </div>
      <div class="modal-body">

					<form method="post" enctype="multipart/form-data" class="form-horizontal" style="margin-left:100px;">
					  <div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">Firstname</label>
						<div class="col-sm-7">
						  <input type="text" name="firstname" class="form-control" id="inputEmail3" placeholder="Firstname....." required />
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">Middlename</label>
						<div class="col-sm-7">
						  <input type="text" name="middlename" class="form-control" id="inputEmail3" placeholder="MI / Middlename....." />
						</div>
						<span style="color:red;">optional</span>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">Lastname</label>
						<div class="col-sm-7">
						  <input type="text" name="lastname" class="form-control" id="inputPassword3" placeholder="Lastname....." required />
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">Username</label>
						<div class="col-sm-7">
						  <input type="text" name="username" class="form-control" id="inputPassword3" placeholder="Username....." required />
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label">Password</label>
						<div class="col-sm-7">
						  <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password....." required />
						</div>
					  </div>
					  <div class="form-group">
						<label for="inputPassword3" class="col-sm-3 control-label"></label>
						<div class="col-sm-7">
						  <button type="submit" name="submit" class="btn btn-primary"><i class="glyphicon glyphicon-save"></i> Submit</button>
						</div>
					  </div>
					</form>
					
						<?php 
						include('include/database.php');
						if (isset($_POST['submit'])){
							
						$firstname=$_POST['firstname'];
						$middlename=$_POST['middlename'];
						$lastname=$_POST['lastname'];
						$username=$_POST['username'];
						$password=$_POST['password'];
						
$history_record=mysqli_query($conn,"select * from user where user_id=$id_session");
$row=mysqli_fetch_array($history_record);
$user=$row['firstname']." ".$row['lastname'];
mysqli_query($conn,"INSERT INTO history (date,action,data) VALUES (NOW(),'Add User','$user')")or die(mysqli_error());
						
						{
						mysqli_query ("INSERT INTO user (firstname,middlename,lastname,username,password,user_added)
						 VALUES ('$firstname','$middlename','$lastname','$username','$password',NOW())")or die(mysqli_error());
						}
						echo "<script>alert('User successfully added!'); window.location='user.php'</script>";
						 
						}
						?>
	  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>