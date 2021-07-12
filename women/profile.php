<?php
include('header.php');

$ID=$_GET['mem_id'];
?>
 <div class="container-fluid" style="width:90%;">
  <div class="row">
    <div class="col-sm-3" style="background-color:#e3e3e3;color:#428bca;">
      <form method="post" action="../uploadp.php" enctype="multipart/form-data">
        <p>Upload Profile</p>
      <div style="">
          <div id = "preview" style = "width:200px; height :200px; border:1px solid #000;">
            <center id = "lbl">[Photo]</center>
          </div>
          <input type = "file" accept="image/*" id = "photo" name = "photo" required="" />
        </div>  
        <div style="clear:both;"></div>
        <br/>
        <center><button style="width:100%;height:50px;border-radius: 5px;" class="btn btn-primary" name="submit"> Upload</button></center>
      </form>
    </div>
    <div class="col-sm-7" style="background-color:#e3e3e3;margin-left: 10px;">
      <div id="product-grid">
        <?php
  $query=mysqli_query($conn,"select * from member where mem_id='$ID'")or die(mysqli_error());
$row=mysqli_fetch_array($query);
  ?>          
 
              <form method="post" action="" style="max-width: 50%;margin-left: 30%" >
                <label style="margin-left:10px;color:#000;" >Update Information</label><br>
                 <span style="color: #428bca;text-align: center;margin-left:30px;">UserName:-
                <input type="text" name="username" value="<?php echo $row['username'];?>" style="border-radius: 360px;" class="form-control">
              </span>
              <span style="color: #428bca;text-align: center;margin-left:30px;">FirstName:-
                <input type="text" name="firstname" value="<?php echo $row['firstname'];?>" style="border-radius: 360px;" class="form-control">
              </span>
              
              <span style="margin-left: 30px;color: #428bca;">Last-Name:-
                <input type="text" name="lastname" value="<?php echo $row['lastname'];?>" style="max-width:;border-radius: 360px;" class="form-control"></span>
                <span style="color: #428bca;text-align: center;margin-left:30px;">E-mail:-
                <input type="text" name="email" value="<?php echo $row['email']; ?>" style="border-radius: 360px;" class="form-control">
              </span>
               
            <span style="margin-left:30px;color: #428bca;">Password:-<input class="form-control" style="max-width:;border-radius: 360px;" type="password" name="password" value="<?php echo $row['password']; ?>"></span><br>
            <span><input style="width: 100%;border-radius: 5px;" type="submit" name="update" class="btn btn-primary" value="update"></span>

          </form><br>
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
echo "<script>alert('Successfully Updated User Info!'); window.location='../index2.php'</script>";
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