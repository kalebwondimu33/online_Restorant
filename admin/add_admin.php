<?php include("partial/header.php");?>
<?php include("config/config.php");?>
<?php 
$error_array=array();
 if (isset($_POST['submit'])){
  $username=$_POST['username'];
  $password=$_POST['password'];
  
  $username=strip_tags($_POST['username']);//remove tags
  $username=str_replace(' ','',$username);//remove space
  $username=ucfirst(strtolower($username));
  $username_check=mysqli_query($con,"SELECT username FROM admin WHERE username='$username' ");
  $num_rows=mysqli_num_rows($username_check);
    if ($num_rows>0){
      array_push($error_array,"<span style='font-size:100px;'> username already in use </span><br>");
    }
    if(empty($error_array)){
      $password=md5($password);//encript the password before sending to the database
    //profile picture assignment
    $query=mysqli_query($con,"INSERT INTO admin VALUES('','$username','$password')");
    array_push($error_array,"<span style='color:#14c800;'>Registered successfully! Go head and login!</span><br>");
  }
}



?>





<section class="section-admin_add">
   
      
      <h1 class="heading-admin">Add Admin</h1>
      
      <div class="continer">
      <form class="cta-form" action="add_admin.php" method="POST">
                <div class="form">
                  <label for="full-name">Username:</label>
                  <input
                    id="full-name"
                    type="text"
                    name="username"
                    required
                  />
                </div>
                <?php  if (in_array("<span style='font-size:100px;'> username already in use </span><br>",$error_array))echo "username already in use <br>"; ?>
                <div class="form">
                  <label for="pass">Password:</label>
                  <input
                    id="pass"
                    type="password"
                    name="password"
                    required
                  />
                </div>
                <button name="submit" class="btn btn--form">Add Admin</button>
                <?php
            if (in_array("<span c style='color:#14c800;'>Registered successfully! Go head and login!</span><br>",$error_array))echo "<span style='color:#14c800;'>Registered successfully! Go head and login!</span><br>";
            ?>
              </form>
             
     </div>
  
      
</section>
