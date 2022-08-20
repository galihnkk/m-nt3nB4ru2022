
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
            <li class="breadcrumb-item active"><span style="font-size:13px;">add Cash</span></li>
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
              <h3 class="card-title"><strong>Cash</strong> <small>Add view</small></h3>
            </div>
            <!-- /.card-header -->


            <!-- form start -->
            <?php $attributes = array('class'=>'form-horizontal','role'=>'form');
            echo form_open_multipart('cash/add',$attributes); ?>
              <div class="card-body">

                <div class="form-group">
                  <input type="hidden" name="finance_cash_bizacc" value="<?php echo $users_company['user_company_account'] ?>">
                  <div class="row">
                    <div class="col-lg-6 col-sm-12">
                      <div class="form-group">
                        <label>ID</label>
                        <input type="text" class="form-control" name="finance_cash_no" required="required">
                      </div>
                      <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" name="finance_cash_deskripsi" required="required">
                      </div>
                      <div class="form-group">
                        <label>Currency</label>
                        <select name='finance_cash_currency' class="form-control select2" style="width: 100%;" required="required">
                          <option value=''></option>
                          <?php foreach ($currency as $row) {
                              echo"<option value='$row[name]'>$row[name]</option>";
                            } ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                      <div class="form-group">
                        <label>NIK PIC</label>
                        <input type="text" class="form-control" name="finance_cash_nik" required="required">
                      </div>
                      <div class="form-group">
                        <label>Name PIC</label>
                        <input type="text" class="form-control" name="finance_cash_nama" required="required">
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


          </div>


        </div>

      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>

</div>
  <!-- /.content-wrapper -->
  <script>
    $(function () {
      $('.my-colorpicker2').colorpicker()
    })
  </script>
<?php $this->load->view('backend/bottom')?>
