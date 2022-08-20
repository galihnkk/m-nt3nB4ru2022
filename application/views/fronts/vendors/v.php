<!DOCTYPE html>
<html lang="id">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <?php $this->load->view('fronts/utama/meta')?>
    <?php $this->load->view('fronts/utama/css')?>
  </head>
  <body data-color="theme-1">
    <?php $this->load->view('fronts/utama/loading')?>
    <?php $this->load->view('fronts/utama/header')?>
    <div class="inner-banner">
      <img class="center-image" src="<?php echo base_url()?>asset/frontend/aspanel/img/bghead.jpg" alt="">
    </div>

    <div class="list-wrapper bg-grey-2">
      <div class="container">
        <div class="row">

          <div class="col-xs-12 col-sm-8 col-md-9">
            <div class="grid-content clearfix">
              <?php
                    foreach ($post_bisnis as $posts) {

              ?>
              <div class="list-item-entry">
                <a href="<?php echo base_url("vendors/$posts->namabisnis_seo ") ?>">
                  <div class="hotel-item style-3 bg-white">
                    <div class="table-view">
                        <div class="radius-top cell-view">
                          <img <?php if(empty($posts->gambar)) {echo "<img  src='".base_url()."asset/frontend/noimages.jpg'>";}
                                                  else { echo " <img  src='".base_url()."assets/frontend/gambar_bisnis/".$posts->gambar."'> ";}
                                                  ?>
                        </div>
                        <div class="title hotel-middle clearfix cell-view">

                            <p><?php echo $posts->nama_kategori?> <?php echo $posts->nama?>
                              <br>
                              <?php echo $posts->harga_spec?> Rp. <?php echo number_format($posts->harga,0,',','.')?>
                            </p>
                            <div class="judul_content">
                              <h4><strong><?php echo $posts->namabisnis?></strong></h4>
                              </div>

                        </div>
                        <br>
                      </div>
                  </div>
                  </a>
              </div>
              <?php } ?>

            </div>

            <div class="row" >
								 <div class="c_pagination clearfix padd-120">
                        <?php  echo $this->pagination->create_links();  ?>
                 </div>
						</div>
          </div>
          <div class="col-xs-12 col-sm-4 col-md-3">
            <div class="sidebar bg-white clearfix">
            <div class="sidebar-block">
              <h4 class="sidebar-title color-dark-2">categories</h4>
              <ul class="sidebar-category color-1">
                <li class="active">
                  <?php $jmla = $this->model_app->view('users_bisnis')->num_rows(); ?>
                  <a class="cat-drop" href="#">Vendor<span class="fr">(<?php echo $jmla; ?>)</span></a>
                  <ul>
                     <?php $no = 1; foreach ($post_kategori as $post_k) {  ?>
                    <li><a href="<?php echo base_url()?>vendors/kategori/<?php echo $post_k->kategori_seo?>"><?php echo $post_k->nama_kategori?></a></li>
                    <?php } ?>
                  </ul>
                </li>
                <li><?php $jmlaa = $this->model_app->view('blogs_tbl')->num_rows(); ?>
                <a class="cat-drop" href="#">Artikel<span class="fr">(<?php echo $jmlaa; ?>)</span></a>
                  <ul>
                    <li><a href="<?php echo base_url()?>artikel/kategori/tips-hubungan">Tips Hubungan</a></li>
                    <li><a href="<?php echo base_url()?>artikel/kategori/inspirasi-pernikahan">Inspirasi Pernikahan</a></li>
                  </ul>
                </li>
              </ul>
            </div>


            </div>
          </div>
        </div>
      </div>
    </div>

  <?php $this->load->view('fronts/utama/footer')?>
  <?php $this->load->view('fronts/utama/js')?>
  </body>
</html>
