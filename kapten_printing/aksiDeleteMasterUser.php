<?php
include("config/conn.php");
$id = $_GET['id'];
mysqli_query($conn,"DELETE FROM login WHERE id_user='$id'")or die(mysqli_error());
header("location:master_kelola_user.php");             
?>
