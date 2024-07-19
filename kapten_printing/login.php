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
  <link rel="shortcut icon" href="images/kapten.png">
</head>
<body>
  <?php if (isset($_SESSION['password'])) : ?>
    <script type="text/javascript">
    alert('password anda salah');</script> 
      <?php unset($_SESSION['password']) ?>
  <?php endif ?>
      <div class="container">
            
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Sign In</div>
                    </div>     
                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        <form action="" method="post" class="form-horizontal">
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="username">                                        
                                    </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
                                    </div>
                            <div class="input-group">
                                <div style="margin-top:10px" class="form-group">
                                    <div class="col-sm-12 controls">
                                      <button type="submit" name="login" value="login" class="btn btn-primary btn-block btn-flat">Login</button>
                                    </div>
                                </div>  
                             </div> 
                             <div class="form-group">
                                    <div class="col-md-12 control">
                                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                            Don't have an account! 
                                        <a href="daftar.php">
                                            Sign Up Here
                                        </a>
                                        </div>
                                    </div>
                                </div>  
                        </form>     
                      </div>                     
                </div>  
          </div>
      </div>
      <script src="https://code.jquery.com/jquery-3.3.1.js"></script>  
      <script src="js/bootstrap.js"></script>  
  </body>
  </html>
<?php 
  $username=@$_POST['username'];
  $password=@$_POST['password'];
  $login=@$_POST['login'];
    if($login){
          if($username==""||$password==""){
          ?> <script type="text/javascript">alert("username/password tidak boleh kosong");</script> <?php 
    } else {
    $sql = mysqli_query($conn,"select * from login where username = '$username' and password = '$password'") or die (mysqli_error());   
    $data=mysqli_fetch_array($sql);
    $date=date('y-m-d');
      if(@$data['status']=="1" || @$data['status']=="3"){
        
        @$_SESSION['updateLogin']=$data['updateLogin'];
          $input=mysqli_query($conn,"UPDATE login set updateLogin='$date' where id_user='$data[id_user]'");
        @$_SESSION['status']=$data['status'];
        @$_SESSION['username']=$data['username'];
        @$_SESSION['cabang']=$data['cabang'];
        @$_SESSION['nama']=$data['nama'];
        @$_SESSION['id_user']=$data['id_user'];
        header("location:dashboard.php");
      }elseif(@$data['status']=="2")  {
        @$_SESSION['updateLogin']=$data['updateLogin'];
          $input=mysqli_query($conn,"UPDATE login set updateLogin='$date' where id_user='$data[id_user]'");
        @$_SESSION['status']=$data['status'];
        @$_SESSION['username']=$data['username'];
        @$_SESSION['cabang']=$data['cabang'];
        @$_SESSION['nama']=$data['nama'];
        @$_SESSION['id_user']=$data['id_user'];
        header("location:index.php");
      }else{
        echo "<script>alert('username/password salah!')</script>" ;
        // header("location:login.php");
      }
  }
}
?>




