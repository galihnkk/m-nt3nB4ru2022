<!DOCTYPE html>
<html lang="id">
<?php $user_bisnis= $this->Crud_m->view_where('user_bisnis', array('id_bisnis'=> $post_h->harga_id_bisnis))->row(); ?>
<?php $kecamatan= $this->Crud_m->view_where('kecamatan', array('id'=> $user_bisnis->kecamatan))->row(); ?>
<?php $kabupaten= $this->Crud_m->view_where('kabupaten', array('id'=> $user_bisnis->kabupaten))->row(); ?>
<?php $company= $this->Crud_m->view_where('user_company', array('user_company_account'=> $user_bisnis->user_company_account))->row(); ?>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?php echo $user_bisnis->namabisnis?> | <?php echo $post_h->judul?></title>
    <meta name="title" content="<?php echo $user_bisnis->namabisnis?> | <?php echo $post_h->judul?>">
    <meta name="site_url" content="<?php echo base_url()?>harga-detail/<?php echo $post_h->judul_seo?>">
    <meta name="description" content="<?php echo $post_h->meta_deskripsi?>">
    <meta name="keywords" content="<?=$identitas->meta_keyword ?>,<?php echo $post_h->keyword?>">
    <meta NAME="ROBOTS" CONTENT="INDEX, FOLLOW">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="web_author" content="dhawyarkan">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta property="og:site_name" content="Mantenbaru">
    <meta property="og:title" content="<?php echo $user_bisnis->namabisnis?> | <?php echo $post_h->judul?>">
    <meta property="og:description" content="<?php echo $post_h->meta_deskripsi?>">
    <meta property="og:url" content="<?php echo base_url()?>harga-detail/<?php echo $post_h->judul_seo?>">
    <meta property="og:image" content="<?php echo base_url()?>assets/frontend/harga/<?php echo $post_h->foto_h?>">
    <meta property="og:image:url" content="<?php echo base_url()?>assets/frontend/harga/<?php echo $post_h->foto_h?>">
    <meta property="og:type" content="article">
    <link rel="shortcut icon" href="<?php echo base_url()?>assets/frontend/campur/<?=$identitas->favicon ?>" type="image/x-icon">

  <?php $this->load->view('fronts/css')?>
  </head>
  <body data-color="theme-1">

    <?php $this->load->view('fronts/loader')?>
    <?php $this->load->view('fronts/header')?>
    <br><br><br><br>

  <div class="list-wrapper ">
  		<div class="container">
  			<ul class="list-breadcrumb clearfix">
          <li><a class="color-grey link-dr-blue" href="<?php echo base_url()?>">home</a> /</li>
          <li><a class="color-grey link-dr-blue" href="<?php echo base_url()?>vendors/kategori/<?php echo $company->user_company_judul_seo?>"><?php echo $company->user_company_judul?></a> /</li>
  				<li><a class="color-grey link-dr-blue" href="<?php echo base_url()?>vendors/<?php echo $user_bisnis->namabisnis_seo?>"><?php echo $user_bisnis->namabisnis?></a> /</li>
          <li><?php echo $post_h->judul?></li>
  			</ul>
  		<div class="row">
  		<div class="col-xs-12 col-sm-4 col-md-4">
  				<div class="sidebar bg-white clearfix">
						<div class="sidebar-block">
										<div class="hotel-small style-2 clearfix">
										     <img class="img-responsive noborder hotel-img" <?php if(empty($user_bisnis->gambar)) {echo "<img src='".base_url()."assets/frontend/noimages.jpg'>";}
                                                         			        else { echo " <img src='".base_url()."assets/frontend/gambar_bisnis/".$user_bisnis->gambar."'> ";}
                                                         			        ?>

											<div class="tour-layer delay-1"></div>
											<div class="hotel-desc">
                        <span class="color-dark-2-light"><a href="<?php echo base_url("vendors/$user_bisnis->namabisnis_seo ") ?>"><strong><span><?php echo $user_bisnis->namabisnis?></span></strong></a></span>
                        <p><?php echo $company->user_company_judul?></p>
                        <p><?php echo $user_bisnis->views?> Dilihat</p>

											</div>
										</div>
											<div class="contact-line"><p><i class="fa fa-map-marker"></i><a href="#"> <?php echo $kecamatan->nama_kec?> - <?php echo $kabupaten->nama?></p></a></div>
											<div class="contact-line"><p><strong>Media Sosial</strong></p></div>
											<div class="contact-line">
												<a target="_blank" href="https://api.whatsapp.com/send?phone=+62<?php echo $user_bisnis->nomerbisnis?>&text=Halo,%20Saya%20menemukan%20<?php echo $user_bisnis->namabisnis?>%20di%20Mantenbaru.%20Bisa%20bantu%20saya?" class="button-s-2 bg-4 m-right"><i class="fa fa-whatsapp"> WA</i></a>
                        <?php if(empty($user_bisnis->fb)) { ?>
                        <?php }else{ ?>
                          <a target="_blank" href="https://www.facebook.com/<?php echo $user_bisnis->fb?>" class="button-s-2 bg-7 m-right"><i class="fa fa-facebook"> FB</i></a>
                        <?php } ?>
                        <?php if(empty($user_bisnis->ig)) { ?>
                        <?php }else{ ?>
                          <a target="_blank" href="https://www.instagram.com/<?php echo $user_bisnis->ig?>" class="button-s-2 bg-1 m-right"><i class="fa fa-instagram"> IG</i></a>
                        <?php } ?>
                        <?php if(empty($user_bisnis->ytb)) { ?>
                        <?php }else{ ?>
                          <a target="_blank" href="https://www.youtube.com/channel/<?php echo $user_bisnis->ytb?>" class="button-s-2 bg-5 m-right"><i class="fa fa-youtube"> YT</i></a>
                        <?php } ?>

											</div>
											<hr>
											<div class="contact-line">
												<center><a href="https://api.whatsapp.com/send?phone=+62<?php echo $user_bisnis->nomerbisnis?>&text=Halo,%20Saya%20menemukan%20<?php echo $user_bisnis->namabisnis?>%20di%20Mantenbaru.%20Saya%20mau%20tanya-tanya%20dulu." class="c-button small bg-dr-blue-2 hv-dr-blue-2-o"><i class="fa fa-comments-o"> Kirim Penawaran</i></a></center>
											</div>
											<br>
											<div class="row contact-line">
												<center><a href="https://api.whatsapp.com/send?phone=+62<?php echo $user_bisnis->nomerbisnis?>&text=Halo,%20Saya%20menemukan%20<?php echo $user_bisnis->namabisnis?>%20di%20Mantenbaru.%20Saya%20mau%20tanya%20harga%20dulu." class="c-button small bg-dr-blue-2 hv-dr-blue-2-o"><i class="fa fa-question-circle"> Cek Detail Harga</i></a></center>
											</div>
											<hr>
											<div class="contact-line"><p><strong>Tentang <?php echo $user_bisnis->namabisnis?></strong></p></div>
											<div class="contact-line"><p><?php echo $user_bisnis->tentangbisnis?></p></div>
											<div class="contact-line"><p><strong>Alamat</strong></p></div>
											<div class="contact-line"><p><?php echo $user_bisnis->alamat?></p></div>
											<hr>
											<div class="share clearfix">
											   <div class="contact-line"><p><strong>Bagikan :</strong></p></div>
                                              <p></p><li class="color-fb"><a href="http://www.facebook.com/sharer.php?u=<?php echo base_url("harga-detail/$post_h->judul_seo ") ?>" onclick="window.open('http://www.facebook.com/sharer.php?u=<?php echo base_url("harga-detail/$post_h->judul_seo ")?>','newwindow','width=400,height=350');  return false;" title="Facebook" target="_blank" ><i class="fa fa-facebook" ></i>Facebook</a></li>
                                              <?php
                                              if(empty($post_h->harga_diskon)) { ?>
                                                <li class="color-ig">
                                                  <a href="whatsapp://send?text=Stop keraguan Kamu ! Cari tau <?php echo $user_bisnis->namabisnis ?> yang ada di Mantenbaru.com. Ada <?php echo $post_h->judul ?> dengan harga <?php echo number_format($post_h->harga,0,',','.') ?>  hanya dengan mengklik <?php echo base_url("harga-detail/$post_h->judul_seo ") ?> keraguan kamu bisa terselesaikan. Pastikan tanggal acara kamu tidak keduluan yang lain.">
                                                    <i class="fa fa-whatsapp"></i>Whatsapp
                                                  </a>
                                                </li>
                                            <?php }else if($a = $post_h->harga - $post_h->harga_diskon ){?>
                                              <li class="color-ig">
                                                <a href="whatsapp://send?text=Stop keraguan Kamu ! Cari tau <?php echo $user_bisnis->namabisnis ?> yang ada di Mantenbaru.com. Ada <?php echo $post_h->judul ?> dengan harga ~Rp<?php echo number_format($post_h->harga,0,',','.') ?>~ Rp<?php echo number_format($a,0,',','.')?> hanya dengan mengklik <?php echo base_url("harga-detail/$post_h->judul_seo ") ?> keraguan kamu bisa terselesaikan. Dapatkan harga promo dan pastikan tanggal acara kamu tidak keduluan yang lain.">
                                                  <i class="fa fa-whatsapp"></i>Whatsapp
                                                </a>
                                              </li>
                                              <?php }?>

                                            </div>
					    </div>
  				    </div>
  			    </div>
  		    <div class="col-xs-12 col-sm-8 col-md-8">
											<div class="col-md-12">
							 				<div class="simple-tab bg-white tab-3 color-3 tab-wrapper">

							 					<div class="tabs-content clearfix">
							 						<div class="tab-info active clearfix">
															<div class="col-xs-12 col-sm-12 col-md-12 clearfix">
																<div class="row">
												    			 <div class="blog-list">
												    			    <div class="blog-list-entry">
                                                						<div class="blog-list-top">
                                                				                    		 <img class="img-responsive img-full"
                                                				                    		 <?php if(empty($post_h->foto_h)) {
                                                				                    		  echo "<img src='".base_url()."assets/frontend/noimage_paket.jpg'>";

                                                				                    		 }else {
                                                				                    		  echo " <img src='".base_url('./assets/frontend/harga/'.$post_h->foto_h)."'> ";}
                                                                         			    ?>
                                                							</div>
                                                						</div>
                                                						<h4 class="blog-list-title"><?php echo $post_h->judul?></h4>

                                                						<div class="tour-info-line clearfix">
                                                							<div class="tour-info fl">
                                                					  	 		<?php echo $post_h->views?> Dilihat
                                                					  	 	</div>
                                                						</div>
                                                						<div class="blog-list-text "><?php echo $post_h->deskripsi?></div>
                                                						<?php if(empty($post_h->harga_diskon)) { ?>
                                                                            <?php echo $post_h->harga_spec?><h5 class="blog-list-title"> Rp<?php echo number_format($post_h->harga,0,',','.')?></h5>
                                                                            <?php }else if($a = $post_h->harga - $post_h->harga_diskon ){?>
                                                                              <?php echo $post_h->harga_spec?> <p font-size="1px"><s>Rp<?php echo number_format($post_h->harga,0,',','.')?></s></p> <h5 class="blog-list-title"> Rp<?php echo number_format($a,0,',','.')?></h5>


                                                                        <?php }?>

                                                						<a href="https://api.whatsapp.com/send?phone=62<?php echo $user_bisnis->nomerbisnis?>&text=Halo,%20<?php echo $user_bisnis->namabisnis?>%20di%20Mantenbaru.com.%20Saya%20ingin%20memilih%20<?php echo $post_h->judul?>.%20^_^" class="c-button small bg-dr-blue-2 hv-dr-blue-2-o "><span>Pilih Yang Ini !</span></a><span> </span>
                                                            <a href="<?php echo base_url()?>vendors/<?php echo $user_bisnis->namabisnis_seo?>" class=" c-button small bg-grey-2 hv-dr-blue-2-o "><span>Kembali</span></a>
                                                					</div>
												    			 </div>
												    			 <div class="share clearfix">
												    			     <br><br>
                    											   <div class="contact-line"><p><strong>Bagikan :</strong></p></div>
                                                                  <p></p><li class="color-fb"><a href="http://www.facebook.com/sharer.php?u=<?php echo base_url("harga-detail/$post_h->judul_seo ") ?>" onclick="window.open('http://www.facebook.com/sharer.php?u=<?php echo base_url("harga-detail/$post_h->judul_seo ")?>','newwindow','width=400,height=350');  return false;" title="Facebook" target="_blank" ><i class="fa fa-facebook" ></i>Facebook</a></li>
                                                                  <?php
                                                                  if(empty($post_h->harga_diskon)) { ?>
                                                                    <li class="color-ig">
                                                                      <a href="whatsapp://send?text=Stop keraguan Kamu ! Cari tau <?php echo $user_bisnis->namabisnis ?> yang ada di Mantenbaru.com. Ada <?php echo $post_h->judul ?> dengan harga <?php echo number_format($post_h->harga,0,',','.') ?>  hanya dengan mengklik <?php echo base_url("harga-detail/$post_h->judul_seo ") ?> keraguan kamu bisa terselesaikan. Pastikan tanggal acara kamu tidak keduluan yang lain.">
                                                                        <i class="fa fa-whatsapp"></i>Whatsapp
                                                                      </a>
                                                                    </li>
                                                                <?php }else if($a = $post_h->harga - $post_h->harga_diskon ){?>
                                                                  <li class="color-ig">
                                                                    <a href="whatsapp://send?text=Stop keraguan Kamu ! Cari tau <?php echo $user_bisnis->namabisnis ?> yang ada di Mantenbaru.com. Ada <?php echo $post_h->judul ?> dengan harga ~Rp<?php echo number_format($post_h->harga,0,',','.') ?>~ Rp<?php echo number_format($a,0,',','.')?> hanya dengan mengklik <?php echo base_url("harga-detail/$post_h->judul_seo ") ?> keraguan kamu bisa terselesaikan. Dapatkan harga promo dan pastikan tanggal acara kamu tidak keduluan yang lain.">
                                                                      <i class="fa fa-whatsapp"></i>Whatsapp
                                                                    </a>
                                                                  </li>
                                                                  <?php }?>
                                </div>
								 							</div>
							 						</div>

							 			 </div>
  				</div>

  			</div>

        <div class="col-md-12">
            <br>
            <span><strong>Pilihan Produk Lainnya</strong></span>
          <div class="row">
    			   <div class="arrows">
    				<div class="swiper-container hotel-slider" data-autoplay="5000" data-loop="1" data-speed="1000" data-center="0" data-slides-per-view="responsive" data-mob-slides="2" data-xs-slides="2" data-sm-slides="2" data-md-slides="2" data-lg-slides="2" data-add-slides="2">
						  <div class="swiper-wrapper">

                <?php
                $user_harga= $this->Crud_m->view_where_ordering('harga', array('harga_id_bisnis'=>$user_bisnis->id_bisnis),'id_harga','DESC');
                foreach ($user_harga as $post) {

                ?>
                <div class="swiper-slide">
                    <div class="hotel-item">
                       <div class="radius-top">
                         <a href="<?php echo base_url() ?>harga-detail/<?php echo $post['judul_seo'] ?>" >
                         <img <?php if(empty($post['foto_h'])) {echo "<img src='".base_url()."assets/frontend/campur/noimage_paket.jpg'>";}
                                                 else { echo " <img src='".base_url()."assets/frontend/harga/".$post['foto_h']."'> ";}
                                                 ?>
                          </a>

                       </div>
                       <div class="title">
                          <span class="f-14 color-dark-2">
                             <span font-size="20px"> <strong><?php echo $post['judul'] ?></strong></span>
                             <br>
                            <?php
                            if(empty($post['harga_diskon'])) { ?>
                            Rp<?php echo number_format($post['harga'],0,',','.')?>
                          <?php }else if($a = $post['harga'] - $post['harga_diskon'] ){?>
                              <span font-size="20px" style="color:grey"><del>Rp<?php echo number_format($post['harga'],0,',','.')?></del></span>
                                Rp<?php echo number_format($a,0,',','.')?>
                            <?php }?>
                          </span>
                          <br>

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
        <br>
    		</div>

				<br><br>
  		</div>
  	</div>
	    </div>
	</div>


  <?php $this->load->view('fronts/footer')?>
  <?php $this->load->view('fronts/js')?>
  </body>
</html>
