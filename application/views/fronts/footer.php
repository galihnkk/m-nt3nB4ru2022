<footer class="bg-dark type-2">
     <div class="container">
       <div class="row">
         <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
           <div class="footer-block">
             <img height="50px" width ="280px"  src="<?php echo base_url()?>assets/frontend/campur/<?=$identitas->logo ?>" alt="" class="logo-footer">
             <div class="f_text color-grey-7"><p align"justify"><b><?=$identitas->slogan ?></b><br><?=$identitas->meta_deskripsi ?></p></div>


           </div>
         </div>
         <div class="col-lg-4 col-md-4 col-sm-6 col-xs-7">
            <div class="footer-block">
              <h6>Hubungi</h6>
                <div class="contact-info">
                 <div class="contact-line color-grey-7"><i class="fa fa-phone"></i><a href="tel:<?=$identitas->no_telp ?>"><?=$identitas->no_telp ?></a></div>
                 <div class="contact-line color-grey-7"><i class="fa fa-envelope-o"></i><a href="mailto:<?=$identitas->email ?>"><?=$identitas->email ?></a></div>
                 <div class="contact-line color-grey-7"><i class="fa fa-globe"></i><a href=""><?=$identitas->alamat ?></a></div>
                   </div>
       </div></div>


       <div class="col-lg-4 col-md-4 col-sm-6 col-xs-5">
                  <div class="footer-block">
                    <h6>Ikuti</h6>
                    <a  class="tags-b" href="https://api.whatsapp.com/send?phone=<?=$identitas->no_telp ?>&text=Hai,%20Mantenbaru%20.%20Bisa%20bantu%20saya%20?" target="_blank"><i class="fa fa-whatsapp"></i></a>
                    <a  class="tags-b" href="<?=$identitas->facebook ?>" target="_blank"><i class="fa fa-facebook"></i></a>
                    <a  class="tags-b" href="<?=$identitas->instagram ?>" target="_blank"><i class="fa fa-instagram"></i></a>
                    <a  class="tags-b" href="<?=$identitas->youtube ?>" target="_blank"><i class="fa fa-youtube"></i></a>

               </ul>
                  </div>
          </div>
       </div>
       </div>
     </div>
     <div class="footer-link bg-black">
       <div class="container">
         <div class="row">
           <div class="col-md-12">
               <div class="copyright">
           <span>&copy; 2022 All rights reserved. <?=$identitas->nama_website ?></span>
         </div>
             <ul>
           <li><a class="link-aqua" href="#">Syarat & Ketentuan</a></li>
           <li><a class="link-aqua" href="<?php echo base_url()?>tentang-mantenbaru">tentang Kami</a></li>
         </ul>
           </div>
         </div>
       </div>
     </div>
   </footer>
