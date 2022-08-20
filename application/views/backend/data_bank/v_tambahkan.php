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
            <li class="breadcrumb-item"><a href="<?php echo base_url()?>bank">List Bank</a></li>
            <li class="breadcrumb-item active">Add New</li>
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
          <div class="card card-secondary">
            <div class="card-header">
              <div class="col-sm-6 text-lg-left text-xs-center float-left" style="padding-left: 0px !important;">
                <span>Bank</span> <small>Add New</small>
              </div>
            </div>
            <!-- /.card-header -->


            <!-- form start -->
            <?php $attributes = array('class'=>'form-horizontal','role'=>'form');
            echo form_open_multipart('bank/data_bank_tambahkan',$attributes); ?>
              <div class="card-body">
                <div class="form-group">

                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>ID</label>
                        <input type="text" class="form-control" name="id" placeholder="ID Bank" required="required">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Bank Account</label>
                        <input type="text" class="form-control" name="account" placeholder="Bank Account">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" name="description" placeholder="Description Bank">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Bank Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Bank Name">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                          <label for="inputName">Currency</label>
                          <select name='currency' class="form-control select2" style="width: 100%;">
                          <?php foreach ($records_currency as $row) {
                            if ($rows['currency'] == $row['name']){
                              echo"<option selected='selected' value='$row[name]'>$row[name]</option>";
                            }else{
                              echo"<option value='$row[name]'>$row[name]</option>";
                            }
                          } ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Bank Address</label>
                        <input type="text" class="form-control" name="address" placeholder="Bank Address">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Bank City</label>
                        <input type="text" class="form-control" name="city" placeholder="Bank City" >
                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <div class="card-footer">
                <a class="btn btn-outline-info" title="batal" href="<?php echo base_url()?>bank"><i class="fab fa-creative-commons-sa"></i> Back</a>
                <button type="submit" name ="submit" class="btn btn-primary" title="Submit"><i class="fas fa-save"></i> Submit</button>

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


<?php $this->load->view('backend/bottom')?>
