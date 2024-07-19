<?php include"struktur/header.php"; ?>
  <div class="container my-5">
        <div class="card details-card p-0">
            <div class="row">
            <?php 
                $id=$_GET['list'];
                $query = mysqli_query($conn,"SELECT 
                                        a.*,
                                        b.bahan as nama_bahan,
                                        b.harga as harga_bahan,
                                        c.produk as nama_produk,
                                        d.id as id_status,
                                        d.status as status_pembayaran,
                                        e.id as id_progress,
                                        e.progress as status_progress,
                                        f.bukti_file,
                                        timestampdiff(minute, a.created_time , now() ) orderan_berakhir
                                    from 
                                        master_pemesanan A
                                    left join bahan b on a.jenis_bahan=b.id
                                    left join produk c on a.produk=c.id
                                    left join status_pembayaran d on a.flag_lunas=d.id
                                    left join progress e on a.progress=e.id
                                    left join bukti_bayar f on a.id=f.id_pesanan
                                    where a.id='$id'") or die (mysqli_error());   ?>
                            <?php 
                while($result= mysqli_fetch_assoc($query)){
                            ?>
                <div class="col-md-6 col-sm-12">
                    sisi pertama <a href="file/<?php echo $result['file1'] ?>" download><i class="fa fa-download"></i></a><br>
                    <img class="img-fluid details-img" src="file/<?php echo $result['file1'] ?>" alt=""><br>
                    <?php if ($result['file2']!="") {?>
                    sisi kedua <a href="file/<?php echo $result['file2'] ?>" download><i class="fa fa-download"></i></a><br>
                    <img class="img-fluid details-img" src="file/<?php echo $result['file2'] ?>" alt="">
                    <?php } ?>
                </div>
                <div class="col-md-6 col-sm-12 description-container p-5">
                        <div class="main-description">
                        <!-- <p class="product-category mb-0">Graphite</p> -->
                        <h3>ID Pemesanan : #<?php echo $result['id'] ?></h3>
                        <h6><?php echo $result['created_time'] ?></h6>

                        <button type="button" class="btn btn-primary btn-xs pull-right" data-toggle="modal" data-target="#exampleModal">Chat</button>
                        <?php if ($result['id_status']==1) {?>
                            <span class="badge badge-danger"><?php echo $result['status_pembayaran'] ?></span><br>
                        <?php }else{ ?>
                            <span class="badge badge-success"><?php echo $result['status_pembayaran'] ?></span><br>
                        <?php } ?>
                        <?php if ($result['id_progress']==1) {?>
                            <span class="badge badge-info"><?php echo $result['status_progress'] ?></span>
                        <?php }elseif($result['id_progress']==6 || $result['id_progress']==5){ ?>
                            <span class="badge badge-danger"><?php echo $result['status_progress'] ?></span>
                        <?php }else{ ?>
                            <span class="badge badge-success"><?php echo $result['status_progress'] ?></span>
                        <?php } ?>
                        <div style="clear:both"></div>
                        <hr>
                        <div class="form-group">               
                        <table>
                            <tr>
                                <th>
                                   Produk
                                </th>
                                <th>
                                    :
                                </th>
                                <th id="harga_4">
                                    <div id="harga_5"><?php echo $result['nama_produk'] ?></div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                   Bahan
                                </th>
                                <th>
                                    :
                                </th>
                                <th id="harga_4">
                                    <div id="harga_5"><?php echo $result['nama_bahan'] ?></div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                   Type Cetak
                                </th>
                                <th>
                                    :
                                </th>
                                <th id="harga_4">
                                    <div id="harga_5"><?php echo $retVal = ($result['type_cetak']==1) ? "1 Sisi" : "2 Sisi" ; ?></div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                   Metode Pengiriman
                                </th>
                                <th>
                                    :
                                </th>
                                <th id="harga_4">
                                    <div id="harga_5"><?php echo $retVal = ($result['metode_pengiriman']==1) ? "Ambil Sendiri" : "Kirim" ; ?></div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                   Alamat
                                </th>
                                <th>
                                    :
                                </th>
                                <th id="harga_4">
                                    <div id="harga_5"><?php echo $retVal = ($result['alamat_pengiriman']=="") ? "-" : $result['alamat_pengiriman'] ; ?></div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    Harga satuan
                                </th>
                                <th>
                                    :
                                </th>
                                <th id="harga_4">
                                    <div id="harga_5">Rp.<?php echo number_format($result['harga_bahan'], 0, ",", ".") ?></div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    Jumlah
                                </th>
                                <th>
                                    :
                                </th>
                                <th id="pcs_final">
                                    <div id="pcs_final_1"><?php echo number_format($result['jumlah'], 0, ",", ".") ?></div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    Total
                                </th>
                                <th>
                                    :
                                </th>
                                <th id="tot">
                                    <div id="total_final">Rp.<?php echo number_format($result['total'], 0, ",", ".") ?></div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    Ongkir
                                </th>
                                <th>
                                    :
                                </th>
                                <th id="ong">
                                    <div id="ongkir_final">Rp.<?php echo number_format($result['ongkir'], 0, ",", ".") ?></div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    Grand Total
                                </th>
                                <th>
                                    :
                                </th>
                                <th id="gt">
                                    <div id="gt_final">Rp.<?php echo number_format($result['grand_total'], 0, ",", ".") ?></div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    Pembayaran
                                </th>
                                <th>
                                    :
                                </th>
                                <th id="gt">
                                    <div id="gt_final"><?php echo $result['pembayaran'] ?></div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    Catatan
                                </th>
                                <th>
                                    :
                                </th>
                                <th id="gt">
                                    <div id="gt_final"><?php echo $result['catatan'] ?></div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    Bukti Bayar
                                </th>
                                <th>
                                    :
                                </th>
                                <th>
                                <?php if ($result['bukti_file']!="" ) {?>   
                                        <a href="file/<?php echo $result['bukti_file'] ?>" target="_blank"><i class="fa fa-download"></i> Lihat</a>
                                <?php }elseif($result['pembayaran']=="Bayar Di Tempat") {
                                    echo "Ambil Di Tempat";
                                } else{
                                    echo "Belum Ada";
                                } ?>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    Produk Tester
                                </th>
                                <th>
                                    :
                                </th>
                                <th>
                                <?php if ($result['file_design']!="" ) {?>   
                                    <a href="file/<?php echo $result['file_design'] ?>" target="_blank"><i class="fa fa-download"></i> Lihat</a>
                                <?php 
                                } else{?>
                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalUploadFileDesign">upload</button>
                                    
                                <?php } ?>
                                </th>
                            </tr>
                        </table><br>
                         <!-- --penambahan time out orderan -->
                        <?php if (!is_null($result['bukti_file'])) {?>
                         <!-- --penambahan time out orderan -->
                            <?php if (@$_SESSION['status']=="1") {?>
                                <?php if ($result['id_status']==1) {?>
                                    <a href="aksiUpdateLunas.php?list=<?php echo @$_GET['list'] ?>" class='btn btn-success btn xs' onclick="return confirm('Apakah Pesanan Sudah Melakukan Pembayaran ?')">Sudah Bayar</a>
                                <?php } ?>
                                <?php if ($result['id_progress']==9) {?>   
                                    <a href="aksiUpdateProgress.php?list=<?php echo @$_GET['list'] ?>&progress=1" class='btn btn-info btn xs'>Pesanan Diterima</a>
                                <?php } ?>
                                <?php if ($result['id_progress']==1 && $result['metode_pengiriman']==2) {?>   
                                    <a href="aksiUpdateProgress.php?list=<?php echo @$_GET['list'] ?>&progress=4" class='btn btn-info btn xs' >Pesanan Dikirim</a>
                                <?php } ?>
                                <?php if ($result['id_progress']==1 && $result['metode_pengiriman']==1) {?>   
                                    <a href="aksiUpdateProgress.php?list=<?php echo @$_GET['list'] ?>&progress=2" class='btn btn-info btn xs' onclick="return confirm('Apakah Pesanan Sudah Selesai ?')">Pesanan Selesai</a>
                                <?php } ?>
                            <?php } ?>
                            <?php if ($result['id_progress']==2 || $result['id_progress']==3) {?>   
                                    <a href="faktur_pembayaran.php?list=<?php echo @$_GET['list'] ?>" class='btn btn-success btn xs' target="_blank">Cetak invoice</a>
                            <?php } ?>
                        <?php }elseif ($result['pembayaran']=="Bayar Di Tempat"){ ?>
                            <?php if (@$_SESSION['status']=="1") {?>
                                <?php if ($result['id_status']==1) {?>
                                    <a href="aksiUpdateLunas.php?list=<?php echo @$_GET['list'] ?>" class='btn btn-success btn xs' onclick="return confirm('Apakah Pesanan Sudah Melakukan Pembayaran ?')">Sudah Bayar</a>
                                <?php } ?>
                                <?php if ($result['id_progress']==9) {?>   
                                    <a href="aksiUpdateProgress.php?list=<?php echo @$_GET['list'] ?>&progress=1" class='btn btn-info btn xs'>Pesanan Diterima</a>
                                <?php } ?>
                                <?php if ($result['id_progress']==1 && $result['metode_pengiriman']==2) {?>   
                                    <a href="aksiUpdateProgress.php?list=<?php echo @$_GET['list'] ?>&progress=4" class='btn btn-info btn xs' >Pesanan Dikirim</a>
                                <?php } ?>
                                <?php if ($result['id_progress']==1 && $result['metode_pengiriman']==1) {?>   
                                    <a href="aksiUpdateProgress.php?list=<?php echo @$_GET['list'] ?>&progress=2" class='btn btn-info btn xs' onclick="return confirm('Apakah Pesanan Sudah Selesai ?')">Pesanan Selesai</a>
                                <?php } ?>
                            <?php } ?>
                            <?php if ($result['id_progress']==2 || $result['id_progress']==3) {?>   
                                    <a href="faktur_pembayaran.php?list=<?php echo @$_GET['list'] ?>" class='btn btn-success btn xs' target="_blank">Cetak invoice</a>
                            <?php } ?>
                        <?php } ?>
                        </div> 
                        <?php if (@$_SESSION['status']=="1") {?>
                            <?php if ($result['id_progress']==2 || $result['id_progress']==4) {?>   
                                <a href="aksiUpdateProgress.php?list=<?php echo @$_GET['list'] ?>&progress=3" class='btn btn-info btn xs' onclick="return confirm('Apakah Pesanan Sudah Diterima Pelanggan?')">Pesanan Telah Diterima Pelanggan</a>
                            <?php } ?>
                        <?php }elseif(@$_SESSION['status']=="2"){ ?>
                            <?php if ($result['id_progress']==2 || $result['id_progress']==4) {?>   
                                <a href="aksiUpdateProgress.php?list=<?php echo @$_GET['list'] ?>&progress=3" class='btn btn-info btn xs' onclick="return confirm('Apakah Pesanan Sudah Diterima?')">Pesanan Telah Diterima</a>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>
                    </div>
                </div>
            </div>
            <!-- End row -->
        </div>

        
  <?php include"struktur/footer.php"; ?>
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Chat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
            <div class="modal-body">
            <?php 
                $id=$_GET['list'];
                $query = mysqli_query($conn,"SELECT a.*,b.status from chat a
                                            left join login b on a.created_by=b.id_user
                                    where a.id_pesanan='$id'") or die (mysqli_error());   ?>
                            <?php 
                while($result2= mysqli_fetch_assoc($query)){
                            ?>
                    <?php if ($result2['status']==1) {?>
                        <div class="d-flex flex-row justify-content-start mb-4">
                        <p style="margin-top : 20px;margin-right:5px;">admin</p>
                        <div class="p-3 ms-3" style="border-radius: 15px; background-color: rgba(57, 192, 237,.2);">
                            <p class="small mb-0"><?php echo $result2['isi_chat']; ?></p>
                        </div>
                    </div>
                    <?php } ?>

                    <?php if ($result2['status']==2) {?>
                        <div class="d-flex flex-row justify-content-end mb-4">
                        <div class="p-3 me-3 border bg-body-tertiary" style="border-radius: 15px;">
                            <p class="small mb-0"><?php echo $result2['isi_chat']; ?></p>
                        </div>
                        <p style="margin-top : 20px;margin-left:5px;">pelanggan
</p>
                        </div>
                    <?php } ?>

                <?php } ?>
                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <div data-mdb-input-init class="form-outline">
                        <input type="hidden" value="<?php echo $_GET['list'] ?>" name="id" id="id">
                        <textarea class="form-control bg-body-tertiary" id="isi_chat_id" name="isi_chat" rows="4"></textarea>
                        <label class="form-label" for="textAreaExample">Type your message</label>
                        <button type="submit" class="btn btn-primary pull-right" name="send" value="send" id="send"><i class="fa fa-send"></i></button>
                    </div>
                </form>
            </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalUploadFileDesign" tabindex="-1" role="dialog" aria-labelledby="modalUploadFileDesign" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Design</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
      <div class="modal-body">
            <input type="hidden" value="<?php echo $_GET['list'] ?>" name="id" id="id">
            <input type="file" class="form-control" id="filedesign" name="filedesign" class="form-control" ><br>
            <button type="submit" class="btn btn-primary" name="upload" value="upload">upload</button>
        </form>
    </div>
    </div>
  </div>
</div>
<script>
var input = document.getElementById("isi_chat_id");
input.addEventListener("keypress", function(event) {
  if (event.key === "Enter") {
    event.preventDefault();
    document.getElementById("send").click();
  }
});
</script>
<?php 	

if (isset($_POST['send'])) {
	$id =$_POST['id'];
	$isi_chat =$_POST['isi_chat'];
	$create_time=date('Y-m-d h:i:s');
	$user=$_SESSION['id_user'];
    $input=mysqli_query($conn,"INSERT INTO chat VALUES (NULL,$id,'$isi_chat','$create_time','$user')");
    if($input){
        ?>
        <script type="text/javascript">alert("SUCCESS : Pesan Berhasil Terkirim !!!");</script>
        <script type="text/javascript">window.location = "detailpage.php?list=<?php echo $id; ?>"</script>
        <?php 
    }else{	
        ?>
        <script type="text/javascript">alert("FAILED : Pesan Tidak Berhasil Terkirim !!!");</script>
        <script type="text/javascript">window.location = "detailpage.php?list=<?php echo $id; ?>"</script>
        <?php 
    }
 } ?>

<?php 	

if (isset($_POST['upload'])) {
	$id =$_POST['id'];
	$create_time=date('Y-m-d h:i:s');
	$user=$_SESSION['id_user'];
    if ($_FILES['filedesign']['name']!="") {
            $ekstensi_diperbolehkan	= array('jpg','png','jpeg');
            $filedesign = $_FILES['filedesign']['name'];
            $x = explode('.', $filedesign);
            $ekstensi = strtolower(end($x));
            $ukuran_file	= $_FILES['filedesign']['size'];
            $file_tmp = $_FILES['filedesign']['tmp_name'];	
            $filedesign='file_design_'.$id.'_'.$filedesign;
            move_uploaded_file($file_tmp, 'file/'.$filedesign);
            if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
                if($ukuran_file < 1044070){	
                    // continue;
                }else{
                    ?><script type="text/javascript">alert("UKURAN FILE TERLALU BESAR");
                    </script>
                    <script type="text/javascript">window.location = "detailpage.php?list=<?php echo $id; ?>"</script>
                    <?php 
                }
            }else{
                ?><script type="text/javascript">alert("EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN");
                </script>
                <script type="text/javascript">window.location = "detailpage.php?list=<?php echo $id; ?>"</script>
                <?php 
            }	
            $updateMasterPemesanan=mysqli_query($conn,"UPDATE master_pemesanan set file_design='$filedesign' where id='$id'");
            $notif2=mysqli_query($conn,"INSERT INTO chat VALUES (NULL,$id,'Design anda sudah selesai, mohon konfirmasi !!!','$create_time','$user')");
            if($updateMasterPemesanan){
                ?>
                <script type="text/javascript">alert("SUCCESS : File Design Berhasil Terupload !!!");</script>
                <script type="text/javascript">window.location = "detailpage.php?list=<?php echo $id; ?>"</script>
                <?php 
            }else{	
                ?>
                <script type="text/javascript">alert("FAILED : File Design Tidak Berhasil Terupload !!!");</script>
                <script type="text/javascript">window.location = "detailpage.php?list=<?php echo $id; ?>"</script>
                <?php 
            }
        }
 } ?>