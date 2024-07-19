<?php include"struktur/header.php"; ?>

  <!-- shop section -->

  <section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Products
        </h2>
      </div>
      <div class="row">
      <?php $sql1 = mysqli_query($conn,"SELECT *,(select min(harga) min_harga from bahan ) as harga  from produk") or die (mysqli_error());   ?>
                            <?php $no=1;
                                while($ya= mysqli_fetch_assoc($sql1)){
                                    ?>
        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="box">
            <a href="preview.php?id=<?php echo $ya['id'] ?>">
              <div class="img-box">
                <img src="images/<?php echo $ya['gambar'] ?>" alt="">
              </div>
              <div class="detail-box">
                <h6>
                <?php echo $ya['produk'] ?>
                </h6>
                <h6>
                  Mulai
                  <span>Rp.
                  <?php echo number_format($ya['harga'], 0, ",", ".") ?> 
                  </span>
                  <!-- M<sup>2</sup> -->
                </h6>
              </div>
              <!-- <div class="new">
                <span>
                  New
                </span>
              </div> -->
            </a>
          </div>
        </div>
        
        <?php } ?>
      </div>
     
    </div>
  </section>

  <!-- end shop section -->


  <?php include"struktur/footer.php"; ?>