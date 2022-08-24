<?php header('Content-type: application/xml; charset="ISO-8859-1"',true);  ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
  <url>
     <loc><?php echo base_url();?></loc>
     <priority>1.0</priority>
  </url>
  <url>
     <loc><?php echo base_url("vendors/");?></loc>
     <priority>0.5</priority>
  </url>
<?php foreach($vendorkategori as $data) { ?>
  <url>
     <loc><?php echo base_url("vendors/kategori/").$data->user_company_judul_seo;?></loc>
     <priority>0.5</priority>
  </url>
<?php } ?>
<?php foreach($vendors as $data) { ?>
  <url>
     <loc><?php echo base_url("vendors/").$data->namabisnis_seo;?></loc>
     <priority>0.5</priority>
  </url>
<?php } ?>
<?php foreach($vendorsharga as $data) { ?>
  <url>
     <loc><?php echo base_url("harga-detail/").$data->judul_seo;?></loc>
     <priority>0.5</priority>
  </url>
<?php } ?>
<?php foreach($vendorsprojek as $data) { ?>
  <url>
     <loc><?php echo base_url("projek-detail/").$data->judul_seo;?></loc>
     <priority>0.5</priority>
  </url>
<?php } ?>





</urlset>
