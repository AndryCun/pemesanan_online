<?php
include("config/conn.php");
if (isset($_POST['submit'])) {
	$id =@$_POST['id'];
	$bahan =$_POST['bahan'];
	$harga =$_POST['harga'];
	$type_cetak =$_POST['type_cetak'];
	$create_time=date('Y-m-d h:m:s');
	$username =$_SESSION['username'];
	if ($id==null) {
		$input=mysqli_query($conn,"INSERT INTO bahan VALUES (NULL,'$bahan',$harga,'$type_cetak','$create_time','$username',NULL,NULL)");
		if($input){
			?>
			<script type="text/javascript">alert("SUCCESS : Berhasil Tersimpan !!!");</script>
			<script type="text/javascript">window.location = "master_bahan.php"</script>
			<?php 
		}else{	
			?>
			<script type="text/javascript">alert("FAILED : Tidak Berhasil Tersimpan !!!");</script>
			<script type="text/javascript">window.location = "master_bahan.php"</script>
			<?php 
		}
	}else{
		$input=mysqli_query($conn,"UPDATE bahan SET `bahan`='$bahan',`harga`=$harga,`type_cetak`='$type_cetak' where id='$id'");
		if($input){
			?>
			<script type="text/javascript">alert("SUCCESS : Berhasil Terupdate !!!");</script>
			<script type="text/javascript">window.location = "master_bahan.php"</script>
			<?php 
		}else{	
			?>
			<script type="text/javascript">alert("FAILED : Tidak Berhasil Terupdate !!!");</script>
			<script type="text/javascript">window.location = "master_bahan.php"</script>
			<?php 
		}
	}
}else{ 
	?>
	<script type="text/javascript">alert("FAILED : SILAHKAN CEK KEMBALI !!!");</script>
	<script type="text/javascript">window.location = "master_bahan.php"</script>
	<?php 
}
?>
