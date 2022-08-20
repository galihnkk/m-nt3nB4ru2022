<!DOCTYPE html>
<html lang="id">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Daftar Pengguna | Mantenbaru Wedding Organizer</title>
  <meta name="title" content="Vendor Pernikahan Terlengkap | Mantenbaru Wedding Organizer">
  <meta name="site_url" content="<?php echo base_url()?>">
  <meta name="description" content="">
  <meta name="keywords" content="mantenbaru.com, mantenbaru, perencanaan investasi, vendor pernikahan, wedding organizer, wedding planner">
  <meta NAME="ROBOTS" CONTENT="INDEX, FOLLOW">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="web_author" content="dhawyarkan.com">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta property="og:site_name" content="Mantenbaru">
  <meta property="og:title" content="Vendor Pernikahan Terlengkap | Mantenbaru Wedding Organizer">
  <meta property="og:description" content="">
  <meta property="og:url" content="<?php echo base_url()?>">
  <meta property="og:image" content="<?php echo base_url()?>asset/frontend/aspanel/img/logo.png">
  <meta property="og:image:url" content="<?php echo base_url()?>asset/frontend/aspanel/img/logo.png">
  <meta property="og:type" content="article">
  <link rel="shortcut icon" href="<?php echo base_url()?>asset/frontend/aspanel/img/fav.png" type="image/x-icon">
  <?php $this->load->view('fronts/css')?>
  </head>
  <body data-color="theme-1">
  <?php $this->load->view('fronts/loader')?>
  <img class="center-image" src="assets/frontend/campur/bg-1.jpg" alt="">
  <div class="container">
  	<div class="login-fullpage">
  		<div class="row">
  			<div class="login-logo"><img class="center-image" src="assets/frontend/campur/login.jpg" alt=""></div>
  			<div class="col-xs-12 col-sm-7">
          <div class="f-login-content">
                    <div class="row">

  					      <a href="<?php echo base_url()?>" >
                            <center><img src="<?php echo base_url()?>assets/frontend/campur/<?php echo $identitas->logo?>" alt="mantenbaru" height="50%" width="50%"></center>
                          </a>

  					 </div>
  					<div class="f-login-header">


  						<div class="f-login-title color-dr-blue-2">Daftar Gratiss!</div>
  						<div class="f-login-desc color-grey">Hanya dengan 20 detik bisa menyelesaikan permasalah masa depan Anda</div>
  					</div>
            <?php echo $this->session->flashdata('msg'); ?>
            <?php
              if ($this->input->post('email')!=''){
                echo "<div class='alert bg-5'><center>$title</center></div>";
              }elseif($this->input->post('username')!=''){
                echo "<div class='alert bg-5'><center>$title</center></div>";
              }else{

                echo form_open('daftar');
                }
            ?>

  					<form class="f-login-form">
              <br><br><br>
              <div class="input-style-1 b-50 type-2 color-5">
  							<input name='username' type="text"placeholder="Username" onkeyup="this.value = this.value.toLowerCase()">
                <span style="font-size: 15px; color:grey;"><?php echo form_error('username'); ?><br></span>
  						</div>
              <br><br><br>
  						<div class="input-style-1 b-50 type-2 color-5">
  							<input name='email' type="email" placeholder="Email" onkeyup="this.value = this.value.toLowerCase()">
                <span style="font-size: 15px; color:grey;"><?php echo form_error('email'); ?><br></span>
  						</div>
              <br><br><br>
  						<div class="input-style-1 b-50 type-2 color-5">
  							<input name='password' type="password" placeholder="Password">
                <span style="font-size: 15px; color:grey;"><?php echo form_error('password'); ?><br></span>
  						</div>
              <br><br><br>
  						<div class="input-style-1 b-50 type-2 color-5">
  							<input name='konfirmpassword' type="password" placeholder="Confirm Password">
                <span style="font-size: 15px; color:grey;"><?php echo form_error('konfirmpassword'); ?><br></span>
  						</div>
              <br><br><br>
              <div class="input-style-1 b-50 type-2 color-5">
                <div class="drop-wrap drop-wrap-s-4 color-2">
                <select class="drop" name='kategori'>
                  <option class="drop-list" value="" selected>Mendaftar sebagai <i class="fa fa-angle-down"></i></option>
                  <option value="5">Calon Pengantin</option>
                  <option value="4">Owner Bisnis</option>
                </select>
              </div>
                <span style="font-size: 15px; color:grey;"><?php echo form_error('kategori'); ?><br></span>
  						</div>
              <br><br><br>
  						<div class="input-style-1 b-50 type-2 color-5">
  						<span style="font-size: 12px; color:grey;">Dengan mengklik Daftar, Anda menyetujui <a href="#"><span style ="color:blue;">Syarat dan Ketentuan</span></a> Mantenbaru.</span>
  						</div>
              <br><br><br>
  						<input name='submit' type="submit" class="login-btn c-button full b-60 bg-dr-blue-2 hv-dr-blue-2-o" value="DAFTAR">
              <br><br><br>
              <div class="input-style-1 b-50 type-2 color-5">
  						<span style="font-size: 15px; color:grey;">Sudah punya akun Mantenbaru? Langsung <a href="<?php echo base_url()?>login"><span style ="color:blue;">Masuk</span></a> yuk!</span>
  						</div>
  					</form>
  				</div>
  			</div>
  		</div>
  	</div>
  	<div class="full-copy">© 2022 All rights reserved. <a href="<?php echo base_url()?>">Mantenbaru</a></div>
  </div>
  <?php $this->load->view('fronts/js')?>
  </body>
</html>
