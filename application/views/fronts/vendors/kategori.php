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
</head>
  <body data-color="theme-1">
    <!-- <?php $this->load->view('fronts/loader')?>-->
    <?php $this->load->view('fronts/header')?>
    <div class="inner-banner">
      <img class="center-image" src="<?php echo base_url()?>assets/frontend/aspanel/img/bghead.jpg" alt="">
    </div>

    <div class="list-wrapper ">
      <div class="container">
        <div class="grid-content clearfix">
          <?php foreach ($post_news as $post_new) { ?>
          <div class="col-md-6 responsive ">
              <div class="hotel-choose">
                  <div class="col-md-6 responsive">
                    <div class="popular-img">
                      <?php if(empty($post_new->gambar)) { ?>
                        <img height="100%" width="100%" src="<?php echo base_url() ?>assets/frontend/noimages.jpg" alt="">
                      <?php }else{ ?>
                        <img height="100%" width="100%" src="<?php echo base_url() ?>assets/frontend/gambar_bisnis/<?php echo $post_new->gambar ?>" alt="">
                      <?php } ?>
                          <?php $user_hargas= $this->Crud_m->view_where_ordering_limits('harga', array('harga_id_bisnis'=>$post_new->id_bisnis),'harga','ASC','0','1');
                            foreach ($user_hargas as $row){
                          ?>
                         <?php
                         $b=$row->harga_diskon;
                         $c=$row->harga;
                         if(empty($row->harga_diskon)) { ?>

                         <?php }else if($a = ($b/$c)*100 ){?>
                           <div class="price price-s-1">
                             <?php echo number_format($a,0,',','.')?>%
                            </div>
                         <?php }?>
                       <?php } ?>
                    </div>
                  </div>
                  <div class="col-md-6 responsive">
                    <div class="title">
                    <span font-size="110px"><strong><?php echo $post_new->namabisnis?></strong></span>
                    <br><p><?php echo $post_new->user_company_judul?> <?php echo $post_new->nama?></p>
                      <br>
                      <p>
                        <?php $user_hargas2= $this->Crud_m->view_where_ordering_limits('harga', array('harga_id_bisnis'=>$post_new->id_bisnis),'harga','ASC','0','1');
                          foreach ($user_hargas2 as $row){
                        ?>
                        <?php if(empty($row->harga_diskon)) { ?>
                             <span class="color-dark-2 palce-txt"><strong> Rp<?php echo number_format($row->harga,0,',','.')?></span>
                          <?php }else if($a = $row->harga - $row->harga_diskon ){?>
                              <span font-size="10px" style="color:grey"><del>Rp<?php echo number_format($row->harga,0,',','.')?></del></span> 
                              <span class="color-dark-2 palce-txt"><strong> Rp<?php echo number_format($a,0,',','.')?></strong></span>
                        <?php }?>
                      </p>
                      <?php } ?>
                        <!--
                        <div class="rate-wrap">
                          <div class="rate">
                          <span class="fa fa-star color-yellow"></span>
                          <span><?php echo $post_new->ulasan_star?> (<?php echo $post_new->ulasan_total?> Ulasan)</span>
                          </div>
                        </div>
                        -->
                       <br><a href="<?php echo base_url("vendors/$post_new->namabisnis_seo") ?>" class="c-button bg-dr-blue hv-dr-blue-o b-40">Lebih lengkap</a>
                     </div>
                  </div>
                  <div class="row responsive">
                    <div class="full-width arrows arrows-3">
                      <div class="swiper-container" data-autoplay="5000" data-loop="2" data-speed="1000" data-center="0" data-slides-per-view="responsive" data-mob-slides="2" data-xs-slides="2" data-sm-slides="2" data-md-slides="3" data-lg-slides="3" data-add-slides="3">
                        <div class="swiper-wrapper">

                          <?php
                          $b=$post_new->id_bisnis;
                          $user_harga= $this->Crud_m->view_where_ordering('harga', array('harga_id_bisnis'=>$b),'id_harga','DESC');
                          foreach ($user_harga as $row){
                          ?>
                          <div class="swiper-slide hotel-sm-slide responsive">
                            <?php if(empty($row['foto_h'])) { ?>
                              <a href="<?php echo base_url() ?>harga-detail/<?=$row['judul_seo']?>"><img height="100%" width="100%" src="<?php echo base_url() ?>assets/frontend/noimage_paket.jpg" alt=""></a>
                            <?php }else{ ?>
                              <a href="<?php echo base_url() ?>harga-detail/<?=$row['judul_seo']?>"><img height="100%" width="100%" src="<?php echo base_url() ?>assets/frontend/harga/<?=$row['foto_h']?>" alt=""></a>
                            <?php } ?>
                                <p style="height: 100px; font-size:12px;"><a href="<?php echo base_url() ?>harga-detail/<?=$row['judul_seo']?>"><?=$row['judul']?></a></p>


                          </div>
                        <?php } ?>
                        </div>
                        <div class="pagination"></div>
                      </div>
                    </div>
                  </div>
              </div>
          </div>
          <?php } ?>

        </div>


        <div class="row" >
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
