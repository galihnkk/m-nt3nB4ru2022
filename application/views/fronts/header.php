<header class="bg-white color-4 header-style-2">
  <div class="top-header-bar">
     <div class="container">
       <div class="row">
        <div class="col-md-12">
          <div class="header-bar">
            <a href="<?php echo base_url()?>" class="logo">
                <img height="100%" width ="213px" src="<?php echo base_url()?>assets/frontend/campur/<?=$identitas->logo ?>" >
            </a>
            <div class="drop-wrap-wrap">
                <div class="drop-wrap">
                  <div class="drop">
                     <a style="color:#ff0066;" href="<?php echo base_url()?>login"><strong>MASUK</strong></a>
                  </div>
                </div>
                <div class="drop-wrap">
                  <div class="drop">
                     <a style="color:#ff0066;" href="<?php echo base_url()?>daftar"><strong>DAFTAR</strong></a>
                  </div>
                </div>
            </div>
                <form action="#" class="form-block">
                  <div class="input-style-1 color-3">
                    <img src="img/search_icon_small.png" alt="">
                    <input placeholder="Search.." type="text">
                  </div>
                </form>
          </div>
        </div>
       </div>
     </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="nav">
          <div class="nav-menu-icon">
            <a href="#"><i></i></a>
          </div>
          <nav class="menu">
              <ul>
                <li class="type-1">
                  <a style="color:#ff0066;" href="<?php echo base_url()?>">Home</a>
                </li>
                <li class="type-1"><a style="color:#ff0066;" href="<?php echo base_url()?>vendors">Vendor<span class="fa fa-angle-down"></span></a>
                  <?php $company = $this->Crud_m->view_where_ordering_limits('user_company',array('user_company_status'=>'1'),'user_company_account','ASC','1','20'); ?>
                  <ul class="dropmenu">
                    <?php $no = 1; foreach ($company as $post_k) {  ?>
                            <li><a href="<?php echo base_url()?>vendors/kategori/<?php echo $post_k->user_company_judul_seo?>"><?php echo $post_k->user_company_judul?></a></li>
                            <?php } ?>
                  </ul>
                </li>
              </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
</header>
