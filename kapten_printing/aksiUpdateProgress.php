<?php
include("config/conn.php");
$id =$_GET['list'];
$progress =$_GET['progress'];
$create_time=date('Y-m-d H:i:s');
$input=mysqli_query($conn,"UPDATE master_pemesanan set progress=$progress where id='$id'");
$notif1=mysqli_query($conn,"INSERT INTO notification VALUES (NULL,$id,'$progress','2','$create_time')");
?>

<script type="text/javascript">window.location = "detailPage.php?list=<?php echo $id ?>"</script>