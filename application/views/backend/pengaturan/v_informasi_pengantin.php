
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
            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>beranda">Beranda</a></li>
            <li class="breadcrumb-item active">Pengaturan</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">        
        <!-- /.col -->
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
                <a class="btn btn-danger" href="">
                  <div class="d-block d-sm-none"><i class="nav-icon fas fa-exclamation-circle"></i></div>
                  <div class="d-md-block d-none d-sm-block"><i class="nav-icon fas fa-exclamation-circle"></i> Informasi Pengguna</div>
                </a>
                <?php if($this->session->level=='4'){ ?>
                <a class="btn btn-outline-danger" href="<?php echo base_url()?>ringkasan/informasi">
                  <div class="d-block d-sm-none"><i class="nav-icon fas fa-photo-video"></i></div>
                  <div class="d-md-block d-none d-sm-block"><i class="nav-icon fas fa-photo-video"></i> Ringkasan</div>
                </a>
                <a class="btn btn-outline-danger" href="<?php echo base_url()?>harga/informasi">
                  <div class="d-block d-sm-none"><i class="nav-icon fas fa-hand-holding-usd"></i></div>
                  <div class="d-md-block d-none d-sm-block"><i class="nav-icon fas fa-hand-holding-usd"></i> Harga</div>
                </a>
              <?php } ?>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <div class="active tab-pane" id="security">
                  <?php $attributes = array('class'=>'form-horizontal','role'=>'form');
                  echo form_open_multipart('pengaturan/informasi',$attributes); ?>
                    <input type="hidden" name="id_session" value="<?php echo $record['id_session']?>">

                    <div class="row">    
                      <div class="col-12 col-sm-6">
                        <label class="col-12 col-xs-12 col-form-label">Nama Lengkap Pengantin Pria</label>
                        <div class="col-12 col-xs-10">
                          <input type="text" class="form-control"  name ="nama" value="<?php echo $record['nama']?>" placeholder="Nama Lengkap">
                        </div>
                      </div> 
                      <div class="col-12 col-sm-3">
                        <label class="col-12 col-xs-12 col-form-label">Panggilan Pengantin Pria </label>
                        <div class="col-12 col-xs-10">
                          <input type="text" class="form-control"  name ="nama" value="<?php echo $record['nama']?>" placeholder="Nama Lengkap">
                        </div>
                      </div>
                      <div class="col-12 col-sm-3">
                        <label class="col-12 col-xs-12 col-form-label">Pengantin Pria Anak Ke</label>
                        <div class="col-12 col-xs-10">
                          <input type="text" class="form-control"  name ="nama" value="<?php echo $record['nama']?>" placeholder="Nama Lengkap">
                        </div>
                      </div>
                      <div class="col-12 col-sm-4">
                        <label class="col-12 col-xs-12 col-form-label">Nama Ayah Pengantin Pria</label>
                        <div class="col-12 col-xs-10">
                          <input type="text" class="form-control"  name ="nama" value="<?php echo $record['nama']?>" placeholder="Nama Lengkap">
                        </div>
                      </div>
                      <div class="col-12 col-sm-2">
                        <label class="col-12 col-xs-12 col-form-label">Panggilan Ayah</label>
                        <div class="col-12 col-xs-10">
                          <select name='user_pengantin_nama_cpp_ayah_panggilan' class="form-control select2">
                          <option></option>
                          <option value="Ayah">Ayah</option>
                          <option value="Papah">Papah</option>
                          <option value="Abi">Abi</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-12 col-sm-4">
                        <label class="col-12 col-xs-12 col-form-label">Nama Ibu Pengantin Pria</label>
                        <div class="col-12 col-xs-10">
                          <input type="text" class="form-control"  name ="nama" value="<?php echo $record['nama']?>" placeholder="Nama Lengkap">
                        </div>
                      </div> 
                      <div class="col-12 col-sm-2">
                        <label class="col-12 col-xs-12 col-form-label">Panggilan Ibu</label>
                        <div class="col-12 col-xs-10">
                          <select name='user_pengantin_nama_cpp_ibu_panggilan' class="form-control select2">
                          <option></option>
                          <option value="Ibu">Ibu</option>
                          <option value="Mamah">Mamah</option>
                          <option value="Umi">Umi</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-12 col-sm-6">
                        <label class="col-12 col-xs-12 col-form-label">Tanggal Lahir Pengantin Pria</label>
                        <div class="col-12 col-xs-10">
                          <input type="text" class="form-control"  name ="nama" value="<?php echo $record['nama']?>" placeholder="Nama Lengkap">
                        </div>
                      </div>
                      <div class="col-12 col-sm-6">
                        <label class="col-12 col-xs-12 col-form-label">Akun IG Pengantin Pria</label>
                        <div class="col-12 col-xs-10">
                          <input type="text" class="form-control"  name ="nama" value="<?php echo $record['nama']?>" placeholder="Nama Lengkap">
                        </div>
                      </div>        
                    </div>
                    <br>
                    <div class="row">    
                      <div class="col-12 col-sm-6">
                        <label class="col-12 col-xs-12 col-form-label">Nama Lengkap Pengantin Wanita</label>
                        <div class="col-12 col-xs-10">
                          <input type="text" class="form-control"  name ="nama" value="<?php echo $record['nama']?>" placeholder="Nama Lengkap">
                        </div>
                      </div> 
                      <div class="col-12 col-sm-3">
                        <label class="col-12 col-xs-12 col-form-label">Panggilan Pengantin Wanita </label>
                        <div class="col-12 col-xs-10">
                          <input type="text" class="form-control"  name ="nama" value="<?php echo $record['nama']?>" placeholder="Nama Lengkap">
                        </div>
                      </div>
                      <div class="col-12 col-sm-3">
                        <label class="col-12 col-xs-12 col-form-label">Pengantin Wanita Anak Ke</label>
                        <div class="col-12 col-xs-10">
                          <input type="text" class="form-control"  name ="nama" value="<?php echo $record['nama']?>" placeholder="Nama Lengkap">
                        </div>
                      </div>
                      <div class="col-12 col-sm-4">
                        <label class="col-12 col-xs-12 col-form-label">Nama Ayah Pengantin Wanita</label>
                        <div class="col-12 col-xs-10">
                          <input type="text" class="form-control"  name ="nama" value="<?php echo $record['nama']?>" placeholder="Nama Lengkap">
                        </div>
                      </div>
                      <div class="col-12 col-sm-2">
                        <label class="col-12 col-xs-12 col-form-label">Panggilan Ayah</label>
                        <div class="col-12 col-xs-10">
                          <select name='user_pengantin_nama_cpp_ayah_panggilan' class="form-control select2">
                          <option></option>
                          <option value="Ayah">Ayah</option>
                          <option value="Papah">Papah</option>
                          <option value="Abi">Abi</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-12 col-sm-4">
                        <label class="col-12 col-xs-12 col-form-label">Nama Ibu Pengantin Wanita</label>
                        <div class="col-12 col-xs-10">
                          <input type="text" class="form-control"  name ="nama" value="<?php echo $record['nama']?>" placeholder="Nama Lengkap">
                        </div>
                      </div> 
                      <div class="col-12 col-sm-2">
                        <label class="col-12 col-xs-12 col-form-label">Panggilan Ibu</label>
                        <div class="col-12 col-xs-10">
                          <select name='user_pengantin_nama_cpp_ibu_panggilan' class="form-control select2">
                          <option></option>
                          <option value="Ibu">Ibu</option>
                          <option value="Mamah">Mamah</option>
                          <option value="Umi">Umi</option>
                          </select>
                        </div>
                      </div>      
                    </div>



                    <?php if($this->session->level=='4'){ ?>
                    <ul class="list-group list-group-unbordered mb-3">

                    <?php $user_bisnis = $this->As_m->edit('user_bisnis', array('username' => $this->session->username))->row_array(); ?>
                    <?php if(empty($user_bisnis['username'])) { ?>
                      <li class="list-group-item">
                        <h4><b>Informasi Bisnis</b></h4>
                        <div class="row">
                          <input type="hidden" name="username" value="<?php echo $record['username']?>">
                          <div class="col-12 col-sm-6">
                            <label class="col-6 col-xs-4 col-form-label">Kategori</label>
                            <div class="col-12 col-xs-10">
                              <select name='user_company_account' id="propinsi" class="form-control select2" onchange="loadKabupaten()"  style="width: 100%;">
                                <option value=''></option>
                                <?php foreach ($companys as $row) {
                                  if ($user_bisnis['user_company_account'] == $row['user_company_account']){
                                    echo"<option selected='selected' value='$row[user_company_account]'>$row[user_company_judul]</option>";
                                  }else{
                                    echo"<option value='$row[user_company_account]'>$row[user_company_judul]</option>";
                                  }
                                } ?>
                              </select>
                            </div>
                          </div>
                          <div class="col-12 col-sm-6">
                            <label class="col-4 col-xs-2 col-form-label">Nama Brand</label>
                            <div class="col-12 col-xs-10">
                              <input type="text" class="form-control"  name ="namabisnis" >
                            </div>
                          </div>
                          <div class="col-12 col-sm-6">
                            <label class="col-6 col-xs-4 col-form-label">Tentang</label>
                            <div class="col-12 col-xs-10">
                              <textarea class="form-control" name="tentangbisnis" rows="5" cols="80"></textarea>

                            </div>
                          </div>
                          <div class="col-12 col-sm-6">
                            <label class="col-12 col-xs-12 col-form-label">Alamat</label>
                            <div class="col-12 col-xs-10">
                              <textarea class="form-control" name="alamat" rows="5" cols="80"></textarea>
                            </div>
                          </div>
                          <div class="col-12 col-sm-4">
                            <label class="col-6 col-xs-4 col-form-label">Provinsi</label>
                            <div class="col-12 col-xs-10">
                              <select name="provinsi" id="provinsiArea" class="form-control select2" onchange="loadKabupaten()"  style="width: 100%;">
                                <option value="">- Pilih Propinsi -</option>
                                <?php foreach ($propinsi ->result() as $row) {
                                  if ($user_bisnis['propinsi'] == $row->id){
                                    echo"<option selected='selected' value='$row->id'>$row->nama</option>";
                                  }else{
                                    echo"<option value='$row->id'>$row->nama</option>";
                                  }
                             } ?>
                           </select>
                            </div>
                          </div>
                          <div class="col-12 col-sm-4">
                            <label class="col-12 col-xs-12 col-form-label">Kota/Kabupaten</label>
                            <div class="col-12 col-xs-10">
                              <select name="kabupaten" id="kabupatenArea" onchange="loadKecamatan()" class="form-control select2" style="width: 100%;">
                                <?php
                                $kabupatens = $this->Crud_m->view_ordering_like('kabupaten','id_prov',substr($user_bisnis['kabupaten'],0,2),'id','ASC');
                                 ?>
                                <?php foreach ($kabupatens ->result()  as $row) {
                                  if ($user_bisnis['kabupaten'] == $row->id){
                                        echo"<option selected='selected' value='$row->id'>$row->nama</option>";
                                      }else{
                                        echo "<option value='$row->id'>$row->nama</option>";
                                      }
                                  } ?>
                            </select>
                            </div>
                          </div>
                          <div class="col-12 col-sm-4">
                            <label class="col-12 col-xs-12 col-form-label">Kecamatan</label>
                            <div class="col-12 col-xs-10">
                              <select name="kecamatan" id="kecamatanArea" class="form-control select2" style="width: 100%;">
                                <?php
                                $kecamatans = $this->Crud_m->view_ordering_like('kecamatan','id_kabupaten',substr($user_bisnis['kecamatan'],0,4),'id','ASC');
                                 ?>
                                <?php foreach ($kecamatans->result() as $row) {
                                  if ($user_bisnis['kecamatan'] == $row->id){
                                    echo"<option selected='selected' value='$row->id'>$row->nama_kec</option>";
                                  }else{
                                    echo "<option value='$row->id'>$row->nama_kec</option>";
                                  }
                             } ?>
                            </select>
                            </div>
                          </div>
                          <div class="col-12 col-sm-6">
                            <label class="col-12 col-xs-12 col-form-label">Kode pos</label>
                            <div class="col-12 col-xs-10">
                              <input type="text" class="form-control"  name ="kodepos" >
                            </div>
                          </div>
                          <div class="col-12 col-sm-6">
                            <label class="col-6 col-xs-4 col-form-label">WhatsApp</label>
                            <div class="col-12 col-xs-10">
                              <input type="text" class="form-control"  name ="nomerbisnis">
                            </div>
                          </div>
                          <div class="col-12 col-sm-6">
                            <label class="col-12 col-xs-12 col-form-label">Instagram</label>
                            <div class="col-12 col-xs-10">
                              <input type="text" class="form-control"  name ="ig" >
                            </div>
                          </div>
                          <div class="col-12 col-sm-6">
                            <label class="col-12 col-xs-12 col-form-label">Youtube</label>
                            <div class="col-12 col-xs-10">
                              <input type="text" class="form-control"  name ="ytb" >
                            </div>
                          </div>
                          <div class="col-12 col-sm-6">
                            <label class="col-12 col-xs-12 col-form-label">Facebook</label>
                            <div class="col-12 col-xs-10">
                              <input type="text" class="form-control"  name ="fb" >
                            </div>
                          </div>
                          <div class="col-12 col-sm-6">
                            <label class="col-12 col-xs-12 col-form-label">Tiktok</label>
                            <div class="col-12 col-xs-10">
                              <input type="text" class="form-control"  name ="tiktok" >
                            </div>
                          </div>
                          <div class="col-12 col-sm-6">
                            <label class="col-12 col-xs-12 col-form-label">Logo</label>
                            <div class="col-12 col-xs-10">
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" name="logo">
                                <label class="custom-file-label" for="exampleInputFile"></label>
                              </div>
                            </div>
                          </div>
                          <div class="col-12 col-sm-6">
                            <label class="col-12 col-xs-12 col-form-label">Logo Preview</label>
                            <div class="col-12 col-xs-10">
                              <?php if(empty($user_bisnis['gambar'])) { ?>
                                <img src="<?php echo base_url()?>assets/frontend/noimages.jpg" class="img-fluid mb-3">
                              <?php }else { ?>
                                <img src="<?php echo base_url()?>assets/frontend/gambar_bisnis/<?php echo $user_bisnis['gambar'];?>" class="img-fluid mb-3">
                              <?php }?>
                            </div>
                          </div>

                        </div>
                      </li>
                    <?php }else { ?>
                      <li class="list-group-item">
                        <h4><b>Informasi Bisnis</b></h4>
                        <div class="row">
                          <input type="hidden" name="username" value="<?php echo $user_bisnis['username']?>">
                          <div class="col-12 col-sm-6">
                            <label class="col-6 col-xs-4 col-form-label">Kategori</label>
                            <div class="col-12 col-xs-10">
                              <select name='user_company_account' id="propinsi" class="form-control select2" onchange="loadKabupaten()"  style="width: 100%;">
                                <option value=''></option>
                                <?php foreach ($companys as $row) {
                                  if ($user_bisnis['user_company_account'] == $row['user_company_account']){
                                    echo"<option selected='selected' value='$row[user_company_account]'>$row[user_company_judul]</option>";
                                  }else{
                                    echo"<option value='$row[user_company_account]'>$row[user_company_judul]</option>";
                                  }
                                } ?>
                              </select>
                            </div>
                          </div>
                          <div class="col-12 col-sm-6">
                            <label class="col-4 col-xs-2 col-form-label">Nama Brand</label>
                            <div class="col-12 col-xs-10">
                              <input type="text" class="form-control"  name ="namabisnis" value="<?php echo $user_bisnis['namabisnis']?>">
                            </div>
                          </div>
                          <div class="col-12 col-sm-6">
                            <label class="col-6 col-xs-4 col-form-label">Tentang</label>
                            <div class="col-12 col-xs-10">
                              <textarea class="form-control" name="tentangbisnis" rows="5" cols="80"><?php echo $user_bisnis['tentangbisnis']?></textarea>

                            </div>
                          </div>
                          <div class="col-12 col-sm-6">
                            <label class="col-12 col-xs-12 col-form-label">Alamat</label>
                            <div class="col-12 col-xs-10">
                              <textarea class="form-control" name="alamat" rows="5" cols="80"><?php echo $user_bisnis['alamat']?></textarea>
                            </div>
                          </div>
                          <div class="col-12 col-sm-4">
                            <label class="col-6 col-xs-4 col-form-label">Provinsi</label>
                            <div class="col-12 col-xs-10">
                              <select name="provinsi" id="provinsiArea" class="form-control select2" onchange="loadKabupaten()"  style="width: 100%;">
                                <option value="">- Pilih Propinsi -</option>
                                <?php foreach ($propinsi ->result() as $row) {
                                  if ($user_bisnis['propinsi'] == $row->id){
                                    echo"<option selected='selected' value='$row->id'>$row->nama</option>";
                                  }else{
                                    echo"<option value='$row->id'>$row->nama</option>";
                                  }
                             } ?>
                           </select>
                            </div>
                          </div>
                          <div class="col-12 col-sm-4">
                            <label class="col-12 col-xs-12 col-form-label">Kota/Kabupaten</label>
                            <div class="col-12 col-xs-10">
                              <select name="kabupaten" id="kabupatenArea" onchange="loadKecamatan()" class="form-control select2" style="width: 100%;">
                                <?php
                                $kabupatens = $this->Crud_m->view_ordering_like('kabupaten','id_prov',substr($user_bisnis['kabupaten'],0,2),'id','ASC');
                                 ?>
                                <?php foreach ($kabupatens ->result()  as $row) {
                                  if ($user_bisnis['kabupaten'] == $row->id){
                                        echo"<option selected='selected' value='$row->id'>$row->nama</option>";
                                      }else{
                                        echo "<option value='$row->id'>$row->nama</option>";
                                      }
                                  } ?>
                            </select>
                            </div>
                          </div>
                          <div class="col-12 col-sm-4">
                            <label class="col-12 col-xs-12 col-form-label">Kecamatan</label>
                            <div class="col-12 col-xs-10">
                              <select name="kecamatan" id="kecamatanArea" class="form-control select2" style="width: 100%;">
                                <?php
                                $kecamatans = $this->Crud_m->view_ordering_like('kecamatan','id_kabupaten',substr($user_bisnis['kecamatan'],0,4),'id','ASC');
                                 ?>
                                <?php foreach ($kecamatans->result() as $row) {
                                  if ($user_bisnis['kecamatan'] == $row->id){
                                    echo"<option selected='selected' value='$row->id'>$row->nama_kec</option>";
                                  }else{
                                    echo "<option value='$row->id'>$row->nama_kec</option>";
                                  }
                             } ?>
                            </select>
                            </div>
                          </div>
                          <div class="col-12 col-sm-6">
                            <label class="col-12 col-xs-12 col-form-label">Kode pos</label>
                            <div class="col-12 col-xs-10">
                              <input type="text" class="form-control"  name ="kodepos" value="<?php echo $user_bisnis['kodepos']?>">
                            </div>
                          </div>
                          <div class="col-12 col-sm-6">
                            <label class="col-6 col-xs-4 col-form-label">WhatsApp</label>
                            <div class="col-12 col-xs-10">
                              <input type="text" class="form-control"  name ="nomerbisnis" value="<?php echo $user_bisnis['nomerbisnis']?>" >
                            </div>
                          </div>
                          <div class="col-12 col-sm-6">
                            <label class="col-12 col-xs-12 col-form-label">Instagram</label>
                            <div class="col-12 col-xs-10">
                              <input type="text" class="form-control"  name ="ig" value="<?php echo $user_bisnis['ig']?>">
                            </div>
                          </div>
                          <div class="col-12 col-sm-6">
                            <label class="col-12 col-xs-12 col-form-label">Youtube</label>
                            <div class="col-12 col-xs-10">
                              <input type="text" class="form-control"  name ="ytb" value="<?php echo $user_bisnis['ytb']?>">
                            </div>
                          </div>
                          <div class="col-12 col-sm-6">
                            <label class="col-12 col-xs-12 col-form-label">Facebook</label>
                            <div class="col-12 col-xs-10">
                              <input type="text" class="form-control"  name ="fb" value="<?php echo $user_bisnis['fb']?>">
                            </div>
                          </div>
                          <div class="col-12 col-sm-6">
                            <label class="col-12 col-xs-12 col-form-label">Tiktok</label>
                            <div class="col-12 col-xs-10">
                              <input type="text" class="form-control"  name ="tiktok" value="<?php echo $user_bisnis['tiktok']?>">
                            </div>
                          </div>
                          <div class="col-12 col-sm-6">
                            <label class="col-12 col-xs-12 col-form-label">Logo</label>
                            <div class="col-12 col-xs-10">
                              <div class="custom-file">
                                <input type="file" class="custom-file-input" name="logo">
                                <label class="custom-file-label" for="exampleInputFile"><?php echo $user_bisnis['gambar'] ?></label>
                              </div>
                            </div>
                          </div>
                          <div class="col-12 col-sm-6">
                            <label class="col-12 col-xs-12 col-form-label">Logo Preview</label>
                            <div class="col-12 col-xs-10">
                              <?php if(empty($user_bisnis['gambar'])) { ?>
                                <img src="<?php echo base_url()?>assets/frontend/noimages.jpg" class="img-fluid mb-3">
                              <?php }else { ?>
                                <img src="<?php echo base_url()?>assets/frontend/gambar_bisnis/<?php echo $user_bisnis['gambar'];?>" class="img-fluid mb-3">
                              <?php }?>
                            </div>
                          </div>

                        </div>
                      </li>
                    <?php } ?>
                    </ul>
                  <?php } ?>


                    <div class="form-group row">
                      <div class="col-12 col-sm-6">
                        <label class="col-4 col-xs-2 col-form-label"> </label>
                        <div class="col-12 col-xs-10">
                          <button type="submit" name ="submit" class="btn btn-success">Perbarui</button>
                        </div>
                      </div>
                    </div>
                  <?php echo form_close(); ?>
                </div>


                <!-- /.tab-pane -->
              </div>
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
  <script type="text/javascript">
      function loadKabupaten()
      {
          var propinsi = $("#provinsiArea").val();
          $.ajax({
              type:'GET',
              url:"<?php echo base_url(); ?>pengaturan/kabupaten",
              data:"id=" + propinsi,
              success: function(msg)
              {
                 $("#kabupatenArea").html(msg);
                 loadKecamatan();
              }
          });
      }
      function loadKecamatan()
      {
          var kabupaten = $("#kabupatenArea").val();
          $.ajax({
              type:'GET',
              url:"<?php echo base_url(); ?>pengaturan/kecamatan",
              data:"id=" + kabupaten,
              success: function(msg)
              {
                  $("#kecamatanArea").html(msg);
              }
          });
      }
  </script>
<?php $this->load->view('backend/bottom')?>
