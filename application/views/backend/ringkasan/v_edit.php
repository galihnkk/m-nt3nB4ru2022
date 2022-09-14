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
            <li class="breadcrumb-item active"><a href="<?php echo base_url() ?>ringkasan/informasi"><small>Ringkasan</small></a></li>
            <li class="breadcrumb-item active"><small>Update Ringkasan</small></li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">
          <?php $users= $this->Crud_m->view_where('user', array('username'=> $this->session->username))->row_array(); ?>
          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <?php if(empty($users['user_gambar'])) { ?>
                  <img src="<?php echo base_url()?>assets/backend/images/logo-default.png" class="profile-user-img img-fluid img-circle" alt="User Image">
                <?php }else { ?>
                  <img src="<?php echo base_url()?>assets/frontend/gambar_bisnis/<?php echo $users['user_gambar'];?>" class="profile-user-img img-fluid img-circle" alt="User Image">
                <?php }?>

              </div>

              <h3 class="profile-username text-center"><?php echo $users['username'];?></h3>

              <p class="text-muted text-center"><?php echo $users['user_login_status'];?></p>

              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>Bergabung sejak</b> <a class="float-right"><?php echo tgl_indo($users['user_post_tanggal']);?></a>
                </li>
                <li class="list-group-item">
                  <b>Terakhir aktif</b><br> <a class=""><?php echo tgl_indo($users['user_login_tanggal']);?> <?php echo $users['user_login_jam'];?></a>
                </li>
              </ul>
              <a href="<?php echo base_url(); ?>aspanel/logout" class="btn btn-primary btn-block"><b>Keluar</b></a>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card">
            <div class="card-header">
                <a class="btn btn-outline-danger" href="<?php echo base_url()?>pengaturan/informasi">
                  <div class="d-block d-sm-none"><i class="nav-icon fas fa-exclamation-circle"></i></div>
                  <div class="d-md-block d-none d-sm-block"><i class="nav-icon fas fa-exclamation-circle"></i> Informasi</div>
                </a>
                <a class="btn btn-danger" href="<?php echo base_url()?>ringkasan/informasi">
                  <div class="d-block d-sm-none"><i class="nav-icon fas fa-photo-video"></i></div>
                  <div class="d-md-block d-none d-sm-block"><i class="nav-icon fas fa-photo-video"></i> Ringkasan</div>
                </a>
                <a class="btn btn-outline-danger" href="<?php echo base_url()?>harga/informasi">
                  <div class="d-block d-sm-none"><i class="nav-icon fas fa-hand-holding-usd"></i></div>
                  <div class="d-md-block d-none d-sm-block"><i class="nav-icon fas fa-hand-holding-usd"></i> Harga</div>
                </a>
            </div><!-- /.card-header -->
            <div class="card-body pb-0">
              <div class="row">
                <div class="col-12 col-sm-12 col-md-12 d-flex">
                  <?php $attributes = array('class'=>'form-horizontal','role'=>'form');
                  echo form_open_multipart('ringkasan/edit',$attributes); ?>
                  <input type="hidden" name="id" value="<?=$records['username'] ?>">
                  <input type="hidden" name="id_projek" value="<?php echo $records['id_projek'] ?>">
                  <h4><b>Update Ringkasan</b></h4>
                  <div class="row">
                    <div class="col-12 col-sm-12">
                      <label class="col-6 col-xs-4 col-form-label">Judul</label>
                      <div class="col-12 col-xs-10">
                        <input type="text" class="form-control"  name ="judul" value="<?php echo $records['judul'] ?>">
                      </div>
                    </div>
                    <div class="col-12 col-sm-12">
                      <label class="col-6 col-xs-4 col-form-label">Deskripsi</label>
                      <div class="col-12 col-xs-10">
                        <textarea class="textareas"  name ="deskripsi" style="width: 100%; height: 100px;" value="<?php echo $records['deskripsi'] ?>"><?php echo $records['deskripsi']?></textarea>
                      </div>
                    </div>
                    <div class="col-12 col-sm-6">
                      <label class="col-6 col-xs-4 col-form-label">Meta Deskripsi</label>
                      <div class="col-12 col-xs-10">
                        <textarea class="form-control" name="meta_deskripsi" rows="2"><?php echo $records['meta_deskripsi'] ?></textarea>
                      </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <label class="col-4 col-xs-2 col-form-label">Kata kunci</label>
                        <div class="col-12 col-xs-10">
                          <input type="text" class="form-control"  name ="keyword" value="<?php echo $records['keyword'] ?>" >
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                      <label class="col-12 col-xs-12 col-form-label">URL Video Youtube</label>
                      <div class="col-12 col-xs-10">
                        <input type="text" class="form-control"  name ="youtube" value="<?php echo $records['youtube']?>">
                      </div>
                      <br>
                      <div class="col-12 col-xs-10">
                        <iframe width="100%" height="200px" src="https://www.youtube.com/embed/<?php echo $records['youtube'] ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                      </div>
                    </div>
                    <div class="col-12 col-sm-6">
                      <label class="col-4 col-xs-2 col-form-label">Gambar 1</label>
                      <div class="col-12 col-xs-10">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" name="foto1">
                          <label class="custom-file-label" for="exampleInputFile"><?php echo $records['foto1'] ?></label>
                        </div>
                      </div>
                      <br>
                      <div class="col-12 col-xs-10">
                          <img src="<?php echo base_url()?>assets/frontend/projek/<?php echo $records['foto1'] ?>" class="img-fluid mb-3">
                      </div>
                    </div>
                    <div class="col-12 col-sm-6">
                      <label class="col-4 col-xs-2 col-form-label">Gambar 2</label>
                      <div class="col-12 col-xs-10">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" name="foto2">
                          <label class="custom-file-label" for="exampleInputFile"><?php echo $records['foto2'] ?></label>
                        </div>
                      </div>
                      <br>
                      <div class="col-12 col-xs-10">
                          <img src="<?php echo base_url()?>assets/frontend/projek/<?php echo $records['foto2'] ?>" class="img-fluid mb-3">
                      </div>
                    </div>
                    <div class="col-12 col-sm-6">
                      <label class="col-4 col-xs-2 col-form-label">Gambar 3</label>
                      <div class="col-12 col-xs-10">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" name="foto3">
                          <label class="custom-file-label" for="exampleInputFile"><?php echo $records['foto3'] ?></label>
                        </div>
                      </div>
                      <br>
                      <div class="col-12 col-xs-10">
                          <img src="<?php echo base_url()?>assets/frontend/projek/<?php echo $records['foto3'] ?>" class="img-fluid mb-3">
                      </div>
                    </div>
                    <div class="col-12 col-sm-6">
                      <label class="col-4 col-xs-2 col-form-label">Gambar 4</label>
                      <div class="col-12 col-xs-10">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" name="foto4">
                          <label class="custom-file-label" for="exampleInputFile"><?php echo $records['foto4'] ?></label>
                        </div>
                      </div>
                      <br>
                      <div class="col-12 col-xs-10">
                          <img src="<?php echo base_url()?>assets/frontend/projek/<?php echo $records['foto4'] ?>" class="img-fluid mb-3">
                      </div>
                    </div>
                    <div class="col-12 col-sm-6">
                      <label class="col-4 col-xs-2 col-form-label">Gambar 5</label>
                      <div class="col-12 col-xs-10">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" name="foto5">
                          <label class="custom-file-label" for="exampleInputFile"><?php echo $records['foto5'] ?></label>
                        </div>
                      </div>
                      <br>
                      <div class="col-12 col-xs-10">
                          <img src="<?php echo base_url()?>assets/frontend/projek/<?php echo $records['foto5'] ?>" class="img-fluid mb-3">
                      </div>
                    </div>

                  </div>
                  <div class="form-group row">
                    <div class="col-12 col-sm-6">
                      <label class="col-4 col-xs-2 col-form-label"> </label>
                      <div class="col-12 col-xs-10">
                        <button type="submit" name ="submit" class="btn btn-success">Simpan</button>
                        <a class="btn btn-outline-info" title="batal" href="<?php echo base_url()?>ringkasan/informasi"><i class="fab fa-creative-commons-sa"></i> Batal</a>
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

<?php $this->load->view('backend/bottom')?>
