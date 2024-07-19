<?php
include("config/conn.php");
$id =$_GET['list'];
$create_time=date('Y-m-d H:i:s');
$input=mysqli_query($conn,"UPDATE master_pemesanan set flag_lunas=2 where id='$id'");
$notif1=mysqli_query($conn,"INSERT INTO notification VALUES (NULL,$id,'2','1','$create_time')");
?>

<script type="text/javascript">window.location = "detailPage.php?list=<?php echo $id ?>"</script>