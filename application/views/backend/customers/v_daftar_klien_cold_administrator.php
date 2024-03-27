
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
            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>customer/daftar_klien"><small>Daftar Klien</small></a></li>
            <li class="breadcrumb-item active"><small>Klien Cold</small></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        
        <!-- /.col -->
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
                <a class="btn btn-outline-danger" href="<?php echo base_url()?>customer/daftar_klien">
                      <div class="d-block d-sm-none"><i class="nav-icon fab fa-creative-commons-sa"></i></div>
                      <div class="d-md-block d-none d-sm-block"><i class="fab fa-creative-commons-sa"></i> Kembali</div>
                </a>
                <br>
                <center><h3>Klien Cold</h3></center>
            </div><!-- /.card-header -->
            <br>

            <div class="card-body table-responsive">              
              <table id="log_history" class="table table-responsive-xl col-12 table-bordered table-striped p-0">
                <thead>
                <tr>
                  <th>Aksi</th>
                  <th>No</th>
                  <th>Nama Klien</th>
                  <th>Nomer HP</th>
                  <th>Tanggal & Lokasi Acara</th>                  
                  <th>Chat Pertama</th>

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
                    <a class='btn btn-primary btn-sm' title='Detail' href='#'><i class='fas fa-eye'></i></a>
                    <a class='btn btn-primary btn-sm' title='Perbarui' href='".base_url()."customer/edit_klien/$row[customers_id_session]'><i class='fas fa-edit'></i></a>
                   ";
                    ?>
                  </td>
                  <td><?=$no++?></td>
                  <td><?=$row['customers_nama']?></td>
                  <td><a href="https://wa.me/<?php echo $row['customers_nohp']?>"><?php echo $row['customers_nohp']?></a></td>
                  <td><?php echo tgl_indo($row['customers_tanggal_acara'])?>, <?php echo $row['customers_lokasi']?></td>                  
                  <td><?= tgl_indo($row['customers_tglawal'])?></td>
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
