
<?php $this->load->view('backend/top')?>
<?php $this->load->view('backend/menu')?>


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>beranda"><small>Beranda</small></a></li>
            <li class="breadcrumb-item active"><small>Pengaturan</small></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">
          <?php $users= $this->Crud_m->view_where('user', array('username'=> $this->session->username))->row_array(); ?>
          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <?php if(empty($users['user_gambar'])) { ?>
                  <img src="<?php echo base_url()?>assets/backend/images/logo-default.png" class="profile-user-img img-fluid img-circle" alt="User Image">
                <?php }else { ?>
                  <img src="<?php echo base_url()?>assets/frontend/gambar_bisnis/<?php echo $users['user_gambar'];?>" class="profile-user-img img-fluid img-circle" alt="User Image">
                <?php }?>

              </div>

              <h3 class="profile-username text-center"><?php echo "$users[username]";?></h3>

              <p class="text-muted text-center"><?php echo "$users[user_login_status]";?></p>

              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>Bergabung sejak</b> <a class="float-right"><?php echo tgl_indo($users['user_post_tanggal']);?></a>
                </li>
                <li class="list-group-item">
                  <b>Terakhir aktif</b><br> <a class=""><?php echo tgl_indo($users['user_login_tanggal']);?> <?php echo $users['user_login_jam'];?></a>
                </li>
              </ul>
              <a href="<?php echo base_url(); ?>aspanel/logout" class="btn btn-primary btn-block"><b>Keluar</b></a>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card">
            <div class="card-header">
                <a class="btn btn-outline-danger" href="<?php echo base_url()?>pengaturan/informasi">
                  <div class="d-block d-sm-none"><i class="nav-icon fas fa-exclamation-circle"></i></div>
                  <div class="d-md-block d-none d-sm-block"><i class="nav-icon fas fa-exclamation-circle"></i> Informasi</div>
                </a>
                <a class="btn btn-danger" href="<?php echo base_url()?>ringkasan/informasi">
                  <div class="d-block d-sm-none"><i class="nav-icon fas fa-photo-video"></i></div>
                  <div class="d-md-block d-none d-sm-block"><i class="nav-icon fas fa-photo-video"></i> Ringkasan</div>
                </a>
                <a class="btn btn-outline-danger" href="<?php echo base_url()?>harga/informasi">
                  <div class="d-block d-sm-none"><i class="nav-icon fas fa-hand-holding-usd"></i></div>
                  <div class="d-md-block d-none d-sm-block"><i class="nav-icon fas fa-hand-holding-usd"></i> Harga</div>
                </a>
            </div><!-- /.card-header -->
            <div class="card-body pb-0">
              <div class="row">
                <div class="col-12 d-flex">
                  <div class="col-sm-6 col-md-6">
                    <a class="btn btn-outline-danger" href="<?php echo base_url()?>ringkasan/tambah">
                      <div class="d-block d-sm-none"><i class="nav-icon fas fa-plus-circle"></i></div>
                      <div class="d-md-block d-none d-sm-block"><i class="nav-icon fas fa-plus-circle"></i> Tambah</div>
                    </a>
                    <a class="btn btn btn-outline-info" href="<?php echo base_url()?>ringkasan/sampah">
                      <div class="d-block d-sm-none"><i class="nav-icon fas fa-trash"></i></div>
                      <div class="d-md-block d-none d-sm-block"><i class="nav-icon fas fa-trash"></i> Sampah</div>
                    </a>
                  </div>
                  <div class="col-sm-2 col-md-2">

                  </div>
                </div>
              </div>
              <br>
              <div class="row">
                <?php
                $no = 1;
                foreach ($records as $row){
                 ?>
                 <div class="col-12 col-sm-6 col-md-6 d-flex align-items-stretch flex-column">
                   <div class="card bg-light d-flex flex-fill">
                     <div class="card-header text-muted border-bottom-0">
                       <b><?=$row['judul'] ?> </b> |<small> <?=$row['views'] ?> netizen</small>
                     </div>
                     <div class="card-body pt-0">
                       <div class="row">
                         <div class="col-12 text-center">
                           <?php if(empty($row['foto1'])) { ?>
                             <img src="<?php echo base_url()?>assets/backend/images/logo-default.png" class="profile-user-img img-fluid img-circle" alt="User Image">
                           <?php }else { ?>
                             <img src="<?php echo base_url()?>assets/frontend/projek/<?php echo $row['foto1'];?>" class=" img-fluid">
                           <?php }?>

                         </div>
                       </div>
                     </div>
                     <div class="card-footer">
                       <div class="text-right">
                         <a href="<?php echo base_url()?>ringkasan/hapus_temp/<?php echo $row['id_projek'] ?>" onclick="return confirm('Yakin untuk menghapus <?=$row['judul'] ?> secara permanen?')"  class="btn btn-sm bg-teal">
                           <i class="fas fa-trash"></i> Hapus
                         </a>
                         <a href="<?php echo base_url()?>ringkasan/edit/<?php echo $row['id_projek'] ?>" class="btn btn-sm btn-primary">
                           <i class="fas fa-edit"></i> Perbarui
                         </a>
                       </div>
                     </div>
                   </div>
                 </div>

               <?php } ?>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
  <!-- /.content-wrapper -->

<?php $this->load->view('backend/bottom')?>
