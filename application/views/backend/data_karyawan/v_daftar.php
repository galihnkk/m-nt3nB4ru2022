<?php $this->load->view('backend/top')?>
<?php $this->load->view('backend/menu')?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Daftar Karyawan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Daftar Karyawan</li>
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
              <h3 class="card-title"><a class="btn btn-success btn-sm" title="Tambahkan" href="<?php echo base_url()?>aspanel/data_karyawan_tambahkan"><i class="fas fa-plus-circle"></i> Tambahkan</a>
                </h3>

              <h3 class="text-right"><a class="btn btn-danger btn-sm" title="Sampah" href="<?php echo base_url()?>aspanel/data_karyawan_storage_bin"><i class="fas fa-trash"></i> Sampah</a></h3>
            </div>
            <div class="card-body table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Aksi</th>
                  <th>No</th>
                  <th>Username</th>
                  <th>Nama Karyawan</th>
                  <th>Level</th>
                  <th>Perusahaan</th>

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
                    <a class='btn btn-primary btn-sm' title='Edit' href='".base_url()."aspanel/data_karyawan_update/$row[id_session]'><i class='fas fa-edit'></i></a>
                    <a class='btn btn-danger btn-sm' title='Delete' href='".base_url()."aspanel/data_karyawan_delete_temp/$row[username]' onclick=\"return confirm('Are you sure want to delete this data?')\"><i class='fas fa-trash-alt'></i></a>";
                    ?>
                  </td>
                  <td><?=$no++?></td>
                  <td><?=$row['username']?></td>
                  <td><?=$row['nama']?></td>
                  <td><?=$row['user_level_nama']?></td>
                  <?php $company= $this->Crud_m->view_where('user_company', array('user_company_id'=> $row['user_detail_company']))->row_array(); ?>
                  <td><?php echo $company['user_company_account']?> | <?php echo $company['user_company_nama']?></td>
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
