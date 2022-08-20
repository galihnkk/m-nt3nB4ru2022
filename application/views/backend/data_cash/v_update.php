
<?php $this->load->view('backend/top')?>
<?php $this->load->view('backend/menu')?>
<?php $users= $this->Crud_m->view_where('user', array('id_user'=> $this->session->id_user))->row_array(); ?>
<?php $users_detail= $this->Crud_m->view_where('user_detail', array('id_user'=> $this->session->id_user))->row_array(); ?>
<?php $users_company= $this->Crud_m->view_where('user_company', array('user_company_id'=>$users_detail['user_detail_company']))->row_array(); ?>
<?php $users_company_level= $this->Crud_m->view_where('user_company_level', array('user_company_level_id'=>$users_company['user_company_kategori']))->row_array(); ?>


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <span class="m-0 text-dark" style="font-size:25px;"><strong><?php echo $users_company['user_company_nama'];?> </strong></span><span><?php echo $users_company_level['user_company_level_nama'];?> Management System</span>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><span style="font-size:13px;">Home</span></li>
            <li class="breadcrumb-item"><span style="font-size:13px;">Finance</span></li>
            <li class="breadcrumb-item"><span style="font-size:13px;">Setting</span></li>
            <li class="breadcrumb-item active"><span style="font-size:13px;">Update Cash</span></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12 col-xs-12">
          <!-- general form elements -->
          <div class="card card-light">
            <div class="card-header">
              <h3 class="card-title"><strong>Cash</strong> <small>Update</small></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <?php $attributes = array('class'=>'form-horizontal','role'=>'form');
            echo form_open_multipart
            ('cash/update',$attributes); ?>

            <div class="card-body">
              <div class="form-group">
                <input type="hidden" name="finance_cash_session" value="<?php echo $rows['finance_cash_session'] ?>">
                <input type="hidden" name="finance_cash_bizacc" value="<?php echo $users_company['user_company_account'] ?>">
                <input type="hidden" name="finance_cash_no" value="<?php echo $rows['finance_cash_no'] ?>">
                <div class="row">
                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label>ID</label>
                      <input type="text" class="form-control" name="" value="<?php echo $rows['finance_cash_no'] ?>" disabled >
                    </div>
                    <div class="form-group">
                      <label>Description</label>
                      <input type="text" class="form-control" name="finance_cash_deskripsi" value="<?php echo $rows['finance_cash_deskripsi'] ?>" required="required">
                    </div>
                    <div class="form-group">
                      <label>Currency</label>
                      <select name='finance_cash_currency' class="form-control select2" style="width: 100%;" required="required">
                        <option value=''></option>
                        <?php foreach ($currency as $row) {
                          if ($rows['finance_cash_currency'] == $row['name']){
                            echo"<option selected='selected' value='$row[name]'>$row[name]</option>";
                          }else{
                            echo"<option value='$row[name]'>$row[name]</option>";
                       }
                     } ?>
                    </select>
                    </div>
                  </div>
                  <div class="col-lg-6 col-sm-12">
                    <div class="form-group">
                      <label>NIK PIC</label>
                      <input type="text" class="form-control" name="finance_cash_nik" value="<?php echo $rows['finance_cash_nik'] ?>" required="required">
                    </div>
                    <div class="form-group">
                      <label>Name PIC</label>
                      <input type="text" class="form-control" name="finance_cash_nama" value="<?php echo $rows['finance_cash_nama'] ?>" required="required">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">

                  </div>

                </div>
              </div>
            </div>
            <div class="card-footer">
              <a class="btn btn-outline-info" title="Back" href="<?php echo base_url()?>cash"><i class="fab fa-creative-commons-sa"></i> Back</a>
              <button type="submit" name ="submit" class="btn btn-primary" title="Submit"><i class="fas fa-file-upload"></i> Submit</button>
            </div>
            <?php echo form_close(); ?>



            <div class="card-body">
              <table id="log_history" class="table table-responsive-xl col-12 table-bordered table-striped p-0">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Module</th>
                  <th>Document No</th>
                  <th>Activity</th>
                  <th>User</th>
                  <th>Date</th>
                  <th>Access by</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                $record= $this->Erp_m->view_join_ordering_trace('log_activity','user','log_activity_user_id','id_user',array('log_activity_bizacc'=>$users_company['user_company_account'],'log_activity_modul'=>'Cash', 'log_activity_document_no'=>$rows['finance_cash_no'] ),'log_activity_id','DESC');
                foreach ($record as $row){
                  $tgl_posting = $this->mylibrary->tgl_indo($row['log_activity_waktu']);
                ?>
                <tr>
                  <td><?=$no++?></td>
                  <td><?=$row['log_activity_modul']?></td>
                  <td><?=$row['log_activity_document_no']?></td>
                  <td><?=$row['log_activity_status']?></td>
                  <td><?=$row['username']?></td>
                  <td><?=$tgl_posting?></td>
                  <td><?=substr($row['log_activity_platform'],0,14)?></td>
                </tr>
              <?php } ?>
                </tbody>
              </table>
            </div>


          </div>


        </div>

      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

</div>
  <!-- /.content-wrapper -->


<?php $this->load->view('backend/bottom')?>
