<?php
date_default_timezone_set('Asia/Jakarta');
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn=mysqli_connect("localhost","root","","kaprin") or die (mysqli_error());
session_start();

mysqli_query($conn,"UPDATE master_pemesanan set progress=6,flag_lunas=3 where id in (select id from master_pemesanan a left join bukti_bayar b on a.id=b.id_pesanan where timestampdiff(hour, created_time , now() )>=24 and b.id_pesanan is null)");
?>