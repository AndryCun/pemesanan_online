<?php include"struktur/header.php"; ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex header justify-content-center mb-3">
                        <h3 class="title">Master Produk</h3>
                        <br>
                        <!-- <p class="category">Last Campaign Performance</p> -->
                </div>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Tambah Produk</button><br><br>
                <table id="datatable" class="table table-striped"  style="width:100%">
									<thead>
										<tr class='info'>
											<th >No</th>
											<th >Produk</th>
											<th >Gambar</th>
											<th >Deskripsi</th>
											<th >Action</th>
										</tr>
									</thead>
                                    
								    <?php $query = mysqli_query($conn,"SELECT * from produk;") or die (mysqli_error());   ?>
									<?php $urut=1;
									while($result= mysqli_fetch_assoc($query)){
										?>
										<tr>
											<td><?php echo $urut ?></td>
											<td><?php echo $result['produk'] ?></td>
											<td><a href="images/<?php echo $result['gambar'] ?>" target="_blank" rel="noopener noreferrer">Lihat</a></td>
											<td><?php echo $result['description'] ?></td>
											<td><button type="button" class="btn btn-warning btn xs" data-toggle="modal" data-target="#modalEdit<?php echo $result['id'] ?>">Edit</button>
											<a href='aksiDeleteProduk.php?id=<?php echo $result['id'] ?>' class='btn btn-danger btn xs' onclick="return confirm('Apakah Yakin Kamu Hapus Data Ini ?')">Delete</a></td>
										</tr>
                                            <!-- MODAL Edit -->
                                            <div class="modal fade" id="modalEdit<?php echo $result['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Produk</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                        <form action="aksiProduk.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                                                        <input type="hidden" value="<?php echo $result['id'] ?>" name="id">
                                                            <div class="modal-body">
                                                                <div class="row form-group">
                                                                    <div class="col col-md-3">
                                                                        <label for="produk" class=" form-control-label">Produk</label>
                                                                    </div>
                                                                    <div class="col-12 col-md-9">
                                                                        <input type="input" name="produk" placeholder="produk" value="<?php echo $result['produk'] ?>" class="form-control">
                                                                    </div>
                                                                </div>   
                                                                <div class="row form-group">
                                                                    <div class="col col-md-3">
                                                                        <label for="gambar" class=" form-control-label">Gambar</label>
                                                                    </div>
                                                                    <div class="col-12 col-md-9">
                                                                        <small><a href="images/<?php echo $result['gambar'] ?>" target="_blank" rel="noopener noreferrer">File Sebelumnya</a></small>
                                                                        <input type="file" name="file1" class="form-control">
                                                                    </div>
                                                                </div>   
                                                                <div class="row form-group">
                                                                    <div class="col col-md-3">
                                                                        <label for="deskripsi" class=" form-control-label">Deskripsi</label>
                                                                    </div>
                                                                    <div class="col-12 col-md-9">
                                                                        <textarea name="deskripsi" placeholder="Deskripsi" class="form-control" ><?php echo $result['description'] ?></textarea>
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="aksiProduk.php" method="post" class="form-horizontal" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="produk" class=" form-control-label">Produk</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="input" name="produk" placeholder="produk" class="form-control">
                    </div>
                </div>   
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="gambar" class=" form-control-label">Gambar</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="file" name="file1" class="form-control">
                    </div>
                </div>   
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="deskripsi" class=" form-control-label">Deskripsi</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <textarea name="deskripsi" placeholder="Deskripsi" class="form-control" ></textarea>
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