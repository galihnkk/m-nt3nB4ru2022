<!-- Navbar -->
<?php $users= $this->Crud_m->view_where('user', array('id_user'=> $this->session->id_user))->row_array(); ?>
<?php $users_bisnis= $this->Crud_m->view_where('user_bisnis', array('username'=> $users['username']))->row_array(); ?>
<?php $users_level= $this->Crud_m->view_where('user_level', array('user_level_id'=>$users['level']))->row_array(); ?>
<?php $users_detail= $this->Crud_m->view_where('user_detail', array('id_user'=> $this->session->id_user))->row_array(); ?>
<?php $users_company= $this->Crud_m->view_where('user_company', array('user_company_id'=>$users_detail['user_detail_company']))->row_array(); ?>

<nav class="main-header navbar navbar-expand" style="background-color: <?php echo $users_company['user_company_warna'];?>; ">
  <ul class="navbar-nav">
    <div class="d-block d-sm-none">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars" style="color:#666666;"></i></a>
    </li>
    </div>
  </ul>
  <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
      <a class="nav-link" href="<?php echo base_url()?>vendors/<?php echo $users_bisnis['namabisnis_seo'];?>" target="_blank">
        <span>Live Preview</span>
      </a>
    </li>
    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown user-menu" >
      <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
        <?php if(empty($users['user_gambar'])) { ?>
          <img src="<?php echo base_url()?>assets/backend/images/logo-default.png" class="user-image img-circle elevation-2" alt="User Image">
        <?php }else { ?>
          <img src="<?php echo base_url()?>assets/frontend/gambar_bisnis/<?php echo $users['user_gambar'];?>" class="user-image img-circle elevation-2" alt="User Image">
        <?php }?>
        <span class="d-none d-md-inline" style="color:#666666;"><?php echo $users['username'];?></span>
      </a>
      <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right" >
        <!-- User image -->
        <li class="user-header" style="background-color: <?php echo $users_company['user_company_warna'];?>; " >
          <?php if(empty($users['user_gambar'])) { ?>
            <img src="<?php echo base_url()?>assets/backend/images/logo-default.png" class="img-circle elevation-2" alt="User Image">
          <?php }else { ?>
            <img src="<?php echo base_url()?>assets/frontend/gambar_bisnis/<?php echo $users['user_gambar'];?>" class="img-circle elevation-2" alt="User Image">
          <?php }?>

          <p style="color:#666666;">
            <?php echo "$users[nama]";?>
            <small><?php echo $users_level['user_level_nama'];?></small>
          </p>
        </li>
        <!-- Menu Body -->

        <!-- Menu Footer-->
        <li class="user-footer">
          <a href="<?php echo base_url(); ?>pengaturan/informasi" class="btn btn-default btn-flat">Profil</a>
          <a href="<?php echo base_url(); ?>aspanel/logout" class="btn btn-default btn-flat float-right">Keluar</a>
        </li>
      </ul>
    </li>

  </ul>
</nav>
<aside class="main-sidebar sidebar-light-primary elevation-4" >
  <!-- Brand Logo -->
    <a href="<?php echo base_url('aspanel/home')?>" class="brand-link" style="background-color: #FFFFFF; ">
      <img src="<?php echo base_url()?>assets/backend/images/logo_mantenbaru_merah-02.png" height="100%" width="100%">
    </a>
<div class="sidebar">
  <!-- Sidebar user panel (optional) -->
  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


<!-- Baris Buka Menu untuk Developer -->
    <?php  if($this->session->level=='1'){ ?>
      <li class="nav-item">
        <a href="<?php echo base_url(); ?>aspanel/home" class="nav-link" >
          <i class="nav-icon fas fa-th"></i>
          <p>
            Dashboard
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="<?php echo base_url(); ?>aspanel/identitaswebsite" class="nav-link" >
          <i class="nav-icon fas fa-cogs"></i>
          <p>
            Data Website
          </p>
        </a>
      </li>
        <?php } ?>
<!-- Baris Tutup Menu untuk Developer -->

<!-- Baris Buka Menu untuk Developer,Administrator,Manager -->
        <?php  if($this->session->level=='1' OR $this->session->level=='2'  OR $this->session->level=='4'){ ?>
          <?php $users_company_account= $this->Crud_m->view_where_like_ordering1('user_company','user_company_account',$users_company['user_company_account'],'user_company_id','ASC'); ?>
          <?php if($users_company['user_company_kategori'] == '1') { ?>
            <li class="nav-item ">
                <a href="#" class="nav-link ">
                  <i class="nav-icon far fas fa-fw fa-users"></i>
                  <p>
                    Partner
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
            <?php }elseif($users_company['user_company_kategori'] == '2'){ ?>
            <?php  if($this->session->level=='1' OR $this->session->level=='2'){ ?>
                <li class="nav-item ">
                        <a href="#" class="nav-link ">
                          <i class="nav-icon far fas fa-fw fa-users"></i>
                          <p>
                            Unit Bisnis
                            <i class="fas fa-angle-left right"></i>
                          </p>
                        </a>
                    <?php }else{ ?>
                    <?php } ?>
                    <ul class="nav nav-treeview">
                      <?php  if($this->session->level=='1' OR $this->session->level=='2' OR $this->session->level=='4'){ ?>
                        <?php if($users_company['user_company_kategori'] == '2') { ?>
                        <?php foreach ($users_company_account as $row){
                          ?>
                        <li class="nav-item">
                          <a href="<?php echo base_url(); ?>aspanel/subholding/<?=$row['user_company_account']?>" class="nav-link ">
                            <p><?=$row['user_company_judul']?></p>
                          </a>
                        </li>
                        <?php } ?>
                      <?php }else{ ?>
                        <?php $users_company_account2= $this->Crud_m->view_where_ordering('user_company',array('user_company_kategori'=>'2'),'user_company_id','ASC'); ?>
                        <?php foreach ($users_company_account2 as $row){
                          ?>
                        <li class="nav-item">
                          <a href="<?php echo base_url(); ?>aspanel/subholding/<?=$row['user_company_account']?>" class="nav-link ">
                            <p><?=$row['user_company_judul']?></p>
                          </a>
                        </li>
                        <?php } ?>
                      <?php } ?>
                      <?php } ?>
                    </ul>
                </li>
            <?php } ?>

            <?php if($users_company['user_company_kategori'] == '2' OR $users_company['user_company_kategori'] == '1' ) { ?>
            <?php  if($this->session->level=='1' OR $this->session->level=='2'){ ?>
              <li class="nav-item ">
                  <a href="#" class="nav-link ">
                    <i class="nav-icon far fas fa-fw fa-users"></i>
                    <p>
                      Financial Statement
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <?php  if($this->session->level=='1' OR $this->session->level=='2'){ ?>
                    <li class="nav-item">
                        <a href="<?php echo base_url(); ?>aspanel/home" class="nav-link ">
                          <i class="fas fa-bookmark nav-icon"></i>
                          <p>General Ledger</p>
                        </a>
                      </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url(); ?>aspanel/home" class="nav-link ">
                          <i class="fas fa-bookmark nav-icon"></i>
                          <p>Profit Lost</p>
                        </a>
                      </li>
                    <li class="nav-item">
                      <a href="<?php echo base_url(); ?>aspanel/home" class="nav-link ">
                        <i class="fas fa-bookmark nav-icon"></i>
                        <p>Balance Sheet</p>
                      </a>
                    </li>
                    <?php } ?>

                  </ul>
                </li>
              <li class="nav-item ">

                  <a href="#" class="nav-link ">
                    <i class="nav-icon far fas fa-fw fa-users"></i>
                    <p>
                      Pengaturan
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <?php } ?>
                  <ul class="nav nav-treeview">
                    <?php  if($this->session->level=='1'){ ?>
                      <li class="nav-item">
                        <a href="<?php echo base_url(); ?>aspanel/logactivity" class="nav-link ">
                          <i class="far fa-circle nav-icon"></i>
                          <p>Log Activity</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="<?php echo base_url(); ?>aspanel/company" class="nav-link ">
                          <i class="fas fa-cog nav-icon"></i>
                          <p>Perusahaan</p>
                        </a>
                      </li>
                    <li class="nav-item">
                      <a href="<?php echo base_url(); ?>aspanel/divisi" class="nav-link ">
                        <i class="fas fa-cog nav-icon"></i>
                        <p>Divisi / Posisi</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?php echo base_url(); ?>aspanel/data_karyawan" class="nav-link ">
                        <i class="fas fa-cog nav-icon"></i>
                        <p>Data Pengguna</p>
                      </a>
                    </li>
                    <?php } ?>
                    <?php  if($this->session->level=='2'){ ?>
                      <li class="nav-item">
                        <a href="<?php echo base_url(); ?>aspanel/company" class="nav-link ">
                          <i class="fas fa-cog nav-icon"></i>
                          <p>Perusahaan</p>
                        </a>
                      </li>
                    <li class="nav-item">
                      <a href="<?php echo base_url(); ?>aspanel/data_karyawan" class="nav-link ">
                        <i class="fas fa-cog nav-icon"></i>
                        <p>Data Pengguna</p>
                      </a>
                    </li>
                    <?php } ?>
                  </ul>
                </li>
            <?php } ?>
        <?php } ?>
<!-- Baris Tutup Menu untuk Developer,Administrator,Manager -->

<?php  if($this->session->level=='4' OR $this->session->level=='3' OR $this->session->level=='2'){ ?>
        <?php $this->load->view('backend/menu_list')?>
<?php } ?>


    </ul>
  </nav>
  <!-- /.sidebar-menu -->
</div>

    <!-- Sidebar -->

    <!-- /.sidebar -->
  </aside>
