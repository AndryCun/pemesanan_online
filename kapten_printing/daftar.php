<?php 
include("config/conn.php");
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Kapten Printing</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/bootstrap.min.css" >
  <link rel="stylesheet" href="css/AdminLTE.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body>
  <?php if (isset($_SESSION['password'])) : ?>
    <script type="text/javascript">
    alert('password anda salah');</script> 
      <?php unset($_SESSION['password']) ?>
  <?php endif ?>
      <div class="container">    
          <div id="signupbox" style="margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">Sign Up</div>
                            <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="login.php">Sign In</a></div>
                        </div>  
                        <div class="panel-body" >
                            <form action="" method="post" id="signupform" class="form-horizontal" >
                                
                                <div id="signupalert" style="display:none" class="alert alert-danger">
                                    <p>Error:</p>
                                    <span></span>
                                </div>
                                  
                                <div class="form-group">
                                    <label for="email" class="col-md-3 control-label">Email</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="email" placeholder="Email Address" required>
                                    </div>
                                </div>
                                    
                                <div class="form-group">
                                    <label for="name" class="col-md-3 control-label">Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="name" placeholder="Name" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="username" class="col-md-3 control-label">Username</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="username" placeholder="Username" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Password</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <!-- Button -->                                        
                                    <div class="col-md-offset-3 col-md-9">
                                        <button id="btn-signup" type="submit" class="btn btn-info" name="signup" value="signup" ><i class="icon-hand-right"></i> &nbsp Sign Up</button>
                                    </div>
                                </div>
                            </form>
                         </div>
                    </div>
         </div> 
      <script src="https://code.jquery.com/jquery-3.3.1.js"></script>  
      <script src="js/bootstrap.js"></script>  
  </body>
  </html>

<?php 
  $email=@$_POST['email'];
  $name=@$_POST['name'];
  $username=@$_POST['username'];
  $password=@$_POST['password'];
  $signup=@$_POST['signup'];
  if ($signup) {
    $sql = mysqli_query($conn,"select * from login where email = '$email' or username ='$username'") or die (mysqli_error());   
    $data=mysqli_fetch_array($sql);
    if (is_null($data)) {
      $input=mysqli_query($conn,"INSERT INTO login VALUES (NULL,'$email','$username','$password','2','$name',NULL)");
        if($input){
          ?><script type="text/javascript">alert("SUCCESS : data berhasil di simpan");
        </script>
        <script type="text/javascript">window.location = "login.php"</script>
        <?php 
        }else{
          echo 'Gagal mengubah data2! '; 
        }
    } else {
      echo 'Gagal mengubah data! '; 
    }
    
   
  }
 
?>


