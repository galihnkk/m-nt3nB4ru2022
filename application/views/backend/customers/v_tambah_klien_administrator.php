
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
            <li class="breadcrumb-item active"><small>Tambah Klien</small></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
       <?php $users= $this->Crud_m->view_where('user', array('id_session'=> $this->session->id_session))->row_array(); ?>
          
        
        <!-- /.col -->
        <div class="col-md-12">
          <div class="card">
           
            <div class="card-body pb-0">
              <div class="row">
                <div class="col-12 col-sm-12 col-md-12">
                  <?php $attributes = array('class'=>'form-horizontal','role'=>'form');
                  echo form_open_multipart('customer/tambah_klien',$attributes); ?>
                  <h4><b>Tambah Klien</b></h4>
                  <div class="row">
                    <input type="hidden" name="id" value="<?=$users['id_session'] ?>">
                    <div class="col-12 col-sm-6">
                      <label class="col-6 col-xs-4 col-form-label">Nama Klien</label>
                      <div class="col-12 col-xs-10">
                        <input type="text" class="form-control"  name ="nama" required="required">
                      </div>
                    </div>
                    <div class="col-12 col-sm-6">
                      <label class="col-6 col-xs-4 col-form-label">No. HP</label>
                      <div class="col-12 col-xs-10">
                        <input type="text" class="form-control"  name ="hp" required="required">
                      </div>
                    </div>
                    <div class="col-12 col-sm-6">
                      <label class="col-6 col-xs-4 col-form-label">Rencana Lokasi Acara</label>
                      <div class="col-12 col-xs-10">
                        <input type="text" class="form-control"  name ="lokasi" required="required">
                      </div>
                    </div>
                    <div class="col-12 col-sm-3">
                      <label class="col-6 col-xs-4 col-form-label">Tanggal Acara</label>
                      <div class="col-12 col-xs-10">
                        <input type="date" class="form-control"  name ="tanggal" required="required">
                      </div>
                    </div>
                    <div class="col-12 col-sm-3">
                      <label class="col-6 col-xs-4 col-form-label">Chat Pertama</label>
                      <div class="col-12 col-xs-10">
                        <input type="date" class="form-control"  name ="tanggal_chat" required="required">
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-12 col-sm-6">
                      <label class="col-4 col-xs-2 col-form-label"> </label>
                      <div class="col-12 col-xs-10">
                        <button type="submit" name ="submit" class="btn btn-success"><i class="fas fa-file-upload"></i> Simpan</button>
                        <a class="btn btn-outline-info" title="batal" href="<?php echo base_url()?>customer/daftar_klien"><i class="fab fa-creative-commons-sa"></i> Batal</a>

                      </div>
                    </div>
                  </div>
                  <?php echo form_close(); ?>
                </div>
              </div>
              <br>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
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
