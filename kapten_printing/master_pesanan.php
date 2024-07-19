<?php include"struktur/header.php"; ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex header justify-content-center mb-3">
                        <h3 class="title">Master Pesanan</h3>
                        <br>
                        <!-- <p class="category">Last Campaign Performance</p> -->
                </div>
                	<table id="datatable" class="table table-striped">
						<thead>
							<tr class='info'>
								<th >No</th>
								<th >ID Pemesanan</th>
								<th >Nama Pelanggan</th>
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
																	f.nama as nama_pemesan
																from 
																	master_pemesanan A
																left join bahan b on a.jenis_bahan=b.id
																left join produk c on a.produk=c.id
																left join status_pembayaran d on a.flag_lunas=d.id
																left join progress e on a.progress=e.id
																left join login f on a.id_pemesan=f.id_user
																order by a.id desc;") or die (mysqli_error());   ?>
							<?php $urut=1;
							while($result= mysqli_fetch_assoc($query)){
								?>
								<tr>
									<td><?php echo $urut ?></td>
									<td><?php echo $result['id'] ?></td>
									<td><?php echo $result['nama_pemesan'] ?></td>
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
									<td><a href='detailPage.php?list=<?php echo $result['id'] ?>' class='btn btn-primary btn xs'>Detail</a></td>
								</tr>
								<?php $urut++;
									}
									?>
						</table>
            </div>
        </div>
    </div>
<?php include"struktur/footer.php"; ?>