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
    .hotel-choose {
      height: 250px; 
      display: flex;
      flex-direction: row;
      justify-content: space-between;
    }
    .popular-img img {
      height: 200px; 
      object-fit: cover;
    }
    .hotel-choose .col-md-6 {
      display: flex;
      flex-direction: column;
      justify-content: space-between;
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
            <?php foreach ($results as $post_new) { ?>
            <div class="col-md-6 responsive clearfix">
                <div class="hotel-choose clearfix">
                    <div class="col-md-6 responsive clearfix">
                      <div class="popular-img">
                        <?php if(empty($post_new->foto_h)) { ?>
                          <img height="100%" width="100%" src="<?php echo base_url() ?>assets/frontend/noimages.jpg" alt="">
                        <?php }else{ ?>
                          <img height="100%" width="100%" src="<?php echo base_url() ?>assets/frontend/harga/<?php echo $post_new->foto_h ?>" alt="">
                        <?php } ?>
                           
                           <?php
                           $b=$post_new->harga_diskon;
                           $c=$post_new->harga;
                           if(empty($post_new->harga_diskon)) { ?>

                           <?php }else if($a = ($b/$c)*100 ){?>
                             <div class="price price-s-1">
                               <?php echo number_format($a,0,',','.')?>%
                              </div>
                           <?php }?>
                      
                      </div>
                    </div>
                    <div class="col-md-6 responsive">
                      <div class="title">
                      <span font-size="110px" height="100%"><strong><?php echo $post_new->judul?></strong></span>
                      <br><p><?php echo $post_new->user_company_judul?> <?php echo $post_new->nama?></p>
                        <br>
                        <p>
                          
                          <?php if(empty($post_new->harga_diskon)) { ?>
                               <span class="color-dark-2 palce-txt"><strong> Rp<?php echo number_format($post_new->harga,0,',','.')?></span>
                            <?php }else if($a = $post_new->harga - $post_new->harga_diskon ){?>
                                <span font-size="10px" style="color:grey"><del>Rp<?php echo number_format($post_new->harga,0,',','.')?></del></span> 
                                <span class="color-dark-2 palce-txt"><strong> Rp<?php echo number_format($a,0,',','.')?></strong></span>
                          <?php }?>
                        </p>
                         <br><a href="<?php echo base_url("harga-detail/$post_new->judul_seo") ?>" class="c-button bg-dr-blue hv-dr-blue-o b-40">Lebih lengkap</a>
                       </div>
                    </div>                  
                </div>
            </div>
            <?php } ?>
          <?php } ?>
        </div>

        <div class="row">
             <div class="c_pagination clearfix padd-120">
                    <?php  echo $this->pagination->create_links();  ?>
             </div>
        </div>
      </div>
    </div>

    <?php $this->load->view('fronts/footer')?>
    <?php $this->load->view('fronts/js')?>
  </body>
</html>
