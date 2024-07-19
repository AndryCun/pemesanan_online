<?php
include("config/conn.php");
if (isset($_POST['submit'])) {
	$id =@$_POST['id'];
	$produk =$_POST['produk'];
	$deskripsi =$_POST['deskripsi'];
	$date=date('Ymd');
	$create_time=date('Y-m-d h:m:s');
	$username =$_SESSION['username'];
	if (@$_FILES['file1']['name']!="") {
		$ekstensi_diperbolehkan	= array('jpg','png','jpeg');
		$nama_file1 = $_FILES['file1']['name'];
		$x = explode('.', $nama_file1);
		$ekstensi = strtolower(end($x));
		$ukuran_file	= $_FILES['file1']['size'];
		$file_tmp = $_FILES['file1']['tmp_name'];	
		$nama_file1=$produk.'_'.$date.'_'.$nama_file1;
		move_uploaded_file($file_tmp, 'images/'.$nama_file1);
		if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
			if($ukuran_file < 1044070){	
				// continue;
			}else{
				?><script type="text/javascript">alert("UKURAN FILE TERLALU BESAR");
				</script>
				<script type="text/javascript">window.location = "master_produk.php"</script>
				<?php 
			}
		}else{
			?><script type="text/javascript">alert("EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN");
			</script>
			<script type="text/javascript">window.location = "master_produk.php?"</script>
			<?php 
		}	
	}
	if ($id==null) {
		$input=mysqli_query($conn,"INSERT INTO produk VALUES (NULL,'$produk','$nama_file1','$deskripsi','$create_time','$username',NULL,NULL)");
		if($input){
			?>
			<script type="text/javascript">alert("SUCCESS : Berhasil Tersimpan !!!");</script>
			<script type="text/javascript">window.location = "master_produk.php"</script>
			<?php 
		}else{	
			?>
			<script type="text/javascript">alert("FAILED : Tidak Berhasil Tersimpan !!!");</script>
			<script type="text/javascript">window.location = "master_produk.php"</script>
			<?php 
		}
	}else{
		if ($_FILES['file1']['name']!="") {
			$input=mysqli_query($conn,"UPDATE produk SET `produk`='$produk',`description`='$deskripsi' where id='$id'");
		}else{
			$input=mysqli_query($conn,"UPDATE produk SET `produk`='$produk',`gambar`=$nama_file1,`description`='$deskripsi' where id='$id'");
		}
		if($input){
			?>
			<script type="text/javascript">alert("SUCCESS : Berhasil Terupdate !!!");</script>
			<script type="text/javascript">window.location = "master_produk.php"</script>
			<?php 
		}else{	
			?>
			<script type="text/javascript">alert("FAILED : Tidak Berhasil Terupdate !!!");</script>
			<script type="text/javascript">window.location = "master_produk.php"</script>
			<?php 
		}
	}
}else{ 
	?>
	<script type="text/javascript">alert("FAILED : SILAHKAN CEK KEMBALI !!!");</script>
	<script type="text/javascript">window.location = "master_produk.php"</script>
	<?php 
}
?>
