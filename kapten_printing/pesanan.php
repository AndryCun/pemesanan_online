<?php include"struktur/header.php"; ?>
    <div class="container">
        <div class="">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                <table id="datatable" class="table table-striped">
									<thead>
										<tr class='info'>
											<th >No</th>
											<th >ID Pemesanan</th>
											<th >Tanggal Pemesanan</th>
											<th >Produk</th>
											<th >Jenis Bahan</th>
											<th >Grand Total</th>
											<th >Pembayaran</th>
											<th >Status</th>
											<th >Progress</th>
											<th >Detail</th>
										</tr>
									</thead>
                                    
								    <?php $query = mysqli_query($conn,"SELECT 
                                                                            a.*,
                                                                            b.bahan as nama_bahan,
                                                                            b.harga as harga_bahan,
                                                                            c.produk as nama_produk,
                                                                            d.id as id_status,
                                                                            d.status as status_pembayaran,
                                                                            e.id as id_progress,
                                                                            e.progress as status_progress,
                                                                            f.id_pesanan,
                                                                            timestampdiff(hour, a.created_time , now() ) orderan_berakhir,
                                                                            UNIX_TIMESTAMP(STR_TO_DATE(DATE_ADD(a.created_time, INTERVAL 1 day), '%Y-%m-%d %H:%i:%s'))*1000 unix
                                                                        from 
                                                                            master_pemesanan A
                                                                        left join bahan b on a.jenis_bahan=b.id
                                                                        left join produk c on a.produk=c.id
                                                                        left join status_pembayaran d on a.flag_lunas=d.id
                                                                        left join progress e on a.progress=e.id
                                                                        left join bukti_bayar f on a.id=f.id_pesanan
                                                                        where id_pemesan='$_SESSION[id_user]'
                                                                        order by a.id desc;") or die (mysqli_error());   ?>
									<?php $urut=1;
									while($result= mysqli_fetch_assoc($query)){
										?>
										<tr>
											<td><?php echo $urut ?></td>
											<td><?php echo $result['id'] ?></td>
											<td><?php echo $result['created_time'] ?></td>
											<td><?php echo $result['nama_produk'] ?></td>
											<td><?php echo $result['nama_bahan'] ?></td>
											<td><?php echo "Rp " . number_format($result['grand_total'], 2, ",", ".") ?></td>
											<td><?php echo $result['pembayaran'] ?></td>
                                            <?php if ($result['id_status']==2) {?>
											    <td> <span class="badge badge-success"><?php echo $result['status_pembayaran'] ?></span></td>
                                            <?php }else{ ?>
											    <td> <span class="badge badge-info"><?php echo $result['status_pembayaran'] ?></span></td>
                                            <?php } ?>
                                            <?php if ($result['id_progress']==2 || $result['id_progress']==3) {?>
											    <td> <span class="badge badge-success"><?php echo $result['status_progress'] ?></span></td>
                                            <?php }elseif($result['id_progress']==6 || $result['id_progress']==5){ ?>
											    <td> <span class="badge badge-danger"><?php echo $result['status_progress'] ?></span></td>
                                            <?php }else{ ?>
											    <td> <span class="badge badge-info"><?php echo $result['status_progress'] ?></span></td>
                                            <?php } ?>
                                            <?php if ($result['pembayaran']!="Bayar Di Tempat") {?>
                                                <?php if ($result['id_status']==9) {?>
                                                    <?php if (is_null($result['id_pesanan'])) {?>
                                                        <!-- --penambahan time out orderan -->
                                                        <?php if (is_null($result['id_pesanan']) && $result['orderan_berakhir']>=24) {?>
                                                            <td><a href='detailPage.php?list=<?php echo $result['id'] ?>' class='btn btn-primary btn xs'>Detail</a></td>
                                                        <?php }else{ ?> 
                                                            <td><a href='result.php?id=<?php echo $result['id'] ?>&pembayaran=<?php echo $result['pembayaran']?>&waktu=<?php echo $result['unix']?>' class='btn btn-primary btn xs'>Detail</a></td>
                                                        <?php } ?>
                                                        <!-- --penambahan time out orderan -->
                                                    <?php }else{ ?>
                                                        <td><a href='detailPage.php?list=<?php echo $result['id'] ?>' class='btn btn-primary btn xs'>Detail</a></td>
                                                    <?php } ?>
                                                <?php }else{ ?>
                                                    <td><a href='detailPage.php?list=<?php echo $result['id'] ?>' class='btn btn-primary btn xs'>Detail</a></td>
                                                <?php } ?>
                                             <?php }else{ ?>
                                                <td><a href='detailPage.php?list=<?php echo $result['id'] ?>' class='btn btn-primary btn xs'>Detail</a></td>
                                            <?php } ?>
										</tr>
										<?php $urut++;
										 }
										 ?>
			  						</table>
                </div>
            </div>
            </div>
            <!-- End row -->
        </div>

        
  <?php include"struktur/footer.php"; ?>

  <script>
     $(document).ready(function() {
            $('#sisi').on('change', function (e) {
                var optionSelected = $("option:selected", this);
                var valueSelected = this.value;
                // console.log(valueSelected);
                if (valueSelected==2) {
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
            });
        } );

        $(document).ready(function() {
            $('#jenis').on('change', function (e) {
                var optionSelected = $("option:selected", this);
                var valueSelected = this.value;
                // console.log(valueSelected);
                document.getElementById('harga').value = valueSelected;

                $("#harga_3").remove();    
                $("#harga_5").remove();    
                stre22=`  <p class="product-price" id="harga_3">Rp`+format_rupiah(valueSelected)+`</p>`;
                $("#harga_2").append(stre22);  
                stre44=` <div id="harga_5">Rp.`+format_rupiah(valueSelected)+`</div>`;
                    $("#harga_4").append(stre44);  
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
                // console.log(valueSelected);
                if (valueSelected==2) {
                    var stre;
                    stre=`<label for="exampleInputEmail1">Pengambilan Barang</label>
                    <textarea class="form-control" rows="4" name="alamat_pengiriman" ></textarea>`;
                    $("#alamat_pengiriman").append(stre);
                    stre4=` <div id="ongkir_final">Rp.`+format_rupiah("30000")+`</div>`;
                    $("#ong").append(stre4);   
                    document.getElementById('ongkir').value = "30000";
                    hitung();
                    // document.getElementById("ongkir_input").style.display = "block";
                }else{
                    $("#alamat_pengiriman_input").remove();
                    stre4=` <div id="ongkir_final">Rp.`+format_rupiah("0")+`</div>`;
                    $("#ong").append(stre4);   
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
                    let pcs = document.getElementById('number').value;
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