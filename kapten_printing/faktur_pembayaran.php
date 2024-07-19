<html>
<head>
<title>Faktur Pembayaran Kapten Printing</title>
<link rel="shortcut icon" href="images/kapten.png">
<style type="text/css" media="print">
    @page 
    {
        size: auto;   /* auto is the initial value */
        margin: 0mm;  /* this affects the margin in the printer settings */
    }

    #printbtn {
        display :  none;
    }
</style>
</head>
<?php 
include("config/conn.php");
$sql = mysqli_query($conn,"SELECT 
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
                            where a.id='$_GET[list]' ;") or die (mysqli_error());  ?>
                    <?php 
			             while($result= mysqli_fetch_assoc($sql)){
				
                         ?>

<div id="printbtn"><button onClick="location.href =http://localhost/fe/detailPage.php?list=<?php echo $_GET['list'] ?>">Kembali</button><button onclick="window.print()">Cetak</button></div>
<body style='font-family:tahoma; font-size:8pt;'>
<table style='width:300px; font-size:8pt;' border = '0' >
    <td width='63%' align='left'>
        <img src="images/kapten.png" width="60px" alt="">
    </h2>
    </td>
    <td style='vertical-align:top;font-size:6pt;' width='37%' align='right'>
        Palembang, <?php echo  date_format(date_create(substr($result['created_time'],0,10)),"d F Y") ?><br>
    </td>
    <tr>
        <th colspan=2>  
            <div style="background-color:black;color:white;text-align: left;font-size:8pt;padding-top:3px;padding-bottom:3px">
                <b>ID PEMESANAN #<?php echo $result['id'] ?></b><br>
            </div>
            <div style="text-align: left;font-size:6pt;padding-top:3px;">
                <b>Invoice To : <?php echo strtoupper($result['nama_pemesan']) ?></b><br>
            </div>
        </th>
    </tr>
</table>
<br>
<table cellspacing='0' style='width:300px; font-size:8pt;' border='1'>
 
<tr align='center' style="background-color:black;color:white;">
    <td >Produk</td>
    <td >Nama Bahan</td>
    <td>Harga Produk</td>
    <td >Jumlah</td>
    <td>Total Harga</td>
</tr>
<tr>
    <td align='center'><?php echo $result['nama_produk'] ?></td>
    <td align='center'><?php echo $result['nama_bahan'] ?></td>
    <td align='center'><?php echo "Rp " . number_format($result['harga_bahan'], 2, ",", ".")  ?></td>
    <td align='center'><?php echo $result['jumlah'] ?></td>
    <td style='text-align:right'><?php echo "Rp " . number_format($result['total'], 2, ",", ".")?></td>
    
</tr>
</table>
<br>
<table style='width:300px; font-size:8pt; font-family:calibri; border-collapse: collapse;' border = '0'>
    <tr>
        <th style='vertical-align:top;padding-right:50px;' rowspan=1>  
            <div style="text-align: left;font-size:7pt;padding-top:5px;padding-left:0px;padding-right:0px;">
                <b style="padding-left:13px;">Hormat Kami,</b><br><br><br><br><b style="padding-left:0px;">( Percetakan Kapten )</b>
            </div>
        </th>
        <th rowspan=1 style="text-align: left;font-size:7pt;padding-left:50px;">  
            <table border ="0" style="text-align: left;font-size:7pt;padding-top:2px;"> 
                <tr>
                    <td><b>Ongkir</b></td>
                    <td><b> : </b></td>
                    <td><b><?php echo "Rp " . number_format((float)$result['ongkir'], 2, ",", ".") ?></b></td>
                </tr>
                <tr>
                    <td><b>Subtotal</b></td>
                    <td><b> : </b></td>
                    <td> <b><?php echo "Rp " . number_format((float)$result['grand_total'], 2, ",", ".") ?></b></td>
                </tr>
            </table>
            <div>
                <br>
                <br><br>
                <br><br>
                <br><br>
            </div>
        </th>
    </tr>
</table>

<?php } ?>
<tr>
</body>
</html>