<?php require('../db/session.php');?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
	</head>
<body>
<style type="text/css">
	body{
		font-family: comic sans ms,sarif;
		background-color: #e3e3e3;
	}
	
</style>
	<div class="col-md-3"></div>
	<div class="col-md-6 well" style="margin-top:80px;background-color:#ffffff;border:360px;">
		<h3 class="text-primary" style="text-align:center;">MekelleShop.com-Upload-Product-Form</h3><br>
		<hr style="border-top:1px dotted #ccc;"/>
		<div class="col-md-2"></div>
		<div>
			<?php require ('../db/config.php'); ?>
  <?php
              $result= mysqli_query($conn,"select * from member where  mem_id = $id_session") or die (mysqli_error());
              while ($row= mysqli_fetch_array ($result) ){
              ?>
              
			<form role="form" method="POST" action="upload.php" enctype="multipart/form-data" ><br>
				<label>E-mail:</label>
				<input type="text"  class="form-control" name="username" style="width:50%;" value="<?php echo $row['email'] ?>" disabled />
<?php } ?>
				<label>Product Type:</label>
				<input type="text"  class="form-control" name="name" style="width:50%;" required="" placeholder="eg:- shoose,cloth," /><br>
				<label>Type:</label>
				<input type="text"  class="form-control" name="code" style="width:50%;" required="" placeholder="eg:- shara,timber,tishirt" /><br>
				<label>Price:</label>
				<input type="text" class="form-control" name="price" style="width:50%;" required="" placeholder="eg:-200.00,200.60"><br>
				<label>MadeIN:</label>
				<input type="text" class="form-control" name="madein" style="width:50%;" required="" placeholder="eg:-ethiopia,china,usa"><br>
				<div style="float:right;margin-top:-210px; ">
					<div id = "preview" style = "width:200px; height :200px; border:1px solid #000;">
						<center id = "lbl">[Photo]</center>
					</div>
					<input type = "file" accept="image/*" id = "photo" name = "photo" required="" />
				</div>	
				<div style="clear:both;"></div>
				<br/>
				<center><button style="width:100%;height:50px;" class="btn btn-primary" name="submit"><span class="glyphicon glyphicon-save"></span> Upload</button></center>
			</form>


		</div>
		<br />
	</div>
</body>
<script src="../bootstrap/js/jquery.min.js"></script>
<script type = "text/javascript">
	$(document).ready(function(){
		$pic = $('<img id = "image" width = "100%" height = "100%"/>');
		$lbl = $('<center id = "lbl">[Photo]</center>');
		$("#photo").change(function(){
			$("#lbl").remove();
			var files = !!this.files ? this.files : [];
			if(!files.length || !window.FileReader){
				$("#image").remove();
				$lbl.appendTo("#preview");
			}
			if(/^image/.test(files[0].type)){
				var reader = new FileReader();
				reader.readAsDataURL(files[0]);
				reader.onloadend = function(){
					$pic.appendTo("#preview");
					$("#image").attr("src", this.result);
				}
			}
		});
	});
</script>
</html>