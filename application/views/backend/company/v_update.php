
<?php $this->load->view('backend/top')?>
<?php $this->load->view('backend/menu')?>



<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Perbarui Perusahaan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url()?>aspanel/home">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url()?>aspanel/company">Daftar Perusahaan</a></li>
            <li class="breadcrumb-item active">Perbarui Perusahaan</li>
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
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title"></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <?php $attributes = array('class'=>'form-horizontal','role'=>'form');
            echo form_open_multipart('aspanel/company_update',$attributes); ?>

              <div class="card-body">
                <div class="form-group">
                  <input type="hidden" name="user_company_id" value="<?php echo $rows['user_company_id'] ?>">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Account</label>
                        <input type="text" class="form-control" name="user_company_account" value="<?php echo $rows['user_company_account'] ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Nama Sesuai Akta</label>
                        <input type="text" class="form-control" name="user_company_nama" value="<?php echo $rows['user_company_nama'] ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Inisial</label>
                        <input type="text" class="form-control" name="user_company_judul" value="<?php echo $rows['user_company_judul'] ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Kategori</label>
                        <select name='user_company_kategori' class="form-control select2" style="width: 100%;" required="required">
                          <option value=''></option>
                          <?php foreach ($category_company as $row) {
                            if ($rows['user_company_kategori'] == $row['user_company_level_id']){
                              echo"<option selected='selected' value='$row[user_company_level_id]'>$row[user_company_level_nama]</option>";
                            }else{
                              echo"<option value='$row[user_company_level_id]'>$row[user_company_level_nama]</option>";
                         }
                       } ?>
                      </select>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Warna</label>
                        <div class="input-group my-colorpicker2">
                          <input type="text" class="form-control" name="user_company_warna" value="<?php echo $rows['user_company_warna'] ?>">
                          <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-square"></i></span>
                          </div>
                        </div>
                        <!-- /.input group -->
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label>Logo</label> <small>L 370 px X T 450 px</small>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" name="user_company_logo">
                          <label class="custom-file-label" for="exampleInputFile"></label>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <label>Preview Logo</label>
                        <br>
                        <img class="img-fluid mb-3" src="<?php echo base_url()?>assets/frontend/company/<?php echo $rows['user_company_logo'] ?>">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" name ="submit" class="btn btn-success" title="Perbarui"><i class="fas fa-file-upload"></i> Perbarui</button>
                <a class="btn btn-primary" title="Batal" href="<?php echo base_url()?>aspanel/company"><i class="fab fa-creative-commons-sa"></i> Batal</a>

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
