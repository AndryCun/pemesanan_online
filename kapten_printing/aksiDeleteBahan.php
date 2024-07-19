<?php
include("config/conn.php");
$id = $_GET['id'];
mysqli_query($conn,"DELETE FROM bahan WHERE id='$id'")or die(mysqli_error());
header("location:master_bahan.php");             
?>
