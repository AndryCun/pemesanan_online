<?php include"struktur/header.php"; ?>
    <div class="container my-5">
        <div class="card details-card p-0">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                <?php if ($_GET['pembayaran']=="QRIS") { ?>
                    <h2>Pembayaran menggunakan QRIS</h2>
                    <img class="img-fluid details-img" src="images/qris.jpg" alt="">
                    Pembayaran Expired Pada : 
                    <p id="demo"></p>
                    <p>Bukti Transfer harap dikirimkan : </p>
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" value="<?php echo $_GET['id'] ?>" name="id" id="id">
                        <input type="file" class="form-control" id="buktiBayar" name="buktiBayar" class="form-control" >
                        <button type="submit" class="btn btn-primary" name="kirim" value="kirim">kirim</button>
                    </form><br>
                    <a href="pesanan.php" class="btn btn-primary">lewatkan</a>
               <?php } elseif ($_GET['pembayaran']=="Transfer") { ?>
                    <h2>Pembayaran menggunakan Transfer</h2>
                    <table>
                        <tr>
                            <th>
                            Ave Farra
                            </th>
                            <th>
                            </th>
                            <th>
                            </th>
                        </tr>
                        <tr>
                            <th>
                            BCA  
                            </th>
                            <th>
                            :
                            </th>
                            <th>
                            021-415-8465
                            </th>
                        </tr>
                        <tr>
                            <th>
                            BNI
                            </th>
                            <th>
                            :
                            </th>
                            <th>
                            -
                            </th>
                        </tr>
                        <tr>
                            <th>
                            Mandiri
                            </th>
                            <th>
                            :
                            </th>
                            <th>
                            -
                            </th>
                        </tr>
                    </table>
                    <p>Bukti Transfer harap dikirimkan : </p>
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" value="<?php echo $_GET['id'] ?>" name="id" id="id">
                        <input type="file" class="form-control" id="buktiBayar" name="buktiBayar" class="form-control" >
                        <button type="submit" class="btn btn-primary" name="kirim" value="kirim">kirim</button>
                    </form><br>
<p id="demo"></p>
                    <a href="pesanan.php" class="btn btn-primary">lewatkan</a>

                 <?php }else{ ?>
                 <h2>Bayar Di Tempat</h2>
                    <p>sksk</p><br>
                    <a href="pesanan.php" class="btn btn-primary">Selesai</a>

                 <?php } ?>
                </div>
            </div>
            </div>
            <!-- End row -->
        </div>
  
  <?php include"struktur/footer.php"; ?>

  <?php 	

if (isset($_POST['kirim'])) {
	$id =$_POST['id'];
	$create_time=date('Y-m-d h:i:s');
    if ($_FILES['buktiBayar']['name']!="") {
            $ekstensi_diperbolehkan	= array('jpg','png','jpeg');
            $buktiBayar = $_FILES['buktiBayar']['name'];
            $x = explode('.', $buktiBayar);
            $ekstensi = strtolower(end($x));
            $ukuran_file	= $_FILES['buktiBayar']['size'];
            $file_tmp = $_FILES['buktiBayar']['tmp_name'];	
            $buktiBayar=$id.'_'.$buktiBayar;
            move_uploaded_file($file_tmp, 'file/'.$buktiBayar);
            if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
                if($ukuran_file < 1044070){	
                    // continue;
                }else{
                    ?><script type="text/javascript">alert("UKURAN FILE TERLALU BESAR");
                    </script>
                    <script type="text/javascript">window.location = "pesanan.php"</script>
                    <?php 
                }
            }else{
                ?><script type="text/javascript">alert("EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN");
                </script>
                <script type="text/javascript">window.location = "pesanan.php"</script>
                <?php 
            }	
            $input=mysqli_query($conn,"INSERT INTO bukti_bayar VALUES ($id,'$buktiBayar')");
            $updateMasterPemesanan=mysqli_query($conn,"UPDATE master_pemesanan set flag_lunas=1 where id='$id'");
            $notif2=mysqli_query($conn,"INSERT INTO notification VALUES (NULL,$id,'1','1','$create_time')");
            if($input){
                ?>
                <script type="text/javascript">alert("SUCCESS : Bukti Berhasil Terupload !!!");</script>
                <script type="text/javascript">window.location = "pesanan.php"</script>
                <?php 
            }else{	
                ?>
                <script type="text/javascript">alert("FAILED : Bukti Tidak Berhasil Terupload !!!");</script>
                <script type="text/javascript">window.location = "pesanan.php"</script>
                <?php 
            }
        }
 } ?>

<script>
// Mengatur waktu akhir perhitungan mundur
var menit = <?php echo $_GET['waktu'] ?>;
// var countDownDate = new Date("Dec 5, 2029 15:37:25").getTime();
console.log(menit);
// Memperbarui hitungan mundur setiap 1 detik
var x = setInterval(function() {

  // Untuk mendapatkan tanggal dan waktu hari ini
  var now = new Date().getTime();
    
  // Temukan jarak antara sekarang dan tanggal hitung mundur
  var distance =  menit-now;
    
console.log(now);
console.log(distance);
  // Perhitungan waktu untuk hari, jam, menit dan detik
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
  // Keluarkan hasil dalam elemen dengan id = "demo"
  document.getElementById("demo").innerHTML =hours + "h "
  + minutes + "m " + seconds + "s ";
    
  // Jika hitungan mundur selesai, tulis beberapa teks 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "EXPIRED";
  }
}, 1000);
</script>