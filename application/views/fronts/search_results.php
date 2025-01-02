<!DOCTYPE html>
<html lang="id">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Mantenbaru | Mantenbaru Wedding Organizer</title>
  <meta name="title" content="Vendor Pernikahan Terlengkap | Mantenbaru Wedding Organizer">
  <meta name="site_url" content="<?php echo base_url()?>">
  <meta name="description" content="">
  <meta name="keywords" content="mantenbaru.com, mantenbaru, perencanaan investasi, vendor pernikahan, wedding organizer, wedding planner">
  <meta NAME="ROBOTS" CONTENT="INDEX, FOLLOW">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="web_author" content="dhawyarkan.com">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta property="og:site_name" content="Mantenbaru">
  <meta property="og:title" content="Vendor Pernikahan Terlengkap | Mantenbaru Wedding Organizer">
  <meta property="og:description" content="">
  <meta property="og:url" content="<?php echo base_url()?>">
  <meta property="og:image" content="<?php echo base_url()?>assets/frontend/aspanel/img/logo.png">
  <meta property="og:image:url" content="<?php echo base_url()?>assets/frontend/aspanel/img/logo.png">
  <meta property="og:type" content="article">
  <link rel="shortcut icon" href="<?php echo base_url()?>assets/frontend/aspanel/img/fav.png" type="image/x-icon">

  <?php $this->load->view('fronts/css')?>
  <style>
  /* Mengatur flexbox layout agar elemen dalam container lebih rapi */
  .hotel-choose {
    height: 300px; /* Jangan fix height agar bisa menyesuaikan konten */
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    margin-bottom: 20px; /* Memberikan jarak antar elemen */
    box-sizing: border-box; /* Menghindari elemen meluber */
  }

  .popular-img img {
    width: 100%; /* Pastikan gambar responsif */
    height: auto; /* Menjaga proporsi gambar */
    object-fit: cover; /* Agar gambar tidak terdistorsi */
    max-height: 200px; /* Menjaga agar gambar tetap dalam batas tinggi tertentu */
  }

  .hotel-choose .col-md-6 {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    padding: 15px; /* Memberikan padding pada kolom */
    box-sizing: border-box; /* Agar padding tidak membuat kolom melebihi batas */
  }

  /* Membuat grid responsif: Satu kolom pada layar kecil (mobile), dua kolom pada tablet/desktop */
  .col-12.col-md-6 {
    padding: 0 10px; /* Memberikan jarak antar kolom */
    box-sizing: border-box; /* Pastikan padding tidak meluber */
  }

  /* Styling untuk judul */
  .title span {
    font-size: 18px;
    font-weight: bold;
  }

  /* Menambahkan margin pada tombol */
  .c-button {
    text-align: center;
    width: 100%;
    margin-top: 15px; /* Jarak antara konten dan tombol */
  }

  /* Responsif untuk layar mobile */
  @media (max-width: 768px) {
    .hotel-choose {
      flex-direction: column; /* Gambar dan deskripsi tampil vertikal pada mobile */
    }

    .popular-img img {
      max-height: 150px; /* Menyesuaikan tinggi gambar pada mobile */
    }

    .title span {
      font-size: 16px; /* Menyesuaikan ukuran font judul pada mobile */
    }

    /* Memastikan konten tidak melebihi lebar kolom */
    .col-12 {
      padding: 10px; /* Memberikan padding pada kolom */
    }
  }
</style>

</head>
<body data-color="theme-1">
  <?php $this->load->view('fronts/loader')?>
  <?php $this->load->view('fronts/header')?>

  <div class="inner-banner">
    <img class="center-image" src="<?php echo base_url()?>assets/frontend/aspanel/img/bghead.jpg" alt="">
  </div>

  <div class="list-wrapper">
    <div class="container">
      <div class="grid-content clearfix">
        <?php if (empty($query)) { ?>
          <p style="margin-left: 20px;">Silakan masukkan kata kunci pencarian.</p>
        <?php } elseif (empty($results)) { ?>
          <p style="margin-left: 20px;">Tidak ditemukan.</p>
        <?php } else { ?>
          <!-- Memulai row di sini -->
          <div class="row">
            <?php foreach ($results as $post_new) { ?>
              <div class="col-12 col-md-6 mb-4"> <!-- Menambahkan mb-4 untuk spacing antar item -->
                <div class="hotel-choose clearfix">
                  <!-- Kolom Gambar -->
                  <div class="col-12 col-md-6">
                    <div class="popular-img">
                      <?php if(empty($post_new->foto_h)) { ?>
                        <img height="100%" width="100%" src="<?php echo base_url() ?>assets/frontend/noimages.jpg" alt="">
                      <?php } else { ?>
                        <img height="100%" width="100%" src="<?php echo base_url() ?>assets/frontend/harga/<?php echo $post_new->foto_h ?>" alt="">
                      <?php } ?>
                       
                      <?php
                      $b = $post_new->harga_diskon;
                      $c = $post_new->harga;
                      if(!empty($post_new->harga_diskon)) {
                        $a = ($b / $c) * 100;
                      ?>
                        <div class="price price-s-1">
                          <?php echo number_format($a, 0, ',', '.') ?>%
                        </div>
                      <?php } ?>
                    </div>
                  </div>

                  <!-- Kolom Deskripsi -->
                  <div class="col-12 col-md-6">
                    <div class="title">
                      <span><strong>
                        <?php 
                        $judul = $post_new->judul;
                        echo mb_strimwidth($judul, 0, 50, "...");
                        ?>
                      </strong></span>
                      <?php if(!empty($post_new->user_company_judul) && !empty($post_new->nama)) { ?>
                        <br><p><?php echo $post_new->user_company_judul?><br> <?php echo $post_new->nama?></p>
                      <?php } ?>
                      <br>
                      <p>
                        <?php if(empty($post_new->harga_diskon)) { ?>
                          <span class="color-dark-2 palce-txt"><strong> Rp<?php echo number_format($post_new->harga, 0, ',', '.')?></strong></span>
                        <?php } else if($a = $post_new->harga - $post_new->harga_diskon) { ?>
                          <span style="font-size: 10px; color: grey"><del>Rp<?php echo number_format($post_new->harga, 0, ',', '.')?></del></span>
                          <span class="color-dark-2 palce-txt"><strong> Rp<?php echo number_format($a, 0, ',', '.')?></strong></span>
                        <?php } ?>
                      </p>
                      <br><a href="<?php echo base_url("harga-detail/$post_new->judul_seo") ?>" class="c-button bg-dr-blue hv-dr-blue-o b-40">Lebih lengkap</a>
                    </div>
                  </div>
                </div>
              </div> <!-- Akhir kolom untuk item -->
            <?php } ?>
          </div> <!-- End of row -->
        <?php } ?>
      </div>

      <div class="row">
        <div class="c_pagination clearfix padd-120">
          <?php echo $this->pagination->create_links(); ?>
        </div>
      </div>
    </div>
  </div>
</body>





    <?php $this->load->view('fronts/footer')?>
    <?php $this->load->view('fronts/js')?>
  </body>
</html>
