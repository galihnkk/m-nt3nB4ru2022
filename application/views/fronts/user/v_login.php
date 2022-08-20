<!DOCTYPE html>
<html lang="id">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Login Pengguna | Mantenbaru Wedding Organizer</title>
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
  						<div class="f-login-title color-dr-blue-2">Selamat Datang</div>
  						<div class="f-login-desc color-grey">Silahkan masuk ke Mantenbaru</div>
  					</div>
  					<?php echo $this->session->flashdata('msg'); ?>
            <?php
              if ($this->input->post('email')!=''){
                echo "<div class='alert bg-5'><center>$title</center></div>";
              }elseif($this->input->post('username')!=''){
                echo "<div class='alert bg-5'><center>$title</center></div>";
              }

                echo form_open('login');
            ?>

  					<form class="f-login-form">
  						<div class="input-style-1 b-50 type-2 color-5">
  							<input type="text" name='username' placeholder="username" onkeyup="this.value = this.value.toLowerCase()">
                <span style="font-size: 15px; color:grey;"><?php echo form_error('username'); ?><br></span>
  						</div>
                  <br><br><br>
  						<div class="input-style-1 b-50 type-2 color-5">
  							<input type="password" name='password' placeholder="password">

                <span style="font-size: 15px; color:grey;"><?php echo form_error('password'); ?><br></span>
  						</div>
                <br><br><br>
  						<input name='submit' type="submit" class="login-btn c-button full b-60 bg-dr-blue-2 hv-dr-blue-2-o" value="Masuk">
                <br><br><br>
  						<div class="input-style-1 b-50 type-2 color-5">
  						<span style="font-size: 15px; color:grey;">Lupa akun anda? Coba gunakan <a href="#"><span style ="color:blue;">Reset Password</span></a> atau silahkan <a href="<?php echo base_url()?>"><span style ="color:blue;">Daftar</span></a> baru akun Mantenbaru anda.</span>
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
