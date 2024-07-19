<?php include"struktur/header.php"; ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex header justify-content-center mb-3">
                        <h3 class="title">Report Pesanan</h3>
                        <br>
                        <!-- <p class="category">Last Campaign Performance</p> -->
                </div>
				<table border="0" cellspacing="5" cellpadding="5">
									<tbody>
									<tr>
										<td>Start Date:</td>
										<td><input type="text" id="min" name="min" class="form-control"></td>
										<td>&nbsp&nbsp&nbsp</td>
										<td>End Date:</td>
										<td><input type="text" id="max" name="max" class="form-control"></td>
									</tr>
									</tbody>
								</table><br>
                	<table id="datatable1" class="table table-striped">
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
									<?php if ($result['id_status']==1) {?>
										<td> <span class="badge badge-danger"><?php echo $result['status_pembayaran'] ?></span></td>
									<?php }else{ ?>
										<td> <span class="badge badge-success"><?php echo $result['status_pembayaran'] ?></span></td>
									<?php } ?>
									<?php if ($result['id_progress']==1) {?>
										<td> <span class="badge badge-info"><?php echo $result['status_progress'] ?></span></td>
									<?php }else{ ?>
										<td> <span class="badge badge-success"><?php echo $result['status_progress'] ?></span></td>
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


<script type="text/javascript" >
function formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) 
        month = '0' + month;
    if (day.length < 2) 
        day = '0' + day;
    if (year===1970) {
         return null;
    } else {
         return [year, month, day].join('-');
        
    }
}
let minDate, maxDate;
 
// Custom filtering function which will search data in column four between two values
DataTable.ext.search.push(function (settings, data, dataIndex) {
    let min = formatDate(minDate.val());
    let max = formatDate(maxDate.val());
    let date = formatDate(data[3]);
    console.log(min);
    console.log(max);
    console.log(date);
    if (
            ( min === null && max === null ) ||
            ( min === null && date <= max ) ||
            ( min <= date   && max === null ) ||
            ( min <= date   && date <= max )
        ) {
            return true;
        }
        return false;
});
 
// Create date inputs
minDate = new DateTime('#min', {
    format: 'DD MMM YYYY'
});
maxDate = new DateTime('#max', {
    format: 'DD MMM YYYY'
});
let table =  $('#datatable1').DataTable( {
		dom: 'Bfrtip',
			buttons: [{
						extend: 'excel',
						text: 'Excel',
						exportOptions: {
							modifier: {
								page: 'current'
							}
						},
						title :'Report Pesanan'
					},
					{
						extend: 'print',
						text: 'Print',
						exportOptions: {
							modifier: {
								page: 'current'
							}
						},
						title :'Report Pesanan'
					},
				]  
    } );
 
// Refilter the table
document.querySelectorAll('#min, #max').forEach((el) => {
    el.addEventListener('change', () => table.draw());
});
</script>