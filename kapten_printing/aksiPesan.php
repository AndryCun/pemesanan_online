<?php
include("config/conn.php");
if (isset($_POST['pesan'])) {
	$id =@$_POST['id'];
	$total =$_POST['total'];
	$ongkir =$_POST['ongkir'];
	$grandtotal =$_POST['grandtotal'];
	$jenis = explode(".",$_POST['jenis']);
	$jenis_final=(int)$jenis[1];
	$type_cetak =$_POST['type_cetak'];
	$produk =$_POST['produk'];
	$jumlah =$_POST['jumlah'];
	$pengambilan_barang =$_POST['pengambilan_barang'];
	$alamat_pengiriman =(isset($_POST['alamat_pengiriman'])) ? $_POST['alamat_pengiriman'] : "" ; 
	$pembayaran =$_POST['pembayaran'];
	$catatan =$_POST['catatan'];
	$create_time=date('Y-m-d H:i:s');
	$date=date('Ymd_His');
	$id_user ='1';
	$id_user =$_SESSION['id_user'];
	$username =$_SESSION['username'];
	if ($_FILES['file1']['name']!="") {
		$ekstensi_diperbolehkan	= array('jpg','png','jpeg');
		$nama_file1 = $_FILES['file1']['name'];
		$x = explode('.', $nama_file1);
		$ekstensi = strtolower(end($x));
		$ukuran_file	= $_FILES['file1']['size'];
		$file_tmp = $_FILES['file1']['tmp_name'];	
		$nama_file1=$id_user.'_'.$date.'_'.$nama_file1;
		move_uploaded_file($file_tmp, 'file/'.$nama_file1);
		if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
			if($ukuran_file < 1044070){	
				// continue;
			}else{
				?><script type="text/javascript">alert("UKURAN FILE TERLALU BESAR");
				</script>
				<script type="text/javascript">window.location = "preview.php"</script>
				<?php 
			}
		}else{
			?><script type="text/javascript">alert("EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN");
			</script>
			<script type="text/javascript">window.location = "preview.php?"</script>
			<?php 
		}	
	}
	if (@$_FILES['file2']['name']!="") {
		$ekstensi_diperbolehkan	= array('jpg','png','jpeg');
		$nama_file2 = $_FILES['file2']['name'];
		$x = explode('.', $nama_file2);
		$ekstensi = strtolower(end($x));
		$ukuran_file	= $_FILES['file2']['size'];
		$file_tmp = $_FILES['file2']['tmp_name'];	
		$nama_file2=$id_user.'_'.$date.'_'.$nama_file2;
		move_uploaded_file($file_tmp, 'file/'.$nama_file2);
		if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
			if($ukuran_file < 1044070){	
				// continue;
			}else{
				?><script type="text/javascript">alert("UKURAN FILE TERLALU BESAR");
				</script>
				<script type="text/javascript">window.location = "preview.php"</script>
				<?php 
			}
		}else{
			?><script type="text/javascript">alert("EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN");
			</script>
			<script type="text/javascript">window.location = "preview.php"</script>
			<?php 
		}	
	}
	@$nama_file2 = ($nama_file2=="") ? "" : $nama_file2 ;
	$create_time2=date('Y-m-d H:i:s', strtotime("+1 day", strtotime($create_time)));
	if ($id==null) {
		if ($pembayaran=="Bayar Di Tempat") {
			$input=mysqli_query($conn,"INSERT INTO master_pemesanan VALUES (NULL,$id_user,'$nama_file1','$nama_file2','$pengambilan_barang','$alamat_pengiriman',$total,$type_cetak,$produk,$jenis_final,$jumlah,'$pembayaran','$catatan','$ongkir','$grandtotal','1','9','','','$create_time','$username')");
		}else{
			$input=mysqli_query($conn,"INSERT INTO master_pemesanan VALUES (NULL,$id_user,'$nama_file1','$nama_file2','$pengambilan_barang','$alamat_pengiriman',$total,$type_cetak,$produk,$jenis_final,$jumlah,'$pembayaran','$catatan','$ongkir','$grandtotal','9','9','','','$create_time','$username')");
		}
		$last_id = mysqli_insert_id($conn);
		$notif1=mysqli_query($conn,"INSERT INTO notification VALUES (NULL,$last_id,'9','1','$create_time')");
		$notif2=mysqli_query($conn,"INSERT INTO notification VALUES (NULL,$last_id,'9','2','$create_time')");
		if($input){
			?>
			<script type="text/javascript">alert("SUCCESS : Pesanan Berhasil !!!");</script>
			<script type="text/javascript">window.location = "result.php?id=<?php echo $last_id ?>&pembayaran=<?php echo $pembayaran?>&waktu=<?php echo (strtotime($create_time2)*1000)?>"</script>
			<?php 
		}else{	
			?>
			<script type="text/javascript">alert("FAILED : Pesanan Tidak Berhasil !!!");</script>
			<script type="text/javascript">window.location = "preview.php?id=<?php echo $produk ?>"</script>
			<?php 
		}
	}
}else{ 
	?>
	<script type="text/javascript">alert("FAILED : SILAHKAN CEK KEMBALI !!!");</script>
	<script type="text/javascript">window.location = "preview.php?id=<?php echo $produk ?>"</script>
	<?php 
}
?>