<?php
include("config/conn.php");
if (strpos($_SERVER['REQUEST_URI'],'index') !== false || strpos($_SERVER['REQUEST_URI'],'katalog') !== false  || strpos($_SERVER['REQUEST_URI'],'about') !== false) {
  // echo 'Car exists.';
} else {
  if (@$_SESSION['id_user']=="") { ?>
      <script type="text/javascript">window.location = "index.php"</script>
  <?php }
}
?>
<!DOCTYPE html>
<html>
<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <!-- <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon"> -->

  <title>
    Kapten Printing
  </title>

  <link rel="shortcut icon" href="images/kapten.png">
  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
  
  <link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet"/>
  <link href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css" rel="stylesheet"/>
  <link href="https://cdn.datatables.net/datetime/1.5.1/css/dataTables.dateTime.min.css" rel="stylesheet"/>
  <link href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" rel="stylesheet"/>
</head>

<style>
        * {
            box-sizing: border-box;
        }

        .details-card {
            width: 80%;
            margin: auto;
        }


        .description-container {
            position: relative;
            /* height: 900px; */
        }

        .main-description1 {
            position: absolute;
            top: 50%;
            -webkit-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
        }

        .main-description h3 {
            font-size: 2rem;
        }

        .add-inputs,
        .add-inputs input {
            float: left;
            margin-right: 10px;
            margin-bottom: 2px;
        }

        .add-inputs button {
            border-radius: 0;
        }

        .add-inputs input {
            height: 48px;
            width: 65px;
            border-radius: 0;
        }


        .product-title {
            font-size: 1.1rem;
            font-weight: bold;
        }

        .product-price {
            font-size: 1.8rem;
        }

        .social-list {
            padding: 0;
            list-style: none;
        }

        .social-list li {
            float: left;
            padding: 6px 8px;
            margin-right: 12px;
        }

        .social-list li a {
            color: black;
            font-size: 2rem;
        }

        .social-list li a i {
            font-size: 2rem;
        }
        .dt-search {
            float: none;
            text-align: right;
        }

.dropdown-menu.notify-drop {
  min-width: 330px;
  background-color: #fff;
  min-height: 360px;
  max-height: 360px;
}
.dropdown-menu.notify-drop .notify-drop-title {
  border-bottom: 1px solid #e2e2e2;
  padding: 5px 15px 10px 15px;
}
.dropdown-menu.notify-drop .drop-content {
  min-height: 280px;
  max-height: 280px;
  overflow-y: scroll;
}
.dropdown-menu.notify-drop .drop-content::-webkit-scrollbar-track
{
  background-color: #F5F5F5;
}

.dropdown-menu.notify-drop .drop-content::-webkit-scrollbar
{
  width: 8px;
  background-color: #F5F5F5;
}

.dropdown-menu.notify-drop .drop-content::-webkit-scrollbar-thumb
{
  background-color: #ccc;
}
.dropdown-menu.notify-drop .drop-content > li {
  border-bottom: 1px solid #e2e2e2;
  padding: 10px 0px 5px 0px;
}
.dropdown-menu.notify-drop .drop-content > li:nth-child(2n+0) {
  background-color: #fafafa;
}
.dropdown-menu.notify-drop .drop-content > li:after {
  content: "";
  clear: both;
  display: block;
}
.dropdown-menu.notify-drop .drop-content > li:hover {
  background-color: #fcfcfc;
}
.dropdown-menu.notify-drop .drop-content > li:last-child {
  border-bottom: none;
}
.dropdown-menu.notify-drop .drop-content > li .notify-img {
  float: left;
  display: inline-block;
  width: 45px;
  height: 45px;
  margin: 0px 0px 8px 0px;
}
.dropdown-menu.notify-drop .allRead {
  margin-right: 7px;
}
.dropdown-menu.notify-drop .rIcon {
  float: right;
  color: #999;
}
.dropdown-menu.notify-drop .rIcon:hover {
  color: #333;
}
.dropdown-menu.notify-drop .drop-content > li a {
  font-size: 12px;
  font-weight: normal;
}
.dropdown-menu.notify-drop .drop-content > li {
  font-weight: bold;
  font-size: 11px;
}
.dropdown-menu.notify-drop .drop-content > li hr {
  margin: 5px 0;
  width: 70%;
  border-color: #e2e2e2;
}
.dropdown-menu.notify-drop .drop-content .pd-l0 {
  padding-left: 0;
}
.dropdown-menu.notify-drop .drop-content > li p {
  font-size: 11px;
  color: #666;
  font-weight: normal;
  margin: 3px 0;
}
.dropdown-menu.notify-drop .drop-content > li p.time {
  font-size: 10px;
  font-weight: 600;
  top: -6px;
  margin: 8px 0px 0px 0px;
  padding: 0px 3px;
  border: 1px solid #e2e2e2;
  position: relative;
  background-image: linear-gradient(#fff,#f2f2f2);
  display: inline-block;
  border-radius: 2px;
  color: #B97745;
}
.dropdown-menu.notify-drop .drop-content > li p.time:hover {
  background-image: linear-gradient(#fff,#fff);
}
.dropdown-menu.notify-drop .notify-drop-footer {
  border-top: 1px solid #e2e2e2;
  bottom: 0;
  position: relative;
  padding: 8px 15px;
}
.dropdown-menu.notify-drop .notify-drop-footer a {
  color: #777;
  text-decoration: none;
}
.dropdown-menu.notify-drop .notify-drop-footer a:hover {
  color: #333;
}
    </style>
<body>
  <div class="hero_area">
    <header class="header_section">
      <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand"> <img src="images/kapten.png" width="100" height="100">
          <span>
            Kapten Printing
          </span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""></span>
        </button>
        <!-- Menu Admin Dan Pimpinan -->
        <?php if (@$_SESSION['status']=="1" || @$_SESSION['status']=="3") { ?>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav  ">
            <li class="nav-item ">
              <a class="nav-link" href="dashboard.php">Dashboard <span class="sr-only">(current)</span></a>
            </li>
         <?php if (@$_SESSION['status']=="3") { ?>
            <!-- Menu hanya Pimpinan-->
            <li class="nav-item">
              <a class="nav-link" href="report_master_pesanan.php">
                Report Pesanan
              </a>
            </li>
          <?php } ?>
           <!-- Menu hanya Admin-->
            <?php if (@$_SESSION['status']=="1") { ?>
            <li class="nav-item">
              <a class="nav-link" href="master_pesanan.php">
                Master Pesanan
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="master_produk.php">
                Master Produk
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="master_bahan.php">
                Master Bahan
              </a>
            </li>
             <!-- Menu hanya Pimpinan-->
             <li class="nav-item">
              <a class="nav-link" href="report_master_pesanan.php">
                Report Pesanan
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="master_kelola_user.php">
                Master User
              </a>
            </li>
            <?php $query = mysqli_query($conn,"SELECT 
																count(*) AS TOTAL
																from 
																	master_pemesanan A
                                left join notification g on g.id_pemesanan=a.id
																left join status_pembayaran d on g.id_notif=d.id and notif_flag=1
																left join progress e on g.id_notif=e.id and notif_flag=2
                                where cast(a.created_time as date) between cast(CURDATE() as date)-7 and cast(CURDATE() as date)
                                and d.id in ('9','1','2')
																order by g.id desc") or die (mysqli_error());   ?>
                  
                 <?php $total= mysqli_fetch_array($query) ?>   
              <li class="nav navbar-nav nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Notification (<?php echo $total['TOTAL'] ?>)</a>
                <ul class="dropdown-menu notify-drop">
                  <div class="notify-drop-title">
                    <div class="row">
                      <div class="col-md-6 col-sm-6 col-xs-6">Notifikasi</div>
                      <div class="col-md-6 col-sm-6 col-xs-6 text-right"><a href="" class="rIcon allRead" data-tooltip="tooltip" data-placement="bottom" title="tümü okundu."><i class="fa fa-dot-circle-o"></i></a></div>
                    </div>
                  </div>
                <!-- </li><i class="fa fa-bell" aria-hidden="true"></i> -->
              <!-- </a> -->
              <!-- notify content -->
            <div class="drop-content">
            <?php $query = mysqli_query($conn,"SELECT 
                                  g.*,
																	d.id as id_status,
																	d.status as status_pembayaran,
																	e.id as id_progress,
																	e.progress as status_progress
																from 
																	master_pemesanan A
                                left join notification g on g.id_pemesanan=a.id
																left join status_pembayaran d on g.id_notif=d.id and notif_flag=1
																left join progress e on g.id_notif=e.id and notif_flag=2
                                where cast(a.created_time as date) between cast(CURDATE() as date)-7 and cast(CURDATE() as date)
                                and d.id in ('9','1','2')
																order by g.id desc") or die (mysqli_error());   ?>
							<?php $urut=1;
							while($result=mysqli_fetch_assoc($query))
              {
								?>  
              <?php if ($result['id_status']==1) { ?>
            	<li>
            		<div class="col-md-12 col-sm-12 col-xs-12">
                  Pesanan Baru, Harap Segera Verifikasi Pembayaran <a href="detailPage.php?list=<?php echo $result['id_pemesanan'] ?>">ID PEMESANAN #<?php echo $result['id_pemesanan'] ?></a>.
            		<!-- <p class="time">Şimdi</p> -->
            		</div>
            	</li>
              <?php }elseif ($result['id_status']==9) { ?>
              <li>
            		<div class="col-md-12 col-sm-12 col-xs-12">
                  Pesanan Baru, Bukti Pembayaran Belum Dikirimkan <a href="detailPage.php?list=<?php echo $result['id_pemesanan'] ?>">ID PEMESANAN #<?php echo $result['id_pemesanan'] ?></a>.
            		<!-- <p class="time">Şimdi</p> -->
            		</div>
            	</li>
              <?php }elseif ($result['id_status']==2) { ?>
              <li>
            		<div class="col-md-12 col-sm-12 col-xs-12">
                  Pesanan Baru, Bukti Pembayaran Telah Di Verifikasi <a href="detailPage.php?list=<?php echo $result['id_pemesanan'] ?>">ID PEMESANAN #<?php echo $result['id_pemesanan'] ?></a>.
            		<!-- <p class="time">Şimdi</p> -->
            		</div>
            	</li>
            <?php } ?>
              <?php $urut++;
              }
              ?>

            </div>
          </li>
            <!-- end notify title -->           
           <!-- Menu hanya Pimpinan-->
          </ul>
          <?php } ?>
            <li class="nav-item">
           <!-- Menu hanya Admin-->
            <?php if (@$_SESSION['id_user']=="") { ?>
              <a  class="nav-link" href="login.php">
                <i class="fa fa-user" aria-hidden="true"></i>
                <span>
                  Login
                </span>
              </a>
        <!-- Menu Admin Dan Pimpinan -->
            <?php }else{ ?>
        <!-- Menu pelanggan -->
              <a class="nav-link" href="config/logout.php" onclick="return confirm('Apakah Yakin Kamu Akan Keluar ?')">
                <i class="fa fa-user" aria-hidden="true"></i>
                <span>
                  logout
                </span>
              </a>
            <?php } ?>
          </li>
        </div>
        <?php }else{ ?>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav  ">
            <li class="nav-item ">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="katalog.php">
                Katalog
              </a>
            </li>
            <?php if (@$_SESSION['status']=="2") { ?>
            <li class="nav-item">
              <a class="nav-link" href="pesanan.php">
                Pesanan
              </a>
            </li>
            <?php $query = mysqli_query($conn,"SELECT 
																count(*) AS TOTAL
																from 
																	master_pemesanan A
                                left join notification g on g.id_pemesanan=a.id
																left join status_pembayaran d on g.id_notif=d.id and notif_flag=1
																left join progress e on g.id_notif=e.id and notif_flag=2
                                where cast(a.created_time as date) between cast(CURDATE() as date)-7 and cast(CURDATE() as date)
                                and id_pemesan='$_SESSION[id_user]'
																order by g.id desc") or die (mysqli_error());   ?>
                  
                 <?php $total= mysqli_fetch_array($query) ?>   
              <li class="nav navbar-nav nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Notification (<?php echo $total['TOTAL'] ?>)</a>
                <ul class="dropdown-menu notify-drop">
                  <div class="notify-drop-title">
                    <div class="row">
                      <div class="col-md-6 col-sm-6 col-xs-6">Notifikasi</div>
                      <div class="col-md-6 col-sm-6 col-xs-6 text-right"><a href="" class="rIcon allRead" data-tooltip="tooltip" data-placement="bottom" title="tümü okundu."><i class="fa fa-dot-circle-o"></i></a></div>
                    </div>
                  </div>
                <!-- </li><i class="fa fa-bell" aria-hidden="true"></i> -->
              <!-- </a> -->
              <!-- notify content -->
            <div class="drop-content">
            <?php $query = mysqli_query($conn,"SELECT 
                                  g.*,
																	d.id as id_status,
																	d.status as status_pembayaran,
																	e.id as id_progress,
																	e.progress as status_progress
																from 
																	master_pemesanan A
                                left join notification g on g.id_pemesanan=a.id
																left join status_pembayaran d on g.id_notif=d.id and notif_flag=1
																left join progress e on g.id_notif=e.id and notif_flag=2
                                where cast(a.created_time as date) between cast(CURDATE() as date)-7 and cast(CURDATE() as date)
                                and id_pemesan='$_SESSION[id_user]'
																order by g.id desc") or die (mysqli_error());   ?>
							<?php $urut=1;
							while($result=mysqli_fetch_assoc($query))
              {
								?>
             <?php if ($result['id_status']==1) { ?>
            	<li>
            		<div class="col-md-12 col-sm-12 col-xs-12">
                  Pesanan anda masih proses verifikasi pembayaran <a href="detailPage.php?list=<?php echo $result['id_pemesanan'] ?>">ID PEMESANAN #<?php echo $result['id_pemesanan'] ?></a>.
            		<!-- <p class="time">Şimdi</p> -->
            		</div>
            	</li>
              <?php }elseif ($result['id_status']==2) { ?>
              <li>
            		<div class="col-md-12 col-sm-12 col-xs-12">
                  Pesanan Anda Terverifikasi Pembayaran<a href="detailPage.php?list=<?php echo $result['id_pemesanan'] ?>">ID PEMESANAN #<?php echo $result['id_pemesanan'] ?></a>.
            		<!-- <p class="time">Şimdi</p> -->
            		</div>
            	</li>
              <?php }elseif ($result['id_status']==9) { ?>
              <li>
            		<div class="col-md-12 col-sm-12 col-xs-12">
                  Bukti Pembayaran Belum Dikirimkan <a href="detailPage.php?list=<?php echo $result['id_pemesanan'] ?>">ID PEMESANAN #<?php echo $result['id_pemesanan'] ?></a>.
            		<!-- <p class="time">Şimdi</p> -->
            		</div>
            	</li>
              <?php }elseif ($result['id_progress']==1) { ?>
              <li>
            		<div class="col-md-12 col-sm-12 col-xs-12">
                  Pesanan Anda Telah Diterima <a href="detailPage.php?list=<?php echo $result['id_pemesanan'] ?>">ID PEMESANAN #<?php echo $result['id_pemesanan'] ?></a>, Sedang Progress Pembuatan.
            		<!-- <p class="time">Şimdi</p> -->
            		</div>
            	</li>
              <?php }elseif ($result['id_progress']==2) { ?>
              <li>
            		<div class="col-md-12 col-sm-12 col-xs-12">
                  Pesanan anda telah selesai <a href="detailPage.php?list=<?php echo $result['id_pemesanan'] ?>">ID PEMESANAN #<?php echo $result['id_pemesanan'] ?></a>, silahkan diambil.
            		<!-- <p class="time">Şimdi</p> -->
            		</div>
            	</li>
            <?php }elseif ($result['id_progress']==4) { ?>
            	<li>
            		<div class="col-md-12 col-sm-12 col-xs-12">
                Pesanan anda telah Dikirim Menggunakan Kurir dengan nama fredi nomor hp/wa 081234567890<a href="detailPage.php?list=<?php echo $result['id_pemesanan'] ?>">ID PEMESANAN #<?php echo $result['id_pemesanan'] ?></a>, Mohon Menunggu !!!
            		<!-- <p class="time">Şimdi</p> -->
            		</div>
            	</li>
              <?php }elseif ($result['id_progress']==3) { ?>
            	<li>
            		<div class="col-md-12 col-sm-12 col-xs-12">
                  Pesanan anda telah selesai dan diterima <a href="detailPage.php?list=<?php echo $result['id_pemesanan'] ?>">ID PEMESANAN #<?php echo $result['id_pemesanan'] ?></a>.
            		<!-- <p class="time">Şimdi</p> -->
            		</div>
            	</li>
              <?php }elseif ($result['id_progress']===5) { ?>
            	<li>
            		<div class="col-md-12 col-sm-12 col-xs-12">
                  Pesanan Anda Dibatalkan Admin <a href="detailPage.php?list=<?php echo $result['id_pemesanan'] ?>">ID PEMESANAN #<?php echo $result['id_pemesanan'] ?></a>, liat catatan.
            		<!-- <p class="time">Şimdi</p> -->
            		</div>
            	</li>
              <?php }elseif ($result['id_progress']==6) { ?>
            	<li>
            		<div class="col-md-12 col-sm-12 col-xs-12">
                  Pesanan Dibatalkan System<a href="detailPage.php?list=<?php echo $result['id_pemesanan'] ?>">ID PEMESANAN #<?php echo $result['id_pemesanan'] ?></a>.
            		<!-- <p class="time">Şimdi</p> -->
            		</div>
            	</li>
              <?php }elseif ($result['id_progress']==9) { ?>
            	<li>
            		<div class="col-md-12 col-sm-12 col-xs-12">
                  Pesanan Belum Diterima Admin<a href="detailPage.php?list=<?php echo $result['id_pemesanan'] ?>">ID PEMESANAN #<?php echo $result['id_pemesanan'] ?></a>, Mohon Menunggu !!!
            		<!-- <p class="time">Şimdi</p> -->
            		</div>
            	</li>

            
            <?php } ?>
              <?php $urut++;
              }
              ?>

            </div>
          </li>
            <!-- end notify title -->
            <?php }else{ ?>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
            </li>
            <?php } ?>
          </ul>
          <div class="user_option">
            <?php if (@$_SESSION['id_user']=="") { ?>
              <a href="login.php">
                <i class="fa fa-user" aria-hidden="true"></i>
                <span>
                  Login
                </span>
              </a>
            <?php }else{ ?>
              <a href="config/logout.php" onclick="return confirm('Apakah Yakin Kamu Akan Keluar ?')">
                <i class="fa fa-user" aria-hidden="true"></i>
                <span>
                  logout
                </span>
              </a>
            <?php } ?>
          </div>
        </div>
        <?php } ?>
        <!-- Menu pelanggan -->
        <!-- menu -->
      </nav>
    </header>
    <!-- end header section -->