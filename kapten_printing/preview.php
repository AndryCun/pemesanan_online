<?php include"struktur/header.php"; ?>
    <div class="container my-5">
        <div class="card details-card p-0">
            <div class="row">
            <?php 
                $id=$_GET['id'];
                $sql1 = mysqli_query($conn,"SELECT *,(select min(harga) min_harga from bahan ) as harga from produk where id='$id'") or die (mysqli_error());   ?>
                            <?php $no=1;
                while($ya= mysqli_fetch_assoc($sql1)){
                            ?>
                <div class="col-md-6 col-sm-12">
                    <img class="img-fluid details-img" src="images/<?php echo $ya['gambar'] ?>" alt="">
                </div>
                <div class="col-md-6 col-sm-12 description-container p-5">
                        <div class="main-description">
                        <!-- <p class="product-category mb-0">Graphite</p> -->
                        <h3> <?php echo $ya['produk'] ?></h3>
                        <div style="clear:both"></div>

                        <hr>


                        <p class="product-title mt-4 mb-1">About this product</p>
                        <p class="product-description mb-4">
                             <?php echo $ya['description'] ?>
                        </p>

                        <hr>
                        <hr>
                        <div id="harga_2">
                            <p class="product-price" id="harga_3">Rp<?php echo number_format($ya['harga'], 0, ",", ".") ?> </p>
                        </div>
                        <form action="aksiPesan.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" value="<?php echo $ya['id'] ?>" name="produk" id="produk">
                        <input type="hidden" value="<?php echo $ya['harga'] ?>" name="harga" id="harga">
                        <input type="hidden" name="total" id="total">
                        <input type="hidden" name="id_bahan" id="id_bahan">
                        <input type="hidden" name="ongkir" id="ongkir" value="0">
                        <input type="hidden" name="grandtotal" id="grandtotal">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Bahan</label>
                            <select name="jenis" id="jenis" class="form-control" required>
                            <option value="0" hidden>Pilih</option>

                            
                           <?php $sql2 = mysqli_query($conn,"SELECT * from bahan order by harga asc") or die (mysqli_error());   ?>
                            <?php $no=1;
                            while($yaa= mysqli_fetch_assoc($sql2)){
                                        ?>
                                <option value="<?php echo $yaa['harga'].".".$yaa['id'].".".$yaa['type_cetak'] ?>"><?php echo $yaa['bahan']."-".$retVal = ($yaa['type_cetak']==1) ? "1 Sisi" : "2 Sisi" ; ?></option>

                             <?php } ?>
                            </select>
                        </div> 
                        <div class="form-group">
                            <label for="exampleInputEmail1"></label>
                            <select name="type_cetak" id="type_cetak" class="form-control" style="cursor: not-allowed;pointer-events: none; display:none;" readonly>
                                <option value="1"></option>
                                <option value="2"></option>
                            </select>
                        </div> 
                        <div class="form-group" id="sisi_new">   
                            <input type="file" class="form-control" id="file1" name="file1" required>            
                        </div> 
                        <div class="form-group">   
                            <label for="exampleInputEmail1">Jumlah</label>            
                            <input type="number" class="form-control" id="jumlah" name="jumlah" min="1" value="1" onchange="hitung()">Pcs
                        </div> 
                        <div class="form-group">               
                            <label for="exampleInputEmail1">Pengambilan Barang</label>
                            <select class='form-control' name='pengambilan_barang' id='pengambilan_barang'>
                                <option value='1'>Ambil Sendiri</option>
                                <option value='2'>Kirim</option>
                            </select>
                        </div> 
                        <div class="form-group" id="alamat_pengiriman">               
                        
                        </div> 
                       
                        <div class="form-group">               
                        <table>
                            <tr>
                                <th>
                                    Harga satuan
                                </th>
                                <th>
                                    :
                                </th>
                                <th id="harga_4">
                                    <div id="harga_5">Rp.<?php echo number_format($ya['harga'], 0, ",", ".") ?></div>
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
                                    <div id="pcs_final_1">1</div>
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
                                    <div id="total_final">Rp.0</div>
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
                                    <div id="ongkir_final">Rp.0</div>
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
                                    <div id="gt_final">Rp.0</div>
                                </th>
                            </tr>
                        </table>
                        </div> 
                        <div class="form-group">   
                            <label for="exampleInputEmail1">Pembayaran</label>   
                            <select class='form-control' name='pembayaran' id='pembayaran'>
                                <option value='QRIS' id="qris_list">QRIS</option>
                                <option value='Transfer' id="Transfer_list">Transfer</option>
                                <option value='Bayar Di Tempat' id="cod_list">Bayar di tempat</option>
                            </select>
                        </div>
                        <div class="form-group">   
                            <textarea class="form-control" rows="4" name="catatan" placeholder="catatan ke percetakan..."></textarea>
                        </div>
                    <?php } ?>
                            
                        <?php if (@$_SESSION['id_user']!="") { ?>
                            <button type="submit" class="btn btn-primary" name="pesan" value="pesan">Pesan</button>
                        <?php }else{ ?>
                            <a href="daftar.php" class="btn btn-primary" onclick="return confirm('Kamu Belum Punya Akun, harap registrasi terlebih dahulu !!')"  >Pesan</a>
                        <?php } ?>
                        </form>
                        <!-- <form class="add-inputs" method="post">
                            <button name="add_to_cart" type="submit" class="btn btn-primary btn-lg">Add to Wishlist</button>
                        </form> -->
                    </div>
                </div>
            </div>
            <!-- End row -->
        </div>

        
  <?php include"struktur/footer.php"; ?>

  <script>

        $(document).ready(function() {
            $('#jenis').on('change', function (e) {
                var optionSelected = $("option:selected", this);
                var valueSelected = this.value.split(".");
                console.log(valueSelected);
                console.log(valueSelected[2]);
                document.getElementById('harga').value = valueSelected[0];
                document.getElementById('id_bahan').value = valueSelected[1];
                document.getElementById('type_cetak').value = valueSelected[2];
                // console.log(document.getElementById('type_cetak').value);
                $("#harga_3").remove();    
                $("#harga_5").remove();    
                stre22=`  <p class="product-price" id="harga_3">Rp`+format_rupiah(valueSelected[0])+`</p>`;
                $("#harga_2").append(stre22);  
                stre44=` <div id="harga_5">Rp.`+format_rupiah(valueSelected[0])+`</div>`;
                $("#harga_4").append(stre44);  
                if (valueSelected[2]==2) {
                    $("#file1").remove();
                    $("#file2").remove();
                    var stre;
                    stre=`<input type="file" class="form-control" id="file1" name="file1">
                            <input type="file" class="form-control" id="file2" name="file2">`;
                    $("#sisi_new").append(stre);
                    // document.getElementById("ongkir_input").style.display = "block";
                }else{
                    $("#file1").remove();
                    $("#file2").remove();
                    var stre;
                    stre=`<input type="file" class="form-control" id="file1" name="file1">`;
                    $("#sisi_new").append(stre);
                }
                hitung() 
            });
        } );

        

        function format_rupiah(angka, prefix)
        {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split    = number_string.split(','),
                sisa     = split[0].length % 3,
                rupiah     = split[0].substr(0, sisa),
                ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
                
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
            
            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }
        $(document).ready(function() {
            $('#pengambilan_barang').on('change', function (e) {
                var optionSelected = $("option:selected", this);
                var valueSelected = this.value; 
                $("#ongkir_final").remove();    
                $("#gt_final").remove(); 
                $("#total_final").remove();   
                $("#qris_list").remove(); 
                $("#Transfer_list").remove();      
                $("#cod_list").remove();             
                // console.log(valueSelected);
                if (valueSelected==2) {
                    var stre;
                    stre=`<div id="alamat_pengiriman_input"><label for="exampleInputEmail1">Alamat</label>
                    <textarea class="form-control" rows="4" name="alamat_pengiriman" ></textarea></div>`;
                    $("#alamat_pengiriman").append(stre);
                    stre4=` <div id="ongkir_final">Rp.`+format_rupiah("20000")+`</div>`;
                    $("#ong").append(stre4);   
                    stre3=`  <option value='QRIS' id="qris_list">QRIS</option>
                                <option value='Transfer' id="Transfer_list">Transfer</option>`;
                    $("#pembayaran").append(stre3);   
                    document.getElementById('ongkir').value = "20000";
                    hitung();
                    // document.getElementById("ongkir_input").style.display = "block";
                }else{
                    $("#alamat_pengiriman_input").remove();
                    stre4=` <div id="ongkir_final">Rp.`+format_rupiah("0")+`</div>`;
                    $("#ong").append(stre4);   
                    stre3=`  <option value='QRIS' id="qris_list">QRIS</option>
                                <option value='Transfer' id="Transfer_list">Transfer</option>
                                <option value='Bayar Di Tempat' id="cod_list">Bayar di tempat</option>`;
                    $("#pembayaran").append(stre3);   
                    document.getElementById('ongkir').value = "0";
                    hitung();
                    // document.getElementById("ongkir_input").style.display = 'none';
                    // document.getElementById("ongkir_input").value=0;
                }
            });
        } );
        function hitung(){
                    $("#pcs_final_1").remove();  
                    $("#total_final").remove();   
                    $("#gt_final").remove();              
                    let total=0;
                    let final=0;
                    let pcs = document.getElementById('jumlah').value;
                    let harga = document.getElementById('harga').value;
                    let ongkir = document.getElementById('ongkir').value;
                    console.log(harga);
                    console.log(pcs);
                    total = pcs * harga;
                    console.log(total);
                    final=parseFloat(total)+parseFloat(ongkir);
                    var stre;
                    stre=` <div id="pcs_final_1">`+pcs+`</div>`;
                    $("#pcs_final").append(stre);   
                    stre2=`<div id="total_final">Rp.`+format_rupiah(total.toString())+`</div>`;
                    $("#tot").append(stre2);    
                    stre3=`<div id="gt_final">Rp.`+format_rupiah(final.toString())+`</div>`;
                    $("#gt").append(stre3);          
                    document.getElementById('total').value = total;
                    document.getElementById('grandtotal').value = final;
            }


  </script>