<?php
if(isset($_POST['submit']))
	{		
		$imgFile = $_FILES['user_image']['name'];
		$tmp_dir = $_FILES['user_image']['tmp_name'];
		$imgSize = $_FILES['user_image']['size'];
		if($imgFile)
		{
			$upload_dir = 'profile/';
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION));
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif');
			$userprofile = rand(1000,1000000).".".$imgExt;
			if(in_array($imgExt, $valid_extensions))
			{			
				if($imgSize < 5000000)
				{
					unlink($upload_dir.$edit_row['profile']);
					move_uploaded_file($tmp_dir,$upload_dir.$profile);
				}
				else
				{
					$errMSG = "Sorry, Your File Is Too Large To Upload. It Should Be Less Than 5MB.";
				}
			}
			else
			{
				$errMSG = "Sorry, only JPG, JPEG, PNG & GIF Extension Files Are Allowed.";		
			}	
		}
		else
		{
			$profile = $edit_row['profile'];
		}
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('UPDATE member SET profile=:upic WHERE memid=:uid');
			$stmt->bindParam(':upic',$userprofile);
			$stmt->bindParam(':uid',$id);
				
			if($stmt->execute()){
				?>
                <script>
				alert('Successfully Updated...');
				window.location.href='profile.php';
				</script>
                <?php
			}
			else{
				$errMSG = "Sorry User Could Not Be Updated!";
			}
		}			
	}
	?>