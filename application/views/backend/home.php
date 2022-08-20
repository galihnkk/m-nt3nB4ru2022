<?php $this->load->view('backend/top')?>
<?php $this->load->view('backend/menu')?>

<?php $users= $this->Crud_m->view_where('user', array('id_user'=> $this->session->id_user))->row_array(); ?>
<?php $users_detail= $this->Crud_m->view_where('user_detail', array('id_user'=> $this->session->id_user))->row_array(); ?>
<?php $users_company= $this->Crud_m->view_where('user_company', array('user_company_id'=>$users_detail['user_detail_company']))->row_array(); ?>
<?php $users_company_level= $this->Crud_m->view_where('user_company_level', array('user_company_level_id'=>$users_company['user_company_kategori']))->row_array(); ?>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <span class="m-0 text-dark" style="font-size:25px;"><strong>Wedding Vendor </strong></span><span>Management System</span>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
        <!-- Baris Kotak Home -->
        <!-- <?php  if($this->session->level=='1'){ ?> -->
          <!-- <div class="col-lg-3 col-6">

            <div class="small-box bg-info">
              <?php $jmlproducts1 = $this->As_m->view('user')->num_rows(); ?>
              <div class="inner">
                <h3><?php echo $jmlproducts1; ?></h3>
                <p>Total Produk</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-stalker"></i>
              </div>
            <a href="<?php echo base_url('paneladmin/data_karyawan') ?>" class="small-box-footer">Info Lengkap <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        <?php } ?> -->
        <!-- Baris Tutup Kotak Home -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">


        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php $this->load->view('backend/bottom')?>
