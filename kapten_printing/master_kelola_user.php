<?php include"struktur/header.php"; ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex header justify-content-center mb-3">
                        <h3 class="title">Master User</h3>
                        <br>
                        <!-- <p class="category">Last Campaign Performance</p> -->
                </div>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Tambah User</button><br><br>
                <table id="datatable" class="table table-striped"  style="width:100%">
									<thead>
										<tr class='info'>
											<th >No</th>
											<th >Email</th>
											<th >Username</th>
											<th >Nama</th>
											<th >Role</th>
											<th >Action</th>
										</tr>
									</thead>
                                    
								    <?php $query = mysqli_query($conn,"SELECT * from login where status in ('1','3') and id_user!=1") or die (mysqli_error());   ?>
									<?php $urut=1;
									while($result= mysqli_fetch_assoc($query)){
										?>
										<tr>
											<td><?php echo $urut ?></td>
											<td><?php echo $result['email'] ?></td>
											<td><?php echo $result['username'] ?></td>
											<td><?php echo $result['nama'] ?></td>
											<td><?php echo $retVal = ($result['status']==1) ? "Admin" : "Pimpinan" ; ?></td>
											<td><button type="button" class="btn btn-warning btn xs" data-toggle="modal" data-target="#modalEdit<?php echo $result['id_user'] ?>">Edit</button>
											<a href='aksiDeleteMasterUser.php?id=<?php echo $result['id_user'] ?>' class='btn btn-danger btn xs' onclick="return confirm('Apakah Yakin Kamu Hapus Data Ini ?')">Delete</a></td>
										</tr>
										 <!-- MODAL Edit -->
										 <div class="modal fade" id="modalEdit<?php echo $result['id_user'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                        <form action="aksiMasterUser.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                                                        <input type="hidden" value="<?php echo $result['id_user'] ?>" name="id">
														<div class="modal-body">
															<div class="row form-group">
																<div class="col col-md-3">
																	<label for="email" class=" form-control-label">Email</label>
																</div>
																<div class="col-12 col-md-9">
																	<input type="input" name="email" placeholder="Masukan Email..." class="form-control" value="<?php echo $result['email'] ?>">
																</div>
															</div>   
															<div class="row form-group">
																<div class="col col-md-3">
																	<label for="nama" class=" form-control-label">Nama</label>
																</div>
																<div class="col-12 col-md-9">
																	<input type="input" name="nama" placeholder="Masukan nama..." class="form-control" value="<?php echo $result['nama'] ?>">
																</div>
															</div>  
															<div class="row form-group">
																<div class="col col-md-3">
																	<label for="username" class=" form-control-label">Username</label>
																</div>
																<div class="col-12 col-md-9">
																	<input type="input" name="username" placeholder="Masukan Username..." class="form-control" value="<?php echo $result['username'] ?>">
																</div>
															</div>  
															<div class="row form-group">
																<div class="col col-md-3">
																	<label for="password" class=" form-control-label">Password</label>
																</div>
																<div class="col-12 col-md-9">
																	<input type="password" name="password" placeholder="Masukan Password..." class="form-control" value="<?php echo $result['password'] ?>">
																</div>
															</div>  
															<div class="row form-group">
																<div class="col col-md-3">
																	<label for="exampleInputEmail1" class="form-control-label">Role</label>
																</div>
																<div class="col-12 col-md-9">
																<select name="role" id="role" class="form-control">
																	<?php if ($result['status']==1) { ?>
																		<option value="1">Admin</option>
																		<option value="3">Pimpinan</option>
																	<?php }else{ ?>
																		<option value="3">Pimpinan</option>
																		<option value="1">Admin</option>
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="aksiMasterUser.php" method="post" class="form-horizontal" >
            <div class="modal-body">
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="email" class=" form-control-label">Email</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="input" name="email" placeholder="Masukan Email..." class="form-control">
                    </div>
                </div>   
				<div class="row form-group">
                    <div class="col col-md-3">
                        <label for="nama" class=" form-control-label">Nama</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="input" name="nama" placeholder="Masukan nama..." class="form-control">
                    </div>
                </div>  
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="username" class=" form-control-label">Username</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="input" name="username" placeholder="Masukan Username..." class="form-control">
                    </div>
                </div>  
				<div class="row form-group">
                    <div class="col col-md-3">
                        <label for="password" class=" form-control-label">Password</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="password" name="password" placeholder="Masukan Password..." class="form-control">
                    </div>
                </div>  
				<div class="row form-group">
					<div class="col col-md-3">
						<label for="exampleInputEmail1" class="form-control-label">Role</label>
					</div>
					<div class="col-12 col-md-9">
					<select name="role" id="role" class="form-control">
							<option value="1">Admin</option>
							<option value="3">Pimpinan</option>
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