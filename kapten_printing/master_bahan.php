<?php include"struktur/header.php"; ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex header justify-content-center mb-3">
                        <h3 class="title">Master Bahan</h3>
                        <br>
                        <!-- <p class="category">Last Campaign Performance</p> -->
                </div>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Tambah Bahan</button><br><br>
                <table id="datatable" class="table table-striped"  style="width:100%">
									<thead>
										<tr class='info'>
											<th >No</th>
											<th >Bahan</th>
											<th >Harga</th>
											<th >Type Cetak</th>
											<th >Action</th>
										</tr>
									</thead>
                                    
								    <?php $query = mysqli_query($conn,"SELECT * from bahan") or die (mysqli_error());   ?>
									<?php $urut=1;
									while($result= mysqli_fetch_assoc($query)){
										?>
										<tr>
											<td><?php echo $urut ?></td>
											<td><?php echo $result['bahan'] ?></td>
											<td><?php echo "Rp " . number_format($result['harga'], 2, ",", ".") ?></td>
											<td><?php echo $retVal = ($result['type_cetak']==1) ? "1 Sisi" : "2 Sisi" ; ?></td>
											<td><button type="button" class="btn btn-warning btn xs" data-toggle="modal" data-target="#modalEdit<?php echo $result['id'] ?>">Edit</button>
											<a href='aksiDeleteProduk.php?id=<?php echo $result['id'] ?>' class='btn btn-danger btn xs' onclick="return confirm('Apakah Yakin Kamu Hapus Data Ini ?')">Delete</a></td>
										</tr>
										 <!-- MODAL Edit -->
										 <div class="modal fade" id="modalEdit<?php echo $result['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Bahan</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                        <form action="aksiBahan.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                                                        <input type="hidden" value="<?php echo $result['id'] ?>" name="id">
														<div class="modal-body">
															<div class="row form-group">
																<div class="col col-md-3">
																	<label for="bahan" class=" form-control-label">Bahan</label>
																</div>
																<div class="col-12 col-md-9">
																	<input type="input" name="bahan" placeholder="Masukan bahan..." value="<?php echo $result['bahan'] ?>"  class="form-control">
																</div>
															</div>   
															<div class="row form-group">
																<div class="col col-md-3">
																	<label for="harga" class=" form-control-label">Harga</label>
																</div>
																<div class="col-12 col-md-9">
																	<input type="number" name="harga" placeholder="Masukan Harga..." value="<?php echo $result['harga'] ?>"  class="form-control">
																</div>
															</div>  
															<div class="row form-group">
																<div class="col col-md-3">
																	<label for="exampleInputEmail1">Cetak</label>
																</div>
																<div class="col-12 col-md-9">
																<select name="type_cetak" id="type_cetak" class="form-control">
																	<?php if ($result['type_cetak']==1) { ?>
																		<option value="1">1 sisi</option>
																		<option value="2">2 sisi</option>
																	<?php } ?>
																	<?php if ($result['type_cetak']==2) { ?>
																		<option value="2">2 sisi</option>
																		<option value="1">1 sisi</option>
																	<?php } ?>
																</select>
																</div>
															</div>  
														</div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- MODAL Edit -->
										<?php $urut++;
										 }
										 ?>
			</table>
            </div>
        </div>
    </div>
<?php include"struktur/footer.php"; ?>
<div class="modal fade" id="exampleModal" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Bahan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="aksiBahan.php" method="post" class="form-horizontal" >
            <div class="modal-body">
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="bahan" class=" form-control-label">Bahan</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="input" name="bahan" placeholder="Masukan bahan..." class="form-control">
                    </div>
                </div>   
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="harga" class=" form-control-label">Harga</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="number" name="harga" placeholder="Masukan Harga..." class="form-control">
                    </div>
                </div>   
				<div class="row form-group">
					<div class="col col-md-3">
						<label for="exampleInputEmail1" class="form-control-label">Cetak</label>
					</div>
					<div class="col-12 col-md-9">
					<select name="type_cetak" id="type_cetak" class="form-control">
							<option value="1">1 sisi</option>
							<option value="2">2 sisi</option>
					</select>
					</div>
				</div>   
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </div>
        </form>
    </div>
  </div>
</div>