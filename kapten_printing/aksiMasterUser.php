<?php
include("config/conn.php");
if (isset($_POST['submit'])) {
	$id =@$_POST['id'];
	$email =$_POST['email'];
	$nama =$_POST['nama'];
	$username =$_POST['username'];
	$password =$_POST['password'];
	$role =$_POST['role'];
	$create_time=date('Y-m-d h:m:s');
	if ($id==null) {
		$input=mysqli_query($conn,"INSERT INTO login VALUES (NULL,'$email','$username','$password','$role','$nama',NULL)");
		if($input){
			?>
			<script type="text/javascript">alert("SUCCESS : Berhasil Tersimpan !!!");</script>
			<script type="text/javascript">window.location = "master_kelola_user.php"</script>
			<?php 
		}else{	
			?>
			<script type="text/javascript">alert("FAILED : Tidak Berhasil Tersimpan !!!");</script>
			<script type="text/javascript">window.location = "master_kelola_user.php"</script>
			<?php 
		}
	}else{
		$input=mysqli_query($conn,"UPDATE login SET `email`='$email',`username`='$username',`password`='$password',`status`='$role',`nama`='$nama' where id_user='$id'");
		if($input){
			?>
			<script type="text/javascript">alert("SUCCESS : Berhasil Terupdate !!!");</script>
			<script type="text/javascript">window.location = "master_kelola_user.php"</script>
			<?php 
		}else{	
			?>
			<script type="text/javascript">alert("FAILED : Tidak Berhasil Terupdate !!!");</script>
			<script type="text/javascript">window.location = "master_kelola_user.php"</script>
			<?php 
		}
	}
}else{ 
	?>
	<script type="text/javascript">alert("FAILED : SILAHKAN CEK KEMBALI !!!");</script>
	<script type="text/javascript">window.location = "master_kelola_user.php"</script>
	<?php 
}
?>