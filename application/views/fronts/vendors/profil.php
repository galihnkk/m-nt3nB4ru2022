<!DOCTYPE html>
<html lang="id">
<?php $kecamatan= $this->Crud_m->view_where('kecamatan', array('id'=> $post_v->kecamatan))->row(); ?>
<?php $kabupaten= $this->Crud_m->view_where('kabupaten', array('id'=> $post_v->kabupaten))->row(); ?>
<?php $company= $this->Crud_m->view_where('user_company', array('user_company_account'=> $post_v->user_company_account))->row(); ?>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?php echo $post_v->namabisnis?> | <?php echo $company->user_company_judul?> <?php echo $kecamatan->nama_kec?> - <?php echo $kabupaten->nama?></title>
    <meta name="title" content="<?php echo $post_v->namabisnis?> | <?php echo $company->user_company_judul?> <?php echo $kecamatan->nama_kec?> - <?php echo $kabupaten->nama?>">
    <meta name="site_url" content="<?php echo base_url()?>vendors/<?php echo $post_v->namabisnis_seo?>">
    <meta name="description" content="<?php echo $post_v->tentangbisnis?>">
    <meta name="keywords" content="<?=$identitas->meta_keyword ?>,<?php echo $post_v->katakunci?>">
    <meta NAME="ROBOTS" CONTENT="INDEX, FOLLOW">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="web_author" content="dhawyarkan.com">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta property="og:site_name" content="Mantenbaru">
    <meta property="og:title" content="<?php echo $post_v->namabisnis?> | <?php echo $company->user_company_judul?> <?php echo $kecamatan->nama_kec?> - <?php echo $kabupaten->nama?> ">
    <meta property="og:description" content="<?php echo $post_v->tentangbisnis?>">
    <meta property="og:url" content="<?php echo base_url()?>vendors/<?php echo $post_v->namabisnis_seo?>">
    <meta property="og:image" content="<?php echo base_url()?>assets/frontend/gambar_bisnis/<?php echo $post_v->gambar?>">
    <meta property="og:image:url" content="<?php echo base_url()?>assets/frontend/gambar_bisnis/<?php echo $post_v->gambar?>">
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
          <li><span class="color-dr-blue"></span><?php echo $post_v->namabisnis?></li>
  			</ul>
  		<div class="row">
  		<div class="col-xs-12 col-sm-4 col-md-4">
  				<div class="sidebar bg-white clearfix">
						<div class="sidebar-block">
										<div class="hotel-small style-2 clearfix">
										     <img class="img-responsive noborder hotel-img" <?php if(empty($post_v->gambar)) {echo "<img src='".base_url()."assets/frontend/noimages.jpg'>";}
                                                         			        else { echo " <img src='".base_url()."assets/frontend/gambar_bisnis/".$post_v->gambar."'> ";}
                                                         			        ?>

											<div class="tour-layer delay-1"></div>
											<div class="hotel-desc">
													<span class="color-dark-2-light"><a href="<?php echo base_url("vendors/$post_v->namabisnis_seo ") ?>"><strong><span><?php echo $post_v->namabisnis?></span></strong></a></span>
													<p><?php echo $company->user_company_judul?></p>
													<p><?php echo $post_v->views?> Dilihat</p>

											</div>
										</div>
											<div class="contact-line"><p><i class="fa fa-map-marker"></i><a href="#"> <?php echo $kecamatan->nama_kec?> - <?php echo $kabupaten->nama?></p></a></div>
											<div class="contact-line"><p><strong>Media Sosial</strong></p></div>
											<div class="contact-line">
												<a target="_blank" href="https://api.whatsapp.com/send?phone=+62<?php echo $post_v->nomerbisnis?>&text=Halo,%20Saya%20menemukan%20<?php echo $post_v->namabisnis?>%20di%20Mantenbaru.%20Bisa%20bantu%20saya?" class="button-s-2 bg-4 m-right"><i class="fa fa-whatsapp"> WA</i></a>
                        <?php if(empty($post_v->fb)) { ?>
                        <?php }else{ ?>
                          <a target="_blank" href="https://www.facebook.com/<?php echo $post_v->fb?>" class="button-s-2 bg-7 m-right"><i class="fa fa-facebook"> FB</i></a>
                        <?php } ?>
                        <?php if(empty($post_v->ig)) { ?>
                        <?php }else{ ?>
                          <a target="_blank" href="https://www.instagram.com/<?php echo $post_v->ig?>" class="button-s-2 bg-1 m-right"><i class="fa fa-instagram"> IG</i></a>
                        <?php } ?>
                        <?php if(empty($post_v->ytb)) { ?>
                        <?php }else{ ?>
                          <a target="_blank" href="https://www.youtube.com/channel/<?php echo $post_v->ytb?>" class="button-s-2 bg-5 m-right"><i class="fa fa-youtube"> YT</i></a>
                        <?php } ?>
                        
                      </div>
											<hr>
											<div class="contact-line">
												<center><a href="https://api.whatsapp.com/send?phone=+62<?php echo $post_v->nomerbisnis?>&text=Halo,%20Saya%20menemukan%20<?php echo $post_v->namabisnis?>%20di%20Mantenbaru.%20Saya%20mau%20tanya-tanya%20dulu." class="c-button small bg-dr-blue-2 hv-dr-blue-2-o"><i class="fa fa-comments-o"> Konsultasi Free</i></a></center>
											</div>
											<br>
											<div class="row contact-line">
												<center><a href="https://api.whatsapp.com/send?phone=+62<?php echo $post_v->nomerbisnis?>&text=Halo,%20Saya%20menemukan%20<?php echo $post_v->namabisnis?>%20di%20Mantenbaru.%20Saya%20mau%20tanya%20harga%20dulu." class="c-button small bg-dr-blue-2 hv-dr-blue-2-o"><i class="fa fa-question-circle"> Cek Detail Harga</i></a></center>
											</div>
											<hr>
											<div class="contact-line"><p><strong>Tentang <?php echo $post_v->namabisnis?></strong></p></div>
											<div class="contact-line"><p><?php echo $post_v->tentangbisnis?></p></div>
											<div class="contact-line"><p><strong>Alamat</strong></p></div>
											<div class="contact-line"><p><?php echo $post_v->alamat?></p></div>
											<hr>
											<div class="share clearfix">
											   <div class="contact-line"><p><strong>Bagikan :</strong></p></div>

                                              <p></p><li class="color-fb"><a href="http://www.facebook.com/sharer.php?u=<?php echo base_url("vendors/$post_v->namabisnis_seo ") ?>" onclick="window.open('http://www.facebook.com/sharer.php?u=<?php echo base_url("vendors/$post_v->namabisnis_seo ")?>','newwindow','width=400,height=350');  return false;" title="Facebook" target="_blank" ><i class="fa fa-facebook" ></i>Facebook</a></li>
                                              <li class="color-ig"><a href="whatsapp://send?text=Produk terbaik <?php echo $company->user_company_judul?> <?php echo $post_v->namabisnis ?> kini ada di Mantenbaru. Klik <?php echo base_url("vendors/$post_v->namabisnis_seo ") ?> untuk info lebih lanjut"><i class="fa fa-whatsapp"></i>Whatsapp</a></li>

                                            </div>
					    </div>
  				    </div>
  			    </div>
  		    <div class="col-xs-12 col-sm-8 col-md-8">
											<div class="col-md-12">
							 				<div class="simple-tab bg-white tab-3 color-3 tab-wrapper">
							 					<div class="tab-nav-wrapper">
							 						<div class="nav-tab  clearfix">
                            <div class="nav-tab-item">
							 							    <?php $jmla_harga = $this->Crud_m->view_where2('harga',$post_v->username)->num_rows(); ?>
							 								Harga(<?php echo $jmla_harga; ?>)
							 							</div>
							 							<div class="nav-tab-item">
							 							    <?php $jmla = $this->Crud_m->view_where2('projek',$post_v->username)->num_rows(); ?>
							 								Ringkasan (<?php echo $jmla; ?>)
							 							</div>

														<div class="nav-tab-item">
							 								Ulasan
							 							</div>

							 						</div>
							 					</div>
							 					<div class="tabs-content clearfix">
                          <div class="tab-info active clearfix">
                           <div class="tour-item-grid row">
                             <?php $no = 1; foreach ($post_harga as $post_h)
                                 {  ?>
                                    <?php if ($post_v->username == $post_h->username)
                                       { ?>
                                       <div class="col-mob-12 col-xs-6 col-sm-6 col-md-6 clear-xs-2">
                                         <div class="tour-item style-2">
                                           <div class="radius-top">

                                             <img class="img-responsive img-full" <?php if(empty($post_h->foto_h)) {echo "<img src='".base_url()."assets/frontend/noimage_paket.jpg'>";}
                                                                               else { echo " <img src='".base_url()."assets/frontend/harga/".$post_h->foto_h."'> ";}
                                                                               ?>
                                           </div>
                                           <div class="tour-desc bg-white">
                                             <a href="<?php echo base_url("harga-detail/$post_h->judul_seo ") ?>" class="c-button bg-green hv-green-o delay-2 small"><span>Mau Ini</span></a>
                                             <?php if(empty($post_h->harga_diskon)) { ?>
                                                                                     <div class="color-dark-2 link-green"><?php echo $post_h->harga_spec?> Rp<?php echo number_format($post_h->harga,0,',','.')?></div>
                                                                                     <?php }else if($a = $post_h->harga - $post_h->harga_diskon ){?>
                                                                                       <div class="color-dark-2 link-green"><?php echo $post_h->harga_spec?> <p font-size="1px"><s>Rp<?php echo number_format($post_h->harga,0,',','.')?></s></p> <strong>Rp<?php echo number_format($a,0,',','.')?></strong></div>


                                                                                 <?php }?>
                                             <div class="tour-text color-grey-3"><?php echo $post_h->judul?></div>
                                           </div>
                                         </div>
                                       </div>
                                 <?php } ?>
                               <?php } ?>
                           </div>
                          </div>
							 						<div class="tab-info">
							 						  <div class="tour-item-grid row">
                              <?php $no = 1; foreach ($post_projek as $post_h) {  ?>
											 				                <?php if ($post_v->username == $post_h->username){ ?>
                															<div class="col-mob-12 col-xs-6 col-sm-6 col-md-6 clear-xs-2">
                											 					<div class="tour-item style-2">
                											 						<div class="radius-top">

                											 						 	<img class="img-responsive img-full" <?php if(empty($post_h->foto1)) {echo "<img src='".base_url()."assets/frontend/noimage_paket.jpg'>";}
                                                                         			        else { echo " <img src='".base_url()."assets/frontend/projek/".$post_h->foto1."'> ";}
                                                                         			        ?>
                											 						</div>
                											 						<div class="tour-desc bg-white">
                											 							<a href="<?php echo base_url("projek-detail/$post_h->judul_seo ") ?>" class="c-button bg-green hv-green-o delay-2 small"><span>Lihat</span></a>
                											 							<div class="color-dark-2 link-green"><?php echo $post_h->judul?></div>
                											 					 	</div>
                											 					</div>
                											 				</div>
    											 				            <?php } ?>
    											 			   <?php } ?>
    											 	</div>
							 						</div>

							 						</div>
							 						<div class="tab-info">
														<div class="list-content clearfix">
									  						<div class="list-item-entry clearfix">
														        <div class="hotel-item style-9 bg-white">
														        	<div class="table-view">
															          	<div class="radius-top cell-view">
															          	 	<img src="img/tour_list/cruise_grid_1.jpg" alt="">
															          	</div>
															          	<div class="title hotel-middle cell-view">


															        </div>
														        </div>
									  						</div>


									  					</div>
							 						</div>

							 					</div>
							 				</div>
							 			 </div>
  				</div>

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
