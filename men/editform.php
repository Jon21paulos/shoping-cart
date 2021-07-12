<?php
require('../db/config.php');
?>
 <?php
$id =$_GET['mem_id'];
if (isset($_POST['update'])) {

            $firstname=$_POST['firstname'];
            $email=$_POST['email'];
            $lastname=$_POST['lastname'];
            $username=$_POST['username'];
            $password=$_POST['password'];

$history_record=mysqli_query($conn,"select * from member where mem_id=$id_session");
$row=mysqli_fetch_array($history_record);
$user=$row['firstname']." ".$row['lastname'];
mysqli_query($conn,"INSERT INTO history (date,action,data) VALUES (NOW(),'Edit User Details','$user')")or die(mysqli_error());

{
mysqli_query($conn," UPDATE member SET firstname='$firstname', lastname='$lastname', username='$username', 
password='$password' WHERE mem_id = '$id' ")or die(mysqli_error());
echo "<script>alert('Successfully Updated User Info!'); window.location='profile.php'</script>";
}

}

?>