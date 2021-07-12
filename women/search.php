<?php
	require_once 'searchdb.php';
	
	if(ISSET($_POST['search'])){
		$search = $_POST['search'];
		$query = $conn->query("SELECT * FROM `productmen` WHERE (`price` LIKE '%".$search."%') OR (`address` LIKE '%".$search."%') ORDER BY `price` ASC");
		$rows = $query->num_rows;
		
		if($rows > 0){
			while($fetch = $query->fetch_array()){
				echo "
					<tr>
						<td>".$fetch['name']."</td>
						<td>".$fetch['price']."</td>
						<td>".$fetch['madin']."</td>
						<td>".$fetch['image']."</td>
						<td>".$fetch['age']."</td>
					</tr>
				";
			}
		}else{
			echo "
				<tr>
					<td colspan='5'><center>No Search Found!</center></td>
				</tr>
			";
		}
	}
?> 