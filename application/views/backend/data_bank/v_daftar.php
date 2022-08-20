<?php $this->load->view('backend/top')?>
<?php $this->load->view('backend/menu')?>
<?php $users= $this->Crud_m->view_where('user', array('id_user'=> $this->session->id_user))->row_array(); ?>
<?php $users_detail= $this->Crud_m->view_where('user_detail', array('id_user'=> $this->session->id_user))->row_array(); ?>
<?php $users_company= $this->Crud_m->view_where('user_company', array('user_company_id'=>$users_detail['user_detail_company']))->row_array(); ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6 text-lg-left text-xs-center">
          <span class="text-title"><h5><?php echo $users_company['user_company_nama'];?></h5></span>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Daftar Bank</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card card-secondary">
            <div class="card-header">
              <div class="col-sm-6 text-lg-left text-xs-center float-left" style="padding-left: 0px !important;">
                <span>Bank</span> <small>View</small>
              </div>

              <div class="col-sm-6 text-lg-right text-xs-center float-right" style="padding-left: 0px !important;">
                <a class="btn btn-danger btn-sm" title="Blocked" href="<?php echo base_url()?>bank/data_bank_storage_bin"><i class="fas fa-times-circle"></i> Blocked</a>

                <a class="btn btn-success btn-sm" title="Tambahkan" href="<?php echo base_url()?>bank/data_bank_tambahkan"><i class="fas fa-plus-circle"></i> Add New</a>

              </div>
            </div>
            <div class="card-body table-responsive">
              <table id="bank_table1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th rowspan="2">Aksi</th>
                    <th rowspan="2">No</th>
                    <th rowspan="2">Status</th>
                    <th rowspan="2">ID</th>
                    <th rowspan="2">Description</th>
                    <th colspan="4"><center>Bank</center></th>
                    <th rowspan="2">Currency</th>
                    <th rowspan="2">Blocked</th>
                  </tr>
                  <tr>
                    <th>Account</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>City</th>
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
                      // echo"
                      // <a class='btn btn-primary btn-sm' title='Edit Data' href='".base_url()."bank/data_bank_update/$row[id]'><i class='fas fa-edit'></i></a>
                      // <a class='btn btn-danger btn-sm' title='Delete Data' href='".base_url()."bank/data_bank_delete_temp/$row[id]' onclick=\"return confirm('Are you sure want to delete this data?')\"><i class='fas fa-trash-alt'></i></a>";
                      echo"
                      <a class='btn btn-primary btn-xs' title='Edit Data' href='".base_url()."bank/data_bank_update/$row[id]'><i class='fas fa-edit'></i></a>";
                      ?>
                    </td>
                    <td><?=$no++?></td>
                    <td><?=$row['bank_status']?></td>
                    <td><?=$row['id']?></td>
                    <td><?=$row['description']?></td>
                    <td><?=$row['account']?></td>
                    <td><?=$row['name']?></td>
                    <td><?=$row['address']?></td>
                    <td><?=$row['city']?></td>
                    <td><?=$row['currency']?></td>
                    <td><?=$row['blocked']?></td>
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
