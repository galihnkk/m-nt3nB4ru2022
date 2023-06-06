<?php $this->load->view('backend/top')?>
<?php $this->load->view('backend/menu')?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Daftar Paket Vendor</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Daftar Paket Vendor</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                </h3>

              <h3 class="text-right"><a class="btn btn-danger btn-sm" title="Sampah" href="<?php echo base_url()?>aspanel/data_karyawan_storage_bin"><i class="fas fa-trash"></i> Sampah</a></h3>
            </div>
            <div class="card-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  
                  <th>No</th>
                  <th>Vendor</th>
                  <th>Nama Paket</th>
                  <th>Harga Public</th>
                  <th>Harga Modal</th>
                  <th>Perusahaan</th>

                </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                foreach ($record as $row){

                  ?>

                <tr>
                  <td><?=$no++?></td>
                  <td><?=$row['username']?></td>
                  <td><?=$row['judul']?></td>
                  <?php $a = $row['harga'] - $row['harga_diskon']?>
                  <td><?=number_format($a,0,',','.')?></td>
                  <td><?=number_format($row['harga_modal'],0,',','.')?></td>                 
                  <td><?php echo $row['user_company_nama']?></td>
                </tr>
              <?php } ?>

                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div>
    </section>
</div>

<?php $this->load->view('backend/bottom')?>
