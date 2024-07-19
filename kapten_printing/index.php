<?php include"struktur/header.php"; ?>
    <!-- slider section -->

    <section class="slider_section">
      <div class="slider_container">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-7">
                    <div class="detail-box">
                      <h1>
                        Welcome To Our <br>
                        Kapten Printing
                      </h1>
                      <p>
                      <strong>Kapten Printing</strong> hadir sebagai solusi lengkap untuk segala kebutuhan cetak segala jenis kertas dengan ukuran A3+. Kami siap membantu Anda mewujudkan ide kreatif menjadi produk cetak berkualitas tinggi.
                      </p>
                      <a href="katalog.php">
                        Pesan
                      </a>
                    </div>
                  </div>
                  <div class="col-md-5 ">
                    <div class="img-box">
                      <img src="images/cv1.png" alt="" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item ">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-7">
                    <div class="detail-box">
                    <h1>
                        Welcome To Our <br>
                        Kapten Printing
                      </h1>
                      <p>
                      <strong>Kapten Printing</strong> hadir sebagai solusi lengkap untuk segala kebutuhan cetak segala jenis kertas dengan ukuran A3+. Kami siap membantu Anda mewujudkan ide kreatif menjadi produk cetak berkualitas tinggi.
                      </p>
                      <a href="katalog.php">
                        Pesan
                      </a>
                    </div>
                  </div>
                  <div class="col-md-5 ">
                    <div class="img-box">
                      <img src="images/cv2.png" alt="" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel_btn-box">
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <i class="fa fa-arrow-left" aria-hidden="true"></i>
              <span class="sr-only">Previous</span>
            </a>
            <img src="images/line.png" alt="" />
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <i class="fa fa-arrow-right" aria-hidden="true"></i>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>
    </section>

    <!-- end slider section -->
  </div>
  <!-- end hero area -->

  <!-- shop section -->

  <section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Latest Products
        </h2>
      </div>
      <div class="row">
      <?php $sql1 = mysqli_query($conn,"SELECT *,(select min(harga) min_harga from bahan ) as harga from produk limit 8") or die (mysqli_error());   ?>
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
                </h6>
              </div>
            </a>
          </div>
        </div>
        
        <?php } ?>
      </div>
      <div class="btn-box">
        <a href="katalog.php">
          View All Products
        </a>
      </div>
    </div>
  </section>

  <!-- end shop section -->

  <!-- why section -->

  <section class="why_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Why Shop With Us
        </h2>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="box ">
            <div class="img-box">
              
            </div>
            <div class="detail-box">
              <h5>
                Fast Delivery
              </h5>
              <p>
                variations of passages of Lorem Ipsum available
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="box ">
            <div class="img-box">
              
            </div>
            <div class="detail-box">
              <h5>
                Best Quality
              </h5>
              <p>
                variations of passages of Lorem Ipsum available
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end why section -->

  <!-- client section -->
  <section class="client_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Testimonial
        </h2>
      </div>
    </div>
    <div class="container px-0">
      <div id="customCarousel2" class="carousel  carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="box">
              <div class="client_info">
                <div class="client_name">
                  <h5>
                    John
                  </h5>
                  <h6>
                    Jakabaring
                  </h6>
                </div>
                <i class="fa fa-quote-left" aria-hidden="true"></i>
              </div>
              <p>
              Pelayanan OK, tidak perlu antri dan langsung ditangani. Proses pencetakan sangat cepat. Ruangan nyaman, luas, full AC.
            </p>
            </div>
          </div>
          <div class="carousel-item">
            <div class="box">
              <div class="client_info">
                <div class="client_name">
                  <h5>
                    awal
                  </h5>
                  <h6>
                    sekip
                  </h6>
                </div>
                <i class="fa fa-quote-left" aria-hidden="true"></i>
              </div>
              <p>
              printing yang baru sangat OK. Kesan saya cukup bagus dalam pelayanan dan kecepatan kerja. Suasana dalam gedung juga nyaman dan menyenangkan. Bravo!
            </p>
            </div>
          </div>
          <div class="carousel-item">
            <div class="box">
              <div class="client_info">
                <div class="client_name">
                  <h5>
                    carrick
                  </h5>
                  <h6>
                    KM9
                  </h6>
                </div>
                <i class="fa fa-quote-left" aria-hidden="true"></i>
              </div>
              <p>
              Colorful, helpful, powerful!
            </p>
            </div>
          </div>
        </div>
        <div class="carousel_btn-box">
          <a class="carousel-control-prev" href="#customCarousel2" role="button" data-slide="prev">
            <i class="fa fa-angle-left" aria-hidden="true"></i>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#customCarousel2" role="button" data-slide="next">
            <i class="fa fa-angle-right" aria-hidden="true"></i>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </section>
  <!-- end client section -->

  <?php include"struktur/footer.php"; ?>