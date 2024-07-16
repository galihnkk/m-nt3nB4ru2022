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
            <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>customer/daftar_klien"><small>Daftar Klien</small></a></li>
            <li class="breadcrumb-item active"><small>Klien</small></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row"> 
        
        <!-- /.col -->
        <div class="col-md-12">
          <div class="card">
          <div class="card-header">
                <center><h3><?php echo $records['customers_nama'] ?></h3></center><br>
                <a class="btn btn-danger" href="<?php echo base_url()?>customer/daftar_klien_hot">
                  <div class="d-block d-sm-none"><i class="nav-icon fab fa-hotjar"></i></div>
                  <div class="d-md-block d-none d-sm-block"><i class="nav-icon fab fa-hotjar"></i> Tagihan</div>
                </a>  
                <a class="btn btn-outline-danger" href="<?php echo base_url()?>customer/daftar_klien">
                  <div class="d-block d-sm-none"><i class="nav-icon fas fa-exclamation-circle"></i></div>
                  <div class="d-md-block d-none d-sm-block"><i class="nav-icon fas fa-exclamation-circle"></i> Data Pengantin</div>
                </a>               
                <a class="btn btn-outline-danger" href="<?php echo base_url()?>customer/daftar_klien_konsul">
                  <div class="d-block d-sm-none"><i class="nav-icon fas fa-hands-helping"></i></div>
                  <div class="d-md-block d-none d-sm-block"><i class="nav-icon fas fa-hands-helping"></i> Susunan Acara Akad</div>
                </a>
                <a class="btn btn-outline-danger" href="<?php echo base_url()?>customer/daftar_klien_kuncitgl">
                  <div class="d-block d-sm-none"><i class="nav-icon fab fa-creative-commons-sa"></i></div>
                  <div class="d-md-block d-none d-sm-block"><i class="nav-icon fab fa-creative-commons-sa"></i> Kembali</div>
                </a><br><br>
                <a class="btn btn-outline-danger" href="<?php echo base_url()?>customer/klien_kuncitgl_tambah/<?php echo $records['customers_id_session']?>">
                      <div class="d-block d-sm-none"><i class="nav-icon fas fa-plus-circle"></i></div>
                      <div class="d-md-block d-none d-sm-block"><i class="nav-icon fas fa-plus-circle"></i> Tambah </div>
                </a>
                <a class="btn btn btn-outline-info" href="<?php echo base_url()?>customer/batal_klien">
                      <div class="d-block d-sm-none"><i class="nav-icon fas fa-user-slash"></i></div>
                      <div class="d-md-block d-none d-sm-block"><i class="nav-icon fas fa-user-slash"></i> Batal</div>
                </a>           
                
                
            </div><!-- /.card-header -->
            <br>
            <div class="card-body table-responsive">              
              <table id="example1" class="table table-responsive-xl col-12 table-bordered table-striped p-0">
                <thead>
                <tr>
                  <th>Aksi</th>
                  <th>No</th>
                  <th>Judul</th>
                  <th>Nominal</th>
                  <th>Status</th>                 

                </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                foreach ($record as $row){

                  ?>

                <tr>
                  <td>
                    <?php
                    echo"
                    <a class='btn btn-primary btn-sm' title='Detail' href='".base_url()."customer/klien_kuncitgl/$row[customers_id_session]'><i class='fas fa-eye'></i></a>
                    <a class='btn btn-primary btn-sm' title='Perbarui' href='".base_url()."customer/edit_klien/$row[customers_id_session]'><i class='fas fa-edit'></i></a>
                    ";
                    ?>
                  </td>
                  <td><?=$no++?></td>
                  <td><?=$row['customers_nama']?></td>
                  <td><a href="https://wa.me/<?php echo $row['customers_nohp']?>"><?php echo $row['customers_nohp']?></a></td>
                  <td><?php echo tgl_indo($row['customers_tanggal_acara'])?>, <?php echo $row['customers_lokasi']?></td>                  
                </tr>
              <?php } ?>

                </tbody>
              </table>
            </div>
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
