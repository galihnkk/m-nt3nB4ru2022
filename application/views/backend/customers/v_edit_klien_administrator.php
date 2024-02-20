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
            <li class="breadcrumb-item active"><small>Edit Klien</small></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row"> 
        
        <!-- /.col -->
        <div class="col-md-12">
          <div class="card">
           
            <div class="card-body pb-0">
              <div class="row">
                <div class="col-12 col-sm-12 col-md-12 ">
                  <?php $attributes = array('class'=>'form-horizontal','role'=>'form');
                  echo form_open_multipart('customer/edit_klien',$attributes); ?>
                  <h4><b>Perbarui Klien <?php echo $records['customers_nama'] ?></b></h4>
                  <div class="row">
                    <input type="hidden" name="id" value="<?=$records['customers_id_session'] ?>">
                    <div class="col-12 col-sm-6">
                      <label class="col-6 col-xs-4 col-form-label">Nama Klien</label>
                      <div class="col-12 col-xs-10">
                        <input type="text" class="form-control"  name ="nama" value="<?php echo $records['customers_nama'] ?>" required="required">
                      </div>
                    </div>
                    <div class="col-12 col-sm-6">
                      <label class="col-6 col-xs-4 col-form-label">No. HP</label>
                      <div class="col-12 col-xs-10">
                        <input type="text" class="form-control"  name ="hp" value="<?php echo $records['customers_nohp'] ?>" required="required">
                      </div>
                    </div>
                    <div class="col-12 col-sm-6">
                      <label class="col-6 col-xs-4 col-form-label">Rencana Lokasi Acara</label>
                      <div class="col-12 col-xs-10">
                        <input type="text" class="form-control"  name ="lokasi" value="<?php echo $records['customers_lokasi'] ?>" required="required">
                      </div>
                    </div>
                    <div class="col-12 col-sm-6">
                      <label class="col-6 col-xs-4 col-form-label">Tanggal Acara</label>
                      <div class="col-12 col-xs-10">
                        <input type="date" class="form-control"  name ="tanggal" value="<?php echo $records['customers_tanggal_acara'] ?>"  required="required">
                      </div>
                    </div>
                    <div class="col-12 col-sm-6">
                      <label class="col-6 col-xs-4 col-form-label">Chat Pertama</label>
                      <div class="col-12 col-xs-10">
                        <input type="date" class="form-control"  name ="tanggal_chat" value="<?php echo $records['customers_tglawal'] ?>"  required="required">
                      </div>
                    </div>

                    <div class="col-12 col-sm-4">
                      <label class="col-12 col-xs-12 col-form-label">Status Klien</label>
                      <div class="col-md-12 col-sm-12">
                          <select class="form-control" name="status">
                            <?php if(empty($records['customers_status'])) { ?>
                              <option class="drop-list" value="" selected>Pilih<i class="fa fa-angle-down"></i></option>
                              <option class="drop-list" value="1">Penawaran</option>
                              <option class="drop-list" value="2">Konsul Offline</option>
                              <option class="drop-list" value="3">Kunci Tanggal</option>
                              <option class="drop-list" value="4">Uang Muka</option>
                              <option class="drop-list" value="5">Pelunasan</option>
                            <?php }elseif($records['customers_status'] == '1') { ?>
                              <option class="drop-list" value="1" selected>Penawaran</option>
                              <option class="drop-list" value="2">Konsul Offline</option>
                              <option class="drop-list" value="3">Kunci Tanggal</option>
                              <option class="drop-list" value="4">Uang Muka</option>
                              <option class="drop-list" value="5">Pelunasan</option>
                            <?php }elseif($records['customers_status'] == '2') { ?>
                              <option class="drop-list" value="1" >Penawaran</option>
                              <option class="drop-list" value="2" selected>Konsul Offline</option>
                              <option class="drop-list" value="3">Kunci Tanggal</option>
                              <option class="drop-list" value="4">Uang Muka</option>
                              <option class="drop-list" value="5">Pelunasan</option>
                            <?php }elseif($records['customers_status'] == '3') { ?>
                              <option class="drop-list" value="1" >Penawaran</option>
                              <option class="drop-list" value="2" >Konsul Offline</option>
                              <option class="drop-list" value="3" selected>Kunci Tanggal</option>
                              <option class="drop-list" value="4">Uang Muka</option>
                              <option class="drop-list" value="5">Pelunasan</option>
                            <?php }elseif($records['customers_status'] == '4') { ?>
                              <option class="drop-list" value="1" >Penawaran</option>
                              <option class="drop-list" value="2" >Konsul Offline</option>
                              <option class="drop-list" value="3">Kunci Tanggal</option>
                              <option class="drop-list" value="4" selected>Uang Muka</option>
                              <option class="drop-list" value="5">Pelunasan</option>
                            <?php }else { ?>
                              <option class="drop-list" value="1" >Penawaran</option>
                              <option class="drop-list" value="2" >Konsul Offline</option>
                              <option class="drop-list" value="3">Kunci Tanggal</option>
                              <option class="drop-list" value="4" >Uang Muka</option>
                              <option class="drop-list" value="5" selected>Pelunasan</option>
                            <?php }?>
                          </select>
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
