<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?=$identitas->nama_website ?> | Mantenbaru Wedding Organizer</title>
    <meta name="title" content="Vendor Pernikahan Terlengkap | Mantenbaru Wedding Organizer">
    <meta name="site_url" content="<?php echo base_url()?>">
    <meta name="description" content="<?=$identitas->meta_deskripsi ?>">
    <meta name="keywords" content="<?=$identitas->meta_keyword ?>">
    <meta NAME="ROBOTS" CONTENT="INDEX, FOLLOW">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="web_author" content="masdhaw">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta property="og:site_name" content="<?=$identitas->nama_website ?>">
    <meta property="og:title" content="Vendor Pernikahan Terlengkap | Mantenbaru Wedding Organizer">
    <meta property="og:description" content="<?=$identitas->meta_deskripsi ?>">
    <meta property="og:url" content="<?php echo base_url()?>">
    <meta property="og:image" content="<?php echo base_url()?>assets/frontend/campur/<?=$identitas->logo ?>">
    <meta property="og:image:url" content="<?php echo base_url()?>assets/frontend/campur/<?=$identitas->logo ?>">
    <meta property="og:type" content="article">
    <link rel="shortcut icon" href="<?php echo base_url()?>assets/frontend/campur/<?=$identitas->favicon ?>" type="image/x-icon">    
    <?php $this->load->view('fronts/css')?>
    <?php $this->load->view('fronts/analytics')?>
  </head>
  <body data-color="theme-1">
    <?php $this->load->view('fronts/loader')?>
    <?php $this->load->view('fronts/header')?>
    <div class="inner-banner">

    </div>

    <div class="main-wraper">
      <div class="container">
        <br>
        <div class="row">
          <div class="top-baner arrows">
        <div class="swiper-container offers-slider" data-autoplay="5000" data-loop="1" data-speed="500" data-slides-per-view="responsive" data-mob-slides="1" data-xs-slides="2" data-sm-slides="2" data-md-slides="3" data-lg-slides="3" data-add-slides="3">
          <div class="swiper-wrapper">
              <?php $company = $this->Crud_m->view_where_ordering_limits('user_company',array('user_company_status'=>'1'),'user_company_account','ASC','1','20'); ?>
              <?php $no = 1; foreach ($company as $post) {  ?>
                      <div class="swiper-slide" >
                         <div class="offers-block radius-mask">
                         <div class="clip">
                          <div class="bg bg-bg-chrome act" style="background-image:url(<?php echo base_url('assets/frontend/company/')?><?php echo $post->user_company_logo?>)">
                          </div>
                         </div>
                         <div class="tour-layer delay-1"></div>
                         <div class="vertical-top">
                          <h3><?php echo $post->user_company_judul?></h3>
                         </div>
                         <div class="vertical-bottom">
                           <a href="<?php echo base_url()?>vendors/kategori/<?php echo $post->user_company_judul_seo?>" class="c-button bg-aqua hv-aqua-o b-40"><span>Pilih <?php echo $post->user_company_judul?></span></a>
                         </div>
                         </div>
                      </div>
              <?php } ?>
          </div>
          <div class="pagination  poin-style-1 pagination-hidden"></div>
        </div>
                <div class="swiper-arrow-left offers-arrow"><span class="fa fa-angle-left"></span></div>
          <div class="swiper-arrow-right offers-arrow"><span class="fa fa-angle-right"></span></div>
            </div>
        </div>
    </div>
    </div>

    <div class="main-wraper padd-90">
        <div class="container">
    		<div class="row">
    			<div class="col-md-12">
    				<div class="second-title">
    					<h2>Persiapkan Sekarang</h2>
    					</div>
    			</div>
    		</div>
    		<div class="row">
    			   <div class="arrows">
    				<div class="swiper-container hotel-slider" data-autoplay="5000" data-loop="1" data-speed="1000" data-center="0" data-slides-per-view="responsive" data-mob-slides="1" data-xs-slides="2" data-sm-slides="2" data-md-slides="3" data-lg-slides="4" data-add-slides="4">
						  <div class="swiper-wrapper">
                <?php
                      foreach ($post_news as $post) {

                ?>
                <div class="swiper-slide">
                    <div class="hotel-item">
                       <div class="radius-top">
                         <a href="<?php echo base_url("harga-detail/$post->judul_seo") ?>">
                         <img <?php if(empty($post->foto_h)) {echo "<img src='".base_url()."assets/frontend/campur/noimage_paket.jpg'>";}
                                                 else { echo " <img src='".base_url()."assets/frontend/harga/".$post->foto_h."'> ";}
                                                 ?>
                          </a>

                        <?php
                        $b=$post->harga_diskon;
                        $c=$post->harga;
                        if(empty($post->harga_diskon)) { ?>

                        <?php }else if($a = ($b/$c)*100 ){?>
                          <div class="price price-s-1">
                            <?php echo number_format($a,0,',','.')?>%
                            </div>
                        <?php }?>
                       </div>
                       <div class="title clearfix">
                         <span font-size="40px"><strong><?php echo $post->namabisnis?></strong></span>
                               <br>
                          <span class="f-14 color-dark-2">
                            <?php
                            if(empty($post->harga_diskon)) { ?>
                            Rp<?php echo number_format($post->harga,0,',','.')?>
                            <?php }else if($a = $post->harga - $post->harga_diskon ){?>
                              <span font-size="20px" style="color:grey"><del>Rp<?php echo number_format($post->harga,0,',','.')?></del></span>
                                Rp<?php echo number_format($a,0,',','.')?>
                            <?php }?>
                          </span>
                          <br>
                        <span class="f-14 color-dark-2"><?php echo $post->user_company_judul?> <?php echo $post->nama?></span>
                       </div>
                    </div>
                  </div>
                <?php } ?>
						  </div>
						<div class="pagination"></div>
							<div class="swiper-arrow-left arrows-travel"><span class="fa fa-angle-left"></span></div>
							<div class="swiper-arrow-right arrows-travel"><span class="fa fa-angle-right"></span></div>
					</div>
				  </div>
    		</div>
		</div>
	  </div>

	</div>

  <?php $this->load->view('fronts/footer')?>
  <?php $this->load->view('fronts/js')?>
  </body>
</html>
