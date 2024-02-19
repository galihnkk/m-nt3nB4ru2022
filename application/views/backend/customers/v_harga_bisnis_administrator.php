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
            <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>harga/informasi"><small>Harga</small></a></li>
            <li class="breadcrumb-item active"><small>Vendor <?php echo $records['namabisnis'] ?></small></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row"> 

        <div class="col-md-3">
          <?php $users= $this->Crud_m->view_where('user', array('id_session'=> $this->session->id_session))->row_array(); ?>
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

              <?php
               $kabupatens = $this->Crud_m->view_where('kabupaten',array('id'=> $records['kabupaten']))->row_array();
              $kecamatans = $this->Crud_m->view_where('kecamatan',array('id'=> $records['kecamatan']))->row_array();
              $provinsi = $this->Crud_m->view_where('provinsi',array('id'=> $records['propinsi']))->row_array();
              $kategoris = $this->Crud_m->view_where('user_company',array('user_company_account'=> $records['user_company_account']))->row_array();
              ?>

              <h3 class="profile-username text-center"><?php echo $records['namabisnis'] ?></h3>
              <p class="text-muted text-center"><?php echo $kategoris['user_company_nama'] ?></p>
              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>Berlokasi</b>
                  <br><small><?php echo $kecamatans['nama_kec'] ?>, <?php echo $kabupatens['nama'];?>, <?php echo $provinsi['nama'] ?></small>
                </li>
                <li class="list-group-item">
                  <b>Kata Kunci</b>
                  <br><small><?php echo $records['katakunci'] ?></small>
                </li>
                <li class="list-group-item">
                  <b>Pengunjung</b>
                  <br><small>Halaman Utama : <?php echo $records['views'] ?> | Paket Harga : 12</small>
                </li>
              </ul>
             
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

        </div>
        <div class="col-md-9">
          <div class="card">
            <div class="card-header">
                
                <a class="btn btn-outline-danger" href="<?php echo base_url()?>bookdate/date_bisnis/<?php echo $records['user_bisnis_session'] ?>">
                  <div class="d-block d-sm-none"><i class="nav-icon fas fa-exclamation-circle"></i></div>
                  <div class="d-md-block d-none d-sm-block"><i class="nav-icon fas fa-exclamation-circle"></i> Kunci Tanggal</div>
                </a>
                <?php if($this->session->level=='105221cd0abe4603ecfee5fb02ba2f398128d131'){ ?>
                  <a class="btn btn-danger" href="<?php echo base_url()?>harga/harga_bisnis/<?php echo $records['user_bisnis_session'] ?>">
                    <div class="d-block d-sm-none"><i class="nav-icon fas fa-hand-holding-usd"></i></div>
                    <div class="d-md-block d-none d-sm-block"><i class="nav-icon fas fa-hand-holding-usd"></i> Daftar Harga</div>
                  </a>
                  <a class="btn btn-outline-danger" href="<?php echo base_url()?>gambar/gambar_bisnis/<?php echo $records['user_bisnis_session'] ?>">
                    <div class="d-block d-sm-none"><i class="nav-icon fas fa-photo-video"></i></div>
                    <div class="d-md-block d-none d-sm-block"><i class="nav-icon fas fa-photo-video"></i> Galeri</div>
                  </a>
                  <a class="btn btn-outline-danger" href="<?php echo base_url()?>harga/informasi_bisnis/">
                  <div class="d-block d-sm-none"><i class="nav-icon fas fa-exclamation-circle"></i></div>
                  <div class="d-md-block d-none d-sm-block"><i class="fab fa-creative-commons-sa"></i> Kembali</div>
                  </a>
                  <br><br>
                  <a class="btn btn-outline-danger" href="<?php echo base_url()?>harga/tambah_harga_bisnis/<?php echo $records['user_bisnis_session'] ?>">
                    <div class="d-block d-sm-none"><i class="nav-icon fas fa-plus-circle"></i></div>
                    <div class="d-md-block d-none d-sm-block"><i class="nav-icon fas fa-plus-circle"></i> Tambah</div>
                  </a>
                  <a class="btn btn btn-outline-info" href="<?php echo base_url()?>harga/harga_sampah_bisnis/<?php echo $records['user_bisnis_session'] ?>">
                      <div class="d-block d-sm-none"><i class="nav-icon fas fa-trash"></i></div>
                      <div class="d-md-block d-none d-sm-block"><i class="nav-icon fas fa-trash"></i> Sampah</div>
                  </a>
                  
                <?php } ?>       
            </div><!-- /.card-header -->
            <div class="card-body table-responsive">              
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Aksi</th>
                  <th>No</th>
                  <th>Judul Paket</th>   
                  <th>Harga</th>
                  <th>Tayangan</th>
                   

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
                    <a class='btn btn-primary btn-sm' title='Perbarui' href='".base_url()."harga/edit_harga_bisnis/$row[id_harga_session]'><i class='fas fa-edit'></i></a>
                    <a class='btn btn-danger btn-sm' title='Hapus' href='".base_url()."harga/hapus_temp_harga/$row[id_harga_session]' onclick=\"return confirm('Yakin ingin menghapus  ?')\"><i class='fas fa-trash-alt'></i></a>";
                    ?>
                  </td>
                  <td><?=$no++?></td>
                  <td><?php echo $row['judul'] ?></td>
                  <?php $b = $row['harga'] - $row['harga_diskon'] ?>                 
                  <td><s>Rp <?php echo number_format($row['harga'],0,',','.')?></s> Rp <?php echo number_format($b,0,',','.')?> | Rp <?php echo number_format($row['harga_modal'],0,',','.')?> Nett</td>
                  <td><?php echo $row['views'] ?></td>                    
                </tr>
              <?php } ?>

                </tbody>
              </table>
            </div>
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<?php $this->load->view('backend/bottom')?>
