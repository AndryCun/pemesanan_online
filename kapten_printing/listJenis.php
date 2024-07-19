<?php

include("config/conn.php");
session_start();

if (isset($_GET['jenis'])) {
    // echo $_GET['list'];
    $query = "SELECT * from bahan where id='$_GET[jenis]' ";
    $result = mysqli_fetch_assoc(mysqli_query($conn,$query));
    $harga = $result['harga'] ;
    echo $harga;
}


 ?>