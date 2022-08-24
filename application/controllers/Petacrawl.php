<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Petacrawl extends CI_Controller {

 public function index(){
     $this->load->helper('url');
     $this->load->model('Sitemap_model');
     $data['vendorkategori'] = $this->Sitemap_model->generate_sitemap('user_company','user_company_id','user_company_judul_seo','user_company_post_hari','user_company_post_tanggal','user_company_post_jam');
     $data['vendors'] = $this->Sitemap_model->generate_sitemap('user_bisnis','id_bisnis','namabisnis_seo','hari','tanggal','jam');
     $data['vendorsharga'] = $this->Sitemap_model->generate_sitemap('harga','id_harga','judul_seo','hari','tanggal','jam');
     $data['vendorsprojek'] = $this->Sitemap_model->generate_sitemap('projek','id_projek','judul_seo','hari','tanggal','jam');

     $this->load->view('fronts/v_sitemap',$data);
 }

}
